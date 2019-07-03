<!-- Print Anggota -->
<?php include "../config/config.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Print Anggota</title>
	<!-- Css Print -->
	<link rel="stylesheet" type="text/css" href="../asset/css/print.css" />
	<!-- Shortcut Icon -->
	<link rel="shortcut icon" href="../asset/img/smk.png" />
</head>
<body onload="window.print()">
	<h1 class="tit">Data Anggota</h1>
	<p>Di cetak : <?php echo date('d-m-y') ?></p>
	<table border="1px" class="tb">
		<tr>
			<th>No</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>TTL</th>
			<th>Alamat</th>
			<th>Denda</th>
		</tr>
			<?php
				$q = mysql_query("SELECT * FROM anggota ORDER by id_anggota") or die (mysql_error());
				$n = 1;
				while($s = mysql_fetch_array($q)) {
			?>
		<tr>
			<td><?php echo $n++; ?></td>
			<td><?php echo $s ['id_anggota']; ?></td>
			<td><?php echo $s ['nama']; ?></td>
			<td><?php echo $s ['ttl']; ?></td>
			<td><?php echo $s ['alamat'] ?></td>
			<td><?php echo number_format($s ['denda'],2,',','.'); ?></td>
		</tr>
			<?php } ?>
	</table>
</body>
</html>