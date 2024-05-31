<?php
$servername = "localhost"; // Zmień, jeśli używasz innego serwera
$username = "root"; // Twoja nazwa użytkownika
$password = ""; // Twoje hasło
$dbname = "ksiegarnia";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
