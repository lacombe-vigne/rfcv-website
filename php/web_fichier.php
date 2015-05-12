<?php
	
	session_start();
	function supprNull($a){
		$res=$a;
                if($a == "oui"){
                    $res="yes";
                    return $res;
                }
                if($a == "non" && $_SESSION['language_Vigne'] == "EN"){
                    $res="no";
                    return $res;
                }
		if($a==null){
                    if($_SESSION['language_Vigne']=="FR"){
                        $res="–";
                    }else{
                        $res="–";
                    }
                    
		}else{
			$res=$a;
		}
		return $res;
	}
	$section=$_GET['section'];
	if($section=='espece'){
		$CodeEsp=supprNull($_POST['CodeEsp']);
                $_SESSION['CodeEsp']=$CodeEsp;
		$Espece=supprNull($_POST['Espece']);
		$Botaniste=supprNull($_POST['Botaniste']);
		$Genre=supprNull($_POST['Genre']);
		$CompoGenet=supprNull($_POST['CompoGenet']);
		$SousGenre=supprNull($_POST['SousGenre']);
		$Validite=supprNull($_POST['Validite']);
		$Tronc=supprNull($_POST['Tronc']);
		$RemarqueEsp=supprNull($_POST['RemarqueEsp']);
	}
	if($section=='variete'){
		$CodeVar=supprNull($_POST['CodeVar']);
                $_SESSION['CodeVar']=$CodeVar;
		$NomVar=supprNull($_POST['NomVar']);
		$SynoMajeur=supprNull($_POST['SynoMajeur']);  
		$NumVarOnivins=supprNull($_POST['NumVarOnivins']);
		$InscriptionFrance=supprNull($_POST['InscriptionFrance']);
		$AnneeInscriptionFrance=supprNull($_POST['AnneeInscriptionFrance']);
		$UniteVar=supprNull($_POST['UniteVar']);
		$Type=supprNull($_POST['Type']);
		$Espece=supprNull($_POST['Espece']);
		$CouleurPe=supprNull($_POST['CouleurPe']);
		$CouleurPu=supprNull($_POST['CouleurPu']);
		$Saveur=supprNull($_POST['Saveur']);
		$Obtenteur=supprNull($_POST['Obtenteur']);
		$Pepins=supprNull($_POST['Pepins']);
		$OIpays=supprNull($_POST['OIpays']);
		$Utilite=supprNull($_POST['Utilite']);
		$codeEspece=supprNull($_POST['codeEspece']);
		
	}
	if($section=='accession'){
		$CodeIntro=supprNull($_POST['CodeIntro']);
                $_SESSION['CodeIntro']=$CodeIntro;
		$NomIntro=supprNull($_POST['NomIntro']);
		$NomVar=supprNull($_POST['NomVar']);
		$Partenaire=supprNull($_POST['Partenaire']);
		$CouleurPe=supprNull($_POST['CouleurPe']);
		$CouleurPu=supprNull($_POST['CouleurPu']);
		$Pepins=supprNull($_POST['Pepins']);
		$Saveur=supprNull($_POST['Saveur']);
		$Sexe=supprNull($_POST['Sexe']);
		$Statut=supprNull($_POST['Statut']);
		$DateEntre=supprNull($_POST['DateEntre']);
		$Collecteur=supprNull($_POST['Collecteur']);
		$Sexe=supprNull($_POST['Sexe']);
		$PayP=supprNull($_POST['PayP']);
		$CommuneProvenance=supprNull($_POST['CommuneProvenance']);
		$AdresProvenance=supprNull($_POST['AdresProvenance']);
		$SiteProvenance=supprNull($_POST['SiteProvenance']);
		$UniteIntro=supprNull($_POST['UniteIntro']);
		$AnneeAgrement=supprNull($_POST['AnneeAgrement']);
		$CodeIntroPartenaire=supprNull($_POST['CodeIntroPartenaire']);
		$CodePartenaire=supprNull($_POST['CodePartenaire']);
		$CodeVar=supprNull($_POST['CodeVar']);
	}
	if($section=='aptitude'){
		$codeAptitude=supprNull($_POST['codeAptitude']);
                $_SESSION['codeAptitude']=$codeAptitude;
		$nomVar=supprNull($_POST['nomVar']);
		$CodeVar=supprNull($_POST['CodeVar']);
		$nomAcc=supprNull($_POST['nomAcc']);
		$CodeAcc=supprNull($_POST['CodeAcc']);
		$Caracteristique=supprNull($_POST['Caracteristique']);
		$Valeur=supprNull($_POST['Valeur']);
		$Unite=supprNull($_POST['Unite']);
		$Ponderation=supprNull($_POST['Ponderation']);
		$Experimentateur=supprNull($_POST['Experimentateur']);
		$Partenaire=supprNull($_POST['Partenaire']);
		$CodePartenaire=supprNull($_POST['CodePartenaire']);
		$JourExp=supprNull($_POST['JourExp']);
		$MoisExp=supprNull($_POST['MoisExp']);
		$AnneeExp=supprNull($_POST['AnneeExp']);
		$LieuExp=supprNull($_POST['LieuExp']);
		$SiteExp=supprNull($_POST['SiteExp']);
		$CodeSite=supprNull($_POST['CodeSite']);
		$EmplacementExp=supprNull($_POST['EmplacementExp']);
	}
	if($section=='morphologique'){
		$CodeAmpelo=supprNull($_POST['CodeAmpelo']);
                $_SESSION['CodeAmpelo']=$CodeAmpelo;
		$nomAcc=supprNull($_POST['nomAcc']);
		$CodeAcc=supprNull($_POST['CodeAcc']);
		$Descripteur=supprNull($_POST['Descripteur']);
		$CodeDescripteur=supprNull($_POST['CodeDescripteur']);
		$Caractere=supprNull($_POST['Caractere']);
		$CodeCaractere=supprNull($_POST['CodeCaractere']);
		$Experimentateur=supprNull($_POST['Experimentateur']);
		$Ponderation=supprNull($_POST['Ponderation']);
		$Partenaire=supprNull($_POST['Partenaire']);
		$CodePartenaire=supprNull($_POST['CodePartenaire']);
		$Experimentateur=supprNull($_POST['Experimentateur']);
		$JourExp=supprNull($_POST['JourExp']);
		$MoisExp=supprNull($_POST['MoisExp']);
		$AnneeExp=supprNull($_POST['AnneeExp']);
		$AnneeExp=supprNull($_POST['AnneeExp']);
		$LieuExp=supprNull($_POST['LieuExp']);
		$SiteExp=supprNull($_POST['SiteExp']);
		$CodeSite=supprNull($_POST['CodeSite']);
		$Emplamcement=supprNull($_POST['Emplamcement']);
	}
	if($section=='emplacement'){
		$CodeEmplacemen=supprNull($_POST['CodeEmplacemen']);
                $_SESSION["CodeEmplacemen"]=$CodeEmplacemen;
		$nomAcc=supprNull($_POST['nomAcc']);
		$CodeAcc=supprNull($_POST['CodeAcc']);
		$Site=supprNull($_POST['Site']);
		$CodeSite=supprNull($_POST['CodeSite']);
		$Zone=supprNull($_POST['Zone']);
		$Parcelle=supprNull($_POST['Parcelle']);
		$SousPartie=supprNull($_POST['SousPartie']);
		$NbreEtatNormal=supprNull($_POST['NbreEtatNormal']);
		$NbreEtatMoyen=supprNull($_POST['NbreEtatMoyen']);
		$NbreEtatMoyFaible=supprNull($_POST['NbreEtatMoyFaible']);
		$NbreEtatFaible=supprNull($_POST['NbreEtatFaible']);
		$NbreEtatTresFaible=supprNull($_POST['NbreEtatTresFaible']);
		$NbreEtatMort=supprNull($_POST['NbreEtatMort']);
		$Rang=supprNull($_POST['Rang']);
		$TypeSouche=supprNull($_POST['TypeSouche']);
		$PremiereSouche=supprNull($_POST['PremiereSouche']);
		$DerniereSouche=supprNull($_POST['DerniereSouche']);
		$AnneePlantation=supprNull($_POST['AnneePlantation']);
		$AnneeElimination=supprNull($_POST['AnneeElimination']);
		$CategMateriel=supprNull($_POST['CategMateriel']);
		$Greffe=supprNull($_POST['Greffe']);
		$PorteGreffe=supprNull($_POST['PorteGreffe']);
		$NumCloneCTPS=supprNull($_POST['NumCloneCTPS']);
	}
	if($section=='sanitaire'){
		$CodeSanitaire=supprNull($_POST['CodeSanitaire']);
                $_SESSION['CodeSanitaire']=$CodeSanitaire;
		$nomAcc=supprNull($_POST['nomAcc']);
		$CodeAcc=supprNull($_POST['CodeAcc']);
		$PathogeneTeste=supprNull($_POST['PathogeneTeste']);
		$ResultatTest=supprNull($_POST['ResultatTest']);
		$CategorieTest=supprNull($_POST['CategorieTest']);
		$MatTeste=supprNull($_POST['MatTeste']);
		$CodeEmplacem=supprNull($_POST['CodeEmplacem']);
		$SoucheTestee=supprNull($_POST['SoucheTestee']);
		$Laboratoire=supprNull($_POST['Laboratoire']);
		$DateTest=supprNull($_POST['DateTest']);
		$Partenaire=supprNull($_POST['Partenaire']);
		$CodePartenaire=supprNull($_POST['CodePartenaire']);
	}
	if($section=='genetique'){
		$Code=supprNull($_POST['Code']);
                $_SESSION['Code']=$Code;
		$nomAcc=supprNull($_POST['nomAcc']);
		$CodeAcc=supprNull($_POST['CodeAcc']);
		$Marqueur=supprNull($_POST['Marqueur']);
		$ValeurCodee1=supprNull($_POST['ValeurCodee1']);
		$ValeurCodee2=supprNull($_POST['ValeurCodee2']);
		$EmplacemRecolte=supprNull($_POST['EmplacemRecolte']);
		$SouchePrelev=supprNull($_POST['SouchePrelev']);
		$DateRecolte=supprNull($_POST['DateRecolte']);
		$IdProtocoleRecolte=supprNull($_POST['IdProtocoleRecolte']);
		$TypeOrgane=supprNull($_POST['TypeOrgane']);
		$IdStockADN=supprNull($_POST['IdStockADN']);
		$IdProtocolePCR=supprNull($_POST['IdProtocolePCR']);
		$DatePCR=supprNull($_POST['DatePCR']);
		$DateRun=supprNull($_POST['DateRun']);
		$Partenaire=supprNull($_POST['Partenaire']);
		$CodePartenaire=supprNull($_POST['CodePartenaire']);
	}
	if($section=='bibliographie'){
		$Code=supprNull($_POST['Code']);
                $_SESSION['Code']=$Code;
		$nomAcc=supprNull($_POST['nomAcc']);
		$nomVar=supprNull($_POST['nomVar']);
		$CodeAcc=supprNull($_POST['CodeAcc']);
		$CodeVar=supprNull($_POST['CodeVar']);
		$TypeDoc=supprNull($_POST['TypeDoc']);
		$Title=supprNull($_POST['Title']);
		$Author=supprNull($_POST['Author']);
		$Year=supprNull($_POST['Year']);
		$Edition=supprNull($_POST['Edition']);
		$Publisher=supprNull($_POST['Publisher']);
		$PlacePublished=supprNull($_POST['PlacePublished']);
		$ISBN=supprNull($_POST['ISBN']);
		$Language=supprNull($_POST['Language']);
		$NumberOfVolumes=supprNull($_POST['NumberOfVolumes']);
		$PagesDoc=supprNull($_POST['PagesDoc']);
		$CallNumber=supprNull($_POST['CallNumber']);
		$VolumeCitation=supprNull($_POST['VolumeCitation']);
		$PagesCitation=supprNull($_POST['PagesCitation']);
		$AuteurCitation=supprNull($_POST['AuteurCitation']);
		$NomVigneCite=supprNull($_POST['NomVigneCite']);
	}
	if($section=='partenaire'){
		$CodePartenaire=supprNull($_POST['CodePartenaire']);
                $_SESSION["CodePartenaire"]=$CodePartenaire;
		$NomPartenaire=supprNull($_POST['NomPartenaire']);
		$SiglePartenaire=supprNull($_POST['SiglePartenaire']);
		$SectionRegionaleENTAV=supprNull($_POST['SectionRegionaleENTAV']);
		$RegionPartenaire=supprNull($_POST['RegionPartenaire']);
		$DepartPartenaire=supprNull($_POST['DepartPartenaire']);
		$ResponsablesPartenaire=supprNull($_POST['ResponsablesPartenaire']);
		$TelephonePartenaire=supprNull($_POST['TelephonePartenaire']);
		$Email=supprNull($_POST['Email']);
		$AdressePartenaire=supprNull($_POST['AdressePartenaire']);
		$CodPostPartenaire=supprNull($_POST['CodPostPartenaire']);
		$CommunePartenaire=supprNull($_POST['CommunePartenaire']);
	}
	if($section=='site'){
                $CodeSite=supprNull($_POST['CodeSite']);
                $_SESSION["CodeSite"]=$CodeSite;
                $NomSite=supprNull($_POST['NomSite']);
		$RegionSite=supprNull($_POST['RegionSite']);
		$DepartSite=supprNull($_POST['DepartSite']);
		$CommuneSite=supprNull($_POST['CommuneSite']);
		$CodPostSite=supprNull($_POST['CodPostSite']);
		$AdresseSite=supprNull($_POST['AdresseSite']);
		$LatSite=supprNull($_POST['LatSite']);
		$LongSite=supprNull($_POST['LongSite']);
		$AltSite=supprNull($_POST['AltSite']);
		$SecRegENTAV=supprNull($_POST['SecRegENTAV']);
		$ProprietaireSite=supprNull($_POST['ProprietaireSite']);
		$ExploitSite=supprNull($_POST['ExploitSite']);
		$ResponsSite=supprNull($_POST['ResponsSite']);
		$TelSite=supprNull($_POST['TelSite']);
		$FaxSite=supprNull($_POST['FaxSite']);
		$MailSite=supprNull($_POST['MailSite']);
		$AnneeCreationSite=supprNull($_POST['AnneeCreationSite']);
		$VarMajoritairesSite=supprNull($_POST['VarMajoritairesSite']);
		$PresentationSite=supprNull($_POST['PresentationSite']);
	}
	$search_value=$_POST['search_value'];
	$case_s_value=$_POST['case_s_value'];
	$model_value=$_POST['model_value'];
	$langue_value=$_POST['langue_value'];
	$classname_espece=$_POST['classname_espece'];
	$section_espece=$_POST['section_espece'];
	$colone_espece=$_POST['colone_espece'];
	$classname_variete=$_POST['classname_variete'];
	$section_variete=$_POST['section_variete'];
	$colone_variete=$_POST['colone_variete'];
	$classname_accession=$_POST['classname_accession'];
	$section_accession=$_POST['section_accession'];
	$colone_accession=$_POST['colone_accession'];
	$page_espece=$_POST['page_espece'];
	$pagesize_espece=$_POST['pagesize_espece'];
	$page_variete=$_POST['page_variete'];
	$pagesize_variete=$_POST['pagesize_variete'];
	$page_accession=$_POST['page_accession'];
	$pagesize_accession=$_POST['pagesize_accession'];
	echo'
		<input id="search_value" type="hidden" value="'.$search_value.'" />
		<input id="case_s_value" type="hidden" value="'.$case_s_value.'" />
		<input id="model_value" type="hidden" value="'.$model_value.'" />
		<input id="langue_value" type="hidden" value="'.$langue_value.'" />
		<input id="tri_espece_classname" type="hidden" value="'.$classname_espece.'" />
		<input id="tri_espece_section" type="hidden" value="'.$section_espece.'" />
		<input id="tri_espece_colone" type="hidden" value="'.$colone_espece.'" />
		<input id="tri_variete_classname" type="hidden" value="'.$classname_variete.'" />
		<input id="tri_variete_section" type="hidden" value="'.$section_variete.'" />
		<input id="tri_variete_colone" type="hidden" value="'.$colone_variete.'" />
		<input id="tri_accession_classname" type="hidden" value="'.$classname_accession.'" />
		<input id="tri_accession_section" type="hidden" value="'.$section_accession.'" />
		<input id="tri_accession_colone" type="hidden" value="'.$colone_accession.'" />
		<input id="espece_curpage_value" type="hidden" value="'.$page_espece.'" />
		<input id="select_pagesize_espece" type="hidden" value="'.$pagesize_espece.'" />
		<input id="variete_curpage_value" type="hidden" value="'.$page_variete.'" />
		<input id="select_pagesize_variete" type="hidden" value="'.$pagesize_variete.'" />
		<input id="accession_curpage_value" type="hidden" value="'.$page_accession.'" />
		<input id="select_pagesize_accession" type="hidden" value="'.$pagesize_accession.'" />
	';
	if(isset($section)){
		switch ($section){
			case("espece"):
				echo "
				<div id='FichierEsp'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){//<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a> A rajouter quand la fonction de modification des fiches sera créée
					echo"
					<div id='function_ligne'>				
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Espece\",\"".$CodeEsp."\")' src='images/selection_espece.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Espece.php' target=_blank><img src='images/espece_pdf.png'  width='25' height='25'/></a>
					</div>
					";
				}else{
					echo"
					<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Espece\",\"".$CodeEsp."\")' src='images/selection_espece.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Espece.php' target=_blank><img src='images/espece_pdf.png'  width='25' height='25'/></a>
					</div>
					";
				}
				echo "
					<div class='title_FichierEsp'>
						<img src='images/espece_fichier.png' />
						<span id='esp_FichierEsp'></span>&nbsp &nbsp<i>".$Espece."</i>
						<span id='codeEsp_FichierEsp'><span id='code_fiche'></span> ".$CodeEsp."</span>
					</div>
					<div class='carte_FichierEsp'>
						<table width='100%'>
								<input id='fichier_code_espece' type='hidden' value='".$CodeEsp."' />	
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_espece.png' width='10' height='10'/><span id='Botaniste_lable_esp'></span></td><td width='30%' class='res_esp'>".$Botaniste."</td>
								<td width='15%' class='lable_carte_acc'><img src='images/poin_espece.png' width='10' height='10'/><span id='Genre_lable_esp'></span></td><td width='35%' class='res_esp'><i>".$Genre."</i></td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_espece.png' width='10' height='10'/><span id='CompoGenet_lable_esp'></span></td><td width='30%' class='res_esp'>".$CompoGenet."</td>
								<td width='15%' class='lable_carte_acc'><img src='images/poin_espece.png' width='10' height='10'/><span id='SousGenre_lable_esp'></span></td><td width='35%' class='res_esp'><i>".$SousGenre."</i></td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_espece.png' width='10' height='10'/><span id='RemarqueEsp_lable_esp'></span></td><td width='30%' colspan='4' class='res_esp'>".$RemarqueEsp."</td>
							</tr>
						</table>
					</div>
					<div id='cate2_FichierEsp'>
						<div id='title_cate2_FichierEsp' class='vide'>
							<span><a id='click_cate2_FichierEsp'></a></span>
						</div>
						<div id='contents_cate2_FichierEsp' display='none'>
						</div>
					</div>
					<div id='cate3_FichierEsp'>
						<div id='title_cate3_FichierEsp' class='vide'>
							<span><a id='click_cate3_FichierEsp'></a></span>
						</div>
						<div id='contents_cate3_FichierEsp' display='none'>
						</div>
					</div>
				</div>
				";
				// <div id='cate1_FichierEsp'>
						// <div id='title_cate1_FichierEsp' class='vide'>
							// <span><a id='click_cate1_FichierEsp'>Emplacement en collection</a></span>
						// </div>
						// <div id='contents_cate1_FichierEsp' display='none'>
						// </div>
					// </div>
			break;
			case("variete"):
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
						echo "<span id='var_FichierVar'></span>&nbsp &nbsp".stripslashes($NomVar)."&nbsp &nbsp 
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
								<td class='lable_carte_acc' width='15%'><img src='images/poin_variete.png' width='10' height='10'/> <span id='Espece_lable_var'></span></td><td width='35%' class='res_var'><a onclick='$.passerFicher(\"".$codeEspece."\",\"espece\")' class='lien_fichier'>".$Espece."</a></td>
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
					<div id='cate8_FichierVar'>
						<div id='title_cate8_FichierVar' class='vide'>
							<span><a id='click_cate8_FichierVar'></a></span>
						</div>
						<div id='contents_cate8_FichierVar' display='none'>
						</div>
					</div>
				</div>
				";
			break;
			case("accession"):
				echo "
				<div id='FichierAcc'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Accession\",\"".$CodeIntro."\")' src='images/selection_accession.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Accession.php' target=_blank><img src='images/accession_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Accession\",\"".$CodeIntro."\")' src='images/selection_accession.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Accession.php' target=_blank><img src='images/accession_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierAcc'>
						<img src='images/accession_fichier.png' />
						<span id='acc_FichierAcc'></span>&nbsp &nbsp".stripslashes($NomIntro)."
						<span id='CodeIntro_FichierAcc'><span id='code_fiche' > </span> ".$CodeIntro."</span>
					</div>
					<div class='carte_FichierAcc'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_intro' value='".$CodeIntro."'>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='Partenaire_lable_acc'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodePartenaire."\",\"partenaire\")' class='lien_fichier' >".stripslashes($Partenaire)."</a></td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='AnneeAgrement_lable_acc'></span></td><td width='30%' class='res_acc'>".$AnneeAgrement."</td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='CodeIntroPartenaire_lable_acc'></span></td><td width='30%' class='res_acc'>".$CodeIntroPartenaire."</td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='PayP_lable_acc'></span></td><td width='30%' class='res_acc'>".stripslashes($PayP)."</td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='Statut_lable_acc'></span></td><td width='30%' class='res_acc'>".$Statut."</td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='CommuneProvenance_lable_acc'></span></td><td width='30%' class='res_acc'>".stripslashes($CommuneProvenance)."</td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='UniteIntro_lable_acc'></span></td><td width='30%' class='res_acc'>".$UniteIntro."</td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='AdresProvenance_lable_acc'></span></td><td width='30%' class='res_acc'>".stripslashes($AdresProvenance)."</td>
							</tr>
							<tr>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='NomVar_lable_acc'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeVar."\",\"variete\")' class='lien_fichier'>".stripslashes($NomVar)."</a></td>
								<td width='20%' class='lable_carte_acc'><img src='images/poin_acc.png' width='10' height='10'/><span id='Collecteur_lable_acc'></span></td><td width='30%' class='res_acc'>".$Collecteur."</td>
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
					<div id='cate7_FichierAcc'>
						<div id='title_cate7_FichierAcc' class='vide'>
							<span><a id='click_cate7_FichierAcc'></a></span>
						</div>
						<div id='contents_cate7_FichierAcc' display='none'>
						</div>
					</div>
				</div>
				";
			break;
			case("aptitude"):
				echo "
				<div id='FichierApt'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Aptitudes\",\"".$codeAptitude."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Aptitudes.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Aptitudes\",\"".$codeAptitude."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Aptitudes.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierApt'>
						<img src='images/accession_fichier.png' />
						<span id='apt_FichierApt'></span>&nbsp &nbsp
						<span id='codeAptitude_FichierApt'><span id='code_fiche' > </span> ".$codeAptitude."</span>
					</div>
					<div class='carte_FichierApt'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_aptitude' value='".$codeAptitude."'>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='nomVar_lable_apt'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeVar."\",\"variete\")' class='lien_fichier' >".stripslashes($nomVar)."</a></td>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='Experimentateur_lable_apt'></span></td><td width='30%' class='res_acc'>".$Experimentateur."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='nomAcc_lable_apt'></span></td><td class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".stripslashes($nomAcc)."</a></td>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='Partenaire_lable_apt'></span></td><td class='res_acc'><a onclick='$.passerFicher(\"".$CodePartenaire."\",\"partenaire\")' class='lien_fichier'>".stripslashes($Partenaire)."</a></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc''><img src='images/poin_par.png' width='10' height='10'/><span id='Caracteristique_lable_apt'></span></td><td width='30%' class='res_acc'>".$Caracteristique."</td>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='JourExp_lable_apt'></span></td><td width='30%' class='res_acc'>".$JourExp."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='Valeur_lable_apt'></span></td><td class='res_acc'>".$Valeur."</td>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='MoisExp_lable_apt'></span></td><td class='res_acc'>".$MoisExp."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='Unite_lable_apt'></span></td><td class='res_acc'>".$Unite."</td>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='AnneeExp_lable_apt'></span></td><td width='30%' class='res_acc'>".$AnneeExp."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='Ponderation_lable_apt'></span></td><td class='res_acc'>".$Ponderation."</td>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='LieuExp_lable_apt'></span></td><td width='30%' class='res_acc'>".$LieuExp."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='SiteExp_lable_apt'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeSite."\",\"site\")' class='lien_fichier'>".stripslashes($SiteExp)."</a></td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc'><img src='images/poin_par.png' width='10' height='10'/><span id='EmplacementExp_lable_apt'></span></td><td width='30%' class='res_acc'>".stripslashes($EmplacementExp)."</td>
							</tr>
						</table>
					</div>
				</div>";
			break;
			case("morphologique"):
				echo "
				<div id='FichierMor'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Morphologique\",\"".$CodeAmpelo."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Morphologique.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Morphologique\",\"".$CodeAmpelo."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Morphologique.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierMor'>
						<img src='images/accession_fichier.png' />
						<span id='mor_FichierMor'></span>&nbsp &nbsp
						<span id='CodeAmpelo_FichierMor'><span id='code_fiche' > </span> ".$CodeAmpelo."</span>
					</div>
					<div class='carte_FichierMor'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_ampelo' value='".$CodeAmpelo."'>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='nomAcc_lable_mor'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".stripslashes($nomAcc)."</a></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Experimentateur_lable_mor'></span></td><td width='30%' class='res_acc'>".$Experimentateur."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Descripteur_lable_mor'></span></td><td class='res_acc'>".$Descripteur."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Partenaire_lable_mor'></span></td><td class='res_acc'><a onclick='$.passerFicher(\"".$CodePartenaire."\",\"partenaire\")' class='lien_fichier'>".stripslashes($Partenaire)."</a></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CodeDescripteur_lable_mor'></span></td><td width='30%' class='res_acc'>".$CodeDescripteur."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='JourExp_lable_mor'></span></td><td width='30%' class='res_acc'>".$JourExp."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Caractere_lable_mor'></span></td><td class='res_acc'>".$Caractere."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='MoisExp_lable_mor'></span></td><td class='res_acc'>".$MoisExp."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CodeCaractere_lable_mor'></span></td><td class='res_acc'>".$CodeCaractere."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='AnneeExp_lable_mor'></span></td><td width='30%' class='res_acc'>".$AnneeExp."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='LieuExp_lable_mor'></span></td><td width='30%' class='res_acc'>".$LieuExp."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='SiteExp_lable_mor'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeSite."\",\"site\")' class='lien_fichier'>".$SiteExp."</a></td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Emplamcement_lable_mor'></span></td><td width='30%' class='res_acc'>".$Emplamcement."</td>
							</tr>
						</table>
					</div>
				</div>";
			break;
			case("emplacement"):
				echo "
				<div id='FichierEmp'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Emplacement\",\"".$CodeEmplacemen."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Emplacement.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Emplacement\",\"".$CodeEmplacemen."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Emplacement.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierEmp'>
						<img src='images/accession_fichier.png' />
						<span id='emp_FichierEmp'></span>&nbsp &nbsp
						<span id='CodeEmplacemen_FichierEmp'><span id='code_fiche' > </span> ".$CodeEmplacemen."</span>
					</div>
					<div class='carte_FichierEmp'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_emplacement' value='".$CodeEmplacemen."'>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='nomAcc_lable_emp'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".stripslashes($nomAcc)."</a></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Rang_lable_emp'></span></td><td width='30%' class='res_acc'>".$Rang."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CodeAcc_lable_emp'></span></td><td class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".stripslashes($CodeAcc)."</a></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='TypeSouche_lable_emp'></span></td><td class='res_acc'>".$TypeSouche."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Site_lable_emp'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeSite."\",\"site\")' class='lien_fichier'>".stripslashes($Site)."</a></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='PremiereSouche_lable_emp'></span></td><td width='30%' class='res_acc'>".$PremiereSouche."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Zone_lable_emp'></span></td><td class='res_acc'>".$Zone."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='DerniereSouche_lable_emp'></span></td><td class='res_acc'>".$DerniereSouche."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Parcelle_lable_emp'></span></td><td class='res_acc'>".$Parcelle."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='AnneePlantation_lable_emp'></span></td><td width='30%' class='res_acc'>".$AnneePlantation."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='SousPartie_lable_emp'></span></td><td class='res_acc'>".$SousPartie."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='AnneeElimination_lable_emp'></span></td><td width='30%' class='res_acc'>".$AnneeElimination."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NbreEtatNormal_lable_emp'></span></td><td class='res_acc'>".$NbreEtatNormal."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CategMateriel_lable_emp'></span></td><td width='30%' class='res_acc'>".$CategMateriel."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NbreEtatMoyen_lable_emp'></span></td><td class='res_acc'>".$NbreEtatMoyen."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Greffe_lable_emp'></span></td><td width='30%' class='res_acc'>".$Greffe."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NbreEtatMoyFaible_lable_emp'></span></td><td class='res_acc'>".$NbreEtatMoyFaible."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='PorteGreffe_lable_emp'></span></td><td width='30%' class='res_acc'>".$PorteGreffe."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NbreEtatFaible_lable_emp'></span></td><td class='res_acc'>".$NbreEtatFaible."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NumCloneCTPS_lable_emp'></span></td><td width='30%' class='res_acc'>".$NumCloneCTPS."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NbreEtatTresFaible_lable_emp'></span></td><td class='res_acc'>".$NbreEtatTresFaible."</td>
								<td codspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NbreEtatMort_lable_emp'></span></td><td class='res_acc'>".$NbreEtatMort."</td>
								<td codspan='2'></td>
							</tr>
						</table>
					</div>
				</div>";
			break;
			case("sanitaire"):
				echo "
				<div id='FichierSan'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Sanitaire\",\"".$CodeSanitaire."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Sanitaire.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Sanitaire\",\"".$CodeSanitaire."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Sanitaire.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierSan'>
						<img src='images/accession_fichier.png' />
						<span id='san_FichierSan'></span>&nbsp &nbsp
						<span id='CodeSanitaire_FichierSan'><span id='code_fiche' > </span> ".$CodeSanitaire."</span>
					</div>
					<div class='carte_FichierSan'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_sanitaire' value='".$CodeSanitaire."'>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='nomAcc_lable_san'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".stripslashes($nomAcc)."</a></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CategorieTest_lable_san'></span></td><td width='30%' class='res_acc'>".$CategorieTest."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CodeAcc_lable_san'></span></td><td class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".$CodeAcc."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='MatTeste_lable_san'></span></td><td class='res_acc'>".$MatTeste."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='PathogeneTeste_lable_san'></span></td><td width='30%' class='res_acc'>".$PathogeneTeste."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CodeEmplacem_lable_san'></span></td><td width='30%' class='res_acc'>".$CodeEmplacem."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='ResultatTest_lable_san'></span></td><td class='res_acc'>".$ResultatTest."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='SoucheTestee_lable_san'></span></td><td class='res_acc'>".$SoucheTestee."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Laboratoire_lable_san'></span></td><td width='30%' class='res_acc'>".$Laboratoire."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='DateTest_lable_san'></span></td><td width='30%' class='res_acc'>".$DateTest."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Partenaire_lable_san'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodePartenaire."\",\"partenaire\")' class='lien_fichier'>".stripslashes($Partenaire)."</a></td>
							</tr>
						</table>
					</div>
				</div>";
			break;
			case("genetique"):
				echo "
				<div id='FichierGen'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Genetique\",\"".$Code."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Genetique.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Genetique\",\"".$Code."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Genetique.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierGen'>
						<img src='images/accession_fichier.png' />
						<span id='gen_FichierGen'></span>&nbsp &nbsp
						<span id='Code_FichierGen'><span id='code_fiche' > </span> ".$Code."</span>
					</div>
					<div class='carte_FichierGen'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_genetique' value='".$Code."'>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='nomAcc_lable_gen'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".stripslashes($nomAcc)."</a></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='IdStockADN_lable_gen'></span></td><td width='30%' class='res_acc'>".$IdStockADN."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CodeAcc_lable_gen'></span></td><td class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".$CodeAcc."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='IdProtocolePCR_lable_gen'></span></td><td class='res_acc'>".$IdProtocolePCR."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Marqueur_lable_gen'></span></td><td width='30%' class='res_acc'>".$Marqueur."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='DatePCR_lable_gen'></span></td><td width='30%' class='res_acc'>".$DatePCR."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='ValeurCodee1_lable_gen'></span></td><td class='res_acc'>".$ValeurCodee1."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='DateRun_lable_gen'></span></td><td class='res_acc'>".$DateRun."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='ValeurCodee2_lable_gen'></span></td><td class='res_acc'>".$ValeurCodee2."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Partenaire_lable_gen'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodePartenaire."\",\"partenaire\")' class='lien_fichier'>".stripslashes($Partenaire)."</a></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='EmplacemRecolte_lable_gen'></span></td><td width='30%' class='res_acc'>".$EmplacemRecolte."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='SouchePrelev_lable_gen'></span></td><td width='30%' class='res_acc'>".$SouchePrelev."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='DateRecolte_lable_gen'></span></td><td width='30%' class='res_acc'>".$DateRecolte."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='IdProtocoleRecolte_lable_gen'></span></td><td width='30%' class='res_acc'>".$IdProtocoleRecolte."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='TypeOrgane_lable_gen'></span></td><td width='30%' class='res_acc'>".$TypeOrgane."</td>
								<td colspan='2'></td>
							</tr>
						</table>
					</div>
				</div>";
			break;
			case("bibliographie"):
				echo "
				<div id='FichierBib'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Bibliographie\",\"".$Code."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Bibliographie.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Bibliographie\",\"".$Code."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Bibliographie.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierBib'>
						<img src='images/accession_fichier.png' />
						<span id='bib_FichierBib'></span>&nbsp &nbsp
						<span id='Code_FichierBib'><span id='code_fiche' > </span> ".$Code."</span>
					</div>
					<div class='carte_FichierBib'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_bibliographique' value='".$Code."'>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='nomVar_lable_bib'></span></td><td width='30%' class='res_acc'><a onclick='$.passerFicher(\"".$CodeVar."\",\"variete\")' class='lien_fichier'>".stripslashes($nomVar)."</a></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='VolumeCitation_lable_bib'></span></td><td width='30%' class='res_acc'>".$VolumeCitation."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='nomAcc_lable_bib'></span></td><td class='res_acc'><a onclick='$.passerFicher(\"".$CodeAcc."\",\"accession\")' class='lien_fichier'>".stripslashes($nomAcc)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='PagesCitation_lable_bib'></span></td><td class='res_acc'>".$PagesCitation."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='TypeDoc_lable_bib'></span></td><td width='30%' class='res_acc'>".$TypeDoc."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='AuteurCitation_lable_bib'></span></td><td width='30%' class='res_acc'>".$AuteurCitation."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Title_lable_bib'></span></td><td class='res_acc'>".stripslashes($Title)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NomVigneCite_lable_bib'></span></td><td class='res_acc'>".stripslashes($NomVigneCite)."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Author_lable_bib'></span></td><td class='res_acc'>".$Author."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Year_lable_bib'></span></td><td width='30%' class='res_acc'>".$Year."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Edition_lable_bib'></span></td><td width='30%' class='res_acc'>".$Edition."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Publisher_lable_bib'></span></td><td width='30%' class='res_acc'>".stripslashes($Publisher)."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='PlacePublished_lable_bib'></span></td><td width='30%' class='res_acc'>".stripslashes($PlacePublished)."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='ISBN_lable_bib'></span></td><td width='30%' class='res_acc'>".$ISBN."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Language_lable_bib'></span></td><td width='30%' class='res_acc'>".$Language."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NumberOfVolumes_lable_bib'></span></td><td width='30%' class='res_acc'>".$NumberOfVolumes."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='PagesDoc_lable_bib'></span></td><td width='30%' class='res_acc'>".$PagesDoc."</td>
								<td colspan='2'></td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CallNumber_lable_bib'></span></td><td width='30%' class='res_acc'>".$CallNumber."</td>
								<td colspan='2'></td>
							</tr>
						</table>
					</div>
				</div>";
			break;
			case("partenaire"):
				echo "
				<div id='FichierPar'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Partenaire\",\"".$CodePartenaire."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Partenaire.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Partenaire\",\"".$CodePartenaire."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Partenaire.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierPar'>
						<img src='images/accession_fichier.png' />
						<span id='par_FichierPar'></span>&nbsp &nbsp
						<span id='CodePartenaire_FichierPar'><span id='code_fiche' > </span> ".$CodePartenaire."</span>
					</div>
					<div class='carte_FichierPar'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_partenaire' value='".$CodePartenaire."'>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='NomPartenaire_lable_par'></span></td><td width='30%' class='res_acc'>".stripslashes($NomPartenaire)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='ResponsablesPartenaire_lable_par'></span></td><td width='30%' class='res_acc'>".$ResponsablesPartenaire."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='SiglePartenaire_lable_par'></span></td><td class='res_acc'>".$SiglePartenaire."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='TelephonePartenaire_lable_par'></span></td><td class='res_acc'>".$TelephonePartenaire."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='SectionRegionaleENTAV_lable_par'></span></td><td width='30%' class='res_acc'>".stripslashes($SectionRegionaleENTAV)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='Email_lable_par'></span></td><td width='30%' class='res_acc'>".$Email."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='RegionPartenaire_lable_par'></span></td><td class='res_acc'>".stripslashes($RegionPartenaire)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='AdressePartenaire_lable_par'></span></td><td class='res_acc'>".stripslashes($AdressePartenaire)."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='DepartPartenaire_lable_par'></span></td><td class='res_acc'>".stripslashes($DepartPartenaire)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CodPostPartenaire_lable_par'></span></td><td width='30%' class='res_acc'>".$CodPostPartenaire."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CommunePartenaire_lable_par'></span></td><td width='30%' class='res_acc'>".stripslashes($CommunePartenaire)."</td>
							</tr>
						</table>
					</div>
				</div>";
			break;
			case("site"):
				echo "
				<div id='FichierSite'>";
				if($_SESSION['ProfilPersonne']=='A' || $_SESSION['ProfilPersonne']=='B'){
					echo"
						<div id='function_ligne'>
						<a id='modifier_fiche'><img src='images/Modifier_Fiche.png'  width='25' height='25'/></a>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Site\",\"".$CodeSite."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Site.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}else{
					echo"
						<div id='function_ligne'>
						<a id='selection_fiche'><img onclick='$.selectionFiche(\"Site\",\"".$CodeSite."\")' src='images/partenaire_selection.png'  width='25' height='25'/></a>
						<a id='export_pdf_fiche' href='php/ExportPDF/ExportPDF_Site.php' target=_blank><img src='images/partenaire_pdf.png'  width='25' height='25'/></a>
					</div>";
				}
					echo "<div class='title_FichierSite'>
						<img src='images/accession_fichier.png' />
						<span id='site_FichierSite'></span>&nbsp &nbsp
						<span id='CodeSite_FichierSite'><span id='code_fiche'></span> ".$CodeSite."</span>
					</div>
					<div class='carte_FichierSite'>
						<table width='100%'>
							<tr>
								<input type='hidden' id='fichier_code_site' value='".$CodeSite."'>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='RegionSite_lable_site'></span></td><td width='30%' class='res_acc'>".stripslashes($RegionSite)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='SecRegENTAV_lable_site'></span></td><td width='30%' class='res_acc'>".stripslashes($SecRegENTAV)."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='DepartSite_lable_site'></span></td><td class='res_acc'>".stripslashes($DepartSite)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='ProprietaireSite_lable_site'></span></td><td class='res_acc'>".stripslashes($ProprietaireSite)."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CommuneSite_lable_site'></span></td><td width='30%' class='res_acc'>".stripslashes($CommuneSite)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='ExploitSite_lable_site'></span></td><td width='30%' class='res_acc'>".$ExploitSite."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='CodPostSite_lable_site'></span></td><td class='res_acc'>".$CodPostSite."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='ResponsSite_lable_site'></span></td><td class='res_acc'>".$ResponsSite."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='AdresseSite_lable_site'></span></td><td class='res_acc'>".stripslashes($AdresseSite)."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='TelSite_lable_site'></span></td><td width='30%' class='res_acc'>".$TelSite."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='LatSite_lable_site'></span></td><td class='res_acc'>".$LatSite."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='FaxSite_lable_site'></span></td><td width='30%' class='res_acc'>".$FaxSite."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='LongSite_lable_site'></span></td><td class='res_acc'>".$LongSite."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='MailSite_lable_site'></span></td><td width='30%' class='res_acc'>".$MailSite."</td>
							</tr>
							<tr>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='AltSite_lable_site'></span></td><td class='res_acc'>".$AltSite."</td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='AnneeCreationSite_lable_site'></span></td><td width='30%' class='res_acc'>".$AnneeCreationSite."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='VarMajoritairesSite_lable_site'></span></td><td width='30%' class='res_acc'>".$VarMajoritairesSite."</td>
							</tr>
							<tr>
								<td colspan='2'></td>
								<td width='17%' class='lable_carte_acc' ><img src='images/poin_par.png' width='10' height='10'/>  <span id='PresentationSite_lable_site'></span></td><td width='30%' class='res_acc'>".stripslashes($PresentationSite)."</td>
							</tr>
						</table>
					</div>
				</div>";
			break;
		}
	}

?>