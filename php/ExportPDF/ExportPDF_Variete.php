<?php
session_start(); //Permet de récupérer le contenu des variables de session
/*Traitement fichier.json*/
$json = file_get_contents('../../json/fichier.json');
$parsed_json = json_decode($json);// Permet de lire le fichier JSON avec PHP.
$jsonHeader = file_get_contents('../../json/home.json');
$parsed_jsonHeader = json_decode($jsonHeader);// pour récuperer le contenu de home.json
/*Permet de récuperer le label correspondant en anglais ou en français*/
if($_SESSION['language_Vigne']=="FR"){/*Français*/
    $Code= $parsed_json->{code_fr}->{Code};
    /*Titres*/
    $Ptitle = $parsed_json->{variete_fr}->{Ptitle};
    $OItitle = $parsed_json->{variete_fr}->{OItitle};
    $Rtitle = $parsed_json->{variete_fr}->{Rtitle};
    /*Données*/
    $Title = $parsed_json->{variete_fr}->{Title};
    $SynoMajeur = $parsed_json->{variete_fr}->{SynoMajeur};
    $Type = $parsed_json->{variete_fr}->{Type};
    $Unite = $parsed_json->{variete_fr}->{UniteVar};
    $Utilite = $parsed_json->{variete_fr}->{Utilite};
    $Espece = $parsed_json->{variete_fr}->{Espece};
    $OIpays = $parsed_json->{variete_fr}->{OIpays};
    $CouleurPu = $parsed_json->{variete_fr}->{CouleurPulp};
    $CouleurPe = $parsed_json->{variete_fr}->{CouleurPel};
    $Saveur = $parsed_json->{variete_fr}->{Saveur};
    $Pepins = $parsed_json->{variete_fr}->{Pepins};
    $Obtenteneur = $parsed_json->{variete_fr}->{Obtenteneur};
        
    /*Origine et Inscription*/
    $OIregion = $parsed_json->{variete_fr}->{OIregion};
    $OIdeparte = $parsed_json->{variete_fr}->{OIdeparte};
    $OIinscriptionFrance = $parsed_json->{variete_fr}->{OIinscriptionFrance};
    $OIanneeInscriptionFrance = $parsed_json->{variete_fr}->{OIanneeInscriptionFrance};
    $OInumVarOnivins = $parsed_json->{variete_fr}->{OInumVarOnivins};
    $OIinscriptionEurop = $parsed_json->{variete_fr}->{OIinscriptionEurop};
        
    /*Parenté*/
    $Pobtenteur = $parsed_json->{variete_fr}->{Pobtenteur};
    $PmereReelle = $parsed_json->{variete_fr}->{PmereReelle};
    $PanneeObtention = $parsed_json->{variete_fr}->{PanneeObtention};
    $PcodeVarMereReelle = $parsed_json->{variete_fr}->{PcodeVarMereReelle};
    $PmereObt = $parsed_json->{variete_fr}->{PmereObt};
    $PprerReel = $parsed_json->{variete_fr}->{PprerReel};
    $PcodeCroismentINRA = $parsed_json->{variete_fr}->{PcodeCroismentINRA};
    $PcodeVarPereReel = $parsed_json->{variete_fr}->{PcodeVarPereReel};
    $PpereObt = $parsed_json->{variete_fr}->{PpereObt};
    $PremarqueParenteReelle = $parsed_json->{variete_fr}->{PremarqueParenteReelle};
        
    /*Remarques*/
    $RstatutEnCollection = $parsed_json->{variete_fr}->{RstatutEnCollection};
    $RremarquesVar = $parsed_json->{variete_fr}->{RremarquesVar};
    
    //Header pdf
    $main_title= $parsed_jsonHeader->{title_fr}->{main_title};
    $sous_title= $parsed_jsonHeader->{title_fr}->{sous_title};
    
    //Footer pdf
    $document= $parsed_json->{pdf_fr}->{document};
    
}else{/*Anglais*/
    $Code= $parsed_json->{code_en}->{Code};
    /*Titres*/
    $Ptitle = $parsed_json->{variete_en}->{Ptitle};
    $OItitle = $parsed_json->{variete_en}->{OItitle};
    $Rtitle = $parsed_json->{variete_en}->{Rtitle};
    /*Données*/
    $Title = $parsed_json->{variete_en}->{Title};
    $SynoMajeur = $parsed_json->{variete_en}->{SynoMajeur};
    $Type = $parsed_json->{variete_en}->{Type};
    $Unite = $parsed_json->{variete_en}->{UniteVar};
    $Utilite = $parsed_json->{variete_en}->{Utilite};
    $Espece = $parsed_json->{variete_en}->{Espece};
    $OIpays = $parsed_json->{variete_en}->{OIpays};
    $CouleurPu = $parsed_json->{variete_en}->{CouleurPulp};
    $CouleurPe = $parsed_json->{variete_en}->{CouleurPel};
    $Saveur = $parsed_json->{variete_en}->{Saveur};
    $Pepins = $parsed_json->{variete_en}->{Pepins};
    $Obtenteneur = $parsed_json->{variete_en}->{Obtenteneur};
    
    /*Origine et Inscription*/
    $OIregion = $parsed_json->{variete_en}->{OIregion};
    $OIdeparte = $parsed_json->{variete_en}->{OIdeparte};
    $OIinscriptionFrance = $parsed_json->{variete_en}->{OIinscriptionFrance};
    $OIanneeInscriptionFrance = $parsed_json->{variete_en}->{OIanneeInscriptionFrance};
    $OInumVarOnivins = $parsed_json->{variete_en}->{OInumVarOnivins};
    $OIinscriptionEurop = $parsed_json->{variete_en}->{OIinscriptionEurop};
    
    /*Parenté*/
    $Pobtenteur = $parsed_json->{variete_en}->{Pobtenteur};
    $PmereReelle = $parsed_json->{variete_en}->{PmereReelle};
    $PanneeObtention = $parsed_json->{variete_en}->{PanneeObtention};
    $PcodeVarMereReelle = $parsed_json->{variete_en}->{PcodeVarMereReelle};
    $PmereObt = $parsed_json->{variete_en}->{PmereObt};
    $PprerReel = $parsed_json->{variete_en}->{PprerReel};
    $PcodeCroismentINRA = $parsed_json->{variete_en}->{PcodeCroismentINRA};
    $PcodeVarPereReel = $parsed_json->{variete_en}->{PcodeVarPereReel};
    $PpereObt = $parsed_json->{variete_en}->{PpereObt};
    $PremarqueParenteReelle = $parsed_json->{variete_en}->{PremarqueParenteReelle};
    
    /*Remarques*/
    $RstatutEnCollection = $parsed_json->{variete_en}->{RstatutEnCollection};
    $RremarquesVar = $parsed_json->{variete_en}->{RremarquesVar};
    
    //Header pdf
    $main_title= $parsed_jsonHeader->{title_en}->{main_title};
    $sous_title= $parsed_jsonHeader->{title_en}->{sous_title};
    
    //Footer pdf
    $document= $parsed_json->{pdf_en}->{document};
}
require('../includes/bibliFonc.php'); /* Accès à la base de données */
require('../includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodeVar'], $_SESSION['language_Vigne'], "variete");/*Requête SQL*/
//$resultat = $DAO->exportpdf("999999", "FR", "variete");//test
ob_start();
$nompdf = $Title . $resultat['CodeVar'] .".pdf"; //Nomme le pdf que l'on télécharge
?>

