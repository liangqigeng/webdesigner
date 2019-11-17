<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/12
 * Time: 9:06
 */
namespace Admin\Controller;
class ArticleController extends CommonController {
    public function article_list(){
         //分页
        //每页显示的数据
        $limit=10;
        //查询数据总数
        $count=M('article')->count();
        //调用TP分页类
        $page=new \Think\Page($count,$limit);
        //生成分页
        $show=$page->show();
        //查询数据
        $article=M('article')
                ->alias('a')
                ->field('a.*,b.cat_name')
                ->join("web_cat_art as b on a.cat_id = b.cat_id")
                ->order('art_addtime DESC')
                ->limit($page->firstRow.','.$page->listRows)
                ->select();
        $this->assign('show',$show);
        $this->assign('article',$article);
        $this->assign('a',$page->firstRow+1);
        $this->display();
    }
     public function article_add(){
        $cat = M('cat_art')->select();
        $this->assign('cat',$cat);
        $content =htmlspecialchars_decode(I('post.art_content'));
        if(I('post.')) {
            $data = array(
                'art_title' => I('post.art_title'),
                'admin_id' =>cookie('admin_id'),
                'art_summary' => I('post.art_summary'),
                'art_addtime' => strtotime(I('post.art_addtime')),
                'is_show' => I('post.is_show'),
                'art_ord' => I('post.art_ord'),
                'art_content' => $content,
                'cat_id' => I('post.cat_id')
            );
            //上传图片
            $upload = new \Think\Upload();
            $upload->exts=array('jpg','png','gif','jpeg');
            $upload->rootPath='./Upload/';
            $upload->savePath='Article/';
            $info =$upload->upload();

            if($info) {
                $path = $info['art_img']['savepath'].$info['art_img']['savename'];

		        $arr=explode('.',$info['art_img']['savename']);
		        $min_path = $info['art_img']['savepath'].$arr[0].'_1024x564'.'.'.$arr[COUNT($arr)-1];
                $data['art_img']=$path;

                //生成缩略图
                $image = new \Think\Image();
                $image->open('./Upload/'.$path);
                $image->thumb(1024, 564)->save('./Upload/'.$min_path);
                $data['art_thumb']=$min_path;

            }
            $res = M('article')->add($data);
            if ($res) {
                $this->success('添加成功',U('Article/article_list'));
                exit();
            } else {
                $this->error('数据输入有误');
                exit();
            }
        }
        $this->display();
    }

    //编辑文章
    public function article_edit() {
        $cat = M('cat_art')->select();
        $this->assign('cat',$cat);
        //接收art_id
        $art_id = I('get.art_id');
        $article = M('article')->where("art_id = $art_id")->find();
        $this->assign('article',$article);
        $aid = I('post.art_id');
         if(I('post.')) {
            $data = array(
                'art_title' => I('post.art_title'),
                'admin_id' => cookie('admin_id'),
                'art_addtime' => strtotime(I('post.art_addtime')),
                'is_show' => I('post.is_show'),
                'art_ord' => I('post.art_ord'),
                'art_content' => htmlspecialchars_decode(I('post.art_content')),
                'cat_id' => I('post.cat_id')
            );
            if ($_FILES['art_img']['size']) {
            //查询旧图片
            $old_arr = M('article')->field('art_img,art_thumb')->where("art_id = $aid")->find();
            //旧图片的路径
            $path = 'Upload/'. $old_arr['art_img'];
            $thumb_path = 'Upload/'. $old_arr['art_thumb'];
            //有旧图片的情况就删除
            if (!empty($old_arr) && file_exists($path)) {
                unlink($path);
            }
            //有旧缩略图图片的情况就删除
            if (!empty($old_arr) && file_exists($thumb_path)) {
                unlink($thumb_path);
            }
             //上传图片
            $upload = new \Think\Upload();
            $upload->exts=array('jpg','png','gif','jpeg');
            $upload->rootPath='./Upload/';
            $upload->savePath='Article/';
            $info =$upload->upload();
            if($info) {
                 $path = $info['art_img']['savepath'].$info['art_img']['savename'];

		        $arr=explode('.',$info['art_img']['savename']);
		        $min_path = $info['art_img']['savepath'].$arr[0].'_min'.'.'.$arr[COUNT($arr)-1];
                $data['art_img']=$path;

                //生成缩略图
                $image = new \Think\Image();
                $image->open('./Upload/'.$path);
                $image->thumb(300, 300)->save('./Upload/'.$min_path);
                $data['art_thumb']=$min_path;
            }
        }

            $res = M('article')->where("art_id = $aid")->save($data);
            if ($res) {
                $this->success('编辑成功',U('Article/article_list'));
                exit();
            } else {
                $this->error('数据输入有误');
                exit();
            }
        }
        $this->display();
    }

    public function article_del(){
        $del_id = I('get.del_id');
        //查询旧图片
        $old_arr = M('article')->field('art_img,art_thumb')->where("art_id = $del_id")->find();
        //旧图片的路径
        $path = 'Upload/'. $old_arr['art_img'];
        //旧缩略图图片的路径
        $thumb_path = 'Upload/'. $old_arr['art_thumb'];
        //有旧图片的情况就删除
        if (!empty($old_arr) && file_exists($path)) {
            unlink($path);
        }
         if (!empty($old_arr) && file_exists($thumb_path)) {
            unlink($thumb_path);
        }
        $res = M('article')->where("art_id = $del_id")->delete();
        if ($res) {
            echo 1;die;
        } else {
            echo M('article')->getLastSql();die;
        }
    }
}