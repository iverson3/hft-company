<?php

class IndexAction extends Action {

    public function index(){
        if (isset($_SESSION['remember'])) {
            $this->assign('remember', $_SESSION['remember']);
            $this->assign('remember_me', "checked");
        }else{
            $this->assign('remember_me', "");
        }
    	$this->display();	
    }

    public function login(){
    	$username = $_POST['username'];
        $password = $_POST['password'];
    	$remember = $_POST['remember'];

    	$user = M('User');
    	$where['username'] = $username;
    	$res = $user->where($where)->select();
    	
    	if ($res[0]['password'] == md5($password) && $res[0]['role'] == 1) {
            $_SESSION['username'] = $username;
            if ($remember) {
                $_SESSION['remember'] = $username;
            }else{
                unset($_SESSION['remember']);
            }
    		$this->success("登录成功!", "home");
    	}else{
    		$this->error("登录失败! 账号或密码错误");
    	}
    }

    /**
     * 登出
     */
    public function logout(){
        if (isset($_SESSION['username'])) {
            unset($_SESSION['username']);
        }
        if (isset($_SESSION['remember'])) {
            $this->assign('remember', $_SESSION['remember']);
            $this->assign('remember_me', "checked");
        }else{
            $this->assign('remember_me', "");
        }
        $this->display('index');
    }

    /**
     * 后台首页
     */
    public function home(){
        if (!isset($_SESSION['username'])) {
            $this->error("对不起! 你还没有登录<br>暂不允许访问，请先进行登录", "index");
        }
    	$this->display();
    }

}