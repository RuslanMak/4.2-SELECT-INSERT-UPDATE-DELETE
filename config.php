<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=netolg4v2', 'root', 'mysql');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

