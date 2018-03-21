<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="/home/css/style.css" />
<link rel="stylesheet" type="text/css" href="/home/css/shopping-mall-index.css" />
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/zhonglin.js"></script>
</head>

<body>

	<div class="sign-logo w1200">
	<h1><a href="#" title="宅客微购"><img src="/home/images/logo.jpg" /></a></h1>
</div>

	<div class="sign-con w1200">
	<img src="/home/images/logn-tu.gif" class="sign-contu f-l" />

    <div class="sign-ipt f-l">
        <p style="margin-top:-20px;text-align: center;">用户名密码登陆</p>
        <p style="height:20px; color:#fc4343; font-size:12px;" id="cuowu"></p>
        <input type="text" placeholder="手机号/用户名" name="username" id="username" style="margin-bottom:20px;"/>
        <input type="password" placeholder="密码" name="password" id="password" style="margin-bottom:20px;"/><br />
        <input type="text" placeholder="验证码" name="captcha" id="captcha" style="width:100px; float:left;"/><img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}?'+Math.random()" alt="" style="vertical-align:bottom;float:left;height: 35px;width: 113px; margin-left:50px;"/>
        <button class="slig-btn" type="submit" id="submit">登录</button>
        <p><a href="#">立即注册</a><a href="#" class="wj">忘记密码？</a></p>
        
    </div>
    <div style="clear:both;"></div>
</div>

    <!--底部服务-->
    <div class="ft-service">
    	<div class="w1200">
        	<div class="sv-con-l2 f-l">
            	<dl>
                	<dt><a href="#">新手上路</a></dt>
                    <dd>
                    	<a href="#">购物流程</a>
                    	<a href="#">在线支付</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">配送方式</a></dt>
                    <dd>
                    	<a href="#">货到付款区域</a>
                    	<a href="#">配送费标准</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">购物指南</a></dt>
                    <dd>
                    	<a href="#">常见问题</a>
                    	<a href="#">订购流程</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">售后服务</a></dt>
                    <dd>
                    	<a href="#">售后服务保障</a>
                    	<a href="#">退款说明</a>
                    	<a href="#">新手选购商品总则</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">关于我们</a></dt>
                    <dd>
                    	<a href="#">投诉与建议</a>
                    </dd>
                </dl>
                <div style="clear:both;"></div>
            </div>
        	<div class="sv-con-r2 f-r">
            	<p class="sv-r-tle">187-8660-5539</p>
            	<p>周一至周五9:00-17:30</p>
            	<p>（仅收市话费）</p>
            	<a href="#" class="zxkf">24小时在线客服</a>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--底部 版权-->
    <div class="footer w1200">
    	<p>
        	<a href="#">关于我们</a><span>|</span>
        	<a href="#">友情链接</a><span>|</span>
        	<a href="#">宅客微购社区</a><span>|</span>
        	<a href="#">诚征英才</a><span>|</span>
        	<a href="#">商家登录</a><span>|</span>
        	<a href="#">供应商登录</a><span>|</span>
        	<a href="#">热门搜索</a><span>|</span>
        	<a href="#">宅客微购新品</a><span>|</span>
        	<a href="#">开放平台</a>
        </p>
        <p>
        	沪ICP备13044278号<span>|</span>合字B1.B2-20130004<span>|</span>营业执照<span>|</span>互联网药品信息服务资格证<span>|</span>互联网药品交易服务资格证
        </p>
    </div>
    
</body>
<script type="text/javascript">
    $(function(){
        $('#password').focus(function(){
            if($('#username').val() &&  $('#cuowu').html()=='请输入用户名'){
                $('#username').css('border','1px solid #ccc');
                $('#cuowu').html(' ');
            }    
        });
        $('#captcha').focus(function(){
            if($('#password').val() &&  $('#cuowu').html()=='请输入密码'){
                $('#password').css('border','1px solid #ccc');
                $('#cuowu').html(' ');
            }    
        });
        $('#submit').click(function(){
            // alert(1);
            reg =  /\S/;
            username = $('#username').val();//获取username值
            password = $('#password').val();//获取密码
            captcha = $('#captcha').val();//获取验证码
            if(!reg.test(username)){
                 $('#cuowu').html('请输入用户名');
                 $('#password').css('border','1px solid #ccc');
                 $('#captcha').css('border','1px solid #ccc');
                 $('#username').css('border','1px solid red');
                 return false;
            }
            if(!reg.test(password)){
                $('#cuowu').html('请输入密码');
                $('#username').css('border','1px solid #ccc');
                $('#captcha').css('border','1px solid #ccc');
                $('#password').css('border','1px solid red');
                return false;
            }
            if(!reg.test(captcha)){
                 $('#cuowu').html('请输入验证码');
                 $('#password').css('border','1px solid #ccc');
                 $('#captcha').css('border','1px solid red');
                 $('#username').css('border','1px solid #ccc');
                 return false;
            }

             $.ajax({
                url: "/home/login/login",
                type:"post",     //请求类型
                data:{
                    username:username,
                    password:password,
                    captcha:captcha,
                    "_token":"{{ csrf_token() }}",
                    }, 
                success: function(data){
                //laravel返回的数据是不经过这里的
                    if(data=='登陆成功'){
                        location.href="/";
                    }else{
                        $('#cuowu').html(data);
                    }
                },
                error: function(msg) {
                    var json=JSON.parse(msg.responseText);
                    $('#cuowu').html(json.errors.captcha);
                },
                }) 
               
            return false;
           
        });
    });
</script>
</html>
