<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    //初始化操作,默认调用的方法
    public function _initialize() {
        //判断登录
        $is_login = session('is_login');
        if(empty($is_login)||$is_login!=1) {
            //重定向，不提示直接跳转
            $this->redirect('Admin/Login/login');exit();
        }
        $admin_id = cookie('admin_id');
        $data = array(
            'admin_lasttime' =>cookie('admin_lasttime')
        );
        M('admin')->where("admin_id = '$admin_id'")->save($data);
    }

    //错误页面
    public function _empty() {
        $this->redirect('Admin/Login/404');exit();
    }
}