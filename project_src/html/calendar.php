<!DOCTYPE html>
<html>
<head>
	<title>PHP Calendar</title>
</head>
<body>
	<h2>PHP Calendar</h2>
	<form method="post" action="">
		<label for="year">Select Year:</label>
		<select id="year" name="year">
			<?php
				for ($i = 2022; $i <= 2025; $i++) {
					echo "<option value='$i'>$i</option>";
				}
			?>
		</select>
		<label for="month">Select Month:</label>
		<select id="month" name="month">
			<?php
				for ($i = 1; $i <= 12; $i++) {
					$month = date("F", mktime(0, 0, 0, $i, 1, 2022));
					echo "<option value='$i'>$month</option>";
				}
			?>
		</select>
		<input type="submit" name="submit" value="Submit">
	</form>
	<?php
		if(isset($_POST['submit'])) {
			$year = $_POST['year'];
			$month = $_POST['month'];
			$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
			$first_day = date("N", mktime(0, 0, 0, $month, 1, $year));
			?>
			<table border="1">
				<tr>
					<th>Sun</th>
					<th>Mon</th>
					<th>Tue</th>
					<th>Wed</th>
					<th>Thu</th>
					<th>Fri</th>
					<th>Sat</th>
				</tr>
				<tr>
					<?php
						$day = 1;
						for ($i = 1; $i < $first_day; $i++) {
							echo "<td></td>";
							$day++;
						}
						for ($i = 1; $i <= $days_in_month; $i++) {
							if ($day == 8) {
								echo "</tr><tr>";
								$day = 1;
							}
							echo "<td>$i</td>";
							$day++;
						}
						for ($i = $day; $i <= 7; $i++) {
							echo "<td></td>";
						}
					?>
				</tr>
			</table>
			<?php
		}
	?>
</body>
</html>
