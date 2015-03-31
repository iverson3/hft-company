# +---------------------------------------------
# 项目数据库信息
# 
# 创建数据库及各个数据表的sql语句
# +---------------------------------------------


# 创建数据库 hanft
create database hanft;


# 创建数据表 wf_enterprise_news(企业动态)
create table if not exists wf_enterprise_news(
	id int primary key auto_increment,
	title varchar(100) not null,         #标题
	create_time varchar(25) not null,    #发布时间
	source varchar(30) null,             #来源
	read_times int(11) not null,         #浏览量
	content text not null,               #内容
	author varchar(30) null              #编辑人(作者)
) engine=MyISAM default charset=utf8;
# $create_time = date('Y-m-d H:i:s');

# 测试数据
insert into wf_enterprise_news(title, create_time, source, read_times, content, author) values('公司年会顺利举办', '2015-03-20 19:00:29', '瑞银信', 103, "<img src='__PUBLIC__/Images/News/enterprise_news_1.gif'/>", '瑞银信');
insert into wf_enterprise_news(title, create_time, source, read_times, content, author) values('公司招聘介绍', '2015-03-20 19:00:29', '瑞银信', 1103, "<img src='__PUBLIC__/Images/News/enterprise_news_2.gif'/>", '瑞银信');
insert into wf_enterprise_news(title, create_time, source, read_times, content, author) values('热烈祝贺公司取得承接银联卡收单服务委托能力资质', '2015-03-20 19:00:29', '瑞银信', 303, "<img src='__PUBLIC__/Images/News/enterprise_news_3.gif'/>", '瑞银信');
insert into wf_enterprise_news(title, create_time, source, read_times, content, author) values('热烈庆祝长沙、沈阳、福州、西安、武汉分公司成立', '2015-03-20 19:00:29', '瑞银信', 503, "<img src='__PUBLIC__/Images/News/enterprise_news_4.gif'/>", '瑞银信');
insert into wf_enterprise_news(title, create_time, source, read_times, content, author) values('高性能PHP框架Symfony2中文入门教程', '2015-03-20 19:00:29', '瑞银信', 203, "控制器的名字一定得是HelloController.php，原因很简单，因为你路由已经把控制器的名字给定下来了，在上面路由文件中的第4行和第7行中的控制器都是以AcmeHelloBundle:Hello开头的，其中AcmeHelloBundle表示Bundle名，而Hello则表示控制器名，所以控制器必须是HelloController.php，Controller名缀是命名约定。而至于后面的index和say则是控制器类中的方法。下面就定义了index方法，当然方法名为indexAction这个也是命名约定：", '瑞银信');



# 创建数据表 wf_job_describe(招聘信息[职位])
create table if not exists wf_job_describe(
	id int primary key auto_increment,
	title varchar(100) not null,          #标题
	numbers int(11)  not null,            #招聘人数
	type varchar(30) not null,            #工作性质
	experience varchar(20) not null,      #工作经验
	area varchar(20) not null,            #工作地点
	degrees varchar(20) not null,         #学历要求
	treatment varchar(100) not null,      #工资待遇
	create_time varchar(25) not null,     #发布时间
	end_time varchar(25) not null,        #截止日期
	describe_require text not null,       #职位描述及要求
	tel varchar(50) not null,             #联系电话
	email varchar(60) null                #E-Mail
) engine=MyISAM default charset=utf8;

