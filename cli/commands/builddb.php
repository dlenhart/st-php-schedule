<?php  
/*
Author:		Drew D. Lenhart
File:		builddb.php
Desc:		Build sqlite database.
Date:		7/26/16
Version:	1.0.0
Use:		e.g. C:\wamp\bin\php\php5.5.12\php.exe -f C:\phpcli\st-php-schedule\cli\stphpschedule.php builddb
*/

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