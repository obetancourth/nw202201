<?php
session_start();

$bolUsarPDO = true;

if (isset($_SESSION["bolUsarPDO"])) {
    $bolUsarPDO = $_SESSION["bolUsarPDO"];
}

if (isset($_POST["btnUsarPDO"])) {
    $bolUsarPDO = true;
}

if (isset($_POST["btnUsarNTV"])) {
    $bolUsarPDO = false;
}
$conn = null;
if ($bolUsarPDO) {
    //
    $conn = new PDO('sqlite:ej5PDO.db');
} else {
    //Driver nativo
    $conn = new SQLite3("ej5Native.db");
}
if ($conn !== null) {
    $sqlCreateTable = " CREATE TABLE IF NOT EXISTS ejemplo
        ( id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
          datos STRING NOT NULL
        );
    ";

    if ($bolUsarPDO) {
        $conn->exec($sqlCreateTable);
    } else {
        $conn->exec($sqlCreateTable);
    }
}

$_SESSION["bolUsarPDO"] = $bolUsarPDO;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLLITE Conn PDO & Native</title>
</head>

<body>
    <h1>Conectarse a SQLITE 3</h1>
    <form action="e5_sqliteconn.php" method="post">

        <button type="submit" name="btnUsarPDO">Usar PDO</button>
        <button type="submit" name="btnUsarNTV">Usar Native</button>
    </form>
</body>

</html>
