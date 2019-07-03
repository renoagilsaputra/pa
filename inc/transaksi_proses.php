<!-- Transaksi Proses -->
<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_anggota = val($_GET ['id_anggota']);

		$q = mysql_query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'");
		$s = mysql_fetch_array($q);
	}
?>
	<h2 class="tit"><i class="fa fa-plus-square"></i>&nbsp;Proses Transaksi</h2>
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
		<tr>
			<th><i class="fa fa-cog"></i>&nbsp;Opsi</th>
			<td><a onclick="return confirm('Yakin?')" href="?page=transaksi_lunasi&id_anggota=<?php echo $s ['id_anggota']; ?>"><i class="fa fa-check"></i>&nbsp;Lunasi</a></td>
		</tr>
	</table>

	<br/>
	
	<!-- Input Transaksi -->
	<h2 class="tit"><i class="fa fa-pencil"></i>&nbsp;Input Pinjam Buku</h2>
	<hr class="bord" />

	<form action="" method="post">
		<table width="200px">
			<tr>
				<th>Pilih Buku</th>
				<td></td>
				<td>
					<select name="id_buku" class="sel_t">
						<option>-- Pilih Buku --</option>
						<?php
							$b_t = mysql_query("SELECT * FROM buku") or die (mysql_error());
							while($b_tt = mysql_fetch_array($b_t)) {
						?>
						<option value="<?php echo $b_tt ['id_buku']; ?>"><?php echo $b_tt ['id_buku'].' '.$b_tt ['judul']; ?></option>
						<?php } ?>
					</select>
				</td>
				<tr>
					<th>Jumlah</th>
					<td></td>
					<td>
						<input type="number" name="jml" placeholder="Jumlah Buku" class="ipt" />
					</td>
				</tr>
				<tr>
					<th>Jumlah hari</th>
					<td></td>
					<td>
						<input type="number" name="jml_hari" placeholder="Jumlah Hari" class="ipt" />
					</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<td>
						<button type="submit" class="btn"><i class="fa fa-pencil"></i>&nbsp;Input</button>
					</td>
				</tr>
		</table>
	</form>
<!-- Proses Input Transaksi -->
	<?php
		if(!empty($_POST)) {
			extract($_POST);

			$id_anggota = val($_GET ['id_anggota']);
			$id_buku = val($_POST ['id_buku']);
			$jml = val($_POST ['jml']);
			$jml_hari = val($_POST ['jml_hari']);

		
			$tgl_now = date('m/d/y');
			$ex = explode('/', $tgl_now);
			$g = GregorianToJD($ex [0], $ex [1], $ex [2]);
			$tgl_t = $g + $jml_hari;
			$tgl_jd = JDToGregorian($tgl_t);

			//cek buku
			$ba = mysql_query("SELECT * FROM buku WHERE id_buku = '$id_buku'") or die (mysql_error());
			$baa = mysql_fetch_array($ba);

			$stok = $baa ['stok'] - $jml;

			if(empty($id_buku)||empty($id_buku)||empty($jml)||empty($jml_hari)) {
				alert('Tidak boleh kosong!');
			} elseif($stok == 0) {
				alert('Stok Buku Habis!');
			} else {
				$add = mysql_query("INSERT into transaksi(id_anggota,id_buku,jml,jml_hari,tgl_pinjam,tgl_kembali) VALUES('$id_anggota','$id_buku','$jml','$jml_hari','$tgl_now','$tgl_jd')") or die (mysql_error());
				if($add) {
					alert('Berhasil!');
					mysql_query("UPDATE buku SET stok = '$stok' WHERE id_buku = '$id_buku'") or die (mysql_error());
				} else {
					alert('Gagal!');
				}
			}
		}

	?>
	<br/>
<!-- Buku yang di pinjam -->
	<h2 class="tit"><i class="fa fa-book"></i>&nbsp;Buku yang di pinjam</h2>
	<hr class="bord" />

	<table class="tb">
		<tr class="active">
			<th>No</th>
			<th><i class="fa fa-plus-square"></i>&nbsp;ID Transaksi</th>
			<th><i class="fa fa-group"></i>&nbsp;Anggota</th>
			<th><i class="fa fa-book"></i>&nbsp;Judul</th>
			<th>Jml</th>
			<th>Jml Hari</th>
			<th>Tgl Pinjam</th>
			<th>Tgl Kembali</th>
			<th><i class="fa fa-cog"></i>&nbsp;Opsi</th>
		</tr>
			<?php
				$id_anggota = val($_GET ['id_anggota']);
				$t = mysql_query("SELECT * FROM transaksi WHERE id_anggota = '$id_anggota'");
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
		<tr class="striped">
			<td><?php echo $nt++; ?></td>
			<td><?php echo $tt ['id_transaksi']; ?></td>
			<td><?php echo $mb ['nama']; ?></td>
			<td><?php echo $bk ['judul']; ?></td>
			<td><?php echo $tt ['jml']; ?></td>
			<td><?php echo $tt ['jml_hari']; ?></td>
			<td><?php echo $tt ['tgl_pinjam']; ?></td>
			<td><?php echo $tt ['tgl_kembali']; ?></td>
			<td>
				<a href="?page=transaksi_kembali&id_transaksi=<?php echo $tt ['id_transaksi']; ?>&id_buku=<?php echo $tt ['id_buku']; ?>&id_anggota=<?php echo $tt ['id_anggota']; ?>" onclick="return confirm('Yakin?')" class="del"><i class="fa fa-undo"></i>&nbsp;Kembalikan</a>
			</td>
		</tr>
			<?php } ?>
	</table>
	<br/>