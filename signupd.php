<html>
<head>

	<h1>Sign Up Form </h1>

	<style>

		form{
	font-size: 30px;
	margin-top: 200px; 
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 400px;
		}
		
		body {
    background-image: url("4 2.jpg");
		}

	h1 {
   		 color: black;
  	 	 text-align: center;
		}
	form input[type=text] {
    height:30px;
    width: 200px;
    }
    form input[type = password]{
    	height:30px;
    	width:200px;
    }
    
    form input[type=image]{
    	margin-left: 300px;
    	margin-bottom: 10px;
    }
	</style>
	
<?php

  //for required entries
	$fname = $lname = $uname = $email = $contactno = $password = $gender ="";
	$fnameerror = $lnameerror = $unameerror = $passworderror = $gendererror = $emailerror = $contactnoerror ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fname"])) {
     $fnameerror = "FName is required";
   } else {
     $name = test_input($_POST["fname"]);
   }
   
   if (empty($_POST["email"])) {
     $emailerror = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
   }
     
   if (empty($_POST["lname"])) {
     $lnameerror = "LName is required";
   } else {
     $lname = test_input($_POST["lname"]);
   }

   if (empty($_POST["uname"])) {
     $unameerror = "UName is required";
   } else {
     $uname = test_input($_POST["uname"]);
   }

   if (empty($_POST["gender"])) {
     $gendererror = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }

   if (empty($_POST["contactno"])) {
     $contactnoerror = "";
   } else {
     $contactno = test_input($_POST["contactno"]);
   }

   if (empty($_POST["password"])) {
     $passworderror = "Password is required";
   } else {
     $password = test_input($_POST["password"]);
   }
}
	function cut($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>
<form action="signup.php" method="POST">
	First Name :<input type="text" name="fname" rows= "10" cols = "10">
	<span class="error">* <?php echo $fnameerror;?></span><br><br>
	Last Name : <input type="text" name="lname" rows= "5" cols = "10">
	<span class="error">* <?php echo $lnameerror;?></span><br><br>
	User Name :<input type="text" name ="uname" rows= "5" cols = "10">
  <span class="error">* <?php echo $unameerror;?></span><br><br>
	Email ID :<input type="text" name="email" rows= "5" cols = "10">
  <span class="error">* <?php echo $emailerror;?></span><br><br> 
	Phone NO :   <input type ="text" name="contactno" rows= "5" cols = "10">
  <span class="error"> <?php echo $contactnoerror;?></span><br><br>
	Password :    <input type ="password" name="password" rows= "5" cols = "10">
  <span class="error">* <?php echo $passworderror;?></span><br><br>
	Gender :
	<input type = "radio" name= "gender" value = "female">Female
	<input type = "radio" name = "gender" value = "male">Male
  <span class="error">* <?php echo $gendererror;?></span><br><br>
<input type="image" src = "Submit-button.png" alt = "submit" height = "40px" width ="100px">
</form>

</head>
</title>
