<?php require 'dbconnection.php'; ?>
<?php require 'functions.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
deleteTask();
?>
<div class="delete-msg">
    <p><?php echo "Uppgiften togs bort!"; ?></p>

<div class="btns">
    <a href="index.php">Gå tillbaka</a>
</div>
</div>

<?php include 'includes/footer.php'; ?>