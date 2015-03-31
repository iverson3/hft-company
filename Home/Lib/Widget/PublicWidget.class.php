<?php  

/**
 *
 * 动态载入控制器
 *
 * 在引入公共的模板文件时，允许动态的为模板分配数据
 * 
 */

class PublicWidget extends Action{

	/**
	 * 公共模板文件header
	 */
	public function header(){
		$this->assign('data3', '');
		$this->display('Public:header');
	}

	/**
	 * 公共模板文件header
	 */
	public function footer(){
		$this->assign('data4', '');
		$this->display('Public:footer');
	}

}


?>