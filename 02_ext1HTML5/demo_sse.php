<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');


echo "data: sssssssss1234\n\n";
//$time = date('r');
//echo "data: The server time is: {$time}\n\n";
flush();
?>