<?php  

//+--------------------------------------------------------
// 系统控制器
// 实现相关的系统功能
//+--------------------------------------------------------


class SystemAction extends Action{

	/**
	 * 清除缓存
	 */
	public function clearCache(){
		$hostdir = "./Admin/Runtime/Cache/";
		// 扫描文件夹内的文件及文件夹名存入数组$filesnames
		$filesnames = scandir($hostdir);
		$i = 0;
		foreach ($filesnames as $name) {
			$i++;
		}
		$i = $i - 2;

		$hostdir = "./Home/Runtime/Cache/";
		// 扫描文件夹内的文件及文件夹名存入数组$filesnames
		$filesnames = scandir($hostdir);
		$j = 0;
		foreach ($filesnames as $name) {
			$j++;
		}
		$j = $j - 2;

		$this->assign("home_num", $j);
		$this->assign("admin_num", $i);
		$this->display();
	}

	/**
	 * 前台缓存
	 */
	public function clearhome(){
		$this->del_DirAndFile('./Home/Runtime/');
		$this->success("网站前台缓存清除成功");
	}

	/**
	 * 删除指定目录下所有的文件及目录
	 * 
	 * @param  string $dirName  目录
	 */
	private function del_DirAndFile($dirName){
	    if (is_dir($dirName)){
	        if ($handle = opendir("$dirName")) {  
	            while(false !== ($item = readdir($handle))) {  
	                if ($item != "." && $item != "..") {
	                    if (is_dir("$dirName/$item")) {
	                      	$this->del_DirAndFile("$dirName/$item");  
	                    } else {  
	                      	unlink("$dirName/$item");
	                    }
	                }  
	            }
	            closedir($handle);  
	        }
	    }
	}

	/**
	 * 后台缓存
	 */
	public function clearAdmin(){
		$this->del_DirAndFile('./Admin/Runtime/');
		$this->success("网站后台缓存清除成功");
	}

	/**
	 * 添加管理员
	 */
	public function adduser(){
		$this->display();
	}

	/**
	 * 实现添加管理员操作
	 */
	public function do_adduser(){
		$username    = $_POST['username'];
		$password    = $_POST['password'];
		$re_password = $_POST['re_password'];

		if ($password != $re_password) {
			$this->error("抱歉！两次输入的密码不一样哦");
		}
		$user = M('User');
		$data['username'] = $username;
		$data['password'] = md5($password);
		$data['role']     = 1;
		$res = $user->add($data);
		if ($res) {
			$this->success("添加成功");
		}else{
			$this->error("抱歉！添加失败");
		}
	}

	/**
	 * 修改密码
	 */
	public function updatepwd(){
		$user = M('User');
		$res = $user->select();
		$this->assign("res", $res);
		$this->display();
	}

	/**
	 * 实现修改密码操作
	 */
	public function do_updatepwd(){
		$id      = $_POST['id'];
		$old_pwd = $_POST['old_pwd'];
		$pwd     = $_POST['pwd'];
		$re_pwd  = $_POST['re_pwd'];

		$user = M('User');
		$where['id'] = $id;
		$res = $user->where($where)->select();
		if ($res[0]['password'] != md5($old_pwd)) {
			$this->error("抱歉！原密码不正确哦");
		}
		if ($pwd != $re_pwd) {
			$this->error("抱歉！两次输入的密码不一样哦");
		}
		$data['password'] = md5($pwd);
		$res = $user->where($where)->save($data);
		if ($res) {
			$this->success("密码修改成功");
		}else{
			$this->error("抱歉！修改失败了");
		}
	}

	/**
	 * 删除管理员
	 */
	public function deluser(){
		$user = M('User');
		$res = $user->select();
		$this->assign("res", $res);
		$this->display();
	}

	/**
	 * 实现删除管理员操作
	 */
	public function do_deluser(){
		$id   = $_GET['id'];
		$user = M('User');
		$where['id'] = $id;
		$res = $user->where($where)->delete();
		if ($res) {
			$this->success("删除成功");
		}else{
			$this->error("抱歉！删除失败");
		}
	}

}


?>