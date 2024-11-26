<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><strong>Calculadora de Progressão Aritmética</strong></title>
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
            width: 420px; 
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

    <h1><strong>Calculadora de Progressão Aritmética</strong></h1>
    <p><strong>Uma Progressão Aritmética (P.A.)</strong> é uma sequência de números onde a diferença entre dois termos consecutivos é constante. Essa diferença constante é chamada de razão.</p>
    <h2><strong>Fórmulas para Calcular Progressão Aritmética</strong></h2>
    <img src="../img/enesimotermo.jpeg" alt="Fórmula do enésimo termo">
    <img src="../img/razao.jpeg" alt="Fórmula da razão">

    <form id="patoantagonista" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="n"><strong>Número de termos:</strong></label>
        <input type="number" name="n" id="n" placeholder="Digite o número de termos" required>
        <br><br>
        <label for="a1"><strong>Primeiro termo:</strong></label>
        <input type="number" name="a1" id="a1" placeholder="Digite o primeiro termo" required>
        <br><br>
        <label for="opcao"><strong>Escolha o que calcular:</strong></label>
        <select name="opcao" id="opcao" required>
            <option value="ultimo-termo">Calcular o Último Termo</option>
            <option value="razao">Calcular a Razão</option>
        </select>
        <br><br>
        <label for="razao"><strong>Razão (necessário apenas para calcular o último termo):</strong></label>
        <input type="number" name="razao" id="razao" placeholder="Digite a razão">
        <br><br>
        <button type="submit"><strong>CALCULAR</strong></button>
        <button type="button" class="limpar" onclick="limparCampos()"><strong>Limpar</strong></button>
    </form>
    
    <div id="gansoprotagonista">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numerodetermos = $_POST['n'];
        $primeirotermo = $_POST['a1'];
        $razao = isset($_POST['razao']) ? $_POST['razao'] : 0;
        $opcao = $_POST['opcao'];

        function calculopa($numerodetermos, $primeirotermo, $razao, $opcao) {
            if ($numerodetermos > 0 && $primeirotermo > 0) {
                switch ($opcao) {
                    case 'ultimo-termo':
                        return number_format($primeirotermo + ($numerodetermos - 1) * $razao, 2) . ' unidades';
                    case 'razao':
                        return number_format(($primeirotermo - 1) / ($numerodetermos - 1), 2) . ' unidades';
                    default:
                        return "Opção inválida";
                }
            }
        }

        $resultado = calculopa($numerodetermos, $primeirotermo, $razao, $opcao);

        if ($resultado !== false) {
            echo "<p><strong>O resultado é: $resultado</strong></p>";
        } else {
            echo "<p><strong>Por favor, digite valores válidos para realizar o cálculo.</strong></p>";
        }
    }
    ?>
    </div>
    
    <?php include '../includes/voltar.php';?>
    
    <script>
        function limparCampos() {
            document.getElementById('patoantagonista').reset();
            document.getElementById('gansoprotagonista').innerHTML = '';
        }
    </script>
</body>
</html>
