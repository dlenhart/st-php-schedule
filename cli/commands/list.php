<?php  
/*
Author:		Drew D. Lenhart
File:		list.php
Desc:		List available cli commands.
Date:		7/22/16
Version:	1.0.0
Use:		e.g. C:\wamp\bin\php\php5.5.12\php.exe -f C:\phpcli\exec.php list
*/

function list_commands(){
	echo "----------------------------\n";
	echo "stPHPschedule - Command List\n";
	echo "----------------------------\n\n";
	
	echo "list - list commands\n";
	echo "check - checks job list and adds to Queue\n";
	echo "builddb - for first time set up, builds SQLite database\n";
	echo "status - see whats in the Queue\n";
	echo "execute - execute, command to put/exec jobs in Queue.\n\n";
	echo "----------------------------\n";
}