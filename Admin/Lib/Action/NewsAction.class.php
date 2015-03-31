<?php

class NewsAction extends Action {

	public function editNews(){
		$this->checkLogin();

		$news = M('Enterprise_news');
        // 导入分页类
		import('ORG.Util.Page');
        // 查询满足要求的总记录数
		$count = $news->count();
        // 实例化分页类 传入总记录数和每页显示的记录数(15)
		$page = new Page($count, 10);
		// 设置分页条相关的配置项
		$page->setConfig('header', '条记录');
		$page->setConfig('prev',   '<');   
        $page->setConfig('next',   '>');   
        $page->setConfig('first',  '<<');   
        $page->setConfig('last',   '>>');   
        $page->setConfig('theme',  '%totalRow% %header% %nowPage%/%totalPage% 页 %first% %prePage% %upPage% %linkPage% %downPage% %nextPage% %end%');   
		// 分页显示输出
        $show = $page->show();
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性 (通过id排序，使得较新的数据能先取得)
		$list = $news->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
        // 赋值数据集
		$this->assign('list', $list);
        // 赋值分页输出
		$this->assign('pageBar', $show);

    	$this->display();
	}

	/**
	 * 添加新闻
	 */
	public function add(){
		$this->checkLogin();

		$this->display();
	}
	/**
	 * 实现新闻的添加
	 */
	public function do_add(){
		$title       = $_POST['title'];
		$create_time = date('Y-m-d H:i:s');
		$source      = $_POST['source'];
		$read_times  = 0;
		$content     = htmlspecialchars(stripslashes($_POST['content']));  
		$author      = $_POST['author'];

		if ($title == "" || $source == "" || $content == "" || $author == "") {
			$this->error("字段不允许为空");
		}

		// 将数据插入数据库
		$job = M("Enterprise_news"); 
		$data['title']       = $title;
		$data['create_time'] = $create_time;
		$data['source']      = $source;
		$data['read_times']  = $read_times;
		$data['content']     = $content;
		$data['author']      = $author;

		$res = $job->add($data);
		
		if ($res) {
			$this->success('新闻添加成功！', 'editNews');
		}else{
			$this->error('对不起! 添加失败');
		}
	}


	/**
	 * 修改新闻
	 */
	public function update(){
		$this->checkLogin();
		$id = $_GET['id'];

		// 从数据库中获取该博客文章的详细内容
    	$User = M("Enterprise_news"); 
		$condition['id'] = $id;
		$res = $User->where($condition)->select(); 
		$this->assign("res", $res);

		$this->display();
	}
	/**
	 * 实现新闻的更新
	 */
	public function do_update(){
		$id          = $_POST['id'];
		$title       = $_POST['title'];
		$create_time = $_POST['create_time'];
		$source      = $_POST['source'];
		$read_times  = $_POST['read_times'];
		$content     = htmlspecialchars(stripslashes($_POST['content'])); 
		$author      = $_POST['author'];

		if ($title == "" || $source == "" || $content == "" || $author == "") {
			$this->error("字段不允许为空");
		}

		// 将数据插入数据库
		$job = M("Enterprise_news"); 
		$data['title']       = $title;
		$data['create_time'] = $create_time;
		$data['source']      = $source;
		$data['read_times']  = $read_times;
		$data['content']     = $content;
		$data['author']      = $author;

		$where['id'] = $id;
		$res = $job->where($where)->save($data);
		
		if ($res) {
			$this->success('修改成功');
		}else{
			$this->error('对不起! 修改失败');
		}
	}


	/**
	 * 删除新闻
	 */
	public function delete(){
		$id = $_GET['id'];

		$User = M("Enterprise_news"); 
		$where['id'] = $id;
		$res = $User->where($where)->delete(); 
		if ($res) {
			$this->success("删除成功！");
		}else{
			$this->error("对不起! 删除失败");
		}
	}

	public function checkLogin(){
		if (!isset($_SESSION['username'])) {
            $this->redirect("Index/index", array(), 2, "<div style='text-align: center; margin-top: 150px;'><h1>:(</h1><p style='font-size: 24px; line-height: 32px;'>对不起! 你还没有登录<br>暂不允许访问，请先进行登录<br><br><font color='red'>2</font>秒之后跳转</p></div>");
        }
	}

}