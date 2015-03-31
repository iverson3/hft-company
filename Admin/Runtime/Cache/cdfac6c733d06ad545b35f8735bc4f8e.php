<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>新闻修改 | 汉富通后台</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<?php echo R('Public/include_css', '', 'Widget');?>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="__PUBLIC__/vendor/metronic-bootstrap/image/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="__PUBLIC__/vendor/ueditor/themes/default/css/ueditor.css">
	<script type="text/javascript" charset="utf-8" src="__PUBLIC__/vendor/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="__PUBLIC__/vendor/ueditor/ueditor.all.js"></script>
	<style type="text/css">
	
		#main-content{
			width: 100%;
			height: auto;
		}
		.td-divs{
			padding-top: 10px;
			padding-bottom: 0px;
			height: 30px;
			color: gray;
			font-size: 15px;
		}
		.td-divs input{
			width: 600px;
			min-width: 600px;
		}

		#green{
			margin-left: 30%;
			-moz-border-radius: 5px; 
			-webkit-border-radius: 5px; 
		}
		#reset{
			margin-left: 60px;
		}
		#tr-res td div{
			width: 70px;
		}

		.portlet-title{
			background-color: #4B8DF8;
			padding-top: 9px;
			padding-left: 8px;
		}
	</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<?php echo R('Public/header', '', 'Widget');?>
	
	<!-- BEGIN CONTAINER -->
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<?php echo R('Public/leftmenu', '', 'Widget');?>
		<!-- END SIDEBAR -->

		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					Widget settings form goes here
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<?php echo R('Public/color_panel', '', 'Widget');?>
						<?php echo R('Public/main_top', '', 'Widget');?>
					</div>
				</div>
				<!-- END PAGE HEADER-->


				<!-- 主要内容部分 wangfan -->
				<div id="dashboard">
					<div class="portlet-title">
						<div class="caption"><i class="icon-edit"></i> 新闻修改</div>
					</div>

					<div class="clearfix"></div>
					<div class="row-fluid">
						<div id="main-content">
							<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form method="post" action="__APP__/News/do_update">
									<table class="table table-bordered">
										<tr>
											<td class="td-divs">标题: </td>
											<td><input type="text" class="form-control" name="title" value="<?php echo ($vo["title"]); ?>"></td>
										</tr>
										<tr>
											<td class="td-divs">浏览量: </td>
											<td><input type="text" readonly class="form-control" name="read_times" value="<?php echo ($vo["read_times"]); ?>"></td>
										</tr>
										<tr>
											<td class="td-divs">内容: </td>
											<td>
												<!-- ueditor文本编辑器 -->
												<script id="editor" name="content" type="text/plain" style="">
												<?php echo ($vo["content"]); ?></script>
											</td>
										</tr>
										<tr>
											<td class="td-divs">来源: </td>
											<td><input type="text" class="form-control" name="source" value="<?php echo ($vo["source"]); ?>"></td>
										</tr>
										<tr>
											<td class="td-divs">编者: </td>
											<td><input type="text" class="form-control" name="author" value="<?php echo ($vo["author"]); ?>"></td>
										</tr>
										<tr>
											<td class="td-divs">发布时间: </td>
											<td><input type="text" readonly class="form-control" name="create_time" value="<?php echo ($vo["create_time"]); ?>"></td>
										</tr>
										<tr id="tr-res">
				              				<td colspan="1">
				              					<div></div>
				              					<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
				              				</td>
				              				<td colspan="1">
				              					<input class="btn green" id="green" type="submit" value="提 交">
				              					<input class="btn" id="reset" type="reset" value="重 置">
				              				</td>
				              			</tr>
									</table>
								</form><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>

				</div>
			</div>
			<!-- END PAGE CONTAINER-->    


		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->

	<?php echo R('Public/footer', '', 'Widget');?>
	
	<?php echo R('Public/include_js', '', 'Widget');?>
	<script>
		jQuery(document).ready(function() {    
		   App.init(); // initlayout and core plugins
		   Index.init();
		   Index.initJQVMAP(); // init index page's custom scripts
		   Index.initCalendar(); // init index page's custom scripts
		   Index.initCharts(); // init index page's custom scripts
		   Index.initChat();
		   Index.initMiniCharts();
		   Index.initDashboardDaterange();
		   Index.initIntro();
		});
	</script>
	<!-- END JAVASCRIPTS -->

<script type="text/javascript">
	window.onload = function(){
		// 根据ID选择加载不同的文本编辑器 editor
		var ue = UE.getEditor('editor');
	}   


	var _gaq = _gaq || [];
  	_gaq.push(['_setAccount', 'UA-37564768-1']);
    _gaq.push(['_setDomainName', 'keenthemes.com']);
    _gaq.push(['_setAllowLinker', true]);
    _gaq.push(['_trackPageview']);
    (function() {    
    	var ga = document.createElement('script'); 
        ga.type = 'text/javascript'; 
        ga.async = true;    
        ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);  
    })();
</script>
</body>
<!-- END BODY -->

</html>