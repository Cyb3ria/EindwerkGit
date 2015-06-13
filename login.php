<?php
session_start();
	include_once("classes/users.class.php");
	$user = new user();

	if(isset($_SESSION['loggedin']))
	{
		header('location: index.php');
	}
	else
	{
		if(!empty($_POST))
		{
			try
			{
				$user->login($_POST['studentennummer'],$_POST['password']);
			}
			catch (Exception $error)
			{
				$message = $error->getMessage();
			}
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Login</title>
    
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
            <link rel="icon" href="img/JamesIcon.ico" type="image/ico" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />
    <meta name="author" content="Joren Polfliet & Nicolas Decroos">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body id="loginBody">
	
	<div id="containerlogin">

	<div id="title">
		<h1 class="page-header">James</h1>
	</div><!--end title-->

			<form action="" method="post" id="loginform">
				<?php 
					if(isset($message))
					{
						echo "<div id='errormessage'>" . $message . "</div>";
					}
				?>
                <div id="bgcolorlogin">
				<input type="text" id="username" required="required" name="studentennummer" placeholder="Number">

				<input type="password" id="password" required="required" name="password" placeholder="Password">
                </div>
				<div id="submitknop">
				<button id="submitlogin" type="submit" class="btn btn-default">Log in</button>
				</div>
			</form>
	</div>

</body>
</html>