<!DOCTYPE html>
<html>
	<head>
		<title>Signup for Mini-Craigslist</title>
  		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    	<link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
	</head>
	<body>
		<div class="container">
			<header>
				<h1><span>Mini-Craigslist</span>Sign Up</h1>
            </header>       

  <?php
	//connect to database
	require 'connect.php';
		//encrypt password using sha
	
	if(isset($_POST['fname'])&&($_POST['password']==$_POST['password'])&&isset($_POST['lname'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['phone'])&&isset($_POST['gender'])&&isset($_POST['email']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$username=$_POST['username'];
		//make secure password 
		$password=$_POST['password'];
		$contactno=$_POST['phone'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$hashed_password=md5($password);
		if((!empty($fname))&&(!empty($lname))&&(!empty($username))&&(!empty($password))&&(!empty($contactno))&&(!empty($gender))&&(!empty($email)))
		{//check if user already exists
			$sql0="SELECT * FROM users WHERE username= '$username' OR emailid= '$email' OR password='$password' OR contactno='$contactno'";
			$result=mysql_query($sql0);
			$num=mysql_num_rows($result);
			if($num>0)
			{ 
				
				header('Location: signup.php');
				echo "User exists with same username and/or email address. Please select another username or use a different email address";
			}

			//insert user into database
			else
				if($num==0) 
			{ 
				$sql="INSERT INTO users (fname,lname,sex,username,emailid,contactno,password) values('$fname','$lname','$gender','$username','$email','$contactno','$hashed_password')";
				mysql_query($sql);
	    		header('Location: index.html');
			}
		}
	}
	else
	{
	print <<<_HTML
 			<div  class="form">
    			<form id="contactform" action="signup.php" method="post"> 
    				<p class="contact"><label for="name">Name</label></p> 
    				<input id="fname" name="fname" placeholder="First name" required="" tabindex="1" type="text">
         			 <p class="contact"><label for="name"></label></p> 
          			<input id="lname" name="lname" placeholder="Last name" required="" tabindex="2" type="text"> 
    				<p class="contact"><label for="email">Email</label></p> 
    				<input id="email" name="email" placeholder="example@domain.com" required="" tabindex="3" type="email"> 
        	        <p class="contact"><label for="username">Create a username</label></p> 
    				<input id="username" name="username" placeholder="username" required="" tabindex="4" type="text"> 
        	        <p class="contact"><label for="password">Create a password</label></p> 
    				<input type="password" id="password" name="password" required="" tabindex="5"> 
           		     <p class="contact"><label for="repassword">Confirm your password</label></p> 
    				<input type="password" id="repassword" name="repassword" required="" tabindex="6"><br> 
 					<select class="select-style gender" name="gender" tabindex="7">
            		<option value="select">i am..</option>
            		<option value="M">Male</option>
            		<option value="F">Female</option>
            		</select><br><br>
           			<p class="contact"><label for="phone">Mobile phone</label></p> 
            		<input id="phone" name="phone" placeholder="phone number" required="" type="text" tabindex="8"> <br>
            		<input class="buttom" name="submit" id="submit" tabindex="9" value="Sign me up!" type="submit"> 	 
   				</form> 
			</div>      
		</div>
_HTML;
	}
  ?>
	</body>
</html>
