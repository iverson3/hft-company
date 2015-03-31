<?php  


class JobsAction extends Action{

	public function joblist(){
		$news = M('Job_describe');
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

	public function add(){
		$this->display();
	}

	public function do_add(){
		$title            = $_POST['title'];
		$numbers          = $_POST['numbers'];
		$type             = $_POST['type'];
		$experience       = $_POST['experience'];
		$area             = $_POST['area'];
		$degrees          = $_POST['degrees'];
		$treatment        = $_POST['treatment'];
		$create_time      = date('Y-m-d H:i:s');
		$end_time         = $_POST['end_time'];
		$describe_require = htmlspecialchars(stripslashes($_POST['describe_require']));
		$tel              = $_POST['tel'];
		$email            = $_POST['email'];


		if ($title == "" || $numbers == "" || $type == "" || $experience == "" || $area == "" || $degrees == "" || $treatment == "" || $end_time == "" || $describe_require == "" || $tel == "" || $email == "") {
			$this->error("字段不允许为空");
		}

		// 将数据插入数据库
		$job = M("Job_describe"); 
		$data['title']            = $title;
		$data['numbers']          = $numbers;
		$data['type']             = $type;
		$data['experience']       = $experience;
		$data['area']             = $area;
		$data['degrees']          = $degrees;
		$data['treatment']        = $treatment;
		$data['create_time']      = $create_time;
		$data['end_time']         = $end_time;
		$data['describe_require'] = $describe_require;
		$data['tel']              = $tel;
		$data['email']            = $email;

		$res = $job->add($data);
		
		if ($res) {
			$this->success('招聘信息添加成功！', 'joblist');
		}else{
			$this->error('对不起! 添加失败');
		}
	}

	public function update(){
		$id = $_GET['id'];

		// 从数据库中获取该招聘信息的详细内容
    	$User = M("Job_describe"); 
		$condition['id'] = $id;
		$res = $User->where($condition)->select(); 
		$this->assign("res", $res);
		$this->display();
	}

	public function do_update(){
		$id               = $_POST['id'];
		$title            = $_POST['title'];
		$numbers          = $_POST['numbers'];
		$type             = $_POST['type'];
		$experience       = $_POST['experience'];
		$area             = $_POST['area'];
		$degrees          = $_POST['degrees'];
		$treatment        = $_POST['treatment'];
		$create_time      = $_POST['create_time'];
		$end_time         = $_POST['end_time'];
		$describe_require = htmlspecialchars(stripslashes($_POST['describe_require']));
		$tel              = $_POST['tel'];
		$email            = $_POST['email'];


		if ($title == "" || $numbers == "" || $type == "" || $experience == "" || $area == "" || $degrees == "" || $treatment == "" || $end_time == "" || $describe_require == "" || $tel == "" || $email == "") {
			$this->error("字段不允许为空");
		}

		// 将数据插入数据库
		$job = M("Job_describe"); 
		$data['title']            = $title;
		$data['numbers']          = $numbers;
		$data['type']             = $type;
		$data['experience']       = $experience;
		$data['area']             = $area;
		$data['degrees']          = $degrees;
		$data['treatment']        = $treatment;
		$data['create_time']      = $create_time;
		$data['end_time']         = $end_time;
		$data['describe_require'] = $describe_require;
		$data['tel']              = $tel;
		$data['email']            = $email;

		$where['id'] = $id;
		$res = $job->where($where)->save($data);
		
		if ($res) {
			$this->success('招聘信息修改成功！', 'joblist');
		}else{
			$this->error('对不起! 修改失败');
		}	
	}

	public function delete(){
		$id = $_GET['id'];

		$User = M("Job_describe"); 
		$where['id'] = $id;
		$res = $User->where($where)->delete(); 
		if ($res) {
			$this->success("删除成功！");
		}else{
			$this->error("对不起! 删除失败");
		}
	}

	public function applyjob(){
		$news = M('Job_apply');
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
		$sql = "select a.id,a.name,a.sex,a.experience,a.degrees,a.graduate_school,a.major,b.title job from wf_job_apply a,wf_job_describe b where a.job_id = b.id  limit $page->firstRow, $page->listRows";
        $job = new Model();
        $list = $job->query($sql);
        // 赋值数据集
		$this->assign('list', $list);
        // 赋值分页输出
		$this->assign('pageBar', $show);
		$this->display();
	}

	/**
	 * 查看指定的职位申请信息详情
	 */
	public function apply_cont(){
		$id = $_GET['id'];
		$sql = "select a.*, b.id job_id, b.title job from wf_job_apply a,wf_job_describe b where a.job_id = b.id and a.id = $id";
        $job = new Model();
        $res = $job->query($sql);
        // 赋值数据集
		$this->assign('res', $res);
		$this->display();
	}

	/**
	 * 删除指定的职位申请信息
	 */
	public function delete_apply(){
		$id = $_GET['id'];

		$job = M("Job_apply");
		$where['id'] = $id;
		$res = $job->where($where)->delete();
		if ($res) {
			$this->success("删除成功");
		} else{
			$this->error("抱歉！删除失败");
		}
	}

	public function joinus(){
		$news = M('Joinus');
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

	public function join_cont(){
		$id = $_GET['id'];

		// 从数据库中获取该博客文章的详细内容
    	$User = M("Joinus"); 
		$condition['id'] = $id;
		$res = $User->where($condition)->select(); 
		$this->assign("res", $res);
		$this->display();
	}

	public function delete_join(){
		$id = $_GET['id'];

		$job = M("Joinus");
		$where['id'] = $id;
		$res = $job->where($where)->delete();
		if ($res) {
			$this->success("删除成功");
		} else{
			$this->error("抱歉！删除失败");
		}
	}

}


?>