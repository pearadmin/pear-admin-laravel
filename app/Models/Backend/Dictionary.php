<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
