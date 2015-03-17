<?php
session_start(); //Permet de récupérer le contenu des variables de session
/*Traitement fichier.json*/
$json = file_get_contents('../json/fichier.json');
$parsed_json = json_decode($json); // Permet de lire le fichier JSON avec PHP.
/*Permet de récuperer le label correspondant en anglais ou en français*/
if($_SESSION['language_Vigne']=="FR"){/*Français*/
    $Code= $parsed_json->{code_fr}->{Code};
    /*données*/
    $title = $parsed_json->{emplacement_fr}->{title};
    $nomAcc= $parsed_json->{emplacement_fr}->{nomAcc};
    $CodeAcc = $parsed_json->{emplacement_fr}->{CodeAcc};
    $Site = $parsed_json->{emplacement_fr}->{Site};
    $Zone = $parsed_json->{emplacement_fr}->{Zone};
    $Parcelle = $parsed_json->{emplacement_fr}->{Parcelle};
    $SousPartie = $parsed_json->{emplacement_fr}->{SousPartie};
    $NbreEtatNormal = $parsed_json->{emplacement_fr}->{NbreEtatNormal};
    $NbreEtatMoyen = $parsed_json->{emplacement_fr}->{NbreEtatMoyen};
    $NbreEtatMoyFaible = $parsed_json->{emplacement_fr}->{NbreEtatMoyFaible};
    $NbreEtatFaible = $parsed_json->{emplacement_fr}->{NbreEtatFaible};
    $NbreEtatTresFaible = $parsed_json->{emplacement_fr}->{NbreEtatTresFaible};
    $NbreEtatMort = $parsed_json->{emplacement_fr}->{NbreEtatMort};
    $Rang = $parsed_json->{emplacement_fr}->{Rang};
    $TypeSouche= $parsed_json->{emplacement_fr}->{TypeSouche};
    $PremiereSouche = $parsed_json->{emplacement_fr}->{PremiereSouche};
    $DerniereSouche = $parsed_json->{emplacement_fr}->{DerniereSouche};
    $AnneePlantation = $parsed_json->{emplacement_fr}->{AnneePlantation};
    $AnneeElimination = $parsed_json->{emplacement_fr}->{AnneeElimination};
    $CategMateriel = $parsed_json->{emplacement_fr}->{CategMateriel};
    $Greffe= $parsed_json->{emplacement_fr}->{Greffe};
    $PorteGreffe = $parsed_json->{emplacement_fr}->{PorteGreffe};
    $NumCloneCTPS = $parsed_json->{emplacement_fr}->{NumCloneCTPS};

}else{/*Anglais*/
    $Code= $parsed_json->{code_en}->{Code};
        /*données*/
    $title = $parsed_json->{emplacement_en}->{title};
    $nomAcc= $parsed_json->{emplacement_en}->{nomAcc};
    $CodeAcc = $parsed_json->{emplacement_en}->{CodeAcc};
    $Site = $parsed_json->{emplacement_en}->{Site};
    $Zone = $parsed_json->{emplacement_en}->{Zone};
    $Parcelle = $parsed_json->{emplacement_en}->{Parcelle};
    $SousPartie = $parsed_json->{emplacement_en}->{SousPartie};
    $NbreEtatNormal = $parsed_json->{emplacement_en}->{NbreEtatNormal};
    $NbreEtatMoyen = $parsed_json->{emplacement_en}->{NbreEtatMoyen};
    $NbreEtatMoyFaible = $parsed_json->{emplacement_en}->{NbreEtatMoyFaible};
    $NbreEtatFaible = $parsed_json->{emplacement_en}->{NbreEtatFaible};
    $NbreEtatTresFaible = $parsed_json->{emplacement_en}->{NbreEtatTresFaible};
    $NbreEtatMort = $parsed_json->{emplacement_en}->{NbreEtatMort};
    $Rang = $parsed_json->{emplacement_en}->{Rang};
    $TypeSouche= $parsed_json->{emplacement_en}->{TypeSouche};
    $PremiereSouche = $parsed_json->{emplacement_en}->{PremiereSouche};
    $DerniereSouche = $parsed_json->{emplacement_en}->{DerniereSouche};
    $AnneePlantation = $parsed_json->{emplacement_en}->{AnneePlantation};
    $AnneeElimination = $parsed_json->{emplacement_en}->{AnneeElimination};
    $CategMateriel = $parsed_json->{emplacement_en}->{CategMateriel};
    $Greffe= $parsed_json->{emplacement_en}->{Greffe};
    $PorteGreffe = $parsed_json->{emplacement_en}->{PorteGreffe};
    $NumCloneCTPS = $parsed_json->{emplacement_en}->{NumCloneCTPS};
    
}
require('../php/includes/bibliFonc.php');/*Accès à la base de données*/
require('../php/includes/class_DAO_Bibilotheque.php');/*Accès aux requêtes SQL*/
$DAO = new BibliothequeDAO();
$resultat = $DAO->exportpdf($_SESSION['CodeEmplacemen'], $_SESSION['language_Vigne'], "emplacement");/*Requête SQL*/
//$resultat = $DAO->exportpdf('GrFe-St-L-VR15s012-016', "FR", "emplacement");//test
ob_start();
$nompdf = $title . $resultat['CodeEmplacemen'] .".pdf"; //Nomme le pdf que l'on télécharge
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
                <td style="border:none;"><font style="font-size: 18px; color:#696969; font-weight:bold; "><?php echo $Code?></font></td><td style="border:none;width:30%"><font style="font-size:18px; color:#000; font-weight: bold"><?php echo $resultat['CodeEmplacemen']?></font></td>
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
            <td style="width: 14%;"><?php echo $nomAcc ?></td><td style="width:36%;color:#000;"><?php echo $resultat['nomAcc'] ?></td>
            <td style="width: 14%;"><?php echo $NbreEtatMort ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NbreEtatMort'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $CodeAcc ?></td><td style="width:36%;color:#000;"><?php echo $resultat['CodeAcc'] ?></td>
            <td style="width: 14%;"><?php echo $Rang ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Rang'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Site ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Site'] ?></td>
            <td style="width: 14%;"><?php echo $TypeSouche ?></td><td style="width:36%;color:#000;"><?php echo $resultat['TypeSouche'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Zone ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Zone'] ?></td>
            <td style="width: 14%;"><?php echo $PremiereSouche ?></td><td style="width:36%;color:#000;"><?php echo $resultat['PremiereSouche'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $Parcelle ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Parcelle'] ?></td>
            <td style="width: 14%;"><?php echo $DerniereSouche ?></td><td style="width:36%;color:#000;"><?php echo $resultat['DerniereSouche'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $SousPartie ?></td><td style="width:36%;color:#000;"><?php echo $resultat['SousPartie'] ?></td>
            <td style="width: 14%;"><?php echo $AnneePlantation ?></td><td style="width:36%;color:#000;"><?php echo $resultat['AnneePlantation'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $NbreEtatNormal ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NbreEtatNormal'] ?></td>
            <td style="width: 14%;"><?php echo $AnneeElimination ?></td><td style="width:36%;color:#000;"><?php echo $resultat['AnneeElimination'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $NbreEtatMoyen ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NbreEtatMoyen'] ?></td>
            <td style="width: 14%;"><?php echo $CategMateriel ?></td><td style="width:36%;color:#000;"><?php echo $resultat['CategMateriel'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $NbreEtatMoyFaible ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NbreEtatMoyFaible'] ?></td>
            <td style="width: 14%;"><?php echo $Greffe ?></td><td style="width:36%;color:#000;"><?php echo $resultat['Greffe'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $NbreEtatFaible ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NbreEtatFaible'] ?></td>
            <td style="width: 14%;"><?php echo $PorteGreffe ?></td><td style="width:36%;color:#000;"><?php echo $resultat['PorteGreffe'] ?></td>
        </tr>
        <tr>
            <td style="width: 14%;"><?php echo $NbreEtatTresFaible ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NbreEtatTresFaible'] ?></td>
            <td style="width: 14%;"><?php echo $NumCloneCTPS ?></td><td style="width:36%;color:#000;"><?php echo $resultat['NumCloneCTPS'] ?></td>
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