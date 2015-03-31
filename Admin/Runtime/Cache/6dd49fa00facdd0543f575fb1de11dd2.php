<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>编辑其他内容 | 汉富通后台</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<?php echo R('Public/include_css', '', 'Widget');?>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="__PUBLIC__/vendor/metronic-bootstrap/image/favicon.ico" />
	<style type="text/css">
		#update_contact{
			margin-top: 30px;
		}
		#update_contact input{
			margin-top: 5px;
		}
		#update_contact span{
			color: gray;
			font-size: 22px;
			line-height: 42px;
		}
		#update_contact textarea{
			width: 400px;
			height: 200px;
		}
		#adduser{
			width: 220px;
			height: 32px;
			padding-top: 10px;
			padding-bottom: 10px;
		}
		#contact_input{
			width: 220px;
			height: 32px;
			margin-left: 53px;
			padding-top: 10px;
			padding-bottom: 10px;
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
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption"><i class="icon-home"></i> 编辑网站其他素材</div>
						</div>
					</div>
					
					<!-- BEGIN PAGE CONTENT-->
					<div class="row-fluid">
						<div class="tabbable tabbable-custom tabbable-full-width">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#tab_2_2">网站首页公司简介</a></li>
								<li><a data-toggle="tab" href="#tab_2_3">代理商加盟联系方式</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab_2_2" class="tab-pane active">
									<div class="row-fluid">
										<div class="span12">
											<form action="__APP__/Material/update_company_introduce" method="post" id="update_contact">
												<span>公司简介: </span><br>
												<textarea name="company_introduce" class="form-control" rows="4"><?php echo ($company_introduce); ?></textarea><br><br>
												<input type="submit" id="adduser" class="btn mini green" value="确 定"> 
											</form>
										</div>
									</div>
									<div class="space40"></div>
									<div class="pagination pagination-centered"></div>
								</div>
								<!--end tab-pane-->
								<div id="tab_2_3" class="tab-pane">
									<div class="row-fluid">
										<div class="span12">
											<form action="__APP__/Material/update_contact" method="post" id="update_contact">
												<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
													标　题: <input type="text" name="title" value="<?php echo ($vo["title"]); ?>"><br>
													电　话: <input type="text" name="tel" value="<?php echo ($vo["tel"]); ?>"><br>
													联系人: <input type="text" name="contacter" value="<?php echo ($vo["contacter"]); ?>"><br><br>
													<input type="submit" id="contact_input" class="btn mini green" value="确 定"><?php endforeach; endif; else: echo "" ;endif; ?>
											</form>
										</div>
									</div>
									<div class="spac40"></div>
									<div class="pagination pagination-centered">
									</div>
								</div>
								<!--end tab-pane-->
							</div>
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