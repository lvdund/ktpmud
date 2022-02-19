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

<title>Member edit</title>
<!-- <meta name="keywords" content="H-ui">
<meta name="description" content="H-ui"> -->
</head>
<body>
	<?= view('message/message') ?>
<article class="page-container">
	<form action="<?= base_url() ?>/admin/user/update/<?= $tbenhnhan['idBenhNhan'] ?>" method="Post" class="form form-horizontal">

		<div class="row cl" hidden>
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>id</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?= $tbenhnhan['idBenhNhan'] ?>" placeholder="" id="username" name="idBenhNhan" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Email：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?= $tbenhnhan['tkBenhNhan'] ?>" placeholder="" id="username" name="tkBenhNhan" disabled>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Name：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?= $tbenhnhan['tenBenhNhan'] ?>" placeholder="" id="name" name="tenBenhNhan">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Password：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  id="password" name="mkBenhNhan">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Gender：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<select name="gioiTinhBenhNhan" class="form-select" aria-label="Default select example" >
					<option selected value="<?= $tbenhnhan['gioiTinhBenhNhan'] ?>"></option>
					<option value="Nữ">female</option>
					<option value="Nam">male</option>
				</select>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Mobile：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?= $tbenhnhan['sdtBenhNhan'] ?>" placeholder="" id="mobile" name="sdtBenhNhan">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>Date of birth：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="date" class="input-text" value="<?= $tbenhnhan['dobBenhNhan'] ?>" id="Date of birth" name="dobBenhNhan">
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




