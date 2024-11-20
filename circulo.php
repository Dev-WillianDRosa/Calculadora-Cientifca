
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><strong>Calculadora de Círculo</strong></title>
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
        .imagem1 {
            display: block;
            position: absolute;
            top: 265px;
            left: 40em;
            width: 8em; 
        }
        .imagem2 {
            display: block;
            position: absolute;
            top: 307px;
            left: 42em;
            width: 6em; 
        }
        .voltar {
            position: absolute;
            margin-top: -25em;
            margin-left: -15em;
        }
        .limpar {
           	background-color: red;
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1><strong>Calculadora de Círculo</strong></h1>
    <p><strong>Um círculo é uma figura geométrica plana composta por todos os pontos que estão a uma mesma distância de um ponto fixo chamado centro. A distância entre qualquer ponto do círculo e o centro é chamada de raio. O círculo é uma das formas básicas mais importantes em geometria e aparece frequentemente em diversos contextos matemáticos e físicos.</strong></p>
    <h2><strong>Formulas usadas para o cálculo do círculo</strong></h2>
    <img src="formulaareacirculo.jpeg" class="imagem1" alt="Fórmula da Área do Círculo">
    <p><strong><em>Fórmula para o Cálculo de Área:</em></strong></p>
    <p><strong><em>Fórmula para o Cálculo do Perímetro:</em></strong></p>
    <img src="formulaperimetrocirculo.jpeg" class="imagem2" alt="Fórmula do Perímetro do Círculo">

    <form id="circuloForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="raio"><strong>Raio do Círculo:</strong></label>
        <input type="number" id="raio" name="raio" placeholder="Digite o Raio" step="any" required><br><br>
        
        <label for="calculo"><strong>Escolha o cálculo:</strong></label>
        <select id="calculo" name="calculo">
            <option value="area"><strong>Calcular Área</strong></option>
            <option value="perimetro"><strong>Calcular Perímetro</strong></option>
        </select><br><br>
        
        <button type="submit" name="calcular"><strong>Calcular</strong></button>
        <button type="button" class="limpar" onclick="limparCampos()"><strong>Limpar</strong></button>
    </form>

    <div id="resultado">
        <?php
        function calcularArea($raio) {
            $unidade = "cm²";
            return $raio > 0 ? pow($raio, 2) * M_PI : 'O raio deve ser maior que zero.';
        }

        function calcularPerimetro($raio) {
            $unidade = "cm³";
            return $raio > 0 ? 2 * M_PI * $raio : 'O raio deve ser maior que zero.';
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $raio = $_POST['raio'];
            $calculo = $_POST['calculo'];

            switch ($calculo) {
                case 'area':
                    $resultado = calcularArea($raio);
                    echo "<p><strong>O resultado da área é: " . number_format($resultado, 2) . " cm²</strong></p>";
                    break;
                case 'perimetro':
                    $resultado = calcularPerimetro($raio);
                    echo "<p><strong>O resultado do perímetro é: " . number_format($resultado, 2) . " cm³</strong></p>";
                    break;
                default:
                    echo "<p><strong>erro cabuloso.</strong></p>";
            }
        }
        ?>
    </div>

    <?php include 'voltar.php';?>

    <script>
        function limparCampos() {
            document.getElementById('circuloForm').reset();
            document.getElementById('resultado').innerHTML = '';
        }
    </script>
</body>
</html>
