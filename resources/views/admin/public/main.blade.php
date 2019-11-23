<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{staticAdminweb()}}lib/html5shiv.js"></script>
    <script type="text/javascript" src="{{staticAdminweb()}}lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{staticAdminweb()}}static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="{{staticAdminweb()}}static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="{{staticAdminweb()}}lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="{{staticAdminweb()}}static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{staticAdminweb()}}static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" href="/css/pagination.css">
    @yield('css')
    <!--[if IE 6]>
    <script type="text/javascript" src="{{staticAdminweb()}}lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->

</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span
            class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r"
                                                  style="line-height:1.6em;margin-top:3px"
                                                  href="javascript:location.replace(location.href);" title="刷新"><i
                class="Hui-iconfont">&#xe68f;</i></a></nav>
@yield('cnt')
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{staticAdminweb()}}lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{staticAdminweb()}}lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{staticAdminweb()}}static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{staticAdminweb()}}static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
@yield('js')