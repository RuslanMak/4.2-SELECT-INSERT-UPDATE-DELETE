<?php 
include_once 'config.php';
include_once 'change.php';

$sql = "SELECT * FROM tasks";
$is_done = $sth->fetchAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список дел</title>

    <style>
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid #ccc;
            padding: 5px;
        }

        table th {
            background: #eee;
        }

        .form-sort {
            display: inline-block;
        }

        .form-sort:first-child {
            margin-right: 20px;
        }

    </style>
</head>
<body>
<h1>Список дел на сегодня</h1>
<div class="form">
    <form class="form-sort" method="POST" action="add.php" >
        <input type="text" name="description" placeholder="Описание задачи"   />
        <input type="submit" name="save" value="Добавить">
    </form>

    <form  class="form-sort" method="POST">
        <label for="sort">Сортировать по:</label>
        <select name="sort_by">
            <option value="date_add">Дате добавления</option>
            <option value="status">Статусу</option>
            <option value="description">Описанию</option>
        </select>
        <input type="submit" name="sort" value="Отсортировать">
    </form>
</div> <br>
<table>
    <tr>
        <th>Описание задачи</th>
        <th>Дата добавления</th>
        <th>Статус</th>
        <th></th>
    </tr>
    <?php foreach ($is_done as $row): ?>
        <tr>
            <td><?= $row['description'] ?></td>
            <td><?= $row['date_added'] ?></td>
            <td><?= $row['is_done'] ?></td>
            <td>
                <a href='change.php?id=<?= $row['id']?> &action=change'>Изменить</a>
                <a href='change.php?id=<?= $row['id']?> &action=done'>Выполено</a>
                <a href='change.php?id=<?= $row['id']?> &action=delete'>Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>