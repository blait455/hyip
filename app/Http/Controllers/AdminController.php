<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Logo;
use App\Models\Currency;
use App\Models\Transfer;
use App\Models\Plans;
use App\Models\Gateway;
use App\Models\Deposits;
use App\Models\Withdraw;
use App\Models\Profits;
use App\Models\Social;
use App\Models\About;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Ticket;
use App\Models\Reply;
use App\Models\Review;
use App\Models\Earning;
use App\Models\Referral;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Banktransfer;
use Carbon\Carbon;
use Image;






class AdminController extends Controller
{

    public function __construct()
    {		
        $this->middleware('auth');
    }
 


    //Transfer and Earnings
        public function Transfers()
        {
            $data['title']='Transfers';
            $data['transfer']=Transfer::latest()->get();
            return view('admin.transfer.transfer', $data);
        }     
        
        public function Referrals()
        {
            $data['title']='Referral earnings';
            $data['earning']=Earning::latest()->get();
            return view('admin.transfer.referral', $data);
    } 
    //End
        

    public function Destroyuser($id)
    {
        $check=User::whereid($id)->first();
        $profit = Profits::whereUser_id($id)->delete();
        $deposit = Deposits::whereUser_id($id)->delete();
        $ticket = Ticket::whereUser_id($id)->delete();
        $withdraw = Withdraw::whereUser_id($id)->delete();
        $earning = Earning::whereReferral($id)->delete();
        $referral = Referral::whereRef_id($id)->delete();
        $bank_transfer = Banktransfer::whereUser_id($id)->delete();
        $transfer = Transfer::where('Receiver_id', $id)->orWhere('Temp', $check->email)->delete();
        $user = User::whereId($id)->delete();
        return back()->with('success', 'User was successfully deleted');
    } 

    public function dashboard()
    {
        $data['title']='Dashboard';
        $data['totalusers']=User::count();
        $data['blockedusers']=User::whereStatus(1)->count();
        $data['activeusers']=User::whereStatus(0)->count();
        $data['totalticket']=Ticket::count();
        $data['openticket']=Ticket::whereStatus(0)->count();
        $data['closedticket']=Ticket::whereStatus(1)->count();        
        $data['totalreview']=Review::count();
        $data['pubreview']=Review::whereStatus(1)->count();
        $data['unpubreview']=Review::whereStatus(0)->count();        
        $data['totaldeposit']=Deposits::count();
        $data['approveddep']=Deposits::whereStatus(1)->count();
        $data['declineddep']=Deposits::whereStatus(2)->count();
        $data['pendingdep']=Deposits::whereStatus(0)->count();               
        $data['totalwd']=Withdraw::count();
        $data['approvedwd']=Withdraw::whereStatus(1)->count();
        $data['declinedwd']=Withdraw::whereStatus(2)->count();
        $data['pendingwd']=Withdraw::whereStatus(0)->count();        
        $data['totalplan']=Plans::count();
        $data['appplan']=Plans::whereStatus(1)->count();
        $data['penplan']=Plans::whereStatus(0)->count();        
        $data['totalprofit']=Profits::count();
        $data['appprofit']=Profits::whereStatus(1)->count();
        $data['penprofit']=Profits::whereStatus(0)->count();
        $data['messages']=Contact::count();
        return view('admin.dashboard.index', $data);
    }    
    
    public function Users()
    {
		$data['title']='Clients';
		$data['users']=User::latest()->get();
        return view('admin.user.index', $data);
    }    
    
    public function Messages()
    {
		$data['title']='Messages';
		$data['message']=Contact::latest()->get();
        return view('admin.user.message', $data);
    }    
    
    public function Ticket()
    {
		$data['title']='Ticket system';
		$data['ticket']=Ticket::latest()->get();
        return view('admin.user.ticket', $data);
    }   
    
    public function Email($id,$name)
    {
		$data['title']='Send email';
		$data['email']=$id;
		$data['name']=$name;
        return view('admin.user.email', $data);
    }    
    
