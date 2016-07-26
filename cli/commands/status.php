<?php 
/*
Author:		Drew D. Lenhart
File:		status.php
Desc:		Status command.
Date:		7/22/16
Version:	1.0.0
Use:		e.g. C:\wamp\bin\php\php5.5.12\php.exe -f C:\phpcli\exec.php status
*/
function status(){
	echo "Checking QUEUE\n";
	
	$db2 = db::getInstance();
	$sql = "SELECT * FROM QUEUE";
	$stmt = $db2->getData($sql);
	
	if ( count($stmt) > 0) {
		foreach($stmt as $row1){
			$id = $row1['job_id'];
			$job = $row1['id'];
			$path = $row1['path'];
			$time = date('m/d/Y H:i:s', $row1['in_que_time']);
			echo "JOB: " . $id . " PATH: " . $path . " TIME: " . $time . "\n";
		}
	} else { echo "There are no items in the QUEUE\n"; }
	$db2->closeDB();
}

