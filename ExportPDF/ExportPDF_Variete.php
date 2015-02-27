<?php
session_start(); //Permet de récupérer le contenu des variables de session
/*Traitement fichier.json*/
$json = file_get_contents('../json/fichier.json');
$parsed_json = json_decode($json);// Permet de lire le fichier JSON avec PHP.
/*Permet de récuperer le label correspondant en anglais ou en français*/
if($_SESSION['language_Vigne']=='FR'){/*Français*/
    /*Titres*/
    $Ptitle = $parsed_json->{variete_fr}->{Ptitle};
    $OItitle = $parsed_json->{variete_fr}->{OItitle};
    $Rtitle = $parsed_json->{variete_fr}->{Rtitle};
    /*Données*/
    $Title = $parsed_json->{variete_fr}->{Title};
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
    
}else{/*Anglais*/
    /*Titres*/
    $Ptitle = $parsed_json->{variete_en}->{Ptitle};
    $OItitle = $parsed_json->{variete_en}->{OItitle};
    $Rtitle = $parsed_json->{variete_en}->{Rtitle};
    /*Données*/
    $Title = $parsed_json->{variete_en}->{Title};
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
}
require('../php/includes/bibliFonc.php');/*Accès à la base de données*/
require('../php/includes/class_DAO_Bibilotheque.php');/*Accès aux requêtes SQL*/
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodeVar'], $_SESSION['language_Vigne'], "variete");/*Requête SQL*/
ob_start();
?>

<!-- CSS de la page HTML -->
<style type="text/css">
    table{width:100%;color:#888;}
    h4{color:#080;}
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
            <td><h4><?php echo $Title?> </h4></td><td style="width: 33%"><b><?php echo $resultat['NomVar']?></b></td>
            <?php if($resultat['SynoMajeur'] == " –" ||$resultat['SynoMajeur'] == " – "){?>
                <td><h4>Code : </h4></td><td style="width: 33%"><b><?php echo $resultat['CodeVar']?></b></td>
            <?php }else{ ?>
                <td><h4>Synonyme : </h4></td><td style="width: 25%"><b><?php echo $resultat['SynoMajeur']?></b></td>
                <td><h4>Code : </h4></td><td style="width: 25%"><b><?php echo $resultat['CodeVar']?></b></td>
            <?php } ?>
        </tr>
    </table><br>
    <!--Début de fiche-->
    <table>
        <tr>
            <td style="width: 25%"><?php echo $Type?></td><td style="width: 25%"><b><?php echo $resultat['Type']?></b></td>
            <td style="width: 25%"><?php echo $CouleurPu?></td><td style="width: 25%"><b><?php echo $resultat['CouleurPu']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $Espece?></td><td style="width: 25%"><b><?php echo $resultat['Espece']?></b></td>
            <td style="width: 25%"><?php echo $CouleurPe?></td><td style="width: 25%"><b><?php echo $resultat['CouleurPe']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $Unite?></td><td style="width: 25%"><b><?php echo $resultat['UniteVar']?></b></td>
            <td style="width: 25%"><?php echo $Saveur?></td><td style="width: 25%"><b><?php echo $resultat['Saveur']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $Utilite?></td><td style="width: 25%"><b><?php echo $resultat['Utilite']?></b></td>
            <td style="width: 25%"><?php echo $Pepins?></td><td style="width: 25%"><b><?php echo $resultat['Pepins']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $OIpays?></td><td style="width: 25%"><b><?php echo $resultat['OIpays']?></b></td>
            <td style="width: 25%"><?php echo $Obtenteneur?></td><td style="width: 25%"><b><?php echo $resultat['Obtenteur']?></b></td>
        </tr>
    </table><br><br>
    <!--Origine et inscription-->
    <table>
        <tr>
            <td><h4><?php echo $OItitle ?></h4></td>
        </tr>
    </table><br>
    <table>    
        <tr>
            <td style="width: 25%"><?php echo $OIpays?></td><td style="width: 25%"><b><?php echo $resultat['OIpays']?></b></td>
            <td style="width: 25%"><?php echo $OIinscriptionFrance?></td><td style="width: 25%"><b><?php echo $resultat['InscriptionFrance']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $OIregion?></td><td style="width: 25%"><b><?php echo $resultat['RegionOrigine']?></b></td>
            <td style="width: 25%"><?php echo $OIanneeInscriptionFrance?></td><td style="width: 25%"><b><?php echo $resultat['AnneeInscriptionFrance']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $OIdeparte?></td><td style="width: 25%"><b><?php echo $resultat['DepartOrigine']?></b></td>
            <td style="width: 30%"><?php echo $OInumVarOnivins?></td><td style="width: 20%"><b><?php echo $resultat['NumVarOnivins']?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $OIinscriptionEurop?></td><td style="width: 25%"><b><?php echo $resultat['InscriptionEurope']?></b></td>
        </tr>
    </table><br><br>
    <!--Parenté-->
    <table>
        <tr>
            <td><h4><?php echo $Ptitle?></h4></td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td style="width: 25%"><?php echo $Obtenteneur?></td><td style="width: 25%"><b><?php echo ($resultat['Obtenteneur'])?></b></td>
            <td style="width: 25%"><?php echo $PmereReelle?></td><td style="width: 25%"><b><?php echo ($resultat['MereReelle'])?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $PanneeObtention?></td><td style="width: 25%"><b><?php echo ($resultat['AnneeObtention'])?></b></td>
            <td style="width: 25%"><?php echo $PcodeVarMereReelle?></td><td style="width: 25%"><b><?php echo ($resultat['CodeVarMereReelle'])?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $PmereObt?></td><td style="width: 25%"><b><?php echo ($resultat['MereObt'])?></b></td>
            <td style="width: 25%"><?php echo $PprerReel?></td><td style="width: 25%"><b><?php echo ($resultat['PereReel'])?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $PcodeCroismentINRA?></td><td style="width: 25%"><b><?php echo ($resultat['CodeCroisementINRA'])?></b></td>
            <td style="width: 25%"><?php echo $PcodeVarPereReel?></td><td style="width: 25%"><b><?php echo ($resultat['CodeVarPereReel'])?></b></td>
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $PpereObt?></td><td style="width: 25%"><b><?php echo ($resultat['PereObt'])?></b></td>
            <td style="width: 25%"><?php echo $PremarqueParenteReelle?></td><td style="width: 25%"><b><?php echo ($resultat['RemarqueParenteReelle'])?></b></td>
        </tr>
    </table><br><br>
    <!--Remarques-->
    <table>
        <tr>
            <td><h4><?php echo $Rtitle ?></h4></td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td style="width: 25%"><?php echo $RstatutEnCollection?></td><td style="width: 25%"><b><?php echo ($resultat['StatutEnCollection'])?></b></td>  
        </tr>
        <tr>
            <td style="width: 25%"><?php echo $RremarquesVar?></td><td style="width: 25%"><b><?php echo ($resultat['RemarquesVar'])?></b></td> 
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

