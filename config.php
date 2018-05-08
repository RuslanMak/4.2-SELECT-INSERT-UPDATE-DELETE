<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=netolg4v2;charset=utf8', 'root', 'mysql');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

