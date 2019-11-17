<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/form_basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:15 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - 基本表单</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link rel="stylesheet" href="/Public/Admin/js/kindeditor/themes/default/default.css" />
    <link href="/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <style>
        #upload{
            opacity:0;
        }
       #img{
            display:block;
            border:1px solid #999;
            height:200px;
            width:200px;
            text-align:center;
            margin-top:-32px;
            margin-left:170px;
        }
    </style>
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>文章信息</h5>
                        <small><a href="<?php echo U('admin_list');?>" style="color:#ccc;margin-left:10px"><i class="fa fa-list"></i>文章列表</a></small>
                        <div class="ibox-tools"><button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> 刷新</button>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="admin_id" value="<?php echo ($admin["admin_id"]); ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">管理员名称</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="admin_name" value="<?php echo ($admin['admin_name']); ?>">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                               <div class="form-group">
                                <label class="col-sm-2 control-label">管理员密码</label>
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" name="admin_pwd" value="<?php echo ($admin['admin_pwd']); ?>">
                                </div>
                            </div>
                             <div class="hr-line-dashed"></div>
                             <div class="form-group">
                                <label class="col-sm-2 control-label">昵称</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="admin_nickname" value="<?php echo ($admin['admin_nickname']); ?>">
                                </div>
                            </div>
                             <div class="hr-line-dashed"></div>
                             <div class="form-group">
                                <label class="col-sm-2 control-label">管理员简介</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="admin_info" value="<?php echo ($admin["admin_info"]); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">头像</label>
                                 <input type="file" name="admin_photo" value="" class="form-control" id="upload">
                                  <label for="upload" style="margin-bottom:0;">
                                  <?php if($admin['max_photo']): ?><img src="/Upload//<?php echo ($admin['max_photo']); ?>" alt="" id="img">
                                   <?php else: ?>
                                        <img src="/Public/Admin/img/upload.png" alt="" id="img"><?php endif; ?>
                                  </label>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">注册时间</label>

                                <div class="col-sm-10">
                                    <input type="date" readonly="true" class="form-control  layer-date"  name="admin_addtime"  id="date" value="<?php echo (date('Y-m-d',$admin['admin_addtime'])); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">最后登录时间</label>
                                <div class="col-sm-10">
                                    <input type="date" readonly="true" class="form-control  layer-date"  name="admin_lasttime" id="date1" value="<?php echo (date('Y-m-d',$admin['admin_lasttime'])); ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label>

                                <div class=" checkbox i-checks col-sm-10">
                                <label>
                                    <input type="radio" value="1" id="optionsRadios1" name="admin_sex" <?php echo ($admin['admin_sex']==1?'checked':''); ?>>男</label>
                                 <label>
                                <input type="radio" value="2" id="optionsRadios2" name="admin_sex" <?php echo ($admin['admin_sex']==2?'checked':''); ?>>女</label>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn" type="submit">保存内容</button>
                                    <a class="btn btn-white" href="javascript:void(0)" onclick="history.go(-1)" >取消</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Admin/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/Admin/js/plugins/layer/laydate/laydate.js"></script>
    <script src="/Public/Admin/js/plugins/iCheck/icheck.min.js"></script>
 <script charset="utf-8" src="/Public/Admin/js/kindeditor/kindeditor-min.js"></script>
 <script charset="utf-8" src="/Public/Admin/js/kindeditor/lang/zh_CN.js"></script>
 <script src="/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
 <script>
       $(".btn-primary").click(function() {
           swal({
               title: "添加成功",
               text: "提示信息",
               type: "success"
           })
       });
             var editor;
             KindEditor.ready(function(K) {
                 editor = K.create('textarea[name="art_desc"]', {
                     allowFileManager : true
                 });
             });
             var editor1;
             KindEditor.ready(function(K) {
                 editor1 = K.create('textarea[name="art_content"]', {
                     allowFileManager : true
                 });
             });
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
      $('#loading-example-btn').click(function(){
        location.reload();
       })
      laydate({elem:"#date",event:"focus"});
      laydate({elem:"#date1",event:"focus"});
    </script>
        <script>
    //做图片上传预览
    function getObjectURL(file) {
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
    $('#upload').change(function(){
        var url=getObjectURL(this.files[0]);
        if(url){
            $('#img').attr('src',url);
        }
    })
     $('#upload').change(function(){
        var url=getObjectURL(this.files[0]);
        if(url){
            $('#img').attr('src',url);
        }
    })
</script>
</body>
</html>