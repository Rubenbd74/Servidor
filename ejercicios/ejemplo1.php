<?php
$cont = 0;
$media = 0;
for($i=10; $i<=50; $i+=10){
    $Media[$i] = $i;
    $media += $i;   //$conteo += $Media[i];
}
var_dump($Media);
echo "</br> La media es ",$media/count($Media), "</br>"; 