<?php  


class JoinusAction extends Action{
	public function index(){
		$join = M("Contact_info"); 
		$res = $join->select();
		
		$this->assign('res', $res);
		$this->assign('img_url', 'img2.png');
		$this->display();
	}

	public function join(){
		$name     = $_POST['name'];
		$area     = $_POST['area'];
		$email    = $_POST['email'];
		$tel      = $_POST['tel'];
		$position = $_POST['position'];
		$code     = $_POST['code'];

		if(md5($code) !== $_SESSION['verify']){
			$this->error('验证码错误');
		}

		if ($name == "" || $area == "" || $email == "" || $tel == "" || $position == "") {
			$this->error('必填字段不允许为空');
		}

		$join = M("Joinus"); 
		$data['name']     = $name;
		$data['area']     = $area;
		$data['email']    = $email;
		$data['tel']      = $tel;
		$data['position'] = $position;
		$res = $join->add($data);
		if ($res) {
			$this->success('提交成功');
		}else{
			$this->error('抱歉! 提交失败');
		}
	}

	/**
	 * 当用户访问控制器中不存在的方法时，进行处理 避免出现不友好的错误页面
	 */
	public function _empty(){
	    $this->assign("msg", "您所访问的方法不存在");
	    $this->display("./Home/Tpl/Public/empty_function.html");
	}
}


?>