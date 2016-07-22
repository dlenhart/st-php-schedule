<?php
require '../lib/st-php-logger.php';
include 'lib/stphpschedule.class.php';

$times = date('d-M-Y');
$qlog = new snowytech\stphplogger\logWriter('../logs/log-' . $times . '.txt');

$t = new snowytech\stphpschedule\schedule();
//for every hour runnings

// 60 * 2   where 2 is the interval of job to be run.  This will work out for jobs that need run x every minutes.

// for jobs to be run every hour, default the interval to 60.

//TODO:  need to cover monthly, weekly

//This will be part of the "check run times , and add jobs to the queue"

$lastrun = get_last_run_time(); // get value from database or filesystem

$r = $t->interval($lastrun, '2');

if( $r ) {
  //itstime();
  echo $r;
  set_last_run_time(time()); // write value back to database or filesystem
  $count = time();
  $qlog->info('The script executed!!!!!!!!!!*************************' . $count);
}else{ 
	echo "not ready to run"; 
	$count = time() - $lastrun;
	$qlog->info('nada ' . $count);
	}

function itstime(){
	echo "executed";
}
function get_last_run_time(){
	$time = "1469197706";
	return $time;
}

function set_last_run_time($time){
	echo "Last run time is " . $time;
	
}


/*$lastrun = get_last_run_time(); // get value from database or filesystem
if( time()-$lastrun >= 60*5 ) {
  itstime();
  echo time();
  set_last_run_time(time()); // write value back to database or filesystem
  $count = time();
  $qlog->info('The script executed!!!!!!!!!!*************************' . $count);
}else{ 
	echo "not ready to run"; 
	$count = time() - $lastrun;
	$qlog->info('nada ' . $count);
	}

function itstime(){
	echo "executed";
}
function get_last_run_time(){
	$time = "1469196708";
	return $time;
}

function set_last_run_time($time){
	echo "Last run time is " . $time;
	
}*/
?>