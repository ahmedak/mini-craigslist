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
	$password=sha256($password)