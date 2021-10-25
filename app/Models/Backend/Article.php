<?php

namespace App\Models\Backend;

use App\Model;

/**
 * @property integer $id
 * @property int $category
 * @property string $title
 * @property string $description
 * @property string $content
 * @property int $click
 * @property string $thumb
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Article extends Model
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
    protected $fillable = ['category', 'title', 'description', 'content', 'click', 'thumb', 'created_at', 'updated_at', 'deleted_at'];

    //文章所属分类
    public function category()
    {
        return $this->hasOne('App\Models\Backend\Category', 'id','category')->withDefault(['name'=>'无分类']);
    }

    //与标签多对多关联
    public function tags()
    {
        return $this->belongsToMany('App\Models\Backend\Tag','article_tag','article_id','tag_id');
    }

    //所有文件
    public function file()
    {
        return $this->morphMany('App\Models\FileStorages', 'app');
    }

}
