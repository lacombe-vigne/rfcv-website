<?php
/*
 * Ce fichier gère les exports xls lorsqu'on réalise une selection d'entité
 */
require "writeexcel/class.writeexcel_workbook.inc.php"; // Fais appel à la librairie qui génère les xls
require "writeexcel/class.writeexcel_worksheet.inc.php";
require('../includes/bibliFonc.php'); //Accès à la base de données
require('../includes/class_DAO_Bibilotheque.php'); //Accès aux requêtes SQL
$section = $_GET["section"];
$name = "selection_".$section.".xls";
$fname = tempnam("/tmp", $name);
$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();
session_start(); //Permet de récupérer le contenu des variables de session
$langue = $_SESSION['language_Vigne'];
$DAO = new BibliothequeDAO();
$json = file_get_contents('../../json/selection.json');
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
switch ($section) {

    case "Espece":
        $TabCode = array();
        foreach ($_SESSION['selection']['Espece'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->espece_selection($TabCode);
        //Récupère le contenu de notre panier
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeEspece}),
                utf8_decode($parsed_json->{selection_fr}->{NomEspece}),
                utf8_decode($parsed_json->{selection_fr}->{Botaniste}),
                utf8_decode($parsed_json->{selection_fr}->{Tronc}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeEspece}),
                utf8_decode($parsed_json->{selection_en}->{NomEspece}),
                utf8_decode($parsed_json->{selection_en}->{Botaniste}),
                utf8_decode($parsed_json->{selection_en}->{Tronc}));
        }
        break;
    case "Variete":
        $TabCode = array();
        foreach ($_SESSION['selection']['Variete'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->variete_selection($TabCode, $langue);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeVariete}),
                utf8_decode($parsed_json->{selection_fr}->{NomVariete}),
                utf8_decode($parsed_json->{selection_fr}->{SynoMajeur}),
                utf8_decode($parsed_json->{selection_fr}->{Utilite}),
                utf8_decode($parsed_json->{selection_fr}->{CouleurPellicule}),
                utf8_decode($parsed_json->{selection_fr}->{Saveur}),
                utf8_decode($parsed_json->{selection_fr}->{Pepins}),
                utf8_decode($parsed_json->{selection_fr}->{Sexe}),
                utf8_decode($parsed_json->{selection_fr}->{PaysOrigine}),
                utf8_decode($parsed_json->{selection_fr}->{CodeEspece}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeVariete}),
                utf8_decode($parsed_json->{selection_en}->{NomVariete}),
                utf8_decode($parsed_json->{selection_en}->{SynoMajeur}),
                utf8_decode($parsed_json->{selection_en}->{Utilite}),
                utf8_decode($parsed_json->{selection_en}->{CouleurPellicule}),
                utf8_decode($parsed_json->{selection_en}->{Saveur}),
                utf8_decode($parsed_json->{selection_en}->{Pepins}),
                utf8_decode($parsed_json->{selection_en}->{Sexe}),
                utf8_decode($parsed_json->{selection_en}->{PaysOrigine}),
                utf8_decode($parsed_json->{selection_fr}->{CodeEspece}));
        }
        break;
    case "Accession":
        $TabCode = array();
        foreach ($_SESSION['selection']['Accession'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->accession_selectionXLS($TabCode,$langue);
        //print_r($data);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeIntro}),
                utf8_decode($parsed_json->{selection_fr}->{NomIntro_acc}),
                utf8_decode($parsed_json->{selection_fr}->{NomVariete_acc_FichierEsp}),
                utf8_decode($parsed_json->{selection_fr}->{Partenaire_FichierEsp}),
                utf8_decode($parsed_json->{selection_fr}->{PaysProvenance}),
                utf8_decode($parsed_json->{selection_fr}->{CommuneProvenance}),
                utf8_decode($parsed_json->{selection_fr}->{AnneeEntree}),
                utf8_decode($parsed_json->{selection_fr}->{CodeVariete_selection_accession}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeIntro}),
                utf8_decode($parsed_json->{selection_en}->{NomIntro_acc}),
                utf8_decode($parsed_json->{selection_en}->{NomVariete_acc_FichierEsp}),
                utf8_decode($parsed_json->{selection_en}->{Partenaire_FichierEsp}),
                utf8_decode($parsed_json->{selection_en}->{PaysProvenance}),
                utf8_decode($parsed_json->{selection_en}->{CommuneProvenance}),
                utf8_decode($parsed_json->{selection_en}->{AnneeEntree}),
                utf8_decode($parsed_json->{selection_en}->{CodeVariete_selection_accession}));
        }
        break;
    case "Emplacement":
        $TabCode = array();
        foreach ($_SESSION['selection']['Emplacement'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->emplacement_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeEmplacem_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{CodeSite_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Parcelle_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Rang_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Anneeplantation_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{NomIntro_selection_emplacement}),
                utf8_decode($parsed_json->{selection_fr}->{CodeIntro_selection_emplacement}),
                utf8_decode($parsed_json->{selection_fr}->{CodeDocPdf_FichierVar}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeEmplacem_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CodeSite_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Parcelle_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Rang_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Anneeplantation_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{NomIntro_selection_emplacement}),
                utf8_decode($parsed_json->{selection_en}->{CodeIntro_selection_emplacement}),
                utf8_decode($parsed_json->{selection_fr}->{CodeDocPdf_FichierVar}));
        }

        break;
    case "Sanitaire":
        $TabCode = array();
        foreach ($_SESSION['selection']['Sanitaire'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->sanitaire_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{IdTest_FichierVar}),  
                utf8_decode($parsed_json->{selection_fr}->{CodeIntro_sanitaire_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Pathogene_sanitaire_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{CategorieTest_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{ResultatTest_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Laboratoire_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{CodeVar_selection_sanitaire}),
                utf8_decode($parsed_json->{selection_fr}->{NomVariete}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{IdTest_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CodeIntro_sanitaire_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Pathogene_sanitaire_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CategorieTest_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{ResultatTest_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Laboratoire_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CodeVar_selection_sanitaire}),
                utf8_decode($parsed_json->{selection_en}->{NomVariete}));
        }

        break;
    case "Morphologique":
        $TabCode = array();
        foreach ($_SESSION['selection']['Morphologique'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->morphologique_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{IdTest_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{CodeOIV}),
                utf8_decode($parsed_json->{selection_fr}->{LibelleDescrip}),
                utf8_decode($parsed_json->{selection_fr}->{LibelleCritere}),
                utf8_decode($parsed_json->{selection_fr}->{CaractereOIV}),
                utf8_decode($parsed_json->{selection_fr}->{CodeAcc_selection_morphologique}),
                utf8_decode($parsed_json->{selection_fr}->{CodeVar_selection_morphologique}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{IdTest_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CodeOIV}),
                utf8_decode($parsed_json->{selection_en}->{LibelleDescrip}),
                utf8_decode($parsed_json->{selection_en}->{LibelleCritere}),
                utf8_decode($parsed_json->{selection_en}->{CaractereOIV}),
                utf8_decode($parsed_json->{selection_en}->{CodeAcc_selection_morphologique}),
                utf8_decode($parsed_json->{selection_en}->{CodeVar_selection_morphologique}));
        }

        break;
    case "Aptitude":
        $TabCode = array();
        foreach ($_SESSION['selection']['Aptitude'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->aptitude_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeAptitude}),
                utf8_decode($parsed_json->{selection_fr}->{CodeSite_FichierVar}),      
                utf8_decode($parsed_json->{selection_fr}->{AptitudeMesure}),
                utf8_decode($parsed_json->{selection_fr}->{ValeurCaractNum}),
                utf8_decode($parsed_json->{selection_fr}->{UniteMesure}),
                utf8_decode($parsed_json->{selection_fr}->{Ponderation}),
                utf8_decode($parsed_json->{selection_fr}->{Date_aptitude}),
                utf8_decode($parsed_json->{selection_fr}->{CodePartenaire}),
                utf8_decode($parsed_json->{selection_fr}->{CodeVar_selection_aptitude}),
                utf8_decode($parsed_json->{selection_fr}->{CodeAcc_selection_aptitude}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeAptitude}),
                utf8_decode($parsed_json->{selection_en}->{CodeSite_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{AptitudeMesure}),
                utf8_decode($parsed_json->{selection_en}->{ValeurCaractNum}),
                utf8_decode($parsed_json->{selection_en}->{UniteMesure}),
                utf8_decode($parsed_json->{selection_en}->{Ponderation}),
                utf8_decode($parsed_json->{selection_en}->{Date_aptitude}),
                utf8_decode($parsed_json->{selection_en}->{CodePartenaire}),
                utf8_decode($parsed_json->{selection_en}->{CodeVar_selection_aptitude}),
                utf8_decode($parsed_json->{selection_en}->{CodeAcc_selection_aptitude}));
        }
        break;
    case "Phototheque": //pas encore programmé
        $data=array();
		foreach($_SESSION['selection']['Phototheque'] as $value){
			// $content=$DAO->phototheque_selection($value);
			// array_push($data,$content);
		}
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeVariete}),
                utf8_decode($parsed_json->{selection_fr}->{NomVariete}),
                utf8_decode($parsed_json->{selection_fr}->{SynoMajeur}),
                utf8_decode($parsed_json->{selection_fr}->{Utilite}),
                utf8_decode($parsed_json->{selection_fr}->{CouleurPellicule}),
                utf8_decode($parsed_json->{selection_fr}->{Saveur}),
                utf8_decode($parsed_json->{selection_fr}->{Pepins}),
                utf8_decode($parsed_json->{selection_fr}->{Sexe}),
                utf8_decode($parsed_json->{selection_fr}->{PaysOrigine}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeVariete}),
                utf8_decode($parsed_json->{selection_en}->{NomVariete}),
                utf8_decode($parsed_json->{selection_en}->{SynoMajeur}),
                utf8_decode($parsed_json->{selection_en}->{Utilite}),
                utf8_decode($parsed_json->{selection_en}->{CouleurPellicule}),
                utf8_decode($parsed_json->{selection_en}->{Saveur}),
                utf8_decode($parsed_json->{selection_en}->{Pepins}),
                utf8_decode($parsed_json->{selection_en}->{Sexe}),
                utf8_decode($parsed_json->{selection_en}->{PaysOrigine}));
        }

        break;
    case "Genetique":
        $TabCode = array();
        foreach ($_SESSION['selection']['Genetique'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->genetique_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{IdAnalyse_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Marqueur_genetique_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{ValeurCodee1_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{ValeurCodee2_genetique_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{CodePartenaire_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{DatePCR_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{CodeAcc_selection_genetique}),
                utf8_decode($parsed_json->{selection_fr}->{CodeVar_selection_genetique}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{IdAnalyse_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Marqueur_genetique_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{ValeurCodee1_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{ValeurCodee2_genetique_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CodePartenaire_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{DatePCR_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CodeAcc_selection_genetique}),
                utf8_decode($parsed_json->{selection_en}->{CodeVar_selection_genetique}));
        }

        break;
    case "Documentation":
        $TabCode = array();
        foreach ($_SESSION['selection']['Documentation'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->documentation_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeDocPdf_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Titre_doc_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Auteurs_doc_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Date_doc_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{TypeDoc_doc_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{DocCLICABLE_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{CodeAcc_selection_documentation}),
                utf8_decode($parsed_json->{selection_fr}->{CodeVar_selection_documentation}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeDocPdf_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Titre_doc_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Auteurs_doc_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Date_doc_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{TypeDoc_doc_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{DocCLICABLE_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CodeAcc_selection_documentation}),
                utf8_decode($parsed_json->{selection_en}->{CodeVar_selection_documentation}));
        }

        break;
    case "Bibliographie":
        $TabCode = array();
        foreach ($_SESSION['selection']['Bibliographie'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->bibliographie_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeCit_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Title_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Author_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Year_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{VolumeCitation_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{PagesCitation_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{NomVariete}),
                utf8_decode($parsed_json->{selection_fr}->{CodeVar_selection_bibliographie}),
                utf8_decode($parsed_json->{selection_fr}->{NomIntro_acc}),
                utf8_decode($parsed_json->{selection_fr}->{CodeAcc_selection_bibliographie}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeCit_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Title_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Author_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Year_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{VolumeCitation_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{PagesCitation_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{NomVariete}),
                utf8_decode($parsed_json->{selection_en}->{CodeVar_selection_bibliographie}),
                utf8_decode($parsed_json->{selection_en}->{NomIntro_acc}),
                utf8_decode($parsed_json->{selection_en}->{CodeAcc_selection_bibliographie}));
        }

        break;
    case "Partenaire":
        $TabCode = array();
        foreach ($_SESSION['selection']['Partenaire'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->partenaire_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodePartenaire}),
                utf8_decode($parsed_json->{selection_fr}->{siglePartenaire}),
                utf8_decode($parsed_json->{selection_fr}->{NomPartenaire}),
                utf8_decode($parsed_json->{selection_fr}->{sectionPartenaire}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodePartenaire}),
                utf8_decode($parsed_json->{selection_en}->{siglePartenaire}),
                utf8_decode($parsed_json->{selection_en}->{NomPartenaire}),
                utf8_decode($parsed_json->{selection_en}->{sectionPartenaire}));
        }

        break;
    case "Lien":
        $TabCode = array();
        foreach ($_SESSION['selection']['Lien'] as $value) {
            array_push($TabCode, $value);
        }
        $TabCode = "'" . implode("','", $TabCode) . "'";
        $data = $DAO->lien_selection($TabCode);
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_fr}->{CodeLienWeb_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Titre_lien_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{NomSite_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{Pays_lien_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{LienCLICABLE_FichierVar}),
                utf8_decode($parsed_json->{selection_fr}->{CodeAcc_selection_lien}),
                utf8_decode($parsed_json->{selection_fr}->{CodeVar_selection_lien}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{selection_en}->{CodeLienWeb_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Titre_lien_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{NomSite_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{Pays_lien_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{LienCLICABLE_FichierVar}),
                utf8_decode($parsed_json->{selection_en}->{CodeAcc_selection_lien}),
                utf8_decode($parsed_json->{selection_en}->{CodeVar_selection_lien}));
        }

        break;
}
//CSS du tableur
$Titre = & $workbook->addformat();
$Titre->set_bold();

$Date = & $workbook->addformat();

$Label = & $workbook->addformat();
$Label->set_bold();
$Label->set_bg_color("silver"); // couleur gris clair

$Données = & $workbook->addformat();
$worksheet->write(0, 0, $Title, $Titre);
$worksheet->write(1, 0, $Donnees . date("d-m-Y"), $Date);
$worksheet->write(2, 0, $Compteur . count($data), $Données);
$worksheet->write(3, 0, $labeljson, $Label);

$j = 0;
foreach ($data as $value) {
    $i = 0;
    //$worksheet->write(4 + $j, 10 + $k, $value, $Données);
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