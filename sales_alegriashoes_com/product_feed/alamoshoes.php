<?php
/*header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=extraction.csv");
header("Pragma: no-cache");
header("Expires: 0");
*/


function inv_alamoshoes(){
	require("../includes/resource/db.php");
	set_time_limit(720);
	/*
	echo substr(sprintf('%o', fileperms('shoebuy/')), -4);
	echo substr(sprintf('%o', fileperms('shoebuy/peppergate-ip.csv')), -4)."<br>";
	*/
	
	/* ************************************************************************ */
	/* ***************** Variables to change for each vendor ****************** */
	/* ************************************************************************ */
	
	$name = "alamoshoes/alamoshoes-inv.csv";
	//header
	//$line = "Product ID,Variation SKU,Variation Price,Variation Weight,Variation Stock Level,Variation Low Stock Level,Variation Enabled,Variation Image,Size 35-42\r\n";
	$line ="Product SKU,Product UPC,Stock Level,MSRP\r\n";
	$company = "ALG";
	$replenishmentdate = "";
	
	/* ************************************************************************ */
	/* ************** EOF Variables to change for each vendor ***************** */
	/* ************************************************************************ */
	
	
	
	$file = fopen( $name, "w" );
	
	$time = date("H_i_s");

	
	include("resource/connection_mysql.php");
	
	
	
	fputs($file, $line);
	
	while($row = mysql_fetch_assoc($result)){
		
			
			include("resource/variables_mysql.php");
			
	/* ************************************************************************ */
	/* ***************** Variables to change for each vendor ****************** */
	/* ************************************************************************ */	
			if ($tmpStock <= 5){ $tmpStock = 0;} else { $tmpStock = $tmpStock;}

			if ($tmpSeason != 'CLOSEOUT') {
				//echo $tmpCStyle." has NO number<br>";
				$line = $tmpItemNo."-".$tmpSize.",".$tmpUpc.",".$tmpStock.",".$retailMSRP."\r\n";
				fputs($file, $line);
			}
	/* ************************************************************************ */
	/* ************** EOF Variables to change for each vendor ***************** */
	/* ************************************************************************ */
				//echo $line."<br>";
				
		
		
	}
	fclose($file);
	echo "Alamo Shoes created<br>";
	echo "Download here: <a href='http://sales.alegriashoes.com/product_feed/alamoshoes/alamoshoes-inv.csv' download> Alamo Inventory</a>";
}


inv_alamoshoes();
?>

