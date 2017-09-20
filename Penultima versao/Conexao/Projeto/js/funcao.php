<?php

function dataBr($dataEUA){
    /* exemplo: 2012-09-14
    [0] = 2012
    [1] = 09
    [2] = 14 
     */
    $dataArray = explode("-", $dataEUA);
    $dataBr = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];
    return $dataBr;
}

function dataEUA($dataBr){
    /* exemplo: 14/09/2012
    [0] = 14
    [1] = 09
    [2] = 2012 
     */
    $dataArray = explode("/", $dataBr);
    $dataEUA = $dataArray[2]."/".$dataArray[1]."/".$dataArray[0];
    return $dataEUA;    
}

?>
