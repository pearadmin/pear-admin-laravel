<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;

    protected $table = 'options';

    protected $guarded = [];

    //获取单个的配置信息
    static public function getOption($key,$uid = 0,$prefix = false){
        $r = self::where("key",$key)->where("uid",$uid);
        if($prefix){
            $r = $r->where("prefix",$prefix);
        }
        $r = $r->value("value")?:"";
        return $r;
    }

    static function getOptions($key,$uid = 0,$prefix = false)
    {
        $r = self::where("key",$key)->where("uid",$uid);
        if($prefix){
            $r = $r->where("prefix",$prefix);
        }
        return $r->get()->pluck('value');
    }

    //获取作用于某用户的配置项
    static public function getOwnOption($key,$uid,$prefix = false){
        $r = self::where("key",$key)->where("uid",$uid);
        if($prefix){
            $r = $r->where("prefix",$prefix);
        }
        $r = $r->value("value")?:"";
        return $r;
    }

    //设置配置项
    static public function setOption($key,$value,$uid = 0,$prefix = false){
        $o = self::where("key",$key)->where("uid",$uid);
        if($prefix){
            $o = $o->where("prefix",$prefix);
        }
        $o = $o->first();
        if($o){
            $o->value = $value;
            $o->save();
        }else{
            $option = new self;
            $option->key = $key?:"";
            $option->value = $value?:"";
            $option->prefix = $prefix?:"";
            $option->uid = $uid;
            $option->save();
        }
        return true;
    }

    //获取所有具有相同前缀的配置项
    static public function getPrefix($uid = 0,$prefix){
        $list = self::where("prefix",$prefix)->where("uid",$uid)->get();
        $r = [];
        foreach($list as $v){
            $r = array_merge($r,[$v->key=>$v->value]);
        }
        return $r;
    }

    //批量设置有前缀的配置项
    static public function setPrefix($data,$uid = 0,$prefix=false){
        foreach($data as $k=>$v){
            $arr = [];
            if($prefix){
                $arr = ["key"=>$k,"value"=>$v?:"","uid"=>$uid,"prefix"=>$prefix];
                if(self::where("key",$arr["key"])->where("uid",$uid)->where("prefix",$prefix)->count()){
                    self::where("key",$arr["key"])->where("uid",$uid)->where("prefix",$prefix)->update(["value"=>$arr["value"]]);
                }else{
                    self::create($arr);
                }
            }else{
                $arr = ["key"=>$k,"value"=>$v,"uid"=>$uid];
                if(self::where("key",$arr["key"])->where("uid",$uid)->count()){
                    self::where("key",$arr["key"])->where("uid",$uid)->update(["value"=>$arr["value"]]);
                }else{
                    self::create($arr);
                }
            }
        }
    }

    //获取多数option
    static public function getMore($keys = [],$uid=0,$prefix=false){
        $db = self::where("uid",$uid)->whereIn("key",$keys);
        if($prefix){
            $db = $db->where("prefix",$prefix);
        }
        $r = $db->get();
        return $r;
    }

    //获取多数option
    static public function getMoreData($keys = [],$uid=0,$prefix=false){
        $db = self::where("uid",$uid)->whereIn("key",$keys);
        if($prefix){
            $db = $db->where("prefix",$prefix);
        }
        $arr = [];
        $list = $db->get();
        foreach($list as $k=>$v){
            $arr[$v->key] = $v->value;
        }
        return $arr;
    }
}
