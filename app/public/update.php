<?php require 'dbconnection.php' ?>
<?php require 'functions.php' ?>
<?php include 'includes/header.php' ?>

<?php
 /* if(isset($_GET['update'])) {
    $id = $_GET['update'];
} */
?>
<?php updateTask() ?>

<?php $query = 'SELECT * FROM todo';
$stmt = $conn->prepare($query);
$stmt->execute();

$todos = $stmt;

$todo = $todos->fetch(PDO::FETCH_ASSOC)
/* $editTask = editTodos($_GET['update']); */?>

<form action="update.php?update=<?php echo $todo['id'];?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $todo['id']/* $_GET['update']; */ ?>">
    <input type="text" name="title" value="<?php echo $todo['title']/* $editTask['title'] */ ?>" required>
    <input type="text" name="comment" value="<?php echo $todo['comment']/* $editTask['comment'] */ ?>" autocomplete="off">
    <input type="submit" name="submit" value="Uppdatera">
</form>


    <div class="btns">
        <a href="index.php">Gå tillbaka</a>
    </div>

<?php include 'includes/footer.php' ?>