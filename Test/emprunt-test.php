<?php

require_once '../Test/EmpruntTest.php' ;

$emprunt = new EmpruntTest() ;

echo $emprunt->VerifDateEmprunt() ;
echo PHP_EOL ;
echo $emprunt->VerifDateRetourLivre() ;
echo PHP_EOL ;
echo $emprunt->VerifDateRetourBlueRay() ;
echo PHP_EOL ;
echo $emprunt->VerifDateRetourMag() ;
echo PHP_EOL ;
echo $emprunt->VerifDateEmpruntCours() ;
echo PHP_EOL ;
echo $emprunt->VerifDateEmpruntAlerte() ;
echo PHP_EOL ;
echo $emprunt->VerifDateEmpruntDepasse() ;