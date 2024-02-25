<?php
$is_invalid=false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "/credits.php";
    $sql = sprintf("SELECT * FROM users WHERE email ='%s'",
        $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if($user) {
        if(password_verify($_POST["password"],$user["password_hash"])){
            session_start();
            $_SESSION["user_id"] = $_SESSION["id"];
            header("Location: index.php");
            exit;   
        }
    }
    $is_invalid = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="vh">
    <h1>Login</h1>

    <?php 
        if ($is_invalid) {
            echo "<em>Invalid, email_id does not exist</em>";
        } 
    ?>


    <form class="vp" action method="POST">
    <h1>Login</h1>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        <label for="password">password</label>
        <input for="phone" name="password" id="password">
        <button>Login</button>
    </form>
</body>
</html>