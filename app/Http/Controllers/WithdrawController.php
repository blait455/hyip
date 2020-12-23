<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Currency;
use App\Models\Deposits;
use App\Models\Withdraw;
use App\Models\Withdrawm;
use App\Models\Audit;
use Carbon\Carbon;





class WithdrawController extends Controller
{


        
    public function withdrawlog()
    {
        $data['title']='Withdraw logs';
        $data['withdraw']=Withdraw::orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.index', $data);
    } 

    public function withdrawmethod()
    {
        $data['title']='Withdraw methods';
        $data['method']=Withdrawm::orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.methods', $data);
    }   

    public function withdrawapproved()
    {
        $data['title']='Approved Withdraw';
        $data['withdraw']=Withdraw::whereStatus(1)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.approved', $data);
    } 
    
    public function withdrawunpaid()
    {
        $data['title']='Approved Withdraw';
        $data['withdraw']=Withdraw::whereStatus(0)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.unpaid', $data);
    } 
    
    public function withdrawdeclined()
    {
        $data['title']='Declined Withdraw';
        $data['withdraw']=Withdraw::whereStatus(2)->orderBy('id', 'DESC')->get();
        return view('admin.withdrawal.declined', $data);
    }

    public function DestroyWithdrawal($id)
    {
        $data = Withdraw::findOrFail($id);
        if($data->status==0){
            return back()->with('alert', 'You cannot delete an unpaid withdraw request');
        }else{
            $res =  $data->delete();
            if ($res) {
                return back()->with('success', 'Request was Successfully deleted!');
            } else {
                return back()->with('alert', 'Problem With Deleting Request');
            }
        }

    }  

    public function DestroyMethod($id)
    {
        $data = Withdrawm::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Method was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Method');
        }
    } 
    
    public function approve($id)
    {
        $data = Withdraw::findOrFail($id);
        $user=User::find($data->user_id);
        $set=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $data->status=1;
        $res=$data->save();
        if($set->email_notify==1){
            send_email(
                $user->email, 
                $user->username, 
                'Withdraw Request has been approved', 
                'Withdrawal request of '.$data->amount.$currency->name.' has been approved<br>Thanks for working with us.'
            );
        }
            $audit['user_id']=$data->user_id;
            $audit['trx']=str_random(16);
            $audit['log']='Withdraw request Approved '.$data->reference;
            Audit::create($audit);  
        if ($res) {
            return back()->with('success', 'Request was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Request');
        }
    }  
   
    public function store(Request $request)
    {
        $data['method'] = $request->name;
        $res = Withdrawm::create($data);
        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Creating New Method');
        }
    } 

    public function decline($id)
    {
        $data = Withdraw::findOrFail($id);
        $user=User::find($data->user_id);
        $set=Settings::first();
        $currency=Currency::whereStatus(1)->first();
        $data->status=2;
        $res=$data->save();
        if($data->type==1){
            $user->profit=$user->profit+$data->amount;
            $user->save();
        }elseif($data->type==2){
            $user->balance=$user->balance+$data->amount;
            $user->save();
        }elseif($data->type==3){
            $user->ref_bonus=$user->ref_bonus+$data->amount;
            $user->save();
        }
        if($set->email_notify==1){
            send_email(
                $user->email, 
                $user->username, 
                'Withdraw Request has been declined', 
                'Withdrawal request of '.$data->amount.$currency->name.' has been declined<br>Thanks for working with us.'
            );
        }
            $audit['user_id']=$data->user_id;
            $audit['trx']=str_random(16);
            $audit['log']='Withdraw request Declined '.$data->reference;
            Audit::create($audit);  
        if ($res) {
            return back()->with('success', 'Request was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Request');
        }
    }  
    public function approvem($id)
    {
        $data = Withdrawm::findOrFail($id);
        $data->status=1;
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Successfully activated!');
        } else {
            return back()->with('alert', 'Problem With Request');
        }
    } 
    
    public function declinem($id)
    {
        $data = Withdrawm::findOrFail($id);
        $data->status=0;
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Successfully disabled!');
        } else {
            return back()->with('alert', 'Problem With Request');
        }
    }      
}
