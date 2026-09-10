<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
$host = 'mysql';
$user = 'root';
$pass = 'rootpassword';
$db   = 'circuleather';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("fout to conect " . $conn->connect_error);
}
echo "Conected met database";
?>

<body>
<?php echo "Hello World"; ?>
<h1>Welcome to my website</h1>
</body>
</html>