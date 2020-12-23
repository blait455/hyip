<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model {
    protected $table = "audit_logs";
    protected $guarded = [];
}
