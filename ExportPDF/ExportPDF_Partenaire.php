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
    $title = $parsed_json->{partenaire_fr}->{title};
    $NomPartenaire = $parsed_json->{partenaire_fr}->{NomPartenaire};
    $SiglePartenaire = $parsed_json->{partenaire_fr}->{SiglePartenaire};
    $SectionRegionaleENTAV = $parsed_json->{partenaire_fr}->{SectionRegionaleENTAV};
    $RegionPartenaire = $parsed_json->{partenaire_fr}->{RegionPartenaire};
    $DepartPartenaire = $parsed_json->{partenaire_fr}->{DepartPartenaire};
    $ResponsablesPartenaire = $parsed_json->{partenaire_fr}->{ResponsablesPartenaire};
    $TelephonePartenaire = $parsed_json->{partenaire_fr}->{TelephonePartenaire};
    $Email = $parsed_json->{partenaire_fr}->{Email};
    $AdressePartenaire = $parsed_json->{partenaire_fr}->{AdressePartenaire};
    $CodPostPartenaire = $parsed_json->{partenaire_fr}->{CodPostPartenaire};
    $CommunePartenaire = $parsed_json->{partenaire_fr}->{CommunePartenaire};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_fr}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_fr}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_fr}->{document};
} else {/* Anglais */
    $Code = $parsed_json->{code_en}->{Code};
    $title = $parsed_json->{partenaire_en}->{title};
    $NomPartenaire = $parsed_json->{partenaire_en}->{NomPartenaire};
    $SiglePartenaire = $parsed_json->{partenaire_en}->{SiglePartenaire};
    $SectionRegionaleENTAV = $parsed_json->{partenaire_en}->{SectionRegionaleENTAV};
    $RegionPartenaire = $parsed_json->{partenaire_en}->{RegionPartenaire};
    $DepartPartenaire = $parsed_json->{partenaire_en}->{DepartPartenaire};
    $ResponsablesPartenaire = $parsed_json->{partenaire_en}->{ResponsablesPartenaire};
    $TelephonePartenaire = $parsed_json->{partenaire_en}->{TelephonePartenaire};
    $Email = $parsed_json->{partenaire_en}->{Email};
    $AdressePartenaire = $parsed_json->{partenaire_en}->{AdressePartenaire};
    $CodPostPartenaire = $parsed_json->{partenaire_en}->{CodPostPartenaire};
    $CommunePartenaire = $parsed_json->{partenaire_en}->{CommunePartenaire};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_en}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_en}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_en}->{document};
}
require('../php/includes/bibliFonc.php'); /* Accès à la base de données */
require('../php/includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodePartenaire'], $_SESSION['language_Vigne'], "partenaire"); /* Requête SQL */
//$resultat = $DAO->exportpdf("Mtp", "FR", "partenaire");//test
ob_start();
$nompdf = $title . $resultat['CodePartenaire'] . ".pdf"; //Nomme le pdf que l'on télécharge
?>
<!-- CSS de la page HTML -->
<style type="text/css">
    table{width:100%;color:#888;border-collapse: collapse;}
    h4{color:#696969;}
    b{color:#000; font-weight:normal}
    td{display: inline-block;vertical-align: top;text-align: left;border: 1px;border-color: #aaa;}
</style>
<!-- Mise en page -->
<page backtop="30mm" backleft="5mm" backright=5mm" backbottom="30mm" ng-style="color:#900">
    <!--Entête du pdf-->
    <page_header>
        <table>
            <tr>
                <td style="border:none;"><img src="imagesPDF/FEUILLE_DE_VIGNE.jpg" width="50" height="50" /></td>
                <td style="border:none;width: 78%; vertical-align: middle;"><font style="font-size: 14px; color:#900;"><?php echo $main_title ?></font><br><font style="color:#555;"><?php echo $sous_title ?></font></td>            
            </tr>
        </table>
        <table style="background-color:#C0C0C0;border-radius:10px;">
            <tr>
                <td style="border:none;"><font style="font-size: 22px; color:#696969; font-weight:bold; "><?php echo '&nbsp;&nbsp;' . $title . '' ?> </font></td><td style="border:none;width:70%"></td>
                <td style="border:none;"><font style="font-size: 18px; color:#696969; font-weight:bold; "><?php echo $Code ?></font></td><td style="border:none;width:9%"><font style="font-size:18px; color:#000; font-weight: bold"><?php echo $resultat['CodePartenaire'] ?></font></td>
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
        <table >
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
            <td style="width: 14%"><?php echo $NomPartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['NomPartenaire'] ?></b></td>
            <td style="width: 14%"><?php echo $ResponsablesPartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['ResponsablesPartenaire'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $SiglePartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['SiglePartenaire'] ?></b></td>
            <td style="width: 14%"><?php echo $TelephonePartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['TelephonePartenaire'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $SectionRegionaleENTAV ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['SectionRegionaleENTAV'] ?></b></td>
            <td style="width: 14%"><?php echo $Email ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Email'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $RegionPartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['RegionPartenaire'] ?></b></td>
            <td style="width: 14%"><?php echo $AdressePartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['AdressePartenaire'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $DepartPartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['DepartPartenaire'] ?></b></td>
            <td style="width: 14%"><?php echo $CodPostPartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CodPostPartenaire'] ?></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $CommunePartenaire ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CommunePartenaire'] ?></b></td>
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
