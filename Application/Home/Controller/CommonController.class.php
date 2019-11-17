<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize(){
        $nav = M('nav')->field('nav_name,nav_url')->where('nav_ord IN(3,4)')->order('nav_ord ASC')->select();
        $nav1 = M('nav')->field('nav_name,nav_url')->where('nav_ord between 10 and 17')->order('nav_ord ASC')->select();
        $cat = M('cat_art')->field('cat_id,cat_name')->order('cat_ord')->select();
        $icp = M('config')->field('con_value')->where("con_title = '备案号 '")->select();
        $tag = M('tag')->field('tag_name,tag_url')->order('tag_ord ASC')->select();
        $secret = M('page')->field('page_name,page_content')->where('page_id = 1')->find();
        $join = M('page')->field('page_name,page_content')->where('page_id = 2')->find();
        $email = M('page')->field('page_name,page_content')->where('page_id = 3')->find();
        $this->assign('secret',$secret);
        $this->assign('join',$join);
        $this->assign('email',$email);
        $this->assign('tag',$tag);
        $this->assign('icp',$icp);
        $this->assign('nav',$nav);
        $this->assign('nav1',$nav1);
        $this->assign('cat',$cat);
    }

    public function _empty(){
        $this->redirect('Admin/Login/404');exit();
    }
}