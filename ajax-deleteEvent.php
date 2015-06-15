<?php
include("classes/event.class.php");

$noteID = $_POST['n_id'];

$e = new Event();

if(isset($noteID));
{
	$e->delete($noteID);
}


?>