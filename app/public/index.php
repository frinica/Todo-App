<?php require 'dbconnection.php'; ?>
<?php require 'functions.php'; ?>
<?php include 'includes/header.php'; ?>
    
<div class="container">
    <header>
        <h1>Todo-lista</h1>
    </header>

        <!--Form to create a new todo-item-->
        <?php createTask() ?>
        <div class="form-container"></div>
            <form action="index.php" method="POST" class="form">
                <input type="text" name="title" class="form-input" placeholder="Titel" required>
                <input type="text" name="comment" class="form-input" placeholder="Kommentar" autocomplete="off">
                <input type="submit" name="create" class="form-input" value="Skapa">
            </form>
        </div>

        <!--Section where the todos will appear-->
        <section class="show-todos">
            <?php readTask() ?>
        </section>
</div>

<?php include 'includes/footer.php'; ?>