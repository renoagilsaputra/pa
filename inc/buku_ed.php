<!-- Edit Buku -->
	<?php
		if(!empty($_GET)) {
			extract($_GET);

			$id_anggota= val($_GET ['id_buku']);

			$q = mysql_query("SELECT * FROM buku WHERE id_buku = '$id_buku'") or die (mysql_error());
			$s = mysql_fetch_array($q);
		}
	?>
	<h2 class="tit"><i class="fa fa-edit"></i>&nbsp;Edit Buku</h2>
	<hr class="bord" />

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Judul</th>
				<td></td>
				<td>
					<input type="text" name="judul" value="<?php echo $s ['judul']; ?>" placeholder="Judul" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Penulis</th>
				<td></td>
				<td>
					<input type="text" name="penulis" value="<?php echo $s ['penulis']; ?>" placeholder="Penulis" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Penerbit</th>
				<td></td>
				<td>
					<input type="text" name="penerbit" value="<?php echo $s ['penerbit']; ?>" placeholder="Penerbit" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Stok</th>
				<td></td>
				<td>
					<input type="text" name="stok" value="<?php echo $s ['stok']; ?>" placeholder="Stok" class="ipt" />
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

			$id_buku = val($_GET ['id_buku']);
			$judul = val($_POST ['judul']);
			$penulis = val($_POST ['penulis']);
			$penerbit = val($_POST ['penerbit']);
			$stok = val($_POST ['stok']);

			$sumber = @$_FILES ['gambar'] ['tmp_name'];
			$target = "asset/img/uploads/";
			$nama_gambar = @$_FILES ['gambar'] ['name'];

			if(empty($judul)||empty($penulis)||empty($penerbit)||empty($stok)) {
				alert('Berhasil!');
			} elseif(empty($nama_gambar)) {
				mysql_query("UPDATE buku SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', stok = '$stok' WHERE id_buku = '$id_buku'") or die (mysql_error());
				alert('Berhasil!');
				redir('?page=buku');
			} else {
				$move = move_uploaded_file($sumber, $target.$nama_gambar);
				if($move) {
					mysql_query("UPDATE buku SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', stok = '$stok', gambar = '$nama_gambar' WHERE id_buku = '$id_buku'") or die (mysql_error());
					alert('Berhasil!');
					redir('?page=buku');
				} else {
					alert('Gagal!');
					redir('?page=buku');
				}
			}
		}
	?>