<?php
session_start();
include("classes/event.class.php");

if(!isset($_SESSION['loggedin']))
{
  header('location: login.php');
}
$db = new db();	
$m = new Event();
$arrayNotifications = $m->getMine();

while ($row = mysqli_fetch_assoc($arrayNotifications))
	{
	$removable = $row['n_id'];
	}

if(isset($_POST['delete_row'])) 
{
   $id = $_POST['id_to_be_deleted'];
   if(!mysqli_query($db->conn, "DELETE FROM notifications WHERE n_id ='".$id."'"))
   {
     echo mysqli_error($db->conn);
   }
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    
    	<title>James | My Events</title>
    
            <meta http-equiv="content-type" content="text/html;charset=utf-8" />
            <link rel="icon" href="img/JamesIcon.ico" type="image/ico" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />
    <meta name="author" content="Joren Polfliet & Nicolas Decroos">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="css/reset.css"/>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    
    <?php include_once("adminHeader.include.php"); ?>
        
        <h1 id="BlueTitle">My Events</h1>
	
<div id="notesPrint">
<?php
	foreach($arrayNotifications as $a) 
  { ?>
		<div class="SingleNote">
      <a class = "titleNote" href="<?= $a['n_link']?>"><h4 class="titleNote"><?= $a['n_title']?></h4></a>
		  <h4 class="teaserNote"><?= $a['n_beacon']?></h4>
      <h4 class="datenote"><?= $a['n_date']?></h4>
      <?php
      	echo "<button>Edit</button>";
      echo "<form method='post'><input type='hidden' name='id_to_be_deleted'
								   value='".$removable."' />
   								  <input type='submit' name='delete_row' value='delete' />";

	
            
      ?>
    </div>
    <div class = "lijn">lijn</div>
	<?php 
  }?> 
</div>  
    

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="ajax/ajax.js" type="text/javascript"></script>
<script src="js/menu.js" type="text/javascript"></script>

</html>