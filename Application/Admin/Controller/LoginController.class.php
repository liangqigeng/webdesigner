<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller
{
    public function login(){
    if (I('post.')) {
        $verify = I('post.verify');
        if ($this->check_verify($verify)) {
            //用户和密码检测
            $admin_name = I('post.admin_name');
            $admin_pwd = md5(I('post.admin_pwd'));
            $admin = M('admin')->where("admin_name = '$admin_name' AND admin_pwd = '$admin_pwd'")->find();
            if ($admin) {
                //设置cookie和session
                cookie('admin_id',$admin['admin_id']);
                cookie('admin_lasttime',time());
                session('is_login',1);
                $this->success('登录成功', U('Admin/Index/index'));
                exit();
            } else {
                $this->error('用户名或密码错误');
                exit();
            }
        } else {
            $this->error('验证码输入有误');
            exit();
        }
    }
        $this->display();
    }
    public function verify() {

        $config = array(
            'useImgBg' =>false,
            'fontSize' =>14,
            'useCurve' =>false,
            'useNoise' =>false,
            'imageW'=>100,
            'imageH'=>34,
            'length'=>4,
            'bg' =>array(238,238,238),
            //'useZh' =>true
        );
        //'fontttf'=>'1.ttf'//指定字体，不设置就随机Think\Verify\ttfs
         $Verify = new \Think\Verify($config);
         $Verify->entry();
    }

    public function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
}
}