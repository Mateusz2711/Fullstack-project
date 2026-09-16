<?php

$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$db   = 'circuleather';


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Conectie fout met database: " . $conn->connect_error);
}


$kleur = $_POST['kleur'] ?? '';
$gewicht = $_POST['kg'] ?? '';
$gewicht = floatval($gewicht);
$soort = $_POST['soort'] ?? '';
$manierVanLooien = $_POST['manier_van_looien'] ?? '';
$maat = $_POST['maat'] ?? '';


if (isset($_POST['submit'])) {
    if (!empty($kleur) && !empty($gewicht) && !empty($soort) && !empty($manierVanLooien) && !empty($maat)) {
        $sql = "INSERT INTO vorrad (kleur, `gewicht in kg`, bruikbaar, soort, `manier van looien`, maat) VALUES (?, ?, 1, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsss", $kleur, $gewicht, $soort, $manierVanLooien, $maat);
        if ($stmt->execute()) {
            echo "Nieuw product is succesvol toegevoegd.";
        } else {
            echo "Fout bij het toevoegen van het product: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Vul alle velden in om een nieuw product toe te voegen.";
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel=stylesheet href="circuleather.css">
</head>
<body>

<h1> nieuw product</h1>

<form action="nieuwProduct.php" method="post">
    <div>
        <label for="kleur">Kleur:</label>
        <input id="kleur" type="text" name="kleur" required>
    </div>
    <div>
        <label for="kg">Gewicht (kg):</label>
        <input id="kg" type="number" name="kg" required>
    </div>
    <div>
        <label for="soort">Soort:</label>
        <input id="soort" type="text" name="soort" required>
    </div>
    <div>
        <label for="maat">Maat:</label>
        <input id="maat" type="text" name="maat" required>
    </div>
    <div>
        <label for="bruikbaar">Bruikbaar:</label>
        <input id="bruikbaar" type="number" name="bruikbaar" required>
    </div>
    <div>
        <label for="manier_van looien">Manier van looien:</label>
        <select id="manier_van looien" name="manier_van_looien" required>
            <option value="naturel">Naturel</option>
            <option value="chemisch">Chemisch</option>
        </select>
    </div>
    <button type="submit" name="submit">toevoegen</button>



</form>



    

</body>
</html>