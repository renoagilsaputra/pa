<!DOCTYPE html>
<html>
<head>
	<title>Login > Perpus</title>
	<meta charset="UTF-8">
	<!-- CSS Login -->
	<link rel="stylesheet" type="text/css" href="../asset/css/login.css" />
	<!-- Shorcut Icon -->
	<link rel="shortcut icon" href="../asset/img/smk.png" />
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="../asset/font-awesome/css/font-awesome.min.css" />
</head>
<body>
<!-- Login -->
	<div class="top"></div>
	<div class="log"> 
		<center>
			<h1><i class="fa fa-user-secret"></i>&nbsp;Login</h1>
			<img src="../asset/img/smk.png" />
			<form action="login_act.php" method="post">
				<table>
					<tr>
						<td>
							<input type="text" name="username" placeholder="Username" class="ip" />
						</td>
					</tr>
					<tr>
						<td>
						<input type="password" name="password" placeholder="Password" class="ip" />
						</td>
					</tr>
					<tr>
						<td colspan="1" align="center">
							<button type="submit" class="btn"><i class="fa fa-sign-in"></i>&nbsp;Login</button>
						</td>
					</tr>
				</table>
			</form>
		</center>
	</div>
	<div class="bottom">
		<p>&copy; Copyright by Reno <?php echo date('Y'); ?></p>
	</div>
</body>
</html>