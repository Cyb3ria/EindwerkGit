<?php
session_start();
  include("config.php");
  include("Classes/event.class.php");
    
    $m = new Event();
if  (!empty($_POST))
	{
      $m->Title = $_POST['titel'];
      $m->Teaser = $_POST['teaser'];
      $m->Link = $_POST['link'];
      $m->Beacon = $_POST['beacon'];
      $m->save();
		
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

        <form action="" method="POST">
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