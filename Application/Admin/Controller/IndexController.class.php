<?php
namespace Admin\Controller;
class IndexController extends CommonController {
    public function index(){
        $admin_id = cookie('admin_id');
        $info = M('admin')->field('admin_name,medium_photo')->where("admin_id = '$admin_id'")->find();
        $this->assign('info',$info);
        $this->display();
    }

    public function index_right(){

        $this->display();
    }

    public function loginOut() {
        session_unset();
        session_destroy();
        @setcookie('admin_name','',time()-1,'/');
        @setcookie('admin_lasttime','',time()-1,'/');
        redirect(U('Login/login'));
    }
}