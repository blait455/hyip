<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Check extends Model {
    protected $table = "earning";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }      
    public function event()
    {
        return $this->belongsTo('App\Models\Profits','ticket');
    }
    
    
}
