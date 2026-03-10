<?php
include 'conexao.php';

$data = json_decode(file_get_contents("php://input"), true);

$servico = $data['servico'];
$dia = $data['dia'];
$hora = $data['hora'];

if (empty($servico) || empty($dia) || empty($hora)) {
    http_response_code(400);
    echo "Por favor, preencha todos os campos.";
    exit;
}

$sql = "INSERT INTO consultas (servico, data, hora) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $servico, $dia, $hora);

if ($stmt->execute()) {
    echo "✅ Consulta agendada com sucesso!";
} else {
    http_response_code(500);
    echo "❌ Erro ao agendar!";
}
?>

