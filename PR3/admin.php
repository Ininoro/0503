<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}





$connect = new mysqli('localhost', 'root', '', 'site');// Подключается к базе данных 
$query=mysqli_query($connect, "SELECT * FROM `product`");

if (isset($_POST['title']) != $_SESSION['title'] ) {

    $title = $_POST["title"];
    $cost=$_POST["cost"];
    $text = $_POST["text"];
    $img=$_POST['img'];
    $query=$connect->query("INSERT INTO `product` (`id`, `title`, `cost`, `text`, `img`) 
    VALUES (NULL, '$title', '$cost', '$text', '$img')");
    header('Location:/admin.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ</title>
    <link rel="stylesheet" href=".//style.css">
</head>
<body>

    <!-- Профиль -->


    

<form method='POST'>
    
<a href="vendor/logout.php" class="logout">Выход</a>

    <div class="admin_wrapper">
        <h1>Добавление товара</h1>
    <div class="admin_panel">
    <label for="">Название
        <input style="display:flex; font-size:30px;"type="text" name='title' value='' requirded>
        </label>
        <label for="">цена
        <input style="display:flex; font-size:30px;"type="text" name='cost' value='' requirded>
        </label>
        <input style="display:flex;" type="file" name='img'>
        </label>
        <label  for="">описание товара
            <textarea style="resize: none; display:flex; min-width:381px;min-height:300px; font-size:20px; font-family: 'Arial';" name="text" required></textarea>
        </label>
        <input style='min-width:381px;'type="submit" name='submit' value='Создать' requirded>
    </div>

        <?php

$comments = $connect->query("SELECT * FROM product ORDER BY date");
echo "
            <table class=admin_table <tr><th>title</th><th>cost</th><th>text</th><tr>
";


    while ($comments=mysqli_fetch_assoc($query))
    {
        echo "<tr>";
        echo "<td class='td_text'>" . $comments['title'] . "</td>";
        echo "<td class='td_text'>" . $comments['cost'] . "</td>";
        echo "<td class='td_text'>" . $comments['text'] . "</td>";
        echo "<?tr>";
    }
    echo "</table> ";

$query->free();

 ?>


    </form>
    </div>
 



    
</body>
</html>