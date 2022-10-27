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