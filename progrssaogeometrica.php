<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><strong>Calculadora de Progressão Geométrica</strong></title>
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
        img {
            display: block;
            margin: 0 auto; /* Centraliza as imagens */
            width: 320px; 
            height: auto; 
            margin-bottom: 10px; /* Espaçamento inferior */
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

    <h1><strong>Calculadora de Progressão Geométrica</strong></h1>
    <p><strong>Uma Progressão Geométrica (P.G.)</strong> é uma sequência numérica em que cada termo, a partir do segundo, é obtido multiplicando o termo anterior por uma constante fixa chamada razão (r).</p>
    <h2><strong>Fórmulas para o Cálculo da Progressão Geométrica</strong></h2>
    <img src="eeenesimo.jpeg" alt="Fórmula do n-ésimo termo">
    <img src="soma.jpeg" alt="Fórmula da soma dos termos">

    <form id="lustre" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="n"><strong>Número de termos:</strong></label>
        <input type="number" name="n" id="n" placeholder="Digite o número de termos" required>
        <br><br>
        <label for="a1"><strong>Primeiro termo:</strong></label>
        <input type="number" name="a1" id="a1" placeholder="Digite o primeiro termo" required>
        <br><br>
        <label for="opcao"><strong>Escolha o que calcular:</strong></label>
        <select name="opcao" id="opcao" required>
            <option value="termo">Calcular o n-ésimo Termo</option>
            <option value="soma">Calcular a Soma dos Termos</option>
        </select>
        <br><br>
        <label for="razao"><strong>Razão:</strong></label>
        <input type="number" name="razao" id="razao" placeholder="Digite a razão" required>
        <br><br>
        <button type="submit"><strong>CALCULAR</strong></button>
        <button type="button" class="limpar" onclick="limparCampos()"><strong>Limpar</strong></button>
    </form>

    <div id="gustavodiscutindo">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numerodetermos = $_POST['n'];
        $primeirotermo = $_POST['a1'];
        $razao = $_POST['razao'];
        $opcao = $_POST['opcao'];

        function calculopg($numerodetermos, $primeirotermo, $razao, $opcao) {
            if ($numerodetermos > 0 && $primeirotermo > 0 && $razao > 0) {
                switch ($opcao) {
                    case 'termo':
                        return number_format($primeirotermo * pow($razao, $numerodetermos - 1), 2) . ' unidades';
                    case 'soma':
                        if ($razao != 1) {
                            return number_format($primeirotermo * (pow($razao, $numerodetermos) - 1) / ($razao - 1), 2) . ' unidades';
                        } else {
                            return number_format($primeirotermo * $numerodetermos, 2) . ' unidades';
                        }
                    default:
                        return "Opção inválida";
                }
            } else {
                return "Valores inválidos fornecidos";
            }
        }

        $resultado = calculopg($numerodetermos, $primeirotermo, $razao, $opcao);

        if ($resultado) {
            echo "<p><strong>O resultado é: $resultado</strong></p>";
        } else {
            echo "<p><strong>Por favor, digite valores válidos para realizar o cálculo.</strong></p>";
        }
    }
    ?>
    </div>

    <?php include 'voltar.php'; ?>

    <script>
        function limparCampos() {
            document.getElementById('lustre').reset();
            document.getElementById('gustavodiscutindo').innerHTML = '';
        }
    </script>
</body>
</html>
