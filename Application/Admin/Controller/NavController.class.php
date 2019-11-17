<?php
namespace Admin\Controller;
class NavController extends CommonController {
    public function nav_list(){
        $a =1;
        $nav = M('Nav')->select();
        $this->assign('nav',$nav);
        $this->assign('a',$a);
        $this->display();
    }

    public function nav_add(){
        if(I('post.')) {
            $data = array(
                'nav_name' => I('post.nav_name'),
                'nav_url' => I('post.nav_url'),
                'nav_ord' => I('post.nav_ord')
            );
            $res = M('nav')->add($data);
            if ($res) {
                $this->success('添加成功',U('nav_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

     public function nav_edit(){
       $nav_id = I('get.nav_id');
       $nav = M('nav')->where("nav_id = $nav_id")->find();
       $this->assign('nav',$nav);
        if(I('post.')) {
            $data = array(
                'nav_name' => I('post.nav_name'),
                'nav_url' => I('post.nav_url'),
                'nav_ord' => I('post.nav_ord')
            );
            $res = M('nav')->where("nav_id = $nav_id")->save($data);
            if ($res) {
                $this->success('编辑成功',U('nav_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

    public function nav_del() {
        $del_id = I('get.del_id');
        $res = M('nav')->where("nav_id = $del_id")->delete();
        if ($res) {
            echo 1;die;
        } else {
            echo M('nav')->getLastSql();die;
        }
    }
}