    public function Promo()
    {
		$data['title']='Send email';
        $data['client']=$user=User::all();
        return view('admin.user.promo', $data);
    } 
    
    public function Sendemail(Request $request)
    {        	
        $set=Settings::first();
        send_email($request->to, $request->name, $request->subject, $request->message);  
        return back()->with('success', 'Mail Sent Successfuly!');
    }
    
    public function Sendpromo(Request $request)
    {        	
        $set=Settings::first();
        $user=User::all();
        foreach ($user as $val) {
            $x=User::whereEmail($val->email)->first();
            if($set->email_notify==1){
                send_email($x->email, $x->username, $request->subject, $request->message);
            }
        }      
        return back()->with('success', 'Mail Sent Successfuly!');
    }  
    
    public function Replyticket(Request $request)
    {        
        $data['ticket_id'] = $request->ticket_id;
        $data['reply'] = $request->reply;
        $data['status'] = 0;
        $res = Reply::create($data);      
        if ($res) {
            return back();
        } else {
            return back()->with('alert', 'An error occured');
        }
    }    
    
    public function Destroymessage($id)
    {
        $data = Contact::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    }     
    
    public function Destroyticket($id)
    {
        $data = Ticket::findOrFail($id);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Request was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Request');
        }
    } 

    public function Manageuser($id)
    {
        $data['client']=$user=User::find($id);
        $data['title']=$user->username;
        $data['deposit']=Deposits::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        $data['withdraw']=Withdraw::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        $data['profit']=Profits::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        $data['ticket']=Ticket::whereUser_id($user->id)->orderBy('id', 'DESC')->get();
        $data['earning'] = Earning::whereReferral($user->id)->orderBy('id', 'DESC')->get();
        $data['referral'] = Referral::whereRef_id($user->id)->orderBy('id', 'DESC')->get();
        $data['transfer'] = Transfer::where('sender_id',$user->id)->orWhere('receiver_id',$user->id)->orderBy('id', 'DESC')->get();
        return view('admin.user.edit', $data);
    }     
    
    public function Manageticket($id)
    {
        $data['ticket']=$ticket=Ticket::find($id);
        $data['title']='#'.$ticket->ticket_id;
        $data['client']=User::whereId($ticket->user_id)->first();
        $data['reply']=Reply::whereTicket_id($ticket->ticket_id)->get();
        return view('admin.user.edit-ticket', $data);
    }    
    
    public function Closeticket($id)
    {
        $ticket=Ticket::find($id);
        $ticket->status=1;
        $ticket->save();
        return back()->with('success', 'Ticket has been closed.');
    }     
    
    public function Blockuser($id)
    {
        $user=User::find($id);
        $user->status=1;
        $user->save();
        return back()->with('success', 'User has been suspended.');
    } 

    public function Unblockuser($id)
    {
        $user=User::find($id);
        $user->status=0;
        $user->save();
        return back()->with('success', 'User was successfully unblocked.');
    }

    public function Approvekyc($id)
    {
        $user=User::find($id);
        $user->kyc_status=2;
        $user->save();
        return back()->with('success', 'Kyc has been approved.');
    }    
    

    public function Rejectkyc($id)
    {
        $user=User::find($id);
        $user->kyc_status='0';
        $user->kyc_link='';
        $user->save();
        return back()->with('success', 'Kyc was successfully rejected.');
    } 

    public function Profileupdate(Request $request)
    {
        $data = User::findOrFail($request->id);
        $data->username=$request->username;
        $data->first_name=$request->first_name;
        $data->last_name=$request->last_name;
        $data->phone=$request->mobile;
        $data->address=$request->address;
        $data->balance=$request->balance;
        if(empty($request->email_verify)){
            $data->email_verify=0;	
        }else{
            $data->email_verify=$request->email_verify;
        }           
        if(empty($request->fa_status)){
            $data->fa_status=0;	
        }else{
            $data->fa_status=$request->fa_status;
        }              
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }
    

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/admin');
    }
        
}
