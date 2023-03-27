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
<header>
	
	<br><br>

	<h2>Sign In</h2>

	
</header>
	<p>Get Hooked In To CNU!</p>


<div id="tablefont">
<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<label for="eml">
        Email:
    </label>
    <br>
    <input name="eml" type="email" id="eml">
    <br>
    <br>
    <label for="psswd">
        Password:
    </label>
    <br>
    <input name="psswd" type="password" id="psswd">
    <br><br>
    <input type="submit" value="Login" name="login">
    
    
    <br>
    <a href="create_acct.php">Don't have an account?</a>
    <br>
    <button >Forgot Password</button>
</form>
<!-- <label for="myEmail"> E-mail:       </label><input type="email" id="myEmail" name="myEmail" required="required">
<br><br>
<label for="oNumber"> Password: </label><input type="text" id="pword" name="pword" required="required">
<br><br>
<!-- <label for="oNumber"> Confirm Password: </label><input type="text" id="pword2" name="ppword2" required="required"> -->

<!-- <br>
-->




</div>

<br><br><br><br><br><br>
</main>

<footer>Copyright &copy; 2023 Hooked<br>
<a href="Hooked@gmail.com">Hooked@gmail.com</a>
</footer>
</body>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$hooked_db = "hooked_db";

// Establish connection
$conn = mysqli_connect($servername, $username, $password, $hooked_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if email and password match with database
    $sql = "SELECT * FROM User WHERE userEmail='$email' AND userPassword='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        $user = mysqli_fetch_assoc($result);

        // Store user data in session
        $_SESSION["user"] = $user;

        // Redirect to homepage or dashboard
        header("Location: design.php");
        exit();
    } else {
        // Login failed
        $login_error = "Invalid email or password";
    }
}

// Close database connection
mysqli_close($conn);
?>

</html>