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
    $event->Beacon = $_POST['beacon'];
      
    $event->save($uid);

  }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Add event</title>
</head>

<body>

    <div id="container">

        <div id="title">
            <h1 class="page-header">James</h1>
        </div>
        <!--end title-->

        <form id="addeventform" action="" method="POST" enctype="multipart/form-data">
            <?php if(isset($message)) { echo "<div id='errormessage'>" . $message . "</div>"; } ?>
            <label for="titel">Titel</label>
            <input type="text" id="titel" required="required" name="titel">
            <br/>
            <label for="teaser">Teaser</label>
            <textarea type="text" id="teaser" required="required" name="teaser"></textarea>
            <br/>
            <label for="link">Link</label>
            <input type="text" id="link" required="required" name="link">
            <br/>
            <input type="file" name="file" id="file" >
             <br/>
            <label for="beacon">Beacon</label>
            <br/>
            <div id="beaconsdiv">
            <input type="text" id="beacon0" required="required" name="beacon0">
            <br/>
            </div>
            <div id="addbeacon">
                <button class="btn btn-add" id="addbeaconbtn">More Beacons Nigga</button>
            </div>

            <div id="submitknop">
                <button type="submit" class="btn btn-default">add</button>
            </div>
        </form>
    </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js"type="text/javascript"></script>
</html>