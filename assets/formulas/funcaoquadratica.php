<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><strong>Calculadora de Função Quadrática</strong></title>
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
    <h1><strong>Calculadora de Função Quadrática</strong></h1>
    <p><strong>Uma função quadrática</strong> é uma função polinomial de grau 2, o que significa que a variável independente <em>(geralmente x) é elevada ao quadrado.</em></p>
    <h2><strong>Formula para Calcular a Função Quadrática</strong></h2>
    <center><p><em>F(x)= ax² + bx + c</em></p></center>
    <form id="quadratica" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="x"><strong>Variável Independente (x):</strong></label>
        <input type="number" id="x" name="x" step="any" placeholder="Digite a variável" required><br><br>
        
        <label for="a"><strong>Coeficiente A (a):</strong></label>
        <!-- O coeficiente A não pode ser ZERO -->
        <input type="number" id="a" name="a" step="any" placeholder="Digite o Coeficiente A" required><br><br>

        <label for="b"><strong>Coeficiente B (b):</strong></label>
        <input type="number" id="b" name="b" step="any" placeholder="Digite o Coeficiente B" required><br><br>
        
        <label for="c"><strong>Coeficiente C (c):</strong></label>
        <input type="number" id="c" name="c" step="any" placeholder="Digite o Coeficiente C" required><br><br>

        <button type="submit"><strong>CALCULAR</strong></button>
        <button type="button" class="limpar" onclick="limparCampos()"><strong>Limpar</strong></button>
    </form>

    <div id="resultado">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $x = $_POST['x'];
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];

            $unidade = "cm²";

            function calculoquadrado($x, $a, $b, $c) {
                if ($a == 0) {
                    echo "<strong>É uma equação linear, por favor troque o valor do coeficiente A.</strong>";
                } else {
                    $resultado = $a * $x * $x + $b * $x + $c;
                    return number_format($resultado, 2);
                }
            }

            $resultado = calculoquadrado($x, $a, $b, $c);

            if ($resultado) {
                echo "<strong>O resultado é de: " . $resultado . " " . $unidade . "</strong>";
            }
        }
        ?>
    </div>

    <?php include '../includes/voltar.php';?>

    <script>
        function limparCampos() {
            document.getElementById('quadratica').reset();
            document.getElementById('resultado').innerHTML = '';
        }
    </script>
</body>
</html>
