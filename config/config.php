<?php
	//koneksi
	@mysql_connect("localhost","root","") or die (mysql_error());
	@mysql_select_db("pa") or die (mysql_error());

	//function
	function val($i) {
		return mysql_real_escape_string($i);
	}
	function alert($a) {
		echo "<script type='text/javascript'>
				alert('".$a."');
			</script>";
	}
	function redir($r) {
		echo "<script typ='text/javascript'>
				document.location = '".$r."';
			</script>";
	}
?>