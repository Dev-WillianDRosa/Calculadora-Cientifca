<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Juros Simples e Compostos</title>
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
            top : 20.1em;
            left : 30em;
            width: 122px;
            height: 35px;
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
<>
    <h1>Calculadora de Juros Simples e Compostos</h1>
    <p>Os <strong>juros simples</strong> são calculados apenas sobre o valor principal inicial durante todo o período de tempo. Ou seja, a taxa de juros é aplicada <strong>somente sobre o valor inicial, não sobre os juros acumulados.</strong></p>
    <center><p><em>J = P × r × t</em></p></center>
    <p>Os <strong> juros compostos</strong> são calculados sobre o valor principal inicial e também sobre os juros acumulados de períodos anteriores. <strong>A cada período, a taxa de juros é aplicada ao montante acumulado.</strong></p>
    <center><p>M = P × (1+ r)ₜ</p></center>
    <form id="boleto" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

        <label for="p">Capital Inicial:
            <input type="number" id="p" name="p" step="any" placeholder="Digite o capital Inicial" required><br><br><!-- Capital inicial -->
        </label>
        <label for="r">Taxa de Juros:
            <input type="number" id="r" name="r" step="any" placeholder="Digite a Taxa de Juros" required><br><br><!-- Taxa de Juros -->
        </label>
        <label for="t">Tempo:
            <input type="number" id="t" name="t" step="any" placeholder="Digite o tempo" required><br><br><!-- Tempo -->
        </label>

        <label for="tipo_juros">Tipo de Juros:
            <select id="tipo_juros" name="tipo_juros" required>
                <option value="Simples">Juros Simples</option>
                <option value="Composto">Juros Compostos</option>
            </select>
        </label><br><br>
        
        <button type="submit">Calcular</button>
        <button type="button" class="limpar" onclick="limparCampos()">Limpar</button>
    </form>

    <div id="pato">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $p = $_POST["p"];
        $r = $_POST["r"];
        $t = $_POST["t"];
        $tipo_juros = $_POST["tipo_juros"];

        if ($p != 0 && $r != 0 && $t != 0) {
            switch ($tipo_juros) {
                case "Simples":
                    $resultado = $p * $r * $t;
                    echo "Os juros simples são de: R$ " . number_format($resultado, 2);
                    break;

                case "Composto":
                    $montante = $p * pow((1 + $r), $t);
                    $juros_compostos = $montante - $p; // Calcula os juros compostos
                    echo "Os juros compostos são de: R$ " . number_format($juros_compostos, 2);
                    break;                    

                default:
                    echo "Como vc não conseguiu por um juros certo?";
            }
        } else {
            echo "Por favor, preencha todos os campos com valores válidos.";
        }
    }
    ?>
    </div>
    <?php include 'voltar.php';?>
    <script> //primeiro javascript feito na unha e sem ajuda :)
        function limparCampos(){ 
            document.getElementById('boleto').reset();
            document.getElementById('pato').innerHTML = '';
        }
    </script>
</body>
</html>
