<?php include 'includes/header.php'?>
<?php require 'dbconnection.php'; ?>
<?php require 'functions.php'; ?>

    
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
                <input type="submit" name="create" class="form-input" value="Skapa uppgift!">
            </form>
        </div>

        <!--Section where the todos will appear-->
        <section class="show-todos">
            <?php deleteTask() ?>

        <!-- Read and import rows from the database -->
           <?php 
            $query = 'SELECT * FROM todo';
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $todos = $stmt;

            while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <a id="<?php echo $todo['id'];?>" class="delete-btn" href="index.php?delete=<?php echo $todo['id']; ?>">Ta bort</a>
                    <a id="<?php echo $todo['id'];?>" class="edit-btn" href="update.php?update=<?php echo $todo['id']; ?>">Redigera</a>
                    <?php if($todo['checked']){ ?>
                        <h2 class="checked"><?php echo $todo['title'];?></h2>
                        <p class="checked"><?php echo $todo['comment'];?></p>

                        <input type="checkbox" class="check-box" data-todo-id ="<?php echo $todo['id'];?>" checked>
                    <?php }else { ?>
                        <h2><?php echo $todo['title'];?></h2>
                        <p><?php echo $todo['comment'];?></p>

                        <input type="checkbox" data-todo-id ="<?php echo $todo['id']; ?>" class="check-box">
                    <?php } ?>
                </div>
            <?php } ?>
        </section>
</div>

<?php include 'includes/footer.php'; ?>