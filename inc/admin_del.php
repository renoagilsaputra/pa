<?php
	if(!empty($_GET)) {
		extract($_GET);

		$id_admin = val($_GET ['id_admin']);

		$del = mysql_query("DELETE FROM admin WHERE id_admin = '$id_admin'") or die (mysql_error());

		if($del) {
			alert('Berhasil!');
			redir('?page=admin');
		} else {
			alert('Gagal!');
			redir('?page=admin');
		}
	}
?>