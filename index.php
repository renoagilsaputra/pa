<?php include "inc/header.php"; ?>
<?php
	error_reporting(0);
	switch($_GET ['page']) {
		//beranda
		case 'beranda' : include "inc/beranda.php"; break;

		//anggota
		case 'anggota' : include "inc/anggota.php"; break;
		case 'anggota_add' : include "inc/anggota_add.php"; break;
		case 'anggota_del' : include "inc/anggota_del.php"; break;
		case 'anggota_ed' : include "inc/anggota_ed.php"; break;
		case 'anggota_detail' : include "inc/anggota_detail.php"; break;

		//buku
		case 'buku' : include "inc/buku.php"; break;
		case 'buku_add' : include "inc/buku_add.php"; break;
		case 'buku_del' : include "inc/buku_del.php"; break;
		case 'buku_ed' : include "inc/buku_ed.php"; break;
		case 'buku_detail' : include "inc/buku_detail.php"; break;

		//transaksi
		case 'transaksi' : include "inc/transaksi.php"; break;
		case 'transaksi_proses' : include "inc/transaksi_proses.php"; break;
		case 'transaksi_lunasi' : include "inc/transaksi_lunasi.php"; break;
		case 'transaksi_kembali' : include "inc/transaksi_kembali.php"; break;

		//laporan
		case 'laporan' : include "inc/laporan.php"; break;

		//admin
		case 'admin' : include "inc/admin.php"; break;
		case 'admin_add' : include "inc/admin_add.php"; break;
		case 'admin_del' : include "inc/admin_del.php"; break;


		default : include "inc/beranda.php"; break;
	}
?>
<?php include "inc/footer.php"; ?>