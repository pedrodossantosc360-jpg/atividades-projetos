<?php
$host = "localhost: 3307";
$user = "root"; // usuário padrão do MySQL
$pass = "";     // senha (deixe vazio se estiver no XAMPP)
$db = "tecnsmile";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
