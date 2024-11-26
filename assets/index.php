<?php
include('includes/conexao.php');
include('includes/data.php');
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    if (empty($_POST['email'])) {
        echo 'Insira o email para prosseguir';
    } elseif (empty($_POST['senha'])) {
        echo 'Insira a senha para prosseguir';
    } else {
        $email = $mysqli->real_escape_string($_POST['email']); 
        $senha = $mysqli->real_escape_string($_POST['senha']); 

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql2 = $mysqli->query($sql) or die("Falha na consulta: " . $mysqli->error);

        $qualidad = $sql2->num_rows;

        echo "Número de linhas retornadas: $qualidad <br>";

        if ($qualidad == 1) {
            $usuario = $sql2->fetch_assoc();
            
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            echo 'Login bem-sucedido';

            header('Location: landpage/landpage.php');
            exit();

        } else {
            echo '<p>Email ou senha estão errados</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login - Calculadora</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .conteudo {
            text-align: center;
            color: #3a3a3a;
        }

        .formulario_login {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 320px;
            border-top: 5px solid #007bff;
            border-bottom: 5px solid #007bff;
        }

        h2 {
            color: #007bff;
            font-size: 23px;
            margin-bottom: 20px;
            text-align: center;
        }

        .icons {
            font-size: 48px;
            color: #007bff;
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-size: 14px;
            color: #3a3a3a;
            text-align: left;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            background-color: #f8f9fa;
            font-size: 14px;
            color: #495057;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
            background-color: #e9f1ff;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .info-texto {
            font-size: 12px;
            color: #6c757d;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="conteudo">
        <div class="icons">🖥️ 🔢</div>
        <h2>Bem-vindo à Calculadora Cientifica</h2>
        <form action="" method="POST" autocomplete="off" class="formulario_login">
            <label for="email">Email:</label>
            <input type="text" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <button type="submit">Login</button>
            <p class="info-texto">Insira suas credenciais para acessar o sistema.</p>
            <a href="senha/esqueci_senha.php">Esqueci a senha</a>
        </form>
    </div>
</body>
</html>
