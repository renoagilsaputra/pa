<!-- Transaksi -->
	<h2 class="tit"><i class="fa fa-plus-square"></i>&nbsp;Transaksi</h2>
	<hr class="bord" />
		<p class="tit_t"><i class="fa fa-group"></i>&nbsp;Daftar Anggota</p>
		<!-- Search -->
		<form action="" method="post" enctype="multipart/form-data" class="search">
			<table>
				<tr>
					<td>
						<input type="text" name="cari" placeholder="Pencarian" />
					</td>
					<td>
						<button class="submit" name="btn_cari"><i class="fa fa-search"></i></button>
					</td>
				</tr>
			</table>
		</form>
		<div class="clearfix"></div>
	<hr class="bord" />

	<table class="tb">
		<tr class="active">
			<th>No</th>
			<th>ID Anggota</th>
			<th>Nama</th>
			<th>TTL</th>
			<th>Alamat</th>
			<th><i class="fa fa-cog"></i>&nbsp;Opsi</th>
		</tr>
			<?php
				if(empty($_POST ['btn_cari'])) {
				$cari = val($_POST ['cari']);
				$q = mysql_query("SELECT * FROM anggota WHERE nama like '%$cari%' ORDER by id_anggota") or die (mysql_error());
				$cek = mysql_num_rows($q);
				if($cek < 1) {
					?>
						<tr class="striped">
							<td colspan="6">Data tidak ditemukan!</td>
						</tr>
					<?php
				} else {
					$q = mysql_query("SELECT * FROM anggota WHERE nama like '%$cari%' ORDER by id_anggota") or die (mysql_error());
				}
				$n = 1;
				while($s = mysql_fetch_array($q)) {
			?>
		<tr class="striped">
			<td><?php echo $n++; ?></td>
			<td><a class="det_a" href="?page=anggota_detail&id_anggota=<?php echo $s ['id_anggota']; ?>"><?php echo $s ['id_anggota']; ?></a></td>
			<td><?php echo $s ['nama']; ?></td>
			<td><?php echo $s ['ttl']; ?></td>
			<td><?php echo $s ['alamat']; ?></td>
			<td>
				<a href="?page=transaksi_proses&id_anggota=<?php echo $s ['id_anggota']; ?>" class="ed"><i class="fa fa-plus-square"></i>&nbsp;Input</a>
			</td>
		</tr>
			<?php } } ?>
	</table>