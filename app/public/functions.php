<?php require 'dbconnection.php'; ?>

<?php 

    function createTask(){
        if (isset($_POST['submit']))
          {
            global $conn;

            $query = 
            'INSERT INTO todo(title, comment) VALUES(:title, :comment) ';
            $stmt = $conn->prepare($query);
            
            $stmt->bindParam('title', $title);
            $stmt->bindParam('comment', $comment);

            $title = $_POST['title'];
            $comment = $_POST['comment'];

            $stmt->execute();
            
        }
    }

?>