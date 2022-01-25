<?php require 'dbconnection.php' ?>
<?php require 'functions.php' ?>
<?php include 'includes/header.php'; ?>


<?php $editTask = editTodos($_GET['update']);?>

<form action="functions.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $_GET['update']; ?>">
    <input type="text" name="title" value="<?php echo $editTask['title'] ?>" required>
    <input type="text" name="comment" value="<?php echo $editTask['comment'] ?>" autocomplete="off">
    <input type="submit" name="submit" value="Uppdatera">
</form>


    <div class="btns">
        <a href="index.php">Gå tillbaka</a>
    </div>

<?php include 'includes/footer.php'; ?>