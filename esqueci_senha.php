<?php
include("conexao.php");
include("data.php");

$mensagem = ""; // Variável para armazenar a mensagem

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $email = $_POST['email'];
    $palavraDeSeguranca = $_POST['palavra_de_seguranca'];
    $novaSenha = $_POST['nova_senha'];

    if (!empty($email) && !empty($palavraDeSeguranca) && !empty($novaSenha)) 
    { 
        $email = $mysqli->real_escape_string($email);
        $palavraDeSeguranca = $mysqli->real_escape_string($palavraDeSeguranca);
        $novaSenha = $mysqli->real_escape_string($novaSenha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND palavra_seguranca = '$palavraDeSeguranca'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) 
        {  
            $sqlUpdate = "UPDATE usuarios SET senha = '$novaSenha' WHERE email = '$email'";
            if ($mysqli->query($sqlUpdate)) {
                $mensagem = "Senha atualizada com sucesso! 
                <a href='index.php'>Fazer Login</a>";
            } else {
                $mensagem = "<span class='erro'>Erro ao atualizar a senha: " . $mysqli->error . "</span>";
            }
        } else 
        {
            $mensagem = "<span class='erro'>Email ou palavra de segurança incorretos.</span>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
    <style>
body {
    background-color: #f0f8ff; 
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    text-align: center;
}

h2 {
    color: #0044cc;
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

label {
    font-size: 16px;
    color: #333333;
}

input[type="email"],
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0 16px;
    border: 1px solid #cccccc;
    border-radius: 5px;
    font-size: 14px;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #0044cc;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0033aa;
}

.mensagem {
    margin-top: 15px;
    text-align: center;
}

.mensagem .sucesso {
    color: #28a745; 
    font-weight: bold;
}

.mensagem .erro {
    color: #dc3545;
    font-weight: bold;
}

    </style>
</head>
<body>
    <form action="" method="POST">
        <h2>Recuperação de senha</h2>
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="palavra_de_seguranca">Palavra de Segurança:</label>
    <input type="text" name="palavra_de_seguranca" required>

    <label for="nova_senha">Nova Senha:</label>
    <input type="password" name="nova_senha" required>

    <button type="submit">Atualizar Senha</button>
    
    <div class="mensagem">
        <?php echo $mensagem; ?>
    </div>
</form>

</body>
</html>
