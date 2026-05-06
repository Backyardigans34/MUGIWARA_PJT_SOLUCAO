<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel da Clínica</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f8f9fa; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #007bff; color: white; }
        tr:hover { background: #f1f1f1; }
        .titulo { text-align: center; color: #333; }
    </style>
</head>
<body>
    <h2 class="titulo">📅 Próximas Consultas</h2>
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM agendamentos ORDER BY data_consulta ASC, horario ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Muda a cor da data para PT-BR (Dia/Mês/Ano)
                    $data_formatada = date('d/m/Y', strtotime($row['data_consulta']));
                    echo "<tr>
                            <td>{$row['paciente']}</td>
                            <td>$data_formatada</td>
                            <td>{$row['horario']}</td>
                            <td><span style='color: green;'>● {$row['status']}</span></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' style='text-align:center;'>Nenhuma consulta marcada ainda.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>