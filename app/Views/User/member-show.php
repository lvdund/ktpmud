<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />

<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/style.css" />

<title>Member Information</title>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
	<img class="avatar size-XL l" src="<?= base_url();?>/public/static/h-ui/images/ucnter/avatar-default.jpg">
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18"><?= session()->get('tbenhnhan')['tenBenhNhan'] ?></span>
			<form action="<?=base_url()?>/user/appointmentlist"><button type="submit">My Appointment</button></form>
			<form action="<?=base_url()?>/user/productlist"><button type="submit">Service</button></form>
			<form action="<?=base_url()?>/user/edit/<?= session()->get('tbenhnhan')['idBenhNhan'] ?>"><button type="submit">Edit</button></form>
		</dt>
	</dl>
</div>
<div class="pd-30">
	<?= view('message/message')?>
	<table class="table">
		<tbody>
            <tr>
				<th class="text-r" width="80">Name：</th>
				<td><?= session()->get('tbenhnhan')['tenBenhNhan'] ?></td>
			</tr>

			<tr>
				<th class="text-r" width="80">Gender：</th>
				<td><?= session()->get('tbenhnhan')['gioiTinhBenhNhan'] ?></td>
			</tr>

			<tr>
				<th class="text-r">Mobile：</th>
				<td><?= session()->get('tbenhnhan')['sdtBenhNhan'] ?></td>
			</tr>

			<tr>
				<th class="text-r">Email：</th>
				<td><?= session()->get('tbenhnhan')['tkBenhNhan'] ?></td>
			</tr>
			
			<tr>
				<th class="text-r">DoB：</th>
				<td><?= session()->get('tbenhnhan')['dobBenhNhan'] ?></td>
			</tr>
			<tr>
				<th></th>
				<td>
				<form action="<?=base_url()?>/user/logout"><button type="submit">Log out</button></form>
				</td>
			</tr>	
		</tbody>
	</table>
</div>




<script type="text/javascript" src="<?= base_url();?>/public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/static/h-ui.admin/js/H-ui.admin.js"></script> 

</body>
</html>