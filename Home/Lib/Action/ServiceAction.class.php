<?php

class ServiceAction extends Action {

    /**
     * 产品介绍
     */
    public function product_introduction(){
        $pages = M("Static_pages");
        $where['en_title'] = __FUNCTION__;
        $res = $pages->where($where)->select();
        $this->assign('page', $res[0]['content']);

    	$this->assign('img_url', 'img1.png');
    	$this->display();
    }

    /**
     * POS机具安装维护
     */
    public function pos_install(){
        $pages = M("Static_pages");
        $where['en_title'] = __FUNCTION__;
        $res = $pages->where($where)->select();
        $this->assign('page', $res[0]['content']);

        $this->assign('img_url', 'img2.png');
        $this->display();
    }

    /**
     * 交易数据系统分析
     */
    public function data_analysis(){
        $pages = M("Static_pages");
        $where['en_title'] = __FUNCTION__;
        $res = $pages->where($where)->select();
        $this->assign('page', $res[0]['content']);

        $this->assign('img_url', 'img3.png');
        $this->display();
    }

    /**
     * 资金结算差错处理
     */
    public function capital_settlement(){
        $pages = M("Static_pages");
        $where['en_title'] = __FUNCTION__;
        $res = $pages->where($where)->select();
        $this->assign('page', $res[0]['content']);

        $this->assign('img_url', 'img1.png');
        $this->display();
    }

    /**
     * 在线交易监控
     */
    public function online_transactions(){
        $pages = M("Static_pages");
        $where['en_title'] = __FUNCTION__;
        $res = $pages->where($where)->select();
        $this->assign('page', $res[0]['content']);

        $this->assign('img_url', 'img2.png');
        $this->display();
    }

    /**
     * 商户培训
     */
    public function business_training(){
        $pages = M("Static_pages");
        $where['en_title'] = __FUNCTION__;
        $res = $pages->where($where)->select();
        $this->assign('page', $res[0]['content']);

        $this->assign('img_url', 'img3.png');
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