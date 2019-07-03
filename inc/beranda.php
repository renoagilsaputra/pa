<!-- Beranda -->
	<h2 class="tit"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</h2>
	<hr class="bord" />
		<h1 class="user">Hi, <?php echo ucfirst($_SESSION ['admin']); ?>!</h1>
	<hr class="bord" />
	<!-- Anggota -->
	<?php
		$a = mysql_query("SELECT * FROM anggota") or die (mysql_error());
		$aa = mysql_num_rows($a);
	?>
	<a href="?page=anggota">
		<div class="grid">
			<h1>
				<i class="fa fa-group"></i>
			</h1>
			<p><?php echo $aa; ?></p>
		</div>
	</a>

	<!-- Buku -->
	<?php
		$b = mysql_query("SELECT * FROM buku") or die (mysql_error());
		$bb = mysql_num_rows($b);
	?>
	<a href="?page=buku">
		<div class="grid">
			<h1>
				<i class="fa fa-book"></i>
			</h1>
			<p><?php echo $bb; ?></p>
		</div>
	</a>

	<!-- Transaksi -->
	<?php
		$t = mysql_query("SELECT * FROM transaksi") or die (mysql_error());
		$tt = mysql_num_rows($t);
	?>
	<a href="?page=transaksi">
		<div class="grid">
			<h1>
				<i class="fa fa-plus"></i>
			</h1>
			<p><?php echo $tt; ?></p>
		</div>
	</a>

	<!-- Laporan -->
	<a href="?page=laporan">
		<div class="grid">
			<h1>
				<i class="fa fa-print"></i>
			</h1>
			<p></p>
		</div>
	</a>