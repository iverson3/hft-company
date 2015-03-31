<?php if (!defined('THINK_PATH')) exit();?><!-- 右上角的齿轮工具(切换网站色调的) wangfan -->

<div class="color-panel hidden-phone">
	<div class="color-mode-icons icon-color"></div>
	<div class="color-mode-icons icon-color-close"></div>
	<div class="color-mode">
		<p>风格颜色</p>
		<ul class="inline">
			<li class="color-black current color-default" data-style="default"></li>
			<li class="color-blue" data-style="blue"></li>
			<li class="color-brown" data-style="brown"></li>
			<li class="color-purple" data-style="purple"></li>
			<li class="color-grey" data-style="grey"></li>
			<li class="color-white color-light" data-style="light"></li>
		</ul>
		<label>
			<span>布局</span>
			<select class="layout-option m-wrap small">
				<option value="fluid" selected>流体</option>
				<option value="boxed">盒子</option>
			</select>
		</label>
		<label>
			<span>头部</span>
			<select class="header-option m-wrap small">
				<option value="fixed" selected>固定</option>
				<option value="default">默认</option>
			</select>
		</label>
		<label>
			<span>导航条</span>
			<select class="sidebar-option m-wrap small">
				<option value="fixed">固定</option>
				<option value="default" selected>默认</option>
			</select>
		</label>
		<label>
			<span>脚部</span>
			<select class="footer-option m-wrap small">
				<option value="fixed">固定</option>
				<option value="default" selected>默认</option>
			</select>
		</label>
	</div>
</div>