<?php
require 'dbconnection.php';
require 'functions.php';
updateTask();
include 'includes/head.php';
?>

<header>
<h1><a href="index.php">Todo-lista</a></h1>
</header>

<section>
<!-- Access data from the table in the database -->
<?php 
$query = 'SELECT * FROM todo';
$stmt = $conn->prepare($query);
$stmt->execute();

$todos = $stmt;
while($todo = $todos->fetch(PDO::FETCH_ASSOC)) {
?>

<!-- Form to update data in the table in the database -->

<form action="update.php?update=<?php echo $todo['id'];?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $todo['id']?>">
    <input type="text" name="title" value="<?php echo $todo['title']?>" required>
    <input type="text" name="comment" value="<?php echo $todo['comment']?>" autocomplete="off">
    <input type="submit" name="submit" value="Uppdatera">
</form>

<?php } ?>
</section>
<?php include 'includes/footer.php'?>