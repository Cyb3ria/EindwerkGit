<?php
session_start();
include("classes/beacon.class.php");

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}
$b = new Beacon();
$arrayBeacons = $b->getAll();
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
<body>
    
    <?php include_once("navheader.include.php"); ?>
        
        <h1 id="BlueTitle">All Beacons</h1>
	
<div id="notesPrint">
<?php
	foreach($arrayBeacons as $a) 
  { 
  	?>
		<div class="SingleNote">
		<h4 class="titleNote"><?= $a['n_beacon']?></h4>
      	<h4 class="likes">Major ID: <?= $a['b_major']?></h4>
      	<h4 class="likes">Minor ID: <?= $a['b_minor']?></h4>
        <a id="deleteKnop" href="#" data="<?= $a['b_id']?>" class="deleteBeacons" title="delete" >Verwijder</a>
    </div>
    
    <div class = "lijn">lijn</div>
	<?php 
  }?> 
</div>  
    

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>

</html>