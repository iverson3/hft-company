<?php

class IndexAction extends Action {

    public function index(){
    	$model = new Model();
    	// 取出最新的5条企业动态
    	$sql = "select id,title from wf_enterprise_news order by id desc limit 5";
    	$res = $model->query($sql);
    	$this->assign('res', $res);

    	// 取出最新的5条招聘信息
    	$sql = "select id,title from wf_job_describe order by id desc limit 5";
    	$res2 = $model->query($sql);
    	$this->assign('res2', $res2);

        // 取出用于图片轮播的三张图片
        $img = M('Lunbo_imgs');
        $res = $img->where("status = 1")->select();
        $this->assign('lunbo_img_list', $res);


        $file = file_get_contents("./Public/File/company_introduce.txt");
        $this->assign('company_introduce', $file);

    	$this->display();
    }

    /**
     * 当用户访问控制器中不存在的方法时，进行处理 避免出现不友好的错误页面
     */
    public function _empty(){
        $this->assign("msg", "您所访问的方法不存在");
        $this->display("./Home/Tpl/Public/empty_function.html");
    }

}