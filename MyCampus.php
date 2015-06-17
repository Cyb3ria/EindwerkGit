<?php
session_start();
  include("classes/event.class.php");
include("classes/users.class.php");

$m = new Event();

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}
$uid = $_SESSION['u_id'];
$u = new user();

$arrayUser = $u->userDetails($uid);

while ($row = mysqli_fetch_assoc($arrayUser))
{
  $campus = $row['u_campus'];
}

if ($campus == "kt")
{
$arrayAllEvents = $m->showCampusKT($uid);
}else{
$arrayAllEvents = $m->showCampusDV($uid);	
}

$arrayFavorites = $m->getFavo();

while ($row = mysqli_fetch_assoc($arrayFavorites))
{
  $unfavoriteID = $row['f_id'];
  $uid = $_SESSION['u_id'];
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
<body>
    <?php include_once("navheader.include.php"); ?>

<h1 id="BlueTitle">My Campus</h1>
<div id="notesPrint">

<?php
  foreach($arrayFavorites as $f) 
  {
    $NoteId = $f['n_id'];
    $TotalFavs = $m->totalfavorites($NoteId);
    echo "<div class='SingleNote'>";
    echo "<a class = 'titleNote' href='specificEvent.php?n_id=".$f['n_id']."'>";
    echo "<div class='event-".$f['n_type']."'>";
    echo $f['n_type'];
    echo "</div>";
?>
    <div class="notesDiv">
    <h4 class="titleNote"><?= $f['n_title']?></h4>
    </a>
    <h4 class="teaserNote"><?= $f['n_beacon']?></h4>
<p class="likes"><?= $TotalFavs ?> Like(s)</p>
</div>
<?php
    echo "<form class='sterForm' method='post'>
          <input type ='hidden' name='id_to_be_unfavo' value='".$f['f_id']."' />
          <input type='submit' class='favoriteTrue' data='".$f['n_id']."' data-user ='".$uid."' id='FavoBtn' name='unfavorite_row' value='favorite' />
          </form>
          <div class='clearfix'> </div>";       
?>

<div class = "lijn">lijn</div>
    </div>
<?php 
}
?> 
</div>
<div id="notesPrint">
<?php
foreach($arrayAllEvents as $a) 
  {
    $NoteId = $a['n_id'];
    $TotalFavs = $m->totalfavorites($NoteId);
		echo "<div class='SingleNote'>";
    echo "<a class ='titleNote' href='specificEvent.php?n_id=".$a['n_id']."'' >";
    echo "<div class='event-".$a['n_type']."'>";
    echo $a['n_type'];
    echo "</div>";
?>
    <div class="notesDiv">
    <h4 class="titleNote"><?= $a['n_title']?></h4>
    </a>
    <h4 class="teaserNote"><?= $a['n_beacon']?></h4>
<p class="likes"><?= $TotalFavs ?> Like(s)</p>
</div>
    
    
<?php
    echo "<form class='sterForm' method='post'>
          <input type ='hidden' class='tempidF' name='id_to_be_favo'
          value='".$a['n_id']."' />
          <input type='submit' class='favoriteFalse' data='".$a['n_id']."' data-user ='".$uid."'id='FavoBtn' name='favorite_row' value='favorite' />
          </form> 
          <div class='clearfix'> </div>";       
?>
<div class = "lijn">lijn</div>
</div>

<?php 
  }
?> 
</div>  
</body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="js/menu.js" type="text/javascript"></script>
    <script src="ajax/ajax.js" type="text/javascript"></script>
</html>