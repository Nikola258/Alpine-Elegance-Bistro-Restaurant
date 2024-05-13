<?php 
    include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="css/style.css">

    <title>Admin page</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "rootpassword";
$dbname = "Menu";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

    <ul>
        <li><a href="#">Verwijder gerecht</a></li>
        <li><a href="Add.php">Voeg nieuwe gerecht toe</a></li>
        <li><a href="#">Prijs veranderen</a></li>
    </ul>

</body>
</html>