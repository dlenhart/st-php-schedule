<?php 
/*
Author:		Drew D. Lenhart
File:		stphpschedule.php
Desc:		CLI menu interface.
Date:		7/22/16
Version:	1.0.0
Use:		e.g. C:\wamp\bin\php\php5.5.12\php.exe -f C:\phpcli\exec.php execute
*/

include 'lib/st-php-logger.php';
include '../config/config.php';

//Include command directory
foreach (glob("commands/*.php") as $filename)
{
    include $filename;
}

//Only grab one argument. switch to appropriate function. Quasi menu system.
if (isset($argv[1])){
	switch ($argv[1]){
		case "list":
			list_commands();
			break;
		case "builddb":
			build_database();
			break;
		case "check":
			//Check if jobs need to be run
			check();
			break;
		case "execute":
			//Execute jobs in Queue
			execute_queue();
			break;
		case "status":
			//Whats in the QUEUE?
			status();
			break;
		default:
			echo "command not found.  type: php exec.php 'list' for a list of commands.";
	}
}else{ 
	echo "No arguments, type: php stphpschedule.php 'list' for a list of commands.\n"; 
}