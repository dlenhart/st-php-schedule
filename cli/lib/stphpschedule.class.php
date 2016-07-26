<?php
/** 
* st-php-schedule - ddl
*/

namespace snowytech\stphpschedule;

class schedule {
	/**
    * interval method (check interval jobs)
    * @param string $lastrun, $interval
    * @return true that the job is ready to run
    */
	public function interval($lastrun, $interval){
		$current_time = time();
		if($current_time - $lastrun >= 60 * $interval){
			return true;
		}else { return false; }
	}
	
	public function day(){
		
	}
	
	public function console($msg){
		echo $msg;
	}
	
}
