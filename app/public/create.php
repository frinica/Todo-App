<?php require 'dbconnection.php' ?>

<?php 

if (isset($_POST['submit'])) {
    global $conn;

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
?>