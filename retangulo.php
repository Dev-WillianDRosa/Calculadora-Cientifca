<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora do Retângulo</title>
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
    <h1>Calculadora de Retângulos</h1>
    <p>Um <strong>retângulo</strong> é uma figura geométrica de quatro lados onde todos os ângulos internos são ângulos retos (90 graus). As características principais de um retângulo são sua base e sua altura, que são os lados adjacentes.</p>
    
    <h2>Fórmulas</h2>
    <p><strong>Área</strong>: A fórmula para calcular a área de um retângulo é:</p>
    <p><em>Área = base × altura</em></p>
    <p><strong>Perímetro</strong>: A fórmula para calcular o perímetro de um retângulo é:</p>
    <p><em>Perímetro = 2 × (base + altura)</em></p>
    
    <form id="aaai"method="POST" action="">
        <label for="tipo">Tipo de Cálculo:</label>
        <select id="tipo" name="tipo">
            <option value="area">Área</option>
            <option value="perimetro">Perímetro</option>
        </select>
        
        <label for="base">Base (cm):</label>
        <input type="number" id="base" name="base" step="0.01" required>
        
        <label for="altura">Altura (cm):</label>
        <input type="number" id="altura" name="altura" step="0.01" required>
        
        <button type="submit">Calcular</button>
        <button type="button" class="limpar" onclick="limparCampos()">Limpar</button>
    </form>
    <div id="Papibaquígrafo">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tipo = $_POST['tipo'];
        $base = $_POST['base'];
        $altura = $_POST['altura'];

        function calcularea($base, $altura) {
            return $base * $altura;
        }

        function calculoperimetro($base, $altura) {
            return 2 * ($base + $altura);
        }

        switch ($tipo) {
            case 'area':
                $resultado = calcularea($base, $altura);
                $unidade = "cm²";
                break;
            case 'perimetro':
                $resultado = calculoperimetro($base, $altura);
                $unidade = "cm";
                break;
            default: 
                echo "<h2>NÃO SEI COMO VOCÊ CHEGOU AQUI IRMÃO</h2>";
        }

        if (isset($resultado) && $resultado > 0) {
            echo "<h2>O resultado do Cálculo do Retângulo é de: " . number_format($resultado, 2) . " $unidade</h2>";
        }
    }
    ?>
    </div>
     <?php include 'voltar.php';?>

     <script>
        function limparCampos() {
            document.getElementById('aaai').reset();
            document.getElementById('Papibaquígrafo').innerHTML = '';
        }
    </script>
</body>
</html>