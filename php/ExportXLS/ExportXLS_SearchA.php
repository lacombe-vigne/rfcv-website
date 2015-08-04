<?php
/*
 * Ce fichier gère les exports xls lorsqu'on réalise une recherche avancée
 */
require "writeexcel/class.writeexcel_workbook.inc.php"; // Recupère la librairie qui permet d'exporter en format xls
require "writeexcel/class.writeexcel_worksheet.inc.php";
$section = $_GET["section"]; // récupère la section
session_start(); //Permet de récupérer le contenu des variables de session
$langue = $_SESSION['language_Vigne'];
$jsonXLS = file_get_contents('../../json/xls.json');
$parsed_jsonXLS = json_decode($jsonXLS); // Permet de lire le fichier JSON avec PHP.
if ($langue == "FR") {
    $Title = utf8_decode($parsed_jsonXLS->{xls_fr}->{Title});
    $Donnees = utf8_decode($parsed_jsonXLS->{xls_fr}->{Donnees});
    $Compteur = utf8_decode($parsed_jsonXLS->{xls_fr}->{Compteur});
} else if ($langue == "EN") {
    $Title = utf8_decode($parsed_jsonXLS->{xls_en}->{Title});
    $Donnees = utf8_decode($parsed_jsonXLS->{xls_en}->{Donnees});
    $Compteur = utf8_decode($parsed_jsonXLS->{xls_en}->{Compteur});
}
$json = file_get_contents('../../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
$json2 = file_get_contents('../../json/search.json');
$parsed_json2 = json_decode($json2); // Permet de lire le fichier JSON avec PHP.
switch ($section) {
    case "Espece":
        $requete = $_SESSION['sql_esp']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json2->{resultat_espece_fr}->{CodeEspece}),
                utf8_decode($parsed_json2->{resultat_espece_fr}->{NomEspece}),
                utf8_decode($parsed_json2->{resultat_espece_fr}->{Botaniste}),
                utf8_decode($parsed_json2->{resultat_espece_fr}->{Tronc}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json2->{resultat_espece_en}->{CodeEspece}),
                utf8_decode($parsed_json2->{resultat_espece_en}->{NomEspece}),
                utf8_decode($parsed_json2->{resultat_espece_en}->{Botaniste}),
                utf8_decode($parsed_json2->{resultat_espece_en}->{Tronc}));
        }
        break;
    case "Variete":
        $requete = $_SESSION['sql_var']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json2->{resultat_variete_fr}->{CodeVariete}),
                utf8_decode($parsed_json2->{resultat_variete_fr}->{NomVariete}),
                utf8_decode($parsed_json2->{resultat_variete_fr}->{SynoMajeur}),
                utf8_decode($parsed_json2->{resultat_variete_fr}->{Utilite}),
                utf8_decode($parsed_json2->{resultat_variete_fr}->{CouleurPellicule}),
                utf8_decode($parsed_json2->{resultat_variete_fr}->{Saveur}),
                utf8_decode($parsed_json2->{resultat_variete_fr}->{Pepins}),
                utf8_decode($parsed_json2->{resultat_variete_fr}->{Sexe}),
                utf8_decode($parsed_json2->{resultat_variete_fr}->{PaysOrigine}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json2->{resultat_variete_en}->{CodeVariete}),
                utf8_decode($parsed_json2->{resultat_variete_en}->{NomVariete}),
                utf8_decode($parsed_json2->{resultat_variete_en}->{SynoMajeur}),
                utf8_decode($parsed_json2->{resultat_variete_en}->{Utilite}),
                utf8_decode($parsed_json2->{resultat_variete_en}->{CouleurPellicule}),
                utf8_decode($parsed_json2->{resultat_variete_en}->{Saveur}),
                utf8_decode($parsed_json2->{resultat_variete_en}->{Pepins}),
                utf8_decode($parsed_json2->{resultat_variete_en}->{Sexe}),
                utf8_decode($parsed_json2->{resultat_variete_en}->{PaysOrigine}));
        }
        break;
    case "Accession":
        $requete = $_SESSION['sql_acc']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json2->{resultat_accession_fr}->{CodeIntro}),
                utf8_decode($parsed_json2->{resultat_accession_fr}->{NomIntro}),
                utf8_decode($parsed_json2->{resultat_accession_fr}->{NomVariete}),
                utf8_decode($parsed_json2->{resultat_accession_fr}->{Partenaire}),
                utf8_decode($parsed_json2->{resultat_accession_fr}->{PaysProvenance}),
                utf8_decode($parsed_json2->{resultat_accession_fr}->{CommuneProvenance}),
                utf8_decode($parsed_json2->{resultat_accession_fr}->{AnneeEntree}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json2->{resultat_accession_en}->{CodeIntro}),
                utf8_decode($parsed_json2->{resultat_accession_en}->{NomIntro}),
                utf8_decode($parsed_json2->{resultat_accession_en}->{NomVariete}),
                utf8_decode($parsed_json2->{resultat_accession_en}->{Partenaire}),
                utf8_decode($parsed_json2->{resultat_accession_en}->{PaysProvenance}),
                utf8_decode($parsed_json2->{resultat_accession_en}->{CommuneProvenance}),
                utf8_decode($parsed_json2->{resultat_accession_en}->{AnneeEntree}));
        }
        break;
    case "Emplacement":
        $requete = $_SESSION['sql_emp']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
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
    case "Sanitaire":
        $requete = $_SESSION['sql_san']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_sanitaire_fr}->{IdTest}),
                utf8_decode($parsed_json->{resultat_sanitaire_fr}->{CodeIntro}),        
                utf8_decode($parsed_json->{resultat_sanitaire_fr}->{Pathogene}),
                utf8_decode($parsed_json->{resultat_sanitaire_fr}->{CategorieTest}),
                utf8_decode($parsed_json->{resultat_sanitaire_fr}->{ResultatTest}),
                utf8_decode($parsed_json->{resultat_sanitaire_fr}->{Laboratoire}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_sanitaire_en}->{IdTest}),
                utf8_decode($parsed_json->{resultat_sanitaire_en}->{CodeIntro}),
                utf8_decode($parsed_json->{resultat_sanitaire_en}->{Pathogene}),
                utf8_decode($parsed_json->{resultat_sanitaire_en}->{CategorieTest}),
                utf8_decode($parsed_json->{resultat_sanitaire_en}->{ResultatTest}),
                utf8_decode($parsed_json->{resultat_sanitaire_en}->{Laboratoire}));
        }
        break;
    case "Morphologique":
        $requete = $_SESSION['sql_mor']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_description_fr}->{ID}),
                utf8_decode($parsed_json->{resultat_description_fr}->{Code}),
                utf8_decode($parsed_json->{resultat_description_fr}->{Description}),        
                utf8_decode($parsed_json->{resultat_description_fr}->{Critaire}),
                utf8_decode($parsed_json->{resultat_description_fr}->{CaractereOIV}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_description_fr}->{ID}),
                utf8_decode($parsed_json->{resultat_description_en}->{Code}),
                utf8_decode($parsed_json->{resultat_description_en}->{Description}),
                utf8_decode($parsed_json->{resultat_description_en}->{Critaire}),
                utf8_decode($parsed_json->{resultat_description_en}->{CaractereOIV}));
        }
        break;
    case "Aptitudes":
        $requete = $_SESSION['sql_apt']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{CodeAptitude}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{CodeVar_aptitude}),        
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{AptitudeMesure}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{ValeurCaractNum}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{UniteMesure}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{Ponderation}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{Date_aptitude}),
                utf8_decode($parsed_json->{resultat_aptitude_fr}->{CodePartenaire}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_aptitude_en}->{CodeAptitude}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{CodeVar_aptitude}), 
                utf8_decode($parsed_json->{resultat_aptitude_en}->{AptitudeMesure}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{ValeurCaractNum}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{UniteMesure}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{Ponderation}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{Date_aptitude}),
                utf8_decode($parsed_json->{resultat_aptitude_en}->{CodePartenaire}));
        }
        break;
    case "Genetique":
        $requete = $_SESSION['sql_gen']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_genetique_fr}->{IdAnalyse}),
                utf8_decode($parsed_json->{resultat_genetique_fr}->{Marqueur}),        
                utf8_decode($parsed_json->{resultat_genetique_fr}->{ValeurCodee1}),
                utf8_decode($parsed_json->{resultat_genetique_fr}->{ValeurCodee2}),
                utf8_decode($parsed_json->{resultat_genetique_fr}->{CodePartenaire}),
                utf8_decode($parsed_json->{resultat_genetique_fr}->{DatePCR}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_genetique_en}->{IdAnalyse}),
                utf8_decode($parsed_json->{resultat_genetique_en}->{Marqueur}),
                utf8_decode($parsed_json->{resultat_genetique_en}->{ValeurCodee1}),
                utf8_decode($parsed_json->{resultat_genetique_en}->{ValeurCodee2}),
                utf8_decode($parsed_json->{resultat_genetique_en}->{CodePartenaire}),
                utf8_decode($parsed_json->{resultat_genetique_en}->{DatePCR}));
        }
        break;
    case "Phototeque":
        $requete = $_SESSION['sql_pho']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            
        } else if ($langue == "EN") {
            
        }
        break;
    case "Documentation":
        $requete = $_SESSION['sql_doc']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            
        } else if ($langue == "EN") {
            
        }
        break;
    case "Bibliographie":
        $requete = $_SESSION['sql_bib']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
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
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{CodeVar}),        
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{Title}),
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{Author}),
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{Year}),
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{PagesCitation}),
                utf8_decode($parsed_json->{resultat_bibliographie_en}->{VolumeCitation}));
        }
        break;
    case "Partenaire":
        $requete = $_SESSION['sql_par']; // Recupère la requête de la recherche avancée
        //Permet de récupérer les bon json en fonction de la langue
        if ($langue == "FR") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_partenaire_fr}->{Title}),
                utf8_decode($parsed_json->{resultat_partenaire_fr}->{CodePartenaire}),
                utf8_decode($parsed_json->{resultat_partenaire_fr}->{siglePartenaire}),
                utf8_decode($parsed_json->{resultat_partenaire_fr}->{NomPartenaire}),
                utf8_decode($parsed_json->{resultat_partenaire_fr}->{SectionRegionaleENTAV}));
        } else if ($langue == "EN") {
            $labeljson = array(
                utf8_decode($parsed_json->{resultat_partenaire_en}->{Title}),
                utf8_decode($parsed_json->{resultat_partenaire_en}->{CodePartenaire}),
                utf8_decode($parsed_json->{resultat_partenaire_en}->{siglePartenaire}),
                utf8_decode($parsed_json->{resultat_partenaire_en}->{NomPartenaire}),
                utf8_decode($parsed_json->{resultat_partenaire_en}->{SectionRegionaleENTAV}));
        }
        break;
}
require('../includes/bibliFonc.php'); //Accès à la base de données
require('../includes/class_DAO_Bibilotheque.php'); //Accès aux requêtes SQL
$name ="searchAd"."_".$section.".xls";
$fname = tempnam("/tmp", $name);
$workbook = &new writeexcel_workbook($fname);
$worksheet = &$workbook->addworksheet();
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportxls_searchAd($langue, $section, $requete);

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

//\'data.xls\''
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