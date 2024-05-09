<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
</head>
<body>
<?php
$dsn = 'mysql:dbname=YourDatabaseName;host=localhost';
$username = 'YourUsername';
$password = 'YourPassword';

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: '. $e->getMessage();
}
?>
    
    <ul>
        <li><a href="#">Verwijder gerecht</a></li>
        <li><a href="Add.php">Voeg nieuwe gerecht toe</a></li>
        <li><a href="#">Prijs veranderen</a></li>
    </ul>

</body>
</html>