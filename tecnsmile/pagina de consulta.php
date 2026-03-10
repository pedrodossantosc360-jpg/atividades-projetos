<?php
include 'conexao.php';

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servico = $_POST['selecao'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];

    if (!empty($servico) && !empty($dia) && !empty($hora)) {
        $sql = "INSERT INTO consultas (servico, data, hora) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $servico, $dia, $hora);
        $stmt->execute();

        echo "<script>alert('✅ Consulta agendada com sucesso!');</script>";
    } else {
        echo "<script>alert('⚠️ Preencha todos os campos!');</script>";
    }
}

// Buscar todas as consultas
$result = $conn->query("SELECT * FROM consultas ORDER BY data, hora");
$totalConsultas = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnSmile</title>
    <link rel="stylesheet" href="smile.css">
</head>
<style>
form {
  background-color: rgba(255, 255, 255, 0.95);
  width: 400px;
  margin: 40px auto;
  padding: 25px;
  border-radius: 20px;
  box-shadow: 2px 3px 8px rgba(0,0,0,0.3);
  text-align: center;
  transition: all 0.4s ease;
}

form:hover {
  transform: scale(1.02);
}

/* Inputs e Select */
select,
input[type="date"],
input[type="time"],
input[type="text"] {
  width: 80%;
  padding: 10px;
  margin: 10px 0;
  border: 2px solid rgb(33, 3, 73);
  border-radius: 10px;
  background-color: #f9f9ff;
  color: #000;
  font-size: 15px;
  transition: 0.3s ease;
  box-shadow: inset 1px 1px 5px rgba(0,0,0,0.1);
}

/* Efeito ao clicar/focar */
select:focus,
input:focus {
  outline: none;
  border-color: rgb(0, 255, 0);
  box-shadow: 0 0 8px rgba(0,255,0,0.4);
  background-color: white;
}

/* Botão de envio */
input[type="submit"] {
  background-color: blue;
  color: white;
  padding: 12px 25px;
  font-size: 16px;
  border-radius: 10px 14px 0px 12px;
  border: none;
  box-shadow: 2px 3px 5px 1px rgb(33, 3, 73);
  cursor: pointer;
  transition: all 0.3s ease;
}

input[type="submit"]:hover {
  background-color: rgb(0, 255, 0);
  color: blue;
  transform: scale(1.05);
}

/* ===== CONTADOR DE CONSULTAS ===== */
#conta {
  text-align: center;
  margin-top: 30px;
  background-color: white;
  width: 300px;
  border-radius: 15px;
  padding: 10px;
  box-shadow: 2px 3px 8px rgba(0,0,0,0.2);
}

#textoso {
  font-size: 40px;
  color: blue;
}

/* ===== TITULOS ===== */
h1, h2, h3 {
  font-family: 'Poppins', sans-serif;
  color: rgb(33, 3, 73);
  text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
}

    </style>
<body>
    <header>
        <img src="imagens/smileimage.jpg" alt="" id="logo4" align="left">
        <nav align="center">
            <a href="#"><input type="button" value="Consultas" id="bp"></a>
            <a href="#"><input type="button" value="Início" id="bp"></a>
            <a href="#"><input type="button" value="Perfil" id="bp"></a>
            <a href="#"><input type="button" value="Central de Ajuda" id="bp"></a>
        </nav>
    </header>

    <div align="center">
        <h1>TecnSmile: Redefinindo a arte de sorrir com tecnologia.</h1>
    </div>

    <div id="conta" align="center">
        <h1>Consultas marcadas</h1>
        <h2><?= $totalConsultas ?></h2>
    </div>

    <form action="index.php" method="POST" id="ff">
        <div align="center">
            <h3>Agende sua consulta</h3>
            <select name="selecao" id="selecao">
                <option value="">Selecione um serviço</option>
                <option value="Check-up Digital">Check-up Digital</option>
                <option value="Clareamento Dental">Clareamento Dental</option>
                <option value="Limpeza Profissional">Limpeza Profissional</option>
                <option value="Restaurações">Restaurações</option>
                <option value="Aparelho">Aparelho</option>
                <option value="Outros">Outros</option>
            </select><br><br>

            <input type="date" name="dia" id="dia" required><br><br>
            <input type="time" name="hora" id="hora" required><br><br>
            <input type="submit" value="Agendar">
        </div>
    </form>

    <hr>
    <div align="center">
        <h3>Consultas agendadas</h3>
        <table border="1" cellpadding="10">
            <tr>
                <th>ID</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['servico'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['data'])) ?></td>
                <td><?= date('H:i', strtotime($row['hora'])) ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
