<?php
	$db_host = "sql207.epizy.com";
	$db_user = "epiz_26440505";
	$db_pass = "PJ8mwMrNTMTUoZO";
	$db_name = "epiz_26440505_dashboard";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}
?>