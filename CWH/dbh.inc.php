<?php
    $host='localhost';
    $dbname='fly';
    $dbUsername='root';
    $dbPassword= '';
    try {
        $pdo = new PDO("mysql:host=$hostdbname",$dbUsername,$dbPassword);   
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed:" . $e->getMessage());
    }