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
/* function readTask(){
    global $conn;

    $query = 'SELECT * FROM todo';

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($todos) {
    foreach ($todos as $todo) { ?>
        <div class="todo-item">
            <h2><?php echo $todo['title']?></h2>
            <p><?php echo $todo['comment']?></p>
                <div class="btns">
                    <a href="delete.php?delete=<?php echo $todo['id']; ?>">Ta bort</a>
                    <a href="update.php?update=<?php echo $todo['id']; ?>">Redigera</a>
                </div>
        </div>
    <?php } 
    }
} */
?>

<!-- Catch data from the table to use in update.php -->
<?php
/*         function editTodos($id){
        global $conn;

        $query = 'SELECT * FROM todo WHERE id = :id';
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $editTask = [
            'title' => $result['title'],
            'comment' => $result['comment']
        ];
        return $editTask;
      } */

/* function readTasks(){
    global $conn;

    $query = 'SELECT * FROM todo';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $todos = [
        'id' => $result['id'],
        'title' => $result['title'],
        'comment' => $result['comment'],
        'checked' => $result['checked']
    ];

    return $todos;
}  */
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
