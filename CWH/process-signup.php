<?php
    if (empty($_POST["username"])) {
        die("Name is a required field");
    }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email");
    }
    if (strlen($_POST["pwd"]) < 8) {
        die("Password must be at least 8 characters");
    }
    if (!preg_match("/[a-zA-Z]/", $_POST["pwd"])) {
        die("The password must contain at least one letter");
    }
    if (!preg_match("/[0-9]/", $_POST["pwd"])) {
        die("The password must contain at least one number");
    }
    if ($_POST["pwd"] != $_POST["password_conformation"]) {
        die("Passwords in repeat password and password are not matching");
    }
    $password_hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);    

    $mysqli = require __DIR__ . "/credits.php";

    $sql = "INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss", $_POST["username"], $_POST["email"], $password_hash);
    if (!$stmt->execute()) {
        // Redirect to index.php with an error message if execution fails
        header("location: index.php?error=signup_failed");
        exit;    
    } else {
        // Redirect to index.php if execution is successful
        header("location: index.php");
        exit;
    }   
     


