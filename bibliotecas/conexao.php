<?php
try {
    $connLogin = mysqli_connect('127.0.0.1', 'root', '', 'base_crud');
    $conn = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_BASE,
    DB_USER, DB_SENHA);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
