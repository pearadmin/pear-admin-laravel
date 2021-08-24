<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $table = 'login_log';
    protected $guarded = ['id'];
}
