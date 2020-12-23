<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use App\Models\Settings;
use App\Models\Blog;
use App\Models\Logo;
use App\Models\Currency;
use App\Models\Social;
use App\Models\Faq;
use App\Models\Category;
use App\Models\Page;
use App\Models\Design;
use App\Models\About;
use App\Models\Review;
use App\Models\User;
use App\Models\Plans;
use App\Models\Profits;
use App\Models\Services;
use App\Models\Gateway;
use App\Models\Transfer;
use App\Models\Team;
use App\Models\Deposits;
use App\Models\Banktransfer;
use App\Models\Withdraw;
use Illuminate\Support\Facades\View;
use Session;
use Image;
use App\Lib\CoinPaymentHosted;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view){
            $currency=Currency::whereStatus(1)->first();
            if (Auth::guard('user')->check()){
                $set=Settings::first();
                $user=User::find(Auth::guard('user')->user()->id);
                $currency=Currency::whereStatus(1)->first();
                $transfer=Transfer::where('sender_id', Auth::guard('user')->user()->id)->get();
                if(empty($user->image)){
                    $cast="personx.jpg";
                }else{
                    $cast=$user->image;
                }
                //Check for pending coinpayment transactions
                    $depo=Deposits::whereStatus(0)->whereuser_id($user->id)->where('txn_id', '!=', 'null')->get();  
                    foreach($depo as $val){
                        if($val->gateway['id']==505){
                            $method = Gateway::find(505);
                            $cps = new CoinPaymentHosted();
                            $cps->Setup($method->val2, $method->val1);
                            $req = array(
                                'txid' => $val->txn_id,
                            );
                            $result = $cps->ViewTransaction($req);
                            $status=$result['result']['status'];
                            if($status>=100 || $status==2){
                                $user->balance=$user->balance + $val->amount - $val->charge;
                                $user->update();
                                $val->status = 1;
                                $val->update();            
                            }elseif($status<0){
                                $val->status = 2;
                                $val->update();
                            }
                        }elseif($val->gateway['id']==506){
                            $method = Gateway::find(506);
                            $cps = new CoinPaymentHosted();
                            $cps->Setup($method->val2, $method->val1);
                            $req = array(
                                'txid' => $val->txn_id,
                            );
                            $result = $cps->ViewTransaction($req);
                            $status=$result['result']['status'];
                            if($status>=100 || $status==2){
                                $user->balance=$user->balance + $val->amount - $val->charge;
                                $user->update();
                                $val->status = 1;
                                $val->update();            
                            }elseif($status<0){
                                $val->status = 2;
                                $val->update();
                            }
                        }
                    } 
                //   
                $profit=$data['profit']=Profits::whereUser_id(Auth::guard('user')->user()->id)->orderBy('id', 'DESC')->get();
                foreach($profit as $xpro){
                    $profits=Profits::whereId($xpro->id)->first();
                    $date1=date_create(Carbon::now());
                    $date2=date_create($xpro->date);
                    $date_diff=date_diff($date2, $date1);
                    $start_date=date_create($xpro->date);
                    date_add($start_date, date_interval_create_from_date_string($xpro->plan->duration.' '.$xpro->plan->period));
                    $ndate=date_format($start_date, "Y-m-d H:i:s");   
                    $profits->end_date=$ndate;
                    $profits->save();
                    if (Carbon::now()<$ndate){
                        $fdate=($xpro->plan->percent*$xpro->amount)/100 * $date_diff->format('%R%a');   
                        $profits->profit=$fdate;
                        $profits->status=1;
                        $profits->save();
                    }else{
                        $fdate=($xpro->plan->percent*$xpro->amount)/100 * castrotime($xpro->plan->duration.' '.$xpro->plan->period);  
                        $profits->profit=$fdate;
                        $profits->save();
                        if($xpro->status==1){
                            $boom=Profits::whereid(Auth::guard('user')->user()->id)->orderBy('id', 'DESC')->get();
                            $capital=$profits->amount;
                            $bpro=$fdate-$capital;
                            $user->profit=$user->profit+$bpro;
                            $user->balance=$user->balance+$capital;
                            $user->total_profit=$user->total_profit+$bpro;
                            $user->save();   
                            $profits->status=2;
                            $profits->save();
                            if($set->email_notify==1){
                                send_email($user->email, $user->site_name, 'Trade has ended', 'Profit from '.$xpro->trx.' has been credited to your account. Thanks for choosing us.');
                            }
                            if($xpro->plan->bonus==!null && $user->upgrade==1){
                                $user->profit=$user->profit+($fdate*$xpro->plan->bonus/100);
                                $user->trade_bonus=$user->trade_bonus+($fdate*$xpro->plan->bonus/100);
                                $user->save();  
                                $profits->bonus=$fdate*$xpro->plan->bonus/100;
                                $profits->save();
                                if($set->email_notify==1){
                                    send_email($user->email, $user->site_name, 'You just Received a Bonus', 'Bonus from '.$xpro->trx.' has been credited to your account. Thanks for choosing us.'); 
                                }
                            }

                            if($xpro->recurring==1){
                                if($user->balance>$xpro->amount || $user->balance==$xpro->amount){
                                    $user->balance=$user->balance-$xpro->amount;
                                    $user->save();
                                    $xstart_date=date_create(Carbon::now());
                                    date_add($xstart_date, date_interval_create_from_date_string($xpro->plan->duration.' '.$xpro->plan->period));
                                    $xndate=date_format($xstart_date, "Y-m-d H:i:s");
                                    $profits->date=Carbon::now();
                                    $profits->end_date=$xndate;
                                    $profits->profit=0;
                                    $profits->status=1;
                                    $profits->save();
                                    if($set->email_notify==1){
                                        send_email($user->email, $user->site_name, 'Plan was renewed', $xpro->trx.' has been renewed. Thanks for choosing us.');
                                    }
                                }else{
                                    if($set->email_notify==1){
                                        jusend_email($user->email, $user->site_name, 'Plan could not be renewed', $xpro->trx.' could not be renewed because of insufficient fund. Thanks for choosing us.');
                                    }
                                }
                            }
                        }
                    }
                }                
                foreach($transfer as $val){
                    if($val->temp!=null && $val->status==0){
                        $date1=Carbon::now();
                        $date2=Carbon::parse($val->created_at);
                        $check=$date1->diffInDays($date2);
                        if($check==5 || $check>5){
                            $sender=User::whereid($val->sender_id)->first();
                            $sender->balance=$val->amount+$sender->balance;
                            $sender->save();
                            $val->status=2;
                            $val->save();
                        }
                    }
                }
                $view->with('user', $user );
                $view->with('cast', $cast );
            }
            $pdeposit=Deposits::where('status', 0)->get();
            $pbank=Banktransfer::where('status', 0)->get();
            $pwithdraw=Withdraw::where('status', 0)->get();
            $view->with('pwithdraw', $pwithdraw );
            $view->with('pdeposit', $pdeposit );
            $view->with('pbank', $pbank );
            $view->with('currency', $currency );
        });
        $data['set']=Settings::first();
        $data['blog']=Blog::whereStatus(1)->get();
        $data['logo']=Logo::first();
        $data['social']=Social::all();
        $data['faq']=Faq::all();
        $data['cat']=Category::all();
        $data['pages']=Page::whereStatus(1)->get();
        $data['ui']=Design::first();
        $data['about']=About::first();
        $data['trending'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
        $data['posts'] = Blog::whereStatus(1)->orderBy('views', 'DESC')->limit(5)->get();
        $data['currency']=Currency::whereStatus(1)->first();
        $data['review'] = Review::whereStatus(1)->get();
        $data['team'] = Team::whereStatus(1)->get();
        $data['service'] = Services::all();
        $data['gateway'] = Gateway::whereStatus(1)->get();
        $data['plan'] = Plans::whereStatus(1)->get();

        
        view::share($data);
    }
}
