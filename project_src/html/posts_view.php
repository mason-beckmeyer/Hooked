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
	<h1>Posts</h1>
	
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hooked_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve 20 most recent posts
$sql = "SELECT User.userName, Post.postText, Post.postPicURL, Post.dateOfPost FROM User INNER JOIN Post ON User.userID = Post.User_userID ORDER BY dateOfPost DESC LIMIT 20";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "<div class = 'posts'>";
	  echo "<p><b>" . $row["userName"]. "</b> - " . $row["postText"]. "<br>";
	//   if (!empty($row["postPicURL"])) {
	// 	  echo "<img src='" . $row["postPicURL"] . "'><br>";
	//   }
	  echo "Posted on " . $row["dateOfPost"] . "</p>";
	  echo "</div>";
	}
  } else {
	echo "No posts to display.";
  }
  mysqli_close($conn);
?>

</div>

<br><br><br><br><br><br>
</main>

<footer>Copyright &copy; 2023 Hooked<br>
<a href="Hooked@gmail.com">Hooked@gmail.com</a>
</footer>
</body>