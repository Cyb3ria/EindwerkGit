<?php
session_start();
include("config.php");
include("Classes/event.class.php");

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}

$event = new Event();
$arrayNotifications = $event->getMine();
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	
<p> My events </p>

<div id="myNotifications">
<table id="myEventsTable">
<tr class="mainRow">
<td class="mainCol">Event Title</td>
<td class="mainCol">Event Teaser</td>
<td class="mainCol">Event Link</td>
<td class="mainCol">Active on Beacons</td>
<td class="mainCol">Preview Picture</td>
</tr>

<?php
	
	while ($row = mysqli_fetch_assoc($arrayNotifications))
	{
	echo "<tr>";
	echo "<td>".$row['n_title']."</td>";
	echo "<td>".$row['n_teaser']."</td>";
	echo "<td>".$row['n_link']."</td>";
	echo "<td>".$row['n_beacon']."</td>";
	echo "<td class='eventsPic'><img src='noteimg/".$row['n_foto']."' /></td>";
	echo "</tr>";

	
	}
?>	
</table>
    <br />
    <a href="indexadmin.php">Go back to admin index</a>
</body>
</html>