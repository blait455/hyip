<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawm extends Model {
	protected $table = 'withdrawm';
    protected $fillable = array('method', 'status');

}
