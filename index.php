<?php
session_start();
  include("config.php");
  include("Classes/event.class.php");
$m = new Event();
$arrayAllEvents = $m->getAll();
$arrayFavorites = $m->getFavo();

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}

  $conn = new mysqli("localhost", "root", "azerty", "eindwerk_db");
  
  while ($row = mysqli_fetch_assoc($arrayFavorites))
  {
  $unfavoriteID = $row['f_id'];
  $uid = $_SESSION['u_id'];
  }
  
  if(isset($_POST['unfavorite_row'])) 
  {
    $unfavoID = $_POST['id_to_be_unfavo'];
    if(!mysqli_query($conn, "DELETE FROM favorites WHERE f_id ='".$unfavoID."'"))
    {
      echo mysqli_error($conn);
    }
  }

  while ($row = mysqli_fetch_assoc($arrayAllEvents))
  {
  $favoriteID = $row['n_id'];
  $uid = $_SESSION['u_id'];
  }

if(isset($_POST['favorite_row'])) 
{
   $Fid = $_POST['id_to_be_favo'];
   if(!mysqli_query($conn, "INSERT INTO favorites (u_id, n_id, f_boolean) VALUES
        ('". $conn->real_escape_string($uid) ."' ,
        '". $conn->real_escape_string($favoriteID) ."' ,
        '". $conn->real_escape_string("1") ."')"))
   {
     echo mysqli_error($conn);
   }
}					



?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="slideout-menu">
	<h3>Menu <a href="#" class="slideout-menu-toggle">&times;</a></h3>
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
	foreach($arrayAllEvents as $a) 
  { ?>
		<div class="SingleNote">
      <a class = "titleNote" href="<?= $a['n_link']?>"><h4 class="titleNote"><?= $a['n_title']?></h4></a>
		  <h4 class="teaserNote"><?= $a['n_beacon']?></h4>
      <h4 class="datenote"><?= $a['n_date']?></h4>
      <?php
      echo "<form method='post'>
            <input type ='hidden' name='id_to_be_favo'
            value='".$favoriteID."' />
            <input type='submit' class='favoriteFalse' id='FavoBtn' name='favorite_row' value='favorite' />
            </form>"
      ?>
    </div>
    <div class = "lijn">lijn</div>
	<?php 
  }?> 
</div>  
    

</body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
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