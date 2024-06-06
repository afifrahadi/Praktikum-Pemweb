<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "team";
    $connection = new mysqli($servername, $username, $password);

    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $createDatabase = "CREATE DATABASE IF NOT EXISTS team";
    if (!$connection->query($createDatabase) === TRUE) {
        echo "Error create database : " . $connection->error;
    }
    
    if (!$connection->select_db($database) === TRUE) {
        echo "Error select database : " . $connection->error;
    }

    $createTableQuery = "CREATE TABLE IF NOT EXISTS data_team (
        id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nama_tim VARCHAR(64) NOT NULL,
        captain VARCHAR(32) NOT NULL,
        asal VARCHAR(64) NOT NULL,
        umur INT(32) NOT NULL,
        gambar VARCHAR(64) NOT NULL
    )";
    if (!$connection->query($createTableQuery) === TRUE) {
        echo "Error create table : " . $connection->error;
    }
?>