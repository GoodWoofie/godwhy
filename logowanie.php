<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="global.css">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <p>Logowanie do zaplecza administracyjnego</p>
        <label for="Login">Login:</label>
        <input type="text" name="login" id="login">
        <label for="pass">Hasło:</label>
        <input type="text" name="pass" id="pass">
        <input type="submit" value="Zaloguj">
    </form>
    <?php
    if(isset($_REQUEST['login']) && isset($_REQUEST['pass'])){
        $login = $_REQUEST['login'];
        $pass = $_REQUEST['pass'];
        $db = new mysqli('localhost','root','','ristorante');
        $q = $db->prepare("SELECT login, pass FROM personel WHERE login = ? AND pass = ?");
        $q->bind_param('ss', $login, $pass);
        $q->execute();
        $q->bind_result($login1, $pass1);
        $q->fetch();
        if($login1 == NULL && $pass1 == NULL){
            echo "Dane logowania niepoprawne";
        }else{
            header('Refresh: 0; url="admin.php"');
        }
    }

    ?>
</body>
</html>