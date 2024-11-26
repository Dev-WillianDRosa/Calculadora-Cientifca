<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><strong>Calculadora de Quadrados</strong></title>
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
    <h1><strong>Calculadora de Quadrados</strong></h1>
    <p>Um <strong>quadrado</strong> é uma figura geométrica plana que possui <strong>quatro lados iguais e quatro ângulos retos</strong> (cada um medindo 90 graus).</p>
    <h2><strong>Fórmulas para o Cálculo do Quadrado</strong></h2>
    <p><em>Cálculo da Área: a²</em></p>
    <p><em>Cálculo da Diagonal: a√2</em></p>
    <p><em>Cálculo do Perímetro: 4a</em></p>
    
    <form id="peculiarpadeiropurpurodopicoporcopino" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="lado"><strong>Lado do Quadrado:</strong></label>
        <input type="number" id="lado" name="lado" placeholder="Digite o lado" step="any" required>
        <br><br>
        
        <label for="calculo"><strong>Escolha o tipo de cálculo:</strong></label>
        <select id="calculo" name="calculo" required>
            <option value="area">Área</option>
            <option value="diagonal">Diagonal</option>
            <option value="perimetro">Perímetro</option>
        </select>
        <br><br>
        
        <button type="submit"><strong>CALCULAR</strong></button>
        <button type="button" class="limpar" onclick="limparCampos()"><strong>Limpar</strong></button>
    </form>

    <div id="mostarda">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lado = $_POST['lado'];
        $calculo = $_POST['calculo'];

        function calculoarea($lado) {
            return ($lado > 0) ? $lado * $lado : 'O valor deve ser maior que zero.';
        }

        function calculodiagonal($lado) {
            return ($lado > 0) ? $lado * sqrt(2) : 'Insira um valor válido.';
        }

        function calculoperimetro($lado) {
            return ($lado > 0) ? $lado * 4 : 'Digite um número válido.';
        }

        switch ($calculo) {
            case 'area':
                $resultado = calculoarea($lado);
                echo '<p><strong>A área do quadrado é:</strong> ' . $resultado . ' cm</p>';
                break;
            case 'diagonal':
                $resultado = calculodiagonal($lado);
                echo '<p><strong>A diagonal do quadrado é:</strong> ' . round($resultado, 2) . ' cm</p>';
                break;
            case 'perimetro':
                $resultado = calculoperimetro($lado);
                echo '<p><strong>O perímetro do quadrado é:</strong> ' . $resultado . ' cm</p>';
                break;
            default:
                echo '<p><strong>Escolha uma opção válida.</strong></p>';
        }
    }
    ?>
    </div>

    <?php include '../includes/voltar.php';?>

    <script>
        function limparCampos() {
            document.getElementById('peculiarpadeiropurpurodopicoporcopino').reset();
            document.getElementById('mostarda').innerHTML = '';
        }
    </script>
</body>
</html>
