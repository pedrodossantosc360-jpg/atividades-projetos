<?php
include 'conexao.php';

$result = $conn->query("SELECT * FROM consultas ORDER BY data, hora");

$consultas = [];
while ($row = $result->fetch_assoc()) {
    $consultas[] = $row;
}

header('Content-Type: application/json');
echo json_encode($consultas);
?>

