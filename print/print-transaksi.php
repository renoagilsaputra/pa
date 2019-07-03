<!-- Print Transaksi -->
<?php include "../config/config.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Print Transaksi</title>
	<!-- Css Print -->
	<link rel="stylesheet" type="text/css" href="../asset/css/print.css" />
	<!-- Shortcut Icon -->
	<link rel="shortcut icon" href="../asset/img/smk.png" />
</head>
<body onload="window.print()">
	<h1 class="tit">Data Transaksi</h1>
	<p>Di cetak : <?php echo date('d-m-y') ?></p>
	<table border="1px" class="tb">
		<tr>
			<th>No</th>
			<th>ID Transaksi</th>
			<th>Nama</th>
			<th>Judul</th>
			<th>Jml</th>
			<th>Jml Hari</th>
			<th>Tgl Pinjam</th>
			<th>Tgl Kembali</th>
		</tr>
			<?php
				$t = mysql_query("SELECT * FROM transaksi ORDER by id_transaksi");
				$cek_t = mysql_num_rows($t);
				if($cek_t < 1) {
					?>
						<tr class="striped">
							<td colspan="9">Data tidak ditemukan!</td>
						</tr>
					<?php
				}
				$nt = 1;
				while($tt = mysql_fetch_array($t)) {
					//member
					$id_member = $tt ['id_anggota'];
					$member = mysql_query("SELECT * FROM anggota WHERE id_anggota = '$id_member'") or die (mysql_error());
					$mb = mysql_fetch_array($member);
					//buku
					$id_book = $tt ['id_buku'];
					$book = mysql_query("SELECT * FROM buku WHERE id_buku = '$id_book'") or die (mysql_error());
					$bk = mysql_fetch_array($book); 
			?>
		<tr>
			<td><?php echo $nt++; ?></td>
			<td><?php echo $tt ['id_transaksi']; ?></td>
			<td><?php echo $mb ['nama']; ?></td>
			<td><?php echo $bk ['judul']; ?></td>
			<td><?php echo $tt ['jml']; ?></td>
			<td><?php echo $tt ['jml_hari']; ?></td>
			<td><?php echo $tt ['tgl_pinjam']; ?></td>
			<td><?php echo $tt ['tgl_kembali']; ?></td>
		</tr>
			<?php } ?>
	</table>
</body>
</html>