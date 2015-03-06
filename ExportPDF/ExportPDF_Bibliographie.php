<?php
session_start(); //Permet de récupérer le contenu des variables de session
/*Traitement fichier.json*/
$json = file_get_contents('../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
/*Permet de récuperer le label correspondant en anglais ou en français*/
if($_SESSION['language_Vigne']=="FR"){/*Français*/
    $Code= $parsed_json->{code_fr}->{Code};
    /*données*/
    $title = $parsed_json->{bibliographique_fr}->{title};
    $nomVar= $parsed_json->{bibliographique_fr}->{nomVar};
    $nomAcc = $parsed_json->{bibliographique_fr}->{nomAcc};
    $TypeDoc = $parsed_json->{bibliographique_fr}->{TypeDoc};
    $Title = $parsed_json->{bibliographique_fr}->{Title};
    $Author = $parsed_json->{bibliographique_fr}->{Author};
    $Year = $parsed_json->{bibliographique_fr}->{Year};
    $Edition = $parsed_json->{bibliographique_fr}->{Edition};
    $Publisher = $parsed_json->{bibliographique_fr}->{Publisher};
    $PlacePublished = $parsed_json->{bibliographique_fr}->{PlacePublished};
    $ISBN = $parsed_json->{bibliographique_fr}->{ISBN};
    $Language = $parsed_json->{bibliographique_fr}->{Language};
    $NumberOfVolumes = $parsed_json->{bibliographique_fr}->{NumberOfVolumes};
    $PagesDoc = $parsed_json->{bibliographique_fr}->{PagesDoc};
    $CallNumber= $parsed_json->{bibliographique_fr}->{CallNumber};
    $VolumeCitation = $parsed_json->{bibliographique_fr}->{VolumeCitation};
    $PagesCitation = $parsed_json->{bibliographique_fr}->{PagesCitation};
    $AuteurCitation = $parsed_json->{bibliographique_fr}->{AuteurCitation};
    $NomVigneCite = $parsed_json->{bibliographique_fr}->{NomVigneCite};

}else{/*Anglais*/
    $Code= $parsed_json->{code_en}->{Code};
    /*données*/
    $title = $parsed_json->{bibliographique_en}->{title};
    $nomVar= $parsed_json->{bibliographique_en}->{nomVar};
    $nomAcc = $parsed_json->{bibliographique_en}->{nomAcc};
    $TypeDoc = $parsed_json->{bibliographique_en}->{TypeDoc};
    $Title = $parsed_json->{bibliographique_en}->{Title};
    $Author = $parsed_json->{bibliographique_en}->{Author};
    $Year = $parsed_json->{bibliographique_en}->{Year};
    $Edition = $parsed_json->{bibliographique_en}->{Edition};
    $Publisher = $parsed_json->{bibliographique_en}->{Publisher};
    $PlacePublished = $parsed_json->{bibliographique_en}->{PlacePublished};
    $ISBN = $parsed_json->{bibliographique_en}->{ISBN};
    $Language = $parsed_json->{bibliographique_en}->{Language};
    $NumberOfVolumes = $parsed_json->{bibliographique_en}->{NumberOfVolumes};
    $PagesDoc = $parsed_json->{bibliographique_en}->{PagesDoc};
    $CallNumber= $parsed_json->{bibliographique_en}->{CallNumber};
    $VolumeCitation = $parsed_json->{bibliographique_en}->{VolumeCitation};
    $PagesCitation = $parsed_json->{bibliographique_en}->{PagesCitation};
    $AuteurCitation = $parsed_json->{bibliographique_en}->{AuteurCitation};
    $NomVigneCite = $parsed_json->{bibliographique_en}->{NomVigneCite};
    
}
require('../php/includes/bibliFonc.php');/*Accès à la base de données*/
require('../php/includes/class_DAO_Bibilotheque.php');/*Accès aux requêtes SQL*/
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['Code'], $_SESSION['language_Vigne'], "bibliographie");/*Requête SQL*/
//$resultat = $DAO->exportpdf('596', "FR", "bibliographie");//test
ob_start();
$nompdf = $title . $resultat['Code'] .".pdf"; //Nomme le pdf que l'on télécharge
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
                <td style="border:none;width: 78%; vertical-align: middle;"><font style="font-size: 18px; color:#900;">Collections de Vigne en France</font><br><font style="color:#555;">Base de données du réseau français des conservatoires de Vigne</font></td>
            </tr>
        </table>
        <table style="background-color:#C0C0C0;border-radius:10px;">
            <tr>
                <td style="border:none;"><font style="font-size: 22px; color:#696969; font-weight:bold; "><?php echo '&nbsp;&nbsp;'.$title.''?> </font></td><td style="border:none;width:30%"></td>
                <td style="border:none;"><font style="font-size: 18px; color:#696969; font-weight:bold; "><?php echo $Code?></font></td><td style="border:none;width:30%"><font style="font-size:18px; color:#000; font-weight: bold"><?php echo $resultat['Code']?></font></td>
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
                <td style="border:none;text-align: left; width: 40%">Document généré le [[date_d]]/[[date_m]]/[[date_y]]</td>
                <td style="border:none;width : 50%">© INRA-IFV-Montpellier SupAgro 2005-2015</td>
                <td style="border:none;text-align: right; width: 10%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        </table>
    </page_footer>
    <!--Contenu du pdf-->
    <table>
        <tr>
            <td style="width: 14%;"><?php echo $nomVar ?></td><td style="width:36%;color:#000;"><?php echo $resultat['nomVar'] ?></td>
            <td style="width: 14%;"><?php echo $ISBN ?></td><td style="width:36%;color:#000;"><?php echo $resultat['ISBN'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $nomAcc ?></td><td style="width:36%;color:#000;"><?php echo $resultat['nomAcc'] ?></td>
            <td style="width: 14%;"><?php echo $Language ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Language'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $TypeDoc ?></td><td style="width:36%;color:#000;"><?php echo $resultat['TypeDoc'] ?></td>
            <td style="width: 14%;"><?php echo $NumberOfVolumes ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NumberOfVolumes'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Title ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Title'] ?></td>
            <td style="width: 14%;"><?php echo $PagesDoc ?></td><td style="width:36%;color:#000;"><?php echo $resultat['PagesDoc'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Author ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Author'] ?></td>
            <td style="width: 14%;"><?php echo $CallNumber ?></td><td style="width:36%;color:#000;"><?php echo $resultat['CallNumber'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Year ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Year'] ?></td>
            <td style="width: 14%;"><?php echo $VolumeCitation ?></td><td style="width:36%;color:#000;"><?php echo $resultat['VolumeCitation'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Edition ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Edition'] ?></td>
            <td style="width: 14%;"><?php echo $PagesCitation ?></td><td style="width:36%;color:#000;"><?php echo $resultat['PagesCitation'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Publisher ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Publisher'] ?></td>
            <td style="width: 14%;"><?php echo $AuteurCitation ?></td><td style="width:36%;color:#000;"><?php echo $resultat['AuteurCitation'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $PlacePublished ?></td><td style="width:36%;color:#000;"><?php echo $resultat['PlacePublished'] ?></td>
            <td style="width: 14%;"><?php echo $NomVigneCite ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NomvigneCite'] ?></td>
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

