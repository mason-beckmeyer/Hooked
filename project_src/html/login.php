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




			

	

</nav>
<main>
<header>
	
	<br><br>

	<h2>Sign In</h2>

	
</header>
	<p>Get Hooked In To CNU!</p>


<div id="tablefont">

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
    <a href = "calendar.php"><button type="submit" value="submit">Login</button></a>
    <br>
    <a href="create_acct.php">Don't have an account?</a>
    <br>
    <button type="button">Forgot Password</button>

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
$servername = "localhost";
$username = "username";
$password = "password";
$hooked_db = "hooked_db";
$conn = new mysqli($servername,$username,$password,$hooked_db);

if ($conn -> connect_error){
    die("Connection failed". $conn -> connect_error);
}

$email = $_POST['eml'];
$password = $_POST['psswd'];

$sql = $conn -> query("SELECT userID,userEmail,userPassword,userBio,isAlumni,isCompany,isStudent,isFaculty FROM User WHERE userEmail = $email,userPassword = $password");

if(!$sql){
    throw new UnexpectedValueException;

}

else{
    $result = $sql;

    $row = $result -> fetch_assoc();
    
    $user = new Users($row['userName'],$row['userEmail'],$row['userPassword'],$row['userBio'],$row['isAlumni'],$row['isStudent'],$row['isCompany'],$row['isFaculty']);

    $_SESSION['user'] = $user;


}


$conn -> close();
?>

</html>