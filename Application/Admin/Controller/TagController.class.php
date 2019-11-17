<?php
namespace Admin\Controller;
class TagController extends CommonController {
    public function tag_list(){
        $a =1;
        $tag = M('tag')->select();
        $this->assign('tag',$tag);
        $this->assign('a',$a);
        $this->display();
    }

    public function tag_add(){
        if(I('post.')) {
            $data = array(
                'tag_name' => I('post.tag_name'),
                'tag_url' => I('post.tag_url'),
                'tag_ord' => I('post.tag_ord')
            );
            $res = M('tag')->add($data);
            if ($res) {
                $this->success('添加成功',U('tag_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

     public function tag_edit(){
         $tag_id = I('get.tag_id');
         $tag = M('tag')->where("tag_id = $tag_id")->find();
         $this->assign('tag',$tag);
        if(I('post.')) {
            $data = array(
               'tag_name' => I('post.tag_name'),
                'tag_url' => I('post.tag_url'),
                'tag_ord' => I('post.tag_ord')
            );
            $res = M('tag')->where("tag_id = $tag_id")->save($data);
            if ($res) {
                $this->success('编辑成功',U('tag_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

     public function tag_del() {
        $del_id = I('get.del_id');
        $res = M('tag')->where("tag_id = $del_id")->delete();
        if($res) {
            echo 1;die;
        } else {
            echo M('page')->getLastSql();die;
        }
    }
}