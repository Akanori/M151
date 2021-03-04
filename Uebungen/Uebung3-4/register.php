<?php

session_start();

include_once "db.php";

$db = DB::get();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $db->query("INSERT INTO users(username, password) VALUES (:username, :password);", [
        ':username' => $username,
        ':password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
}