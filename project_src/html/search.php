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
	<h1>Search</h1>
	<form method="post" action="">
		<label for="search">Search:</label>
		<input type="text" id="search" name="search" placeholder="Enter keywords">
		<button type="submit">Search</button>
	</form>
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
if (isset($_POST['search'])) {
    // Get search term from form input
    $searchTerm = $_POST['search'];
    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hooked_db";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Query database for matching users
    $sql = "SELECT * FROM User WHERE userName LIKE '%" . $searchTerm . "%' OR userBio LIKE '%" . $searchTerm . "%'";
    $result = mysqli_query($conn, $sql);
    // Display search results
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Search Results:</h2>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p><a href='other_accounts.php?id=" . $row["userID"] . "'>" . $row["userName"] ."</a><br>".$row['userBio']."</p>";
        }
    } else {
        echo "<p>No results found.</p>";
    }
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