<!-- CSS de la page HTML -->
<style type="text/css">
    table{width:100%;color:#888;border-collapse: collapse;}
    h4{color:#080;}
    td{display: inline-block;vertical-align: top;text-align: left;border: 1px;border-color: #aaa;}    
</style>

<!-- Mise en page -->
<?php if($resultat['SynoMajeur'] == " –" ||$resultat['SynoMajeur'] == " – "){ ?>
    <page backtop="30mm" backleft="5mm" backright=5mm" backbottom="30mm" ng-style="color:#900">
<?php }else{ ?>
        <page backtop="35mm" backleft="5mm" backright="5mm" backbottom="30mm" ng-style="color:#900">
<?php } ?>

    <!--Entête du pdf-->
    <page_header>
        <table>
            <tr>
                <td style="border:none;"><img src="../../images/FEUILLE_DE_VIGNE.jpg" width="50" height="50" /></td>
                <td style="border:none;width: 78%; vertical-align: middle;"><font style="font-size: 14px; color:#900;"><?php echo $main_title ?></font><br><font style="color:#555;"><?php echo $sous_title ?></font></td>
            </tr>
        </table>
        <table style="background-color:#B3D270;border-radius:10px;">
            <tr>
            <?php if($resultat['SynoMajeur'] == " –" ||$resultat['SynoMajeur'] == " – "){?>
                <td style="border:none;"><font style="font-size: 22px; color:#080; font-weight:bold "><?php echo '&nbsp;&nbsp;'.$Title.''?> </font></td><td style="border:none;width: 70%"><font style="font-size: 22px; color:#000; font-weight:bold"><?php echo $resultat['NomVar']?></font></td>
                <td style="border:none;"><font style="font-size: 14px; color:#080; font-weight:bold "><?php echo $Code?></font></td><td style="border:none;width:9%"><font style="font-size:14px; color:#000; font-weight: bold"><?php echo $resultat['CodeVar']?></font></td>
            </tr>
            <?php }else{ ?>
            <td style="border:none;"><font style="font-size: 22px; color:#080; font-weight:bold "><?php echo '&nbsp;&nbsp;'.$Title.''?></font></td><td style="border:none;width: 69%"><font style="font-size: 22px; color:#000; font-weight:bold"><?php echo $resultat['NomVar']?></font></td>
            <td style="border:none;"><font style="font-size: 14px; color:#080; font-weight:bold "><?php echo $Code?></font></td><td style="border:none;width: 9%"><font style="font-size:14px; color:#000; font-weight: bold"><?php echo $resultat['CodeVar']?></font></td>
            </tr>
            
            <tr>
                <td style="border:none;"><font style="font-size: 16px; color:#080; font-weight:bold "><?php echo '&nbsp;&nbsp;&nbsp;'.$SynoMajeur.'' ?></font></td><td style="border:none;"><font style="font-size:16px; color:#000; font-weight: bold"><?php echo $resultat['SynoMajeur']?></font></td>
            </tr><?php } ?>
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
            <td style="width: 14%;;"><?php echo $Type?></td><td style="width:36%;color:#000;;">&nbsp;<?php echo $resultat['Type']?></td>
            <td style="width: 14%;;"><?php echo $CouleurPu?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['CouleurPu']?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $Espece?></td><td style="width: 36%;color:#000;;"><i>&nbsp;<?php echo $resultat['Espece']?></i></td>
            <td style="width: 14%;;"><?php echo $CouleurPe?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['CouleurPe']?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $Unite?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['UniteVar']?></td>
            <td style="width: 14%;;"><?php echo $Saveur?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['Saveur']?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $Utilite?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['Utilite']?></td>
            <td style="width: 14%;;"><?php echo $Pepins?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['Pepins']?></td>
        </tr>
    </table><br>
    <!--Origine et inscription-->
    <table>
        <tr>
            <td style="border:none;"><h4><?php echo $OItitle ?></h4></td>
        </tr>
    </table>
    <table>    
        <tr>
            <td style="width: 14%;;"><?php echo $OIpays?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['OIpays']?></td>
            <td style="width: 14%;;"><?php echo $OIinscriptionFrance?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['InscriptionFrance']?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $OIregion?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['RegionOrigine']?></td>
            <td style="width: 14%;;"><?php echo $OIanneeInscriptionFrance?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['AnneeInscriptionFrance']?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $OIdeparte?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['DepartOrigine']?></td>
            <td style="width: 14%;;"><?php echo $OInumVarOnivins?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['NumVarOnivins']?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $OIinscriptionEurop?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo $resultat['InscriptionEurope']?></td>
        </tr>
    </table><br>
    <!--Parenté-->
    <table>
        <tr>
            <td style="border:none;"><h4><?php echo $Ptitle?></h4></td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 14%;;"><?php echo $Obtenteneur?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['Obtenteur'])?></td>
            <td style="width: 14%;;"><?php echo $PmereReelle?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['MereReelle'])?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $PanneeObtention?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['AnneeObtention'])?></td>
            <td style="width: 14%;;"><?php echo $PcodeVarMereReelle?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['CodeVarMereReelle'])?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $PmereObt?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['MereObt'])?></td>
            <td style="width: 14%;;"><?php echo $PprerReel?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['PereReel'])?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $PcodeCroismentINRA?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['CodeCroisementINRA'])?></td>
            <td style="width: 14%;;"><?php echo $PcodeVarPereReel?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['CodeVarPereReel'])?></td>
        </tr>
        <tr>
            <td style="width: 14%;;"><?php echo $PpereObt?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['PereObt'])?></td>
            <td style="width: 14%;vertical-align: text-bottom;;"><?php echo $PremarqueParenteReelle?></td><td style="width: 36%;color:#000;;">&nbsp;<?php echo ($resultat['RemarqueParenteReelle'])?></td>
        </tr>
    </table><br>
    <!--Remarques-->
    <table>
        <tr>
            <td style="border:none;"><h4><?php echo $Rtitle ?></h4></td>
        </tr>
    </table>
    <table>
        <tr>
            <td style="width: 14%;" ><?php echo $RstatutEnCollection?></td><td style="color:#000;">&nbsp;<?php echo ($resultat['StatutEnCollection'])?></td>  
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $RremarquesVar?></td><td  style="text-align:justify;width:86%;color:#000;">&nbsp;<?php echo ($resultat['RemarquesVar'])?></td> 
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

