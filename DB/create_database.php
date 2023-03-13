<?php


/*Script to run first in your database to craete the database as the tables required */

    $servername = "localhost";
    $username = "root";
    //in my db this is the password you can configure it to your own password.
    // $pass = 'RyZL6C9Aj6TKk9mr';
    $password = "";
    $dbname = "si-grand";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // Create database
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
      echo "Database created successfully";
    } else {
      echo "Error creating database: " . $conn->error;
    }

    //craete the tables

    $sql = "CREATE TABLE `contact_form` (`id` int NOT NULL AUTO_INCREMENT,`email` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,`comments` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                        `datetime` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; ";
    
    if ($conn->query($sql) === TRUE) {
    echo "table created successfully";
    } else {
    echo "Error creating database: " . $conn->error;
    }
                                        
    $conn->close();
  

?>
