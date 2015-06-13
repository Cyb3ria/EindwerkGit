<?php
session_start();
    include("classes/event.class.php");

    if(!isset($_SESSION['loggedin']))
    {
        header('location: login.php');
    }

    $session = $_SESSION['n_beacon'];

if($session == 'Creativity Gym')
{
    echo "<style type='text/css'>
    #SpecWrap
    {    
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(img/gym.jpg);
    }</style>";
}
else if ($session == 'Campus KruidTuin')
{
    echo "<style type='text/css'>
    #SpecWrap
    {    
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(img/kruidtuin.jpg);
    }</style>";
}

else if ($session == 'STIP')
{
    echo "<style type='text/css'>
    #SpecWrap
    {    
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(img/stip.jpg);
    }</style>";
}

else if ($session == 'Bibliotheek')
{
    echo "<style type='text/css'>
    #SpecWrap
    {    
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(img/bibl.jpg);
    }</style>";
}

else if ($session == 'Cafetaria KruidTuin')
{
    echo "<style type='text/css'>
    #SpecWrap
    {    
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(img/refterKT.jpg);
    }</style>";
}

else if ($session == 'Campus De Vest')
{
    echo "<style type='text/css'>
    #SpecWrap
    {    
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(img/vest.jpg);
    }</style>";
}

else if ($session == 'International Office<')
{
    echo "<style type='text/css'>
    #SpecWrap
    {    
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(img/InterOf.jpg);
    }</style>";
}

else if ($session == 'Cafetaria De Vest')
{
    echo "<style type='text/css'>
    #SpecWrap
    {    
    background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(img/cafDV.jpg);
    }</style>";
}


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    
    	<title>James | My Events</title>
    
            <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link rel="icon" href="img/JamesIcon.ico" type="image/ico" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />
    <meta name="author" content="Joren Polfliet & Nicolas Decroos">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body id="SpecBod">
    
    <wrapper id="SpecWrap">
    
<div class="slideout-menu">
	<h3>James<a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="index.php">My notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Starred Notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="add_event.php">Add Notification <i class="fa fa-angle-right"></i></a></li>
	</ul>
</div>
    
    <div class="header">
	<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i><img id="menu-togglebut" src="img/menu-toggle.png"/></a>

            <a id="logout" href="logout.php">Logout</a>
                <a href="#" id="logoJ">James</a>
</div>
        
        <h1 id="BlueTitle">Event Info</h1>
    
    <div id="Spcontent">
    
        <h1 id="eventTitel"><?= $_SESSION['n_title']; ?></h1>
        <h2 id="atLoc">&#64;<?= $_SESSION['n_beacon']; ?> // <?= $_SESSION['n_date']; ?></h2>
        <p id="eventText"><?= $_SESSION['n_teaser']; ?></p>
        <a id="eventLink" href="http://<?= $_SESSION['n_link']; ?>">Meer informatie</a>


        
    </div>
    </wrapper>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>

</html>