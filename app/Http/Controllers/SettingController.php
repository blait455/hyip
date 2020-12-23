<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Validator;
use App\Models\User;
use App\Models\Settings;
use App\Models\Admin;
use App\Models\Etemplate;
use Carbon\Carbon;


class SettingController extends Controller
{

    public function Settings()
    {
        $data['title']='General settings';
        $data['val']=Admin::first();
        return view('admin.settings.index', $data);
    }     
    
    public function Email()
    {
        $data['title']='Email settings';
        $data['val']=Etemplate::first();
        return view('admin.settings.email', $data);
    } 

    public function EmailUpdate(Request $request)
    {
        $data = Etemplate::findOrFail(1);
        $data->esender=$request->sender;
        $data->emessage=$request->message;
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }      
    
    public function Account()
    {
        $data['title']='Change account details';

        return view('admin.settings.account', $data);
    } 

    public function AccountUpdate(Request $request)
    {
        $data = Admin::findOrFail(1);
        $data->username=$request->username;
        $data->password=Hash::make($request->password);
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }      
    
    public function SettingsUpdate(Request $request)
    {
        $data = Settings::findOrFail(1);
        $data->site_name=$request->site_name;
        $data->tawk_id=$request->tawk_id;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->title=$request->title;
        $data->balance_reg=$request->bal;
        $data->withdraw_charge=$request->withdraw_charge;
        $data->transfer_charge=$request->transfer_charge;
        $data->site_desc=$request->site_desc;
        $data->address=$request->address;
        $data->d_c=$request->d_c;
        $data->m_c=$request->m_c;
        $data->s_c=$request->s_c;
        $data->upgrade_fee=$request->upgrade_fee;
        if(empty($request->kyc)){
            $data->kyc=0;	
        }else{
            $data->kyc=$request->kyc;
        }    
        if(empty($request->email_activation)){
            $data->email_verification=0;	
        }else{
            $data->email_verification=$request->email_activation;
        }             
        if(empty($request->email_notify)){
            $data->email_notify=0;	
        }else{
            $data->email_notify=$request->email_notify;
        }    
        if(empty($request->registration)){
            $data->registration=0;	
        }else{
            $data->registration=$request->registration;
        }           
        if(empty($request->referral)){
            $data->referral=0;	
        }else{
            $data->referral=$request->referral;
        }         
        if(empty($request->recaptcha)){
            $data->recaptcha=0;	
        }else{
            $data->recaptcha=$request->recaptcha;
        }         
        if(empty($request->language)){
            $data->language=0;	
        }else{
            $data->language=$request->language;
        }         
        if(empty($request->blog)){
            $data->blog=0;	
        }else{
            $data->blog=$request->blog;
        } 
        if(empty($request->services)){
            $data->services=0;	
        }else{
            $data->services=$request->services;
        }         
        if(empty($request->plan)){
            $data->plan=0;	
        }else{
            $data->plan=$request->plan;
        }        
        if(empty($request->review)){
            $data->review=0;	
        }else{
            $data->review=$request->review;
        }        
        if(empty($request->team)){
            $data->team=0;	
        }else{
            $data->team=$request->team;
        }        
        if(empty($request->stat)){
            $data->stat=0;	
        }else{
            $data->stat=$request->stat;
        }        
        if(empty($request->contact)){
            $data->contact=0;	
        }else{
            $data->contact=$request->contact;
        }        
        if(empty($request->faq)){
            $data->faq=0;	
        }else{
            $data->faq=$request->faq;
        }         
        if(empty($request->upgrade_status)){
            $data->upgrade_status=0;	
        }else{
            $data->upgrade_status=$request->upgrade_status;
        }           
        if(empty($request->transfer)){
            $data->transfer=0;	
        }else{
            $data->transfer=$request->transfer;
        }        
        $res=$data->save();
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }  
}
