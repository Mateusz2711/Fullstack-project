<?php

$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$db   = 'circuleather';


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Conectie fout met database " . $conn->connect_error);
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
<link rel="stylesheet" href="circuleather.css">
<body>

<h1>Vorrad</h1>
<?php if ($result && $result->num_row>0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>kleur</th>
                <th>gewicht (kg)</th>
                <th>bruikbaar</th>
                <th>soort</th>
                <th>manier van looien</th>
            </tr>    
        </thead>
    

    <tbody>
        <?php while($row=$result->fetch_assoc()): ?>
            <tr>
                <td><?=htmlspecialchars($row['idProduct'])?></td>
                <td><?=htmlspecialchars($row['kleur'])?></td>
                <td><?=htmlspecialchars($row['gewicht in kg'])?></td>
                <td><?=htmlspecialchars($row['bruikbaar'])?></td>
                <td><?=htmlspecialchars($row['soort'])?></td>
                <td><?=htmlspecialchars($row['manier van looien'])?></td>
                <td><?=htmlspecialchars($row['maat'])?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else:?>
        <p> Geen data of tabel is leeg </p>
    <?php endif; ?>
    <?php $conn->close();?>



</body>
</html>