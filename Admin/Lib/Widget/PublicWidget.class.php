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
	 * 公共模板文件leftmenu
	 */
	public function leftmenu(){
		$this->assign('data4', '');
		$this->display('Public:leftmenu');
	}

	/**
	 * 公共模板文件main_top
	 */
	public function main_top(){
		$this->assign('data4', '');
		$this->display('Public:main_top');
	}


	/**
	 * 公共模板文件color_panel
	 */
	public function color_panel(){
		$this->assign('data4', '');
		$this->display('Public:color_panel');
	}

	/**
	 * 公共模板文件header
	 */
	public function footer(){
		$this->assign('data4', '');
		$this->display('Public:footer');
	}

	/**
	 * 公共模板文件include_css
	 */
	public function include_css(){
		$this->assign('data4', '');
		$this->display('Public:include_css');
	}

	/**
	 * 公共模板文件include_js
	 */
	public function include_js(){
		$this->assign('data4', '');
		$this->display('Public:include_js');
	}

}


?>