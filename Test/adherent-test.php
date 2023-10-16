<?php

require_once '../Test/AdherentTest.php' ;

$adherent = new AdherentTest() ;

echo $adherent->verifDateAdhesion() ;
echo PHP_EOL ;
echo $adherent->verifDateAdhesion2() ;
echo PHP_EOL ;
echo $adherent->verifNumeroAdherent() ;
echo PHP_EOL ;
echo $adherent->verifValideAdhesion() ;
echo PHP_EOL ;
echo $adherent->verifNonValideAdhesion() ;
echo PHP_EOL ;
echo $adherent->verifRenouvel() ;
