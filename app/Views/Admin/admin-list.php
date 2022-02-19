<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/style.css" />

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<title>Admin Managerment</title>
</head>
<body>
<nav class="breadcrumb"><a href="<?= base_url() ?>/admin/home"><i class="Hui-iconfont">&#xe67f;</i></a> Front page<span class="c-gray en">&gt;</span>Admin Management </nav>

<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="<?= base_url();?>/admin/admin/add" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> Add user</a></span> <span class="r">Shared data：<strong>88</strong> </span> </div>
	<!--  -->
	<div class="mt-20">
	

	<table class="table table-border table-bordered table-hover table-bg table-sort">
	<?= view('message/message') ?>
		<thead>
			<tr class="text-c">
				<th width="50">ID</th>
				<th width="100">Name</th>
				<th width="90">Phone number</th>
				<th width="150">E-mail</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach ($admin as $item) : ?>
				<tr class="text-c">
					<td><?= $item['idAdmin'] ?></td>
					<td><?= $item['tenAdmin'] ?></td>
					<td><?= $item['sdtAdmin'] ?></td>
					<td><?= $item['tkAdmin'] ?></td>
					<?php if ($item['idAdmin']!=3) : ?>
						<td class="w-25 p-3">
							<a href="<?= base_url();?>/admin/admin/delete/<?= $item['idAdmin'] ?>" class="btn btn-danger radius btn-del-comfirmm"><i class="Hui-iconfont">&#xe6e2;</i></a>
							<a href="<?= base_url();?>/admin/admin/edit/<?= $item['idAdmin'] ?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i></a>
						</td>
					<?php endif ?>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</div>
</div>
<!--_footer -->
<script type="text/javascript" src="<?= base_url();?>/public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="<?= base_url();?>/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="<?= base_url();?>/public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="<?= base_url();?>/public/static/h-ui.admin/js/H-ui.admin.js"></script> 
<!--/_footer -->


<script type="text/javascript" src="<?= base_url();?>/public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="<?= base_url();?>/public/lib/datatables/1.10.15/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="<?= base_url();?>/public/lib/laypage/1.2/laypage.js"></script>

<script type="text/javascript" src="<?= base_url();?>/public/js/event.js"></script>

	
</body>
</html>