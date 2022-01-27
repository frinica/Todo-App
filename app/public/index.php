<?php
require 'dbconnection.php';
require 'functions.php';

createTask();
deleteTask();
checkTask(); 

include 'includes/head.php';
?>

<header>
    <h1><a href="index.php">Todo-lista</a></h1>
</header>

<!--Form to create a new todo-item-->

<div class="form-container"></div>
<h2>Lägg till en uppgift</h2>
<form action="index.php" method="POST">
    <input type="text" name="title" placeholder="Titel" required>
    <textarea cols="30" rows=="10" name="comment" id="form-comment" placeholder="Kommentar" autocomplete="off"></textarea>
    <input type="submit" name="submit" value="Skapa uppgift!">
</form>
<h3 class="link-update"><a href="update.php">Redigera lista</a></h3>
</div>

<!--Section where the todos will appear-->
<section class="show-todos">
    <!-- Read and import rows from the database -->
    <?php
    $query = 'SELECT * FROM todo';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php
    if ($todos) {
        foreach ($todos as $todo) { ?>
            <div class="todo-item">
                <!-- Add/remove a div if the task has been marked/unmarked as done -->
                <?php
                if ($todo['checked'] == 1) { ?>
                    <div class="done-item">
                        <h3><?php echo $todo['title']; ?></h3>
                        <p><?php echo $todo['comment']; ?></p>
                    </div>
                <?php } else { ?>
                    <h3><?php echo $todo['title']; ?></h3>
                    <p><?php echo $todo['comment']; ?></p>
                <?php } ?>
                <!-- Links to remove or mark a task as done -->
                <a class="btn todo-done" href="index.php?checked=<?php echo $todo['id'] ?>">&#10003;</a>
                <a class="btn todo-delete" href="index.php?delete=<?php echo $todo['id'] ?>" onclick="return confirm('Vill du ta bort uppgiften?')">X</a>
            </div>
    <?php }
    } ?>
</section>

<?php include 'includes/footer.php' ?>