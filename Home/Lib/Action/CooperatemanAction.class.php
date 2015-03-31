<?php

class CooperatemanAction extends Action {

	/**
	 * 合作伙伴
	 */
	public function index(){
		// 文件夹地址
		$hostdir = "./Public/Uploads/parts/";
		// 获取也就是扫描文件夹内的文件及文件夹名存入数组$filesnames
		$filesnames = scandir($hostdir);
		$list = array();
		foreach ($filesnames as $name) {
			$list[]['imgname'] = $name; 
		}
		// windows下 移除数组的前两项(. ..      [扫描文件夹时得到的])
		// linux下   移除数组的前三项(. .. .svn [扫描文件夹时得到的])
		unset($list[0]);
		unset($list[1]);
		// unset($list[2]);
		$this->assign("part_img_list", $list);
		
		$this->assign('img_url', 'img4.png');
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