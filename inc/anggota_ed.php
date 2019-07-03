<!-- Edit Anggota -->
<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_anggota = val($_GET ['id_anggota']);

		$q = mysql_query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'") or die (mysql_error());
		$s = mysql_fetch_array($q);
	}
?>
	<h2 class="tit"><i class="fa fa-edit"></i>&nbsp;Edit Anggota</h2>
	<hr class="bord" />

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Nama</th>
				<td></td>
				<td>
					<input type="text" name="nama" placeholder="Nama" value="<?php echo $s ['nama']; ?>" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>TTL</th>
				<td></td>
				<td>
					<input type="text" name="ttl" placeholder="TTL" value="<?php echo $s ['ttl']; ?>" class="ipt" />
				</td>
			</tr>
			<tr>
				<th></th>
				<td></td>
				<td>*) Banyumas, 25 Mei 1999</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td></td>
				<td>
					<textarea name="alamat" placeholder="Alamat" class="ipt"><?php echo $s ['alamat']; ?></textarea>
				</td>
			</tr>
			<tr>
				<th>Gambar</th>
				<td></td>
				<td>
					<input type="file" name="gambar" />
				</td>
			</tr>
			<tr>
				<th></th>
				<td></td>
				<td>
					<button type="submit" class="btn"><i class="fa fa-edit"></i>&nbsp;Edit</button>
				</td>
			</tr>
		</table>
	</form>

	<?php
		if(!empty($_POST)) {
			extract($_POST);

			$id_anggota = val($_GET ['id_anggota']);
			$nama = val($_POST ['nama']);
			$ttl = val($_POST ['ttl']);
			$alamat = val($_POST ['alamat']);

			$sumber = @$_FILES ['gambar'] ['tmp_name'];
			$target = "asset/img/uploads/";
			$nama_gambar = @$_FILES ['gambar'] ['name'];

			if(empty($nama)||empty($ttl)||empty($alamat)) {
				alert('Tidak boleh kosong!');
			} elseif(empty($nama_gambar)) {
				mysql_query("UPDATE anggota SET nama ='$nama', ttl = '$ttl', alamat = '$alamat' WHERE id_anggota = '$id_anggota'") or die (mysql_error());
				alert('Berhasil!');
				redir('?page=anggota');
			} else {
				$move = move_uploaded_file($sumber, $target.$nama_gambar);
				if($move) {
					mysql_query("UPDATE anggota SET nama ='$nama', ttl = '$ttl', alamat = '$alamat', gambar = '$nama_gambar' WHERE id_anggota = '$id_anggota'") or die (mysql_error());
					alert('Berhasil!');
					redir('?page=anggota');
				} else {
					alert('Gagal!');
				}
			}
		}
	?>