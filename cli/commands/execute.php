<?php  
/*
Author:		Drew D. Lenhart
File:		execute.php
Desc:		Executes jobs in queue.
Date:		7/22/16
Version:	1.0.0
Use:		e.g. C:\wamp\bin\php\php5.5.12\php.exe -f C:\phpcli\exec.php execute
*/

function execute_queue(){
	$time = date('d-M-Y');
	if(DEBUG) $qlog = new snowytech\stphplogger\logWriter('../logs/execute-queue-' . $time . '.txt');
	
	//Look for any kind of entry in QUEUE & execute;
	
	$db1 = db::getInstance();
	$sql = "SELECT * FROM QUEUE";
	$stmt = $db1->getData($sql);
	$count = time();

	if ( count($stmt) > 0) {
		echo "Items in queue \n";
		foreach($stmt as $row1){
			$id = $row1['job_id'];
			$job = $row1['id'];
			$path = $row1['path'];
			echo "JOB " . $id . " " . $path . "\n";
			//update last run time, include this que table.
			
			if(file_exists($path)){
				////Update last run time
				$sql= "UPDATE JOBS SET last_run = '$count' WHERE id = '$id'";
				$db1->updateData($sql);
				
				//EXECUTE THE SCRIPT via path			
				executeRem($path);
				
				//Remove entry from QUEUE				
				$delete = "DELETE FROM QUEUE WHERE id = '$job'";
				echo $delete . "\n";
				$db1->updateData($delete);
				
				//Update JOBS table that this job is no longer in queue
				$sql= "UPDATE JOBS SET status_int = 1 WHERE id = '$id'";
				$db1->updateData($sql);
				
				if(DEBUG) $qlog->info('JOB: ' . $job . ' executed!');
			} else {
				if(DEBUG) $qlog->info('FILE: ' . $path . ' NOT FOUND!!!');
			}
		}
	} else { echo "There are no items in the QUEUE"; }
	$db1->closeDB();
}

function executeRem($url) {
	$output = shell_exec('php -f ' . $url);
	return $output;
}