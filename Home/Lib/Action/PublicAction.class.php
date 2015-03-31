<?php  


class PublicAction extends Action{

	/**
	 * 站内搜索
	 */
	public function search(){
		$keyword = $_GET['search'];
		if ($keyword == "") {
			$this->error("请先输入关键字");
		}
		// 对搜索的关键字进行编码转换(使其分页支持中文关键字) [不需要]
		// $keyword = iconv('gbk', 'utf-8', $keyword);
		$radio   = isset($_GET['selects'])? $_GET['selects'] : "Enterprise_news";
		switch ($radio) {
			case 'Enterprise_news':
				$searchtype = "企业资讯";
				$request_url = "News/enterprise_info";
				$sign = 1;
				break;
			case 'Job_describe':
				$searchtype = "招聘信息";
				$request_url = "Aboutus/recruitment_info";
				$sign = 2;
				break;
			case 'Download_list':
				$searchtype = "下载资源";
				$request_url = "Aboutus/downloadinfo";
				$sign = 3;
				break;
			default:
				$searchtype = "";
				$request_url = "";
				break;
		}


		$model = new Model();
		if ($radio == "Enterprise_news") {
			$sql = "select id from wf_enterprise_news where title like '%".$keyword."%' or content like '%".$keyword."%'"; 
		}else if($radio == "Job_describe"){
			$sql = "select id from wf_job_describe where title like '%".$keyword."%' or describe_require like '%".$keyword."%'"; 
		}else{
			$sql = "select id from wf_download_list where real_filename like '%".$keyword."%'"; 
		}
		$res = $model->query($sql);
        // 导入分页类
		import('ORG.Util.Page');
        // 查询满足要求的总记录数
		$count = count($res);
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
		if ($radio == "Enterprise_news") {
			$sql = "select id, title from wf_enterprise_news where title like '%".$keyword."%' or content like '%".$keyword."%' limit $page->firstRow, $page->listRows"; 
		}else if($radio == "Job_describe"){
			$sql = "select id, title from wf_job_describe where title like '%".$keyword."%' or describe_require like '%".$keyword."%' limit $page->firstRow, $page->listRows"; 
		}else{
			$sql = "select id, real_filename title from wf_download_list where real_filename like '%".$keyword."%' limit $page->firstRow, $page->listRows"; 
		}
		
		$res = $model->query($sql);

		// 判断搜索结果是否为空
        if(count($res) > 0){
        	$res = $this->keyword_replace($res, $keyword, "<font color='red'>".$keyword.'</font>');
            $this->assign("res", $res);
            // 赋值分页输出
			$this->assign('pageBar', $show);
        }else{
            $this->assign("res", "0");
        }

		$this->assign('img_url', 'img1.png');
		$this->assign('keyword', $keyword);
		$this->assign('sign', $sign);
		$this->assign('searchtype', $searchtype);
		$this->assign('request_url', $request_url);
		$this->display();
	}

	/**
	 * 模块中方法的参数列表  能够接收来自url ? 后面带的参数 (如: src="__APP__/Public/code?width=50&height=25" )
	 * 当然这种方式传递的参数  也可以选择在方法体里面 用 $_GET['width'] 方式来获取
	 */
	public function code($width=50, $height=25){
		import('ORG.Util.Image');
		Image::buildImageVerify(4, 1, 'png', $width, $height, 'verify');
	}


	/**
     * 将关键词替换成红色的字体
     * 
     * @param  resource  $res     待替换的目标的结果集
     * @param  string    $keyword 待替换的目标字串
     * @param  string    $value   替换后的字串
     * @return resource           替换后的结果集
     */
	private function keyword_replace($res, $keyword, $value){
		// 构建匹配的正则式 (keyword中包含中文时，必须使用u  u表示使用utf-8编码)
		$keyword = "/$keyword/u";
		// 循环进行匹配和替换
        for ($i = 0; $i < count($res); $i++) { 
        	$str = $res[$i]['title'];
            $res[$i]['title'] = preg_replace($keyword, $value, $str);
        }
        return $res;
    }


    public function getImage($num){
    	$img = M('Lunbo_imgs');
    	$res = $img->order('id asc')->select();
    	return $res[$num]['imgname'];
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