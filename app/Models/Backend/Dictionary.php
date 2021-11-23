<?php

namespace App\Models\Backend;

use App\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Backend\Dictionary
 *
 * @property int $id
 * @property string $name 名称
 * @property int $parent_id 父级ID
 * @property int $sort 排序
 * @property int|null $disable 是否删除1：是2：否
 * @property string|null $code 代码
 * @property string|null $desc
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Dictionary[] $childs
 * @property-read int|null $childs_count
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereDisable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dictionary whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dictionary extends Model
{
    const NOT_DISABLE = 2;
    protected $table = 'dictionary';
    protected $fillable = ['name','code','sort','desc','parent_id','remember_token'];
    protected $hidden = ['remember_token'];

    //子分类
    public function childs()
    {
        return $this->hasMany('App\Models\Backend\Dictionary','parent_id','id');
    }

    //所有子类
    public function allChilds()
    {
        return $this->childs()->with('allChilds');
    }


    public function getDictionaryByPid($pid,$keyword=''){
        $where[]=['disable',   '=', self::NOT_DISABLE];
        $where[]=['parent_id', '=', $pid];
        if ($keyword!=''){
            $where[]=['name', 'like', '%'.$keyword.'%'];
        }
        return DB::table($this->table)->where($where)->orderBy('sort','asc')->get()->toArray();
    }

    public function getDictionaryById($id){
        return DB::table($this->table)->where('disable',self::NOT_DISABLE)->where('id',$id)->first();
    }

    //假删除任务数据
    public function DisabledDictionary($ids)
    {
        return DB::table($this->table)->whereIn('id',$ids)->update(['disable' => 1]);
    }

}
