<?php





$connect = new mysqli('localhost', 'root', '', 'site');// Подключается к базе данных 
$result=mysqli_query($connect, "SELECT * FROM `product`");

if (isset($_GET['title']) != $_SESSION['title'] ) {

    $title = $_GET["title"];
    $cost=$_GET["cost"];
    $text = $_GET["text"];
    $img=$_GET['img'];
    $query=$connect->query("SELECT FROM `product` (`id`, `title`, `cost`, `text`, `img`) 
    VALUES (NULL, '$title', '$cost', '$text', '$img')");
    header('Location:products.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css.css" rel="stylesheet"><link>
    <title>Products</title>
</head>
<body>
<header>
        <div class="container">
            <div class="header">
                <div class="nav">
                    <img src="./img/logo.png" alt="logo">
                    <ul class="menu">
                        <li>
                            <a href="#">
                                Main
                            </a> 
                        </li>
                        <li>
                            <a href="#">
                                Products
                            </a> 
                        </li>
                        <li>
                            <a href="#">
                                Members
                            </a> 
                        </li>
                        <li>
                            <a href="#">
                                Contacts
                            </a> 
                        </li>
                        <li>
                            <a href="#">
                                Cart
                            </a> 
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="main_wrapper">
    
    <h1 class="products_h1">
        Products
    </h1>
    <form method='POST'>   
        


    <?


$comments = $connect->query("SELECT * FROM product");

if(mysqli_num_rows($result)==0): ?>

<span>На данный момент ничего нет</span>

<? endif;

while ($comments=mysqli_fetch_assoc($result))
    {
        echo "<div class='product_card'> ";
        echo "<h1 class='h1_card''> " . $comments['title'] . "</h1>";
        
        
        
        echo "<h5 class=card_h5>" . $comments['text']  . "</h5>";
        echo "<p class='card_p'>" . $comments['cost']  . "$</p>";
        echo "</div> ";

    }


$result->free();

?>
     



</form>

        
    
        
    
        <div class="column_wrap">
                <h2 class="column_h2">
                    Filters
                </h2>
                <ul>
                    <li>
                    <input type="radio" id="radioButton" name=radio checked>
                    <label for="">All</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">Shrimps</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">Crabs</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">Oysters</label>
                    </li>
                </ul>
            </div>
            <div class="column_wrap">
                <h2 class="column_h2">
                Cost
                </h2>
                <ul>
                    <li>
                    <input type="radio" id="radioButton" name=radio checked>
                    <label for="">All</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">From 1000 to 2999 €</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">From 3000 to 4999 €</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">From 5000 to 7999 €</label>
                    </li>
                </ul>
            </div>
            <div class="column_wrap">
                <h2 class="column_h2">
                Count
                </h2>
                <ul>
                    <li>
                    <input type="radio" id="radioButton" name=radio checked>
                    <label for="">All</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">From 1 to 5</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">From 5 to 10</label>
                    </li>
                    <li>
                    <input type="radio" id="radioButton" name=radio>
                    <label for="">From 10 to 25</label>
                    </li>
                </ul>
            </div>
    </div>
</body>
</html>l