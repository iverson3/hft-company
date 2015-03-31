<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
	.top{
		width: 100%;
		height: 64px;
		background-image: url("__PUBLIC__/Uploads/logos/logo-bg.png");
		background-repeat: repeat-x; 
	}
	.top img{
		float: left;
	}
	.top .btn-group{
		float: left;
		margin-left: 9%;
		margin-top: 15px;
	}
	.top #search{
		float: left;
	}
	.input-group input{
		float: left;
	}
	#search-button{
		display: block;
		float: left;
	}
	#search-button button span{
		display: inline-block;
		float: left;
	}
	.logo{
		height: 55px;
		margin: 5px 15px auto 15%;
	}

	#search{
		margin-left: 20%;
	}
	#search .input-group{
		margin-top: 15px;
		margin-left: 20%;
		float: left;
	}
	#search-button{
		position: absolute;
		left: 200px;
	}
	#search-button button{
		height: 34px;
	}
	#search-button button span{
		padding-left: 5px;
		padding-right: 5px;
		font-size: 16px;
	}
	#search-text{
		width: 200px;
	}


	.menus{
		width: 100%;
		height: 36px;
		background-color: #AB0900;
	}
	#menu{
		padding: 0;
		z-index: 30;
		background-color: #AB0900;
		width: auto;
		height: 100%;
		margin-left: 13%;
	}

	#menu li{	
		margin: 0;
		padding: 0;
		list-style: none;
		float: left;
		font: bold 12px arial;
	}

	#menu li a{	
		display: block;
		margin: 0 1px 0 0;
		padding: 7px 0 0px 0;
		width: auto;
		height: 36px;
		min-width: 108px;
		background: #AB0900;
		color: #FFF;
		text-align: center;
		text-decoration: none;
		font-size: 16px;
		font-family: "微软雅黑";
		font-family: "微软雅黑" !important;
	}

	#menu li a:hover{	
		background: #ECABA8;  
	}

	#menu div{	
		position: absolute;
		visibility: hidden;
		margin: 0;
		padding: 0;
		background: #AB0900;
		z-index: 100;
		margin-top: 12px;
	}
	#menu div span{
		position: absolute;
		top: -12px;
		left: 40px;
		width: 0;
		height: 0;
		border-left: 12px solid transparent;  
		border-right: 12px solid transparent; 
		border-bottom: 12px solid #AB0900;
	}

	#menu div a{	
		position: relative;
		display: block;
		margin: 0;
		padding: 8px 15px 8px 20px;
		width: auto;
		min-width: 118px;
		height: 35px;
		white-space: nowrap;
		text-align: left;
		text-decoration: none;
		background-color: #AB0900;
		color: white;
		font: 12px arial;
		font-size: 15px;
		font-weight: bold;
		font-family: "微软雅黑";
		font-family: "微软雅黑" !important;
	}

	#menu div a:hover{	
		background: #ECABA8;
		color: #FFF;
		z-index: 100;
	}
</style>

