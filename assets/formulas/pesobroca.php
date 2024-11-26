<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Peso Ideal</title>
</head>
<body>
    <h2>Peso Ideal usando fórmula de Broca</h2>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <select name="sexo" id="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
        </select>
        <input type="number" name="altura" id="altura" step="any" placeholder="Digite a altura" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $altura = $_POST['altura'];
        $sexo = $_POST['sexo'];

        function pesoideal($altura, $sexo){
            if ($altura > 0){
                switch ($sexo) {
                    case 'Masculino':
                        return $altura * 100 - 102;
                    case 'Feminino':
                        return $altura * 100 - 104;
                    default:
                        return "Não faço ideia";
                }
            } 
        }

        $resultado = pesoideal($altura, $sexo);
        if (is_numeric($resultado)) { // se for numérico 
            echo "<p>O peso ideal para $sexo é de: " . number_format($resultado, 2) . " kg</p>";
        }
    }
    ?>
</body>
</html>
