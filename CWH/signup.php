<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="vh">
        <form class="vp" action="process-signup.php" method="post" novalidate>
        <h1>Signup</h1>
                <div>
                <label for="name">User name</label>
                <input type="text" id="name" name="username" placeholder="your name">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Your Email">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="pwd" placeholder="your password">
                </div>
                <div>
                    <label for="password_conformation">Repeat password</label>
                    <input type="password" id="password_conformation" name="password_conformation" placeholder="re-enter the password">
                </div>
                <button>Signup</button>
                <a href="login.php">Login</a>
        </form>
</body>
</html>