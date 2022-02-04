<?php

require_once 'lib/crud_controller.php';
$script = '';
if (isset($_POST["btnConfirmar"])) {
    //trabajar con las acutalizaiones de datos
    if (on_btn_click()) {
        $script = "alert('Acción Realizada con Éxito!');window.location.assign('crud_list.php');";
        echo '<script>' . $script . '</script>';
        die();
    }
}

$data = on_form_load();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["titulo"]; ?></title>
</head>

<body>
    <h1><?php echo $data["titulo"]; ?></h1>
    <form action="crud_form.php?id=<?php echo $data["id"]; ?>&mode=<?php echo $data["mode"]; ?>" method="post">
        <label for="txtCodigo">Código</label>
        <input type="text" name="dmyCodigo" id="dmyCodigo" value="<?php echo $data["id"]; ?>" placeholder="Código" <?php echo $data["readonly"]; ?> />
        <input type="hidden" name="mode" value="<?php echo $data["mode"]; ?>" />
        <input type="hidden" name="txtCodigo" value="<?php echo $data["id"]; ?>" />
        <br />
        <label for="txtCancion">Canción</label>
        <input type="text" name="txtCancion" id="txtCancion" value="<?php echo $data["cancion"]; ?>" placeholder="Canción" <?php echo $data["readonly"]; ?> />
        <br />
        <label for="txtAutor">Autor</label>
        <input type="text" name="txtAutor" id="txtAutor" value="<?php echo $data["autor"]; ?>" placeholder="Autor" <?php echo $data["readonly"]; ?> />
        <br />
        <label for="txtGenero">Género Musical</label>
        <select name="txtGenero" id="txtGenero" <?php echo $data["readonly"]; ?>>
            <option value="RCK" <?php echo ($data["genero"] == "RCK") ? "selected" : "";  ?>>Rock</option>
            <option value="CLS" <?php echo ($data["genero"] == "CLS") ? "selected" : "";  ?>>Clásico</option>
            <option value="POP" <?php echo ($data["genero"] == "POP") ? "selected" : "";  ?>>Pop</option>
            <option value="QSO" <?php echo ($data["genero"] == "QSO") ? "selected" : "";  ?>>Reguetón</option>
            <option value="JZZ" <?php echo ($data["genero"] == "JZZ") ? "selected" : "";  ?>>Jazz</option>
            <option value="BLD" <?php echo ($data["genero"] == "BLD") ? "selected" : "";  ?>>Baladas</option>
        </select>
        <br />
        <?php if ($data["mode"] !== "DSP") { ?>
        <button type="submit" id="btnConfirmar" name="btnConfirmar">Confirmar</button>
        <?php } ?>
        <button id="btnCancelar">Cancelar</button>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", (e) => {
            var btnCancelar = document.getElementById("btnCancelar");
            btnCancelar.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();
                window.location.assign("crud_list.php");
            });
        });
    </script>
</body>

</html>
