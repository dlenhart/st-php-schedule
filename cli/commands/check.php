<?php  
/*
Author:		Drew D. Lenhart
File:		check.php
Desc:		Checks runtimes and inserts job into queue.
Date:		7/22/16
Version:	1.0.0
Use:		e.g. C:\wamp\bin\php\php5.5.12\php.exe -f C:\phpcli\exec.php check
*/
include 'lib/database.class.php';
include 'lib/stphpschedule.class.php';

function check(){
	//Check table JOB, cycle through run time & put entry in Queue.
	echo "Looking for jobs and adding to queue\n";
	
	$times = date('d-M-Y');
	if(DEBUG) $qlog = new snowytech\stphplogger\logWriter('../logs/check-queue-' . $times . '.txt');
	$check = new snowytech\stphpschedule\schedule();
	//Goes through whole Jobs table and checks interval!	
	$db = db::getInstance();
	$sql = "SELECT * FROM JOBS";
	$stmt = $db->getData($sql);

	foreach($stmt as $row){
		$id = $row['id'];
		$job_name = $row['name'];
		$path = $row['path'];
		$in_queue = $row['status_int'];
		$lastrun = $row['last_run'];
		$interval = $row['interval'];
		
		$r = $check->interval($lastrun, $interval);
		
		//Need to first check if the "In QUEUE" flag is set, this means its in the queue
		if($in_queue != 0){
			if( $r ) {
				echo "executed - " . $job_name . "\n";
				$count = time();
				echo $count . "\n";
				if(DEBUG) $qlog->info('Job hit the queue: ' . $job_name . " : time: " . $count);
				  
				//Now last update is updating in table.  Need to add an entry to the QUE and update last run from there.				
				$data = array(':jid' => $id, ':path' => $path, ':time' => $count);
				
				//Add into QUEUE
				$sql= 'INSERT INTO QUEUE (job_id, path, in_que_time) VALUES (:jid,:path,:time)';
				$db->execQuery($sql, $data);

				//update status_int, prevents multiple entries into queue
				$sql= "UPDATE JOBS SET status_int = 0 WHERE id = '$id'";
				$db->updateData($sql);
			}else{ 
				echo "not ready to run - " . $job_name . "\n"; 
				$count = time() - $lastrun;
				//Log that its intervnal is not ready
				if(DEBUG) $qlog->info('NOT RUN - interval is ' . $interval . " minutes on JOB: " . $job_name . "\n");
			}
		} else { 
			echo "Item is already in the queue\n"; 
			if(DEBUG) $qlog->info('JOB ' . $job_name . " - already in QUEUE!\n");
		}
	}
	$db->closeDB();
}
