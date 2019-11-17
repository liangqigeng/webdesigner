<?php
namespace Admin\Controller;
class BannerController extends CommonController {
    public function banner_list(){
        $a =1;
        $banner = M('banner')->select();
        $this->assign('banner',$banner);
        $this->assign('a',$a);
        $this->display();
    }

    public function banner_add(){
        if(I('post.')) {
            $data = array(
                'banner_title' => I('post.banner_title'),
                'banner_url' => I('post.banner_url'),
            );
             //上传图片
            $upload = new \Think\Upload();
            $upload->exts=array('jpg','png','gif');
            $upload->rootPath='./Upload/';
            $upload->savePath='Article/';
            $info =$upload->upload();

            if($info) {
                 $data['banner_path']=$info['banner_path']['savepath'].$info['banner_path']['savename'];
            }
            $res = M('banner')->add($data);
            if ($res) {
                $this->success('添加成功',U('banner_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

     public function banner_edit(){
         $banner_id = I('get.banner_id');
         $banner = M('banner')->where("banner_id = $banner_id")->find();
         $this->assign('banner',$banner);

         $banner_id=I('post.banner_id');
        if(I('post.')) {
            $data = array(
                'banner_title' => I('post.banner_title'),
                'banner_url' => I('post.banner_url'),
            );
            if ($_FILES['banner_path']['size']) {
                //查询旧图片
                $old_arr = M('banner')->field('banner_path')->where("banner_id = $banner_id")->find();
                //旧图片的路径
                $path = 'Upload/' . $old_arr['banner_path'];
                if (!empty($old_arr) && file_exists($path)) {
                    unlink($path);
                }
                //上传图片
                $upload = new \Think\Upload();
                $upload->exts = array('jpg', 'png', 'gif');
                $upload->rootPath = './Upload/';
                $upload->savePath = 'Article/';
                $info = $upload->upload();

                if ($info) {
                    $data['banner_path'] = $info['banner_path']['savepath'] . $info['banner_path']['savename'];
                }
            }
            $res = M('banner')->where("banner_id = $banner_id")->save($data);
            if ($res) {
                $this->success('编辑成功',U('banner_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

    public function banner_del() {
        $del_id = I('get.del_id');
         //查询旧图片
        $old_arr = M('banner')->field('banner_path')->where("banner_id = $del_id")->find();
        //旧图片的路径
        $path = 'Upload/' . $old_arr['banner_path'];
        if (!empty($old_arr) && file_exists($path)) {
            unlink($path);
        }
        $res = M('banner')->where("banner_id = $del_id")->delete();
        if ($res) {
            echo 1;die;
        } else {
            echo M('banner')->getLastSql();die;
        }
    }
}