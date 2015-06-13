<?php
session_start();
  include("classes/event.class.php");

$event = new Event();
$db = new db();
$arrayFavo= $event->getFavo();

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}

if(isset($_POST['Unfavorite_row'])) 
{
	$unFid = $_POST['id_to_be_unfavo'];
    if(!mysqli_query($db->conn, "DELETE FROM favorites WHERE f_id ='".$unFid."'"))
    {
      echo mysqli_error($db);
    }
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
<div class="slideout-menu">
	<h3>James <a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Starred Notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Upcoming Events <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Administration <i class="fa fa-angle-right"></i></a></li>
	</ul>
</div>
    
    <div class="header">
	<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i><img id="menu-togglebut" src="img/menu-toggle.png"/></a>
            <a id="logout" href="logout.php">Logout</a>
                        <a href="#" id="logoJ">James</a>
</div>

<h1 id="BlueTitle">Dashboard</h1>

<div id="notesPrint">
<?php
	foreach($arrayFavo as $a) 
  	{
?>
	<div class="SingleNote">
      <a class = "titleNote" 
         
         data-title="<?= $a['n_title'];?>" 
         data-beacon="<?= $a['n_beacon'];?>" 
         data-teaser="<?= $a['n_teaser'];?>" 
         data-link="<?= $a['n_link'];?>" 
         data-date="<?= $a['n_date'];?>" 
         
         href="#">
         <h4 class="titleNote"><?= $a['n_title']?></h4>
      </a>
		  <h4 class="teaserNote"><?= $a['n_teaser']?></h4>
      <h4 class="datenote"><?= $a['n_date']?></h4>
<?php
    echo "<form method='post'>
          <input type ='hidden' name='id_to_be_unfavo'
          value='".$a['f_id']."' />
          <input type='submit' class='favoriteTrue' id='UnFavoBtn' name='Unfavorite_row' value='unfavorite' />
          </form>
          
          <div class='clearfix'> </div>";       
  ?>
    </div>
    <div class = "lijn">lijn</div>
	<?php 
  }?> 
</div>  
    

</body>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="js/menu.js" type="text/javascript"></script>
    <script src="ajax/ajax.js" type="text/javascript"></script>
</html>