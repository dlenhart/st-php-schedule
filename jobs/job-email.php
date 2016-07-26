<?php 
/*Example PHP email job.*/

$from = "";
$to = "";
$subject = "Hello from PHP Job!";

//Do some work here, query some data for a report?
$body = "Some data";

//Send email.  Make sure your smtp server is in php.ini
$send_me = mail($to, $subject, $body, "From:" . $from);

