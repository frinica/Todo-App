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
            <form action="index.php" method="POST" class="form">
                <input type="text" name="title" class="form-input" placeholder="Titel" required>
                <input type="text" name="comment" class="form-input" placeholder="Kommentar" autocomplete="off">
                <input type="submit" name="submit" class="form-input" value="Skapa uppgift!">
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
                    <h2><?php echo $todo['title'];?></h2>
                    <p><?php echo $todo['comment'];?></p>
                        <a id="<?php echo $todo['id'];?>" 
                            class="check-btn" 
                            href="index.php?checked=<?php echo $todo['id']?>"
                            >Klar</a>     
                        <a id="<?php echo $todo['id'];?>" 
                            class="delete-btn" 
                            href="index.php?delete=<?php echo $todo['id']?>" 
                            onclick="return confirm('Vill du ta bort uppgiften?')"
                            >Ta bort</a>
                </div>
                <?php checkTask($todo['checked'])?>
                <?php } ?>
                
            <? } ?>
            
            

        </section>

<?php include 'includes/footer.php'?>