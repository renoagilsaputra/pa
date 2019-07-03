<!-- Detail Anggota -->
<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_anggota = val($_GET ['id_anggota']);

		$q = mysql_query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'") or die (mysql_error());
		$s = mysql_fetch_array($q);
	}
?>
	<h2 class="tit"><i class="fa fa-group"></i>&nbsp;Detail Anggota</h2>
	<hr class="bord" />

		<div class="det">
			<img src="asset/img/uploads/<?php echo $s ['gambar']; ?>" />
		</div>
		<table class="det_t">
			<tr>
				<th>ID Anggota</th>
				<td><?php echo $s ['id_anggota']; ?></td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?php echo $s ['nama']; ?></td>
			</tr>
			<tr>
				<th>TTL</th>
				<td><?php echo $s ['ttl']; ?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?php echo $s ['alamat']; ?></td>
			</tr>
			<tr>
				<th>Denda</th>
				<td>Rp <?php echo number_format($s ['denda'],2,',','.'); ?></td>
			</tr>
		</table>
	<br/>