<?php
namespace Admin\Controller;
class CatController extends CommonController {
    public function cat_art_list(){
        $limit=5;
        //查询数据总数
        $count=M('cat_art')->count();
        //调用TP分页类
        $page=new \Think\Page($count,$limit);
        //生成分页
        $show=$page->show();
        $this->assign('show',$show);
        $cat_art = M('cat_art')
                  ->limit($page->firstRow.','.$page->listRows)
                  ->order('cat_ord ASC')
                  ->select();
        $this->assign('cat_art',$cat_art);
        $this->assign('a',$page->firstRow+1);
        $this->display();
    }

    public function cat_art_add(){
        if(I('post.')) {
            $data = array(
                'cat_name' => I('post.cat_name'),
                'cat_addtime' => time(),
                'cat_ord' => I('post.cat_ord')
            );
            $res = M('cat_art')->add($data);
            if ($res) {
                $this->success('添加成功',U('cat_art_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

     public function cat_art_edit(){
         $cat_id = I('get.cat_id');
         $cat = M('cat_art')->where("cat_id = $cat_id")->find();
         $this->assign('cat',$cat);
            if(I('post.')) {
                $data = array(
                    'cat_name' => I('post.cat_name'),
                    'cat_addtime' => strtotime(I('post.cat_addtime')),
                    'cat_ord' => I('post.cat_ord')
                );
                $res = M('cat_art')->where("cat_id = $cat_id")->save($data);
                if ($res) {
                    $this->success('编辑成功',U('cat_art_list'));
                } else {
                    $this->error('数据输入有误');
                }
            }
        $this->display();
    }

    public function cat_art_del() {
        $del_id = I('get.del_id');
        $res = M('cat_art')->where("cat_id= $del_id")->delete();
        if ($res) {
          echo 1;die;
        } else {
            echo M('cat_art')->getLastSql();die;
        }
    }
}