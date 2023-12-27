<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $selectedPlan = htmlspecialchars($_POST['plan']);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $aemail = filter_input(INPUT_POST, 'aemail', FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $aphone = htmlspecialchars($_POST['aphone']);


    // File upload handling
    $uploadDir = "uploads/";

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadFile = $uploadDir . basename($_FILES["photo"]["name"]);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadFile)) {
        // File has been successfully uploaded
        // Now, insert the data and file path into the database
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "8439";
        $dbName = "registration";

        $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($conn->connect_error) {
            die("Connection failed: " . htmlspecialchars($conn->connect_error));
        }

        $sql = "INSERT INTO registration_data (name, selected_plan, email, aemail, phone, aphone, file_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $name, $selectedPlan, $email, $aemail, $phone, $aphone, $uploadFile);

        if ($stmt->execute()) {
            echo "Data and file have been successfully submitted to the database.";
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Error uploading the file.";
    }
}
?>
