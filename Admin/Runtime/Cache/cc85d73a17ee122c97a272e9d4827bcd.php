<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>资源上传 | 汉富通后台</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<?php echo R('Public/include_css', '', 'Widget');?>
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/jquery.fancybox.css" rel="stylesheet" />
	<link href="__PUBLIC__/vendor/metronic-bootstrap/css/jquery.fileupload-ui.css" rel="stylesheet" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="__PUBLIC__/vendor/metronic-bootstrap/image/favicon.ico" />
	<style type="text/css">
		/* a upload input */
		.a-upload {
			float: left;
			margin-top: 30px;
		    padding: 7px 20px;
		    height: 18px;
		    line-height: 20px;
		    position: relative;
		    cursor: pointer;
		    color: #888;
		    background: #fafafa;
		    border: 1px solid #ddd;
		    border-radius: 4px;
		    overflow: hidden;
		    display: inline-block;
		    *display: inline;
		    *zoom: 1;
		}
		.a-upload input {
		    position: absolute;
		    font-size: 100px;
		    right: 0;
		    top: 0;
		    opacity: 0;
		    filter: alpha(opacity=0);
		    cursor: pointer;
		}
		.a-upload:hover {
		    color: #444;
		    background: #eee;
		    border-color: #ccc;
		    text-decoration: none;
		}

		.upload{
			margin: 30px 0px 10px 20px;
		}
		#green1{
			margin-top: 30px;
			float: left;
		}

		#fileupload{
			opacity: 0;
			display: none;
		}
	</style>
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	<?php echo R('Public/header', '', 'Widget');?>
	<!-- END HEADER -->

	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
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

				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="portlet box blue">
							<div class="portlet-title">
								<div class="caption"><i class="icon-upload"></i> "下载资源"上传</div>
							</div>
						</div>
						
						<div>
							<!-- 图文件上传表单 [简单版] -->
							<form action="__APP__/Download/do_up" method="post" enctype="multipart/form-data">
								<a href="javascript:;" class="a-upload">
								    <input type="file" name="logo">点击选择上传的文件
								</a>
								<input class="btn pull-right green" id="green1" type="submit" value="上  传"/>
							</form>
						</div>


						<!-- 文件上传表单 [功能强悍版] -->
						<form id="fileupload" action="__APP__/Download/do_up" method="post" enctype="multipart/form-data">
							<!-- Redirect browsers with JavaScript disabled to the origin page -->
							<noscript><input type="hidden" name="redirect" value="http://blueimp.github.com/jQuery-File-Upload/"></noscript>
							<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
							<div class="row-fluid fileupload-buttonbar">
								<div class="span7">
									<!-- The fileinput-button span is used to style the file input field as button -->
									<span class="btn green fileinput-button">
									<i class="icon-plus icon-white"></i>
									<span>Add files...</span>
									<input type="file" name="files[]" multiple>
									</span>
									<button type="submit" class="btn blue start">
									<i class="icon-upload icon-white"></i>
									<span>Start upload</span>
									</button>
									<button type="reset" class="btn yellow cancel">
									<i class="icon-ban-circle icon-white"></i>
									<span>Cancel upload</span>
									</button>
									<button type="button" class="btn red delete">
									<i class="icon-trash icon-white"></i>
									<span>Delete</span>
									</button>
									<input type="checkbox" class="toggle fileupload-toggle-checkbox">
								</div>
								<!-- The global progress information -->
								<div class="span5 fileupload-progress fade">
									<!-- The global progress bar -->
									<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
										<div class="bar" style="width:0%;"></div>
									</div>
									<!-- The extended global progress information -->
									<div class="progress-extended">&nbsp;</div>
								</div>
							</div>
							<!-- The loading indicator is shown during file processing -->
							<div class="fileupload-loading"></div>
							<br>
							<!-- The table listing the files available for upload/download -->
							<table role="presentation" class="table table-striped">
								<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
							</table>
						</form>
						<br>
					</div>
				</div>

				<div class="row-fluid">
					<div class="span12">
						<script id="template-upload" type="text/x-tmpl">
							{% for (var i=0, file; file=o.files[i]; i++) { %}
							    <tr class="template-upload fade">
							        <td class="preview"><span class="fade"></span></td>
							        <td class="name"><span>{%=file.name%}</span></td>
							        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
							        {% if (file.error) { %}
							            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
							        {% } else if (o.files.valid && !i) { %}
							            <td>
							                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
							            </td>
							            <td class="start">{% if (!o.options.autoUpload) { %}
							                <button class="btn">
							                    <i class="icon-upload icon-white"></i>
							                    <span>Start</span>
							                </button>
							            {% } %}</td>
							        {% } else { %}
							            <td colspan="2"></td>
							        {% } %}
							        <td class="cancel">{% if (!i) { %}
							            <button class="btn red">
							                <i class="icon-ban-circle icon-white"></i>
							                <span>Cancel</span>
							            </button>
							        {% } %}</td>
							    </tr>
							{% } %}
						</script>
						<!-- The template to display files available for download -->
						<script id="template-download" type="text/x-tmpl">
							{% for (var i=0, file; file=o.files[i]; i++) { %}
							    <tr class="template-download fade">
							        {% if (file.error) { %}
							            <td></td>
							            <td class="name"><span>{%=file.name%}</span></td>
							            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
							            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
							        {% } else { %}
							            <td class="preview">
							            {% if (file.thumbnail_url) { %}
							                <a class="fancybox-button" data-rel="fancybox-button" href="{%=file.url%}" title="{%=file.name%}">
							                <img src="media/image/{%=file.thumbnail_url%}">
							                </a>
							            {% } %}</td>
							            <td class="name">
							                <a href="{%=file.url%}" title="{%=file.name%}" data-gallery="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
							            </td>
							            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
							            <td colspan="2"></td>
							        {% } %}
							        <td class="delete">
							            <button class="btn red" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
							                <i class="icon-trash icon-white"></i>
							                <span>Delete</span>
							            </button>
							            <input type="checkbox" class="fileupload-checkbox hide" name="delete" value="1">
							        </td>
							    </tr>
							{% } %}
						</script>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE --> 
	</div>
	<!-- END CONTAINER -->

	<!-- BEGIN FOOTER -->
	<?php echo R('Public/footer', '', 'Widget');?>
	<!-- END FOOTER -->


	<?php echo R('Public/include_js', '', 'Widget');?>
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!--[if lt IE 9]>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/excanvas.min.js"></script>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/respond.min.js"></script>  
	<![endif]-->   
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.fancybox.pack.js"></script>
	<!-- BEGIN:File Upload Plugin JS files-->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.ui.widget.js"></script>
	<!-- The Templates plugin is included to render the upload/download listings -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/tmpl.min.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/load-image.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/canvas-to-blob.min.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.fileupload.js"></script>
	<!-- The File Upload file processing plugin -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.fileupload-fp.js"></script>
	<!-- The File Upload user interface plugin -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.fileupload-ui.js"></script>
	<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->

	<!--[if gte IE 8]><script src="__PUBLIC__/vendor/metronic-bootstrap/js/jquery.xdr-transport.js"></script><![endif]-->
	<!-- END:File Upload Plugin JS files-->
	<!-- END PAGE LEVEL PLUGINS -->
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/app.js"></script>
	<script src="__PUBLIC__/vendor/metronic-bootstrap/js/form-fileupload.js"></script>
	<script>
		jQuery(document).ready(function() {
			// initiate layout and plugins
			App.init(); // initlayout and core plugins
		    Index.init();
		    Index.initJQVMAP(); // init index page's custom scripts
		    Index.initCalendar(); // init index page's custom scripts
		    Index.initCharts(); // init index page's custom scripts
		    Index.initChat();
		    Index.initMiniCharts();
		    Index.initDashboardDaterange();
		    Index.initIntro();
			FormFileUpload.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>