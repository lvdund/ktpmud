<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin list</title>
</head>
<body>
	<h1>List admins</h1>

	<!-- <?php echo "<pre>"; print_r($admin); ?> -->

	<table border="1" cellpadding="2" cellspacing="2">
		<tr>
			<th>idAdmin</th>
			<th>tkAdmin</th>
			<th>mkAdmin</th>
			<th>tenAdmin</th>
			<th>sdtAdmin</th>
		</tr>
		<?php foreach ($admin as $title) { ?>
			<tr>
				<td><?= $title['idAdmin'] ?></td>
				<td><?= $title['tkAdmin'] ?></td>
				<td><?= $title['mkAdmin'] ?></td>
				<td><?= $title['tenAdmin'] ?></td>
				<td><?= $title['sdtAdmin'] ?></td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>