<?php
//Session start
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
                                <div id="logo"> </div>
</header>

<nav>
    
	<ul>
       

		<li><a href="index.php">Home</a></li>
	
		<li><a href="calendar.php">Calendar</a></li>
		<li><a href="about.php">Feed</a></li>
		<li><a href="contact.php">Messaging</a></li>
		<li><a href="design.php">Account</a></li>
	</ul>


			

	

</nav>
<main>
<header>
	
	<br><br>

	<h2>Create Account</h2>

	
</header>
	<p>Get Hooked In To CNU!</p>


<div id="tablefont">
<form method="post">
<label for="eml">
        Email:
    </label>
    <br>
    <input name="eml" type="text" id="eml">
    <br>
    
    <label for="psswd">
        Password:
    </label>
    <br>
    <input name="psswd" type="text" id="psswd">
    
    <br>
    <label for="usrnm">
        Username:
    </label>
    <br>
    <input name="usrnm" type="text" id="usrnm">
    <br>
    <label>
        Bio:
    </label>
    <br>
    <input name="bio" type="text" id="bio">
    <br>
    <label>
        Type of Account:
    </label>
    <br>
    <input type="radio" name="isAlumni" id="isAlumni" value="false">
    <label for="isAlumni">
        Alumni
    </label>
    <input type="radio" name="isStudent" id="isStudent" value="false">
    <label for="isStudent">
        Student
    </label>
    <input type="radio" name="isCompany" id="isCompany" value="false">
    <label for="isCompany">
        Company
    </label>
    <br>
    <input type="radio" name="isFaculty" id="isFaculty" value="false">
    <label for="isFaculty">
        Faculty
    </label>
    <br>

    <input type="submit" value="submit" name="submit">
    <br>
    <button type="button">Have an Account?</button>
    <br>
    <button type="button">Forgot Password</button>

</form>

<!-- <label for="myEmail"> E-mail:       </label><input type="email" id="myEmail" name="myEmail" required="required">
<br><br>
<label for="oNumber"> Password: </label><input type="text" id="pword" name="pword" required="required">
<br><br>
<!-- <label for="oNumber"> Confirm Password: </label><input type="text" id="pword2" name="ppword2" required="required"> -->

<!-- <br>
-->


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
//Variables for sql insert
$email = $_POST['eml'];
$password = $_POST['psswd'];
$username = $_POST['usrnm'];
$userBio = $_POST['bio'];
echo "This is post sql variable";
//Checks if form is submitted (not necessary)
// if(isset($_POST['submit'])){
//     //Turns radio values into booleans to use later
    
//     $isAlumni = $_POST['isAlumni'] = $_POST['isAlumni'] == 'true' ? true:false;
//     $isStudent = $_POST['isStudent'] = $_POST['isStudent'] == 'true' ? true:false;
//     $isCompany = $_POST['isCompany'] = $_POST['isCompany'] == 'true' ? true:false;
//     $isFaculty = $_POST['isFaculty'] = $_POST['isFaculty'] == 'true' ? true:false;

// }
echo "This broke";
/*

$email = $_POST['eml'];
$password = $_POST['psswd'];
$isStudent = $_POST['isStudent'] == 'true' ? 1 : 0;
$username = $_POST['usrnm'];
$userBio = $_POST['bio'];

$sql = "INSERT INTO User (userEmail, userPassword, isStudent, userName, userBio) 
        VALUES ('$email', '$password', $isStudent, '$username', '$userBio')";

$result = mysqli_query($conn, $sql);

if ($result) {
    // row inserted successfully
} else {
    // error occurred
}




*/

    //$sql = "INSERT INTO User (userEmail,userPassword,userBio) VALUES ($email,$password,$userBio)";
    echo "WOMP";
    echo "INSERT INTO User (userID,userName,userEmail,userPassword,userBio) VALUES (1,$email,$email,$password,$userBio)";
    
    $sql = "INSERT INTO User (userID,userName,userEmail,userPassword,userBio) VALUES (2,$email,$email,$password,$userBio)";
    
    $conn -> query($sql);
    //$result =  $conn -> query($sql);
    
    echo "WOOP";
    if($result){
        //Creates session variable of new user after it is added to database
        //Also has exceptions to help with debugging later
        $_SESSION['user'] = new Users($username,$email,$password,$userBio,$isAlumni,$isStudent,$isCompany,$isFaculty);
    }
    else{
        echo "Invalid value or other database conn error";
        throw new Exception("Invalid value or other database issue");
    }





$conn -> close();
?>

</div>

<br><br><br><br><br><br>
</main>

<footer>Copyright &copy; 2023 Hooked<br>
<a href="Hooked@gmail.com">Hooked@gmail.com</a>
</footer>
</body>

</html>