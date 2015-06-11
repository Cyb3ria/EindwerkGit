<?php
session_start();
  include("classes/event.class.php");
  
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
    
    	<title>James | Add Event</title>
    
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />
    <meta name="author" content="Joren Polfliet & Nicolas Decroos">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
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
            
            <label for="file">Picture</label>
            <input type="file" name="file" id="file" >

            <label for="beacon">Beacon</label>

            <div id="beaconsdiv">
            <input class="beacon" type="text" id="beacon0" required="required" name="beacon0" placeholder="Beacon Refter">

            </div>
            <div id="addbeacon">
                <button class="btn btn-add" id="addbeaconbtn">Add Beacon</button>
            </div>
            <div id="removebeacon">
                <button class="btn btn-remove removebeaconbtn" id="removebeaconbtn">Delete Beacon</button>
                <style type="text/css">

                </style>
            </div>
 
            <label for="enddate">End Date</label>

            <input type="date" id="enddate" required="required" name="enddate">


            <div id="submitknop">
                <button type="submit" id="submitEvent" class="btn btn-default">Done</button>
            </div>
        </form>
    </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script type="text/javascript">
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("enddate").setAttribute("min", today);
</script>
</html>