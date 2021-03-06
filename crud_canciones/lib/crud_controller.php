<?php
session_start();

require_once "dao/canciones.model.php";


function on_list_page_load()
{
    $cancionModel = new CancionesModel();
    return $cancionModel->getAll();
}

function on_form_load()
{
    $dataview = array(
        "id" => 0,
        "mode" => 'INS',
        "autor" => "",
        "cancion" => "",
        "genero" => "",
        "titulo" => "Nueva Canción",
        "readonly" => "",
    );
    if (isset($_GET["id"])) {
        $dataview["id"] = intval($_GET["id"]);
    }
    if (isset($_GET["mode"])) {
        $dataview["mode"] = $_GET["mode"];
        if ($dataview["mode"] !== 'INS') {
            $cancionModel = new CancionesModel();
            $canciontmp = $cancionModel->getById($dataview["id"]);
            $dataview["autor"] = $canciontmp["autor"];
            $dataview["cancion"] = $canciontmp["cancion"];
            $dataview["genero"] = $canciontmp["genero"];
        }
        switch ($dataview["mode"]){
        case 'INS':
            $dataview["titulo"] = "Nueva Canción";
            break;
        case 'UPD':
            $dataview["titulo"] = sprintf(
                "Actualizando Canción %s (%d)",
                $dataview["cancion"],
                $dataview["id"]
            );
            break;
        case 'DEL':
            $dataview["titulo"] = sprintf(
                "Eliminando Canción %s (%d)",
                $dataview["cancion"],
                $dataview["id"]
            );
            $dataview["readonly"] = "readonly";
            break;
        case 'DSP':
            $dataview["titulo"] = sprintf(
                "Detalle de Canción %s (%d)",
                $dataview["cancion"],
                $dataview["id"]
            );
            $dataview["readonly"] = "readonly";
            break;
        }
    }

    return $dataview;
}

function on_btn_click()
{
    $mode = $_POST["mode"];
    $id = $_POST["txtCodigo"];
    $cancion = $_POST["txtCancion"];
    $autor = $_POST["txtAutor"];
    $genero = $_POST["txtGenero"];
    //Validaciones
    $model = new CancionesModel();
    switch ($mode) {
    case 'INS':
        $model->addNew(
            $autor,
            $cancion,
            $genero
        );
        return true;
    case 'UPD':
        $model->updateCancion(
            $id,
            $autor,
            $cancion,
            $genero
        );
        return true;
    case 'DEL':
        $model->deleteCancion($id);
        return true;
    }
    return false;
}

?>
