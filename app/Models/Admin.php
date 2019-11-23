<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\Btn;
//use App\Models\Role;
class Admin extends Authenticatable
{
    //黑名单
    protected $guarded=[];

    //继承trait
    use SoftDeletes,Btn;
    //指定软删除字段到数据表中哦
    protected $dates=['deleted_at'];
    //设置修改器，修改数据库密码字段加密
    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }
    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }

}
