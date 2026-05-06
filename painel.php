<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel da Clínica</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
    </style>
</head>
<body>

    <h2>Agenda do Dia 📅</h2>
    <a href="index.php">⬅ Voltar para o agendamento</a>

    <table>
        <tr>
            <th>Nome do Paciente</th>
            <th>Telefone</th>
            <th>Data</th>
            <th>Horário</th>
        </tr>

        <?php
        $sql = "SELECT * FROM agendamentos ORDER BY data_consulta, horario_consulta";
        $resultado = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['nome_paciente'] . "</td>";
            echo "<td>" . $linha['telefone'] . "</td>";
            echo "<td>" . date('d/m/Y', strtotime($linha['data_consulta'])) . "</td>"; 
            echo "<td>" . $linhsa['horario_consulta'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>