# 测试数据
insert into wf_job_describe(title,numbers,type,experience,area,degrees,treatment,create_time,end_time,describe_require,tel,email) values('UI设计师【北京】', 3, '全职', '3年', '北京', '大专', '12000元', '2014-10-30 15:56:21', '2014-12-11', '1. 良好和开放的职业心态，活泼敏锐的思维，较强的沟通、协调能力；<br> 2．有良好的美术功底，具备优秀的审美观念及色彩感觉，有较强的平面设计和网页设计能力；<br>  3．对互联网应用产品的人机交互方面有自己的理解和认识； <br> 4．熟练掌握Photoshop、Dreamweaver，熟悉Flash，Illustrator，会切片。 <br> 5．面试时需上机测试，请做好准备。<br> ', '18888888888', '252556310@qq.com');
insert into wf_job_describe(title,numbers,type,experience,area,degrees,treatment,create_time,end_time,describe_require,tel,email) values('PHP高级工程师【上海】', 2, '兼职', '1年', '上海', '本科', '3000元', '2014-10-30 15:56:21', '2014-12-11', '1. 良好和开放的职业心态，活泼敏锐的思维，较强的沟通、协调能力；<br> 2．有良好的美术功底，具备优秀的审美观念及色彩感觉，有较强的平面设计和网页设计能力；<br>  3．对互联网应用产品的人机交互方面有自己的理解和认识； <br> 4．熟练掌握Photoshop、Dreamweaver，熟悉Flash，Illustrator，会切片。 <br> 5．面试时需上机测试，请做好准备。<br> ', '18888888888', '252556310@qq.com');
insert into wf_job_describe(title,numbers,type,experience,area,degrees,treatment,create_time,end_time,describe_require,tel,email) values('用户体验设计师【济南】', 1, '全职', '5年', '济南', '大专', '20000元', '2014-10-30 15:56:21', '2014-12-11', '1. 良好和开放的职业心态，活泼敏锐的思维，较强的沟通、协调能力；<br> 2．有良好的美术功底，具备优秀的审美观念及色彩感觉，有较强的平面设计和网页设计能力；<br>  3．对互联网应用产品的人机交互方面有自己的理解和认识； <br> 4．熟练掌握Photoshop、Dreamweaver，熟悉Flash，Illustrator，会切片。 <br> 5．面试时需上机测试，请做好准备。<br> ', '13396095889', '252556310@qq.com');
insert into wf_job_describe(title,numbers,type,experience,area,degrees,treatment,create_time,end_time,describe_require,tel,email) values('统计分析专业【北京】', 5, '兼职', '1年', '北京', '大专', '2000元', '2014-10-30 15:56:21', '2014-12-11', '1. 良好和开放的职业心态，活泼敏锐的思维，较强的沟通、协调能力；<br> 2．有良好的美术功底，具备优秀的审美观念及色彩感觉，有较强的平面设计和网页设计能力；<br>  3．对互联网应用产品的人机交互方面有自己的理解和认识； <br> 4．熟练掌握Photoshop、Dreamweaver，熟悉Flash，Illustrator，会切片。 <br> 5．面试时需上机测试，请做好准备。<br> ', '18888888888', '252556310@qq.com');
insert into wf_job_describe(title,numbers,type,experience,area,degrees,treatment,create_time,end_time,describe_require,tel,email) values('JAVA研发工程师【济南】', 3, '全职', '2年', '济南', '大专', '15000元', '2014-10-30 15:56:21', '2014-12-11', '1. 良好和开放的职业心态，活泼敏锐的思维，较强的沟通、协调能力；<br> 2．有良好的美术功底，具备优秀的审美观念及色彩感觉，有较强的平面设计和网页设计能力；<br>  3．对互联网应用产品的人机交互方面有自己的理解和认识； <br> 4．熟练掌握Photoshop、Dreamweaver，熟悉Flash，Illustrator，会切片。 <br> 5．面试时需上机测试，请做好准备。<br> ', '13396095889', '252556310@qq.com');
insert into wf_job_describe(title,numbers,type,experience,area,degrees,treatment,create_time,end_time,describe_require,tel,email) values('高级软件研发工程师兼软件系统架构师【武汉】', 1, '全职', '6年', '武汉', '本科', '30000元', '2014-10-30 15:56:21', '2014-12-11', '1. 良好和开放的职业心态，活泼敏锐的思维，较强的沟通、协调能力；<br> 2．有良好的美术功底，具备优秀的审美观念及色彩感觉，有较强的平面设计和网页设计能力；<br>  3．对互联网应用产品的人机交互方面有自己的理解和认识； <br> 4．熟练掌握Photoshop、Dreamweaver，熟悉Flash，Illustrator，会切片。 <br> 5．面试时需上机测试，请做好准备。<br> ', '13396095889', '252556310@qq.com');




