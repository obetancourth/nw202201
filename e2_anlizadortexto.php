<?php
// require_once 'e2_analizardorlib.php';

$txtTexto = "";
$arrResultado = array();
if (isset($_POST["btnProcesar"])) {
    include_once 'e2_analizardorlib.php';
    $txtTexto = $_POST["txtTexto"];
    $arrResultado = analizarTexto($txtTexto);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analizador de Texto</title>
</head>

<body>
    <h1>Analizador de Text</h1>
    <section>
        <form action="e2_anlizadortexto.php" method="post">
            <label for="txtTexto">Texto del artículo</label>
            <br />
            <textarea name="txtTexto" id="txtTexto" cols="30" rows="10" placeholder="Texto del artículo"><?php echo $txtTexto; ?></textarea>
            <br />
            <button type="submit" name="btnProcesar">Procesar Texto</button>
        </form>
    </section>
    <section>
        <h1>Resultados</h1>
        <pre><?php
        /* for ($i=0; $i < count($arrResultado); $i++)
        {
            echo $arrResultado[$i];
        }
        */
        foreach ($arrResultado as $llave => $valor) {
            if (is_array($valor)) {
                echo sprintf("%s\t%s\n", $llave, implode(',', $valor));
            } else {
                echo sprintf("%s\t%s\n", $llave, $valor);
            }
        }
        ?></pre>
    </section>
</body>

</html>
