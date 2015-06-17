<?php
session_start();
  include("classes/beacon.class.php");
  
if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}
$beacon = new Beacon();

  if(!empty($_POST))
  {
    $beacon->Name = $_POST['name'];
    $beacon->Major = $_POST['major'];
    $beacon->Minor = $_POST['minor'];

    $beacon->save();

  }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    	<title>James | Add Beacon</title>
    
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
            <link rel="icon" href="img/JamesIcon.ico" type="image/ico" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />
    <meta name="author" content="Joren Polfliet & Nicolas Decroos">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
        <link rel="stylesheet" type="text/css" href="css/reset.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/mediaq.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

<body id="containerAddE">

    <div id="container">

    <?php include_once("navheader.include.php"); ?>
             
        <h1 id="BlueTitle">Add beacon</h1>
    

        <form id="addeventform" action="beacons.php" method="POST" enctype="multipart/form-data">
            <?php if(isset($message)) { echo "<div id='errormessage'>" . $message . "</div>"; } ?>

            <label for="beacon">Zone</label>

            <div id="beaconsdiv">
                
                <select id="beacon0" name="name" required="required" selected="Pick A Zone">

                    <optgroup label="Campus Kruidtuin">
                    <option class="sub-item" value="Campus Kruidtuin">Campus Kruidtuin</option>
                    <option class="sub-item" value="Creativity Gym">Creativity Gym</option>
                    <option class="sub-item" value="STIP">STIP</option>
                    <option class="sub-item" value="Cafetaria KruidTuin">Cafetaria</option>
                    </optgroup>

                    <optgroup label="Campus De Vest">
                    <option class="sub-item" value="Campus De Vest">Campus De Vest</option>
                    <option class="sub-item" value="International Office">International Office</option>
                    <option class="sub-item" value="Cafetaria De Vest">Cafetaria</option>
                    <option class="sub-item" value="Bibliotheek">Bibliotheek</option>
                    </optgroup>
                </select>
                
                <label for="major">Major ID</label>
            <input type="text" id="major" required="required" name="major" placeholder="15">
                
                <label for="minor">Minor ID</label>
            <input type="text" id="minor" required="required" name="minor" placeholder="4567">

            <div id="submitknop">
                <button type="submit" id="submitEvent" class="btn btn-default">Done</button>
            </div>
        </form>
    </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
</html>