<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:44 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>文章分类管理</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    <link href="/Public/Admin/css/page.css" rel="stylesheet">
    <style>
      th{
        text-align: center;
      }
    </style>

</head>

<body class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>文章分类</h5>
                        <div class="ibox-tools">
                            <a href="<?php echo U('Cat/cat_art_add');?>" class="btn btn-primary btn-xs">添加文章分类</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row m-b-sm m-t-sm">
                            <div class="col-md-1" style="float: left">
                                <button type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> 刷新</button>
                            </div>

                            <div class="col-md-11">
                                <div class="input-group" style="width:80%;float: right">
                                    <input type="text" placeholder="请输入文章分类名称" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                                </div>
                            </div>
                        </div>

                        <div class="project-list">
                            <table class="table table-hover" style="text-align:center">
                                <tbody>
                                  <tr>
                                      <th>编号</th>
                                      <th>分类名称</th>
                                      <th><i class="fa fa-clock-o"></i>添加时间</th>
                                      <th><i class="fa fa-eye"></i>分类排序</th>
                                      <th>操作</th>
                                  </tr>
                                  <?php if(is_array($cat_art)): foreach($cat_art as $key=>$v): ?><tr>
                                        <td><?php echo ($a++); ?></td>
                                        <td><?php echo ($v["cat_name"]); ?></td>
                                        <td><?php echo (date('Y-m-d H:i:s',$v["cat_addtime"])); ?></td>
                                        <td><?php echo ($v["cat_ord"]); ?></td>
                                        <td>
                                            <a href="<?php echo U('Admin/Cat/cat_art_edit/cat_id/'.$v['cat_id']);?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> 编辑 </a>
                                            <a href="javascript:void(0)" class="btn btn-white btn-sm del" del_id="<?php echo ($v["cat_id"]); ?>"><i class="fa fa-trash"></i> 删除 </a>
                                        </td>
                                    </tr><?php endforeach; endif; ?>
                                    </tbody>
                                </table>
                            </div>
                             <div class="page"><?php echo ($show); ?></div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    <script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/Public/Admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/Public/Admin/js/content.min.js?v=1.0.0"></script>
    <script src="/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
          $(".del").click(function() {
          var del_id = $(this).attr('del_id');
              swal({
                  title: "您确定要删除这篇文章吗",
                  text: "删除后将无法恢复，请谨慎操作！",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#1647a1",
                  confirmButtonText: "确定",
                  cancelButtonText: "取消",
                  closeOnConfirm: false,
                  closeOnCancel: false
              }, function(isConfirm) {
                  if (isConfirm) {
                    $.ajax({
                        type:'get',
                        url:"<?php echo U('Admin/Cat/cat_art_del');?>",
                        data:'del_id='+del_id,
                        success:function (z) {
                            console.log(z);
                            if(z==1) {
                                swal("删除成功！", "您已经永久删除了这条信息。", "success")
                                function aa() {
                                    $('#loading-example-btn').click();
                                }
                                setTimeout(aa,1500);
                            } else {
                                swal("数据有误", "已撤销您的操作！", "error")
                            }
                        }
                      })
                  } else {
                      swal("已取消", "您取消了删除操作！", "error")
                  }
              })
      });

       $(document).ready(function(){$("#loading-example-btn").click(function(){btn=$(this);simpleLoad(btn,true);simpleLoad(btn,false)})});function simpleLoad(btn,state){if(state){btn.children().addClass("fa-spin");btn.contents().last().replaceWith(" Loading")}else{setTimeout(function(){btn.children().removeClass("fa-spin");btn.contents().last().replaceWith(" Refresh")},2000)}};
       $('#loading-example-btn').click(function(){
        location.reload();
       })
    </script>
    </body>

<!-- Mirrored from www.zi-han.net/theme/hplus/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:44 GMT -->
</html>