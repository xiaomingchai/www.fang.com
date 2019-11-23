<?php


namespace App\Models\Service;
use App\Models\Admin;
use Illuminate\Http\Request;


class AdminService
{
    public function getList(Request $request,int $pagesize=10){
        $st=$request->get('st');
        $et=$request->get('et');
        $kw=$request->get('kw');
        $userid=auth()->id();
       return Admin::when($st,function($query) use($st,$et){
            $st=date("Y-m-d 00:00:00",strtotime($st));
            $et=date("Y-m-d 23:59:59",strtotime($et));
            $query->whereBetween('created_at',[$st,$et]);
        })->when($kw,function($query) use($kw){
            $query->where('username','like',"%{$kw}%");
        })->where('id', '!=', $userid)->orderBy('id','desc')->withTrashed()->paginate($pagesize);
    }
}