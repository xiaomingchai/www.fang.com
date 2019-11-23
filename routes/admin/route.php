<?php
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('login','admin\LoginController@index');

Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.'],function(){

    //后台登录路由
    Route::get('login','LoginController@index')->name('login');
    Route::post('login','LoginController@login')->name('login');



    Route::group(['middleware'=>['checkadmin']],function(){
        //后台首页访问路由
        Route::get('index','IndexController@index')->name('index');
        //欢迎页面路由
//        Route::get('welcome','IndexController@welcome')->name('welcome')->middleware('checkadmin');
        Route::get('welcome','IndexController@welcome')->name('welcome');
        //页面退出路由
        Route::get('logout','IndexController@logout')->name('logout');
        //用户列表显示路由
        Route::get('list','AdminController@index')->name('user.list');
        //测试路由
//        Route::get('kw','AdminController@test');
        //添加用户显示路由
        Route::get('create','AdminController@create')->name('user.create');
        //添加用户提交路由
        Route::post('create','AdminController@store')->name('user.store');


        //修改用户显示
        Route::get('edit/{id}','AdminController@edit')->name('user.edit');

        //修改用户提交
        Route::put('edit/{id}','AdminController@update')->name('user.update');

        //删除用户
        Route::delete('destroy/{id}','AdminController@destroy')->name('user.destroy');
        //定义全删除路由
        Route::delete('deleall','AdminController@delall')->name('user.delall');
        //查询软删除的路由
        Route::get('restore','AdminController@restore')->name('user.restore');



        //角色路由
        Route::resource('role','RoleController');
        //权限路由
        Route::resource('node','NodeController');
        // 文件上传 admin/article/upfile  admin/article/{article}
        Route::post('article/upfile','ArticleController@upfile')->name('article.upfile');
        //文章路由
        Route::resource('article','ArticleController');
    });

});