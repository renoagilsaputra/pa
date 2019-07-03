<!-- Admin -->
	<h2 class="tit"><i class="fa fa-user-secret"></i>&nbsp;Admin</h2>
	<hr class="bord" />
		<a href="?page=admin_add" class="add"><i class="fa fa-pencil"></i>&nbsp;Tambah</a>
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
			<th>ID Admin</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Username</th>
			<th><i class="fa fa-cog"></i>&nbsp;Opsi</th>
		</tr>
			<?php
				if(empty($_POST ['btn_cari'])) {
				$cari = val($_POST ['cari']);
				$q = mysql_query("SELECT * FROM admin WHERE nama like '%$cari%' ORDER by id_admin") or die (mysql_error());
				$cek = mysql_num_rows($q);
				if($cek < 1) {
					?>
						<tr class="striped">
							<td colspan="7">Data tidak ditemukan!</td>
						</tr>
					<?php
				} else {
					$q = mysql_query("SELECT * FROM admin WHERE nama like '%$cari%' ORDER by id_admin") or die (mysql_error());
				}
				$n = 1;
				while($s = mysql_fetch_array($q)) {
			?>
		<tr class="striped">
			<td><?php echo $n++; ?></td>
			<td><?php echo $s ['id_admin']; ?></td>
			<td><?php echo $s ['nama']; ?></td>
			<td><?php echo $s ['email']; ?></td>
			<td><?php echo $s ['username']; ?></td>
			<td>
				<a href="?page=admin_del&id_admin=<?php echo $s ['id_admin']; ?>" class="del" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i>&nbsp;Hapus</a>
			</td>
		</tr>
			<?php } } ?>
	</table>