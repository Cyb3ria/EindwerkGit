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
    $titel = $_POST['titel'];
    $teaster = $_POST['teaser'];
    $link = $_POST['link'];
    
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
  $event->save($uid);
    $beacon = $_POST['beacon'];
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

        <form action="" method="POST" enctype="multipart/form-data">
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
            <input type="text" id="beacon" required="required" name="beacon">


            <div id="submitknop">
                <button type="submit" class="btn btn-default">add</button>
            </div>
        </form>
    </div>

</body>

</html>