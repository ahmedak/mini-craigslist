	<?php
		$host="localhost";
		$user="root";
		$password="root";
		$db="craigslist";
		$connect=mysql_connect($host,$user,$password) or die(mysql_error());
		mysql_select_db($db,$connect);
	?>
