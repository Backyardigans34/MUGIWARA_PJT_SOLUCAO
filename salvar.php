<?php
// Arquivo: salvar.php
include 'conexao.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data = $_POST['data'];
$horario = $_POST['horario'];
$medico_id = $_POST['medico_id']; 

$sql = "INSERT INTO agendamentos (nome_paciente, telefone, data_consulta, horario_consulta, medico_id) 
        VALUES ('$nome', '$telefone', '$data', '$horario', '$medico_id')";

if (mysqli_query($conexao, $sql)) {
    echo "<div style='font-family: Arial; text-align: center; margin-top: 50px;'>";
    echo "<h1 style='color: #28a745;'>Consulta marcada com sucesso! ✅</h1>";
    echo "<p>Te esperamos no dia <strong>".date('d/m/Y', strtotime($data))."</strong> às <strong>$horario</strong>.</p>";
    echo "<a href='index.php' style='padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px;'>Fazer novo agendamento</a>";
    echo "</div>";
} else {
    echo "Erro ao marcar consulta: " . mysqli_error($conexao);
}
?>