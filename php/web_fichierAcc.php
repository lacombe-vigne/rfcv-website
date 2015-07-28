<?php

session_start();
require('includes/bibliFonc.php'); /* Accès à la base de données */
require('includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->fichier("accession", $_SESSION["CodeAcc2"], $_SESSION['language_Vigne']);
//print_r($resultat);
foreach ($resultat as $value) {
    //print_r($value);
    $CodeIntro = $value["CodeIntro"];
    $_SESSION['CodeIntro'] = $CodeIntro;
    $NomIntro = $value["NomIntro"];
    $NomVar = $value["NomVar"];
    $Partenaire = $value["Partenaire"];
    $CouleurPe = $value["CouleurPe"];
    $CouleurPu = $value["CouleurPu"];
    $Pepins = $value["Pepins"];
    $Saveur = $value["Saveur"];
    $Sexe = $value["Sexe"];
    $Statut = $value["Statut"];
    $DateEntre = $value["DateEntre"];
    $Collecteur = $value["Collecteur"];
    $PayP = $value["PayP"];
    $CommuneProvenance = $value["CommuneProvenance"];
    $AdresProvenance = $value["AdresProvenance"];
    $SiteProvenance = $value["SiteProvenance"];
    $UniteIntro = $value["UniteIntro"];
    $AnneeAgrement = $value["AnneeAgrement"];
    $CodeIntroPartenaire = $value["CodeIntroPartenaire"];
    $CodePartenaire = $value["CodePartenaire"];
    $CodeVar = $value["CodeVar"];
}
echo '<input id="codeIntroduction" type="hidden" value="'.$CodeIntro.'" />';
echo "
				<div id='FichierAcc'>";
if ($_SESSION['ProfilPersonne'] == 'A' || $_SESSION['ProfilPersonne'] == 'B') {
    echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Accession\",\"" . $CodeIntro . "\")' src='images/selection_accession.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Accession.php' target=_blank><img src='images/accession_pdf.png'  width='25' height='25'/></a>
					</div>";
} else {
    echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Accession\",\"" . $CodeIntro . "\")' src='images/selection_accession.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Accession.php' target=_blank><img src='images/accession_pdf.png'  width='25' height='25'/></a>
					</div>";
}
echo "<div class='title_FichierAcc'>
						<img src='images/accession_fichier.png' />
						<span id='acc_FichierAcc'></span>&nbsp &nbsp<span>" . stripslashes($NomIntro) . "</span>
						<span id='CodeIntro_FichierAcc'><span id='code_fiche' > </span> " . $CodeIntro . "</span>
					</div>
					<div class='carte_FichierAcc'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_intro' value='" . $CodeIntro . "'>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='Partenaire_lable_acc'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher2(\"" . $CodePartenaire . "\",\"partenaire\",\"" . $recherche . "\")' class='lien_fichier' >" . stripslashes($Partenaire) . "</a></td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='AnneeAgrement_lable_acc'></span></td><td width='30%' class='res_acc'>" . $AnneeAgrement . "</td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='CodeIntroPartenaire_lable_acc'></span></td><td width='30%' class='res_acc'>" . $CodeIntroPartenaire . "</td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='PayP_lable_acc'></span></td><td width='30%' class='res_acc'>" . stripslashes($PayP) . "</td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='Statut_lable_acc'></span></td><td width='30%' class='res_acc'>" . $Statut . "</td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='CommuneProvenance_lable_acc'></span></td><td width='30%' class='res_acc'>" . stripslashes($CommuneProvenance) . "</td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='UniteIntro_lable_acc'></span></td><td width='30%' class='res_acc'>" . $UniteIntro . "</td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='AdresProvenance_lable_acc'></span></td><td width='30%' class='res_acc'>" . stripslashes($AdresProvenance) . "</td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='NomVar_lable_acc'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher2(\"" . $CodeVar . "\",\"variete\",\"" . $recherche . "\")' class='lien_fichier'>" . stripslashes($NomVar) . "</a></td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='Collecteur_lable_acc'></span></td><td width='30%' class='res_acc'>" . $Collecteur . "</td>
							</tr>
						</table>
					</div>
					<div id='cate1_FichierAcc'>
						<div id='title_cate1_FichierAcc' class='vide'>
							<span><a id='click_cate1_FichierAcc'></a></span>
						</div>
						<div id='contents_cate1_FichierAcc' display='none'>
						</div>
					</div>
					<div id='cate2_FichierAcc'>
						<div id='title_cate2_FichierAcc' class='vide'>
							<span><a id='click_cate2_FichierAcc'></a></span>
						</div>
						<div id='contents_cate2_FichierAcc' display='none'>
						</div>
					</div>
					<div id='cate4_FichierAcc'>
						<div id='title_cate4_FichierAcc' class='vide'>
							<span><a id='click_cate4_FichierAcc'></a></span>
						</div>
						<div id='contents_cate4_FichierAcc' display='none'>
						</div>
					</div>
					<div id='cate5_FichierAcc'>
						<div id='title_cate5_FichierAcc' class='vide'>
							<span><a id='click_cate5_FichierAcc'></a></span>
						</div>
						<div id='contents_cate5_FichierAcc' display='none'>
						</div>
					</div>
					<div id='cate3_FichierAcc'>
						<div id='title_cate3_FichierAcc' class='vide'>
							<span><a id='click_cate3_FichierAcc'></a></span>
						</div>
						<div id='contents_cate3_FichierAcc' display='none'>
						</div>
					</div>
					<div id='cate8_FichierAcc'>
						<div id='title_cate8_FichierAcc' class='vide'>
							<span><a id='click_cate8_FichierAcc'></a></span>
						</div>
						<div id='contents_cate8_FichierAcc' display='none'>
						</div>
					</div>
					<div id='cate6_FichierAcc'>
						<div id='title_cate6_FichierAcc' class='vide'>
							<span><a id='click_cate6_FichierAcc'></a></span>
						</div>
						<div id='contents_cate6_FichierAcc' display='none'>
						</div>
					</div>
				</div>
				";

