<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<!-- <meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" /> -->
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/style.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Doctor edit</title>
<!-- <meta name="keywords" content="H-ui">
<meta name="description" content="H-ui"> -->
</head>
<body>
	<?= view('message/message') ?>
<article class="page-container">
	<form action="<?= base_url() ?>/admin/doctor/update/<?= $tbacsi['idBacSi'] ?>" method="Post" class="form form-horizontal">

		<div class="row cl" hidden>
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>id</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?= $tbacsi['idBacSi'] ?>" placeholder="" id="username" name="idBacSi" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Email：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?= $tbacsi['tkBacSi'] ?>" placeholder="" id="username" name="tkBacSi" disabled>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Name：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?= $tbacsi['tenBacSi'] ?>" placeholder="" id="name" name="tenBacSi">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Password：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  id="password" name="mkBacSi">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Gender：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="gioiTinhBacSi" class="form-select" aria-label="Default select example" >
					<option selected><?= $tbacsi['gioiTinhBacSi'] ?></option>
					<option value="Nữ">female</option>
					<option value="Nam">male</option>
				</select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Mobile：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?= $tbacsi['sdtBacSi'] ?>" placeholder="" id="mobile" name="sdtBacSi">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Date of birth：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="date" class="input-text" value="<?= $tbacsi['dobBacSi'] ?>" id="Date of birth" name="dobBacSi">
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Department：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="tenKhoa" class="form-select" aria-label="Default select example">
					<option selected><?= $tbacsi['tenKhoa'] ?></option>
					<option value="Khoa nội">Khoa nội</option>
					<option value="Khoa ngoại">Khoa ngoại</option>
					<option value="Khoa phụ sản">Khoa phụ sản</option>
					<option value="Khoa chẩn đoán hình ảnh">Khoa chẩn đoán hình ảnh</option>
					<option value="Khoa khác">Khoa khác</option>
				</select>
			</div>
		</div>
        
        <button type="submit" class="btn btn-primary btn-sm col-sm-offset-3">submit</button>

		<!-- <div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="Cập nhật">
			</div>
		</div> -->
	</form>

</article>



</body>
</html>




