<?php


class PublicAction extends Action{

	/**
	 * 锁屏
	 */
	public function extra_lock(){
		$this->assign('username', $_SESSION['username']);
		$this->display();
	}

	/**
	 * 解锁
	 */
	public function unlock(){
		$username = $_SESSION['username'];
    	$password = $_POST['password'];

		$user = M('User');
    	$where['username'] = $username;
    	$res = $user->where($where)->select();

    	if ($res[0]['password'] == md5($password) && $res[0]['role'] == 1) {
    		$this->success("解锁成功", U('Index/home'));
    	}else{
    		$this->error("解锁失败");
    	}
	}

	public function search(){
		$this->error("很抱歉！暂时还不支持搜索");
	}
	
}


?>