# 创建数据表 wf_job_apply(职位申请)
create table if not exists wf_job_apply(
	id int primary key auto_increment,
	name varchar(30) not null,             #姓名
	sex char(4) not null,                  #性别
	nation varchar(40) not null,           #民族
	birthday varchar(50) null,             #出生日期
	height varchar(20) null,               #身高
	experience varchar(100) not null,      #工作经验
	marital_status char(8) null,           #婚姻状况
	household varchar(40) null,            #户籍
	now_addr varchar(120) not null,        #现住址
	degrees varchar(30) not null,          #学历
	graduate_school varchar(60) not null,  #毕业学校
	major varchar(40) not null,            #所学专业
	graduate_time varchar(25) not null,    #毕业时间
	foreign_level varchar(50) null,        #外语水平
	now_job varchar(60) null,              #目前工作
	tel varchar(50) null,                  #固定电话
	phone varchar(50) not null,            #手机
	email varchar(60) not null,            #电子邮件
	contact_addr varchar(100) not null,    #联系地址
	evaluation text null,                  #自我评价
	resume text not null,                  #个人简历
	job_id int not null                    #所求职位ID
) engine=MyISAM default charset=utf8;





# 创建数据表 wf_result_tmp (结果临时存储表, 为解决站内搜索 多表结果统一并分页)
-- create table if not exists wf_result_tmp(
-- 	id int primary key auto_increment,
-- 	cont_id int not null,                  #该内容在原表中的id
-- 	title varchar(100) not null            #该内容的title
-- ) engine=MyISAM default charset=utf8;
# 暂时不考虑使用





# 创建数据表 wf_download_list (下载资源列表)
create table if not exists wf_download_list(
	id int primary key auto_increment,
	filename varchar(100) not null,        #文件上传并存放在服务器上后的文件名[随机生成的 不支持中文](供下载时使用的文件名) 
	real_filename varchar(100) not null,   #文件原始的真实名[支持中文](页面上显示的文件名)
	filesize varchar(30) not null,         #文件大小
	update_time varchar(25) not null,      #文件更新时间
	download_times int(11) not null        #下载次数
) engine=MyISAM default charset=utf8;



insert into wf_download_list(filename, real_filename, filesize, update_time, download_times) values("sadsfas.txt", "文档1", "12KB", "2014-10-31 10:46:44", 12);
insert into wf_download_list(filename, real_filename, filesize, update_time, download_times) values("45twt4334qt3.png", "图片1", "112KB", "2014-10-31 10:46:44", 112);
insert into wf_download_list(filename, real_filename, filesize, update_time, download_times) values("sadsgq34t43fas.exe", "取色器", "12KB", "2014-10-31 10:46:44", 34);
insert into wf_download_list(filename, real_filename, filesize, update_time, download_times) values("3sadsqt4tqt34qgfas.iso", "镜像文件", "126KB", "2014-10-31 10:46:44", 4);
insert into wf_download_list(filename, real_filename, filesize, update_time, download_times) values("sadsgarrehafas.txt", "文档2", "62KB", "2014-10-31 10:46:44", 62);
insert into wf_download_list(filename, real_filename, filesize, update_time, download_times) values("23sa2342ds43636fas.jpg", "图片2", "42KB", "2014-10-31 10:46:44", 31);
insert into wf_download_list(filename, real_filename, filesize, update_time, download_times) values("rahsgrere43ha.txt", "文档3", "152KB", "2014-10-31 10:46:44", 12);
insert into wf_download_list(filename, real_filename, filesize, update_time, download_times) values("qq.exe", "腾讯QQ", "1332KB", "2014-10-31 10:46:44", 1);





#创建数据表 wf_user (后台管理员用户)
create table if not exists wf_user(
	id int primary key auto_increment,
	username varchar(50) not null,       #用户名
	password varchar(32) not null,       #密码
	role int not null                    #权限(暂时不予过多考虑)
) engine=MyISAM default charset=utf8;

insert into wf_user(username, password, role) values('wangfan', md5('333'), 1);






