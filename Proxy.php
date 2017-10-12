<?php
$url = "/"; // image url on server
$server = "192.168.XX.XX"; //server ip
$port = "8080"; //server port

set_time_limit(0);  
$fp = fsockopen($server, $port, $errno, $errstr, 30); 
if (!$fp) { 
    echo "$errstr ($errno)<br>\n";   // error handling
} else { 
    $urlstring = "GET ".$url." HTTP/1.0\r\n\r\n"; 
    fputs ($fp, $urlstring); 
    while ($str = trim(fgets($fp, 4096))) 
    header($str); 
    fpassthru($fp); 
    fclose($fp); 
}

?>
