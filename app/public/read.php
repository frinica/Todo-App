<?php require 'dbconnection.php' ?>

<?php
function readTask(){
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
            <input type="checkbox">
                <div class="btns">
                    <input type='button' value='Uppdatera' onclick="location.href='update.php';">
                    <input type='button' name="delete" value='Ta bort' onclick="location.href='delete.php';">
        </div>
    <?php } 
    }
}
?>
    

  
