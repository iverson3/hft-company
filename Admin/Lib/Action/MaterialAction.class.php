<?php  

/**
 *
 * "素材"控制器
 * 专门管理网站的各种素材(文本内容 图片 一些标题名字 等)
 * 
 */

class MaterialAction extends Action{

	/**
	 * 编辑前台静态页面的内容 (网站前台所有的静态页面)
	 */
	public function about_company(){
		$pages = M("Static_pages");
		$res = $pages->select();
		$this->assign("pagelist", $res);
		$this->display();
	}

	/**
	 * 使用ajax异步获取静态页面中的内容
	 */
	public function ajax_getPageCont(){
		$en_title = $_GET['en_title'];

		$pages = M("Static_pages");
		$where['en_title'] = $en_title;
		$res = $pages->where($where)->select();
		// 将获取的数据封装为json数据
		$result = array();
	    for ($i = 0; $i < count($res); $i++){
	        $result[$i] = array('content' => $res[$i]['content']);
	    }
	    $result = json_encode($result);
	    $this->ajaxReturn($result, "新增成功！", 1);
	}

	/**
	 * 更新指定的静态页面内容
	 */
	public function update_page(){
		$en_title = $_POST['page'];
		$content  = $_POST['content'];
		
		$pages = M("Static_pages");
		$where['en_title'] = $en_title;
		$data['content']   = $content;
		$res = $pages->where($where)->save($data);
		if ($res) {
			$this->success("编辑成功");
		} else{
			$this->error("抱歉！编辑失败");
		}
	}



	/**
	 * 修改网站相关的一些图片资源(logo 轮播图片组 合作方 产品图片)
	 */
	public function images(){
		$img = M('Lunbo_imgs');
		$res = $img->select();
		$this->assign('lunbo_img_list', $res);

		// 文件夹地址
		$hostdir = "./Public/Uploads/parts/";
		// 获取也就是扫描文件夹内的文件及文件夹名存入数组$filesnames
		$filesnames = scandir($hostdir);
		$list = array();
		foreach ($filesnames as $name) {
			$list[]['imgname'] = $name; 
		}
		// 移除数组的前两项(. 和 .. [扫描文件夹时得到的])
		unset($list[0]);
		unset($list[1]);
		unset($list[2]);
		$this->assign("part_img_list", $list);
		$this->display();
	}

	public function images_logo_upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		// 设置允许文件上传的大小(byte)
		$upload->maxSize = 1024*1024*1; 
		// 设置允许文件上传的文件类型
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
		// 存在同名文件是否覆盖 
		$upload->uploadReplace = true;
		
		// 设置文件上传保存的路径
		$upload->savePath = './Public/Uploads/logos/';
		if (!$upload->upload()) {
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
			$this->replace_logo($info[0]['savename']);
			$this->success('文件上传成功!!');
		}
	}

	/**
	 * 进行logo图片的覆盖操作
	 * 新的logo图片取代原来的logo图片
	 */
	private function replace_logo($filename){
		// 删除原logo图片文件
		$file_path = "./Public/Uploads/logos/logo.png";
		if (file_exists($file_path)) {
		    unlink($file_path);
		}
		// 对新上传的图片进行重命名
		if (rename("./Public/Uploads/logos/".$filename, "./Public/Uploads/logos/logo.png")) {
			return true;
		}else{
			return false;
		}
	}

	/**
	 * 轮播图片的上传
	 */
	public function images_lunbo_upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		// 设置允许文件上传的大小(byte)
		$upload->maxSize = 1024*1024*2; 
		// 设置允许文件上传的文件类型
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
		// 存在同名文件是否覆盖 
		$upload->uploadReplace = true;
		
		// 设置文件上传保存的路径
		$upload->savePath = './Public/Uploads/lunbo_imgs/';
		if (!$upload->upload()) {
			$this->error($upload->getErrorMsg());
		} else {
			// 上传成功,获取上传文件信息 (二维数组,包含上传的文件的各种信息)
			$info = $upload->getUploadFileInfo();

			// 将上传的文件的相关信息保存到数据库中  供文件下载时使用
			$m = M('Lunbo_imgs');
			for($i = 0; $i < count($info); $i++){
				// 从带后缀的图片文件名中截取出"纯名字"部分
				$name = preg_split("/\./", $info[$i]['name'], -1, PREG_SPLIT_OFFSET_CAPTURE);
				$data['real_imgname'] = $name[0][0];
				$data['imgname']      = $info[$i]['savename'];
				$data['size']         = $info[$i]['size'];
				$data['status']       = 0;
				$id = $m->add($data);
			}

			$this->success('文件上传成功!!');
		}
	}

	/**
	 * 更新轮播图片列表
	 */
	public function update_lunbo(){
		$arr = $_POST['lunbos'];
		if (count($arr) != 3) {
			$this->error("注意：选中的图片只能是三张");
		}
		$img = M('Lunbo_imgs');
		// 先将所有图片的状态都设置为 0
		$clear['status'] = 0;
		$img->where("status = 1")->save($clear);
		// 循环将选中的图片的状态设置为 1
		for ($i = 0; $i < 3; $i ++) { 
			$where['imgname'] = $arr[$i];
			$data['status']   = 1;
			$img->where($where)->save($data);
		}
		$this->success("保存成功");
	}

	/**
	 * 删除指定的轮播图片
	 */
	public function delete_lunbo(){
		$id = $_GET['id'];
		$img = M('Lunbo_imgs');
		$where['id'] = $id;
		$res = $img->where($where)->delete();
		if ($res) {
			$this->success("图片删除成功");
		}else{
			$this->error("抱歉！删除失败");
		}
	}

	/**
	 * 合作方图片上传
	 */
	public function images_part_upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		// 设置允许文件上传的大小(byte)
		$upload->maxSize = 1024*1024*2; 
		// 设置允许文件上传的文件类型
		$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
		// 存在同名文件是否覆盖 
		$upload->uploadReplace = false;
		
		// 设置文件上传保存的路径
		$upload->savePath = './Public/Uploads/parts/';
		if (!$upload->upload()) {
			$this->error($upload->getErrorMsg());
		} else {
			$this->success('图片上传成功!!');
		}
	}

	/**
	 * 删除指定的合作方图片
	 */
	public function delete_part(){
		// 删除指定的图片
		$imgname = $_GET['imgname'];
		$file_path = "./Public/Uploads/parts/".$imgname;
		if (file_exists($file_path)) {
		    unlink($file_path);
		}
		$this->success("图片删除成功");
	}


	/**
	 * 修改其他相关的素材资源
	 */
	public function others(){
		$img = M('Contact_info');
		$res = $img->select();
		$this->assign("res", $res);

		$file = file_get_contents("./Public/File/company_introduce.txt");
		$this->assign('company_introduce', $file);

		$this->display();
	}

	public function update_contact(){
		$id        = $_POST['id'];
		$title     = $_POST['title'];
		$tel       = $_POST['tel'];
		$contacter = $_POST['contacter'];

		$contact = M('Contact_info');
		$where['id']       = $id;
		$data['title']     = $title;
		$data['tel']       = $tel;
		$data['contacter'] = $contacter;
		$res = $contact->where($where)->save($data);
		if ($res) {
			$this->success("修改成功");
		}else{
			$this->error("抱歉！编辑失败");
		}
	}

	public function update_company_introduce(){
		$file = $_POST['company_introduce'];
		file_put_contents("./Public/File/company_introduce.txt", $file);

		$this->success("修改成功");
	}

}


?>