<!-- Detail Buku -->
<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_buku = val($_GET ['id_buku']);

		$q = mysql_query("SELECT * FROM buku WHERE id_buku = '$id_buku'") or die (mysql_error());
		$s = mysql_fetch_array($q);
	}
?>
	<h2 class="tit"><i class="fa fa-group"></i>&nbsp;Detail Buku</h2>
	<hr class="bord" />

	<center>
		<div class="det_b">
			<a href="asset/img/uploads/<?php echo $s ['gambar']; ?>" target="_blank"><img src="asset/img/uploads/<?php echo $s ['gambar']; ?>" ></a>
		</div>
		<table class="det_t">
			<tr>
				<th>ID Buku</th>
				<td><?php echo $s ['id_buku']; ?></td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?php echo $s ['judul']; ?></td>
			</tr>
			<tr>
				<th>Penulis</th>
				<td><?php echo $s ['penulis']; ?></td>
			</tr>
			<tr>
				<th>Penerbit</th>
				<td><?php echo $s ['penerbit']; ?></td>
			</tr>
			<tr>
				<th>Stok</th>
				<td><?php echo $s ['stok']; ?></td>
			</tr>
		</table>
	</center>
	<br/>