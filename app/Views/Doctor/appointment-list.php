<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,appointment-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />


<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/static/h-ui.admin/css/style.css" />


<title>Appointment Managerment</title>
</head>
<body>
<nav class="breadcrumb"><a href="<?=base_url()?>/doctor"><i class="Hui-iconfont">&#xe67f;</a></i> Front page<span class="c-gray en">&gt;</span>Appointment management <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!-- <div class="text-c">
		<input type="text" class="input-text" style="width:250px" placeholder="Enter member name" id="" name="tenBenhNhan">
		<button type="submit" class="btn btn-success radius"><i class="Hui-iconfont">&#xe665;</i>Search appointment</button>
	</div> -->
	<form>
		<div class="text-c">
			<input type="text" class="input-text" style="width:300px" placeholder="Điền tên Bệnh Nhân" id="" name="tenBenhNhan">
			<button type="submit" class="btn btn-success radius" id="" ><i class="Hui-iconfont">&#xe665;</i>Search</button>
		</div>
	</form>

	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
			<tr class="text-c">
				<th width="100">ID Appointment</th>
				<th width="200">Patient</th>
				<th width="100">Product</th>
				<th width="200">Department</th>
				<th width="200">Doctor</th>
				<th width="150">Date of begin</th>
				<th width="150">Create at</th>
				<th width="400">Describe</th>
				<th width="100">Status</th>
                <th with="50"></th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<?php foreach (array_reverse($ph) as $item) : ?>
					<tr class="text-c">
                        <?php if ($item['tinhTrangPH'] == 'done') {continue;} ?>
						<td><?= $item['idPH'] ?></td>
						<td><?= $item['tenBenhNhan'] ?></td>
						<td><?= $item['tenDichVu'] ?></td>
						<td><?= $item['tenKhoa'] ?></td>
						<td></td>
						<td><?= $item['lichHenKham'] ?></td>
						<td><?= $item['ngayLapPH'] ?></td>
						<td><?= $item['moTa'] ?></td>
						<td><?= $item['tinhTrangPH'] ?></td>
                        <td>
                        <a href="<?= base_url();?>/doctor/check/<?= $item['idPH'] ?>" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i></a>
                        </td>
					</tr>
				<?php endforeach ?>
			</tr>
		</tbody>
        <tbody>
			<tr class="text-c">
				<?php foreach (array_reverse($ph_check) as $item) : ?>
					<tr class="text-c">
						<td><?= $item['idPH'] ?></td>
						<td><?= $item['tenBenhNhan'] ?></td>
						<td><?= $item['tenDichVu'] ?></td>
                        <td><?= $item['tenKhoa'] ?></td>
						<td><?= $item['tenBacSi'] ?></td>
						<td><?= $item['lichHenKham'] ?></td>
						<td><?= $item['ngayLapPH'] ?></td>
						<td><?= $item['moTa'] ?></td>
						<td><?= $item['tinhTrangPH'] ?></td>
                        <td>
                        <a href="<?= base_url();?>/doctor/uncheck/<?= $item['idPH'] ?>" class="btn btn-danger radius btn-del-comfirmm"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
					</tr>
				<?php endforeach ?>
			</tr>
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
