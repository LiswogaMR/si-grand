<?php
    $db = 'si-grand';
    $host = 'localhost';
    $username = 'root';
    // $pass = 'RyZL6C9Aj6TKk9mr';
    $pass = '';
    $conn = mysqli_connect($host, $username, $pass, $db);
    if($conn){
    	echo 'connected';
    }
    else {
    	echo "failed";
    }
?>
