<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
    <style type="text/css">
        .table{
            table-layout: fixed;
        }
    </style>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">H+</h1>

            </div>
            <h3>欢迎使用 H+</h3>
            <span id="cuowu" style="display:block; height:10px; color:#fc4343; font-size:12px; text-align:left;"></span>
            <form class="m-t" role="form" method="post">
                <div class="form-group">
                   
                    <input type="text" class="form-control" placeholder="用户名" name="username" id="username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" name="password" id="password">
                </div>
                <button type="submit" id="submit" class="btn btn-primary block full-width m-b">登 录</button>
            </form>
        </div>
    </div>

    <!-- 全局js -->
    <script src="/js/jquery.min.js?v=2.1.4"></script>
    <script src="/js/bootstrap.min.js?v=3.3.6"></script>

    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
    <!--统计代码，可删除-->

</body>
<script type="text/javascript">
    $(function(){
        $('#submit').click(function(){
            reg =  /\S/;
            username = $('#username').val();//获取username值
            password = $('#password').val();//获取
            if(!reg.test(username)){
                 $('#cuowu').html('请输入用户名');
                 $('#password').css('border','0px solid red');
                 $('#username').css('border','1px solid red');
                 return false;
            }
            if(!reg.test(password)){
                $('#cuowu').html('请输入密码');
                $('#username').css('border','0px solid red');
                $('#password').css('border','1px solid red');
                return false;
            }
            $.post("/admin/login",{username:username,password:password,"_token":"{{ csrf_token() }}"},function(data){
                    if(data=="登陆成功"){
                        location.href="/admin/index";
                    }else{
                        cuo = $('#cuowu').html(data);
                    }  

            });
            return false;
           
        });
    });
</script>
</html>
