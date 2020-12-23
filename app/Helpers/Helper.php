<?php
use App\Models\Etemplate;
use App\Models\Settings;
use App\Models\Logo;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

    function send_email($to, $name, $subject, $message) {
        $set=Settings::first();
        $mlogo=Logo::first();
        $from=$set->email;
        $site=$set->site_name;
        $address=$set->address;
        $phone=$set->phone;
        $email=$set->email;
        $logo=url('/').'/asset/'.$mlogo->image_link;
        $data=array('name'=>$name,'subject'=>$subject,'content'=>$message,'website'=>$set->site_name,'mc'=>$set->m_c,'address'=>$address,'phone'=>$phone,'email'=>$email,'logo'=>$logo);
        Mail::send(['html' => 'mail'], $data, function($message) use($name, $to, $subject, $from, $site) {
        $message->to($to, $name);
        $message->subject($subject);
        $message->from($from, $site);
        });
     }

if (! function_exists('user_ip')) {
    function user_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}

if (! function_exists('send_sms')) {
    function send_sms($recipients, $message)
    {
        $temp = Etemplate::first();
        $account_sid = $temp->twilio_sid;
        $auth_token = $temp->twilio_auth;
        $twilio_number = $temp->twilio_number;
        $client = new Client($account_sid, $auth_token);
        try{
            $client->messages->create($recipients, ['from' => $twilio_number,'body' => $message] );
        }catch (TwilioException $e){

        }catch (Exception $e){

        }
    }
}

if (!function_exists('castrotime')) {

    function castrotime($timestamp)
    {
        $datetime1=Carbon::today();
        $datetime2=date_create($timestamp);
        $diff=date_diff($datetime1, $datetime2);
        $timemsg=$datetime1->diffInDays($datetime2);    
        return $timemsg;
    }
}

if (!function_exists('convertFloat')) {
    function convertFloat($floatAsString)
    {
        $norm = strval(floatval($floatAsString));
    
        if (($e = strrchr($norm, 'E')) === false) {
            return $norm;
        }
    
        return number_format($norm, -intval(substr($e, 1)));
    }
}
