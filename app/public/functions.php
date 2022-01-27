<?php require 'dbconnection.php'; ?>

<?php

function createTask(){
    global $conn;

    if (isset($_POST['title'])) {
        $query = 
        'INSERT INTO todo(title, comment, checked) VALUES(:title, :comment, 0) ';
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
        echo "<h2 id='updated'>Uppgiften har uppdaterats!</h2>";
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
    }
}
?>

<!-- Mark a task as done -->
<?php
function checkTask(){
    if(isset($_GET['checked'])){
        global $conn;
        $id = $_GET['checked'];
        
        $query = 'UPDATE todo SET checked=ABS(checked - 1) WHERE id=:id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
