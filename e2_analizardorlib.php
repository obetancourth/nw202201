<?php

function analizarTexto($texto)
{
    $arrResult = array();
    $txtLimpio = str_replace([".",",",";","!","¡","?","¿"], "", $texto);
    $arrPalabras = explode(" ", $txtLimpio);
    // [0:hola, 1:adios, 2:hola, 3:punto, 4:mucho, 5:comida, 6:taco]

    $arrFrecuencias = array();
    // 
    foreach ($arrPalabras as $palabra) {
        if (isset($arrFrecuencias[$palabra])) {
            $arrFrecuencias[$palabra] ++;
        } else {
            $arrFrecuencias[$palabra] = 1;
        }
    }
    // [ adios: 1, punto: 1, hola : 2, mucho:1, comida: 1, taco:1 ]
    // sort rsort -- elimina las llaves
    // asort  arsort -- manteniene las llaves asociadas
    arsort($arrFrecuencias);

    $contador = 0;
    $arrResult["top5palabras"] = array();
    foreach ($arrFrecuencias as $palabra => $freq) {
        if ($contador == 0) {
            $arrResult["topPalabra"] = sprintf("%s (%d)", $palabra, $freq);
        }
        $arrResult["top5palabras"][] = sprintf("%s (%d)", $palabra, $freq);
        $contador ++;
        if ($contador == 5) {
            break;
        }
    }

    $arrResult["palabrasTotal"] = count($arrPalabras);
    $arrResult["palabrasUnicas"] = count($arrFrecuencias);

    return $arrResult;
}

?>
