<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model {
    protected $table = "ref_earning";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User','referral');
    }     
    public function shared()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }    
    public function plan()
    {
        return $this->belongsTo('App\Models\Plans','plan_id');
    }
    
    
}
