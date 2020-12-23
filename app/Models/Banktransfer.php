<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banktransfer extends Model {
    protected $table = "bank_transfer";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
