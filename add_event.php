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
    $event->Title = $_POST['titel'];
    $event->Teaser = $_POST['teaser'];
    $event->Type = $_POST['EventType'];
    $event->Link = $_POST['link'];
    $event->Beacon = $_POST['beacon0'];
    $event->EndDate = $_POST['enddate'];
    $event->broadcast();
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
        
        <h1 id="BlueTitle">Add event</h1>
    
        <form id="addeventform" action="" method="POST" enctype="multipart/form-data">
            <?php if(isset($message)) { echo "<div id='errormessage'>" . $message . "</div>"; } ?>
            <label for="titel">Titel</label>
            <input type="text" id="titel" required="required" name="titel" placeholder="Mijn Event">

            <label for="EventType">Event Type</label>
            <select id="EventType" name="EventType" required="required" selected="">
                <option class="sub-item" value="A">Announcement</option>
                <option class="sub-item" value="E">Event</option>
                <option class="sub-item" value="I">Info</option>
            </select>

            <label for="teaser">Event Info</label>
            <textarea type="text" id="teaser" required="required" name="teaser" placeholder="Mijn event ..."></textarea>

            <label for="link">Event Link</label>
            <span id="scaleLink"><p id="http">HTTP://</p><input type="text" id="link" required="required" name="link" placeholder="www.event.be"></span>

            <label for="beacon">Zone</label>

            <div id="beaconsdiv">
                
                <select id="beacon0" name="beacon0" required="required" selected="Pick A Zone">

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

            <div id="BC" style="display: none;">    
            <p id="curBC">
            Current broadcast for <span id="zoneBC"></span>;
            </p>
            <p id="CBtitle">
            </p>
            <p id="CBlink">
            </p>
            <p id="CBdate">
            </p>
            </table>
            
            </div>
            </div>
            
            <label for="enddate">End Date</label>
            <br />
            <input type="date" id="enddate" required="required" name="enddate">

            <div id="submitknop">
                <button type="submit" id="submitEvent" class="btn btn-default">Add Event</button>
            </div>
        </form>
    </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
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