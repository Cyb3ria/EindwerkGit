<?php
session_start();
  include("config.php");
  include("Classes/event.class.php");
    
$m = new Event();

$all = $m->getAll();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="slideout-menu">
	<h3>Menu <a href="#" class="slideout-menu-toggle">&times;</a></h3>
	<ul>
		<li><a href="#">Home <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Starred Notifications <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Upcoming Events <i class="fa fa-angle-right"></i></a></li>
		<li><a href="#">Administration <i class="fa fa-angle-right"></i></a></li>
	</ul>
</div>
    
    <div class="header">
	<a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i> Toggle Menu</a>
</div>
    
<p> Active notifications </p>
    
  <div id="notesPrint">
			<?php
				foreach($all as $a) { ?>
		    
					<h4 id="titleNote"><strong><?= $a['n_title']?></strong></h4>
					<h4><strong><?= $a['n_teaser']?></strong></h4>
					<div class="clear">&nbsp;</div>
					
			<?php } 
			
			?> </div>  
    

    <a href="logout.php">Logout</a>
</body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('.slideout-menu-toggle').on('click', function(event){
    	event.preventDefault();
    	// create menu variables
    	var slideoutMenu = $('.slideout-menu');
    	var slideoutMenuWidth = $('.slideout-menu').width();
    	
    	// toggle open class
    	slideoutMenu.toggleClass("open");
    	
    	// slide menu
    	if (slideoutMenu.hasClass("open")) {
	    	slideoutMenu.animate({
		    	left: "0px"
	    	});	
    	} else {
	    	slideoutMenu.animate({
		    	left: -slideoutMenuWidth
	    	}, 250);	
    	}
    });
});
</script>
</html>