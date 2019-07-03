<?php
	session_start();
	include "../config/config.php";

	if(!empty($_POST)) {
		extract($_POST);

		$user = val($_POST ['username']);
		$pass = val($_POST ['password']);
		$pas = md5($pass);

		$q = mysql_query("SELECT * FROM admin WHERE username = '$user' OR password = '$pas'") or die (mysql_error());
		$cek = mysql_num_rows($q);

		if(empty($user)||empty($pass)) {
			alert('Username / Password kosong!');
			redir('../auth/');
		} elseif($cek < 1) {
			alert('Anda belum terdaftar');
			redir('../auth/');
		} else {
			$_SESSION ['admin'] = $user;
			alert('Berhasil Login!');
			redir('../?page=beranda');
		}
	}
?>