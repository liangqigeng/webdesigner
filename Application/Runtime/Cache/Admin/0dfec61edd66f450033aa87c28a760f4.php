<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.zi-han.net/theme/hplus/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Webdesigner - 登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">
    <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/login.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>
    <style>
        .verify{
            border: 1px solid #e5e6e7;
            border-radius: 1px;
            padding: 6px 12px;
            float: left;
            width: 55%;
            transition: border-color .15s ease-in-out 0s, box-shadow .15s ease-in-out 0s;
            font-size: 14px;
            color: black;
            }
    </style>
</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-6 center-block text-center" style="float:none;">
                <form method="post" action="">
                    <h4 class="no-margins text-info">后台登录</h4>
                    <p class="m-t-md text-success">欢迎登录到后台。</p>
                    <input type="text" class="form-control uname" placeholder="用户名" name="admin_name"/>
                    <input type="password" class="form-control pword m-b" placeholder="密码" name="admin_pwd"/>
                    <input type="text" name="verify"  placeholder="验证码" class="verify">
                    <img src="<?php echo U('verify');?>" onclick="this.src='<?php echo U('Admin/Login/verify');?>'" width="120" height="32px" alt="点击切换图片"/>
                    <button class="btn btn-success btn-block" type="submit">登录</button>
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2015 All Rights Reserved. 
            </div>
        </div>
    </div>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
</html>