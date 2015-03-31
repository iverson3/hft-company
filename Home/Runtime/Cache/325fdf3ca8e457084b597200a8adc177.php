<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>合作伙伴</title>
	<link href="__PUBLIC__/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		#main{
			margin: 0px auto;
			width: 74%;
			height: auto;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		#c1{
			background-color: #F4F4F4;
			height: auto;
			padding-bottom: 40px;
			padding-top: 20px;
		}

		#c1 .row{
			margin-top: 30px;
		}

		.part-list{
			float: left;
		}
		.part-list img{
			width: auto;
			height: auto;
			margin-left: 30px;
			margin-top: 35px;
		}
		.part-list img:hover{
			opacity: 0.8;
		}
	</style>
</head>
<body>
	<!-- 引入能够动态分配数据的公共模板文件 -->
	<?php echo R('Public/header', '', 'Widget');?>
	
<style type="text/css">
	#c2 img{
		max-width: 100%;
	}
</style>

<img src="__PUBLIC__/Images/<?php echo ($img_url); ?>" style=" width: 100%;" alt="#">

	<div id="main">
		<div class="container" id="summary-container">
	        <div class="row">
	            <div class="col-md-10" id="c1">
	            	<?php if(is_array($part_img_list)): $i = 0; $__LIST__ = $part_img_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="part-list">
	            			<img src="__PUBLIC__/Uploads/parts/<?php echo ($vo["imgname"]); ?>" alt="">
	            		</div><?php endforeach; endif; else: echo "" ;endif; ?>
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
          
      });
    </script>
</body>
</html>