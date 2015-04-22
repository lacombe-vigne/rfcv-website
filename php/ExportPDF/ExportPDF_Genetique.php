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
    $title = $parsed_json->{genetique_fr}->{title};
    $nomVar = $parsed_json->{genetique_fr}->{nomVar};
    $codeVar = $parsed_json->{genetique_fr}->{codeVar};
    $nomAcc = $parsed_json->{genetique_fr}->{nomAcc};
    $codeAcc = $parsed_json->{genetique_fr}->{codeAcc};
    $Marqueur = $parsed_json->{genetique_fr}->{Marqueur};
    $ValeurCodee1 = $parsed_json->{genetique_fr}->{ValeurCodee1};
    $ValeurCodee2 = $parsed_json->{genetique_fr}->{ValeurCodee2};
    $EmplacemRecolte = $parsed_json->{genetique_fr}->{EmplacemRecolte};
    $SouchePrelev = $parsed_json->{genetique_fr}->{SouchePrelev};
    $DateRecolte = $parsed_json->{genetique_fr}->{DateRecolte};
    $IdProtocoleRecolte = $parsed_json->{genetique_fr}->{IdProtocoleRecolte};
    $TypeOrgane = $parsed_json->{genetique_fr}->{TypeOrgane};
    $IdStockADN = $parsed_json->{genetique_fr}->{IdStockADN};
    $IdProtocolePCR = $parsed_json->{genetique_fr}->{IdProtocolePCR};
    $DatePCR = $parsed_json->{genetique_fr}->{DatePCR};
    $DateRun = $parsed_json->{genetique_fr}->{DateRun};
    $Partenaire = $parsed_json->{genetique_fr}->{Partenaire};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_fr}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_fr}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_fr}->{document};
} else {/* Anglais */
    $Code = $parsed_json->{code_en}->{Code};
    /* données */
    $title = $parsed_json->{genetique_en}->{title};
    $nomVar = $parsed_json->{genetique_en}->{nomVar};
    $codeVar = $parsed_json->{genetique_en}->{codeVar};
    $nomAcc = $parsed_json->{genetique_en}->{nomAcc};
    $codeAcc = $parsed_json->{genetique_en}->{codeAcc};
    $Marqueur = $parsed_json->{genetique_en}->{Marqueur};
    $ValeurCodee1 = $parsed_json->{genetique_en}->{ValeurCodee1};
    $ValeurCodee2 = $parsed_json->{genetique_en}->{ValeurCodee2};
    $EmplacemRecolte = $parsed_json->{genetique_en}->{EmplacemRecolte};
    $SouchePrelev = $parsed_json->{genetique_en}->{SouchePrelev};
    $DateRecolte = $parsed_json->{genetique_en}->{DateRecolte};
    $IdProtocoleRecolte = $parsed_json->{genetique_en}->{IdProtocoleRecolte};
    $TypeOrgane = $parsed_json->{genetique_en}->{TypeOrgane};
    $IdStockADN = $parsed_json->{genetique_en}->{IdStockADN};
    $IdProtocolePCR = $parsed_json->{genetique_en}->{IdProtocolePCR};
    $DatePCR = $parsed_json->{genetique_en}->{DatePCR};
    $DateRun = $parsed_json->{genetique_en}->{DateRun};
    $Partenaire = $parsed_json->{genetique_en}->{Partenaire};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_en}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_en}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_en}->{document};
}
require('../includes/bibliFonc.php'); /* Accès à la base de données */
require('../includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['Code'], $_SESSION['language_Vigne'], "genetique"); /* Requête SQL */
//$resultat = $DAO->exportpdf("ANACRB41B09-10-a", "FR", "genetique");//test
ob_start();
$nompdf = $title . $resultat['Code'] . ".pdf"; //Nomme le pdf que l'on télécharge
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
                <td style="border:none;"><font style="font-size: 22px; color:#696969; font-weight:bold; "><?php echo '&nbsp;&nbsp;' . $title . '' ?> </font></td><td style="border:none;width:30%"></td>
                <td style="border:none;"><font style="font-size: 18px; color:#696969; font-weight:bold; "></font></td><td style="border:none;width:39%"><font style="font-size:18px; color:#000; font-weight: bold"><?php echo $resultat['Code'] ?></font></td>
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
            <td style="width: 14%;"><?php echo $DateRecolte ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['DateRecolte'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $codeVar ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodeVar'] ?></td>
            <td style="width: 14%;"><?php echo $IdProtocoleRecolte ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['IdProtocoleRecolte'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $nomAcc ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['nomAcc'] ?></td>
            <td style="width: 14%;"><?php echo $TypeOrgane ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['TypeOrgane'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $codeAcc ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodeAcc'] ?></td>
            <td style="width: 14%;"><?php echo $IdStockADN ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['IdStockADN'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Marqueur ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Marqueur'] ?></td>
            <td style="width: 14%;"><?php echo $IdProtocolePCR ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['IdProtocolePCR'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $ValeurCodee1 ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['ValeurCodee1'] ?></td>
            <td style="width: 14%;"><?php echo $DatePCR ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['DatePCR'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $ValeurCodee2 ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['ValeurCodee2'] ?></td>
            <td style="width: 14%;"><?php echo $DateRun ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['DateRun'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $EmplacemRecolte ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['EmplacemRecolte'] ?></td>
            <td style="width: 14%;"><?php echo $Partenaire ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Partenaire'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $SouchePrelev ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['SouchePrelev'] ?></td>
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

