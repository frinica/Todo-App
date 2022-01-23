<?php require 'dbconnection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
</head>
<body>
    
    <h1>Todo-lista</h1>

    <?php include 'create.php' ?>

    <form action="index.php" method="POST">
        <input type="text" name="title" placeholder="Titel" require>
        <input type="text" name="comment" placeholder="Kommentar" require>
        <input type="submit" name="submit" value="Skapa">
    </form>

    <section class="show-todos">
    <?php include 'read.php' ?>
    </section>
</body>
</html>