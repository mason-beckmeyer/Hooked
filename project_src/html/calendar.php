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
<?php
include 'classCalendar.php';
$calendar = new Calendar('2021-02-02');

echo $calendar->add_event('Pizza My Mind', '2021-02-03', 1, 'green');
$calendar->add_event('Resume Workshop', '2021-02-04', 1, 'red');
$calendar->add_event('Spring Break', '2021-02-16', 7);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
		<link href="style.css" rel="stylesheet">
		<link href="calendar.css" rel="stylesheet">
  
	</head>
	<body>
	    <!-- <nav class="navtop">
	    	<div>
	    		<h2>Event Calendar</h2>
	    	</div>
	    </nav> -->
		<div class="content home">
			<?=$calendar?>
		</div>
	</body>
</html>