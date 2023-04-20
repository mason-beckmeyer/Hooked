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
<div id="logo"></div>
</header>

<nav>
    
	<ul>

        
		

        
		<li>
            <a href="index.php">Logout</a></li>

	
			<li><a href="calendar.php">Calendar</a></li>
		<li><a href="posts_view.php">Feed</a></li>
		<li><a href="messaging.php">Messaging</a></li>
		<li><a href="design.php">Account</a></li>
        <li><a href="search.php">Search</a></li>
        
        
	</ul>


			

	

</nav>
<main>
<?php
include 'classCalendar.php';
$calendar = new Calendar('2023-04-10');

$calendar->add_event('April fools day', '2023-04-01', 1, 'green');
$calendar->add_event($_POST['name'],$_POST['date'],$_POST['nums'],$_POST['color']);
//header("Refresh:0");
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
		<div>
			<form method = "post">
				<label for="name">
					Event Name:
				</label>
				<input name="name" id="name" type="text">
				<br>
				<label for = "date">
					Date (ex: year-month-day):
				</label>
				<input type="text" id="date" name="date">
				<br>
				<label for = "nums">
					Number of days event occurs:
				</label>
				<input type="number" id="nums"name="nums">
				<br>
				<label for = "color">
					Color:
				</label>
				<input type="text" id ="color"name="color">
				<br>
				<input type="submit" name="submit" id="submit" value="Submit">

			</form>
			
		</div>
	</body>
</html>