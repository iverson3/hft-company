<?php
return array(
	//'配置项'=>'配置值'
	
	'DB_DSN' => 'mysql://root:root@localhost:3306/hanft',
	// 数据库表前缀
	'DB_PREFIX' => 'wf_', 

	
	//修改模板的左右定界符
	'TMPL_L_DELIM'=>'<{',
	'TMPL_R_DELIM'=>'}>',

	//开启页面调试(debug)
	'SHOW_PAGE_TRACE'=>true,

	// 字段类型检测 默认为false
	// 开启后，系统会强制检测数据表字段与数据变量之间的类型关系
	'DB_FIELDTYPE_CHECK' => true,


	// 应用调试模式状态
	'APP_STATUS' => 'test',

	// REWRITE模式 (隐藏index.php入口文件时需要开启)
	'URL_MODEL' => 2
);
?>
