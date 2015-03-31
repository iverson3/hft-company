<?php

class MerchantaccessAction extends Action {

	/**
	 * 接入流程
	 */
	public function access_process(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img6.png');
		$this->display();
	}

	/**
	 * 运营服务优势
	 */
	public function operating_advantage(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img1.png');
		$this->display();
	}

	/**
	 * 后台支撑优势
	 */
	public function background_advantage(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img1.png');
		$this->display();
	}

	/**
	 * 专业POS机办理常见问题
	 */
	public function pos_problems(){
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