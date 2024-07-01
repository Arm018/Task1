<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_password = password_hash($_POST['password'],PASSWORD_BCRYPT);

    $db_name = "User";
    $localhost = "localhost";
    $root = 'root';
    $password = '';

    $conn = mysqli_connect($localhost, $root, $password, $db_name);
    if (!$conn)
    {
        echo "Error: " . mysqli_connect_error();
    }

    $sql = mysqli_query($conn,"INSERT INTO user_info (name, email, password) VALUES ('$name', '$email', '$user_password')");

    echo "You have successfully registered!";

