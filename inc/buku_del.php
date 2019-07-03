<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_buku = val($_GET ['id_buku']);

		$del = mysql_query("DELETE FROM buku WHERE id_buku = '$id_buku'") or die (mysql_error());

		if($del) {
			alert('Berhasil!');
			redir('?page=buku');
		} else {
			alert('Gagal!');
			redir('?page=buku');
		}
	}
?>