#创建数据表 wf_lunbo_imgs (网站轮播图片)
create table if not exists wf_lunbo_imgs(
	id int primary key auto_increment,
	imgname varchar(100) not null,        #图片名(上传到服务器上存储时生成的随机名[访问该图片时使用])
	real_imgname varchar(100) not null,   #原图片名(其实不需要保存)
	size varchar(30) not null,            #图片文件的大小
	status int not null                   #状态(是否被选中作为轮播图片 1:是 0:否)
) engine=MyISAM default charset=utf8;

insert into wf_lunbo_imgs(imgname, real_imgname, size, status) values('img1.png', '图片1', '13200KB', 1);
insert into wf_lunbo_imgs(imgname, real_imgname, size, status) values('img2.png', '图片2', '23234KB', 1);
insert into wf_lunbo_imgs(imgname, real_imgname, size, status) values('img3.png', '图片3', '16534KB', 1);
insert into wf_lunbo_imgs(imgname, real_imgname, size, status) values('img4.png', '图片4', '5434KB', 0);
insert into wf_lunbo_imgs(imgname, real_imgname, size, status) values('img5.png', '图片5', '5434KB', 0);
insert into wf_lunbo_imgs(imgname, real_imgname, size, status) values('img6.png', '图片6', '5434KB', 0);







#创建数据表 wf_static_pages (静态页面)
create table if not exists wf_static_pages(
	id int primary key auto_increment,
	ch_title varchar(50) not null,        #中文导航菜单名
	en_title varchar(20) not null,        #对应的英文导航菜单名(控制器中的方法名)
	content text null                     #页面内容
) engine=MyISAM default charset=utf8;

#初始化网站前台"所有静态页面"对应的菜单项在数据库中的记录
insert into wf_static_pages(ch_title,en_title,content) values("POS机具安装维护", "pos_install", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("交易数据系统分析", "data_analysis", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("资金结算差错处理", "capital_settlement", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("在线交易监控", "online_transactions", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("商户培训", "business_training", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");

-- insert into wf_static_pages(ch_title,en_title,content) values("产品下载", "product_download", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("产品介绍", "product_introduction", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");

insert into wf_static_pages(ch_title,en_title,content) values("行业资讯", "industry", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");

insert into wf_static_pages(ch_title,en_title,content) values("人民币知识", "rmb", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("银行卡知识", "bank_card", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("反洗钱知识", "anti_money", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("支付结算知识", "pay", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("个人金融信息安全", "financial_security", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("金融法律法规解答", "financial_law", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("金融知识普及读本", "financial_knows", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");

insert into wf_static_pages(ch_title,en_title,content) values("公司介绍", "company_introduce", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("团队优势", "team_advantage", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("风险控制", "risk_control", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("企业文化", "enterprise_culture", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("公司组织架构", "company_structure", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("联系我们", "contact_us", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");

insert into wf_static_pages(ch_title,en_title,content) values("接入流程", "access_process", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("运营服务优势", "operating_advantage", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("后台支撑优势", "background_advantage", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");
insert into wf_static_pages(ch_title,en_title,content) values("POS机办理问题", "pos_problems", "这里是初始化内容，管理员可以到网站后台去对页面内容进行编辑");









#创建数据表 wf_joinus (申请加入我们)
create table if not exists wf_joinus(
	id int primary key auto_increment,
	name varchar(30) not null,         #姓名
	area varchar(100) not null,        #区域
	email varchar(40) not null,        #邮箱
	tel varchar(30) not null,          #电话
	position varchar(1024) not null    #意向
) engine=MyISAM default charset=utf8;







#创建数据表 wf_contact_info(联系信息)
create table if not exists wf_contact_info(
	id int primary key auto_increment, 
	title varchar(100) not null,       #标题
	tel varchar(30) not null,          #资讯电话
	contacter varchar(40) not null     #联系人(+手机号)
) engine=MyISAM default charset=utf8;

insert into wf_contact_info(title, tel, contacter) values("contact us", "5555-3332-3354", "james (13396095889)");