<?php
namespace Admin\Controller;
class PageController extends CommonController {
    public function page_list(){
        $a =1;
        $page = M('page')->select();
        $this->assign('page',$page);
        $this->assign('a',$a);
        $this->display();
    }

    public function page_add(){
        if(I('post.')) {
            $data = array(
                'page_name' => I('post.page_name'),
                'page_content' => I('post.page_content'),
            );
            $res = M('page')->add($data);
            if ($res) {
                $this->success('添加成功',U('page_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

     public function page_edit(){
         $page_id = I('get.page_id');
         $page = M('page')->where("page_id = $page_id")->find();
         $this->assign('page',$page);
         if(I('post.')) {
            $data = array(
                 'page_name' => I('post.page_name'),
                 'page_content' => I('post.page_content'),
            );
            $res = M('page')->where("page_id = $page_id")->save($data);
            if ($res) {
                $this->success('编辑成功',U('page_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

    public function page_del() {
        $del_id = I('get.del_id');
        $res = M('page')->where("page_id = $del_id")->delete();
        if($res) {
            echo 1;die;
        } else {
            echo M('page')->getLastSql();die;
        }
    }
}