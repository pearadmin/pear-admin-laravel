<?php

namespace App\Models\Backend;

use App\Model;

/**
 * App\Models\Backend\Tag
 *
 * @property integer $id
 * @property string $name
 * @property boolean $sort
 * @property string $created_at
 * @property string $updated_at
 * @property int $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Backend\Article[] $articles
 * @property-read int|null $articles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
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
    protected $fillable = ['name', 'sort', 'created_at', 'updated_at', 'type'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    //与资讯多对多关联
    public function articles()
    {
        return $this->belongsToMany('App\Models\Backend\Article','article_tag','tag_id','article_id');
    }
}
