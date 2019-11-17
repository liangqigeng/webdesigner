<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>金陵贸易有限公司</title>
<link type="text/css" rel="stylesheet" href="/Public/Home/style/style.css" />
<script type="text/javascript" src="/Public/Home/js/jquery.pack.js"></script>
<script type="text/javascript" src="/Public/Home/js/jQuery.blockUI.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.SuperSlide.js"></script>
</head>

<body>
<div class="header">
	<h1 class="logo" title="金陵贸易有限公司"><a href="index.html"><img src="/Public/Home/images/logo.gif" alt="金陵贸易有限公司" /></a></h1>
    <p class="top_r"><a href="#" class="btn_i">设为主页</a><a href="#" class="btn_f">收藏本站</a></p>
</div>
<div class="nav">
	<div class="nav_left"></div>
    <ul>
     	<li><a href="<?php echo U('Index/index');?>">首  页</a></li>
        <li class="sel"><a href="<?php echo U('Index/about');?>">公司简 b  介</a></li>
        <li><a href="products.html">产品展示</a></li>
        <li><a href="<?php echo U('Article/knowledge');?>">行业知识</a></li>
        <li><a href="guestbook.html">客户留言</a></li>
        <li><a href="contact_us.html" class="nobg">联系我们</a></li>
     </ul>
     <div class="time" id="showTime">&nbsp;</div>
    <div class="nav_right"></div>
</div>
<div class="banner">
	<div class="effect">
                <div id="slideBox" class="slideBox">
                    <div class="hd">
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>

                        </ul>
                    </div>
                    <div class="bd">
                        <ul>
                            <li><img src="/Public/Home/images/banner.jpg" /></li>
                            <li><img src="/Public/Home/images/lrgimg5.jpg" /></li>
                            <li><img src="/Public/Home/images/lrgimg6.jpg" /></li>
                        </ul>
                    </div>
                </div>
        </div>
</div>
<div class="content">
	<div class="lefter">
    	<div class="title">
        	<h2 class="cBlue fB">行业知识<b class="cGrey fn">Knowledge</b></h2>
        </div>
        <ul class="list_r" style="padding-right:40px">
        <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="#"><?php echo ($v["art_title"]); ?></a><span class="time2"><?php echo (date('Y-m-d',$v["art_time"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="blank10"></div>
       <?php echo ($show); ?>
    </div>
	<div class="righter">
    	<div class="rightBox">
        	<a href="#" class="btn_s">我要留言</a>
        </div>
        <div class="blank10"></div>
    	<div class="rightBox">
        	<h3>最新公告<b class="cGrey fn">News</b></h3>
            <ul class="list_r">
            	<li><a href="#">祝贺公司网站正式上线</a></li>
                <li><a href="#">禁止保温材料现场调配 保证...</a></li>
                <li><a href="#">节能65%烧结页岩空心砖面世</a></li>
            </ul>
        </div>
        <div class="blank10"></div>
        <div class="rightBox">
        	<h3>友情链接<b class="cGrey fn">Links</b></h3>
            <ul class="list_r">
            	<li><a href="#">卓越网上购物</a></li>
                <li><a href="#">京东网上商城</a></li>
                <li><a href="#">携程旅行网</a></li>
            </ul>
        </div>
    </div>
    <div class="hackbox"></div>
    
    
</div>
<div class="footer">
	<p>地址：广东省广州市广州大道北  联系人：乐可   移动电话：13619829982 固定电话：020-1234567 传 真：020-1234567<img src="/Public/Home/images/qq.jpg" alt="" /></p>
	<p>Copyright @ 2009 金陵贸易有限公司 版权所有</p>
	<p><a href="#">粤ICP备08108790号</a></p>
</div>
<script type="text/javascript" src="/Public/Homejs/js.js"></script>
<script type="text/javascript">
    jQuery(".slideBox").slide( { mainCell:".bd ul",autoPlay:true} );
</script>
</body>
</html>