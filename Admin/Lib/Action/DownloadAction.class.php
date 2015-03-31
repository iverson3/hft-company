<?php  


class DownloadAction extends Action{

	/**
	 * 上传"下载资源"
	 */
	public function up(){
		$this->display();
	}

	/**
	 * 实现资源的上传
	 */
	public function do_up(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		// 设置允许文件上传的大小(byte)
		$upload->maxSize = 1024*1024*200; 
		// 设置允许文件上传的文件类型
		$upload->allowExts = array('txt', 'doc', 'xls', 'ppt', 'rar', 'docx', 'pptx', 'zip');
		// 存在同名文件是否覆盖 
		$upload->uploadReplace = false;
		// 设置文件上传保存的路径
		$upload->savePath = './Public/Downloads/';
		if (!$upload->upload()) {
			$this->error("抱歉! 文件上传失败<br>".$upload->getErrorMsg());
		} else {
			// 上传成功,获取上传文件信息 (二维数组,包含上传的文件的各种信息)
			$info = $upload->getUploadFileInfo();
			// 将上传的文件的相关信息保存到数据库中,供文件下载时使用
			$m = M('Download_list');
			for($i=0; $i<count($info); $i++){
				// 这里我们将文件的原完整文件名放到数据库中(包含文件类型后缀)
				$data['real_filename']  = $info[$i]['name'];
				$data['filename']       = $info[$i]['savename'];
				// 根据文件大小的不同使用不同的单位及取小数位数
				if ((int)($info[$i]['size']) > 1048576) {
					$data['filesize']   = substr(($info[$i]['size']/(1024*1024)), 0, 5)."MB";
				}else if( ((int)($info[$i]['size']) < 1048576) && ((int)($info[$i]['size']) > 102400) ){
					$data['filesize']   = substr(($info[$i]['size']/1024), 0, 6)."KB";
				}else{
					$data['filesize']   = substr(($info[$i]['size']/1024), 0, 5)."KB";
				}
				$data['update_time']    = date('Y-m-d H:i:s');
				$data['download_times'] = 0;
				$id= $m->add($data);
			}
			$this->success('文件上传成功!!');
		}
	}

	/**
	 * 下载资源列表
	 */
	public function lists(){
		$news = M('Download_list');
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
	 * 修改下载资源信息
	 */
	public function update(){
		$id = $_GET['id'];

		// 从数据库中获取该招聘信息的详细内容
    	$User = M("Download_list"); 
		$condition['id'] = $id;
		$res = $User->where($condition)->select(); 
		$this->assign("res", $res);
		$this->display();
	}

	/**
	 * 实现"下载资源"信息的修改
	 */
	public function do_update(){
		$id             = $_POST['id'];
		$real_filename  = $_POST['real_filename'];
		$filesize       = $_POST['filesize'];
		$update_time    = $_POST['update_time'];
		$download_times = $_POST['download_times'];

		if ($real_filename == "") {
			$this->error("字段不允许为空");
		}
		// 将数据插入数据库
		$job = M("Download_list"); 
		$data['real_filename']  = $real_filename;
		$data['filesize']       = $filesize;
		$data['update_time']    = $update_time;
		$data['download_times'] = $download_times;

		$where['id'] = $id;
		$res = $job->where($where)->save($data);
		
		if ($res) {
			$this->success('资源信息修改成功！', 'lists');
		}else{
			$this->error('对不起! 修改失败');
		}	
	}

	/**
	 * 删除指定的"下载资源"
	 */
	public function delete(){
		$id = $_GET['id'];

		$User = M("Download_list"); 
		$where['id'] = $id;
		$result = $User->where($where)->select();
		$filename = $result[0]['filename'];

		$res = $User->where($where)->delete(); 
		if ($res) {
			// 将存储在服务器上的文件同时删除
			$file_path = "./Public/Downloads/".$filename;
			if (file_exists($file_path)) {
			    unlink($file_path);
			}

			$this->success("删除成功！");
		}else{
			$this->error("对不起! 删除失败");
		}
	}

}


?>