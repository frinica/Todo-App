<?php 
require 'dbconnection.php';

    function createTask() {
        if (isset($_POST['submit'])) {
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


    function readRow() {
        global $conn;

        $query = 'SELECT * FROM todo WHERE id = :id';

            $stmt = $conn->prepare($query);
            $stmt->bindParam('id', PDO::PARAM_INT);
            $stmt->execute();

            $row = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if($row) {
                echo $row['id'] . "\n";
                echo $row['title'] . "\n";
                echo $row['comment'] . "\n";
                echo $row['checked'] . "\n";
            } else {
                echo 'No data found';
            }
    }
    

    function readAll() {
        global $conn;

        $query = 'SELECT * FROM todo /*ORDER BY id DESC*/';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)) {
            foreach($result as $row){
                echo $row['id'] . "\n";
                echo $row['title'] . "\n";
                echo $row['comment'] . "\n";
                echo $row['checked'] . "\n";
            }
        }
    }

    function updateTask() {
        if(isset($_POST['submit'])) {
            global $conn;
           
           $row = [
               'id' => $_GET['id'],
               'title' => $_POST['title'],
               'comment' => $_POST['comment'],
               'checked' => $_POST['checked']
           ];

            $query = 'UPDATE todo 
                SET title = :title, body = :body, checked = :checked 
                WHERE id = :id';

            $stmt = $conn->prepare($query);

            $stmt->bindParam(':id', $row['id'], PDO::PARAM_INT);
            $stmt->bindParam(':title', $row['title']);
            $stmt->bindParam(':body', $row['body']);
            $stmt->bindParam(':checked', $row['checked']);

            $stmt->execute();
        }
    }

    function delete() {
        if(isset($_POST['submit'])) {
            global $conn;

            $id = $_GET['id'];

            $query = 'DELETE FROM todo WHERE id = :id';
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        }
    }

    ?>