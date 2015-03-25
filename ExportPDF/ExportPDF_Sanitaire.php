<?php
session_start(); //Permet de récupérer le contenu des variables de session
/* Traitement fichier.json */
$json = file_get_contents('../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
/* Permet de récuperer le label correspondant en anglais ou en français */

$jsonHeader = file_get_contents('../json/home.json');
$parsed_jsonHeader = json_decode($jsonHeader); // pour récuperer le contenu de home.json
if ($_SESSION['language_Vigne'] == "FR") {/* Français */
    $Code = $parsed_json->{code_fr}->{Code};
    /* données */
    $title = $parsed_json->{sanitaire_fr}->{title};
    $nomVar = $parsed_json->{sanitaire_fr}->{nomVar};
    $codeVar = $parsed_json->{sanitaire_fr}->{codeVar};
    $nomAcc = $parsed_json->{sanitaire_fr}->{nomAcc};
    $codeAcc = $parsed_json->{sanitaire_fr}->{codeAcc};
    $PathogeneTeste = $parsed_json->{sanitaire_fr}->{PathogeneTeste};
    $ResultatTest = $parsed_json->{sanitaire_fr}->{ResultatTest};
    $CategorieTest = $parsed_json->{sanitaire_fr}->{CategorieTest};
    $MatTeste = $parsed_json->{sanitaire_fr}->{MatTeste};
    $CodeEmplacem = $parsed_json->{sanitaire_fr}->{CodeEmplacem};
    $SoucheTestee = $parsed_json->{sanitaire_fr}->{SoucheTestee};
    $Laboratoire = $parsed_json->{sanitaire_fr}->{Laboratoire};
    $DateTest = $parsed_json->{sanitaire_fr}->{DateTest};
    $Partenaire = $parsed_json->{sanitaire_fr}->{Partenaire};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_fr}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_fr}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_fr}->{document};
} else {/* Anglais */
    $Code = $parsed_json->{code_en}->{Code};
    /* données */
    $title = $parsed_json->{sanitaire_en}->{title};
    $nomVar = $parsed_json->{sanitaire_en}->{nomVar};
    $codeVar = $parsed_json->{sanitaire_en}->{codeVar};
    $nomAcc = $parsed_json->{sanitaire_en}->{nomAcc};
    $codeAcc = $parsed_json->{sanitaire_en}->{codeAcc};
    $PathogeneTeste = $parsed_json->{sanitaire_en}->{PathogeneTeste};
    $ResultatTest = $parsed_json->{sanitaire_en}->{ResultatTest};
    $CategorieTest = $parsed_json->{sanitaire_en}->{CategorieTest};
    $MatTeste = $parsed_json->{sanitaire_en}->{MatTeste};
    $CodeEmplacem = $parsed_json->{sanitaire_en}->{CodeEmplacem};
    $SoucheTestee = $parsed_json->{sanitaire_en}->{SoucheTestee};
    $Laboratoire = $parsed_json->{sanitaire_en}->{Laboratoire};
    $DateTest = $parsed_json->{sanitaire_en}->{DateTest};
    $Partenaire = $parsed_json->{sanitaire_en}->{Partenaire};

    //Header pdf
    $main_title = $parsed_jsonHeader->{title_en}->{main_title};
    $sous_title = $parsed_jsonHeader->{title_en}->{sous_title};

    //Footer pdf
    $document = $parsed_json->{pdf_en}->{document};
}
require('../php/includes/bibliFonc.php'); /* Accès à la base de données */
require('../php/includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodeSanitaire'], $_SESSION['language_Vigne'], "sanitaire"); /* Requête SQL */
//$resultat = $DAO->exportpdf("4292", "FR", "sanitaire");//test
ob_start();
$nompdf = $title . $resultat['CodeSanitaire'] . ".pdf"; //Nomme le pdf que l'on télécharge
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
                <td style="border:none;"><font style="font-size: 22px; color:#696969; font-weight:bold; "><?php echo '&nbsp;&nbsp;' . $title . '' ?> </font></td><td style="border:none;width:48%"></td>
                <td style="border:none;"><font style="font-size: 18px; color:#696969; font-weight:bold; "></font></td><td style="border:none;width:30%"><font style="font-size:18px; color:#000; font-weight: bold"><?php echo $resultat['CodeSanitaire'] ?></font></td>
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
            <td style="width: 14%;"><?php echo $nomAcc ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['nomAcc'] ?></td>
            <td style="width: 14%;"><?php echo $CategorieTest ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CategorieTest'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $codeAcc ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodeAcc'] ?></td>
            <td style="width: 14%;"><?php echo $MatTeste ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['MatTeste'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $PathogeneTeste ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['PathogeneTeste'] ?></td>
            <td style="width: 14%;"><?php echo $CodeEmplacem ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['CodeEmplacem'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $ResultatTest ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['ResultatTest'] ?></td>
            <td style="width: 14%;"><?php echo $SoucheTestee ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['SoucheTestee'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Laboratoire ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Laboratoire'] ?></td>
            <td style="width: 14%;"><?php echo $DateTest ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['DateTest'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Partenaire ?></td><td style="width:36%;color:#000;">&nbsp;<?php echo $resultat['Partenaire'] ?></td>
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
