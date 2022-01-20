<?php
$numOperador1=0;
$numOperador2=0;
$numResultado=0;

if (isset($_POST["btnSumar"])) {
    $numOperador1 = floatval($_POST["numOperador1"]);
    $numOperador2 = floatval($_POST["numOperador2"]);
    $numResultado = $numOperador1 + $numOperador2;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Dos Operandos</title>
</head>

<body>
    <h1>Calculadora de Dos Operandos</h1>
    <form action="e1_calculadora.php" method="post">
        <label for="numOperador1">Operador 1</label>
        <input type="number" id="numOperador1" name="numOperador1" value="<?php echo $numOperador1; ?>" />
        <br />
        <label for="numOperador2">Operador 2</label>
        <input type="number" id="numOperador2" name="numOperador2" value="<?php echo $numOperador2; ?>" />
        <br />
        <button type="submit" name="btnSumar">Sumar</button>
        <button type="submit" name="btnRestar">Restar</button>
        <button type="submit" name="btnMutiplicar">Mutiplicar</button>
        <button type="submit" name="btnDividir">Dividir</button>
    </form>
    <section>
        <h2>Restulado de la operación</h2>
        <div><?php echo $numResultado; ?></div>
    </section>
</body>

</html>
