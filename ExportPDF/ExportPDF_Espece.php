<?php
session_start(); //Permet de récupérer le contenu des variables de session
/*Traitement fichier.json*/
$json = file_get_contents('../json/fichier.json');
$parsed_json = json_decode($json);// Permet de lire le fichier JSON avec PHP.
/*Permet de récuperer le label correspondant en anglais ou en français*/
if($_SESSION['language_Vigne']=='FR'){/*Français*/
    $Title = $parsed_json->{espece_fr}->{Title};
    $Genre = $parsed_json->{espece_fr}->{Genre};
    $CompoGenet = $parsed_json->{espece_fr}->{CompoGenet};
    $SousGenre = $parsed_json->{espece_fr}->{SousGenre};
    $RemarqueEsp = $parsed_json->{espece_fr}->{RemarqueEsp};
    $Botaniste = $parsed_json->{espece_fr}->{Botaniste};
}else{/*Anglais*/
    $Title = $parsed_json->{espece_en}->{Title};
    $Genre = $parsed_json->{espece_en}->{Genre};
    $CompoGenet = $parsed_json->{espece_en}->{CompoGenet};
    $SousGenre = $parsed_json->{espece_en}->{SousGenre};
    $RemarqueEsp = $parsed_json->{espece_en}->{RemarqueEsp};
    $Botaniste = $parsed_json->{espece_en}->{Botaniste};    
}
require('../php/includes/bibliFonc.php');/*Accès à la base de données*/
require('../php/includes/class_DAO_Bibilotheque.php');/*Accès aux requêtes SQL*/
$DAO = new BibliothequeDAO();
//$resultat = $DAO->exportpdf($_SESSION['CodeEsp'], $_SESSION['language_Vigne'], "espece");/*Requête SQL*/
$resultat = $DAO->exportpdf("esp1", "FR", "espece");//test
ob_start();
?>
<!-- CSS de la page HTML -->
<style type="text/css">
    table{width:100%;color:#888;}
    h4{color:#808;}
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
            <td><h4><?php echo $Title ?></h4></td><td style="width: 50%"><b><?php echo $resultat['Espece'] ?></b></td>
           <td><h4>Code :</h4></td><td style="width: 50%"><b><?php echo $resultat['CodeEsp'] ?></b></td>
        </tr> 
    </table><br>
    <!--Début de fiche-->
    <table>
        <tr>
            <td style="width: 25%"><?php echo $Botaniste?></td><td style="width: 25%"><b><?php echo $resultat['Botaniste']?></b></td>
            <td style="width: 25%"><?php echo $Genre?></td><td style="width: 25%"><b><?php echo $resultat['Genre']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $CompoGenet?></td><td style="width: 25%"><b><?php echo $resultat['CompoGenet']?></b></td>
            <td style="width: 25%"><?php echo $SousGenre?></td><td style="width: 25%"><b><?php echo $resultat['SousGenre']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $RemarqueEsp?></td><td style="width: 25%"><b><?php echo $resultat['RemarqueEsp']?></b></td>
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