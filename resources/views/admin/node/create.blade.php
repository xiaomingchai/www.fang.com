@extends('admin.public.main')
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
@section('cnt')
    {{-- 错误信息 --}}
    @include('admin.public.msg')
    <article class="page-container">

        <form action="{{ route('admin.node.store') }}" method="post" class="form form-horizontal" id="form-node-add">
            @csrf
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">上级菜单：</label>
                <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="pid" class="select">
					@foreach($data as $id=>$name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
				</select>
				</span></div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">* </span>权限名称：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" value="{{ old('name') }}" class="input-text" name="name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">路由别名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" value="{{ old('route_name') }}" class="input-text" name="route_name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">菜单：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <label><input name="is_menu" type="radio" value="0" checked>
                            否</label>
                    </div>
                    <div class="radio-box">
                        <label><input type="radio" name="is_menu" value="1">
                            是</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="添加新权限">
                </div>
            </div>
        </form>
    </article>
@endsection

@section('js')
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{staticAdminweb()}}lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="{{staticAdminweb()}}lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="{{staticAdminweb()}}lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    // 表单验证
    $("#form-node-add").validate({
        // 规则
        rules: {
            // 表单名
            name: {
                // 规则名 true/false
                required: true
            }
        },
        // 提示消息
        messages: {
            name: {
                required: '权限名称不能为空'
            }
        },
        // 回车取消
        onkeyup: false,
        // 成功时样式
        success: "valid",
        // 验证通过后，处理回调函数
        submitHandler: function (form) {
            // 验证通过，使用js触发表单提交事件
            form.submit();
        }
    });
</script>
@endsection
<!--/请在上方写此页面业务相关的脚本-->
