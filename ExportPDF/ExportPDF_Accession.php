<?php
session_start(); //Permet de récupérer le contenu des variables de session
/* Traitement fichier.json */
$json = file_get_contents('../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
$jsonHeader = file_get_contents('../json/home.json');
$parsed_jsonHeader = json_decode($jsonHeader); // pour récuperer le contenu de home.json
/* Permet de récuperer le label correspondant en anglais ou en français */
if ($_SESSION['language_Vigne'] == 'FR') {/* Français */
    $Code = $parsed_json->{code_fr}->{Code};
    /* Titres */
    $PDtitle = $parsed_json->{accession_fr}->{PDtitle};
    $PAtitle = $parsed_json->{accession_fr}->{PAtitle};
    $CItilte = $parsed_json->{accession_fr}->{CItilte};
    $Atitle = $parsed_json->{accession_fr}->{Atitle};
    $Rtitle = $parsed_json->{accession_fr}->{Rtitle};
    /* Données */
    $Title = $parsed_json->{accession_fr}->{Title};
    $Partenaire = $parsed_json->{accession_fr}->{Partenaire};
    $codeIntroPartenaire = $parsed_json->{accession_fr}->{codeIntroPartenaire};
    $Statut = $parsed_json->{accession_fr}->{Statut};
    $UniteIntro = $parsed_json->{accession_fr}->{UniteIntro};
    $AnneeAgrement = $parsed_json->{accession_fr}->{AnneeAgrement};
    $PayP = $parsed_json->{accession_fr}->{PayP};
    $CommuneP = $parsed_json->{accession_fr}->{CommuneP};
    $AdresseP = $parsed_json->{accession_fr}->{AdresseP};
    $Collecteur = $parsed_json->{accession_fr}->{Collecteur};
    $NomVar = $parsed_json->{accession_fr}->{NomVar};

    /* Labels provenance direct */
    $PDpays = $parsed_json->{accession_fr}->{PDpays};
    $PDregion = $parsed_json->{accession_fr}->{PDregion};
    $PDdepart = $parsed_json->{accession_fr}->{PDdepart};
    $PDcommune = $parsed_json->{accession_fr}->{PDcommune};
    $PDcodePost = $parsed_json->{accession_fr}->{PDcodePost};
    $PDsite = $parsed_json->{accession_fr}->{PDsite};
    $PDadresse = $parsed_json->{accession_fr}->{PDadresse};
    $PDpropirete = $parsed_json->{accession_fr}->{PDpropirete};
    $PDcollecteure = $parsed_json->{accession_fr}->{PDcollecteure};
    $PDparcelle = $parsed_json->{accession_fr}->{PDparcelle};
    $PDrang = $parsed_json->{accession_fr}->{PDrang};
    $PDsouche = $parsed_json->{accession_fr}->{PDsouche};
    $PDlatitude = $parsed_json->{accession_fr}->{PDlatitude};
    $PDlongitude = $parsed_json->{accession_fr}->{PDlongitude};
    $PDaltitude = $parsed_json->{accession_fr}->{PDaltitude};
    $PDjour = $parsed_json->{accession_fr}->{PDjour};
    $PDmois = $parsed_json->{accession_fr}->{PDmois};
    $PDannee = $parsed_json->{accession_fr}->{PDannee};
    $PDcodeIntroProvenance = $parsed_json->{accession_fr}->{PDcodeIntroProvenance};
    $PDcodeEntree = $parsed_json->{accession_fr}->{PDcodeEntree};
    $PDreIntroduit = $parsed_json->{accession_fr}->{PDreIntroduit};
    $PDissuTraitement = $parsed_json->{accession_fr}->{PDissuTraitement};
    $PDcoloneTraite = $parsed_json->{accession_fr}->{PDcoloneTraite};
    $PDremarques = $parsed_json->{accession_fr}->{PDremarques};

    /* Labels provenance antérieure */
    $PApays = $parsed_json->{accession_fr}->{PApays};
    $PAregion = $parsed_json->{accession_fr}->{PAregion};
    $PAdeparte = $parsed_json->{accession_fr}->{PAdeparte};
    $PAcommune = $parsed_json->{accession_fr}->{PAcommune};
    $PAcodePost = $parsed_json->{accession_fr}->{PAcodePost};
    $PAsite = $parsed_json->{accession_fr}->{PAsite};
    $PAadresse = $parsed_json->{accession_fr}->{PAadresse};
    $PApropriete = $parsed_json->{accession_fr}->{PApropriete};
    $PAcollecteur = $parsed_json->{accession_fr}->{PAcollecteur};
    $PAparcelle = $parsed_json->{accession_fr}->{PAparcelle};
    $PArang = $parsed_json->{accession_fr}->{PArang};
    $PAsouche = $parsed_json->{accession_fr}->{PAsouche};
    $PAcodeIntro = $parsed_json->{accession_fr}->{PAcodeIntro};

    /* Identification */
    $CIcouleurPe = $parsed_json->{accession_fr}->{CIcouleurPe};
    $CIcouleurPu = $parsed_json->{accession_fr}->{CIcouleurPu};
    $CIsaveur = $parsed_json->{accession_fr}->{CIsaveur};
    $CIpepins = $parsed_json->{accession_fr}->{CIpepins};
    $CIsexe = $parsed_json->{accession_fr}->{CIsexe};
    $CIidentification = $parsed_json->{accession_fr}->{CIidentification};
    $CIidenMorphologique = $parsed_json->{accession_fr}->{CIidenMorphologique};
    $CIidenGenetique = $parsed_json->{accession_fr}->{CIidenGenetique};
    $CIidenAutre = $parsed_json->{accession_fr}->{CIidenAutre};
    $CIbibliographie = $parsed_json->{accession_fr}->{CIbibliographie};
    $CIvolume = $parsed_json->{accession_fr}->{CIvolume};
    $CIpage = $parsed_json->{accession_fr}->{CIpage};
    $CIremarque = $parsed_json->{accession_fr}->{CIremarque};

    /* Agrement */
    $Aagrement = $parsed_json->{accession_fr}->{Aagrement};
    $AfamilleSanitaire = $parsed_json->{accession_fr}->{AfamilleSanitaire};
    $AagrementCTPS = $parsed_json->{accession_fr}->{AagrementCTPS};
    $AnumTempCTPS = $parsed_json->{accession_fr}->{AnumTempCTPS};
    $AnumAgreCTPS = $parsed_json->{accession_fr}->{AnumAgreCTPS};
    $AanneeAgrement = $parsed_json->{accession_fr}->{AanneeAgrement};
    $AanneeNonCertifiable = $parsed_json->{accession_fr}->{AanneeNonCertifiable};
    $AlieuDepotMatInitial = $parsed_json->{accession_fr}->{AlieuDepotMatInitial};
    $AsurfMulti = $parsed_json->{accession_fr}->{AsurfMulti};
    $AdelegONIVINS = $parsed_json->{accession_fr}->{AdelegONIVINS};
    $AnomPartenaire = $parsed_json->{accession_fr}->{AnomPartenaire};
    $AnomPartenaire2 = $parsed_json->{accession_fr}->{AnomPartenaire2};

    /* Remarques */
    $RmaintienEnCollection = $parsed_json->{accession_fr}->{RmaintienEnCollection};
    $RremarqueDiffusion = $parsed_json->{accession_fr}->{RremarqueDiffusion};
    $RremarqueIntro = $parsed_json->{accession_fr}->{RremarqueIntro};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_fr}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_fr}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_fr}->{document};
} else {/* Anglais */
    $Code = $parsed_json->{code_en}->{Code};
    /* Titres */
    $PDtitle = $parsed_json->{accession_en}->{PDtitle};
    $PAtitle = $parsed_json->{accession_en}->{PAtitle};
    $CItilte = $parsed_json->{accession_en}->{CItilte};
    $Atitle = $parsed_json->{accession_en}->{Atitle};
    $Rtitle = $parsed_json->{accession_en}->{Rtitle};
    /* Données */
    $Title = $parsed_json->{accession_en}->{Title};
    $Partenaire = $parsed_json->{accession_en}->{Partenaire};
    $codeIntroPartenaire = $parsed_json->{accession_en}->{codeIntroPartenaire};
    $Statut = $parsed_json->{accession_en}->{Statut};
    $UniteIntro = $parsed_json->{accession_en}->{UniteIntro};
    $AnneeAgrement = $parsed_json->{accession_en}->{AnneeAgrement};
    $PayP = $parsed_json->{accession_en}->{PayP};
    $CommuneP = $parsed_json->{accession_en}->{CommuneP};
    $AdresseP = $parsed_json->{accession_en}->{AdresseP};
    $Collecteur = $parsed_json->{accession_en}->{Collecteur};
    $NomVar = $parsed_json->{accession_en}->{NomVar};

    /* Labels provenance direct */
    $PDpays = $parsed_json->{accession_en}->{PDpays};
    $PDregion = $parsed_json->{accession_en}->{PDregion};
    $PDdepart = $parsed_json->{accession_en}->{PDdepart};
    $PDcommune = $parsed_json->{accession_en}->{PDcommune};
    $PDcodePost = $parsed_json->{accession_en}->{PDcodePost};
    $PDsite = $parsed_json->{accession_en}->{PDsite};
    $PDadresse = $parsed_json->{accession_en}->{PDadresse};
    $PDpropirete = $parsed_json->{accession_en}->{PDpropirete};
    $PDcollecteure = $parsed_json->{accession_en}->{PDcollecteure};
    $PDparcelle = $parsed_json->{accession_en}->{PDparcelle};
    $PDrang = $parsed_json->{accession_en}->{PDrang};
    $PDsouche = $parsed_json->{accession_en}->{PDsouche};
    $PDlatitude = $parsed_json->{accession_en}->{PDlatitude};
    $PDlongitude = $parsed_json->{accession_en}->{PDlongitude};
    $PDaltitude = $parsed_json->{accession_en}->{PDaltitude};
    $PDjour = $parsed_json->{accession_en}->{PDjour};
    $PDmois = $parsed_json->{accession_en}->{PDmois};
    $PDannee = $parsed_json->{accession_en}->{PDannee};
    $PDcodeIntroProvenance = $parsed_json->{accession_en}->{PDcodeIntroProvenance};
    $PDcodeEntree = $parsed_json->{accession_en}->{PDcodeEntree};
    $PDreIntroduit = $parsed_json->{accession_en}->{PDreIntroduit};
    $PDissuTraitement = $parsed_json->{accession_en}->{PDissuTraitement};
    $PDcoloneTraite = $parsed_json->{accession_en}->{PDcoloneTraite};
    $PDremarques = $parsed_json->{accession_en}->{PDremarques};

    /* Labels provenance antérieure */
    $PApays = $parsed_json->{accession_en}->{PApays};
    $PAregion = $parsed_json->{accession_en}->{PAregion};
    $PAdeparte = $parsed_json->{accession_en}->{PAdeparte};
    $PAcommune = $parsed_json->{accession_en}->{PAcommune};
    $PAcodePost = $parsed_json->{accession_en}->{PAcodePost};
    $PAsite = $parsed_json->{accession_en}->{PAsite};
    $PAadresse = $parsed_json->{accession_en}->{PAadresse};
    $PApropriete = $parsed_json->{accession_en}->{PApropriete};
    $PAcollecteur = $parsed_json->{accession_en}->{PAcollecteur};
    $PAparcelle = $parsed_json->{accession_en}->{PAparcelle};
    $PArang = $parsed_json->{accession_en}->{PArang};
    $PAsouche = $parsed_json->{accession_en}->{PAsouche};
    $PAcodeIntro = $parsed_json->{accession_en}->{PAcodeIntro};

    /* Identification */
    $CIcouleurPe = $parsed_json->{accession_en}->{CIcouleurPe};
    $CIcouleurPu = $parsed_json->{accession_en}->{CIcouleurPu};
    $CIsaveur = $parsed_json->{accession_en}->{CIsaveur};
    $CIpepins = $parsed_json->{accession_en}->{CIpepins};
    $CIsexe = $parsed_json->{accession_en}->{CIsexe};
    $CIidentification = $parsed_json->{accession_en}->{CIidentification};
    $CIidenMorphologique = $parsed_json->{accession_en}->{CIidenMorphologique};
    $CIidenGenetique = $parsed_json->{accession_en}->{CIidenGenetique};
    $CIidenAutre = $parsed_json->{accession_en}->{CIidenAutre};
    $CIbibliographie = $parsed_json->{accession_en}->{CIbibliographie};
    $CIvolume = $parsed_json->{accession_en}->{CIvolume};
    $CIpage = $parsed_json->{accession_en}->{CIpage};
    $CIremarque = $parsed_json->{accession_en}->{CIremarque};

    /* Agrement */
    $Aagrement = $parsed_json->{accession_en}->{Aagrement};
    $AfamilleSanitaire = $parsed_json->{accession_en}->{AfamilleSanitaire};
    $AagrementCTPS = $parsed_json->{accession_en}->{AagrementCTPS};
    $AnumTempCTPS = $parsed_json->{accession_en}->{AnumTempCTPS};
    $AnumAgreCTPS = $parsed_json->{accession_en}->{AnumAgreCTPS};
    $AanneeAgrement = $parsed_json->{accession_en}->{AanneeAgrement};
    $AanneeNonCertifiable = $parsed_json->{accession_en}->{AanneeNonCertifiable};
    $AlieuDepotMatInitial = $parsed_json->{accession_en}->{AlieuDepotMatInitial};
    $AsurfMulti = $parsed_json->{accession_en}->{AsurfMulti};
    $AdelegONIVINS = $parsed_json->{accession_en}->{AdelegONIVINS};
    $AnomPartenaire = $parsed_json->{accession_en}->{AnomPartenaire};
    $AnomPartenaire2 = $parsed_json->{accession_en}->{AnomPartenaire2};

    /* Remarques */
    $RmaintienEnCollection = $parsed_json->{accession_en}->{RmaintienEnCollection};
    $RremarqueDiffusion = $parsed_json->{accession_en}->{RremarqueDiffusion};
    $RremarqueIntro = $parsed_json->{accession_en}->{RremarqueIntro};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_en}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_en}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_en}->{document};
}
/* * ********* */
require('../php/includes/bibliFonc.php'); /* Accès à la base de données */
require('../php/includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodeIntro'], $_SESSION['language_Vigne'], "accession"); /* Requête SQL */
//$resultat = $DAO->exportpdf("999999Mtp888888", "FR", "accession");//test
ob_start();
$nompdf = $Title . $resultat['CodeIntro'] . ".pdf"; //Nomme le pdf que l'on télécharge
?>

