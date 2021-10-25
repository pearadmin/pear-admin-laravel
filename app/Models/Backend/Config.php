<?php

namespace App\Models\Backend;

use App\Model;

/**
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
