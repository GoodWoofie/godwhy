<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/newsletter.css">
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
    <p>Aby zarejestrować się do newslettera wpisz email</p>
    <div class="That's all">
    <form action="newsletter.php" method="POST">
        <label for="Zarejestruj"> Wpisz Email:</label><br>
        <input type="text" name="email" id="email">
        <input type="submit" value="Zarejestruj">
    </form>
    </div>
    <?php 
    if(isset($_REQUEST['email'])){
    $db = new mysqli('localhost', 'root', '', 'ristorante');
    $email = $_REQUEST['email'];
    $q = $db->prepare('INSERT INTO newsletter(email) VALUES (?)');
    $q->bind_param('s', $email);
    $q->execute();
    $db->close();
    echo "pomyślnie dodano email do newslettera!";
    header('Refresh: 5; url="index.html"');
    }

    ?>
    </div>
</body>
</html>