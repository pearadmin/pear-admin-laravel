<?php

namespace App\Models\Backend;

use App\Model;

/**
 * App\Models\Backend\Category
 *
 * @property integer $id
 * @property string $name
 * @property int $parent_id
 * @property int $sort
 * @property int $type
 * @property string $updated_at
 * @property string $created_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Backend\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $childs
 * @property-read int|null $childs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
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
