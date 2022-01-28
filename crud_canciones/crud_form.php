<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajar Modo</title>
</head>

<body>
    <h1>Trabajar con Modo</h1>
    <form action="crud_form.php" method="post">

        <label for="txtCodigo">Código</label>
        <input type="text" name="dmyCodigo" id="dmyCodigo" value="" placeholder="Código" />
        <input type="hidden" name="txtCodigo" value="" />
        <br />
        <label for="txtCancion">Canción</label>
        <input type="text" name="txtCancion" id="txtCancion" value="" placeholder="Canción" />
        <br />
        <label for="txtAutor">Autor</label>
        <input type="text" name="txtAutor" id="txtAutor" value="" placeholder="Autor" />
        <br />
        <label for="txtGenero">Género Musical</label>
        <select name="txtGenero" id="txtGenero">
            <option value="RCK">Rock</option>
            <option value="CLS">Clásico</option>
            <option value="POP">Pop</option>
            <option value="QSO">Reguetón</option>
            <option value="JZZ">Jazz</option>
            <option value="BLD">Baladas</option>
        </select>
        <br />
        <button type="submit" id="btnConfirmar" name="btnConfirmar">Confirmar</button>
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
