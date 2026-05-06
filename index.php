<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento Médico</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { color: #007bff; text-align: center; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; color: #555; }
        input, select { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: 0.3s; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Marcar Consulta</h2>
        <form action="reservar.php" method="POST">
            <label>Nome Completo</label>
            <input type="text" name="nome" placeholder="Ex: João Silva" required>
            
            <label>Data da Consulta</label>
            <input type="date" name="data_consulta" required>
            
            <label>Escolha o Horário</label>
            <select name="horario" required>
                <option value="">Selecione...</option>
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
            </select>
            
            <button type="submit">Reservar Agora</button>
        </form>
    </div>
</body>
</html>