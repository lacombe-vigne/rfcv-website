<?php

require_once "writeexcel/class.writeexcel_workbook.inc.php";
require_once "writeexcel/class.writeexcel_worksheet.inc.php";

$fname = tempnam("/tmp", "data.xls");
$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();

session_start(); //Permet de récupérer le contenu des variables de session
$json = file_get_contents('../../json/search.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
//Permet de récupérer les bon json en fonction de la langue
if ($_SESSION['language_Vigne'] == "FR") {
    $labeljson = array(
        utf8_decode($parsed_json->{resultat_variete_fr}->{CodeVariete}),
        utf8_decode($parsed_json->{resultat_variete_fr}->{NomVariete}),
        utf8_decode($parsed_json->{resultat_variete_fr}->{SynoMajeur}),
        utf8_decode($parsed_json->{resultat_variete_fr}->{Utilite}),
        utf8_decode($parsed_json->{resultat_variete_fr}->{CouleurPellicule}),
        utf8_decode($parsed_json->{resultat_variete_fr}->{Saveur}),
        utf8_decode($parsed_json->{resultat_variete_fr}->{Pepins}),
        utf8_decode($parsed_json->{resultat_variete_fr}->{Sexe}),
        utf8_decode($parsed_json->{resultat_variete_fr}->{PaysOrigine}));
} else {
    $labeljson = array(
        utf8_decode($parsed_json->{resultat_variete_en}->{CodeVariete}),
        utf8_decode($parsed_json->{resultat_variete_en}->{NomVariete}),
        utf8_decode($parsed_json->{resultat_variete_en}->{SynoMajeur}),
        utf8_decode($parsed_json->{resultat_variete_en}->{Utilite}),
        utf8_decode($parsed_json->{resultat_variete_en}->{CouleurPellicule}),
        utf8_decode($parsed_json->{resultat_variete_en}->{Saveur}),
        utf8_decode($parsed_json->{resultat_variete_en}->{Pepins}),
        utf8_decode($parsed_json->{resultat_variete_en}->{Sexe}),
        utf8_decode($parsed_json->{resultat_variete_en}->{PaysOrigine}));
}
require('../includes/bibliFonc.php'); //Accès à la base de données
require('../includes/class_DAO_Bibilotheque.php'); //Accès aux requêtes SQL
$DAO = new BibliothequeDAO();
//$resultat=$_SESSION['resultat'];
//$resultat = $DAO->exportxls($_SESSION['language_Vigne'],$_SESSION['search'],"variete",$_SESSION['typerecherche']);
//print_r($resultat);
$resultat = $DAO->exportxls($_SESSION['language_Vigne'], null, "variete", null);
//$resultat = $DAO->searchSimple($_SESSION['search'], $_SESSION['search'], "fuzzy", "variete", $_SESSION['language_Vigne'], 1, 20, 1, 20, 1, 20, "tri_espece_asc", 1, "CodeEsp", "tri_variete_asc", 1, "CodeVar", "tri_accession_asc", 1, "CodeIntro");
/* foreach ($resultat as &$value) {
  foreach ($value as &$i) {
  $i = utf8_decode($i);
  if ($i == ' ? ' || $i == ' ?') {
  $i = '-';
  }
  }
  } */
//print_r($resultat);
//CSS du tableur
$Titre = & $workbook->addformat();
$Titre->set_bold();

$Date = & $workbook->addformat();

$Label = & $workbook->addformat();
$Label->set_bold();
$Label->set_bg_color("grey");

$Données = & $workbook->addformat();
//

$worksheet->write(0, 0, utf8_decode("BDD du RFCV(URL)"), $Titre);
$worksheet->write(1, 0, utf8_decode("Données extraites le 10/03"), $Date);


$worksheet->write(3, 0, $labeljson, $Label);
$j = 0;
/* foreach ($resultat as $value) {
  $i = 0;
  foreach ($value as $v) {
  echo $v."\n";
  $i++;
  }
  $j++;
  } */
$j = 0;
foreach ($resultat as $value) {
    $i = 0;
    foreach ($value as $v) {
        $v = utf8_decode($v);
        if ($v == ' ? ' || $v == ' ?') {
            $v = '--';
        }
        $worksheet->write(4 + $j, 0 + $i, $v, $Données);
        $i++;
    }
    $j++;
}
/* $j = 0;
  foreach ($resultat as $value) {
  echo $value;
  $j++;
  } */

$workbook->close();

header("Content-Type: application/x-msexcel; name=\"data.xls\"");
header("Content-Disposition: inline; filename=\"data.xls\"");
$fh = fopen($fname, "rb");
fpassthru($fh);
unlink($fname);
?>
