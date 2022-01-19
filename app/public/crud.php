<?php
//obs mysql som host
$db = new PDO(
    'mysql:host=mysql;dbname=tutorial',
    'tutorial',
    'secret'
);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //förklara de olika, associativ array pdo, 

//visa, gör om till funktion efteråt
function viewBooks()
{
    global $db;
    $rows = $db->query('SELECT * FROM book ORDER BY title');
    foreach ($rows as $row) {
        var_dump($row);
    }
}

// sätt in (förklara heredoc)
/* $query = <<<SQL
INSERT INTO book (isbn, title, author)
VALUES ("9788187981954", "Peter Pan", "J. M. Barrie")
SQL;
$result = $db->exec($query);
var_dump($result); // true */

$query = 'SELECT * FROM book WHERE author = :author'; //statement bind value (se nedan)
$statement = $db->prepare($query); //förbereder query, för att se till att vi enbart gör queries som vi vill, säkerhetsrisk annars, gör även att vi kan bygga queries mer dynamiskt och byta ut author t ex
$statement->bindValue('author', 'George Orwell'); //här sätts bind value
$statement->execute();
$rows = $statement->fetchAll();
var_dump($rows);

//lägg till params för att bygga dynamisk insert
/* $query = <<<SQL
INSERT INTO book (isbn, title, author)
VALUES (:isbn, :title, :author)
SQL;
$statement = $db->prepare($query);
$params = [
    'isbn' => '9781412108614',
    'title' => 'Iliad',
    'author' => 'Homer'
];
$statement->execute($params);
echo $db->lastInsertId(); */

function changeTitle(int $id, string $newTitle): void
{
    global $db;
    $query = 'UPDATE book SET title = :title WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue('id', $id);
    $statement->bindValue('title', $newTitle);
    $statement->execute();
    $rows = $statement->rowCount();
    if (!$rows) {
        echo "No book updated ";
    }
    echo "Changed rows: $rows.";
}

function deleteBook(int $id): void
{
    global $db;
    $query = 'DELETE FROM book WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue('id', $id);
    $statement->execute();
    $rows = $statement->rowCount();
    if (!$rows) {
        echo "No book deleted. ";
    }
    echo "Deleted books: $rows.";
}

changeTitle(6, "hej");
deleteBook(1);
viewBooks();
