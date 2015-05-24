<?php
session_start();
  include("config.php");
  include("Classes/event.class.php");
  
if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}
$event = new Event();
$uid = $_SESSION['u_id'];

  if(!empty($_POST))
  {

    
    $foto = $_FILES["file"]["name"];
    $event->Foto = $foto;
    $tmp_name = $_FILES ['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    if (!empty($foto)) 
    {
      $location = 'noteimg/';
      if  (move_uploaded_file($tmp_name, $location.$foto))
      {
                   
      }
    }
    $event->Title = $_POST['titel'];
    $event->Teaser = $_POST['teaser'];
    $event->Link = $_POST['link'];
    $event->Beacon = $_POST['beacon0'];
    $event->EndDate = $_POST['enddate'];
    $event->save($uid);

  }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Add event</title>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

<body>

    <div id="container">
<div class="slideout-menu">
	<h3>Menu <a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="#">My notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Starred Notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Add Notification <i class="fa fa-angle-right"></i></a></li>
	</ul>
</div>
    
    <div class="header">
	<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i><img id="menu-togglebut" src="img/menu-toggle.png"/></a>

            <a id="logout" href="logout.php">Logout</a>
                <a href="#" id="logoJ">James</a>
</div>
        
        <h1 id="BlueTitle">Add event</h1>
    

        <form id="addeventform" action="" method="POST" enctype="multipart/form-data">
            <?php if(isset($message)) { echo "<div id='errormessage'>" . $message . "</div>"; } ?>
            <label for="titel">Titel</label>
            <input type="text" id="titel" required="required" name="titel" placeholder="Mijn Event">

            <label for="teaser">Teaser</label>
            <textarea type="text" id="teaser" required="required" name="teaser" placeholder="Mijn event ..."></textarea>

            <label for="link">Link</label>
            <input type="text" id="link" required="required" name="link" placeholder="mijnevent.com/event">
            
            <label for="file">Foto</label>
            <input type="file" name="file" id="file" >

            <label for="beacon">Beacon</label>

            <div id="beaconsdiv">
            <input class="beacon" type="text" id="beacon0" required="required" name="beacon0" placeholder="Beacon Refter">

            </div>
            <div id="addbeacon">
                <button class="btn btn-add" id="addbeaconbtn">Voeg een beacon toe</button>
            </div>
            <div id="removebeacon">
                <button class="btn btn-remove removebeaconbtn" id="removebeaconbtn">Verwijder Beacon</button>
                <style type="text/css">

                </style>
            </div>
 
            <label for="enddate">Eind Datum</label>

            <input type="date" id="enddate" required="required" name="enddate">


            <div id="submitknop">
                <button type="submit" id="submitEvent" class="btn btn-default">Done</button>
            </div>
        </form>
    </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js"type="text/javascript"></script>
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