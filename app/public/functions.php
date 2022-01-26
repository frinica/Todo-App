<?php require 'dbconnection.php'; ?>

<?php

function createTask(){
    global $conn;

    if (isset($_POST['title'])) {
        $query = 
        'INSERT INTO todo(title, comment) VALUES(:title, :comment) ';
        $stmt = $conn->prepare($query);
    
        $title = $_POST['title'];
        $comment = $_POST['comment'];
        
    
        $stmt->execute([
            ':title' => $title,
            ':comment' => $comment
        ]);
    }
}
?>

<?php
function updateTask(){
    if(isset($_POST['submit'])){
        global $conn;
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $comment = $_POST['comment'];

        $row = [
            ':id' => $id,
            ':title' => $title,
            ':comment' => $comment
        ];

        $query = 'UPDATE todo SET title = :title, comment = :comment WHERE id = :id';
        $stmt = $conn->prepare($query);

        $stmt->execute($row);
        // Add header(location)
        echo "Uppgiften har uppdaterats!";
    }
} 
?>

<?php
function deleteTask(){
    if(isset($_GET['delete'])){
        global $conn;

        $id = $_GET['delete'];

        $query = 'DELETE FROM todo WHERE id = :id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        
        // Add header(location)
    }
}
?>

<?php
function checkTask($checked, $id){
    if(isset($_GET['done'])){
        global $conn;

        if($checked == NULL){
            $checked = 1;
            echo "checked";
        } else if($checked == 1) {
            $checked = NULL;
            echo "not checked";
        }

        $query = 'UPDATE todo SET checked=:checked WHERE id=:id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':checked', $checked);
        $stmt->execute();

        // Add header(location)
    }
}
?>
