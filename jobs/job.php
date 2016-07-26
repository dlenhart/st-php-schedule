<?php
/*Example PHP job.*/


//Lets use the logging script included with cli program
include '../cli/lib/st-php-logger.php';

//Grab date for log file
$time = date('d-M-Y');

//Set path with timestamp in log.
$log = new snowytech\stphplogger\logWriter('../logs/job_logs/job01-' . $time . '.txt');

//Write message to file to verify this job works.
$log->info('works');

//Echo to test via cli.
echo "works";

