<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>新闻编辑 | 汉富通后台</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<?php echo R('Public/include_css', '', 'Widget');?>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="__PUBLIC__/vendor/metronic-bootstrap/image/favicon.ico" />

	<style type="text/css">
		.span11 div{
			width: auto;
			height: auto;
		}

		@font-face {
		  font-family: 'Glyphicons Halflings';

		  src: url('__PUBLIC__/vendor/bootstrap/fonts/glyphicons-halflings-regular.eot');
		  src: url('__PUBLIC__/vendor/bootstrap/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('__PUBLIC__/vendor/bootstrap/fonts/glyphicons-halflings-regular.woff') format('woff'), url('__PUBLIC__/vendor/bootstrap/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('__PUBLIC__/vendor/bootstrap/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
		}
		.glyphicon {
		  position: relative;
		  top: 1px;
		  display: inline-block;
		  font-family: 'Glyphicons Halflings';
		  font-style: normal;
		  font-weight: normal;
		  line-height: 1;

		  -webkit-font-smoothing: antialiased;
		  -moz-osx-font-smoothing: grayscale;
		}
        .glyphicon-pencil:before {
          content: "\270f";
        }
        .glyphicon-remove:before {
          content: "\e014";
        }
        .edit{
        	padding-left: 8px;
        }
        .delete{
        	padding-left: 8px;
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

					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span11">
							<div>

								<!-- START EXAMPLE TABLE PORTLET-->
								<div class="portlet box blue">
									<div class="portlet-title">
										<div class="caption"><i class="icon-edit"></i> 新闻编辑</div>
										<div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<a href="#portlet-config" data-toggle="modal" class="config"></a>
											<a href="javascript:;" class="reload"></a>
											<a href="javascript:;" class="remove"></a>
										</div>
									</div>
									<div class="portlet-body">
										<div class="clearfix">
											<div class="btn-group">
												<a id="sample_editable_1_new" class="btn green" href="__APP__/News/add">&nbsp;新 建&nbsp;&nbsp;&nbsp;<i class="icon-plus"></i></a>
											</div>
											<div class="btn-group pull-right">
												<button class="btn dropdown-toggle" data-toggle="dropdown">&nbsp;&nbsp;&nbsp;工具&nbsp; <i class="icon-angle-down"></i>
												</button>
												<ul class="dropdown-menu pull-right">
													<li><a href="#">打印</a></li>
													<li><a href="#">保存为PDF</a></li>
													<li><a href="#">导出到Excel</a></li>
												</ul>
											</div>
										</div>
										<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
											<thead>
												<tr>
													<th>ID</th>
													<th>标题</th>
													<th>浏览量</th>
													<th>来源</th>
													<th>编者</th>
													<th>发布时间</th>
													<th>修改</th>
													<th>删除</th>
												</tr>
											</thead>

											<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody>
													<tr class="">
														<td><?php echo ($vo["id"]); ?></td>
														<td><?php echo ($vo["title"]); ?></td>
														<td><?php echo ($vo["read_times"]); ?></td>
														<td><?php echo ($vo["source"]); ?></td>
														<td><?php echo ($vo["author"]); ?></td>
														<td class="center"><?php echo ($vo["create_time"]); ?></td>
														<td><a class="edit" href="__APP__/News/update/id/<?php echo ($vo["id"]); ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
														<td><a class="delete" href="__APP__/News/delete/id/<?php echo ($vo["id"]); ?>"><span class="glyphicon glyphicon-remove"></span></a></td>
													</tr>
												</tbody><?php endforeach; endif; else: echo "" ;endif; ?>
											
										</table>
										<div class="pageBar"><?php echo ($pageBar); ?></div>
									</div>
								</div>
								<!-- END EXAMPLE TABLE PORTLET-->

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