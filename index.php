<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Clínica Mugiwara - Agendamento</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; text-align: center; }
        .caixa { background: white; padding: 30px; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0,0,0,0.1); display: inline-block; text-align: left; max-width: 600px; width: 100%; }
        
        input[type="text"], input[type="date"] { display: block; width: 95%; margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; }
        
        /* Ajuste do grid para caber os 5 médicos bonitinhos */
        .grid-opcoes { display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 25px; justify-content: center; }
        .grid-opcoes label { cursor: pointer; }
        .grid-opcoes input[type="radio"] { display: none; /* Esconde a bolinha */ }
        
        /* Botão do Médico */
        .card-medico { border: 2px solid #ddd; padding: 10px; border-radius: 10px; text-align: center; width: 100px; transition: 0.3s; background: #fff; }
        .card-medico img { width: 70px; height: 70px; border-radius: 50%; object-fit: cover; border: 2px solid #eee; }
        .grid-opcoes input[type="radio"]:checked + .card-medico { border-color: #007bff; background-color: #e9f5ff; transform: scale(1.05); }

        /* Botão do Horário */
        .btn-horario { border: 2px solid #ddd; padding: 10px 15px; border-radius: 5px; transition: 0.3s; background: #fff; display: inline-block; font-weight: bold; }
        .grid-opcoes input[type="radio"]:checked + .btn-horario { border-color: #28a745; background-color: #28a745; color: white; }

        button[type="submit"] { background-color: #007bff; color: white; border: none; padding: 15px; cursor: pointer; border-radius: 5px; width: 100%; font-size: 18px; margin-top: 10px; font-weight: bold; transition: 0.3s; }
        button[type="submit"]:hover { background-color: #0056b3; }
        
        .link-painel { display: block; text-align: center; margin-top: 20px; color: #555; text-decoration: none; font-size: 14px; }
        .link-painel:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="caixa">
        <h2 style="text-align: center; color: #333;">Marcar Consulta 🩺</h2>
        
        <form action="salvar.php" method="POST">
            <label><strong>1. Escolha o Médico Especialista:</strong></label>
            <div class="grid-opcoes">
                <?php
                $sql = "SELECT * FROM medicos";
                $resultado = mysqli_query($conexao, $sql);
                while ($medico = mysqli_fetch_assoc($resultado)) {
                ?>
                    <label>
                        <input type="radio" name="medico_id" value="<?php echo $medico['id']; ?>" required>
                        <div class="card-medico">
                            <img src="<?php echo $medico['foto_url']; ?>" alt="Foto Médico">
                            <br><small><?php echo $medico['nome']; ?></small>
                        </div>
                    </label>
                <?php } ?>
            </div>

            <label><strong>2. Seus Dados:</strong></label>
            <input type="text" name="nome" required placeholder="Nome do Paciente">
            <input type="text" name="telefone" required placeholder="Telefone / WhatsApp">
            
            <label><strong>3. Data da Consulta:</strong></label>
            <input type="date" name="data" required>

            <label><strong>4. Horários Disponíveis:</strong></label>
            <div class="grid-opcoes">
                <?php
                // Gera os botões das 8h às 18h
                for ($hora = 8; $hora <= 18; $hora++) {
                    $horaFormatada = str_pad($hora, 2, "0", STR_PAD_LEFT) . ":00"; 
                    echo "<label>";
                    echo "<input type='radio' name='horario' value='$horaFormatada' required>";
                    echo "<div class='btn-horario'>$horaFormatada</div>";
                    echo "</label>";
                }
                ?>
            </div>

            <button type="submit">Confirmar Agendamento</button>
        </form>
        
        <a href="painel.php" class="link-painel">Acesso da Clínica (Ver agenda) 🔒</a>
    </div>

</body>
</html>