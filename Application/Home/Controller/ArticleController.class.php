<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/12
 * Time: 9:06
 */
namespace Home\Controller;
class ArticleController extends CommonController
{
    public function article(){
        if ('get.cat_id') {
        $cat_id =I('get.cat_id');
        $cat1 = M('cat_art')->field('cat_name')->where("cat_id = $cat_id")->find();
            //分页
            //每页显示的数据
            $limit = 10;
            //查询数据总数
            $count = M('article')->count();
            //调用TP分页类
            $page = new \Think\Page($count, $limit);
            //生成分页
            $show = $page->show();
            //查询数据
            $article = M('article')
                ->alias('a')
                ->field('a.*,c.min_photo,c.admin_nickname')
                ->join('web_admin as c on a.admin_id = c.admin_id')
                ->where("cat_id = $cat_id")
                ->order('art_addtime DESC')
                ->limit($page->firstRow . ',' . $page->listRows)
                ->select();
            $this->assign('show', $show);
            $this->assign('cat1', $cat1);
            $this->assign('article', $article);
        } else {
            $this->redirect('Admin/Login/404');
        }

        $this->display();
    }

    public function article_detail(){
        if ('get.art_id') {
            $art_id = I('get.art_id');
            $article = M('article')
                ->alias('a')
                ->field('a.*,b.cat_id,b.cat_name,c.min_photo,c.max_photo,c.admin_nickname')
                ->join('web_cat_art as b on a.cat_id = b.cat_id')
                ->join('web_admin as c on a.admin_id = c.admin_id')
                ->where("art_id = $art_id")
                ->find();
            $this->assign('article', $article);
            $this->display();
        } else {
            $this->redirect('Admin/Login/404');
        }
    }

}