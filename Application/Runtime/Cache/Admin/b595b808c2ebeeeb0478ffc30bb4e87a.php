<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:16:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>后台首页</title>

    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/Public/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/Upload/<?php echo ($info['medium_photo']); ?>" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo ($info['admin_name']); ?></strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
                                </li>
                                <li><a class="J_menuItem" href="profile.html">个人资料</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="login.html">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Index/index_right');?>"><i class="fa fa-home"></i> <span class="nav-label">首页</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Admin/admin_list');?>"><i class="fa fa-users"></i> <span class="nav-label">管理员管理</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Cat/cat_art_list');?>"><i class="fa fa-users"></i> <span class="nav-label">文章分类管理</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Article/article_list');?>"><i class="fa fa-users"></i> <span class="nav-label">文章管理</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Nav/nav_list');?>"><i class="fa fa-users"></i> <span class="nav-label">导航管理</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Config/config_edit');?>"><i class="fa fa-users"></i> <span class="nav-label">配置管理</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Banner/banner_list');?>"><i class="fa fa-users"></i> <span class="nav-label">广告管理</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Page/page_list');?>"><i class="fa fa-users"></i> <span class="nav-label">单页管理</span></a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Tag/tag_list');?>"><i class="fa fa-users"></i> <span class="nav-label">标签管理</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:void(0);" class="active J_menuTab" data-id="<?php echo U('Index/index_right');?>">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                </button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a href="<?php echo U('loginOut');?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
            <div class="row J_mainContent" id="content-main">
            <!-- 主要框架部分 -->
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo U('Admin/Index/index_right');?>" frameborder="0" data-id="<?php echo U('Admin/Index/index_right');?>" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2016-2020 <a href="http://webdesigner.liangqigeng.top" target="_blank">海南软件职业技术学院</a>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Public/Admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/Admin/js/plugins/layer/layer.min.js"></script>
    <script src="/Public/Admin/js/hplus.min.js?v=4.1.0"></script>
    <script type="text/javascript" src="/Public/Admin/js/contabs.min.js"></script>
    <script src="/Public/Admin/js/plugins/pace/pace.min.js"></script>
</body>
</html>