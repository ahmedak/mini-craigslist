<?php

	if(isset($_POST['uname'])&& isset($_POST['pass']))
	{
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		$pass_hash=md5($pass);
		if(!empty($uname)&&!empty($pass))
		{
			$query="select email from users where username=$uname and password=$pass_hash";
			$run=mysql_query($query,$connect);
			$num=mysql_num_rows($run);
			echo $num;
				if($num==0)
				{
					echo "please enter correct usename/password";
				}
				else if($num==1)
				{
					echo "Login succesfull";
				}
		}
		else
		{
			echo "Username/password not entered";  	
		}		
	 }			
?>
		<form action="<?php echo $scriptname;?>" method="POST">
		Username : <input type="text" name ="uname">
		<br>
		Password : <input type ="password" name ="pass"><br>
		<input type="submit" value="Log in">
		</form>
