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

if ($_GET["section"] == "accession") {
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

$code = $_SESSION['CodeVar']; 
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportxls_variete($_SESSION['language_Vigne'], $_GET["section"], $code);

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


$worksheet->write(2 , 0 ,count($resultat),$Données);

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

