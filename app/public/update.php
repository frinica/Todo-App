<?php require 'dbconnection.php'?>
<?php require 'functions.php'?>
<?php include 'includes/header.php'?>

<header>
<?php include 'includes/navbar.php'?>
</header>

<section>
<?php updateTask() ?>

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