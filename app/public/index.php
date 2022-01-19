<?php

$db = new PDO('mysql:host=mysql;dbname=tutorial', 'tutorial', 'secret');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$rows = $db->query('SELECT * FROM book2 ORDER BY title');

foreach ($rows as $row) {
    var_dump($row);
}

phpinfo();
