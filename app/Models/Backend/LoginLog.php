<?php

namespace App\Models\Backend;

use App\Model;

/**
 * App\Models\Backend\LoginLog
 *
 * @property int $id
 * @property string $username 登录用户名
 * @property string $ip 登录IP地址
 * @property string $method 请求方式
 * @property string $user_agent UserAgent
 * @property string|null $remark 备注
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog whereUserAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginLog whereUsername($value)
 * @mixin \Eloquent
 */
class LoginLog extends Model
{
    protected $table = 'login_log';
    protected $guarded = ['id'];
}
