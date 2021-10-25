<?php

namespace App\Models\Backend;

use App\Model;

/**
 * @property integer $id
 * @property string $name
 * @property int $parent_id
 * @property int $sort
 * @property int $type
 * @property string $updated_at
 * @property string $created_at
 */
class Category extends Model
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
    protected $fillable = ['name', 'parent_id', 'sort', 'type', 'updated_at', 'created_at'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    //子分类
    public function childs()
    {
        return $this->hasMany('App\Models\Backend\Category','parent_id','id');
    }

    //所有子类
    public function allChilds()
    {
        return $this->childs()->with('allChilds');
    }

    //分类下所有的文章
    public function articles()
    {
        return $this->hasMany('App\Models\Backend\Article');
    }
}
