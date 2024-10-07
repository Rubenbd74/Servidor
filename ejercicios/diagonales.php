<?php
$sumaPrincipal = 0;
$sumaSecundaria = 0;
$matriz = [
    [15, 10, 25, 8],   //0,0 ; 0,1 ; 0,2 ; 0,3
    [3, 2, 1, 7],      //1,0 ; 1,1 ; 1,2 ; 1,3
    [19, 25, 10, 8],   //2,0 ; 2,1 ; 2,2 ; 2,3
    [9, 15, 25, 13]    //3,0 ; 3,1 ; 3,2 ; 3,3
];

$diagonalPrincipal = [];
$diagonalSecundaria = [];

for ($i = 0; $i <= 3; $i++) {
    $diagonalPrincipal[] = $matriz[$i][$i];
    $sumaPrincipal += $matriz[$i][$i];

    $diagonalSecundaria[] = $matriz[3-$i][$i]; //A la última posicion le resto la poscición actual  
    $sumaSecundaria += $matriz[3-$i][$i];
}
var_dump($diagonalPrincipal);
echo "Suma de la array principal ", $sumaPrincipal, "</br>"; 

var_dump($diagonalSecundaria);
echo "Suma de la array secundaria ", $sumaSecundaria, "</br>"; 

