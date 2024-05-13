<?php
$host = 'mysql_db';
$dbname = 'Menu';
$username = 'root';
$password = 'rootpassword';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $stmt = $pdo->prepare("SELECT * FROM Menu1");
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        echo "<div class='name'>" . htmlspecialchars($row['name']) . "</div>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>