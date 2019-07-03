<!-- Buku -->
	<h2 class="tit"><i class="fa fa-book"></i>&nbsp;Buku</h2>
	<hr class="bord" />
		<a href="?page=buku_add" class="add"><i class="fa fa-pencil"></i>&nbsp;Tambah</a>
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
			<th>ID Buku</th>
			<th>Judul</th>
			<th>Penulis</th>
			<th>Penerbit</th>
			<th>Stok</th>
			<th><i class="fa fa-cog"></i>&nbsp;Opsi</th>
		</tr>
			<?php
				if(empty($_POST ['btn_cari'])) {
				$cari = val($_POST ['cari']);
				$q = mysql_query("SELECT * FROM buku WHERE judul like '%$cari%' ORDER by id_buku") or die (mysql_error());
				$cek = mysql_num_rows($q);
				if($cek < 1) {
					?>
						<tr class="striped">
							<td colspan="7">Data tidak ditemukan!</td>
						</tr>
					<?php
				} else {
					$q = mysql_query("SELECT * FROM buku WHERE judul like '%$cari%' ORDER by id_buku") or die (mysql_error());
				}
				$n = 1;
				while($s = mysql_fetch_array($q)) {
			?>
		<tr class="striped">
			<td><?php echo $n++; ?></td>
			<td><a class="det_a" href="?page=buku_detail&id_buku=<?php echo $s ['id_buku']; ?>"><?php echo $s ['id_buku']; ?></a></td>
			<td><?php echo $s ['judul']; ?></td>
			<td><?php echo $s ['penulis']; ?></td>
			<td><?php echo $s ['penerbit']; ?></td>
			<td><?php echo $s ['stok']; ?></td>
			<td>
				<a href="?page=buku_del&id_buku=<?php echo $s ['id_buku']; ?>" class="del" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
				&nbsp;
				<a href="?page=buku_ed&id_buku=<?php echo $s ['id_buku']; ?>" class="ed"><i class="fa fa-edit"></i>&nbsp;Edit</a>
			</td>
		</tr>
			<?php } } ?>
	</table>