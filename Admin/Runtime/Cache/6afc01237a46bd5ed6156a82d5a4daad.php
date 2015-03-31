<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>锁屏 | 汉富通后台</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/lock.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="__PUBLIC__/vendor/metronic-bootstrap/image/favicon.ico" />
	<style type="text/css">
		body{
			background-color: #3D3D3D;
		}
		#locked{
			padding-top: 10px;
			padding-bottom: 30px;
		}
		#locked em{
			color: #2CB044;
			font-weight: bold;
		}
		#coperight-div{
			color: #2CB044;
			font-size: 12px;
		}
		#logo-big{
			height: 36px;
			position: relative;
			top: 7px;
			left: 5px;
		}
	</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
	<div class="page-lock">
		<div class="page-logo">
			<a class="brand" href="javascript:;">
			<img id="logo-big" src="__PUBLIC__/Images/logo-big.png" alt="logo" />
			</a>
		</div>
		<div class="page-body">
			<img class="page-lock-img" src="__PUBLIC__/Images/profile.jpg" alt="">
			<div class="page-lock-info">
				<h1><?php echo ($username); ?></h1>
				<span></span>
				<span id="locked"><em>[Locked]</em></span>
				<form class="form-search" action="__APP__/Public/unlock" method="post">
					<div class="input-append">
						<input type="password" class="m-wrap" name="password" placeholder="Password">
						<button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
					</div>
					<div class="relogin">
						<a href="__APP__/Index/index">Not <?php echo ($username); ?> ?</a>
					</div>
				</form>
			</div>
		</div>
		<div id="coperight-div" class="page-footer">
			2013 &copy; Metronic. Admin Dashboard Template.
		</div>
	</div>
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<!--[if lt IE 9]>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/excanvas.min.js"></script>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/respond.min.js"></script>  
	<![endif]-->   
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.uniform.min.js" type="text/javascript" ></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.backstretch.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->   
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/app.js"></script>  
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/lock.js"></script>      
	<script>
		jQuery(document).ready(function() {    
		   App.init();
		   Lock.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->
</html>