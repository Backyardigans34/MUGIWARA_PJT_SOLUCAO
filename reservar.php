<?php
include 'conexao.php'; // Puxa a conexão que você já criou

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data = $_POST['data_consulta'];
    $horario = $_POST['horario'];

    // 1. Verifica se o horário já está ocupado no banco
    $sql_busca = "SELECT * FROM agendamentos WHERE data_consulta = '$data' AND horario = '$horario'";
    $resultado = $conn->query($sql_busca);

    echo "<div style='font-family: Arial; text-align: center; margin-top: 50px;'>";

    if ($resultado->num_rows > 0) {
        // Se já existe alguém nesse horário
        echo "<h2 style='color: red;'>❌ Ops! Este horário já está reservado.</h2>";
        echo "<p>Por favor, escolha outro dia ou horário.</p>";
        echo "<a href='index.php'>Voltar para o site</a>";
    } else {
        // 2. Se estiver livre, insere no banco
        $sql_inserir = "INSERT INTO agendamentos (paciente, data_consulta, horario) VALUES ('$nome', '$data', '$horario')";
        
        if ($conn->query($sql_inserir) === TRUE) {
            echo "<h2 style='color: green;'>✅ Agendamento Confirmado!</h2>";
            echo "<p>Tudo certo, <b>$nome</b>! Sua consulta está marcada para o dia <b>$data</b> às <b>$horario</b>.</p>";
            echo "<a href='index.php' style='display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Fazer novo agendamento</a>";
        } else {
            echo "Erro ao salvar: " . $conn->error;
        }
    }
    echo "</div>";
}
$conn->close();
?>