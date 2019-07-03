<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_transaksi = val($_GET ['id_transaksi']);
		$id_anggota = val($_GET ['id_anggota']);
		$id_buku = val($_GET ['id_buku']);

		//transaksi
		$t = mysql_query("SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'") or die (mysql_error());
		$tt = mysql_fetch_array($t);

		//anggota
		$a = mysql_query("SELECT * FROM anggota WHERE id_anggota = '$id_anggota'") or die (mysql_error());
		$aa = mysql_fetch_array($a);

		//buku
		$b = mysql_query("SELECT * FROM buku WHERE id_buku = '$id_buku'") or die (mysql_error());
		$bb = mysql_fetch_array($b);

		//cek denda
		$tgl_now = date('m/d/y');
		$ex1 = explode('/', $tgl_now);
		$g1 = GregorianToJD($ex1 [0], $ex1 [1], $ex1 [2]);

		$tgl_kembali = $tt ['tgl_kembali'];
		$ex2 = explode('/', $tgl_kembali);
		$g2 = GregorianToJD($ex2 [0], $ex2 [1], $ex2 [2]);

		$selisih = $g1 - $g2;

		//cek buku
		$stok = $bb ['stok'] + $tt ['jml'];

		if($selisih > 0) {
			$denda = $selisih * 500;
			$total = $aa ['denda'] + $denda * $tt ['jml'];
			mysql_query("UPDATE anggota SET denda = '$total' WHERE id_anggota = '$id_anggota'") or die (mysql_error());
			mysql_query("UPDATE buku SET stok = '$stok' WHERE id_buku = '$id_buku'");
			mysql_query("DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'") or die (mysql_error());
			alert('Berhasil, Anda dikenai denda!');
			redir('?page=transaksi_proses&id_anggota='.$id_anggota);
		} else {
			mysql_query("UPDATE buku SET stok = '$stok' WHERE id_buku = '$id_buku'");
			mysql_query("DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'") or die (mysql_error());
			alert('Berhasil!');
			redir('?page=transaksi_proses&id_anggota='.$id_anggota);
		}
	}
?>