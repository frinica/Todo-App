<?php require 'dbconnection.php'; ?>
<?php require 'functions.php'; ?>
<?php include 'includes/header.php'; ?>
    <h1>Todo-lista</h1>

<!--Form to create a new todo-item-->
    <?php createTask() ?>

    <form action="index.php" method="POST" class="form">
        <input type="text" name="title" placeholder="Titel" required>
        <input type="text" name="comment" placeholder="Kommentar" autocomplete="off">
        <input type="submit" name="submit" value="Skapa">
    </form>

<!--Section where the todos will appear-->
    <section class="show-todos">
    <?php readTask() ?>
    </section>

<?php include 'includes/footer.php'; ?>