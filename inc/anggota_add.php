<!-- Tambah Anggota -->
	<h2 class="tit"><i class="fa fa-pencil"></i>&nbsp;Tambah Anggota</h2>
	<hr class="bord" />

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Nama</th>
				<td></td>
				<td>
					<input type="text" name="nama" placeholder="Nama" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>TTL</th>
				<td></td>
				<td>
					<input type="text" name="ttl" placeholder="TTL" class="ipt" />
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
					<textarea name="alamat" placeholder="Alamat" class="ipt"></textarea>
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
					<button type="submit" class="btn"><i class="fa fa-pencil"></i>&nbsp;Tambah</button>
				</td>
			</tr>
		</table>
	</form>

	<?php
		if(!empty($_POST)) {
			extract($_POST);

			$nama = val($_POST ['nama']);
			$ttl = val($_POST ['ttl']);
			$alamat = val($_POST ['alamat']);

			$sumber = @$_FILES ['gambar'] ['tmp_name'];
			$target = "asset/img/uploads/";
			$nama_gambar = @$_FILES ['gambar'] ['name'];

			if(empty($nama)||empty($ttl)||empty($alamat)||empty($nama_gambar)) {
				alert('Tidak boleh kosong!');
			} else {
				$move = move_uploaded_file($sumber, $target.$nama_gambar);
				if($move) {
					mysql_query("INSERT into anggota (nama,ttl,alamat,gambar) VALUES ('$nama','$ttl','$alamat','$nama_gambar')") or die (mysql_error());
					alert('Berhasil!');
					redir('?page=anggota');
				} else {
					alert('Gagal!');
				}
			}
		}
	?>