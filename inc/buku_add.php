<!-- Tambah Buku -->
	<h2 class="tit"><i class="fa fa-pencil"></i>&nbsp;Tambah Buku</h2>
	<hr class="bord" />

	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Judul</th>
				<td></td>
				<td>
					<input type="text" name="judul" placeholder="Judul" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Penulis</th>
				<td></td>
				<td>
					<input type="text" name="penulis" placeholder="Penulis" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Penerbit</th>
				<td></td>
				<td>
					<input type="text" name="penerbit" placeholder="Penerbit" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Stok</th>
				<td></td>
				<td>
					<input type="text" name="stok" placeholder="Stok" class="ipt" />
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

			$judul = val($_POST ['judul']);
			$penulis = val($_POST ['penulis']);
			$penerbit = val($_POST ['penerbit']);
			$stok = val($_POST ['stok']);

			$sumber = @$_FILES ['gambar'] ['tmp_name'];
			$target = "asset/img/uploads/";
			$nama_gambar = @$_FILES ['gambar'] ['name'];

			if(empty($judul)||empty($penulis)||empty($penerbit)||empty($stok)||empty($nama_gambar)) {
				alert('Tidak boleh kosong!');
			} else {
				$move = move_uploaded_file($sumber, $target.$nama_gambar);
				if($move) {
					mysql_query("INSERT into buku (judul,penulis,penerbit,stok,gambar) VALUES ('$judul','$penulis','$penerbit','$stok','$nama_gambar')") or die (mysql_error());
					alert('Berhasil!');
					redir('?page=buku');
				} else {
					alert('Gagal!');
					redir('?page=buku');
				}
			}
		} 
	?>