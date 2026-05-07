<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel da Clínica</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        h2 { color: #333; }
        .tabela-container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); margin-top: 20px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 600px; }
        th, td { border-bottom: 1px solid #ddd; padding: 15px 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .voltar { text-decoration: none; color: white; background: #6c757d; padding: 10px 15px; border-radius: 5px; }
    </style>
</head>
<body>

    <h2>Agenda Geral da Clínica 📅</h2>
    <a href="index.php" class="voltar">⬅ Voltar para o Site</a>

    <div class="tabela-container">
        <table>
            <tr>
                <th>Médico Responsável</th>
                <th>Nome do Paciente</th>
                <th>Telefone</th>
                <th>Data</th>
                <th>Horário</th>
            </tr>

            <?php
            // Puxa os dados cruzando a tabela de agendamentos com a de médicos
            $sql = "SELECT agendamentos.*, medicos.nome AS nome_medico 
                    FROM agendamentos 
                    JOIN medicos ON agendamentos.medico_id = medicos.id 
                    ORDER BY data_consulta, horario_consulta";
                    
            $resultado = mysqli_query($conexao, $sql);

            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td><strong>" . $linha['nome_medico'] . "</strong></td>";
                echo "<td>" . $linha['nome_paciente'] . "</td>";
                echo "<td>" . $linha['telefone'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($linha['data_consulta'])) . "</td>"; 
                echo "<td>" . $linha['horario_consulta'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

</body>
</html>