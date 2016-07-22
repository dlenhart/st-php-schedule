<?php
/*Installation Script - Creates sqlite db & creates table with mock data
//builds database and tables from CLI
*/
class database extends SQLite3{
	public $name;
	
    function __construct($name = 'default'){
		$this->name = $name;
		$full_db = '../data/' . $this->name . '.sqlite';
        $this->open($full_db);
    }
}

function create_db($namedb){
	$namedb = trim($namedb);
	$db = new database($namedb);

	if(!$db){
		echo $db->lastErrorMsg();
		exit;
	}else {
		echo "Database created!\n";
	}

	//Create Table
	$sql = "CREATE TABLE JOBS (
		id INTEGER PRIMARY KEY AUTOINCREMENT,
		last_run INT(11),
		interval INT(11),
		run_once INT(1),
		name CHAR(50),
		status CHAR(10),
		status_int INT(1),
		path CHAR(200)
		)";

	$createTable = $db->exec($sql);

	if(!$createTable){
		echo $db->lastErrorMsg();
	} else {
		echo "Table articles has been created!\n";
	}

	//Create Table
	$sql3 = "CREATE TABLE QUEUE (
		id INTEGER PRIMARY KEY AUTOINCREMENT,
		job_id INT(11),
		path CHAR(200),
		hold INT(1),
		in_que_time INT(11)
		)";

	$createJobs = $db->exec($sql3);

	if(!$createJobs){
		echo $db->lastErrorMsg();
	} else {
		echo "Table pages has been created!\n";
	}
	$count = time(); //enter current time for install
	///Load a basic job for testing
	$sql2 = "
	INSERT INTO JOBS (id, last_run, interval, run_once, name, status, status_int, path) 
	VALUES (1, '$count', '5', '0', 'job01', 'held', '1', 'c:\phpcli\jobs\job.php' );
	
	INSERT INTO JOBS (id, last_run, interval, run_once, name, status, status_int, path) 
	VALUES (2, '$count', '2', '0', 'job02', 'held', '1',  'c:\phpcli\jobs\job-email.php' );
	
	INSERT INTO JOBS (id, last_run, interval, run_once, name, status, status_int, path) 
	VALUES (3, '$count', '30', '0', 'job04', 'held', '1',  'c:\phpcli\jobs\job-hehe.php' );
	";

	$ret = $db->exec($sql2);

	if(!$ret){
		echo $db->lastErrorMsg();
	} else {
		echo "Records created successfully\n";
	}

	//Close connection
	$db->close();
}
?>