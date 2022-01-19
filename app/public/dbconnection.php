<?php
    $db = 'mysql:host=mysql;dbname=todoApp';
    $username = 'root';
    $password = 'password';
    try {
        $conn = new PDO($db, $username, $password); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected";
    } catch(PDOException $e) {
        echo "Could not connect to the database " . $e->getMessage();
    }

?>