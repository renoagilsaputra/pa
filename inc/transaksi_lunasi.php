<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_anggota = val($_GET ['id_anggota']);

		$lunasi = mysql_query("UPDATE anggota SET denda = '0' WHERE id_anggota = '$id_anggota'") or die (mysql_error());

		if($lunasi) {
			alert('Berhasil!');
			redir('?page=transaksi_proses&id_anggota='.$id_anggota);
		} else {
			alert('Gagal!');
			redir('?page=transaksi_proses&id_anggota='.$id_anggota);
		}
	}
?>