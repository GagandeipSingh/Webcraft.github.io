<?php
session_start();

function csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

$servername = "localhost";
$username = "root";
$password = "8439";
$dbname = "messages"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$number = filter_var($_POST['number'], FILTER_VALIDATE_INT);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

$stmt = $conn->prepare("INSERT INTO form_data (name, email, number, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $email, $number, $message);
$stmt->execute();

$stmt->close();
$conn->close();
?>
