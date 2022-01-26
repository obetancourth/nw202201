<?php

function analizarCuentas($txtCuentas)
{
    $arrCuentas = array();
    preg_match_all('/\d{13}/', $txtCuentas, $arrCuentas);

    return $arrCuentas;
}

function analizarCuentasSplit($txtCuentas)
{
    $arrCuentas = array();
    $arrCuentas = preg_split('/\d{13}/', $txtCuentas);

    return $arrCuentas;
}
?>
