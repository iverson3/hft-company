<?php

class FinancialknowsAction extends Action {

	/**
	 * 人民币知识
	 */
	public function rmb(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img5.png');
		$this->display();
	}

	/**
	 * 银行卡知识
	 */
	public function bank_card(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img1.png');
		$this->display();
	}

	/**
	 * 反洗钱知识
	 */
	public function anti_money(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img1.png');
		$this->display();
	}

	/**
	 * 支付结算知识
	 */
	public function pay(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img1.png');
		$this->display();
	}

	/**
	 * 个人金融信息安全
	 */
	public function financial_security(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img1.png');
		$this->display();
	}

	/**
	 * 金融法律法规解答
	 */
	public function financial_law(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', 'img1.png');
		$this->display();
	}

	/**
	 * 金融知识普及读本
	 */
	public function financial_knows(){
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