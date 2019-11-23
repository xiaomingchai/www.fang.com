@extends('admin.public.main')
<title>修改角色 - 角色管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
@section('cnt')
    <article class="page-container">
        <form class="form form-horizontal" id="form-admin-add" action="{{route('admin.role.update',$role)}}" method="post">
            @include('admin.public.msg')
            @csrf
            {{ method_field('PUT') }}
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{$role->name}}" placeholder="请输入角色" id="name" name="name">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限：</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <ul>
                        @foreach($nodedata as $item)
                            <li style="padding-left: {{$item['level']*20}}px;">
                                <input type="checkbox" value="{{ $item['id'] }}" name="node_ids[]"
                                @if(in_array($item['id'],$nodes)) checked @endif>
                                {{ $item['html'] }}{{ $item['name'] }}
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;添加角色&nbsp;&nbsp;">
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
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-admin-add").validate({
            rules:{
                adminName:{
                    required:true,
                    minlength:4,
                    maxlength:16
                },
                password:{
                    required:true,
                },
                password2:{
                    required:true,
                    equalTo: "#password"
                },
                sex:{
                    required:true,
                },
                phone:{
                    required:true,
                    isPhone:true,
                },
                email:{
                    required:true,
                    email:true,
                },
                adminRole:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "xxxxxxx" ,
                    success: function(data){
                        layer.msg('添加成功!',{icon:1,time:1000});
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
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