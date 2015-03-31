<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>加入我们</title>
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
		.joinus-left{
			width: 33%;
			float: left;
		}
		.joinus-left div{
			border: 1px solid #DDDDDD;
			width: 74%;
			margin-left: 30px;
			margin-top: 20px;
		}
		.joinus-left div p{
			padding-left: 10px;
		}
		.left-title{
			background-color: #DDDDDD;
			padding: 9px 0px 9px 10px;
		}
		.joinus-right{
			float: left;
			width: 60%;
			border-left: 1px dashed gray;
			padding-left: 50px;
		}
		.joinus-right h4{
			margin: 20px 0px 30px 0px;
		}
		#code input{
			float: left;
			width: 150px;
		}
		#code img{
			float: left;
			margin-left: 10px;
			margin-top: 4px;
		}
		.td-divs{
			padding-top: 7px;
			height: 30px;
			width: 100%;
			text-align: right;
		}
		.table-bordered textarea{
			resize: none;
			height: 180px;
		}
		.btn-info{
			margin-left: 34px;
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
	            	<div class="joinus-left">
	            		<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div>
	            				<p class="left-title"><?php echo ($vo["title"]); ?></p>
	            				<p>咨询电话：<?php echo ($vo["tel"]); ?></p>
	            				<p>联 系 人：<?php echo ($vo["contacter"]); ?></p>
	            			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	            	</div>
	            	<div class="joinus-right">
	            		<h4><font color="red">(所有选项都为必填)</font> </h4>
	            		<form action="__APP__/Joinus/join" method="post">
	            			<table class="table table-bordered">
	            				<tr><td><div class="td-divs">您的姓名：</div></td><td><input type="text" placeholder="您的姓名" class="form-control" name="name"></td></tr>
	            				<tr><td><div class="td-divs">所在区域：</div></td><td><input type="text" placeholder="所在区域" class="form-control" name="area"></td></tr>
	            				<tr><td><div class="td-divs">联系邮箱：</div></td><td><input type="text" placeholder="联系邮箱" class="form-control" name="email"></td></tr>
	            				<tr><td><div class="td-divs">联系电话：</div></td><td><input type="text" placeholder="联系电话" class="form-control" name="tel"></td></tr>
	            				<tr><td><div class="td-divs">意向描述：</div></td><td><textarea name="position" placeholder="请对您的代理意向进行具体描述" id="position" class="form-control" rows="4"></textarea></td></tr>
	            				<tr id="code"><td><div class="td-divs">验证码：</div></td><td><input type="text" placeholder="验证码" class="form-control" name="code"><img src="__APP__/Public/code?width=50" onclick='this.src=this.src+"?"+Math.random()' title="看不清?点击更换"></td></tr>
	            				<tr><td></td><td><input type="submit" class="btn btn-primary" value="提 交"><input class="btn btn-info" type="reset" value="重 置"></td></tr>
	            			</table>
	            		</form>

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
          
      });
    </script>
</body>
</html>