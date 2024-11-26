<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><strong>Calculadora de Amortização</strong></title>
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
            margin-bottom: 10px; /* Adicionado para espaçamento */
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
    <h1><strong>Calculadora de Amortização</strong></h1>
    <p><strong>Amortização simples</strong> é o processo de pagar uma dívida em parcelas periódicas iguais, onde cada pagamento cobre uma parte dos juros e uma parte do principal. Esse método é utilizado para liquidar a dívida de forma gradual ao longo do tempo.</p>
    <h2><strong>Formula Para Calcular Amortização</strong></h2>
    <center><p><strong>A = C / N</strong></p></center>

    <form id="amortizacaoForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="principal"><strong>Capital Inicial:</strong>
            <input type="number" id="principal" name="principal" step="any" placeholder="Digite o valor do empréstimo" required><br><br>
        </label>

        <label for="periodos"><strong>Número de Períodos:</strong>
            <input type="number" id="periodos" name="periodos" placeholder="Digite o número total de períodos" required><br><br>
        </label>

        <button type="submit" class="botao" name="calcular"><strong>Calcular Amortização</strong></button>
        <button type="button" class="limpar" onclick="limparCampos()"><strong>Limpar</strong></button>
    </form>

    <div id="resultado">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calcular'])) {
            $capitalinicial = $_POST["principal"];
            $periodo = $_POST["periodos"];
   
            if ($capitalinicial <= 0 || $periodo <= 0) {
                echo "<p><strong>Preencha valores válidos para Capital Inicial e Número de Períodos.</strong></p>";
            } else {
                $amortizacao = $capitalinicial / $periodo;

                echo "<h3><strong>Resultado da Amortização</strong><br><br></h3>";
                echo "<p><strong>O valor da amortização mensal é: R$ " . number_format($amortizacao, 2) . "</strong></p>";
            }
        }
        ?>
    </div>

    <?php include '../includes/voltar.php';?>

    <script>
        function limparCampos() {
            document.getElementById('amortizacaoForm').reset();
            document.getElementById('resultado').innerHTML = '';
        }
    </script>
</body>
</html>
