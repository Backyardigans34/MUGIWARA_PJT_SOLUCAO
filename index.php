<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamento Fácil</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 50px; text-align: center; }
        .caixa { background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); display: inline-block; text-align: left; }
        input { display: block; width: 100%; margin-bottom: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        button { background-color: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 5px; width: 100%; font-size: 16px; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>

    <div class="caixa">
        <h2>Marcar Consulta 🩺</h2>
        <p>Escolha o melhor dia e horário para você.</p>

        <form action="salvar.php" method="POST">
            <label>Seu Nome:</label>
            <input type="text" name="nome" required placeholder="Ex: Monkey D. Luffy">

            <label>Telefone (WhatsApp):</label>
            <input type="text" name="telefone" required placeholder="(00) 00000-0000">

            <label>Data da Consulta:</label>
            <input type="date" name="data" required>

            <label>Horário:</label>
            <input type="time" name="horario" required>

            <button type="submit">Agendar Agora</button>
        </form>
        <br>
        <a href="painel.php">Acesso da Clínica (Ver agenda)</a>
    </div>

</body>
</html>