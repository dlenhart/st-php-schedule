<?php 

echo "JOB TABLE<br />";
include '../lib/config.php';
include '../lib/database.class.php';

$db = db::getInstance();
$sql = "SELECT * FROM JOBS";
$stmt = $db->getData($sql);

echo "<table border='1'><tr><td>ID</td><td>NAME</td><td>Interval</td><td>Path</td><td>Last Run</td></tr>";
foreach($stmt as $row){
	echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['interval'] . "</td><td>" . $row['path'] . "<td>" . date('m/d/Y H:i:s', $row['last_run']) . "</td><td>" . $row['status_int'] . "</td></tr>";
}
echo "</table>";
echo "<br /><br />";

$db = db::getInstance();
$sql = "SELECT * FROM QUEUE";
$stmt = $db->getData($sql);

echo "QUEUE<br />";
echo "<table border='1'><tr><td>JOB NUM</td><td>JOB_ID</td><td>PATH</td><td>IN QUE TIME</td></tr>";
foreach($stmt as $row){
	echo "<tr><td>" . $row['id'] . "</td><td>" . $row['job_id'] . "</td><td>" . $row['path'] . "</td><td>" . date('m/d/Y H:i:s', $row['in_que_time']) . "</td></tr>";
}
echo "</table>";

$db->closeDB();