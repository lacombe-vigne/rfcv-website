<?php
session_start(); //Permet de récupérer le contenu des variables de session
/*Traitement fichier.json*/
$json = file_get_contents('../json/fichier.json');
$parsed_json = json_decode($json);// Permet de lire le fichier JSON avec PHP.
/*Permet de récuperer le label correspondant en anglais ou en français*/
if($_SESSION['language_Vigne']=='FR'){/*Français*/
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
}else{/*Anglais*/
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
    
}
require('../php/includes/bibliFonc.php');/*Accès à la base de données*/
require('../php/includes/class_DAO_Bibilotheque.php');/*Accès aux requêtes SQL*/
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodePartenaire'], $_SESSION['language_Vigne'], "partenaire");/*Requête SQL*/
//$resultat = $DAO->exportpdf("Mtp", "FR", "partenaire");//test
ob_start();
?>
<!-- CSS de la page HTML -->
<style type="text/css">
    table{width:100%;color:#888;}
    h4{color:#696969;}
    b{color:#000;}
</style>
<!-- Mise en page -->
<page backtop="20mm" backleft="10mm" backright="10mm" backbottom="30mm">
    <!--Entête du pdf-->
    <page_header>
        <table>
            <tr>
                <td style="width:50%"><img src="imagesPDF/inra.png" height="50" width="150"/></td>
                <td style="width:25%"><img src="imagesPDF/logoSupAgro.png" height="50" width="150"/></td>
            </tr>
        </table>
    </page_header>
    <!--Pied de page du pdf-->
    <page_footer>
        <table>
            <tr>
                <td style="width:50%">INRA</td>
                <td style="width:50%">SUPAGRO</td>
            </tr>
        </table>
    </page_footer>
    <!--Entête de fiche-->
    <table>
        <tr>
            <td style="width: 50%"><h4><?php echo $title ?></h4></td>
           <td><h4>Code :</h4></td><td style="width: 50%"><b><?php echo $resultat['CodePartenaire'] ?></b></td>
        </tr> 
    </table><br>
    <!--Début de fiche-->
    <table>
        <tr>
            <td style="width: 25%"><?php echo $NomPartenaire?></td><td style="width: 25%"><b><?php echo $resultat['NomPartenaire']?></b></td>
            <td style="width: 25%"><?php echo $ResponsablesPartenaire?></td><td style="width: 25%"><b><?php echo $resultat['ResponsablesPartenaire']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $SiglePartenaire?></td><td style="width: 25%"><b><?php echo $resultat['SiglePartenaire']?></b></td>
            <td style="width: 25%"><?php echo $TelephonePartenaire?></td><td style="width: 25%"><b><?php echo $resultat['TelephonePartenaire']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $SectionRegionaleENTAV?></td><td style="width: 25%"><b><?php echo $resultat['SectionRegionaleENTAV']?></b></td>
            <td style="width: 25%"><?php echo $Email?></td><td style="width: 25%"><b><?php echo $resultat['Email']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $RegionPartenaire?></td><td style="width: 25%"><b><?php echo $resultat['RegionPartenaire']?></b></td>
            <td style="width: 25%"><?php echo $AdressePartenaire?></td><td style="width: 25%"><b><?php echo $resultat['AdressePartenaire']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $DepartPartenaire?></td><td style="width: 25%"><b><?php echo $resultat['DepartPartenaire']?></b></td>
            <td style="width: 25%"><?php echo $CodPostPartenaire?></td><td style="width: 25%"><b><?php echo $resultat['CodPostPartenaire']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $CommunePartenaire?></td><td style="width: 25%"><b><?php echo $resultat['CommunePartenaire']?></b></td>
        </tr>
    </table>
</page>
<?php
$content = ob_get_clean(); //Permet d'enregistrer le contenu de la page HTML dans la variable content
require('html2pdf/html2pdf.class.php'); //Appel à la classe de la librairie HTML2PDF
try {
    $pdf = new HTML2PDF('P', 'A4', 'fr'); // Définit les caractéristiques de notre pdf
    $pdf->pdf->SetDisplayMode('fullpage'); // Affiche le contenu de la première page par défaut
    $pdf->writeHTML($content); // Permet de remplir le PDF
    $pdf->Output("test.pdf"); //Permet de nommer le PDF téléchargeable
} catch (HTML2PDF_Exception $ex) { // Exception qui permet d'afficher les erreurs de HTML2PDF
    die($ex);
}
session_destroy();
?>
