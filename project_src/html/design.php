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
		<li><a href="posts_view.php">Feed</a></li>
		<li><a href="messaging.php">Messaging</a></li>
		<li><a href="design.php">Account</a></li>
        <li><a href="search.php">Search</a></li>
        
        
	</ul>


			

	

</nav>

<main>
    <br><br>
	<h1>User Profile</h1>
	<div>
		<h2>User Information</h2>
		<p><strong>Name:</strong><?php echo $_SESSION['user']['userName']; ?></p>
		<p><strong>Email:</strong> <?php echo $_SESSION['user']['userEmail']; ?></p>
		<p><strong>Bio:</strong> <?php echo $_SESSION['user']['userBio']; ?></p>
		<!--<p><strong>ID:</strong> <?php echo $_SESSION['user']['userID']; ?></p>-->
	</div>
	<div>
		<h1>
			My Posts
		</h1>
		 <?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$hooked_db = "hooked_db";
		
		$conn = mysqli_connect($servername,$username,$password,$hooked_db);
		
		
		if ($conn -> connect_error){
			echo "Connection error";
			die("Connection failed". $conn -> connect_error);
		}

		//$userID = $_SESSION['user']['userID'];
		$userID = $_SESSION['user']['userID'];
		$sql = "SELECT * FROM Post WHERE User_userID = $userID";
		$result = mysqli_query($conn, $sql);
		
		
		if($result){
			while ($row = mysqli_fetch_assoc($result)) {
			echo "<div class = 'posts'>";
			echo "<p>" . $row['postText'] . "</p>";
			// if ($row['postPicURL'] != null) {
			// 	echo "<p'" . $row['postPicURL'] . "'>";
			// }
			echo "<p>" . $row['dateOfPost'] . "</p>";
			echo "</div>";
		}
		}
		

		?>
	
	<h2>
		Create Post:
	</h2>
	<form method="post">
		<label for="body">
			Post Text:
		</label>
		<br>
		<input type="text" id="body" name="body">
		
		<br>
		<label for="pic">
			Picture: 
		</label>
		<br>
		<input type="text" id="pic" name="pic">
		<br>
		<input type="submit" name="submit" id="submit">
	</form>
	</div>
</div>


<?php 
$servername = "localhost";
$username = "root";
$password = "";
$hooked_db = "hooked_db";

$conn = mysqli_connect($servername,$username,$password,$hooked_db);


if ($conn -> connect_error){
    echo "Connection error";
    die("Connection failed". $conn -> connect_error);
}
$user_id = $_SESSION['user']['userID'];
$post_text = $_POST['body'];
$pic = $_POST['pic'];


$sql = "INSERT INTO Post (postText, postPicURL, dateOfPost, User_userID) VALUES ('$post_text', '$pic', NOW(), '$user_id')";
if($post_text != null){
	$result = mysqli_query($conn,$sql);
	header("Refresh:0");
}






?>
<br><br><br><br><br><br>
</main>


<footer>Copyright &copy; 2023 Hooked<br>
<a href="Hooked@gmail.com">Hooked@gmail.com</a>
</footer>
</body>







