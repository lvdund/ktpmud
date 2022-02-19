
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
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/style.css" />


<title>New Appointment</title>
<meta name="keywords" content="H-ui">
<meta name="description" content="H-ui">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-appointment-add">
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Department：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="tenKhoa" class="form-select" aria-label="Default select example">
					<option selected>Open this select menu</option>
					<option value="Khoa nội">Khoa nội</option>
					<option value="Khoa ngoại">Khoa ngoại</option>
					<option value="Khoa phụ sản">Khoa phụ sản</option>
					<option value="Khoa chẩn đoán hình ảnh">Khoa chẩn đoán hình ảnh</option>
					<option value="Khoa khác">Khoa khác</option>
				</select>
			</div>
		</div>
		
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Product：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="product" id="product">
					<option value=""></option>
				</select>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Date：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="date" class="input-text" value="" placeholder="Date" id="Date of birth" name="lichHenKham">
			</div>
		</div>

        <!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Doctor：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="doctor" id="doctor">
					<option value=""></option>
				</select>
                
			</div>
		</div> -->

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="submit">
			</div>
		</div>

	</form>
</article>
<!--_footer -->
<script type="text/javascript" src="<?= base_url();?>/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer -->


<script type="text/javascript" src="<?= base_url();?>/public/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>

</body>
</html>