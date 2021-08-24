<?php


namespace App\Models\Frontend;


use Illuminate\Database\Eloquent\Model;

class FeBanner extends Model
{
    protected $table = 'fx_banner';
    protected $hidden = ['remember_token'];
}
