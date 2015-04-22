<?php
session_start(); //Permet de récupérer le contenu des variables de session
/* Traitement fichier.json */
$json = file_get_contents('../../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
$jsonHeader = file_get_contents('../../json/home.json');
$parsed_jsonHeader = json_decode($jsonHeader); // pour récuperer le contenu de home.json
/* Permet de récuperer le label correspondant en anglais ou en français */
if ($_SESSION['language_Vigne'] == "FR") {/* Français */
    $Code = $parsed_json->{code_fr}->{Code};
    /* données */
    $title = $parsed_json->{morphologique_fr}->{title};
    $nomVar = $parsed_json->{morphologique_fr}->{nomVar};
    $codeVar = $parsed_json->{morphologique_fr}->{codeVar};
    $nomAcc = $parsed_json->{morphologique_fr}->{nomAcc};
    $codeAcc = $parsed_json->{morphologique_fr}->{codeAcc};
    $Descripteur = $parsed_json->{morphologique_fr}->{Descripteur};
    $CodeDescripteur = $parsed_json->{morphologique_fr}->{CodeDescripteur};
    $Caractere = $parsed_json->{morphologique_fr}->{Caractere};
    $CodeCaractere = $parsed_json->{morphologique_fr}->{CodeCaractere};
    $Experimentateur = $parsed_json->{morphologique_fr}->{Experimentateur};
    $Partenaire = $parsed_json->{morphologique_fr}->{Partenaire};
    $JourExp = $parsed_json->{morphologique_fr}->{JourExp};
    $MoisExp = $parsed_json->{morphologique_fr}->{MoisExp};
    $AnneeExp = $parsed_json->{morphologique_fr}->{AnneeExp};
    $LieuExp = $parsed_json->{morphologique_fr}->{LieuExp};
    $SiteExp = $parsed_json->{morphologique_fr}->{SiteExp};
    $Emplamcement = $parsed_json->{morphologique_fr}->{Emplamcement};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_fr}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_fr}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_fr}->{document};
} else {/* Anglais */
    $Code = $parsed_json->{code_en}->{Code};
    /* données */
    $title = $parsed_json->{morphologique_en}->{title};
    $nomVar = $parsed_json->{morphologique_en}->{nomVar};
    $codeVar = $parsed_json->{morphologique_en}->{codeVar};
    $nomAcc = $parsed_json->{morphologique_en}->{nomAcc};
    $codeAcc = $parsed_json->{morphologique_en}->{codeAcc};
    $Descripteur = $parsed_json->{morphologique_en}->{Descripteur};
    $CodeDescripteur = $parsed_json->{morphologique_en}->{CodeDescripteur};
    $Caractere = $parsed_json->{morphologique_en}->{Caractere};
    $CodeCaractere = $parsed_json->{morphologique_en}->{CodeCaractere};
    $Experimentateur = $parsed_json->{morphologique_en}->{Experimentateur};
    $Partenaire = $parsed_json->{morphologique_en}->{Partenaire};
    $JourExp = $parsed_json->{morphologique_en}->{JourExp};
    $MoisExp = $parsed_json->{morphologique_en}->{MoisExp};
    $AnneeExp = $parsed_json->{morphologique_en}->{AnneeExp};
    $LieuExp = $parsed_json->{morphologique_en}->{LieuExp};
    $SiteExp = $parsed_json->{morphologique_en}->{SiteExp};
    $Emplamcement = $parsed_json->{morphologique_en}->{Emplamcement};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_en}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_en}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_en}->{document};
}
require('../includes/bibliFonc.php'); /* Accès à la base de données */
require('../includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodeAmpelo'], $_SESSION['language_Vigne'], "morphologique"); /* Requête SQL */
//$resultat = $DAO->exportpdf("161740", "FR", "morphologique");//test
ob_start();
$nompdf = $title . $resultat['CodeAmpelo'] . ".pdf"; //Nomme le pdf que l'on télécharge
?>
<!-- CSS de la page HTML -->
<style type="text/css">
    table{width:100%;color:#888;border-collapse: collapse;}
    h4{color:#696969;}
    td{display: inline-block;vertical-align: top;text-align: left;border: 1px;border-color: #aaa;}    
</style>
<!-- Mise en page -->
<page backtop="30mm" backleft="5mm" backright=5mm" backbottom="30mm" ng-style="color:#900">
    <!--Entête du pdf-->
    <page_header>
        <table>
            <tr>
                <td style="border:none;"><img src="../../images/FEUILLE_DE_VIGNE.jpg" width="50" height="50" /></td>
                <td style="border:none;width: 78%; vertical-align: middle;"><font style="font-size: 14px; color:#900;"><?php echo $main_title ?></font><br><font style="color:#555;"><?php echo $sous_title ?></font></td>            </tr>
        </table>
        <table style="background-color:#C0C0C0;border-radius:10px;">
            <tr>
                <td style="border:none;"><font style="font-size: 22px; color:#696969; font-weight:bold; "><?php echo '&nbsp;&nbsp;' . $title . '' ?> </font></td><td style="border:none;width:40%"></td>
                <td style="border:none;"><font style="font-size: 18px; color:#696969; font-weight:bold; "></font></td><td style="border:none;width:23%"><font style="font-size:18px; color:#000; font-weight: bold"><?php echo $resultat['CodeAmpelo'] ?></font></td>
            </tr>
        </table>
    </page_header>
    <!--Pied de page du pdf-->
    <page_footer ng-style="color:#900" >
        <hr style="color:#888" />
        <table>
            <tr>
                <td style="border:none;width:50%"><img src="../../images/Bandeau.JPG" /></td>

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
    <!--Contenu du pdf-->
    <table>
        <tr>
            <td style="width: 14%;"><?php echo $nomVar ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['nomVar'] ?></td>
            <td style="width: 14%;"><?php echo $Experimentateur ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Experimentateur'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $codeVar ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodeVar'] ?></td>
            <td style="width: 14%;"><?php echo $Partenaire ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Partenaire'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $nomAcc ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['nomAcc'] ?></td>
            <td style="width: 14%;"><?php echo $JourExp ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['JourExp'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $codeAcc ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodeAcc'] ?></td>
            <td style="width: 14%;"><?php echo $MoisExp ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['MoisExp'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Descripteur ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Descripteur'] ?></td>
            <td style="width: 14%;"><?php echo $AnneeExp ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['AnneeExp'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $CodeDescripteur ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodeDescripteur'] ?></td>
            <td style="width: 14%;"><?php echo $LieuExp ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['LieuExp'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Caractere ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Caractere'] ?></td>
            <td style="width: 14%;"><?php echo $SiteExp ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['SiteExp'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $CodeCaractere ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodeCaractere'] ?></td>
            <td style="width: 14%;"><?php echo $Emplamcement ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Emplamcement'] ?></td>
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
?>