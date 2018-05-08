<?php 

try {
//    $db = new PDO('mysql:host=localhost;dbname=netolg4v2;charset=utf8', 'root', 'mysql');
    $db = new PDO('mysql:host=localhost;dbname=rmakarov;charset=utf8', 'rmakarov', 'neto1741');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