<!-- CSS de la page HTML -->
<style type="text/css">
    table{width:100%;color:#888;border-collapse: collapse}
    h4{color:#FF8C00;}
    b{color:#000; font-weight:normal}
    td{display: inline-block;vertical-align: top;text-align: left;border: 1px;border-color:#aaa}

</style>

<!-- Mise en page -->
<page backtop="30mm" backleft="5mm" backright=5mm" backbottom="30mm" ng-style="color:#900">
    <!--Entête du pdf-->
    <page_header>
        <table>
            <tr>
                <td style="border:none;"><img src="imagesPDF/FEUILLE_DE_VIGNE.jpg" width="50" height="50" /></td>
                <td style="border:none;width: 78%; vertical-align: middle;"><font style="font-size: 14px; color:#900;"><?php echo $main_title ?></font><br><font style="color:#555;"><?php echo $sous_title ?></font></td>            </tr>
        </table>
        <table style="background-color:#FFDEAD;border-radius:10px;">
            <tr>
                <td style="border:none;"><font style="font-size: 22px; color:#FF8C00; font-weight:bold "><?php echo '&nbsp;&nbsp;' . $Title . '' ?> </font></td><td style="border:none;width: 49%"><font style="font-size: 22px; color:#000; font-weight:bold"><?php echo $resultat['NomIntro'] ?></font></td>
                <td style="border:none;"><font style="font-size: 14px; color:#FF8C00; font-weight:bold "><?php echo $Code ?></font></td><td style="border:none;width:17%"><font style="font-size:14px; color:#000; font-weight: bold"><?php echo $resultat['CodeIntro'] ?></font></td>
            </tr>
        </table>
    </page_header>
    <!--Pied de page du pdf-->
    <page_footer ng-style="color:#900" >
        <hr style="color:#888" />
        <table>
            <tr>
                <td style="border:none;width:50%"><img src="imagesPDF/Bandeau.JPG" /></td>

            </tr>
        </table>
        <table>
            <tr style="color:#900">
                <td style="border:none;text-align: left; width: 40%"><?php echo $document ?> [[date_d]]/[[date_m]]/[[date_y]]</td>
                <td style="border:none;width : 50%">© INRA-IFV-Montpellier SupAgro 2005-2015</td>
                <td style="border:none;text-align: right; width: 10%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <!--Début de fiche-->
    <table>
        <tr>
            <td style="width: 14%"><?php echo $Partenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Partenaire'] ?></b></td>
            <td style="width: 14%"><?php echo $AnneeAgrement ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['AnneeAgrement'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $codeIntroPartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CodeIntroPartenaire'] ?></b></td>
            <td style="width: 14%"><?php echo $PayP ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['PayP'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $Statut ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Statut'] ?></b></td>
            <td style="width: 14%"><?php echo $CommuneP ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CommuneProvenance'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $UniteIntro ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['UniteIntro'] ?></b></td>
            <td style="width: 14%"><?php echo $AdresseP ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['AdresProvenance'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $NomVar ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['NomVar'] ?></b></td>
            <td style="width: 14%"><?php echo $Collecteur ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Collecteur'] ?></b></td>
        </tr>
    </table><br>
    <!--Provenance directe-->
    <table>
        <tr>
            <td style="border:none;"><h4><?php echo $PDtitle ?></h4></td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td style="width: 14%"><?php echo $PDpays ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['PaysProvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDparcelle ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['ParcelleProvenance'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDregion ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['RegionProvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDrang ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['RangProvenance'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDcodeIntroProvenance ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CodeIntroPorvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDsouche ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['SoucheProvenance'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDcommune ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CommuneProvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDlatitude ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Latitude'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDcodePost ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CodPostProvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDlongitude ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Longitude'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDsite ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['SiteProvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDaltitude ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Altitude'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDadresse ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['AdressProvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDjour ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Jour'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDpropirete ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['ProprietProvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDmois ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Mois'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDcollecteure ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Collecteur'] ?></b></td>
            <td style="width: 14%"><?php echo $PDannee ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Annee'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDdepart ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['DepartProvenance'] ?></b></td>
            <td style="width: 14%"><?php echo $PDcodeEntree ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CodeEntree'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDreIntroduit ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['ReIntroduit'] ?></b></td>
            <td style="width: 14%"><?php echo $PDissuTraitement ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['IssuTraitement'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PDcoloneTraite ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CloneTraite'] ?></b></td>
            <td style="width: 14%"><?php echo $PDremarques ?></td><td style="width: 36%;text-align:justify;"><b>&nbsp;<?php echo $resultat['RemarquesProvenance'] ?></b></td>
        </tr>
    </table><br>
    <!--Provenance antérieure-->
    <table>
        <tr>
            <td style="border:none;"><h4><?php echo $PAtitle ?></h4></td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td style="width: 14%"><?php echo $PApays ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['PaysAnt'] ?></b></td>
            <td style="width: 14%"><?php echo $PApropriete ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['ProprietAnt'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PAregion ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['RegionAnt'] ?></b></td>
            <td style="width: 14%"><?php echo $PAcollecteur ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CollecteurAnt'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PAdeparte ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['DepartAnt'] ?></b></td>
            <td style="width: 14%"><?php echo $PAparcelle ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['ParcelleAnt'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PAcommune ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CommuneAnt'] ?></b></td>
            <td style="width: 14%"><?php echo $PArang ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['RangAnt'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PAcodePost ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CodPostAnt'] ?></b></td>
            <td style="width: 14%"><?php echo $PAsouche ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['SoucheAnt'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PAsite ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['SiteAnt'] ?></b></td>
            <td style="width: 14%"><?php echo $PAcodeIntro ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CodeIntroProvenanceAnt'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $PAadresse ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['AdressAnt'] ?></b></td>
        </tr> 
    </table><br>
    <!--Identification-->
    <table>
        <tr>
            <td style="border:none;"><h4><?php echo $CItilte ?></h4></td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td style="width: 14%"><?php echo $CIcouleurPe ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CouleurPe'] ?></b></td>
            <td style="width: 14%"><?php echo $CIidenMorphologique ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['IdenMorphologique'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $CIcouleurPu ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CouleurPu'] ?></b></td>
            <td style="width: 14%"><?php echo $CIidenGenetique ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['IdenGenetique'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $CIsaveur ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Saveur'] ?></b></td>
            <td style="width: 14%"><?php echo $CIbibliographie ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Bibliographie'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $CIpepins ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Pepins'] ?></b></td>
            <td style="width: 14%"><?php echo $CIidenAutre ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['IdenAutre'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $CIsexe ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Sexe'] ?></b></td>
            <td style="width: 14%"><?php echo $CIvolume ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Volume'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $CIidentification ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Identification'] ?></b></td>
            <td style="width: 14%"><?php echo $CIpage ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Page'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $CIremarque ?></td><td style="width: 36%;text-align:justify;"><b>&nbsp;<?php echo $resultat['RemarqueAccessionName'] ?></b></td>
        </tr>
    </table><br>
    <!--Agrement-->
    <table>
        <tr>
            <td style="border:none;"><h4><?php echo $Atitle ?></h4></td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td style="width: 14%"><?php echo $Aagrement ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Agrement'] ?></b></td>
            <td style="width: 14%"><?php echo $AanneeNonCertifiable ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['AnneeNonCertifiable'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $AfamilleSanitaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['FamilleSanitaire'] ?></b></td>
            <td style="width: 14%"><?php echo $AlieuDepotMatInitial ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['LieuDepotMatInitial'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $AagrementCTPS ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['AgrementCTPS'] ?></b></td>
            <td style="width: 14%"><?php echo $AsurfMulti ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['SurfMulti'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $AnumTempCTPS ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['NumTempCTPS'] ?></b></td>
            <td style="width: 14%"><?php echo $AdelegONIVINS ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['DelegONIVINS'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $AnumAgreCTPS ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['NumCloneCTPS'] ?></b></td>
            <td style="width: 14%"><?php echo $AnomPartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['NomPartenaire'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $AanneeAgrement ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['AnneeAgrement'] ?></b></td>
            <td style="width: 14%"><?php echo $AnomPartenaire2 ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['NomPartenaire2'] ?></b></td>
        </tr>
    </table><br>
    <!--Remarques-->
    <table>
        <tr>
            <td style="border:none;"><h4><?php echo $Rtitle ?></h4></td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td style="width: 14%"><?php echo $RmaintienEnCollection ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['MaintientEnCollection'] ?></b></td>
            <td style="width: 14%"><?php echo $RremarqueDiffusion ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['RestrictionDiffusion'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $RremarqueIntro ?></td><td style="width: 36%;text-align:justify;"><b>&nbsp;<?php echo $resultat['RemarquesIntro'] ?></b></td>
        </tr>
    </table>
</page>
<?php
$content = ob_get_clean(); //Permet d'enregistrer le contenu de la page HTML dans la variable content
require('html2pdf/html2pdf.class.php'); //Appel à la classe de la librairie HTML2PDF
try {
    $pdf = new HTML2PDF('P', 'A4'); // Définit les caractéristiques de notre pdf
    $pdf->pdf->SetDisplayMode('fullpage'); // Affiche le contenu de la première page par défaut
    $pdf->writeHTML($content); // Permet de remplir le PDF
    $pdf->Output($nompdf); //Permet de nommer le PDF téléchargeable
} catch (HTML2PDF_Exception $ex) { // Exception qui permet d'afficher les erreurs de HTML2PDF
    die($ex);
}
session_destroy();
?>
