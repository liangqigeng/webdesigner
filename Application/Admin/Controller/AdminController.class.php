<?php
namespace Admin\Controller;
class AdminController extends CommonController {

   public function admin_list(){
        $a =1;
        $admins = M('admin')->where('1')->select();
        $this->assign('admin',$admins);
        $this->assign('a',$a);
        $this->display();
    }

    public function admin_add(){
        if(I('post.')) {
            $data = array(
                'admin_name' => I('post.admin_name'),
                'admin_pwd' => md5(I('post.admin_pwd')),
                'admin_nickname' => I('admin_nickname'),
                'admin_sex' => I('admin_sex'),
                'admin_info' => I('admin_info'),
                'admin_addtime' => time(),
                'admin_lasttime' => time(),
            );
             //上传图片
            $upload = new \Think\Upload();
            $upload->exts=array('jpg','png','gif');
            $upload->rootPath='./Upload/';
            $upload->savePath='Admin/';
            $info =$upload->upload();

            if($info) {
                $path = $info['admin_photo']['savepath'].$info['admin_photo']['savename'];
		        $arr=explode('.',$info['admin_photo']['savename']);
		        $max_path = $info['admin_photo']['savepath'].'max_'.$arr[0].'.'.$arr[COUNT($arr)-1];
		        $medium_path = $info['admin_photo']['savepath'].'medium_'.$arr[0].'.'.$arr[COUNT($arr)-1];
		        $min_path = $info['admin_photo']['savepath'].'min_'.$arr[0].'.'.$arr[COUNT($arr)-1];
                //生成缩略图
                $image = new \Think\Image();
                $image->open('./Upload/'.$path);
                $image->thumb(180, 180)->save('./Upload/'.$max_path);
                $image->thumb(64, 64)->save('./Upload/'.$medium_path);
                $image->thumb(40, 40)->save('./Upload/'.$min_path);
                $data['max_photo']=$max_path;
                $data['medium_photo']=$medium_path;
                $data['min_photo']=$min_path;
                unlink('./Upload/'.$path);

            }
            $res = M('admin')->add($data);
            if ($res) {
                $this->success('添加成功',U('admin_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

     public function admin_edit(){
       $admin_id = I('get.admin_id');
       $admin = M('admin')->where("admin_id = $admin_id")->find();
       $this->assign('admin',$admin);
       $admin_id = I('post.admin_id');
        if(I('post.')) {
            $data = array(
                'admin_name' => I('post.admin_name'),
                'admin_pwd' => md5(I('post.admin_pwd')),
                'admin_sex' => I('admin_sex'),
                'admin_nickname' => I('admin_nickname'),
                'admin_info' => I('admin_info'),
                'admin_addtime' => strtotime(I('post.admin_addtime')),
                'admin_lasttime' => strtotime(I('post.admin_lasttime'))
            );
             if ($_FILES['admin_photo']['size']) {
                 //查询旧图片
                 $old_arr = M('admin')->field('max_photo,medium_photo,min_photo')->where("admin_id = $admin_id")->find();
                 //旧图片的路径
                 $max_path = 'Upload/' . $old_arr['max_photo'];
                 $medium_path = 'Upload/' . $old_arr['medium_photo'];
                 $min_path = 'Upload/' . $old_arr['min_photo'];
                 if (!empty($old_arr) && file_exists($max_path)) {
                     unlink($max_path);
                 }
                 //删除中图
                 if (!empty($old_arr) && file_exists($medium_path)) {
                     unlink($medium_path);
                 }
                 //删除小图
                 if (!empty($old_arr) && file_exists($min_path)) {
                     unlink($min_path);
                 }
                 //上传图片
                 $upload = new \Think\Upload();
                 $upload->exts = array('jpg', 'png', 'gif');
                 $upload->rootPath = './Upload/';
                 $upload->savePath = 'Admin/';
                 $info = $upload->upload();

                 if ($info) {
                     $path = $info['admin_photo']['savepath'] . $info['admin_photo']['savename'];
                     $arr = explode('.', $info['admin_photo']['savename']);
                     $max_path = $info['admin_photo']['savepath'] . 'max_' . $arr[0] . '.' . $arr[COUNT($arr) - 1];
                     $medium_path = $info['admin_photo']['savepath'] . 'medium_' . $arr[0] . '.' . $arr[COUNT($arr) - 1];
                     $min_path = $info['admin_photo']['savepath'] . 'min_' . $arr[0] . '.' . $arr[COUNT($arr) - 1];
                     //生成缩略图
                     $image = new \Think\Image();
                     $image->open('./Upload/' . $path);
                     $image->thumb(180, 180)->save('./Upload/' . $max_path);
                     $image->thumb(64, 64)->save('./Upload/' . $medium_path);
                     $image->thumb(40, 40)->save('./Upload/' . $min_path);
                     $data['max_photo'] = $max_path;
                     $data['medium_photo'] = $medium_path;
                     $data['min_photo'] = $min_path;
                     unlink('./Upload/'.$path);
                 }
             }
            $res = M('admin')->where("admin_id = $admin_id")->save($data);
            if ($res) {
                $this->success('编辑成功',U('admin_list'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

    public function admin_del() {
        $del_id = I('get.del_id');
        //查询旧图片
            $old_arr = M('admin')->field('max_photo,medium_photo,min_photo')->where("admin_id = $del_id")->find();
            //旧图片的路径
            $max_path = 'Upload/'. $old_arr['max_photo'];
            $medium_path = 'Upload/'. $old_arr['medium_photo'];
            $min_path = 'Upload/'. $old_arr['min_photo'];
           //删除大图
            if (!empty($old_arr) && file_exists($max_path)) {
                unlink($max_path);
            }
            //删除中图
            if (!empty($old_arr) && file_exists($medium_path)) {
                unlink($medium_path);
            }
             //删除小图
            if (!empty($old_arr) && file_exists($min_path)) {
                unlink($min_path);
            }
        $res = M('admin')->where("admin_id = $del_id")->delete();
        if ($res) {
            echo 1;exit();
        } else {
            echo M('admin')->getLastSql();exit();
        }
    }
}