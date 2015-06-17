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
    
    	<title>James | <?= $EventTitle; ?></title>
    
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link rel="icon" href="img/JamesIcon.ico" type="image/ico" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />
    <meta name="author" content="Joren Polfliet & Nicolas Decroos">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/mediaq.css"/>
</head>
<body id="SpecBod">
    
    <wrapper id="SpecWrap">

        <img id="BackButton" src="img/arrowB.png" onclick="goBack()"></img>

    <div id="Spcontent">
    
        <h1 id="eventTitel"><?= $EventTitle; ?></h1>
        <div id="eventIconsDiv">
        <span class="eventIcons"><img src="img/loc.png"><h2>&#64;<?= $session; ?></h2></span>
        <div class="clearfix"></div>
        <span class="eventIcons"><img class="imageSP" src="img/date.png"><h2><?= $EventDate; ?></h2></span>
                <div class="clearfix"></div>
        <?php
            echo ' <span class="eventIcons"><img src="img/starSP.png"><h2 >'.$TotalFavs.' Like(s)</h2></span></div>';
        ?>        <div class="clearfix"></div>
        <p id="eventText"><?= $EventTeaser; ?></p>

        <a id="eventLink" href="http://<?= $_SESSION['n_link']; ?>">Meer informatie</a>


        
    </div>
    </wrapper>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script>
function goBack() {
    window.history.back();
}
</script>
</html>
