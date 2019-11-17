<?php
namespace Home\Controller;
class IndexController extends CommonController {
    public function index(){
     //每页显示的数据
        $limit=10;
        //查询数据总数
        $count=M('article')->count();
        //调用TP分页类
        $page=new \Think\Page($count,$limit);
        //生成分页
        $show=$page->show();
        //查询数据
        $article = M('article')
                ->alias('a')
                ->field('a.*,b.cat_id,b.cat_name,c.min_photo,c.admin_nickname')
                ->join('web_cat_art as b on a.cat_id = b.cat_id')
                ->join('web_admin as c on a.admin_id = c.admin_id')
                ->where('is_show = 1')
                ->order('art_addtime DESC')
                ->limit($page->firstRow.','.$page->listRows)
                ->select();
        $article1 = M('article')
                 ->alias('a')
                 ->field('a.*,b.cat_id,b.cat_name,c.min_photo,c.admin_nickname')
                 ->join('web_cat_art as b on a.cat_id = b.cat_id')
                 ->join('web_admin as c on a.admin_id = c.admin_id')
                 ->where('art_ord = 1')
                 ->find();
        $article2 = M('article')
                 ->alias('a')
                 ->field('a.*,b.cat_id,b.cat_name,c.min_photo,c.admin_nickname')
                 ->join('web_cat_art as b on a.cat_id = b.cat_id')
                 ->join('web_admin as c on a.admin_id = c.admin_id')
                 ->limit(0,4)
                 ->select();
        $page1 = M('page')->where('page_id =5')->find();
        $this->assign('article',$article);
        $this->assign('article1',$article1);
        $this->assign('article2',$article2);
        $this->assign('page1',$page1);
        $this->assign('show',$show);
        $this->display();
    }

}