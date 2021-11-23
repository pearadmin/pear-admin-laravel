<?php

namespace App\Models\Backend;

use App\Model;

/**
 * App\Models\Backend\OperateLog
 *
 * @property int $id
 * @property int $user_id 操作用户ID
 * @property string $uri 操作地址
 * @property string|null $parameter 参数
 * @property string $method 请求方式：GET、POST、PUT、DELETE、HEAD
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog whereParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog whereUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OperateLog whereUserId($value)
 * @mixin \Eloquent
 */
class OperateLog extends Model
{
    protected $table = 'operate_log';
    protected $guarded = ['id'];
}
