<?php
session_start(); //Permet de récupérer le contenu des variables de session
/* Traitement fichier.json */
$json = file_get_contents('../../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
$jsonHeader = file_get_contents('../../json/home.json');
$parsed_jsonHeader = json_decode($jsonHeader); // pour récuperer le contenu de home.json
/* Permet de récuperer le label correspondant en anglais ou en français */
if ($_SESSION['language_Vigne'] == 'FR') {/* Français */
    $Code = $parsed_json->{code_fr}->{Code};
    $Title = $parsed_json->{espece_fr}->{Title};
    $Genre = $parsed_json->{espece_fr}->{Genre};
    $CompoGenet = $parsed_json->{espece_fr}->{CompoGenet};
    $SousGenre = $parsed_json->{espece_fr}->{SousGenre};
    $RemarqueEsp = $parsed_json->{espece_fr}->{RemarqueEsp};
    $Botaniste = $parsed_json->{espece_fr}->{Botaniste};
    //Header pdf
    $main_title = $parsed_jsonHeader->{title_fr}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_fr}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_fr}->{document};
} else {/* Anglais */
    $Code = $parsed_json->{code_en}->{Code};
    $Title = $parsed_json->{espece_en}->{Title};
    $Genre = $parsed_json->{espece_en}->{Genre};
    $CompoGenet = $parsed_json->{espece_en}->{CompoGenet};
    $SousGenre = $parsed_json->{espece_en}->{SousGenre};
    $RemarqueEsp = $parsed_json->{espece_en}->{RemarqueEsp};
    $Botaniste = $parsed_json->{espece_en}->{Botaniste};
    //Header pdf
    $main_title = $parsed_jsonHeader->{title_en}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_en}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_en}->{document};
}
require('../includes/bibliFonc.php'); /* Accès à la base de données */
require('../includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodeEsp'], $_SESSION['language_Vigne'], "espece"); /* Requête SQL */
//$resultat = $DAO->exportpdf("esp1", "FR", "espece");//test
ob_start();
$nompdf = $Title . $resultat['CodeEsp'] . ".pdf"; //Nomme le pdf que l'on télécharge
?>
<!-- CSS de la page HTML -->
<style type="text/css">
    table{width:100%;color:#888;border-collapse: collapse}
    h4{color:#808;}
    b{color:#000; font-weight:normal;}
    td{display: inline-block;vertical-align: top;text-align: left;border: 1px;border-color:#aaa
    }
</style>

<!-- Mise en page -->
<page backtop="30mm" backleft="5mm" backright="5mm" backbottom="30mm">
    <!--Entête du pdf-->
    <page_header>
        <table>
            <tr>
                <td style="border:none;"><img src="../../images/FEUILLE_DE_VIGNE.jpg" width="50" height="50" /></td>
                <td style="border:none;width: 78%; vertical-align: middle;"><font style="font-size: 14px; color:#900;"><?php echo $main_title ?></font><br><font style="color:#555;"><?php echo $sous_title ?></font></td>            </tr>
        </table>
        <table style="background-color:#DDA0DD;border-radius:10px;">
            <tr>
                <td style="border:none;"><font style="font-size: 22px; color:#808; font-weight:bold "><?php echo '&nbsp;&nbsp;' . $Title . '' ?> </font></td><td style="border:none;width: 64%"><font style="font-size: 22px; color:#000; font-weight:bold; font-style:italic "><?php echo $resultat['Espece'] ?></font></td>
                <td style="border:none;"><font style="font-size: 14px; color:#808; font-weight:bold "><?php echo $Code ?></font></td><td style="border:none;width:15%"><font style="font-size:14px; color:#000; font-weight: bold"><?php echo $resultat['CodeEsp'] ?></font></td>
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
    <!--Début de fiche-->
    <table>
        <tr>
            <td style="width: 14%"><?php echo $Botaniste ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['Botaniste'] ?></b></td>
            <td style="width: 14%"><?php echo $Genre ?></td><td style="width: 36%"><b><i>&nbsp;<?php echo $resultat['Genre'] ?></i></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $CompoGenet ?></td><td style="width: 36%"><b>&nbsp;<?php echo $resultat['CompoGenet'] ?></b></td>
            <td style="width: 14%"><?php echo $SousGenre ?></td><td style="width: 36%"><b><i>&nbsp;<?php echo $resultat['SousGenre'] ?></i></b></td>
        </tr>
        <tr>
            <td style="width: 14%"><?php echo $RemarqueEsp ?></td><td style="width: 36%" colspan="3"><b>&nbsp;<?php echo $resultat['RemarqueEsp'] ?></b></td>
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
    $pdf->Output("test.pdf"); //Permet de nommer le PDF téléchargeable
} catch (HTML2PDF_Exception $ex) { // Exception qui permet d'afficher les erreurs de HTML2PDF
    die($ex);
}
?>