<?php
	session_start();
	
?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>Hooked</title>
<link href="Hooked.css" rel="stylesheet">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Welcome to Hooked">
</head>

<body>

<header>
	<!-- <h1><a href="index.html"> H∞ked
								</a></h1> -->
<div id="logo"></div>
</header>

<nav>
    
	<ul>

        
		

        
		<li>
            <a href="index.php">Home</a></li>

	
		<li><a href="calendar.php">Calendar</a></li>
		<li><a href="login.php">Feed</a></li>
		<li><a href="contact.php">Messaging</a></li>
		<li><a href="design.php">Account</a></li>
        
        
	</ul>


			

	

</nav>

<main>
    <br><br>
	<h1>User Profile</h1>
	

    $sql = "SELECT * FROM Post INNER JOIN User ON Post.User_userID=User.userID ORDER BY dateOfPost DESC";

</div>

<br><br><br><br><br><br>
</main>

<footer>Copyright &copy; 2023 Hooked<br>
<a href="Hooked@gmail.com">Hooked@gmail.com</a>
</footer>
</body>