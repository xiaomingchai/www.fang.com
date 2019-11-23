<?php


namespace App\Models\Traits;


trait Btn
{
    private function checkAuth(string $routeName){
        $auths=request()->auths;
        //权限判断
        if(in_array($routeName,$auths)&& request()->username!='admin'){
            return false;
        }
        return true;

    }
    //修改
    public function editBtn(string $routeName){
        if($this->checkAuth($routeName)){
//            return "<a>修改</a>";
            return "<a title=\"编辑\"  href=".route($routeName,$this)."  class='ml-5'><span class=\"label label-success radius\">编辑</span></a>";
        }
        return '';
    }

    //删除
    public function delBtn(string $routeName){
        if($this->checkAuth($routeName)){
            return "<a title=\"删除\"  data-href=".route($routeName,$this)."  class='ml-5 del'><span class=\"label label-danger radius\">删除</span></a>";
        }
        return '';
    }

}