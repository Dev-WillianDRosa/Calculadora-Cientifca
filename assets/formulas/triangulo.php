<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Área e Perímetro de Triângulo</title>
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
        .imagem1{
            position: absolute;
            top : 24.6em;
            left : 37.4em;
            width: 122px;
            height: 35px;
        }
        .imagem2{
            position: absolute;
            top : 436.9px;
            left : 36.4em;
            width: 220px;
            height: 26px;
        }
        .imagem3{
            position: absolute;
            top : 467.9px;
            left : 36.8em;
            width: 220px;
            height: 26px;
        }
        .imagem4{
            position: absolute;
            top : 502.9px;
            left : 35.8em;
            width: 220px;
            height: 26px;
        }  .limpar {
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

    <h1>Calculadora de triangulos</h1>
    <p><strong>Um triângulo é um polígono de três lados, três vértices e três ângulos.</strong> A soma dos ângulos internos de qualquer triângulo é sempre 180 graus.</p>
    <p>Nesta Calculadora iremos calcular a Área e o perimetro dos Triangulos. </p>    
    <h2>Tipos de Triangulos</h2>
        <p><strong>Equilátero:</strong> Todos os três lados e ângulos são iguais. <br>
        <strong>Isósceles:</strong> Possui dois lados iguais e um diferente. Os ângulos opostos aos lados iguais também são iguais.<br>
        <strong>Escaleno:</strong> Todos os três lados e ângulos são diferentes.</p>
        <h2>Formulas Usadas</h2>
        <p>Área do Triangulo Equilátero:</p>
        <p>Área do Triangulo Isóceles:</p>
        <p>Área do Triangulo Escaleno:</p>
        <p>Perimetro dos Triangulos:</p>
        <img src="../img/formulaequilatero.PNG" class="imagem1">
        <img src="../img/formula2.jpeg" class="imagem2">
        <img src="../img/formula3.jpeg" class="imagem3">
        <img src="../img/perimetro.jpeg" class="imagem4">
    <form id="pink"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="calculo">Escolha o cálculo:</label>
        <select name="calculo" id="calculo"> 
            <option value="area">Área</option>
            <option value="perimetro">Perímetro</option>
        </select><br><br>

        <label for="tipo">Tipo de triângulo:</label>
        <select name="tipo" id="tipo">
            <option value="equilatero">Equilátero</option>
            <option value="isosceles">Isósceles</option>
            <option value="escaleno">Escaleno</option>
        </select><br><br>

        <label for="lado1">Lado 1:</label>
        <input type="number" id="lado1" name="lado1" step="any" placeholder="campo obrigatório" required><br><br>
        
        <label for="lado2">Lado 2:</label>
        <input type="number" id="lado2" name="lado2" step="any" placeholder="campo obrigatório" required><br><br>
        
        <label for="lado3">Lado 3:</label>
        <input type="number" id="lado3" name="lado3" step="any" placeholder="campo obrigatório" required><br><br>

        <button type="submit">CALCULAR</button>
        <button type="button" class="limpar" onclick="limparCampos()">Limpar</button>
    </form>
<div id="cerebro">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $calculo = $_POST['calculo']; // qual calculo iremos fazer
        $tipo = $_POST['tipo']; // tipo de triangulo
        $lado1 = $_POST['lado1'];
        $lado2 = $_POST['lado2'];
        $lado3 = $_POST['lado3']; 

        $lados = [$lado1, $lado2, $lado3]; // array util para um código mais limpo quando 

        function calcularequilatero($lado) { //calculo do equilátero
            return (sqrt(3) / 4 * pow($lado, 2));
        }

        function calcularisoceles($ladoigual, $base) { // calculo do isóceles, 2 lados iguais e base diferente
            $altura = sqrt(pow($ladoigual, 2) - pow($base / 2, 2));
            return ($base * $altura) / 2;
        }

        function calcularescaleno($lado1, $lado2, $lado3) { //escaleno é tudo diferente
            $herao = ($lado1 + $lado2 + $lado3) / 2;
            return sqrt($herao * ($herao - $lado1) * ($herao - $lado2) * ($herao - $lado3));
        }

        function calcularperimetro($lado1, $lado2, $lado3) { // calculo do perimetro dos triangulos é o mesmo para todos os tipos.
            return $lado1 + $lado2 + $lado3;
        }
    
        switch ($tipo) {
            case 'equilatero':
                if (count(array_unique($lados)) === 1) { //verifica se todos os valores dentro do array são iguais
                    if ($calculo == 'area') {
                        $resultado = calcularequilatero($lado1);
                        $unidade = "cm²";
                    } else {
                        $resultado = calcularperimetro($lado1, $lado2, $lado3);
                        $unidade = "cm"; // variavel para unidade de medida vai auxiliar no echo
                    }
                } else {
                    echo 'Para ser um triângulo equilátero, é necessário que todos os lados sejam iguais.';
                }
                break;

            case 'escaleno':
                if (count(array_unique($lados)) === 3) {
                    if ($calculo == 'area') {
                        $resultado = calcularescaleno($lado1, $lado2, $lado3);
                        $unidade = "cm²";
                    } else {
                        $resultado = calcularperimetro($lado1, $lado2, $lado3);
                        $unidade = "cm";
                    }
                } else {
                    echo 'Para ser um triângulo escaleno, é necessário que todos os lados sejam diferentes.';
                }
                break;

            case 'isosceles':
                if (count(array_unique($lados)) === 2) {
                    $ladoIgual = $lado1 == $lado2 ? $lado1 : ($lado1 == $lado3 ? $lado1 : ($lado2 == $lado3 ? $lado2 : $lado3));
                    $base = $ladoIgual == $lado1 ? ($lado2 == $lado3 ? $lado2 : $lado3) : $lado1;
                    if ($calculo == 'area') {
                        $resultado = calcularisoceles($ladoIgual, $base);
                        $unidade = "cm²";
                    } else {
                        $resultado = calcularperimetro($lado1, $lado2, $lado3);
                        $unidade = "cm";
                    }
                } else {
                    echo 'Para ser um triângulo isósceles, dois lados precisam ser iguais.';
                }
                break;

            default:
                echo "Se você está vendo isso, normal, meus códigos demoram pra funcinar as vezes ";
        }

        if (isset($resultado) && $resultado > 0) { // se existir resultado e for maior que zero
            echo "<h3>$calculo do triângulo $tipo: " . number_format($resultado, 2) . " $unidade</h3>"; // exibindo com tag h3, o calculo que pedi, tipo do triangulo e o resultado com numero formatado
        }
    }
    ?>
    </div>
    <?php include '../includes/voltar.php';?>
      <script>
        function limparCampos() {
            document.getElementById('pink').reset();
            document.getElementById('cerebro').innerHTML = '';
        }
    </script>
</body>
</html>