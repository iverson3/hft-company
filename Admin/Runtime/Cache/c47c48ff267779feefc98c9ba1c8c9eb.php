<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>编辑文本信息 | 汉富通后台</title>
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
		.control-label{
			font-size: 20px;
			color: gray;
			margin-bottom: 5px;
			padding-bottom: 5px;
		}
		#selCSI{
			width: 250px;
		}
		#editor-div{
			width: 99%;
		}
		#page-submit{
			width: 30%;
			margin: 20px 0px 40px 0px;
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
							<div class="caption"><i class="icon-home"></i> 编辑网站静态页面</div>
						</div>
					</div>
					<form action="__APP__/Material/update_page" method="post">
					<div class="control-group">
						<label class="control-label">选择需要编辑的页面</label>
						<div class="controls">
							<select name="page" onchange="change(this)" class="chosen-with-diselect span6" tabindex="-1" id="selCSI">
								<option value="0" selected=""></option>
								<?php if(is_array($pagelist)): $i = 0; $__LIST__ = $pagelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["en_title"]); ?>"><?php echo ($vo["ch_title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div id="editor-div">
						<!-- ueditor文本编辑器 -->
						<script id="editor" name="content" type="text/plain" style="">
						</script>
					</div>
					<input type="submit" id="page-submit" class="btn green big btn-block" value="确 定"/>
					</form>
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
		// var ue = UE.getEditor('editor');
		// 使用下面的方式实例化ueditor 可以临时动态指定编辑器的高宽
		var editor = new UE.ui.Editor({ initialFrameHeight:1000 });
		editor.render("editor");
	}
	function getContent() {
	    var arr = [];
	    arr.push(UE.getEditor('editor').getContent());
	    return arr.join("\n");
	}
	function setContent(isAppendTo) {
	    UE.getEditor('editor').setContent(isAppendTo, isAppendTo);
	}

	// 下拉列表change
	function change(obj){
		$.ajax({
		    type: "GET",
		    url: "__APP__/Material/ajax_getPageCont",
		    data: {en_title: obj.value},
		    success: function(data){
		        var datajson = eval(data);
		        var json = datajson.data;
		        var json = eval('('+json+')');
		        if (json.length == 0) {
		            alert("没有该页面");
		        } else {
		            setContent("");
		            setContent(json[0].content);
		        } 
		    }
		});
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