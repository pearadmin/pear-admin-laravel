<?php

namespace App\Models\Backend;

use App\Model;

/**
 * App\Models\Backend\Article
 *
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FileStorages[] $file
 * @property-read int|null $file_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Backend\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereClick($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @mixin \Eloquent
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
