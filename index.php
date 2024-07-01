<?php

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';


    $user_password = password_hash($password, PASSWORD_BCRYPT);

    $db_name = "User";
    $localhost = "localhost";
    $root = 'root';
    $password = '';

    try {

        $conn = new PDO("mysql:host=$localhost;dbname=$db_name", $root, $password);

        $stmt = $conn->prepare("INSERT INTO user_info (name, email, password) VALUES (:name, :email, :password)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $user_password);

        $stmt->execute();

        echo "You have successfully registered!";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
