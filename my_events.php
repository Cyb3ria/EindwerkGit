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
    
<div class="slideout-menu">
	<h3>Menu <a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="#">My notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Starred Notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="add_event.php">Add Notification <i class="fa fa-angle-right"></i></a></li>
	</ul>
</div>
    
    <div class="header">
	<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i><img id="menu-togglebut" src="img/menu-toggle.png"/></a>

            <a id="logout" href="logout.php">Logout</a>
                <a href="#" id="logoJ">James</a>
</div>
        
        <h1 id="BlueTitle">Mijn event</h1>
	

<div id="myNotifications">
<table id="myEventsTable">
<tr class="mainRow">
<td class="mainCol">Event Title</td>
<td class="mainCol">Event Teaser</td>
<td class="mainCol">Event Link</td>
<td class="mainCol">Active on Beacons</td>
<td class="mainCol">Expiration Date</td>
<td class="mainCol">Preview Picture</td>
</tr>

<?php

$conn = new mysqli("localhost", "root", "azerty", "eindwerk_db");	
while ($row = mysqli_fetch_assoc($arrayNotifications))
	{
	$removable = $row['n_id'];
	echo "<tr>";
	echo "<td>".$row['n_title']."</td>";
	echo "<td>".$row['n_teaser']."</td>";
	echo "<td>".$row['n_link']."</td>";
	echo "<td>".$row['n_beacon']."</td>";
	echo "<td>".$row['n_date']."</td>";
	echo "<td class='eventsPic'><img src='noteimg/".$row['n_foto']."' /></td>";
	echo "<td><button>Edit</button></td>";
	echo "<td><form method='post'><input type='hidden' name='id_to_be_deleted'
								   value='".$removable."' />
   								  <input type='submit' name='delete_row' value='delete' />
				</form></td>";
	echo "</tr>";
	}

if(isset($_POST['delete_row'])) 
{
   $id = $_POST['id_to_be_deleted'];
   if(!mysqli_query($conn, "DELETE FROM notifications WHERE n_id = $id"))
   {
     echo mysqli_error($conn);
   }
}
?>	
</table>
    <br />
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js"type="text/javascript"></script>
    <script src="ajax/ajax.js"type="text/javascript"></script>
    <script type="text/javascript">
$(document).ready(function () {
    $('.slideout-menu-toggle').on('click', function(event){
    	event.preventDefault();
    	// create menu variables
    	var slideoutMenu = $('.slideout-menu');
    	var slideoutMenuWidth = $('.slideout-menu').width();
    	
    	// toggle open class
    	slideoutMenu.toggleClass("open");
    	
    	// slide menu
    	if (slideoutMenu.hasClass("open")) {
	    	slideoutMenu.animate({
		    	left: "0px"
	    	});	
    	} else {
	    	slideoutMenu.animate({
		    	left: -slideoutMenuWidth
	    	}, 250);	
    	}
    });
});
</script>
</html>