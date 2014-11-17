	<?php
		$host="localhost";
		$user="deepanshu__sapra";
		$password="b13116";
		$db="B13116";
		$connect=mysql_connect($host,$user,$password) or die(mysql_error());
		mysql_select_db($db,$connect);
	?>
