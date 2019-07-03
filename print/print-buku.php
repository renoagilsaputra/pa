<!-- Print Buku -->
<?php include "../config/config.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Print Buku</title>
	<!-- Css Print -->
	<link rel="stylesheet" type="text/css" href="../asset/css/print.css" />
	<!-- Shortcut Icon -->
	<link rel="shortcut icon" href="../asset/img/smk.png" />
</head>
<body onload="window.print()">
	<h1 class="tit">Data Buku</h1>
	<p>Di cetak : <?php echo date('d-m-y') ?></p>
	<table border="1px" class="tb">
		<tr>
			<th>No</th>
			<th>ID Buku</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Stok</th>
		</tr>
			<?php
				$q = mysql_query("SELECT * FROM buku ORDER by id_buku") or die (mysql_error());
				$n = 1;
				while($s = mysql_fetch_array($q)) {
			?>
		<tr>
			<td><?php echo $n++; ?></td>
			<td><?php echo $s ['id_buku']; ?></td>
			<td><?php echo $s ['judul']; ?></td>
			<td><?php echo $s ['penulis']; ?></td>
			<td><?php echo $s ['penerbit'] ?></td>
			<td><?php echo $s ['stok']; ?></td>
		</tr>
			<?php } ?>
	</table>
</body>
</html>