<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_anggota = val($_GET ['id_anggota']);

		$del = mysql_query("DELETE FROM anggota WHERE id_anggota = '$id_anggota'") or die (mysql_error());

		if($del) {
			alert('Berhasil!');
			redir('?page=anggota');
		} else {
			alert('Gagal!');
			redir('?page=anggota');
		}
	}
?>