<div>
	<div class="top">
		<img class="logo" src="__PUBLIC__/Uploads/logos/logo.png" alt="logo">
		<img class="logo-right" src="__PUBLIC__/Uploads/logos/logo-right.png" alt="">
      	<div id="search">
  			<div class="input-group">
  				<form action="__APP__/Public/search" method="get">
  		    	    <input type="text" id="search-text" name="search" class="form-control" placeholder="请输入关键字" value="<?php echo ($keyword); ?>">
  		    	    <span class="input-group-btn" id="search-button">
  		    	        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
  		    	    </span>
  			    </form>
  			</div>
      	</div>
		<div class="btn-group">
		  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		    登录入口 <span class="caret"></span>
		  	</button>
		  	<ul class="dropdown-menu" role="menu">
		    	<li><a href="__ROOT__/Admin.php/Index/index">后台登录</a></li>
		    	<li><a href="http://59.175.137.107:8092/posa/merlogin.jsp">商户登录</a></li>
		    	<li><a href="http://59.175.137.107:8092/posa/">代理商登录</a></li>
		  	</ul>
		</div>
	</div>

	<div class="menus">
		<ul id="menu">
			<li>
				<a class="menu-as" href="__APP__/Index" onmouseover="mopen('m1')" onmouseout="mclosetime()">首页</a>
			</li>
			<li>
				<a class="menu-as" href="__APP__/Service/product_introduction" onmouseover="mopen('m2')" onmouseout="mclosetime()">商户服务</a>
				<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<span></span>
					<a href="__APP__/Service/product_introduction">产品介绍</a>
					<a href="__APP__/Service/pos_install">POS机具安装维护</a>
					<a href="__APP__/Service/data_analysis">交易数据系统分析</a>
					<a href="__APP__/Service/capital_settlement">资金结算差错处理</a>
					<a href="__APP__/Service/online_transactions">在线交易监控</a>
					<a href="__APP__/Service/business_training">商户培训</a>
				</div>
			</li>
			<li>
				<a class="menu-as" href="__APP__/Personalpay/product_introduction" onmouseover="mopen('m3')" onmouseout="mclosetime()">理财投资</a>
				<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<span></span>
					<a href="__APP__/Personalpay/product_introduction">产品介绍</a>
				</div>
			</li>
			<li>
				<a class="menu-as" href="__APP__/News/enterprise" onmouseover="mopen('m4')" onmouseout="mclosetime()">新闻资讯</a>
				<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<span></span>
					<a href="__APP__/News/enterprise">企业动态</a>
					<a href="__APP__/News/industry">行业资讯</a>
				</div>
			</li>
			<li>
				<a class="menu-as" href="__APP__/Cooperateman/index" onmouseover="mopen('m5')" onmouseout="mclosetime()">合作伙伴</a>
			</li>
			<li>
				<a href="__APP__/Financialknows/rmb" onmouseover="mopen('m6')" onmouseout="mclosetime()">金融知识</a>
				<div id="m6" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<span></span>
					<a href="__APP__/Financialknows/rmb">人民币知识</a>
					<a href="__APP__/Financialknows/bank_card">银行卡知识</a>
					<a href="__APP__/Financialknows/anti_money">反洗钱知识</a>
					<a href="__APP__/Financialknows/pay">支付结算知识</a>
					<a href="__APP__/Financialknows/financial_security">个人金融信息安全</a>
					<a href="__APP__/Financialknows/financial_law">金融法律法规解答</a>
					<a href="__APP__/Financialknows/financial_knows">金融知识普及读本</a>
				</div>
			</li>
			<li>
				<a class="menu-as" href="__APP__/Aboutus/company_introduce" onmouseover="mopen('m7')" onmouseout="mclosetime()">关于我们</a>
				<div id="m7" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<span></span>
					<a href="__APP__/Aboutus/company_introduce">公司介绍</a>
					<a href="__APP__/Aboutus/team_advantage">团队优势</a>
					<a href="__APP__/Aboutus/risk_control">风险控制</a>
					<a href="__APP__/Aboutus/enterprise_culture">企业文化</a>
					<a href="__APP__/Aboutus/company_structure">公司组织架构</a>
					<a href="__APP__/Aboutus/jobs">招贤纳士</a>
					<a href="__APP__/Aboutus/download">资料下载</a>
					<a href="__APP__/Aboutus/contact_us">联系我们</a>
				</div>
			</li>
			<li>
				<a class="menu-as" href="__APP__/Merchantaccess/access_process" onmouseover="mopen('m8')" onmouseout="mclosetime()">商家接入</a>
				<div id="m8" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
					<span></span>
					<a href="__APP__/Merchantaccess/access_process">接入流程</a>
					<a href="__APP__/Merchantaccess/operating_advantage">运营服务优势</a>
					<a href="__APP__/Merchantaccess/background_advantage">后台支撑优势</a>
					<a href="__APP__/Merchantaccess/pos_problems">POS机办理问题</a>
				</div>
			</li>
			<li>
				<a class="menu-as" href="__APP__/Joinus/index" onmouseover="mopen('m9')" onmouseout="mclosetime()">加盟我们</a>
			</li>
		</ul>
	</div>
</div>




<script type="text/javascript">
	var timeout         = 200;
	var closetimer		= 0;
	var ddmenuitem      = 0;

	// open hidden layer
	function mopen(id)
	{	
		// cancel close timer
		mcancelclosetime();

		// close old layer
		if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

		// get new layer and show it
		ddmenuitem = document.getElementById(id);
		ddmenuitem.style.visibility = 'visible';
		document.getElementById('span1').style.visibility = 'visible';
		document.getElementByClassName()

	}
	// close showed layer
	function mclose()
	{
		if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
	}

	// go close timer
	function mclosetime()
	{
		closetimer = window.setTimeout(mclose, timeout);
	}

	// cancel close timer
	function mcancelclosetime()
	{
		if(closetimer)
		{
			window.clearTimeout(closetimer);
			closetimer = null;
		}
	}

	// close layer when click-out
	document.onclick = mclose; 
</script>