<?php  
//builddb - create database via cli
require 'install.php';

function build_database(){
	echo "Please type a database name, otherwise leave blank for default: \n";
	$handle = fopen("php://stdin", "r");
	$line = fgets($handle);
	
	if(trim($line) == ""){
		$default = DB_NAME;
		create_db($default);
		echo "Complete!\n";
	}else{
		create_db($line);
	}
	fclose($handle);
}