<?php

namespace App\Models\Backend;

use App\Model;

class LoginLog extends Model
{
    protected $table = 'login_log';
    protected $guarded = ['id'];
}
