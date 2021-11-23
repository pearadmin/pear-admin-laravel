<?php

namespace App\Models\Backend;

use App\Model;

/**
 * App\Models\Backend\Config
 *
 * @property integer $id
 * @property int $group_id
 * @property string $label
 * @property string $key
 * @property string $val
 * @property string $type
 * @property string $content
 * @property string $tips
 * @property boolean $sort
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereTips($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereVal($value)
 * @mixin \Eloquent
 */
class Config extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['group_id', 'label', 'key', 'val', 'type', 'content', 'tips', 'sort', 'created_at', 'updated_at'];

}
