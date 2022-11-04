<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ściśle tajny</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="ftlo">
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
    <div class="admin">
    <?php 
$db = new mysqli('localhost', 'root', '', 'ristorante');

$q = "SELECT nazwa, cena, times_ordered FROM dania";

$result = $db->query($q);
while($row = $result->fetch_assoc()) {
    echo '<p>'.$row['nazwa']."<br>";
    echo $row['cena'].'<br>';
    echo $row['times_ordered'].'<br></p>';
}
$q2 = "SELECT firstName, lastName, adress, phone, nazwa FROM zamowienia JOIN orderedfood ON orderid = zamowienia.id JOIN dania ON foodid = dania.id GROUP BY";
$result2 = $db->query($q2);
while($row = $result2->fetch_assoc()) {
    echo '<p>'.$row['firstName'].'<br>';
    echo $row['lastName'].'<br>';
    echo $row['adress'].'<br>';
    echo $row['phone'].'<br>';
    echo $row['nazwa'].'<br> </p>';
}


?>
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
