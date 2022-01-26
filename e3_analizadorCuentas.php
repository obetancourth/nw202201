<?php
session_start();
require_once 'e3_analizadorCuentasLib.php';

$txtResultado = "";
$txtCuentas = "";
$intClicks = 0;

if (isset($_SESSION['intClicks'])) {
    $intClicks = $_SESSION['intClicks'];
}
/*

    $_SESSION['isLogged'] = true;
    $_SESSION['userid'] = fulanito2002;
    $_SESSION['darkmode'] = true;

 */

if (isset($_POST["btnProcesar"])) {
    $txtCuentas = $_POST["txtCuentas"];
    $arrData = analizarCuentas($txtCuentas);
    $txtResultado = implode(
        '<br/>',
        $arrData[0]
    );
    $intClicks ++;
    $_SESSION['intClicks'] = $intClicks;
}

if (isset($_POST["btnSplit"])) {
    $txtCuentas = $_POST["txtCuentas"];
    $arrData = analizarCuentasSplit($txtCuentas);
    $txtResultado = implode(
        '<br/>',
        $arrData
    );
    $intClicks++;
    $_SESSION['intClicks'] = $intClicks;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anlizador de Cuentas</title>
</head>
<body>
    <h2>Analizador de Cuentas (Intentos: <?php echo $intClicks;?>)</h2>
    <form action="e3_analizadorCuentas.php" method="post">
        <label for="txtCuentas">Cuentas</label>
        <textarea name="txtCuentas" id="txtCuentas" cols="30" rows="10"><?php echo $txtCuentas; ?></textarea>
        <br />
        <button type="submit" name="btnProcesar">Procesar</button>
        <button type="submit" name="btnSplit">Extraer</button>
    </form>
    <section>
        <?php echo $txtResultado; ?>
    </section>
</body>
</html>
