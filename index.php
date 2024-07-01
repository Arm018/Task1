<?php
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $user_password = password_hash($password, PASSWORD_BCRYPT);

    $db_name = "user";
    $localhost = "localhost";
    $root = 'root';
    $db_password = '';

    try {

        $conn = new PDO("mysql:host=$localhost;dbname=$db_name", $root, $db_password);


        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("INSERT INTO user_info (name, email, password) VALUES (:name, :email, :password)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $user_password);


        if ($stmt->execute()) {
            echo "You have successfully registered!";
        } else {
            echo "Error: Failed to execute SQL statement.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }


} else {
    echo "You have not been registered as all fields are required.";
}
?>
