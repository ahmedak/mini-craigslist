<?php
	//connect to database
	require 'connect.php';

	$fname=$_POST[fname];
	$lname=$_POST[lname];
	$username=$_POST[username];
	//make secure password 
	$password=$_POST[password];
	$contactno=$_POST[phone];
	$gender=$_POST[gender];
	$email=$_POST[email];

	//encrypt password using sha
	$hashed_password=hash(sha1($password));

	//check if user already exists
	$sql0="SELECT * FROM users WHERE username= ? OR emailid= ?";
	$params0 = array($username,$emailid);
	$stmt0= sqlsrv_query($connect, $sql0, $params0);
	if(sqlsrv_has_rows($stmt)) { 
		echo "User exists with same username and/or email address. Please select another username or use a different email address."
		header('Location: /signup.html');
	}

	//insert user into database
	$sql="INSERT INTO users (fname,lname,sex,username,emailid,contactno,password) values (?,?,?,?,?,?,?)";
	$params= array($fname,$lname,$gender,$username,$email,$contactno,$hashed_password);
	$stmt = sqlsrv_query($connect, $sql, $params);
	if(sqlsrv_has_rows($stmt)) { 
    	echo "Welcome, ".$fname; 
    	header('Location: /index.html');
	}
