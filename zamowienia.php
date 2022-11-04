<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/koszyk.css">
</head>
<body>
<div class="header">
        <div class="logo">
            <img src="logo.png" width="20%">
        </div>
        <div class="pasek">
            <ul>
                <li><a href="index.html" class="pasekg">główna</a></li>
                <li><a href="onas.html" class="pasekg">o nas</a></li>
                <li><a href="lokal.html" class="pasekg">lokal</a></li>
                <li><a href="zamow.html" class="pasekg">zamów</a></li>
                <li><a href="menu.html" class="pasekg">menu</a></li>
            </ul>
        </div>
        <div class="newsletter">
            <a href="newsletter.php" class="guzik">NEWSLETTER</a>
        </div>
    </div>
    <div class="main">
        <p class="pls">By dodać więcej elementów kliknij <a href="zamow.html">TUTAJ</a>! <br>
        Cofając stronę wrócisz dokładnie do strony, na której byłeś wcześniej, więc cokolwiek dodasz - zniknie i cokolwiek usuniesz - wróci! To może być niezamierzony efekt.</p>
    <?php
    //var_dump($_REQUEST);
    //var_dump($_SESSION);
    if(isset($_REQUEST['id'])){
        if(isset($_SESSION['cart'])) {
            array_push($_SESSION['cart'], $_REQUEST['id']);
        } else {
            $_SESSION['cart'] = array();
            array_push($_SESSION['cart'], $_REQUEST['id']);
        }
    }
    if(isset($_REQUEST['remove']))
    array_splice($_SESSION['cart'], $_REQUEST['remove'], 1);
    if (isset($_SESSION['cart'])) {
        $db = new mysqli('localhost', 'root', '', 'ristorante');
        $q = "SELECT nazwa, cena, id FROM dania";
        $result = $db->query($q);
        $names = array();
        $prices = array();
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['nazwa'];
            $price = $row['cena'];
            $names[$id] = $name;
            $prices[$id] = $price;
        }
        echo '<table>';
        $sum = 0;
        foreach($_SESSION['cart'] as $id => $cartItem) {
            echo '<tr>';
            echo '<td>'.$names[$cartItem].'</td>';
            echo '<td>'.$prices[$cartItem]. '</td>';
            echo '<td><a href="zamowienia.php?remove='.$id.'">Usuń</a></td>';
            echo '</tr>';
            $sum += $prices[$cartItem];
        }
        echo '</table>';

        echo 'Suma zamówienia: '.$sum.'zł';
    } else {
        echo 'Koszyk jest pusty!';
    }
    ?>
    <p>Podaj swoje dane aby zamówić</p>
    <form action="order.php">
        <label for="firstName">Imie:</label>
        <input type="text" name="firstName"><br>

        <label for="lastName">Nazwisko:</label>
        <input type="text" name="lastName"><br>

        <label for="adress">Adres:</label>
        <input type="text" name="adress"><br>

        <label for="phone">Numer telefonu:</label>
        <input type="text" name="phone"><br>
        
        <input class="guzior" type="submit" value="Zamów">
    </form>
</div>

<div class="wlochy">
        <footer>
            <div class="yezu">
                <p>Ristorante Deliciosa<br>
                    ulica Dmowskiego 16A w Gdańsku<br>
                    numer telefonu: 000 000 000

                <p> JM, KK, KK</p>
            </div>
        </footer>
    </div>

</body>
</html>