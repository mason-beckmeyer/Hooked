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
if (isset($_GET['userID'])) {
    // Get user ID from URL parameter
    $userID = $_GET['userID'];




$sql = "SELECT * FROM User WHERE userID=" . $userID;
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<h1>" . $row["userName"] . "</h1>";
    echo "<p>" . $row["userBio"] . "</p>";
    if ($row["isStudent"]) {
        echo "<p>Student</p>";
    }
    if ($row["isFaculty"]) {
        echo "<p>Faculty</p>";
    }
    if ($row["isAlumni"]) {
        echo "<p>Alumni</p>";
    }
    if ($row["isCompany"]) {
        echo "<p>Company</p>";
    }
} else {
    echo "<p>User not found.</p>";
}
mysqli_close($conn);
} else {
echo "<p>No user selected.</p>";
}






?>
	
		<h1>
			Posts
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

		
		$userID = $_GET['userID'];
		$sql = "SELECT * FROM Post WHERE User_userID = $userID";
		$result = mysqli_query($conn, $sql);
		
		
		if($result){
			while ($row = mysqli_fetch_assoc($result)) {
			echo "<div>";
			echo "<p>" . $row['postText'] . "</p>";
			if ($row['postPicURL'] != null) {
				echo "<p'" . $row['postPicURL'] . "'>";
			}
			echo "<p>" . $row['dateOfPost'] . "</p>";
			echo "</div>";
		}
		}
		

		?>
	
	
	</div>
</div>



<br><br><br><br><br><br>
</main>


<footer>Copyright &copy; 2023 Hooked<br>
<a href="Hooked@gmail.com">Hooked@gmail.com</a>
</footer>
</body>







