<?php 

include_once 'config.php';

$description = "";
$action = !empty($_GET['action']) ? $_GET['action'] : null;
$orderBy = "date_added";
$sortVariants = ['date_added', 'description', 'is_done'];

//Сортировка
if (isset($_POST['sort']) && !empty($_POST['sort_by']) && in_array($_POST['sort_by'], $sortVariants)) {
    $orderBy = $_POST['sort_by'];
}

$sql = "SELECT * FROM tasks ORDER BY $orderBy";
$sth = $db->prepare($sql);
$sth->execute();

// Редактирование, изменение, удаление
if (!empty($action) && !empty($_GET['id'])) {
	$id = (int)$_GET['id'];
    if ($action=='done') {
	    $sth=$db->prepare("UPDATE tasks SET is_done = 'Выполнено' WHERE id=?");
        $sth->execute([$id]);

        header('Location: index.php', true, 302 );
    }

    if ($action=='delete') {
	    $sth=$db->prepare("DELETE FROM tasks WHERE id = ?");
        $sth->execute([$id]); 

        header("Location: index.php", true,302 );
    }

    if ($action == 'change') {
        $sth = $db->prepare("SELECT description FROM tasks WHERE id = ?");
        $sth->execute([$id]);

        header("Location: index.php", true, 302 );  
    }
}

