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



<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/skin/red/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/style.css" />


<title>H-ui </title>
<meta name="keywords" content="H-ui">
<meta name="description" content="H-ui ">
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="#">admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/#">H-ui</a>
			<span class="logo navbar-slogan f-l mr-10 hidden-xs"></span>
			<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs"   >&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a    class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> New<i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							
							<li><a href="doctor-add.html"><i class="Hui-iconfont">&#xe613;</i>Doctor</a></li>
							<li><a href="department-add.html"><i class="Hui-iconfont">&#xe613;</i>Department</a></li>
							<li><a href="product-add.html"><i class="Hui-iconfont">&#xe620;</i>Product</a></li>
							<li><a href="member-add.html"><i class="Hui-iconfont">&#xe60d;</i> Member</a></li>
					</ul>
				</li>
				<li class="dropDown dropDown_hover">
							<a    class="dropDown_A">Entertaiment <i class="Hui-iconfont">&#xe6d5;</i></a>
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
					<a href="#" class="dropDown_A">log out<i class="Hui-iconfont">&#xe6d5;</i></a>
					<ul class="dropDown-menu menu radius box-shadow">
						<li><a href="admin-show.html">Personal information</a></li>
						<li><a href="register.html">switch account</a></li>
						<li><a href="index.html">log out</a></li>
				</ul>
			</li>
				<li id="Hui-msg"> <a href="#" title=""><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
				<li id="Hui-skin" class="dropDown right dropDown_hover"> <a    class="dropDown_A" title=""><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
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
			<dt><i class="Hui-iconfont">&#xe616;</i>Account managerment <i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="change-password.html" data-title="change-password">change password</a></li>
					<li><a href="doctor-show.html" data-title="information managerment">information </a></li>
			</ul>
		</dd>
	</dl>
		
		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i>Product managerment<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>	
					<li><a href="product-list.html" data-title="product-list"  >product-list</a></li>
			</ul>
		</dd>
	</dl>

		<dl id="menu-appointment-card">
		<dt><i class="Hui-iconfont">&#xe60d;</i>Appointment-card<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
		<dd>
			<ul>
				<li><a href="appointment-add.html"   >new appointment</a></li>
				<li><a href="appointment-list.html"   >appointment list</a></li>
				<li><a href="appointment-del.html"  >appointment delete</a></li>
                <li><a href="appointment-confirm.html"> appointment confirm</a></li>
				
		</ul>
	</dd>
	</dl>
		
		<dl id="deparment">
			<dt><i class="Hui-iconfont">&#xe60d;</i>Department<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="department-list.html"   >department list</a></li>
			</ul>
		</dd>
	</dl>
		
		<dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i>System statistics<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			
	</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i>Menu-system<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			
	</dl>
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="Welcome" data-href="welcome.html">Welcome</span>
					<em></em></li>
		</ul>
	</div>
	<div class="Hui-tabNav-more btn-group">
		<a id="js-tabNav-prev" class="btn radius btn-default size-S"   ><i class="Hui-iconfont">&#xe6d4;</i></a>
		<a id="js-tabNav-next" class="btn radius btn-default size-S"   ><i class="Hui-iconfont">&#xe6d7;</i></a>
	</div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe id="iframe-welcome" data-scrolltop="0" scrolling="yes" frameborder="0" src="welcome.html"></iframe>
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
<script type="text/javascript" src="<?= base_url();?>/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer -->



</body>
</html>


