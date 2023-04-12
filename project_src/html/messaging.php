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

	<div>
    <h1>Send Message</h1>
    <form  method="post">
      <label for="to_user">To:</label>
      <br>
      <input type="text" name="to_user" id="to_user">
      <br>
      <label for="message_contents">Message:</label>
      <br>
      <textarea name="message_contents" id="message_contents"></textarea>
      <br>
      <input type="submit" value="Send">
    </form>
    <?php
      // Connect to database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hooked_db";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Check if form has been submitted
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user ID of recipient
        $to_user = $_POST["to_user"];
        $query = "SELECT userID FROM User WHERE userName = '$to_user'";
        
        $result = mysqli_query($conn,$query);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $to_user_id = $row["userID"];
        $sender_id = $_SESSION["user"]['userID'];
        $message_contents = $_POST["message_contents"];
        $query = "INSERT INTO Messages (senderID, receiverID, messageContents) VALUES ('$sender_id', '$to_user_id', '$message_contents')";
        if ($conn->query($query) === TRUE) {
        echo "Message sent successfully!";
        
            } else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                }
        } else {
                echo "User not found.";
            }
}
$userID = $_SESSION['user']['userID'];
$sql = "SELECT Messages.messagesID, Messages.senderID, Messages.receiverID, Messages.messageContents, Messages.messageReceipt, User.userName
        FROM Messages
        INNER JOIN User ON Messages.senderID=User.userID
        WHERE Messages.receiverID=$userID
        ORDER BY Messages.messageReceipt DESC
        LIMIT 20";
$result = mysqli_query($conn, $sql);

// check if query was successful
if (!$result) {
  die("Query failed: " . mysqli_error($conn));
}

// display the messages in a table
echo "<h2>Messages Received</h2>";
echo "<table>";
echo "<tr><th>From</th><th>Message</th><th>Date</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
  $senderID = $row['senderID'];
  $senderName = $row['userName'];
  $messageContents = $row['messageContents'];
  $messageReceipt = $row['messageReceipt'];

  echo "<tr><td><a href='view_profile.php?userID=$senderID'>$senderName</a></td><td>$messageContents</td><td>$messageReceipt</td></tr>";
}
echo "</table>";
// Close database connection
$conn->close();
      ?>
	</div>
	<div>
		
		 
	
	
	</div>
</div>



<br><br><br><br><br><br>
</main>


<footer>Copyright &copy; 2023 Hooked<br>
<a href="Hooked@gmail.com">Hooked@gmail.com</a>
</footer>
</body>







