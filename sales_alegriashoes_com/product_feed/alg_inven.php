<?php
	require("../includes/resource/db.php");
	set_time_limit(720);

	$company = "ALG";
	$today = date("Ymd");
	$replenishmentdate = "";

	$time = date("H_i_s");

	include("resource/connection_mysql.php");

	$line = "SKU,size,UPC,stock,season";
	echo $line."</br>";

	while($row = mysql_fetch_assoc($result)){
		include("resource/variables_mysql.php");

		$line = $tmpItemNo.",".$tmpSize.",".$tmpUPC.",".$tmpStock.",".$tmpSeason."</br>";

		echo $line;
	}

// inv_vendornet();
?>