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
$servername = "localhost";
$username = "root";
$password = "rootpassword";
$dbname = "Menu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
    
    <ul>
        <li><a href="#">Verwijder gerecht</a></li>
        <li><a href="Add.php">Voeg nieuwe gerecht toe</a></li>
        <li><a href="#">Prijs veranderen</a></li>
    </ul>

</body>
</html>