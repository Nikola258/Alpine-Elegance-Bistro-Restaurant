<?php
phpinfo();
?>

<?php
include "connect.php";

if (isset($_SESSION['user_name'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        $error = "User Name is required";
    } elseif (empty($pass)) {
        $error = "Password is required";
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
            header("Location: index.php");
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

<form action="Login Page.php" method="post">
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