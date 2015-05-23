$(document).ready(function() 
{
	var beaconsfieldcounter = 1;

	$('#addbeaconbtn').on('click', function(e) 
	{
    	e.preventDefault();
        $('<p id="beaconp'+beaconsfieldcounter+'"><input type="text" required="required" id="beacon' +beaconsfieldcounter+ ' name="beacon' +beaconsfieldcounter+ '"> <button class="btn btn-remove" >Remove Beacons Nigga</button></p>').appendTo('#beaconsdiv');
		beaconsfieldcounter ++;
	});

	$('.btn-remove').on('click', function(e)
	{
		console.log('kappa');
		return false;
    	e.preventDefault();
    	$(this).parent('<p>').remove();
		beaconsfieldcounter --;
	});
});

