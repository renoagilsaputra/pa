<!-- Tambah Admin -->
	<h2 class="tit"><i class="fa fa-pencil"></i>&nbsp;Tambah Admin</h2>
	<hr class="bord" />

	<form action="" method="post">
		<table>
			<tr>
				<th>Nama</th>
				<td></td>
				<td>
					<input type="text" name="nama" placeholder="Nama" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Email</th>
				<td></td>
				<td>
					<input type="text" name="email" placeholder="Email" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Username</th>
				<td></td>
				<td>
					<input type="text" name="username" placeholder="Username" class="ipt" />
				</td>
			</tr>
			<tr>
				<th>Password</th>
				<td></td>
				<td>
					<input type="password" name="password" placeholder="Password" class="ipt" />
				</td>
			</tr>
			<tr>
				<th></th>
				<td></td>
				<td>
					<button type="submit" class="btn"><i class="fa fa-pencil"></i>&nbsp;Tambah</button>
				</td>
			</tr>
		</table>
	</form>

	<?php
		if(!empty($_POST)) {
			extract($_POST);

			$nama = val($_POST ['nama']);
			$email = val($_POST ['email']);
			$username = val($_POST ['username']);
			$password = val($_POST ['password']);
			$pass = md5($password);

			if(empty($nama)||empty($email)||empty($username)||empty($password)) {
				alert('Tidak boleh kosong!');
			} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				alert('Email tidak valid!');
			} else {
				$add = mysql_query("INSERT into admin (nama,email,username,password) VALUES ('$nama','$email','$username','$pass')") or die (mysql_error());
				if($add) {
					alert('Berhasil');
					redir('?page=admin');
				} else {
					alert('Gagal!');
				}
			}
		}
	?>