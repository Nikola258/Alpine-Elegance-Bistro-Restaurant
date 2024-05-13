<?php
require_once 'connect.php';

if (isset($_SESSION['user_name'])) {
    header("Location: Admin-page.php");
    exit();
}

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data, $min_length = 1) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        if (strlen($data) < $min_length) {
            return false;
        }

        return $data;
    }

    $uname = validate($_POST['uname'], 3);
    $pass = validate($_POST['password'], 6);

    if (!$uname || !$pass) {
        $error = "User name and password must be at least 3 and 6 characters long, respectively.";
    } else {
        $sql = "SELECT * FROM users WHERE user_name = :uname";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':uname', $uname);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result && $result['password'] === $pass) {
            $_SESSION['user_name'] = $result['user_name'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['id'] = $result['id'];
            header("Location: Admin-page.php");
            exit();
        } else {
            $error = "Incorrect User name or password";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Login-And-Logout.css">
    <title>Login Page</title>
</head>
<body>

<form action="Admin-page.php" method="post">
    <h2>LOGIN</h2>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <label>User Name</label>
    <input type="text" name="uname" placeholder="User Name"><br>

    <label>Password</label>
    <input type="password" name="password" placeholder="Password"><br>

    <button type="submit">Login</button>
</form>

</body>
</html>