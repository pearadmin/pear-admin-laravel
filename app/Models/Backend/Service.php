<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $sub_title
 * @property string $description
 * @property string $icon
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Service extends Model
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
    protected $fillable = ['title', 'sub_title', 'description', 'icon', 'image', 'created_at', 'updated_at', 'deleted_at'];

    //所有文件
    public function file()
    {
        return $this->morphMany('App\Models\FileStorages', 'app');
    }
}
