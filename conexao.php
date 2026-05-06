<?php

$servidor = "localhost";
$usuario = "root"; 
$senha = "";       
$banco = "dados_clinica";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Deu ruim na conexão: " . mysqli_connect_error());
}
?>