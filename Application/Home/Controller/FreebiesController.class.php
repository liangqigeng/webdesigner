<?php
namespace Home\Controller;
class FreebiesController extends CommonController {
    public function freebies(){
        $title='赠品';
        $banner = M('banner')->field('banner_title,banner_path')->select();
        $this->assign('banner',$banner);
        $this->assign('title',$title);
        $this->assign('title',$title);
        $this->display();
    }
}