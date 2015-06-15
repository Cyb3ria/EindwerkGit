<?php

include("classes/event.class.php");
$m = new Event();
$arrayAllEvents = $m->getNonFavo();
$arrayFavorites = $m->getFavo();
$db = new db();
while ($row = mysqli_fetch_assoc($arrayFavorites))
{
  $unfavoriteID = $row['f_id'];
  $uid = $_SESSION['u_id'];
}

if(isset($_POST['favorite_row'])) 
{
  $uid = $_SESSION['u_id'];
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

?>
