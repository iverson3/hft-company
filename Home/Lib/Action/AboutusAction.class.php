<?php

class AboutusAction extends Action {

	/**
	 * 公司介绍
	 */
	public function company_introduce(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 团队优势
	 */
	public function team_advantage(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 风险控制
	 */
	public function risk_control(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 企业文化
	 */
	public function enterprise_culture(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 公司组织架构
	 */
	public function company_structure(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);

		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 招贤纳士(招聘信息列表)
	 */
	public function jobs(){
		$news = M('Job_describe');
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

		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 招聘详细信息
	 */
	public function recruitment_info(){
		$id = $_GET['id'];

		// 从数据库中获取该招聘信息的详细内容
    	$User = M("Job_describe"); 
		$condition['id'] = $id;
		$res = $User->where($condition)->select(); 
		$this->assign("res", $res);

		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 填写职位申请
	 */
	public function apply_job(){
		// 所申请的职位的ID (提交申请时，作为隐藏字段一起提交)
		$id = $_GET['id'];

		$this->assign('job_id', $id);
		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 处理职位申请
	 */
	public function do_apply_job(){
		// 获取所有提交的数据
		$name              = $_POST['name'];
		$sex               = $_POST['sex'];
		$nation            = $_POST['nation'];
		$birthday          = $_POST['birthday'];
		$height   		   = $_POST['height'];
		$experience   	   = $_POST['experience'];
		$marital_status    = $_POST['marital_status'];
		$household         = $_POST['household'];
		$now_addr          = $_POST['now_addr'];
		$degrees           = $_POST['degrees'];
		$graduate_school   = $_POST['graduate_school'];
		$major             = $_POST['major'];
		$graduate_time     = $_POST['graduate_time'];
		$foreign_level     = $_POST['foreign_level'];
		$now_job           = $_POST['now_job'];
		$tel               = $_POST['tel'];
		$phone             = $_POST['phone'];
		$email             = $_POST['email'];
		$contact_addr      = $_POST['contact_addr'];
		$evaluation        = $_POST['evaluation'];
		$resume            = $_POST['resume'];
		$job_id            = $_POST['job_id'];
		$code              = $_POST['code'];

		if(md5($code) !== $_SESSION['verify']){
			$this->error('验证码错误');
		}

		// 确保必填字段不为空
		if ($name == "" || $sex == "" || $nation == "" || $experience == "" || $degrees == "" || $graduate_school == "" || $major == "" || $graduate_time == "" || $foreign_level == "" || $phone == "" || $contact_addr == "" || $email == "" || $resume == "") {
			$this->error('必填字段不允许为空');
		}

		// 将数据插入数据库
		$job = M("Job_apply"); 
		$data['name']            = $name;
		$data['sex']             = $sex;
		$data['nation']          = $nation;
		$data['birthday']        = $birthday;
		$data['height']          = $height;
		$data['experience']      = $experience;
		$data['marital_status']  = $marital_status;
		$data['household']       = $household;
		$data['now_addr']        = $now_addr;
		$data['degrees']         = $degrees;
		$data['graduate_school'] = $graduate_school;
		$data['major']           = $major;
		$data['graduate_time']   = $graduate_time;
		$data['foreign_level']   = $foreign_level;
		$data['now_job']         = $now_job;
		$data['tel']             = $tel;
		$data['phone']           = $phone;
		$data['email']           = $email;
		$data['contact_addr']    = $contact_addr;
		$data['evaluation']      = $evaluation;
		$data['resume']          = $resume;
		$data['job_id']          = $job_id;
		$res = $job->add($data);
		
		if ($res) {
			$this->success('申请成功');
		}else{
			$this->error('对不起! 申请失败');
		}
	}


	/**
	 * 资料下载
	 */
	public function download(){
		$download = M('Download_list');
        // 导入分页类
		import('ORG.Util.Page');
        // 查询满足要求的总记录数
		$count = $download->count();
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
		$list = $download->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
        // 赋值数据集
		$this->assign('list', $list);
        // 赋值分页输出
		$this->assign('pageBar', $show);

		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	public function downloadinfo(){
		$id = $_GET['id'];
		$download = M('Download_list');
		$where['id'] = $id;
		$res = $download->where($where)->select();

		$this->assign('list', $res);
		$this->assign('img_url', A('Public')->getImage(5));
		$this->display();
	}

	/**
	 * 进行下载处理
	 */
	public function do_download(){
		$id       = $_GET['id'];
		$filename = $_GET['filename'];
		$real_filename = $_GET['real_filename'];
		
		$this->filedownload($filename, $filename, $id, $real_filename);
	}

	/**
	 * 文件下载
	 * 使用thinkphp提供的Http.class.php类中的download方法实现下载             
	 */
	private function filedownload($filename, $showname, $id, $real_filename){
	    import('ORG.NET.Http');
	    // 截取文件后缀并与文件名拼接
	    $arr = split('[.]', $filename);
	    $real_filename = $real_filename.".".$arr[1];
	    // 拼接文件路径
	    $filename = "Public/Downloads/".$filename; 
	    // 进行下载，同时注意捕获异常
	    try {
	    	Http::download($filename, $real_filename);
	    	
	    	// 下载次数 +1
	    	$download = M("Download_list"); 
	    	$data['download_times'] = array('exp','download_times + 1');
	    	$download->where("id = $id")->save($data);
	    	exit();
	    } catch (Exception $e) {
	    	$this->error($e->getMessage());
	    }
	}

	/**
	 * 联系我们
	 */
	public function contact_us(){
		$pages = M("Static_pages");
		$where['en_title'] = __FUNCTION__;
		$res = $pages->where($where)->select();
		$this->assign('page', $res[0]['content']);
		
		$this->assign('img_url', A('Public')->getImage(5));
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