<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<link rel="stylesheet" type="text/css" href="/home/css/style.css" />
<link rel="stylesheet" type="text/css" href="/home/css/shopping-mall-index.css" />
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/zhonglin.js"></script>
</head>
<body>
	<!--top 开始-->
    <div class="top">
    	<div class="top-con w1200">
        	<p class="t-con-l f-l">您好，欢迎来到宅客微购</p>
            <ul class="t-con-r f-r">
            	<li><a href="#">我 (个人中心)</a></li>
            	<li><a href="#">我的购物车</a></li>
            	<li><a href="#">我的订单</a></li>
            	<li class="erweima">
                	<a href="#">扫描二维码</a>
                    <div class="ewm-tu">
                    	<a href="#"><img src="/home/images/erweima-tu.jpg" /></a>
                    </div>
                </li>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--logo search 开始-->
    <!--内容开始-->

    <div class="password-con registered" style="text-align: center; ">
       <p style="text-align: center; font-size:20px;">注册</p>
    	<div class="psw">
        	<p class="psw-p1">用户名</p>
            <input type="text" placeholder="用户名" name="username"/>
            <span class="yonghu"></span>
        </div>
    	<div class="psw">
        	<p class="psw-p1">输入密码</p>
            <input type="text" placeholder="请输入密码" name="password"/>
            <span class="yimima"></span>
        </div>
    	<div class="psw">
        	<p class="psw-p1">确认密码</p>
            <input type="text" placeholder="请再次确认密码" name="password-one"/>
            <span class="mima"></span>
        </div>
    	<div class="psw psw3">
        	<p class="psw-p1">验证码</p>
            <input type="text" placeholder="请输入验证码" />
            <img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}?'+Math.random()" alt="" style="vertical-align:bottom;display:inline-block; text-align:left; height: 35px;width: 113px; margin-left:40px;"/>
            <span class="yanzheng"></span>
        </div>
        <div class="agreement" style="margin-left:30px;">
        	<input type="checkbox" name="hobby"></input>
            <p>我有阅读并同意<span>《宅客微购网站服务协议》</span></p>
        </div>
        <button class="psw-btn">立即注册</button>
        <p class="sign-in">已有账号？请<a href="#">登录</a></p>
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
</html>
