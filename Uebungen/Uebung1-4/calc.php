<?php
$x = $_GET['x'];
$y = $_GET['y'];
$mode = $_GET['mode'];

if($mode == 'plus'){
    $Resultat = $x + $y;
    echo "Das Resultat ist: {$Resultat}";
}
if($mode == 'minus'){
    $Resultat = $x - $y;
    echo "Das Resultat ist: {$Resultat}";
}
if($mode == 'mal'){
    $Resultat = $x * $y;
    echo "Das Resultat ist: {$Resultat}";
}
if($mode == 'div'){
    $Resultat = $x / $y;
    echo "Das Resultat ist: {$Resultat}";
}
?>