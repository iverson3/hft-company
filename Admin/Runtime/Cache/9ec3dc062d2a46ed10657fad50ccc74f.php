<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
	body{
		background-color: #3D3D3D;
	}
	#logo-img{
		height: 38px;
		margin-top: -7px;
		margin-left: 50px;
	}
</style>

<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="navbar-inner">
		<div class="container-fluid">
			<!-- BEGIN LOGO -->
			<a class="brand" href="__APP__/Index/home">
				<img id="logo-img" src="__PUBLIC__/vendor/metronic-bootstrap/image/logo.png" alt="logo"/>
			</a>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="__PUBLIC__/vendor/metronic-bootstrap/image/menu-toggler.png" alt="" />
			</a>          
			<!-- END RESPONSIVE MENU TOGGLER -->            

			<!-- BEGIN TOP NAVIGATION MENU -->              
			<ul class="nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="__PUBLIC__/vendor/metronic-bootstrap/image/avatar1_small.jpg" />
						<span class="username"> 汉富通后台 </span>
						<i class="icon-angle-down"></i>
					</a>
					<!-- 右上角的下拉菜单 wangfan -->
					<ul class="dropdown-menu">
						<li><a href="__APP__/Public/extra_lock"><i class="icon-lock"></i> 锁屏</a></li>
						<li><a href="__APP__/Index/logout"><i class="icon-key"></i> 登出</a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			</ul>
			<!-- END TOP NAVIGATION MENU --> 
		</div>
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->