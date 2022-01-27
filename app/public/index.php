<?php require 'dbconnection.php'?>
<?php require 'functions.php'?>
<?php include 'includes/header.php'?>


    <header>
        <h1>Todo-lista</h1>
        <?php include 'includes/navbar.php'?>
    </header>

        <!--Form to create a new todo-item-->
        <?php createTask() ?>
        <div class="form-container"></div>
            <h2>Lägg till en uppgift</h2>
            <form action="index.php" method="POST">
                <input type="text" name="title" placeholder="Titel" required>
                <textarea cols="30" rows=="10" name="comment" id="form-comment" placeholder="Kommentar" autocomplete="off"></textarea>
                <input type="submit" name="submit" value="Skapa uppgift!">
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

            $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            
            <?php
            if($todos){
                foreach($todos as $todo) { ?> 
                    <div class="todo-item">
                    <!-- Add/remove a div if the task has been marked/unmarked as done -->
                    <?php 
                    if($todo['checked'] == 1){ ?>
                        <div class="done-item">
                            <h3><?php echo $todo['title'];?></h3>
                            <p><?php echo $todo['comment'];?></p>
                        </div>
                        <?php } 
                        else {?>
                            <h3><?php echo $todo['title'];?></h3>
                            <p><?php echo $todo['comment'];?></p>
                        <?php } ?>
                        <!-- Links to remove or mark a task as done -->
                        <a id="<?php echo $todo['id'];?>" 
                            class="btn btn-done" 
                            href="index.php?checked=<?php echo $todo['id']?>"
                            >&#10003;</a>     
                        <a id="<?php echo $todo['id'];?>" 
                            class="btn btn-del" 
                            href="index.php?delete=<?php echo $todo['id']?>" 
                            onclick="return confirm('Vill du ta bort uppgiften?')"
                            >&#128465;</a>
                    </div>
                    <?php checkTask($todo['checked'])?>
                    <?php }
            } ?>
        </section>

<?php include 'includes/footer.php'?>