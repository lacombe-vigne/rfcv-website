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
} else if($_GET["section"] == "espece") {
    if ($_SESSION['language_Vigne'] == "FR") {
        $labeljson = array(
            utf8_decode($parsed_json->{resultat_espece_fr}->{CodeEspece}),
            utf8_decode($parsed_json->{resultat_espece_fr}->{NomEspece}),
            utf8_decode($parsed_json->{resultat_espece_fr}->{Botaniste}),
            utf8_decode($parsed_json->{resultat_espece_fr}->{Tronc}));
    } else {
        $labeljson = array(
            utf8_decode($parsed_json->{resultat_espece_en}->{CodeEspece}),
            utf8_decode($parsed_json->{resultat_espece_en}->{NomEspece}),
            utf8_decode($parsed_json->{resultat_espece_en}->{Botaniste}),
            utf8_decode($parsed_json->{resultat_espece_en}->{Tronc}));
    }
}
require('../includes/bibliFonc.php'); //Accès à la base de données
require('../includes/class_DAO_Bibilotheque.php'); //Accès aux requêtes SQL
$DAO = new BibliothequeDAO();

$t1=microtime();
$t1=explode(" ",$t1);
$t2=explode(".",$t1[0]);
$t2=$t1[1].".".$t2[1];

//$resultat = $DAO->exportxls($_SESSION['language_Vigne'],$_SESSION['search'],"variete",$_SESSION['typerecherche']);
$resultat = $DAO->exportxls($_SESSION['language_Vigne'], $_GET["section"]);
//$resultat = $DAO->searchSimple($_SESSION['search'], $_SESSION['search'], "fuzzy", "variete", $_SESSION['language_Vigne'], 1, 20, 1, 20, 1, 20, "tri_espece_asc", 1, "CodeEsp", "tri_variete_asc", 1, "CodeVar", "tri_accession_asc", 1, "CodeIntro");
/* foreach ($resultat as &$value) {
  foreach ($value as &$i) {
  $i = utf8_decode($i);
  if ($i == ' ? ' || $i == ' ?') {
  $i = '-';
  }
  }
  } */

/*$i=0;
while($i<count($resultat)){
$resultat[$i]['utilite']=$DAO->utilitebis($resultat[$i]['utilite'], $_SESSION['language_Vigne'], $_SESSION['PDO']);    
$resultat[$i]['couleurPel']=$DAO->couleurPelBis($resultat[$i]['couleurPel'],$_SESSION['language_Vigne'],$_SESSION['PDO']);
$resultat[$i]['saveur']=$DAO->saveurBis($resultat[$i]['saveur'], $_SESSION['language_Vigne'], $_SESSION['PDO']);
$resultat[$i]['pepins']=$DAO->pepinsBis($resultat[$i]['pepins'], $_SESSION['language_Vigne'], $_SESSION['PDO']);
$resultat[$i]['sexe']=$DAO->sexeBis($resultat[$i]['sexe'], $_SESSION['language_Vigne'], $_SESSION['PDO']);
$resultat[$i]['paysorigine']=$DAO->paysorigineBis($resultat[$i]['paysorigine'], $_SESSION['language_Vigne'], $_SESSION['PDO']);
$i++;
}*/
//$_SESSION['PDO']->closeCursor();
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


$t3=microtime();
$t3=explode(" ",$t3);
$t4=explode(".",$t3[0]);
$t4=$t3[1].".".$t4[1];
$t5=$t4-$t2;
$t5=$t5*1000;
$worksheet->write(2 , 1 ,count($resultat),$Données);
$worksheet->write(2 , 0 , $t5, $Données);

/* $j = 0;
  foreach ($resultat as $value) {
  echo $value;
  $j++;
  } */
//\'data.xls\''
$workbook->close();
header("Content-Type: application/x-msexcel; name=\"data.xls\"");
header("Content-Disposition: attachment; filename=\"data.xls\"");
header('Content-Transfer-Encoding: binary');
header('Content-Description: File Transfer');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
readfile($fname);
/*$fh = fopen($fname, "rb");
fpassthru($fh);
unlink($fname);*/
exit;
?>
