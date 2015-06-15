<?php
session_start();

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    
    	<title>James | Index</title>
    
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
            <link rel="icon" href="img/JamesIcon.ico" type="image/ico" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />
    <meta name="author" content="Joren Polfliet & Nicolas Decroos">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
        <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body id="aboutBody">
    <div id="oranjeDiv">
<div class="slideout-menu">
	<h3>James <a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="index.php">Home <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Starred Notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Upcoming Events <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Administration <i class="fa fa-angle-right"></i></a></li>
	</ul>

</div>
        <a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i><img id="menu-togglebut" src="img/menu-toggle.png"/></a>
    
    <h1 id="titleAbout">James</h1>
    <img id="jamesImg" src="img/James-illustration2.png"></img>
 </div>
    <h2 id="early">Early Access</h2>
    <p>The 'James' project wants to make sure that students get important information they might potentially miss in a fun and effective way. The students will arrive at their campus and get notifications of information and events. This early build of the application wants to give the users an idea of how powerful the new iBeacon technology can be. </p>
        <h2 id="by">by Joren Polfliet &amp; Nicolas Decroos</h2>
    <h3 id="TM">Project in association with</h3>
    <img id="TMlogo" src="img/thomasMore_logo.png"></img>
</body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="js/menu.js" type="text/javascript"></script>
    <script src="ajax/ajax.js" type="text/javascript"></script>
</html>