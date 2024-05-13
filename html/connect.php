<?php
session_start();
?>

<?php


$host = 'localhost';
$dbname = 'Menu';
$username = 'root';
$password = 'rootpassword';


    try {
        $pdo = new PDO("mysqli:host=$host;dbname=$dbname", $username, $password);
    
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";

    
        $stmt = $pdo->prepare("SELECT * FROM Menu");
        $stmt->execute();

    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
        foreach ($results as $row) {
            echo "<div class='name'>" . $row['name'] . "</div>";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="css/style.css">

    <title>Document</title>
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