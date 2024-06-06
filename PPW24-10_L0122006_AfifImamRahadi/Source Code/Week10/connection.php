<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "user";
    $connection = new mysqli($servername, $username, $password);

    if ($connection->connect_error)
    {
        die("Connection failed : ". $connection->connect_error);
    }

    $createDatabse = "CREATE DATABASE IF NOT EXISTS user";
    if(!$connection->query($createDatabse) === TRUE)
    {
        echo "Error create database : " . $connection->error;
    }

    if (!$connection->select_db($database) === TRUE) {
        echo "Error select database : " . $connection->error;
    }

    $createTableQuery = "CREATE TABLE IF NOT EXISTS data_user (
        id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(32) NOT NULL,
        password VARCHAR(32) NOT NULL
    )";
    if (!$connection->query($createTableQuery) === TRUE) {
        echo "Error create table : " . $connection->error;
    }
?>