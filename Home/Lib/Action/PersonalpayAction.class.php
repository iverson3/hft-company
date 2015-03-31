<?php

class PersonalpayAction extends Action {

	/**
	 * 产品下载
	 */
	public function product_download(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);
		
		$this->assign('img_url', 'img4.png');
		$this->display();
	}

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
	 * 当用户访问控制器中不存在的方法时，进行处理 避免出现不友好的错误页面
	 */
	public function _empty(){
	    $this->assign("msg", "您所访问的方法不存在");
	    $this->display("./Home/Tpl/Public/empty_function.html");
	}

}