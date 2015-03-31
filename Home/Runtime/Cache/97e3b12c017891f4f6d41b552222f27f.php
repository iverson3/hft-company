<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>站内搜索结果</title>
	<link href="__PUBLIC__/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		#main{
			margin: 0px auto;
			width: 74%;
			height: auto;
			min-height: 240px;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		#c1{
			background-color: #F4F4F4;
			height: auto;
			min-height: 240px;
			padding: 0px 40px 0px 40px;
		}

		.search-title{
			font-weight: bold;
			font-size: 22px;
			color: gray;
			padding-bottom: 20px;
			padding-top: 40px;
			border-bottom: 1px solid black;
			margin-bottom: 30px;
		}
		.nullresult{
			font-size: 22px;
			margin-top: 10px;
			color: red;
			margin-top: 30px;
		}

        .result-list div p{
        	padding: 20px 0px 14px 0px;
        	font-size: 16px;
        	color: gray;
        	border-bottom: 1px dashed gray;
        }

        .select-search{
        	width: 100%;
        	height: auto;
        	margin-top: 18px;
        }
        .select-search p{
        	font-size: 18px;
        	font-weight: bold;
        	color: gray;
        	margin-left: -4px;
        }
        .empty-divs{
        	display: inline-block;
        	width: 32px;
        }
        .input-group form label{
        	margin-bottom: 15px;
        }
	</style>
	<style type="text/css">
	.pageBar{
        margin-top: 80px;
        float: right;
        margin-bottom: 50px;
    }
    .pageBar a{
        background-color: #0F76BB;
        padding: 4px 10px 4px 10px;
        margin-left: 5px;
        text-decoration: none;
        color: white;
    }
    .pageBar a:hover{
        background-color: gray;
        color: white;
    }
    .pageBar span{
        background-color: gray;
        padding:4px 11px 4px 11px;
        margin-left: 5px;
        cursor: default;
        color: white;
    }
</style>
</head>
<body>
	<!-- 引入能够动态分配数据的公共模板文件 -->
	<?php echo R('Public/header', '', 'Widget');?>
	<img src="__PUBLIC__/Images/<?php echo ($img_url); ?>" style=" width: 100%;" alt="#">

	<div id="main">
		<div class="container" id="summary-container">
	        <div class="row">
	            <div class="col-md-10" id="c1">
	            	<div class="select-search">
	            		<p>自定义搜索:</p>
	            		<span></span>
	            		<div class="radio">
		  	              	<div class="input-group">
		  	              		<form action="__APP__/Public/search" method="get">
	  	              				<label>
		  	              			  	<input type="radio" value="Enterprise_news" name="selects" <?php if(($sign == 1)): ?>checked<?php else: endif; ?>/>企业资讯
		  	              			  	<span class="empty-divs"></span><input type="radio" value="Job_describe" name="selects" <?php if(($sign == 2)): ?>checked<?php else: endif; ?>/>招聘信息
		  	              			  	<span class="empty-divs"></span><input type="radio" value="Download_list" name="selects" <?php if(($sign == 3)): ?>checked<?php else: endif; ?>/>下载资源
	  	              				</label>
		  		              	    <input type="text" id="search-text" name="search" class="form-control" placeholder="请输入关键字" value="<?php echo ($keyword); ?>">
		  		              	    <span class="input-group-btn" id="search-button">
		  		              	        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
		  		              	    </span>
		  	              	    </form>
		  	              	</div>
	            		</div>
	            	</div>
	            	<p class="search-title"><span class="glyphicon glyphicon-bookmark"></span> 以下是关键字"<font color="red"><?php echo ($keyword); ?></font>" &nbsp;&nbsp;在<font color="blue">[<?php echo ($searchtype); ?>]</font>分类中的搜索结果</p>
	            	<?php if(($res == 0)): ?><p class="nullresult"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;&nbsp;啊哦! 搜索结果为空, 没有找到相关的内容</p>
	            	<?php else: ?>
	            		<div class="result-list">
            			    <?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
    	            		    	<p><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;<a href="__APP__/<?php echo ($request_url); ?>/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></p>
    	            		    </div><?php endforeach; endif; else: echo "" ;endif; ?>
	            		</div>  	
	            		<div class="pageBar"><?php echo ($pageBar); ?></div><?php endif; ?>
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