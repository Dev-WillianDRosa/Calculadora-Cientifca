<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><strong>Calculadora de Potenciação</strong></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select, input[type="number"], button {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        button {
            background-color: blue;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .center-img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 10em; 
        }
        .limpar {
            background-color: red;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .voltar {
            position: absolute;
            margin-top: -25em;
            margin-left: -15em;
        }
    </style>
</head>
<body>
    <h1><strong>Calculadora de Potenciação</strong></h1>
    <p>A <strong>potenciação</strong> é uma operação matemática que envolve dois números: a base e o expoente. O resultado da potenciação, ou potência, é obtido multiplicando a base por ela mesma o número de vezes indicado pelo expoente.</p>
    <h2><strong>Fórmula para Calcular a Potenciação</strong></h2>
    <img src="formula1.jpeg" class="center-img" alt="Fórmula para Potenciação">
    <form id="cadelo" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <label for="base"><strong>Insira a Base:</strong>
            <input type="number" id="base" name="base" step="any" placeholder="Digite a Base" required><br><br>
        </label>
        <label for="expoente"><strong>Insira o Expoente:</strong>
            <input type="number" id="expoente" name="expoente" step="any" placeholder="Digite o Expoente" required><br><br>
        </label>
        <button type="submit"><strong>Calcular</strong></button>
        <button type="button" class="limpar" onclick="limparCampos()"><strong>Limpar</strong></button>
    </form>
    <div id="relampagomarquinhos">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = $_POST["base"];
        $expoente = $_POST["expoente"];
        function calculopotencia($base, $expoente){
            $resultado = pow($base, $expoente);
            $unidade = ""; // Você pode adicionar uma unidade de medida se desejar
            echo "<p><strong>O resultado da potência é: " . sprintf('%.2f', $resultado) . " " . $unidade . "</strong></p>";
        }
        calculopotencia($base, $expoente);
    }
    ?>
    </div>

    <?php include 'voltar.php';?>

    <script>
        function limparCampos() {
            document.getElementById('cadelo').reset();
            document.getElementById('relampagomarquinhos').innerHTML = '';
        }
    </script>
</body>
</html>
