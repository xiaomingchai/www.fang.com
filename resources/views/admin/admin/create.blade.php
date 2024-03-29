@extends('admin.public.main')
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
@section('cnt')
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add" action="{{route('admin.user.store')}}" method="post">
            @include('admin.public.msg')
            @csrf
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{old('username')}}" placeholder="请输入用户名" id="username"
                           name="username">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>实名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{old('truename')}}" placeholder="请输入用户名" id="truename"
                           name="truename">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="sex" type="radio" id="sex-1" value="先生" checked>
                        <label for="sex-1">先生</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="sex-2" name="sex" value="女士">
                        <label for="sex-2">女士</label>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{old('phone')}}" placeholder="" id="phone"
                           name="phone">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" placeholder="@" name="email" id="email"
                           value="{{old('email')}}">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password"
                           name="password">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="password" class="input-text" autocomplete="off" placeholder="确认新密码" id="password2"
                           name="password_confirmation">
                </div>
            </div>
            {{--        <div class="row cl">--}}
            {{--            <label class="form-label col-xs-4 col-sm-3">角色：</label>--}}
            {{--            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">--}}
            {{--			<select class="select" name="adminRole" size="1">--}}
            {{--				<option value="0">超级管理员</option>--}}
            {{--				<option value="1">总编</option>--}}
            {{--				<option value="2">栏目主辑</option>--}}
            {{--				<option value="3">栏目编辑</option>--}}
            {{--			</select>--}}
            {{--			</span> </div>--}}
            {{--        </div>--}}
            {{--        <div class="row cl">--}}
            {{--            <label class="form-label col-xs-4 col-sm-3">备注：</label>--}}
            {{--            <div class="formControls col-xs-8 col-sm-9">--}}
            {{--                <textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>--}}
            {{--                <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3">角色：</label>
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    @foreach($roledata as $id=>$name)
                        <div class="radio-box">
                            <label><input name="role_id" type="radio" value="{{$id}}" checked>
                                {{$name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </article>
@endsection


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{staticAdminweb()}}lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="{{staticAdminweb()}}lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="{{staticAdminweb()}}lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function () {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            rules: {
                adminName: {
                    required: true,
                    minlength: 4,
                    maxlength: 16
                },
                password: {
                    required: true,
                },
                password2: {
                    required: true,
                    equalTo: "#password"
                },
                sex: {
                    required: true,
                },
                phone: {
                    required: true,
                    isPhone: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                adminRole: {
                    required: true,
                },
            },
            onkeyup: false,
            focusCleanup: true,
            success: "valid",
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "xxxxxxx",
                    success: function (data) {
                        layer.msg('添加成功!', {icon: 1, time: 1000});
                    },
                    error: function (XmlHttpRequest, textStatus, errorThrown) {
                        layer.msg('error!', {icon: 1, time: 1000});
                    }
                });
                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>