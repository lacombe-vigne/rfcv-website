<?php
session_start(); //Permet de récupérer le contenu des variables de session
/* Traitement fichier.json */
$json = file_get_contents('../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
/* Permet de récuperer le label correspondant en anglais ou en français */
if ($_SESSION['language_Vigne'] == "FR") {/* Français */
    $Code = $parsed_json->{code_fr}->{Code};
    /* données */
    $title = $parsed_json->{site_fr}->{title};
    $RegionSite = $parsed_json->{site_fr}->{RegionSite};
    $DepartSite = $parsed_json->{site_fr}->{DepartSite};
    $CommuneSite = $parsed_json->{site_fr}->{CommuneSite};
    $CodPostSite = $parsed_json->{site_fr}->{CodPostSite};
    $AdresseSite = $parsed_json->{site_fr}->{AdresseSite};
    $LatSite = $parsed_json->{site_fr}->{LatSite};
    $LongSite = $parsed_json->{site_fr}->{LongSite};
    $AltSite = $parsed_json->{site_fr}->{AltSite};
    $SecRegENTAV = $parsed_json->{site_fr}->{SecRegENTAV};
    $ProprietaireSite = $parsed_json->{site_fr}->{ProprietaireSite};
    $ExploitSite = $parsed_json->{site_fr}->{ExploitSite};
    $ResponsSite = $parsed_json->{site_fr}->{ResponsSite};
    $TelSite = $parsed_json->{site_fr}->{TelSite};
    $FaxSite = $parsed_json->{site_fr}->{FaxSite};
    $MailSite = $parsed_json->{site_fr}->{MailSite};
    $AnneeCreationSite = $parsed_json->{site_fr}->{AnneeCreationSite};
    $VarMajoritairesSite = $parsed_json->{site_fr}->{VarMajoritairesSite};
    $PresentationSite = $parsed_json->{site_fr}->{PresentationSite};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_fr}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_fr}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_fr}->{document};
} else {/* Anglais */
    $Code = $parsed_json->{code_en}->{Code};
    /* données */
    $title = $parsed_json->{site_en}->{title};
    $RegionSite = $parsed_json->{site_en}->{RegionSite};
    $DepartSite = $parsed_json->{site_en}->{DepartSite};
    $CommuneSite = $parsed_json->{site_en}->{CommuneSite};
    $CodPostSite = $parsed_json->{site_en}->{CodPostSite};
    $AdresseSite = $parsed_json->{site_en}->{AdresseSite};
    $LatSite = $parsed_json->{site_en}->{LatSite};
    $LongSite = $parsed_json->{site_en}->{LongSite};
    $AltSite = $parsed_json->{site_en}->{AltSite};
    $SecRegENTAV = $parsed_json->{site_en}->{SecRegENTAV};
    $ProprietaireSite = $parsed_json->{site_en}->{ProprietaireSite};
    $ExploitSite = $parsed_json->{site_en}->{ExploitSite};
    $ResponsSite = $parsed_json->{site_en}->{ResponsSite};
    $TelSite = $parsed_json->{site_en}->{TelSite};
    $FaxSite = $parsed_json->{site_en}->{FaxSite};
    $MailSite = $parsed_json->{site_en}->{MailSite};
    $AnneeCreationSite = $parsed_json->{site_en}->{AnneeCreationSite};
    $VarMajoritairesSite = $parsed_json->{site_en}->{VarMajoritairesSite};
    $PresentationSite = $parsed_json->{site_en}->{PresentationSite};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_en}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_en}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_en}->{document};
}
require('../php/includes/bibliFonc.php'); /* Accès à la base de données */
require('../php/includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
//$resultat = $DAO->exportpdf($_SESSION['CodeAmpelo'], $_SESSION['language_Vigne'], "site");/*Requête SQL*/
$resultat = $DAO->exportpdf("Vass", "FR", "site"); //test
ob_start();
$nompdf = $title . $resultat['CodeSite'] . ".pdf"; //Nomme le pdf que l'on télécharge
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
                <td style="border:none;"><img src="imagesPDF/FEUILLE_DE_VIGNE.jpg" width="50" height="50" /></td>
                <td style="border:none;width: 78%; vertical-align: middle;"><font style="font-size: 14px; color:#900;"><?php echo $main_title ?></font><br><font style="color:#555;"><?php echo $sous_title ?></font></td>            </tr>
        </table>
        <table style="background-color:#C0C0C0;border-radius:10px;">
            <tr>
                <td style="border:none;"><font style="font-size: 22px; color:#696969; font-weight:bold; "><?php echo '&nbsp;&nbsp;' . $title . '' ?> </font></td><td style="border:none;width:70%"><font style="font-size: 22px; color:#696969; font-weight:bold; "><?php echo $resultat['NomSite'] ?></font></td>
                <td style="border:none;"><font style="font-size: 18px; color:#696969; font-weight:bold; "><?php echo $Code ?></font></td><td style="border:none;width:13%"><font style="font-size:18px; color:#000; font-weight: bold"><?php echo $resultat['CodeSite'] ?></font></td>
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
    <!--Contenu du pdf-->
    <table>
        <tr>
            <td style="width: 14%;"><?php echo $RegionSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['RegionSite'] ?></td>
            <td style="width: 14%;"><?php echo $ProprietaireSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['ProprietaireSite'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $DepartSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['DepartSite'] ?></td>
            <td style="width: 14%;"><?php echo $ExploitSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['ExploitSite'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $CommuneSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CommuneSite'] ?></td>
            <td style="width: 14%;"><?php echo $ResponsSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['ResponsSite'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $CodPostSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodPostSite'] ?></td>
            <td style="width: 14%;"><?php echo $TelSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['TelSite'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $AdresseSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['AdresseSite'] ?></td>
            <td style="width: 14%;"><?php echo $FaxSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['FaxSite'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $LatSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['LatSite'] ?></td>
            <td style="width: 14%;"><?php echo $MailSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['MailSite'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $LongSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['LongSite'] ?></td>
            <td style="width: 14%;"><?php echo $AnneeCreationSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['AnneeCreationSite'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $AltSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['AltSite'] ?></td>
            <td style="width: 14%;"><?php echo $VarMajoritairesSite ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['VarMajoritairesSite'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $SecRegENTAV ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['SecRegENTAV'] ?></td>
            <td style="width: 14%;"><?php echo $PresentationSite ?></td><td style="width:36%;color:#000;test-align:justify;">&nbsp;<?php echo $resultat['PresentationSite'] ?></td>
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
