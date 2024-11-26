<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><strong>Teorema de Pitágoras</strong></title>
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

    h1,
    h2 {
        text-align: center;
    }

    form {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    select,
    input[type="number"],
    button {
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
        margin: 0 auto;
        /* Centraliza as imagens */
        width: 450px;
        height: auto;
        margin-bottom: 10px;
        /* Espaçamento inferior */
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
    <h1><strong>Teorema de Pitágoras</strong></h1>
    <p>O <strong>Teorema de Pitágoras</strong> é uma importante relação matemática na geometria euclidiana, aplicável a
        triângulos retângulos. Afirma que em um triângulo retângulo, o quadrado da hipotenusa (o lado oposto ao ângulo
        reto) é igual à soma dos quadrados dos catetos (os dois lados que formam o ângulo reto).</p>
    <h2><strong>Formulas de Calculo</strong></h2>
    <img src="../img/hipotenusa.jpeg" alt="Fórmula para calcular a hipotenusa">
    <img src="../img/cateto1.jpeg" alt="Fórmula para calcular o cateto 1">
    <img src="../img/cateto2.jpeg" alt="Fórmula para calcular o cateto 2">

    <form id="trianguloencapetado" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="num1"><strong>Numero 1</strong></label>
        <input type="number" id="num1" name="num1" step="any" required><br>

        <label for="num2"><strong>Numero 2</strong></label>
        <input type="number" id="num2" name="num2" step="any" required><br>

        <label for="calcular"><strong>Escolha o que deseja calcular:</strong></label>
        <select id="calcular" name="calcular" required>
            <option value="hipotenusa"><strong>Calcular Hipotenusa (c)</strong></option>
            <option value="cateto1"><strong>Calcular Cateto A (a)</strong></option>
            <option value="cateto2"><strong>Calcular Cateto B (b)</strong></option>
        </select><br>

        <button type="submit"><strong>CALCULAR</strong></button>
        <button type="button" class="limpar" onclick="limparCampos()"><strong>Limpar</strong></button>
    </form>

    <div id="trianguloaoquadrado">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
        $num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
        $calcular = isset($_POST['calcular']) ? $_POST['calcular'] : '';

        $unidade = "cm";

        switch ($calcular) {
            case 'hipotenusa':
                if ($num1 > 0 && $num2 > 0) {
                    $hipotenusa = sqrt($num1 ** 2 + $num2 ** 2);
                    echo '<h2>O valor da Hipotenusa (c) é de ' . number_format($hipotenusa, 2) . ' ' . $unidade . '</h2>';
                } else {
                    echo '<h2>Por favor, insira valores válidos para os catetos.</h2>';
                }
                break;

            case 'cateto1':
                if ($num1 > 0 && $num2 > 0 && $num1 > $num2) {
                    $cateto1 = sqrt($num1 ** 2 - $num2 ** 2);
                    echo '<h2>O valor do Cateto A (a) é de ' . number_format($cateto1, 2) . ' ' . $unidade . '</h2>';
                } else {
                    echo '<h2>Por favor, insira uma hipotenusa válida e um cateto.</h2>';
                }
                break;

            case 'cateto2':
                if ($num1 > 0 && $num2 > 0 && $num2 > $num1) {
                    $cateto2 = sqrt($num2 ** 2 - $num1 ** 2);
                    echo '<h2>O valor do Cateto B (b) é de ' . number_format($cateto2, 2) . ' ' . $unidade . '</h2>';
                } else {
                    echo '<h2>Por favor, insira uma hipotenusa válida e um cateto.</h2>';
                }
                break;

            default:
                echo '<h2>Escolha inválida.</h2>';
                break;
        }
    }
?>
</div>

<script>
    function limparCampos() {
        document.getElementById('trianguloencapetado').reset();
        document.getElementById('trianguloaoquadrado').innerHTML = '';
    }
</script>

<?php include '../includes/voltar.php';?>
</body>

</html>
