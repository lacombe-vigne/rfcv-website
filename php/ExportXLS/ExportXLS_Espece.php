<?php
/*
 * Ce fichier gère les exports xls sur les fiches d'une espèce
 */
require "writeexcel/class.writeexcel_workbook.inc.php";
require "writeexcel/class.writeexcel_worksheet.inc.php";
session_start(); //Permet de récupérer le contenu des variables de session
$langue = $_SESSION['language_Vigne']; // langue de la page web
$json = file_get_contents('../../json/search.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
//Permet de récupérer les bon json en fonction de la langue
$jsonXLS = file_get_contents('../../json/xls.json');
$parsed_jsonXLS = json_decode($jsonXLS); // Permet de lire le fichier JSON avec PHP.
//Permet de récupérer les bon json en fonction de la langue
if($langue== "FR"){
    $Title=utf8_decode($parsed_jsonXLS->{xls_fr}->{Title});
    $Donnees=utf8_decode($parsed_jsonXLS->{xls_fr}->{Donnees});
    $Compteur=utf8_decode($parsed_jsonXLS->{xls_fr}->{Compteur});
}else if($langue== "EN"){
    $Title=utf8_decode($parsed_jsonXLS->{xls_en}->{Title});
    $Donnees=utf8_decode($parsed_jsonXLS->{xls_en}->{Donnees});
    $Compteur=utf8_decode($parsed_jsonXLS->{xls_en}->{Compteur});
}
if ($_GET["section"] == "variete") {
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
} else if ($_GET["section"] == "accession") {
    if ($_SESSION['language_Vigne'] == "FR") {
        $labeljson = array(
            utf8_decode($parsed_json->{resultat_accession_fr}->{CodeIntro}),
            utf8_decode($parsed_json->{resultat_accession_fr}->{NomIntro}),
            utf8_decode($parsed_json->{resultat_accession_fr}->{NomVariete}),
            utf8_decode($parsed_json->{resultat_accession_fr}->{Partenaire}),
            utf8_decode($parsed_json->{resultat_accession_fr}->{PaysProvenance}),
            utf8_decode($parsed_json->{resultat_accession_fr}->{CommuneProvenance}),
            utf8_decode($parsed_json->{resultat_accession_fr}->{AnneeEntree}));
    } else {
        $labeljson = array(
            utf8_decode($parsed_json->{resultat_accession_en}->{CodeIntro}),
            utf8_decode($parsed_json->{resultat_accession_en}->{NomIntro}),
            utf8_decode($parsed_json->{resultat_accession_en}->{NomVariete}),
            utf8_decode($parsed_json->{resultat_accession_en}->{Partenaire}),
            utf8_decode($parsed_json->{resultat_accession_en}->{PaysProvenance}),
            utf8_decode($parsed_json->{resultat_accession_en}->{CommuneProvenance}),
            utf8_decode($parsed_json->{resultat_accession_en}->{AnneeEntree}));
    }
}

require('../includes/bibliFonc.php'); //Accès à la base de données
require('../includes/class_DAO_Bibilotheque.php'); //Accès aux requêtes SQL

$section = $_GET["section"]; // récupère la section à importer en xls
$code = $_SESSION['CodeEsp'];// récupère le code espèce de la fiche
$name=$code."_".$section.".xls"; // nomme le fichier
$fname = tempnam("/tmp", $name);
$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportxls_espece($_SESSION['language_Vigne'], $section, $code);

$Titre = & $workbook->addformat();
$Titre->set_bold();

$Date = & $workbook->addformat();

$Label = & $workbook->addformat();
$Label->set_bold();
$Label->set_bg_color("silver"); // couleur gris clair

$Données = & $workbook->addformat();

$worksheet->write(0, 0, $Title, $Titre);
$worksheet->write(1, 0, $Donnees . date("d-m-Y"), $Date);
$worksheet->write(2, 0, $Compteur . count($resultat), $Données);
$worksheet->write(3, 0, $labeljson, $Label);
$j = 0;
foreach ($resultat as $value) {
    $i = 0;
    foreach ($value as $v) {
        $v = utf8_decode($v);
        if ($v == ' ? ' || $v == ' ?') {
            $v = "--";
        }
        $worksheet->write(4 + $j, 0 + $i, $v, $Données);
        $i++;
    }
    $j++;
}

$workbook->close();
header("Content-Type: application/x-msexcel; name=\"$name\"");
header("Content-Disposition: attachment; filename=\"$name\"");
header('Content-Transfer-Encoding: binary');
header('Content-Description: File Transfer');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
readfile($fname);
exit;
?>

