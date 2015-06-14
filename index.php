<?php
session_start();
  include("classes/event.class.php");

$m = new Event();
$arrayAllEvents = $m->getAll();
$arrayFavorites = $m->getFavo();

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}

  $db = new db();
  
  while ($row = mysqli_fetch_assoc($arrayFavorites))
  {
  $unfavoriteID = $row['f_id'];
  $uid = $_SESSION['u_id'];
  }

  while ($row = mysqli_fetch_assoc($arrayAllEvents))
  {
  $uid = $_SESSION['u_id'];
  }

if(isset($_POST['favorite_row'])) 
{
   $Fid = $_POST['id_to_be_favo'];
   if(!mysqli_query($db->conn, "INSERT INTO favorites (u_id, n_id, f_boolean) VALUES
        ('". $db->conn->real_escape_string($uid) ."' ,
        '". $db->conn->real_escape_string($Fid) ."' ,
        '". $db->conn->real_escape_string("1") ."')"))
   {
     echo mysqli_error($db->conn);
   }
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

<h1 id="BlueTitle">All Events</h1>
<div id="notesPrint">
<?php
  foreach($arrayFavorites as $f) 
  {?>
    <div class="SingleNote">
      <a class = "titleNote" 
         
         data-title="<?= $f['n_title'];?>" 
         data-beacon="<?= $f['n_beacon'];?>" 
         data-teaser="<?= $f['n_teaser'];?>" 
         data-link="<?= $f['n_link'];?>" 
         data-date="<?= $f['n_date'];?>" 
         
         href="#">
         <?php echo "<div class='event-".$f['n_type']."'>";
         echo $f['n_type'];
         echo "</div>";
         ?>

         <h4 class="titleNote"><?= $f['n_title']?></h4>
      </a>
      <h4 class="teaserNote"><?= $f['n_beacon']?> | <?= $f['n_date']?></h4>

  <?php
    echo "<form method='post'>
          <input type ='hidden' name='id_to_be_unfavo'
          value='".$f['f_id']."' />
          <input type='submit' class='favoriteTrue' id='FavoBtn' name='unfavorite_row' value='favorite' />
          </form>
          
          <div class='clearfix'> </div>";       
  ?>
    </div>
    <div class = "lijn">lijn</div>
  <?php 
  }?> 
</div>
<div id="notesPrint">
<?php
	foreach($arrayAllEvents as $a) 
  {?>
		<div class="SingleNote">
      <a class = "titleNote" 
         
         data-title="<?= $a['n_title'];?>" 
         data-beacon="<?= $a['n_beacon'];?>" 
         data-teaser="<?= $a['n_teaser'];?>" 
         data-link="<?= $a['n_link'];?>" 
         data-date="<?= $a['n_date'];?>" 
         
         href="#">
        <?php echo "<div class='event-".$a['n_type']."'>";
         echo $a['n_type'];
         echo "</div>";
         ?>
         <h4 class="titleNote"><?= $a['n_title']?></h4>
      </a>
        <h4 class="teaserNote"><?= $a['n_beacon']?> | <?= $a['n_date']?></h4>
  <?php
    echo "<form method='post'>
          <input type ='hidden' name='id_to_be_favo'
          value='".$a['n_id']."' />
          <input type='submit' class='favoriteFalse' id='FavoBtn' name='favorite_row' value='favorite' />
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