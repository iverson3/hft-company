<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>用户删除 | 汉富通后台</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<?php echo R('Public/include_css', '', 'Widget');?>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="__PUBLIC__/vendor/metronic-bootstrap/image/favicon.ico" />

	<style type="text/css">
		.lunbo-tip{
			padding: 20px 0px 10px 0px;
			width: 98%;
			height: auto;
			margin-top: 20px;
		}
		.lunbo-tip p{
			font-size: 26px;
			color: blue;
			font-weight: bold;
		}
		.lunbo-tip span{
			color: gray;
			font-size: 24px;
		}
		.green{
			padding-top: 10px;
			padding-bottom: 10px;
			margin-right: 20px;
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
							<div class="caption"><i class="icon-home"></i> 删除管理员账号</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="lunbo-tip">
							<p>管理员列表:</p>
							<hr class="clearfix"/>
							<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="__APP__/System/do_deluser?id=<?php echo ($vo["id"]); ?>" id="delete-part" class="btn mini green"><i class="icon-trash"></i> 删除用户</a>
								<span><?php echo ($vo["username"]); ?></span>
								<hr class="clearfix"/><?php endforeach; endif; else: echo "" ;endif; ?>
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