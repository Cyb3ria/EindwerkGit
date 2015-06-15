<?php
	session_start();
	include("classes/event.class.php");
  
	if(!isset($_SESSION['loggedin']))
	{
  		header('location: login.php');
	}
    $event = new event();
	$BcZ = $_GET['n_beacon'];
	$ZoneName = urldecode($BcZ);
	$informationArray = $event->getBeaconEvent($ZoneName);
	while($row = mysqli_fetch_array($informationArray))
	{
		$EventID = $row["n_id"];
		$EventTitle = $row["n_title"];
		$EventTeaser = $row["n_teaser"];
		$EventLink = $row["n_link"];
		$session = $row["n_beacon"];
		$EventDate = $row["n_date"];
	}

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
    <a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i><img id="menu-togglebut" src="img/menu-toggle.png"/></a>
        
        <div class="slideout-menu">
	<h3>James <a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="index.php">Home <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Starred Notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Upcoming Events <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Administration <i class="fa fa-angle-right"></i></a></li>
	</ul>
</div>
    
    <div id="Spcontent">
    
        <h1 id="eventTitel"><?= $EventTitle; ?></h1>
        <h2 id="atLoc">&#64;<?= $session; ?> // <?= $EventDate; ?></h2>
        <p id="eventText"><?= $EventTeaser; ?></p>
        <a target="_blank" id="eventLink" href="http://<?= $_SESSION['n_link']; ?>">Meer informatie</a>


        
    </div>
    </wrapper>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>

</html>
