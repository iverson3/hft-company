<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>汉富通</title>
	<link href="__PUBLIC__/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		.carousel-indicators li{
			width: 16px;
			height: 16px;
		}
		.carousel-indicators .active{
			width: 16px;
			height: 16px;
		}
		#main{
			margin: 0px auto;
			width: 74%;
			height: auto;
			margin-top: 30px;
			margin-bottom: 25px;
		}
		#img_group div img{
			z-index: 4;
			width: 100%;
		}

		.col-md-3{
			height: auto;
			min-height: 228px;
			margin-left: 6px;
			border-left: 1px dashed gray;
			padding-left: 25px;
		}
		.col-md-4{
			height: auto;
			min-height: 228px;
		}

		.titles{
			width: 100%;
			height: 30px;
			margin-bottom: 18px;
		}
		.titles span{
			float: right;
			margin-top: 5px;
		}
		.titles span a{
			color: gray;
		}
		.titles span a:hover{
			color: #3A9ACC;
		}
		.titles img{
			width: 108px;
			margin-top: -5px;
		}
		.contents{
			width: 100%;
			height: auto;
		}
		.contents p{
			font-size: 13px;
			color: gray;
			text-indent: 27px;
			line-height: 25px;
		}
		#news p{
			text-indent: 0px;
			line-height: 18px;
			border-bottom: 1px dashed #DFDFDF;
			padding-bottom: 5px;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		#news p a{
			color: gray;
			font-size: 13px;
		}
		#news p a:hover{
			color: #3A9ACC;
		}

		#recruit p{
			text-indent: 0px;
			line-height: 18px;
			border-bottom: 1px dashed #DFDFDF;
			padding-bottom: 5px;
			overflow: hidden;
			white-space: nowrap;
			text-overflow: ellipsis;
		}
		#recruit p a{
			color: gray;
			font-size: 13px;
		}
		#recruit p a:hover{
			color: #3A9ACC;
		}
		#recruit p img{
			height: 14px;
		} 

	</style>
</head>
<body>
	<!-- 引入能够动态分配数据的公共模板文件 -->
	<?php echo R('Public/header', '', 'Widget');?>
	
	<!-- 图片轮播 开始 -->
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- 轮播指示的 小圆点 -->
	  	<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>
	  	<!-- 图片组 -->
	  	<div class="carousel-inner" id="img_group">
	  		<?php if(is_array($lunbo_img_list)): $i = 0; $__LIST__ = $lunbo_img_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class='item <?php if($i == 1): ?>active
	  				    <?php else: endif; ?>'>
	  			  	<img src="__PUBLIC__/Uploads/lunbo_imgs/<?php echo ($vo["imgname"]); ?>" alt="<?php echo ($vo["real_imgname"]); ?>">
	  			  	<div class="carousel-caption"></div>
	  			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	  	</div>
	  	<!-- 图片轮播 控制 -->
	  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    	<span class="glyphicon glyphicon-chevron-left"></span>
	  	</a>
	  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    	<span class="glyphicon glyphicon-chevron-right"></span>
	  	</a>
	</div>
	<!-- 图片轮播 结束 -->

	<div id="main">
		<div class="container" id="summary-container">
	        <div class="row">
	            <div class="col-md-4" id="">
	              	<div class="titles">
	              		<img id="about-logo" onmouseover="over()" onmouseout="out()" src="__PUBLIC__/Images/logo-gray.png" alt="">
	              		<span><a href="__APP__/Aboutus/company_introduce">关于汉富通>></a></span>
	              	</div>
	              	<div class="contents">
	              		<p><?php echo ($company_introduce); ?></p>
	              	</div>
	            </div>
	            <div class="col-md-3" id="">
	              	<div class="titles">
	              		<img src="__PUBLIC__/Images/news.png">
	              		<span><a href="__APP__/News/enterprise">更多资讯>></a></span>
	              	</div>
	              	<div class="contents" id="news">
	              		<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p><a href="__APP__/News/enterprise_info/id/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a></p><?php endforeach; endif; else: echo "" ;endif; ?>
	              	</div>
	            </div>
	            <div class="col-md-3" id="">
	              	<div class="titles">
	              		<img src="__PUBLIC__/Images/recruit.png">
	              		<span><a href="__APP__/Aboutus/jobs">更多信息>></a></span>
	              	</div>
	              	<div class="contents" id="recruit">
          		  		<?php if(is_array($res2)): $i = 0; $__LIST__ = $res2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p>
          		  				<a href="__APP__/Aboutus/recruitment_info/id/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>"><?php echo ($vo["title"]); ?></a>  
          		  				<img src="__PUBLIC__/Images/hotPoint.png">
          		  			</p><?php endforeach; endif; else: echo "" ;endif; ?>
	              	</div>
	            </div>
	        </div>
	    </div>
	</div>

	<style type="text/css">
	#gotop{
        position: fixed;
        bottom: 50px;
        right: 15px;
        cursor: pointer;
    }
</style>


<div id="gotop">
    <img src="__PUBLIC__/Images/goto_top.png" alt="回到顶部" title="回到顶部" onclick="backToTop()" />
</div>


<script type="text/javascript">
	var scrolldelay;

    function backToTop() {
        scrolldelay = setInterval(ScrolltoTop, 10);
    }

    function ScrolltoTop() {
        window.scrollBy(0, -100);
        var h = getScrollTop();
        if (h <= 2) {
            //当到达顶部时  清除setInterval()方法 
            clearInterval(scrolldelay);
        }
    }

	//获取滚动条距离顶端的距离 
    function getScrollTop() {
        var scrollPos;
        if(window.pageYOffset){
            scrollPos = window.pageYOffset;
        }else if(document.compatMode && document.compatMode != 'BackCompat'){ 
            scrollPos = document.documentElement.scrollTop; 
        }else if(document.body){
            scrollPos = document.body.scrollTop; 
        }
        return scrollPos;
    }
</script>

	<!-- 引入能够动态分配数据的公共模板文件 -->
	<?php echo R('Public/footer', '', 'Widget');?>


	<!--[if lte IE 9]>
	<script src="__PUBLIC__/vendor/bootstrap/js/respond.min.js"></script>
	<script src="__PUBLIC__/vendor/bootstrap/js/html5shiv.js"></script>
	<![endif]-->
	<!-- <script src="http://libs.baidu.com/jquery/1.10.2/jquery.js"></script> -->
	<script src="__PUBLIC__/vendor/bootstrap/js/jquery-1.9.1.js"></script>
    <script src="__PUBLIC__/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      	$(document).ready(function(){
          	$('li.mainlevel').mousemove(function(){
          		$(this).find('ul').slideDown();//you can give it a speed
          	});
          	$('li.mainlevel').mouseleave(function(){
          		$(this).find('ul').slideUp("fast");
          	});
      	});

      	// 鼠标over和out
      	function over(){
      		$('#about-logo').attr({"src": "__PUBLIC__/Images/logo-red.png"});
      	}
      	function out(){
      		$('#about-logo').attr({"src": "__PUBLIC__/Images/logo-gray.png"});
      	}
    </script>
</body>
</html>