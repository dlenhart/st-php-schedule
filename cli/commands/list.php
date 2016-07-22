<?php  
//List command

function list_commands(){
	echo "----------------------------\n";
	echo "stPHPschedule - Command List\n";
	echo "----------------------------\n\n";
	
	echo "list - list commands\n";
	echo "check - checks job list and adds to Queue\n";
	echo "builddb - for first time set up, builds SQLite database\n";
	echo "execute - execute, command to put/exec jobs in queue.\n\n";
	echo "----------------------------\n";
}