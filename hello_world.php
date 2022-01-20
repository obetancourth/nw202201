<?php
// Esto es un comentario de Linea

/*
    Esto es un comentario de Bloque
*/
$txtNombre = "";
$txtMensaje = "Este es mensaje temporal";
// boolean, string, numericos (integers, floats), objects, arrays

// btnSayHola_onclick
if (isset($_POST["btnSayHola"])) {
    $txtNombre = $_POST["txtNombre"];
    $txtMensaje = 'Hola estimad@ '.$txtNombre;
}

// btnSayHola2_onclick
if (isset($_POST["btnSayHola2"])) {
    $txtNombre = $_POST["txtNombre"];
    $txtMensaje = 'Adios estimad@ '.$txtNombre;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro a PHP</title>
</head>

<body>
    <h1>Introducción a PHP</h1>
    <form action="hello_world.php" method="post">
        <label for="txtNombre">Nombre Completo</label>
        <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>"/>
        <br />
        <button type="submit" name="btnSayHola">Di Hola.</button> <br/>
        <button type="submit" name="btnSayHola2">Di Hola Sin ejecutar.</button>
    </form>
    <section>
        <h2>Output:</h2>
        <p><?php echo $txtMensaje; ?></p>
    </section>
</body>

</html>
