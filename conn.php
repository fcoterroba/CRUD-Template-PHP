<?php
try {
    $dbh = new PDO("mysql:host=127.0.0.1;dbname=crud_example_php", "fcoterroba", "Password123#@!");
} catch (PDOException $e){
    echo $e->getMessage();
}
?>