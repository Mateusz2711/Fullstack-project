<?php

$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$db   = 'circuleather';


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}


$sql = "SELECT idProduct, kleur, `gewicht in kg`, bruikbaar, soort, `manier van looien`, maat FROM vorrad";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input id="kleur" type="text" name="kleur">
    <input id="gewicht in kg" type="number" name="kg">
    <input id="soort" type="text" name="soort">
    <input id="maat" type="text" name="maat">
    <input id="bruikbaar" type="number" name="bruikbaar">
    <Select id="manier van looien"> 
        <option>naturel</option>
        <option>chemisch</option>
</body>
</html>