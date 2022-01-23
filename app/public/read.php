<?php require 'dbconnection.php' ?>

<?php
    $query = 'SELECT * FROM todo';

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($todos) {
        foreach ($todos as $todo) {
            echo $todo['title'] . ' ' . $todo['comment'] . '<br>';
        }
    }
    
?>
    
