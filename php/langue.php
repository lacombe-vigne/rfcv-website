<?php
/*
Une fois qu'on change la langue pour notre site, il va vérifier le page on est et la langue on chois,apres il rendre un address correct
*/

session_start();
$langue=$_GET['langue'];
$_SESSION['language_Vigne']=$langue;
// echo "http://bioweb.supagro.inra.fr/collection_vigne2014/".$_SESSION['page']."?l=".$langue."";
echo "".$_SESSION['page']."?l=".$langue."";
?>