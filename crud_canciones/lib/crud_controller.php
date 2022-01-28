<?php
session_start();

require_once "dao/canciones.model.php";


function on_list_page_load(){
    $cancionModel = new CancionesModel();
    return $cancionModel->getAll();
}

?>
