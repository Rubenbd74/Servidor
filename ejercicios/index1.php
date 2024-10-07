<?php
$cont=0;
for($i=0; $i<=1; $i++){
    for($j=0; $j<=2; $j++){
        $cont++;
        $M[$i][$j] = $cont;

    }
}
echo $M[1][2];
echo "</br>";
var_dump($M);