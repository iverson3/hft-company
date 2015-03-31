<?php

class NewsAction extends Action {

	/**
	 * 企业动态
	 */
	public function enterprise(){
		$news = M('Enterprise_news');
        // 导入分页类
		import('ORG.Util.Page');
        // 查询满足要求的总记录数
		$count = $news->count();
        // 实例化分页类 传入总记录数和每页显示的记录数(15)
		$page = new Page($count, 15);
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

		$this->assign('img_url', 'img3.png');
		$this->display();
	}

	/**
	 * 行业资讯
	 */
	public function industry(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);
		
		$this->assign('img_url', 'img1.png');
		$this->display();
	}

	/**
	 * "企业动态"详细内容页面
	 */
	public function enterprise_info(){
		$id = $_GET['id'];

		// 从数据库中获取该博客文章的详细内容
    	$User = M("Enterprise_news"); 
		$condition['id'] = $id;
		$res = $User->where($condition)->select(); 
		$this->assign("res", $res);

		// 浏览量 +1
		$data['read_times'] = array('exp','read_times + 1');
		$User->where("id = $id")->save($data);
		
		$model = new Model();
		// 上一篇
		$sql = "select id,title from wf_enterprise_news where id = (select id from wf_enterprise_news where id < {$id} order by id desc limit 1)";
		$res = $model->query($sql);
		if ($res) {
			$this->assign('prev', $res[0]['id']);
			$this->assign('prev_title', $res[0]['title']);
		} else{
			$this->assign('prev', 0);
		}
		
		// 下一篇
		$sql = "select id,title from wf_enterprise_news where id = (select id from wf_enterprise_news where id > {$id} order by id asc limit 1)";
		$res = $model->query($sql);
		if ($res) {
			$this->assign('next', $res[0]['id']);
			$this->assign('next_title', $res[0]['title']);
		} else{
			$this->assign('next', 0);
		}

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