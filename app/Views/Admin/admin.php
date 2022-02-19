<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />



<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/admin/static/h-ui.admin/skin/red/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/admin/static/h-ui.admin/css/style.css" />


<title>H-ui </title>
<meta name="keywords" content="H-ui">
<meta name="description" content="H-ui ">
</head>
<body>

<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="#">H-ui.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs"></span>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> New <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							
							<li><a href="javascript:;" onclick="doctor_add('add doctor','doctor-add.html')"><i class="Hui-iconfont">&#xe613;</i> Doctor</a></li>
							<li><a href="javascript:;" onclick="product_add('add service','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> Service</a></li>
							<li><a href="javascript:;" onclick="member_add('add member','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> Member</a></li>
					</ul>
				</li>
				<li class="dropDown dropDown_hover">
							<a href="javascript:;" class="dropDown_A">Entertaiment <i class="Hui-iconfont">&#xe6d5;</i></a>
							<ul class="dropDown-menu menu radius box-shadow">
								<li>
									<a href="#" target="_blank"></a>
								</li>
								<li>
									<a href="#" target="_blank">web-color</a>
								</li>
								<li>
									<a href="#" target="_blank">fun</a>
								</li>
																
			</ul>
		</nav>
		<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
			<ul class="cl">
				<li>super admin</li>
				<li class="dropDown dropDown_hover">
					<a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" onClick="myselfinfo()">Personal information</a></li>
						<li><a href="#">switch account</a></li>
						<li><a href="#"></a></li>
				</ul>
			</li>
				<li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="javascript:;" data-val="default" title="default">default</a></li>
						<li><a href="javascript:;" data-val="blue" title="blue">blue</a></li>
						<li><a href="javascript:;" data-val="green" title="green">green</a></li>
						<li><a href="javascript:;" data-val="red" title="red">red</a></li>
						<li><a href="javascript:;" data-val="yellow" title="yellow">yellow</a></li>
						<li><a href="javascript:;" data-val="orange" title="orange">orange</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> account managerment <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?= base_url();?>/admin/home/changepassword" data-title="change-password" href="javascript:void(0)">change password</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/adminshow" data-title="information managerment" href="javascript:void(0)">information </a></li>
			</ul>
		</dd>
	</dl>
		
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i> product managerment<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?= base_url();?>/admin/home/productadd" data-title="product-add" href="javascript:void(0)">product-add</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/productlist" data-title="product-list" href="javascript:void(0)">product-list</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/productdel" data-title="product-delete" href="javascript:void(0)">product-delete</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> comment<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			
	</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> member managerment<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?= base_url();?>/admin/home/memberadd" data-title="member add" href="javascript:;">member add</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/memberlist" data-title="member list" href="javascript:;">member list</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/memberdel" data-title="member delete" href="javascript:;">member delete</a></li>
					
			</ul>
		</dd>
	</dl>


		<dl id="menu-appointment-card">
		<dt><i class="Hui-iconfont">&#xe60d;</i> appointment-card<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a data-href="<?= base_url();?>/admin/home/appointmentadd" data-title="appointment-add" href="javascript:;">new appointment</a></li>
				<li><a data-href="<?= base_url();?>/admin/home/appointmentlist" data-title="appointment-list" href="javascript:;">appointment list</a></li>
				<li><a data-href="<?= base_url();?>/admin/home/appointmentdel" data-title="appointment-del" href="javascript:;">appointment-delete</a></li>
		</ul>
	</dd>
	</dl>
		
		<dl id="menu-doctor">
			<dt><i class="Hui-iconfont">&#xe60d;</i> doctor managerment<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?= base_url();?>/admin/home/doctorlist" data-title="doctor list" href="javascript:;">doctor list</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/doctordel" data-title="doctor delete" href="javascript:;">doctor delete</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/doctoradd" data-title="doctor-level" href="javascript:;">doctor add</a></li>	
				</ul>
			</dd>
		</dl>
	 		
		<dl id="menu-deparment">
			<dt><i class="Hui-iconfont">&#xe60d;</i> department<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?= base_url();?>/admin/home/departmentlist" data-title="department list" href="javascript:;">department list</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/departmentdel" data-title="department delete" href="javascript:;">department delete</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/departmentadd" data-title="department add" href="javascript:;">department add</a></li>
					
				</ul>
			</dd>
		</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i>permission<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a data-href="<?= base_url();?>/admin/home/adminrole" data-title="admin-role" href="javascript:void(0)">admin-role</a></li>
					<li><a data-href="<?= base_url();?>/admin/home/adminpermission" data-title="admin-permission" href="javascript:void(0)">admin-permission/a></li>
					<li><a data-href="<?= base_url();?>/admin/home/adminlist" data-title="admin-list" href="javascript:void(0)">admin-list</a></li>
			</ul>
		</dd>
	</dl>
		<dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i>system statistics<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			
	</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i>menu-system<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			
	</dl>
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="Welcome" data-href="<?= base_url();?>/admin/home/welcome">Welcome</span>
					<em></em></li>
		</ul>
	</div>
	<div class="Hui-tabNav-more btn-group">
		<a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a>
		<a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a>
	</div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe id="iframe-welcome" data-scrolltop="0" scrolling="yes" frameborder="0" src="<?= base_url();?>/admin/home/welcome""></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis"> </li>
		<li id="closeall"> </li>
	</ul>
</div>
<!--_footer -->
<script type="text/javascript" src="<?= base_url();?>/public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer -->


<script type="text/javascript" src="<?= base_url();?>/public/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>


