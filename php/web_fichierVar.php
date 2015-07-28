<?php

session_start();
require('includes/bibliFonc.php'); /* Accès à la base de données */
require('includes/class_DAO_Bibilotheque.php'); /* Accès aux requêtes SQL */
$DAO = new BibliothequeDAO();
$resultat = $DAO->fichier("variete", $_SESSION["CodeVar2"], $_SESSION['language_Vigne']);
//print_r($resultat);
foreach($resultat as $value){
    //print_r($value);
    $CodeVar = $value["CodeVar"];
    $_SESSION['CodeVar']=$CodeVar;
    $NomVar = $value["NomVar"];
    $SynoMajeur = $value["SynoMajeur"];
    $NumVarOnivins = $value["NumVarOnivins"];
    $InscriptionFrance = $value["InscriptionFrance"];
    $AnneeInscriptionFrance = $value["AnneeInscriptionFrance"];
    $UniteVar= $value["UniteVar"];
    $Type = $value["Type"];
    $Espece = $value["Espece"];
    $CouleurPe = $value["CouleurPe"];
    $CouleurPu = $value["CouleurPu"];
    $Saveur = $value["Saveur"];
    $Obtenteur = $value["Obtenteur"];
    $Pepins = $value["Pepins"];
    $OIpays = $value["OIpays"];
    $Utilite = $value["Utilite"];
    $codeEspece = $value["codeEspece"];
}
echo '<input id="codeVariete" type="hidden" value="'.$CodeVar.'" />';
if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){// A ajouter(voir esp) <a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
					echo "
					<div id='FichierVar'>
						<div id='function_ligne'>
							<a id='selection_fiche'><img onclick='$.selectionFiche(\"Variete\",\"".$CodeVar."\")' src='images/selection_variete.png'  width='25' height='25'/></a>
							<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Variete.php' target=_blank><img src='images/variete_pdf.png'  width='25' height='25'/></a>
						</div>
						<div class='title_FichierVar'>
							<img src='images/variete_fichier.png'/>";
				}else{
					echo "
					<div id='FichierVar'>
						<div id='function_ligne'>
							<a id='selection_fiche'><img onclick='$.selectionFiche(\"Variete\",\"".$CodeVar."\")' src='images/selection_variete.png'  width='25' height='25'/></a>
							<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Variete.php' target=_blank><img src='images/variete_pdf.png'  width='25' height='25'/></a>
						</div>
						<div class='title_FichierVar'>
							<img src='images/variete_fichier.png'/>";
				}
					if($SynoMajeur!=" –" && $SynoMajeur!=" – "){
						echo "<span id='var_FichierVar'></span>&nbsp &nbsp<span>".stripslashes($NomVar)."</span>&nbsp &nbsp  
								<span class='SynoMajeur_FichierAcc'>[<span id='SynoMajeur_lable_var'></span> ".stripslashes($SynoMajeur)."]</span>
								<span id='codeVar_FichierVar'><span id='code_fiche'></span> ".$CodeVar."</span>";
					}else{
						echo "<span id='var_FichierVar'></span>&nbsp &nbsp".stripslashes($NomVar)."&nbsp &nbsp 
						<span id='codeVar_FichierVar'><span id='code_fiche'></span> ".$CodeVar."</span>";
					}
				echo "</div>
					<div class='carte_FichierVar'>
						<table width='100%'>
							<tr>
								<input id='fichier_code_variete' type='hidden' value='".$CodeVar."' />
								<td class='lable_carte_acc' width='15%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='Type_lable_var'></span></td><td width='35%' class='res_var'>".$Type."</td>
								<td class='lable_carte_acc' width='20%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='CouleurPer_lable_var'></span></td><td width='30%' class='res_var'>".$CouleurPe."</td>
							</tr>
							<tr>
								<td class='lable_carte_acc' width='15%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='Espece_lable_var'></span></td><td width='35%' class='res_var'><a onclick='$.passerFicher2(\"".$codeEspece."\",\"espece\",\"".$recherche."\")' class='lien_fichier'>".$Espece."</a></td>
								<td class='lable_carte_acc' width='20%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='CouleurPu_lable_var'></span></td><td width='30%' class='res_var'>".$CouleurPu."</td>
							</tr>
							<tr>
								<td class='lable_carte_acc' width='15%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='UniteVar_lable_var'></span></td><td width='35%' class='res_var'>".$UniteVar."</td>
								<td class='lable_carte_acc' width='20%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='Saveur_lable_var'></span></td><td width='30%' class='res_var'>".$Saveur."</td>	
							</tr>
							<tr>
								<td class='lable_carte_acc' width='15%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='Utilite_lable_var'></span></td><td width='35%' class='res_var'>".$Utilite."</td>
								<td class='lable_carte_acc' width='20%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='Pepins_lable_var'></span></td><td width='30%' class='res_var'>".$Pepins."</td>
							</tr>
							<tr>
								<td class='lable_carte_acc' width='15%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='OIpays_lable_var'></span></td><td width='35%' class='res_var'>".stripslashes($OIpays)."</td>
								<td class='lable_carte_acc' width='20%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='Obtenteur_lable_var'></span></td><td width='30%' class='res_var'>".$Obtenteur."</td>
							</tr>
						</table>
					</div>
					<div id='cate1_FichierVar'>
						<div id='title_cate1_FichierVar' class='vide'>
							<span><a id='click_cate1_FichierVar'></a></span>
						</div>
						<div id='contents_cate1_FichierVar' display='none'>
						</div>
					</div>
					<div id='cate2_FichierVar'>
						<div id='title_cate2_FichierVar' class='vide'>
							<span><a id='click_cate2_FichierVar'></a></span>
						</div>
						<div id='contents_cate2_FichierVar' display='none'>
						</div>
					</div>
					<div id='cate4_FichierVar'>
						<div id='title_cate4_FichierVar' class='vide'>
							<span><a id='click_cate4_FichierVar'></a></span>
						</div>
						<div id='contents_cate4_FichierVar' display='none'>
						</div>
					</div>
					<div id='cate5_FichierVar'>
						<div id='title_cate5_FichierVar' class='vide'>
							<span><a id='click_cate5_FichierVar'></a></span>
						</div>
						<div id='contents_cate5_FichierVar' display='none'>
						</div>
					</div>
					<div id='cate6_FichierVar'>
						<div id='title_cate6_FichierVar' class='vide'>
							<span><a id='click_cate6_FichierVar'></a></span>
						</div>
						<div id='contents_cate6_FichierVar' display='none'>
						</div>
					</div>
					<div id='cate3_FichierVar'>
						<div id='title_cate3_FichierVar' class='vide'>
							<span><a id='click_cate3_FichierVar'></a></span>
						</div>
						<div id='contents_cate3_FichierVar' display='none'>
						</div>
					</div>
					<div id='cate9_FichierVar'>
						<div id='title_cate9_FichierVar' class='vide'>
							<span><a id='click_cate9_FichierVar'></a></span>
						</div>
						<div id='contents_cate3_FichierVar' display='none'>
						</div>
					</div>
					<div id='cate7_FichierVar'>
						<div id='title_cate7_FichierVar' class='vide'>
							<span><a id='click_cate7_FichierVar'></a></span>
						</div>
						<div id='contents_cate7_FichierVar' display='none'>
						</div>
					</div>
				</div>
				";
?>


