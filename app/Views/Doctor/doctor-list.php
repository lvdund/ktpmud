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

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<title>Doctor Managerment</title>
</head>
<body>
<nav class="breadcrumb"><a href="<?= base_url() ?>/admin/home"><i class="Hui-iconfont">&#xe67f;</i></a> Front page<span class="c-gray en">&gt;</span> Doctor center<span class="c-gray en">&gt;</span>Doctor Management <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

<div class="page-container">
	<form>
		<div class="text-c">
			<!-- <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
			-
			<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;"> -->
			<input type="text" class="input-text" style="width:300px" placeholder="Điền tên bác si" id="" name="tenbacsi">
			<input type="text" class="input-text" style="width:300px" placeholder="điền tên khoa" id="" name="tenkhoa">
			<button type="submit" class="btn btn-success radius" id="" ><i class="Hui-iconfont">&#xe665;</i>Search user</button>
		</div>
	</form>

	
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="<?= base_url();?>/admin/doctor/add" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> Add user</a></span> <span class="r">Shared data：<strong>88</strong> </span> </div>
	<!--  -->
	<div class="mt-20">
	<?= view('message/message') ?>
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="50">ID</th>
				<th width="100">Name</th>
				<th width="40">Gender</th>
				<th width="90">Phone number</th>
				<th width="150">E-mail</th>
				<th width="100">Date of birth</th>
                <th width="150">Department</th>
				<th width="50">Chức năng</th>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach ($tbacsi as $item) : ?>
				<tr class="text-c">
					<td><?= $item['idBacSi'] ?></td>
					<td><?= $item['tenBacSi'] ?></td>
					<td><?= $item['gioiTinhBacSi'] ?></td>
					<td><?= $item['sdtBacSi'] ?></td>
					<td><?= $item['tkBacSi'] ?></td>
					<td><?= $item['dobBacSi'] ?></td>
					<td><?= $item['tenKhoa'] ?></td>
					<td>
						<a href="<?= base_url();?>/admin/doctor/delete/<?= $item['idBacSi'] ?>" class="btn btn-danger radius btn-del-comfirmm"><i class="Hui-iconfont">&#xe6e2;</i></a>
						<a href="<?= base_url();?>/admin/doctor/edit/<?= $item['idBacSi'] ?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i></a>
					</td>
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