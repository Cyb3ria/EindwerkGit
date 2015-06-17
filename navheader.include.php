<?php
include_once("classes/users.class.php");
session_start();


$uid = $_SESSION['u_id'];
$u = new user();

$arrayUser = $u->userDetails($uid);

while ($row = mysqli_fetch_assoc($arrayUser))
{
  $group = $row['u_group'];
}

if($group == 'admin')
{
echo "<div class='slideout-menu'>";
echo "<h3>James<a href='my_events.php' class='slideout-menu-toggle'>&times;</a></h3>";
echo "<ul>";
echo "<li><a href='index.php'>Home <i class='fa fa-angle-right'></i></a></li>";
echo "<li><a href='my_events.php'>My Notifications<i class='fa fa-angle-right'></i></a></li>";
echo "<li><a href='beacons.php'>Beacon List<i class='fa fa-angle-right'></i></a></li>";
echo "<li><a href='add_event.php'>Add Notification<i class='fa fa-angle-right'></i></a></li>";
echo "<li><a href='addBeacon.php'>Add Beacon<i class='fa fa-angle-right'></i></a></li>";
echo "<li><a href='aboutJamesAdmin.php'>About<i class='fa fa-angle-right'></i></a></li>";
echo "</ul>";
echo "</div>";
echo "<div class='header'>";
echo "<a href='#' class='slideout-menu-toggle'><i class='fa fa-bars'></i><img id='menu-togglebut' src='img/menu-toggle.png'/></a>";
echo "<a id='logout' href='logout.php'>Logout</a>";
echo "<a href='my_events.php' id='logoJ'>James</a>";
echo "</div>";
}

if($group == 'student')
{
echo "<div class='slideout-menu'>";
echo "<h3>James<a href='my_events.php' class='slideout-menu-toggle'>&times;</a></h3>";
echo "<ul>";
echo "<li><a href='index.php'>Home <i class='fa fa-angle-right'></i></a></li>";
echo "<li><a href='MyCampus.php'>My Campus<i class='fa fa-angle-right'></i></a></li>";
echo "<li><a href='aboutJames.php'>About List<i class='fa fa-angle-right'></i></a></li>";
echo "</ul>";
echo "</div>";
echo "<div class='header'>";
echo "<a href='#' class='slideout-menu-toggle'><i class='fa fa-bars'></i><img id='menu-togglebut' src='img/menu-toggle.png'/></a>";
echo "<a id='logout' href='logout.php'>Logout</a>";
echo "<a href='my_events.php' id='logoJ'>James</a>";
echo "</div>";
}
?>