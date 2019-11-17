<?php
namespace Admin\Controller;
class ConfigController extends CommonController {
    public function config_edit(){
       $icp = M('config')->where("con_title = '备案号'")->find();
       $this->assign('icp',$icp);
        if(I('post.')) {
            $data = array(
                'con_value' => I('post.icp'),
            );
            $res = M('config')->where("con_title = '备案号'")->save($data);
            if ($res) {
                $this->success('编辑成功',U('config_edit'));
            } else {
                $this->error('数据输入有误');
            }
        }
        $this->display();
    }

}