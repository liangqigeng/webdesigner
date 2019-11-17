<?php
return array(
	//'配置项'=>'配置值'
	'APP_GROUP_LIST'=>'Home,Admin',//设置所有的模块
	'DEFAULT_GROUP'=>'Home',//默认进入的模块
	'APP_GROUP_MODE'=>1,//URL分组模式，TP模式
	'TMPL_PARSE_STRING'=> array(//设置根目录引入文件的常量
	    '__PUBLIC__' =>__ROOT__.'/Public',//引入Public文件夹目录，替代/Public
	    '__HOME__' =>__ROOT__.'/Public/Home',//引入Public文件夹目录，替代/Public/Home目录
	    '__ADMIN__' =>__ROOT__.'/Public/Admin',//引入Public文件夹目录，替代/Public/Admin目录
	    '__UPLOAD__' =>__ROOT__.'/Upload/',//替代Upload目录
	),
	//链接数据库
	'DB_TYPE'=>'mysql',//数据库类型
	'DB_HOST'=>'localhost',//数据库类型
	'DB_NAME'=>'webdesigner',//数据库名称
	'DB_USER'=>'root',//数据库登录用户名
	'DB_PWD'=>'',//数据库登录密码
	'DB_PORT'=>'3306',//数据库端口
	'DB_PREFIX'=>'web_',//数据库表前缀
);