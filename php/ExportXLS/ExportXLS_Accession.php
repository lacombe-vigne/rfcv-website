<?php

require_once "writeexcel/class.writeexcel_workbook.inc.php";
require_once "writeexcel/class.writeexcel_worksheet.inc.php";

$fname = tempnam("/tmp", "data.xls");
$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();
$section = $_GET["section"];


session_start(); //Permet de récupérer le contenu des variables de session

$langue = $_SESSION['language_Vigne'];
$json = file_get_contents('../../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
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
switch ($section) {
    case "aptitude":
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{CodeAptitude}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{CodeVar_selection_aptitude}),        
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{AptitudeMesure}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{ValeurCaractNum}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{UniteMesure}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{Ponderation}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{Date_aptitude}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{CodePartenaire}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_aptitude_en}->{CodeAptitude}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{CodeVar_selection_aptitude}), 
                utf8_decode($parsed_json->{resultat_aptitude_en}->{AptitudeMesure}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{ValeurCaractNum}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{UniteMesure}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{Ponderation}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{Date_aptitude}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{CodePartenaire}));
        }
        break;
    case "emplacement":
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_emplacement_fr}->{CodeEmplacem}),
                utf8_decode($parsed_json->{resultat_emplacement_fr}->{CodeSite}),        
                utf8_decode($parsed_json->{resultat_emplacement_fr}->{Parcelle}),
                utf8_decode($parsed_json->{resultat_emplacement_fr}->{Rang}),
                utf8_decode($parsed_json->{resultat_emplacement_fr}->{AnneePlantation}),
                utf8_decode($parsed_json->{resultat_emplacement_fr}->{NomIntro}),
                utf8_decode($parsed_json->{resultat_emplacement_fr}->{CodeIntro}),
                utf8_decode($parsed_json->{resultat_emplacement_fr}->{CodeIntroPartenaire}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_emplacement_en}->{CodeEmplacem}),
                utf8_decode($parsed_json->{resultat_emplacement_en}->{CodeSite}),        
                utf8_decode($parsed_json->{resultat_emplacement_en}->{Parcelle}),
                utf8_decode($parsed_json->{resultat_emplacement_en}->{Rang}),
                utf8_decode($parsed_json->{resultat_emplacement_en}->{AnneePlantation}),
                utf8_decode($parsed_json->{resultat_emplacement_en}->{NomIntro}),
                utf8_decode($parsed_json->{resultat_emplacement_en}->{CodeIntro}),
                utf8_decode($parsed_json->{resultat_emplacement_en}->{CodeIntroPartenaire}));
        }
        break;
    case "":
        break;
    case "":
        break;
    case "":
        break;
    case "":
        break;
    case "bibliographie":
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_bibliographie_fr}->{CodeCit}),
                utf8_decode($parsed_json->{resultat_bibliographie_fr}->{CodeVar}),
                utf8_decode($parsed_json->{resultat_bibliographie_fr}->{Title}),
                utf8_decode($parsed_json->{resultat_bibliographie_fr}->{Author}),
                utf8_decode($parsed_json->{resultat_bibliographie_fr}->{Year}),
                utf8_decode($parsed_json->{resultat_bibliographie_fr}->{PagesCitation}),
                utf8_decode($parsed_json->{resultat_bibliographie_fr}->{VolumeCitation}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{CodeCit}),
                utf8_decode($parsed_json->{resultat_bibliographie_fr}->{CodeVar}),        
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{Title}),
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{Author}),
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{Year}),
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{PagesCitation}),
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{VolumeCitation}));
        }
        break;
}
require('../includes/bibliFonc.php'); //Accès à la base de données
require('../includes/class_DAO_Bibilotheque.php'); //Accès aux requêtes SQL

$code = $_SESSION['CodeIntro'];
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportxls_accession($langue, $section, $code);

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
header("Content-Type: application/x-msexcel; name=\"data.xls\"");
header("Content-Disposition: attachment; filename=\"data.xls\"");
header('Content-Transfer-Encoding: binary');
header('Content-Description: File Transfer');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
readfile($fname);
exit;
?>

