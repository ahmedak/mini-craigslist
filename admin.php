<!DOCTYPE html>
<html>
	<head>
		<title>Admin dashboard</title>
  		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    	<link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
	</head>
	<body>
		<div class="container">
			<header>
				<h1><span>Mini-Craigslist</span>Admin Dashboard</h1>
            </header>       

  <?php
	//connect to database
	require 'connect.php';

		{//check if user is admin
			$sql0="SELECT * FROM Admin WHERE userid= '$userid' ";
			$result=mysql_query($sql0);
			$num=mysql_num_rows($result);
			if($num>0)
			{ 
				header('Location: del.html');
			}

			//insert user into database
			else
				if($num==0) 
				{ 
					header('Location: index.html');
				}
		}


	else	
	{
	print <<<_HTML
			<header>
				<h1><span>Admin Dashboard</span>Delete spam</h1>
            </header> 
 			<div  class="form">
    			<form id="adminform" action="admin.php" method="post"> 
    				<p class="contact"><label for="name">Delete Item</label></p> 
    				<input id="item_no" name="item_no" placeholder="Item_no of item to be deleted" required="" tabindex="1" type="text">
         			 <input class="buttom" name="submit" id="submit" tabindex="9" value="Delete ad" type="submit"> 	 
   				</form> 
			</div>      
		</div>
_HTML;
	}
  ?>
	
	</body>
</html>
