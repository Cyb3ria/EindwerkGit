<?php 
 include("classes/db.class.php");
 mysql_query("DELETE FROM notifications WHERE n_date < NOW()");
?>