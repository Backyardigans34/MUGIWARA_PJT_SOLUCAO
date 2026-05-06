<?php
// Arquivo: salvar.php

include 'conexao.php';

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data = $_POST['data'];
$horario = $_POST['horario'];

// Os nomes das colunas aqui estão exatamente iguais aos da sua imagem
$sql = "INSERT INTO agendamentos (nome_paciente, telefone, data_consulta, horario_consulta) 
        VALUES ('$nome', '$telefone', '$data', '$horario')";

if (mysqli_query($conexao, $sql)) {
    echo "<h1>Consulta marcada com sucesso! ✅</h1>";
    echo "<p>Te esperamos no dia $data às $horario.</p>";
    echo "<a href='index.php'>Voltar</a>";
} else {
    echo "Erro ao marcar consulta: " . mysqli_error($conexao);
}
?>