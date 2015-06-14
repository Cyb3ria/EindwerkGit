<?php
	session_start();
			if(!empty($_GET)){

				if($_GET['type'] == 'event'){ 
					include_once('classes/event.class.php');
					$m = new Event();
					$removable = $_GET['id'];
					$m->remove($removable);
					header('Location: ' . $_SERVER['HTTP_REFERER']);
				}

			}
		?>