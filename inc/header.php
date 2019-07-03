<?php include "config/config.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<meta charset="UTF-8">
	<!-- Shortcut Icon -->
	<link rel="shortcut icon" href="asset/img/smk.png" />
	<!-- CSS Document -->
	<link rel="stylesheet" type="text/css" href="asset/css/style.css" />
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
</head>
<body>
<?php
	session_start();
	if(empty($_SESSION ['admin'])) {
		redir('auth/');
	}
?>
<!-- Header -->
	<div class="header">
		<a href="?page=beranda"><img class="head" src="asset/img/smk.png" /></a>
		<h1 class="t">Perpustakaan SMK N 1 Purwokerto</h1>
		<p class="p">Jalan Dr. Soeparno No. 29 Kecamatan Purwokerto Timur | <i class="fa fa-globe"></i>&nbsp;<a href="../www.smkn1purwokerto.sch.id" target="_blank">smkn1purwokerto.sch.id</a> | <i class="fa fa-phone"></i>&nbsp;(0281) 653819</p>
		<div class="clearfix"></div>
	</div>
<!-- Wrapper -->
	<div class="wrapper">
	<!-- Leftside -->
		<div class="leftside">
			<nav>
				<ul>
					<a href="?page=beranda"><li><i class="fa fa-dashboard">&nbsp;Dahsboard</i></li></a>
					<a href="?page=anggota"><li><i class="fa fa-group">&nbsp;Anggota</i></li></a>
					<a href="?page=buku"><li><i class="fa fa-book">&nbsp;Buku</i></li></a>
					<a href="?page=transaksi"><li><i class="fa fa-plus-square">&nbsp;Transaksi</i></li></a>
					<a href="?page=laporan"><li><i class="fa fa-print">&nbsp;Laporan</i></li></a>
					<a href="?page=admin"><li><i class="fa fa-user-secret"></i>&nbsp;Admin</li></a>
					<a href="auth/logout.php" onclick="return confirm('Yakin ?')"><li><i class="fa fa-sign-out"></i>&nbsp;Logout</li></a>
				</ul>
			</nav>
		</div>
	<!-- Rightside -->
		<div class="rightside">