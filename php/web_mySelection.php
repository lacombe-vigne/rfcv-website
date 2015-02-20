<?php
	session_start();
	include_once('includes/class_DAO_Bibilotheque.php');

	$DAO =new BibliothequeDAO();
	$vide=0;
	echo '<div id="mySelection">
			<img id="title_image" src="images/my_selection.png" alt="Search" width="40" height="40"><h3 id="title_myselection"></h3>';
	if(count($_SESSION['selection']['Espece'])!=0){
		$Espece_Contents=array();
		foreach($_SESSION['selection']['Espece'] as $value){
			$content=$DAO->espece_selection($value);
			array_push($Espece_Contents,$content);
		}
		// $data=json_encode($Espece_Contents);
		$pagetotal=ceil(count($_SESSION['selection']['Espece'])/20);
		echo '<div id="Espece" >
				<div id="title_Espece" onclick="$.click_Espece_selection()" class="vide">
					<span><a id="click_Espece_selection" ></a>&nbsp &nbsp('.count($_SESSION['selection']['Espece']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Espece" style="display: none;">
					<div id="list_avance_esp">
						<fieldset id="espece_fieldset_avance">
							<div class="function_ligne_espece">
								<table width="100%" id="table_espece_function">
									<tr>
										<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
										<td width="65%"></td>
										<td width="15%"><select id="select_pagesize_espece_selection" onchange="$.select_change_selection_espece();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
										if($pagetotal>1){
											echo'
										<td><img id="premier_page_espece" class="button_nonclick" src="images/previous1.png" width="25" height="25" onclick="$.search_page_espece_selection(1);"/><img id="precedent_page_espece" src="images/left13.png" width="25" height="25"  class="button_nonclick" onclick="$.search_page_espece_selection(1);"/>1/'.$pagetotal.'<img id="suivant_page_espece" src="images/right20.png" width="25" height="25" onclick="$.search_page_espece_selection(2);"/><img id="fini_page_espece" src="images/change.png" width="25" height="25" onclick="$.search_page_espece_selection('.$pagetotal.',\'espece\');"/></td>';
										}else{
											echo'
										<td><img id="premier_page_espece" class="button_nonclick" src="images/previous1.png" width="25" height="25" onclick="$.search_page_espece_selection(1);"/><img id="precedent_page_espece" src="images/left13.png" width="25" height="25"  class="button_nonclick" onclick="$.search_page_espece_selection(1);"/>1/'.$pagetotal.'<img id="suivant_page_espece"  class="button_nonclick" src="images/right20.png" width="25" height="25" onclick="$.search_page_espece_selection(2);"/><img id="fini_page_espece" src="images/change.png" width="25" height="25"   class="button_nonclick" onclick="$.search_page_espece_selection('.$pagetotal.',\'espece\');"/></td>';
										}
									echo'
										
									</tr>
								</table>
							</div>
							<div id="title_ligne_espece">
								<table width="100%" id="table_espece_titles">
									<th width="15%"><span id="CodeEspece"></span></th>
									<th width="35%"><span id="NomEspece"></span></th>
									<th width="25%"><span id="Botaniste"></span></th>
									<th ><span id="Tronc"></span></th>
									<th width="5%"><span id="Export_pdf"></span></th>
									<th width="5%"><span id="Suppr_selection"></span></th>
								</table>
							</div>
							<table id="contents_ligne_espece" width=100%>
								<input id="espece_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Espece_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
								<tr>
									<td width="13%"  onclick="$.passerFicher(\''.$value['codeEspece'].'\',\'espece\');return false;">'.$value['codeEspece'].'</td>
									<td width="35%"  onclick="$.passerFicher(\''.$value['codeEspece'].'\',\'espece\');return false;">'.$value['nomEspece'].'</td>
									<td width="25%"  onclick="$.passerFicher(\''.$value['codeEspece'].'\',\'espece\');return false;">'.$value['botaniste'].'</td>
									<td  onclick="$.passerFicher(\''.$value['codeEspece'].'\',\'espece\');return false;">'.$value['tronc'].'</td>
									<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
									<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['codeEspece'].'\',\'espece\')" /></td>
								</tr>';
								}
							echo'
							</table>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'espece\')"></a>
					</div>
				</div>
				
			</div>';
	}else{
		$vide++;
	}
	
	if(count($_SESSION['selection']['Variete'])!=0){
		$Variete_Contents=array();
		foreach($_SESSION['selection']['Variete'] as $value){
			$content=$DAO->variete_selection($value);
			array_push($Variete_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Variete'])/20);
		echo '<div id="Variete" >
				<div id="title_Variete"  onclick="$.click_Variete_selection('.$Variete_Contents.')" class="vide">
					<span><a id="click_Variete_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Variete']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Variete_selection" style="display: none;">
					<div id="list1_cate_esp">
						<fieldset id="list1_fieldset">
							<div id="contents_variete">
								<div class="function_ligne_variete">
									<table width="100%" id="table_variete_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="70%"></td>
											<td ><select id="select_pagesize_variete_selection" onchange="$.select_change_selection_listvariete();"><option value="20" >20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal>1){
											echo'
											<td width="15%"><img id="premier_page_variete" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listVariete(1);"/><img id="precedent_page_variete"  class="button_nonclick" src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listVariete(1)"/>1/'.$pagetotal.'<img id="suivant_page_variete" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listVariete(2);"/><img id="fini_page_variete" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listVariete('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_variete"  class="button_nonclick" src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listVariete(1);"/><img id="precedent_page_variete" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listVariete(1)"/>1/'.$pagetotal.'<img id="suivant_page_variete" class="button_nonclick"  src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listVariete(2);"/><img id="fini_page_variete" src="images/change.png" width="25" class="button_nonclick"  height="25" onclick="$.search_page_selection_listVariete('.$pagetotal.');"/></td>';
											}
										echo'
										</tr>
									</table>
								</div>
								<div id="title_ligne_variete">
									<table width="100%" id="table_variete_titles">
										<th width="5%"><span id="CodeVariete"></span></th>
										<th><span id="NomVariete"></span></th>
										<th width="17%"><span id="SynoMajeur"></span></th>
										<th width="8%"><span id="Utilite"></span></th>
										<th width="8%"><span id="CouleurPellicule"></span></th>
										<th width="8%"><span id="Saveur"></span></th>
										<th width="8%"><span id="Pepins"></span></th>
										<th width="8%"><span id="Sexe"></span></th>
										<th width="8%"><span id="PaysOrigine"></span></th>
										<th width="5%"><span id="CodeEsp"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table id="contents_ligne_variete">
								<input id="variete_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Variete_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="4%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['codeVar'].'</td>
										<td  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['nomVar'].'</td>
										<td width="17%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['SynoMajeur'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['utilite'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['couleurPel'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['saveur'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['pepins'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['sexe'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['paysorigine'].'</td>
										<td width="5%"  onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">'.$value['CodeEsp'].'</td>
										<td width="5%" onclick="$.passerFicher(\''.$value['codeVar'].'\',\'variete\');return false;">...</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['codeVar'].'\',\'variete\')" /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'variete\')"></a>
					</div>
				</div>
			</div>';
	}else{
		$vide++;
	}

	if(count($_SESSION['selection']['Accession'])!=0){
		$Accession_Contents=array();
		foreach($_SESSION['selection']['Accession'] as $value){
			$content=$DAO->accession_selection($value);
			array_push($Accession_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Accession'])/20);
		echo '<div id="Accession" >
				<div id="title_Accession"  onclick="$.click_Accession_selection('.$Accession_Contents.')" class="vide">
					<span><a id="click_Accession_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Accession']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Accession_selection" style="display: none;">
					<div id="list2_cate_esp">
						<fieldset id="list2_fieldset">
							<div id="contents_accession">
								<div class="function_ligne_accession">
									<table width="100%" id="table_accession_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="70%"></td>
											<td ><select id="select_pagesize_accession_selection" onchange="$.select_change_selection_listaccession();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal<=1){
											echo'
											<td width="15%"><img id="premier_page_accession"  class="button_nonclick" src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listAccession(1);"/><img id="precedent_page_accession"  class="button_nonclick" src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listAccession(1);"/>1/'.$pagetotal.'<img id="suivant_page_accession" src="images/right20.png" class="button_nonclick"  width="25" height="25" onclick="$.search_page_selection_listAccession(2);"/><img id="fini_page_accession" src="images/change.png" width="25"  class="button_nonclick" height="25" onclick="$.search_page_selection_listAccession('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_accession"  class="button_nonclick" src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listAccession(1);"/><img id="precedent_page_accession"  class="button_nonclick" src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listAccession(1);"/>1/'.$pagetotal.'<img id="suivant_page_accession" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listAccession(2);"/><img id="fini_page_accession" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listAccession('.$pagetotal.');"/></td>';
											}
										echo'
										</tr>
									</table>
								</div>
								<div id="title_ligne_accession">
									<table width="100%" id="table_accession_titles">
										<th width="10%"><span id="CodeIntro"></span></th>
										<th><span id="NomIntro_acc"></span></th>
										<th width="17%" ><span id="NomVariete_acc_FichierEsp"></span></th>
										<th width="20%" ><span id="Partenaire_FichierEsp"></span></th>
										<th width="12%" ><span id="PaysProvenance"></span></th>
										<th width="12%" ><span id="CommuneProvenance"></span></th>
										<th width="8%" ><span id="AnneeEntree"></span></th>
										<th width="8%" ><span id="CodeVariete_selection_accession"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_accession">
								<input id="accession_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Accession_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeIntro'].'\',\'accession\');return false;">'.$value['codeIntro'].'</td>
										<td  onclick="$.passerFicher(\''.$value['codeIntro'].'\',\'accession\');return false;">'.$value['NomIntro'].'</td>
										<td width="17%"  onclick="$.passerFicher(\''.$value['codeIntro'].'\',\'accession\');return false;">'.$value['nomVar'].'</td>
										<td width="20%"  onclick="$.passerFicher(\''.$value['codeIntro'].'\',\'accession\');return false;">'.$value['Partenaire'].'</td>
										<td width="12%"  onclick="$.passerFicher(\''.$value['codeIntro'].'\',\'accession\');return false;">'.$value['PaysProvenance'].'</td>
										<td width="12%"  onclick="$.passerFicher(\''.$value['codeIntro'].'\',\'accession\');return false;">'.$value['communeProvenance'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeIntro'].'\',\'accession\');return false;">'.$value['AnneeEntree'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['codeIntro'].'\',\'accession\');return false;">'.$value['CodeVar'].'</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['codeIntro'].'\',\'accession\')"  /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'accession\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
		
	if(count($_SESSION['selection']['Emplacement'])!=0){
		$Emplacement_Contents=array();
		foreach($_SESSION['selection']['Emplacement'] as $value){
			$content=$DAO->emplacement_selection($value);
			array_push($Emplacement_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Emplacement'])/20);
		echo '<div id="Emplacement" >
				<div id="title_Emplacement" onclick="$.click_Emplacement_selection('.$Emplacement_Contents.')" class="vide">
					<span><a id="click_Emplacement_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Emplacement']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Emplacement_selection" style="display: none;">
					<div id="list5_cate_var">
						<fieldset id="list5_fieldset_FichierVar">
							<div id="contents_emplacement">
								<div class="function_ligne_emplacement">
									<table width="100%" id="table_emplacement_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="70%"></td>
											<td ><select id="select_pagesize_emplacement_selection" onchange="$.select_change_selection_listemplacement();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal<=1){
											echo'
											<td width="15%"><img id="premier_page_emplacement" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listEmplacement(1);"/><img id="precedent_page_emplacement"  class="button_nonclick" src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listEmplacement(1);"/>1/'.$pagetotal.'<img id="suivant_page_emplacement" src="images/right20.png"  class="button_nonclick" width="25" height="25" onclick="$.search_page_selection_listEmplacement(2);"/><img id="fini_page_emplacement" src="images/change.png" width="25" height="25" class="button_nonclick"  onclick="$.search_page_selection_listEmplacement('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_emplacement" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listEmplacement(1);"/><img id="precedent_page_emplacement"  class="button_nonclick" src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listEmplacement(1);"/>1/'.$pagetotal.'<img id="suivant_page_emplacement" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listEmplacement(2);"/><img id="fini_page_emplacement" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listEmplacement('.$pagetotal.');"/></td>';
											}
										echo '
										</tr>
									</table>
								</div>
								<div id="title_ligne_emplacement">
									<table width="100%" id="table_emplacement_titles">
										<th width="25%"><span id="CodeEmplacem_FichierVar"></span></th>
										<th  width="8%" ><span id="CodeSite_FichierVar"></span></th>
										<th width="8%" ><span id="Parcelle_FichierVar"></span></th>
										<th width="8%" ><span id="Rang_FichierVar"></span></th>
										<th width="15%" ><span id="Anneeplantation_FichierVar"></span></th>
										<th ><span id="NomIntro_selection_emplacement"></span></th>
										<th width="10%" ><span id="CodeIntro_selection_emplacement"></span></th>
										<th width="5%" ><span id="CodeVar_selection_emplacement"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_emplacement">
								<input id="emplacement_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Emplacement_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="23%"  onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">'.$value['CodeEmplacem'].'</td>
										<td width="8%" onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">'.$value['CodeSite'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">'.$value['Parcelle'].'</td>
										<td width="8%"  onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">'.$value['Rang'].'</td>
										<td width="15%"  onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">'.$value['AnneePlantation'].'</td>
										<td   onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">'.$value['NomIntro'].'</td>
										<td width="10%" onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">'.$value['CodeIntro'].'</td>
										<td width="10%" onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">'.$value['CodeVar'].'</td>
										<td width="5%" onclick="$.passerFicher(\''.$value['CodeEmplacem'].'\',\'emplacement\');return false;">...</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['CodeEmplacem'].'\',\'emplacement\')"   /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'emplacement\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	
	if(count($_SESSION['selection']['Sanitaire'])!=0){
		$Sanitaire_Contents=array();
		foreach($_SESSION['selection']['Sanitaire'] as $value){
			$content=$DAO->sanitaire_selection($value);
			array_push($Sanitaire_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Sanitaire'])/20);
		echo '<div id="Sanitaire" >
				<div id="title_Sanitaire" onclick="$.click_Sanitaire_selection('.$Sanitaire_Contents.')" class="vide">
					<span><a id="click_Sanitaire_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Sanitaire']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Sanitaire_selection" style="display: none;">
					<div id="list6_cate_var">
						<fieldset id="list6_fieldset_FichierVar">
							<div id="contents_sanitaire">
								<div class="function_ligne_sanitaire">
									<table width="100%" id="table_sanitaire_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="60%"></td>
											<td ><select id="select_pagesize_sanitaire_selection" onchange="$.select_change_selection_listsanitaire();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal<=1){
											echo'
											<td width="15%"><img id="premier_page_sanitaire" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listSanitaire(1);"/><img id="precedent_page_sanitaire" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listSanitaire(1);"/>1/'.$pagetotal.'<img id="suivant_page_sanitaire" class="button_nonclick"  src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listSanitaire(2);"/><img id="fini_page_sanitaire" src="images/change.png" width="25" class="button_nonclick"  height="25" onclick="$.search_page_selection_listSanitaire('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_sanitaire" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listSanitaire(1);"/><img id="precedent_page_sanitaire" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listSanitaire(1);"/>1/'.$pagetotal.'<img id="suivant_page_sanitaire" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listSanitaire(2);"/><img id="fini_page_sanitaire" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listSanitaire('.$pagetotal.');"/></td>';
											}
										echo'
										</tr>
									</table>
								</div>
								<div id="title_ligne_sanitaire">
									<table width="100%" id="table_sanitaire_titles"><th width="7%"><span id="IdTest_FichierVar"></span></th>
										<th  width="10%" ><span id="CodeIntro_sanitaire_FichierVar"></span></th>
										<th  width="10%" ><span id="Pathogene_sanitaire_FichierVar"></span></th>
										<th width="10%" ><span id="CategorieTest_FichierVar"></span></th>
										<th width="10%" ><span id="ResultatTest_FichierVar"></span></th>
										<th width="10%" ><span id="Laboratoire_FichierVar"></span></th>
										<th width="10%" ><span id="CodeVar_selection_sanitaire"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_sanitaire">
								<input id="sanitaire_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Sanitaire_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="5%"  onclick="$.passerFicher(\''.$value['IdTest'].'\',\'sanitaire\');return false;">'.$value['IdTest'].'</td>
										<td width="10%" onclick="$.passerFicher(\''.$value['IdTest'].'\',\'sanitaire\');return false;">'.$value['CodeIntro'].'</td>
										<td width="10%"  onclick="$.passerFicher(\''.$value['IdTest'].'\',\'sanitaire\');return false;">'.$value['NomTest'].'</td>
										<td width="10%"  onclick="$.passerFicher(\''.$value['IdTest'].'\',\'sanitaire\');return false;">'.$value['CategorieTest'].'</td>
										<td width="10%"  onclick="$.passerFicher(\''.$value['IdTest'].'\',\'sanitaire\');return false;">'.$value['ResultatTest'].'</td>
										<td width="10%"  onclick="$.passerFicher(\''.$value['IdTest'].'\',\'sanitaire\');return false;">'.$value['Laboratoire'].'</td>
										<td width="10%"  onclick="$.passerFicher(\''.$value['IdTest'].'\',\'sanitaire\');return false;">'.$value['CodeVar'].'</td>
										<td width="5%" onclick="$.passerFicher(\''.$value['IdTest'].'\',\'sanitaire\');return false;">...</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['IdTest'].'\',\'sanitaire\')"   /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'sanitaire\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	if(count($_SESSION['selection']['Morphologique'])!=0){
		$Morphologique_Contents=array();
		foreach($_SESSION['selection']['Morphologique'] as $value){
			$content=$DAO->morphologique_selection($value);
			array_push($Morphologique_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Morphologique'])/20);
		echo '<div id="Morphologique" >
				<div id="title_Morphologique" onclick="$.click_Morphologique_selection('.$Morphologique_Contents.')" class="vide">
					<span><a id="click_Morphologique_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Morphologique']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Morphologique_selection" style="display: none;">
					<div id="list3_cate_var">
						<fieldset id="list3_fieldset_FichierVar">
							<div id="contents_description">
								<div class="function_ligne_description">
									<table width="100%" id="table_description_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="60%"></td>
											<td ><select id="select_pagesize_description_selection" onchange="$.select_change_selection_listdescription();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal>1){
											echo'
											<td width="15%"><img id="premier_page_description" class="button_nonclick"   src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listDescription(1);"/><img id="precedent_page_description"  class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listDescription(1);"/>1/'.$pagetotal.'<img id="suivant_page_description" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listDescription(2);"/><img id="fini_page_description" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listDescription('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_description" class="button_nonclick"   src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listDescription(1);"/><img id="precedent_page_description"  class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listDescription(1);"/>1/'.$pagetotal.'<img id="suivant_page_description" src="images/right20.png" width="25" height="25" class="button_nonclick"   onclick="$.search_page_selection_listDescription(2);"/><img id="fini_page_description" class="button_nonclick"   src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listDescription('.$pagetotal.');"/></td>';
											}
										echo '			
										</tr>
									</table>
								</div>
								<div id="title_ligne_description">
									<table width="100%" id="table_description_titles">
										<th width="15%"><span id="CodeOIV"></span></th>
										<th><span id="LibelleDescrip"></span></th>
										<th width="20%" ><span id="LibelleCritere"></span></th>
										<th width="15%"><span id="CaractereOIV"></span></th>
										<th width="5%"><span id="CodeAcc_selection_morphologieque"></span></th>
										<th width="5%"><span id="CodeVar_selection_morphologique"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_description">
								<input id="morphologique_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Morphologique_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="13%"  onclick="$.passerFicher(\''.$value['id'].'\',\'morphologique\');return false;">'.$value['Code'].'</td>
										<td onclick="$.passerFicher(\''.$value['id'].'\',\'morphologique\');return false;">'.$value['Description'].'</td>
										<td width="20%"  onclick="$.passerFicher(\''.$value['id'].'\',\'morphologique\');return false;">'.$value['Critaire'].'</td>
										<td width="15%"  onclick="$.passerFicher(\''.$value['id'].'\',\'morphologique\');return false;">'.$value['CaractereOIV'].'</td>
										<td width="20%"  onclick="$.passerFicher(\''.$value['id'].'\',\'morphologique\');return false;">'.$value['CodeVar'].'</td>
										<td width="15%"  onclick="$.passerFicher(\''.$value['id'].'\',\'morphologique\');return false;">'.$value['CodeAcc'].'</td>
										<td width="5%" onclick="$.passerFicher(\''.$value['id'].'\',\'morphologique\');return false;">...</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['id'].'\',\'morphologique\')"/></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'morphologique\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	
	if(count($_SESSION['selection']['Aptitude'])!=0){
		$Aptitude_Contents=array();
		foreach($_SESSION['selection']['Aptitude'] as $value){
			$content=$DAO->aptitude_selection($value);
			array_push($Aptitude_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Aptitude'])/20);
		echo '<div id="Aptitude" >
				<div id="title_Aptitude" onclick="$.click_Aptitude_selection('.$Aptitude_Contents.')" class="vide">
					<span><a id="click_Aptitude_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Aptitude']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Aptitude_selection" style="display: none;">
					<div id="list2_cate_var">
						<fieldset id="list2_fieldset_FichierVar">
							<div id="contents_aptitude">
								<div class="function_ligne_aptitude">
									<table width="100%" id="table_aptitude_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="70%"></td>
											<td ><select id="select_pagesize_aptitude_selection" onchange="$.select_change_selection_listaptitude();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal>1){
											echo'
											<td width="15%"><img id="premier_page_aptitude" class="button_nonclick"   src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listAptitude(1);"/><img id="precedent_page_aptitude" class="button_nonclick"   src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listAptitude(1);"/>1/'.$pagetotal.'<img id="suivant_page_aptitude" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listAptitude(2);"/><img id="fini_page_aptitude" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listAptitude('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_aptitude" class="button_nonclick"   src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listAptitude(1);"/><img id="precedent_page_aptitude" class="button_nonclick"   src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listAptitude(1);"/>1/'.$pagetotal.'<img id="suivant_page_aptitude" class="button_nonclick"   src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listAptitude(2);"/><img id="fini_page_aptitude" src="images/change.png" class="button_nonclick"   width="25" height="25" onclick="$.search_page_selection_listAptitude('.$pagetotal.');"/></td>';
											}
										echo '
										</tr>
									</table>
								</div>
								<div id="title_ligne_aptitude">
									<table width="100%" id="table_aptitude_titles">
										<th width="7%"><span id="CodeAptitude"></span></th>
										<th width="22%" ><span id="AptitudeMesure"></span></th>
										<th width="7%" ><span id="ValeurCaractNum"></span></th>
										<th><span id="UniteMesure"></span></th>
										<th width="15%" ><span id="Ponderation"></span></th>
										<th width="10%" ><span id="Date_aptitude"></span></th>
										<th width="10%" ><span id="CodePartenaire"></span></th>
										<th width="10%" ><span id="CodeAcc_selection_aptitude"></span></th>
										<th width="10%" ><span id="CodeVar_selection_aptitude"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_aptitude">
								<input id="aptitude_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Aptitude_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									if($value['date']!='\/\/'){
										$date_aptitude= $value['date'];
									}else{
										$date_aptitude="";
									}
									echo '
									<tr>
										<td width="5%"  onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$value['CodeDonnee'].'</td>
										<td width="22%"  onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$value['AptitudeMesure'].'</td>
										<td width="7%" onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$value['ValeurMesure'].'</td>
										<td   onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$value['UniteMesure'].'</td>
										<td width="15%"  onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$value['PonderationValeur'].'</td>
										<td width="10%"  onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$date_aptitude.'</td>
										<td width="10%"  onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$value['PartenaireMesure'].'</td>
										<td width="5%"  onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$value['CodeAcc'].'</td>
										<td width="5%"  onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">'.$value['CodeVar'].'</td>
										<td width="5%" onclick="$.passerFicher(\''.$value['CodeDonnee'].'\',\'aptitude\');return false;">...</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['CodeDonnee'].'\',\'aptitude\')"   /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'aptitude\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	if(count($_SESSION['selection']['Phototheque'])!=0){
		$Phototheque_Contents=array();
		foreach($_SESSION['selection']['Phototheque'] as $value){
			// $content=$DAO->phototheque_selection($value);
			// array_push($Phototheque_Contents,$content);
		}
		echo '<div id="Phototheque" >
				<div id="title_Phototheque" onclick="$.click_Phototheque_selection('.$Phototheque_Contents.')" class="vide">
					<span><a id="click_Phototheque_selection">Phototheque</a>&nbsp &nbsp('.count($_SESSION['selection']['Phototheque']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Phototheque" style="display: none;">
				</div>
			</div>';
	}else{
		$vide++;
	}
	
	if(count($_SESSION['selection']['Genetique'])!=0){
		$Genetique_Contents=array();
		foreach($_SESSION['selection']['Genetique'] as $value){
			$content=$DAO->genetique_selection($value);
			array_push($Genetique_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Genetique'])/20);
		echo '<div id="Genetique" >
				<div id="title_Genetique" onclick="$.click_Genetique_selection('.$Genetique_Contents.')" class="vide">
					<span><a id="click_Genetique_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Genetique']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Genetique_selection" style="display: none;">
					<div id="list9_cate_var">
						<fieldset id="list9_fieldset_FichierVar">
							<div id="contents_genetique">
								<div class="function_ligne_genetique">
									<table width="100%" id="table_genetique_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="70%"></td>
											<td ><select id="select_pagesize_genetique_selection" onchange="$.select_change_selection_listgenetique();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal>1){
											echo'
											<td width="15%"><img id="premier_page_genetique" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listGenetique(1);"/><img id="precedent_page_genetique"  class="button_nonclick" src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listGenetique(1);"/>1/'.$pagetotal.'<img id="suivant_page_genetique" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listGenetique(2);"/><img id="fini_page_genetique" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listGenetique('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_genetique" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listGenetique(1);"/><img id="precedent_page_genetique" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listGenetique(1);"/>1/'.$pagetotal.'<img id="suivant_page_genetique" class="button_nonclick"  src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listGenetique(2);"/><img id="fini_page_genetique" class="button_nonclick"  src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listGenetique('.$pagetotal.');"/></td>';
											}
										echo'
										</tr>
									</table>
								</div>
								<div id="title_ligne_genetique">
									<table width="100%" id="table_genetique_titles">
										<th width="25%"><span id="IdAnalyse_FichierVar"></span></th>
										<th  width="19%" ><span id="Marqueur_genetique_FichierVar"></span></th>
										<th  ><span id="ValeurCodee1_FichierVar"></span></th>
										<th width="14%" ><span id="ValeurCodee2_genetique_FichierVar"></span></th>
										<th width="14%" ><span id="CodePartenaire_FichierVar"></span></th>
										<th width="14%"><span id="DatePCR_FichierVar"></span></th>
										<th width="5%" ><span id="CodeAcc_selection_genetique"></span></th>
										<th width="5%"><span id="CodeVar_selection_genetique"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection" ></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_genetique">
								<input id="genetique_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Genetique_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="23%"  onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">'.$value['Code'].'</td>
										<td width="19%" onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">'.$value['Margueur'].'</td>
										<td   onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">'.$value['Allele1'].'</td>
										<td width="14%"  onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">'.$value['Allele2'].'</td>
										<td width="14%"  onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">'.$value['Partenaire'].'</td>
										<td width="14%"  onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">'.$value['Date'].'</td>
										<td width="5%"  onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">'.$value['CodeAcc'].'</td>
										<td width="5%"  onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">'.$value['CodeVar'].'</td>
										<td width="5%" onclick="$.passerFicher(\''.$value['Code'].'\',\'genetique\');return false;">...</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['Code'].'\',\'genetique\')"   /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'genetique\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	if(count($_SESSION['selection']['Documentation'])!=0){
		$Documentation_Contents=array();
		foreach($_SESSION['selection']['Documentation'] as $value){
			$content=$DAO->documentation_selection($value);
			array_push($Documentation_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Documentation'])/20);
		echo '<div id="Documentation" >
				<div id="title_Documentation" onclick="$.click_Documentation_selection('.$Documentation_Contents.')" class="vide">
					<span><a id="click_Documentation_selection" ></a>&nbsp &nbsp('.count($_SESSION['selection']['Documentation']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Documentation_selection" style="display: none;">
					<div id="doc_cate_var">
						<fieldset id="doc_cate_var_FichierVar">
							<div id="contents_doc">
								<div class="function_ligne_doc">
									<table width="100%" id="table_doc_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="70%"></td>
											<td ><select id="select_pagesize_documentation_selection" onchange="$.select_change_selection_listdoc();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal>1){
											echo'
											<td width="15%"><img id="premier_page_doc" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listDoc(1);"/><img id="precedent_page_doc" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listDoc(1);"/>1/'.$pagetotal.'<img id="suivant_page_doc" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listDoc(2);"/><img id="fini_page_doc" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listDoc('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_doc" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listDoc(1);"/><img id="precedent_page_doc"  class="button_nonclick" src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listDoc(1);"/>1/'.$pagetotal.'<img id="suivant_page_doc" src="images/right20.png" class="button_nonclick"  width="25" height="25" onclick="$.search_page_selection_listDoc(2);"/><img id="fini_page_doc" class="button_nonclick"  src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listDoc('.$pagetotal.');"/></td>';
											}
										echo'
										</tr>
									</table>
								</div>
								<div id="title_ligne_doc">
									<table width="100%" id="table_doc_titles">
										<th width="10%"><span id="CodeDocPdf_FichierVar"></span></th>
										<th  width="35%" ><span id="Titre_doc_FichierVar"></span></th>
										<th  ><span id="Auteurs_doc_FichierVar"></span></th>
										<th width="15%" ><span id="Date_doc_FichierVar"></span></th>
										<th width="15%" ><span id="TypeDoc_doc_FichierVar"></span></th>
										<th width="10%" ><span id="DocCLICABLE_FichierVar"></span></th>
										<th width="5%" ><span id="CodeAcc_selection_documentation"></span></th>
										<th width="5%" ><span id="CodeVar_selection_documentation"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_doc">
								<input id="documentation_curpage_value" type="hidden" value=1 />';
								
								$i=0;
								foreach($Documentation_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									
									echo '
									<tr>
										<td width="8%">'.$value['Code_doc'].'</td>
										<td width="35%">'.$value['Titre'].'</td>
										<td>'.$value['Auteur'].'</td>
										<td width="15%">'.$value['Date_doc'].'</td>
										<td width="15%">'.$value['TypeDoc'].'</td>
										<td width="10%"><a href="'.$value['FichierDocPdf'].'"><img src="./images/lien_image_ficherMediatheque.png" width="15px" alt="Link" /></a></td>
										<td width="5%">'.$value['CodeAcc'].'</td>
										<td width="5%">'.$value['CodeVar'].'</td>
										<td width="5%">...</td>
										<td width="5%" ><img src="images/export_pdf.png" class="button_nonclick"  width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['Code_doc'].'\',\'Documentation\')"   /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'Bibliographie\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	
	if(count($_SESSION['selection']['Bibliographie'])!=0){
		$Bibliographie_Contents=array();
		foreach($_SESSION['selection']['Bibliographie'] as $value){
			$content=$DAO->bibliographie_selection($value);
			array_push($Bibliographie_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Bibliographie'])/20);
		echo '<div id="Bibliographie" >
				<div id="title_Bibliographie" onclick="$.click_Bibliographie_selection('.$Bibliographie_Contents.')" class="vide">
					<span><a id="click_Bibliographie_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Bibliographie']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Bibliographie_selection" style="display: none;">
					<div id="list8_cate_var">
						<fieldset id="list8_fieldset_FichierVar">
							<div id="contents_bibliographie">
								<div class="function_ligne_bibliographie">
									<table width="100%" id="table_bibliographie_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="70%"></td>
											<td ><select id="select_pagesize_bibliographie_selection" onchange="$.select_change_selection_listbibliographie();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal>1){
											echo'
											<td width="15%"><img id="premier_page_bibliographie" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listBibliographie(1);"/><img id="precedent_page_bibliographie" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listBibliographie(1);"/>1/'.$pagetotal.'<img id="suivant_page_bibliographie" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listBibliographie(2);"/><img id="fini_page_bibliographie" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listBibliographie('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_bibliographie" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listBibliographie(1);"/><img id="precedent_page_bibliographie" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listBibliographie(1);"/>1/'.$pagetotal.'<img id="suivant_page_bibliographie" class="button_nonclick"  src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listBibliographie(2);"/><img id="fini_page_bibliographie" class="button_nonclick"  src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listBibliographie('.$pagetotal.');"/></td>';
											}
										echo'
										</tr>
									</table>
								</div>
								<div id="title_ligne_bibliographie">
									<table width="100%" id="table_bibliographie_titles">
										<th width="10%"><span id="CodeCit_FichierVar"></span></th>
										<th  ><span id="Title_FichierVar"></span></th>
										<th width="25%" ><span id="Author_FichierVar"></span></th>
										<th width="12%" ><span id="Year_FichierVar"></span></th>
										<th width="7%"><span id="VolumeCitation_FichierVar"></span></th>
										<th width="7%" ><span id="PagesCitation_FichierVar"></span></th>
										<th width="7%"><span id="CodeAcc_selection_bibliographie"></span></th>
										<th width="7%" ><span id="CodeVar_selection_bibliographie"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_bibliographie">
								<input id="bibliographie_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Bibliographie_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="8%"  onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">'.$value['CodeCit'].'</td>
										<td   onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">'.$value['Title'].'</td>
										<td width="25%"  onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">'.$value['Author'].'</td>
										<td width="12%"  onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">'.$value['Year'].'</td>
										<td width="7%"  onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">'.$value['VolumeCitation'].'</td>
										<td width="7%" onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">'.$value['PagesCitation'].'</td>
										<td width="7%"  onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">'.$value['CodeAcc'].'</td>
										<td width="7%" onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">'.$value['CodeVar'].'</td>
										<td width="5%" onclick="$.passerFicher(\''.$value['CodeCit'].'\',\'bibliographie\');return false;">...</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['CodeCit'].'\',\'Bibliographie\')"  /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'Bibliographie\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	if(count($_SESSION['selection']['Partenaire'])!=0){
		$Partenaire_Contents=array();
		foreach($_SESSION['selection']['Partenaire'] as $value){
			$content=$DAO->partenaire_selection($value);
			array_push($Partenaire_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Partenaire'])/20);
		echo '<div id="Partenaire" >
				<div id="title_Partenaire" onclick="$.click_Partenaire_selection('.$Partenaire_Contents.')" class="vide">
					<span><a id="click_Partenaire_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Partenaire']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Partenaire_selection" style="display: none;">
					<div id="listPartenaire">
						<fieldset id="listPartenaire_fieldset">
							<div id="contents_Partenaire">
								<div class="function_ligne_Partenaire">
									<table width="100%" id="table_Partenaire_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="70%"></td>
											<td ><select id="select_pagesize_Partenaire_selection" onchange="$.select_change_selection_listPartenaire();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal>1){
											echo'
											<td width="15%"><img id="premier_page_Partenaire" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listPartenaire(1);"/><img id="precedent_page_Partenaire"  class="button_nonclick" src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listPartenaire(1);"/>1/'.$pagetotal.'<img id="suivant_page_Partenaire" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listPartenaire(2);"/><img id="fini_page_Partenaire" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listPartenaire('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_Partenaire" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listPartenaire(1);"/><img id="precedent_page_Partenaire" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listPartenaire(1);"/>1/'.$pagetotal.'<img id="suivant_page_Partenaire" class="button_nonclick"  src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listPartenaire(2);"/><img id="fini_page_Partenaire" src="images/change.png" class="button_nonclick"  width="25" height="25" onclick="$.search_page_selection_listPartenaire('.$pagetotal.');"/></td>';
											}
										echo'
										</tr>
									</table>
								</div>
								<div id="title_ligne_Partenaire">
									<table width="100%" id="table_Partenaire_titles">
										<th width="10%"><span id="CodePartenaire"></span></th>
										<th ><span id="siglePartenaire"></span></th>
										<th width="40%" ><span id="NomPartenaire"></span></th>
										<th width="25%" ><span id="sectionPartenaire"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_Partenaire">
								<input id="partenaire_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Partenaire_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="8%"  onclick="$.passerFicher(\''.$value['CodePartenaire'].'\',\'partenaire\');return false;">'.$value['CodePartenaire'].'</td>
										<td   onclick="$.passerFicher(\''.$value['CodePartenaire'].'\',\'partenaire\');return false;">'.$value['SiglePartenaire'].'</td>
										<td width="40%"  onclick="$.passerFicher(\''.$value['CodePartenaire'].'\',\'partenaire\');return false;">'.$value['NomPartenaire'].'</td>
										<td width="25%"  onclick="$.passerFicher(\''.$value['CodePartenaire'].'\',\'partenaire\');return false;">'.$value['SectionRegionaleENTAV'].'</td>
										<td width="5%" ><img src="images/export_pdf.png" width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['CodePartenaire'].'\',\'partenaire\')"  /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'partenaire\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	
	if(count($_SESSION['selection']['Lien'])!=0){
		$Lien_Contents=array();
		foreach($_SESSION['selection']['Lien'] as $value){
			$content=$DAO->lien_selection($value);
			array_push($Lien_Contents,$content);
		}
		$pagetotal=ceil(count($_SESSION['selection']['Lien'])/20);
		echo '<div id="Lien" >
				<div id="title_Lien" onclick="$.click_Lien_selection('.$Lien_Contents.')" class="vide">
					<span><a id="click_Lien_selection"></a>&nbsp &nbsp('.count($_SESSION['selection']['Lien']).'&nbsp&nbspselections)&nbsp</span>
				</div>
				<div id="contents_Lien_selection" style="display: none;">
					<div id="lien_cate_var">
						<fieldset id="lien_cate_var_FichierVar">
							<div id="contents_lien">
								<div class="function_ligne_lien">
									<table width="100%" id="table_lien_function">
										<tr>
											<td width="5%"><a><img src="images/xls3.png" width="25" height="25"/></a></td>
											<td width="60%"></td>
											<td ><select id="select_pagesize_lien_selection" onchange="$.select_change_selection_listlien();"><option value="20">20</option><option value="50">50</option><option value="100">100</option></select>/Page</td>';
											if($pagetotal>1){
											echo'
											<td width="15%"><img id="premier_page_lien"   class="button_nonclick" src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listLien(1);"/><img id="precedent_page_lien" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listLien(1);"/>1/'.$pagetotal.'<img id="suivant_page_lien" src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listLien(2);"/><img id="fini_page_lien" src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listLien('.$pagetotal.');"/></td>';
											}else{
											echo'
											<td width="15%"><img id="premier_page_lien" class="button_nonclick"  src="images/previous1.png" width="25" height="25" onclick="$.search_page_selection_listLien(1);"/><img id="precedent_page_lien" class="button_nonclick"  src="images/left13.png" width="25" height="25" onclick="$.search_page_selection_listLien(1);"/>1/'.$pagetotal.'<img id="suivant_page_lien" class="button_nonclick"  src="images/right20.png" width="25" height="25" onclick="$.search_page_selection_listLien(2);"/><img id="fini_page_lien" class="button_nonclick"  src="images/change.png" width="25" height="25" onclick="$.search_page_selection_listLien('.$pagetotal.');"/></td>';
											}
										echo'
										</tr>
									</table>
								</div>
								<div id="title_ligne_lien">
									<table width="100%" id="table_lien_titles">
										<th width="10%"><span id="CodeLienWeb_FichierVar"></span></th>
										<th  width="25%" ><span id="Titre_lien_FichierVar"></span></th>
										<th  ><span id="NomSite_FichierVar"></span></th>
										<th width="25%" ><span id="Pays_lien_FichierVar"></span></th>
										<th width="15%" ><span id="LienCLICABLE_FichierVar"></span></th>
										<th width="5%" ><span id="CodeAcc_selection_lien"></span></th>
										<th width="5%" ><span id="CodeVar_selection_lien"></span></th>
										<th width="5%"><span id="more_colonne"></span></th>
										<th width="5%"><span id="Export_pdf"></span></th>
										<th width="5%"><span id="Suppr_selection"></span></th>
									</table>
								</div>
								<table  width="100%" id="contents_ligne_lien">
								<input id="lien_curpage_value" type="hidden" value=1 />';
								$i=0;
								foreach($Lien_Contents as $value){
									$i++;
									if ($i >20){
										break;
									}
									echo '
									<tr>
										<td width="8%">'.$value['Code_lien'].'</td>
										<td width="25%">'.$value['Titre'].'</td>
										<td>'.$value['NomSite'].'</td>
										<td width="25%">'.$value['Pays'].'</td>
										<td width="15%"><a href="'.$value['URL'].'"><img src="./images/lien_image_ficherMediatheque.png" width="15px" alt="Link" /></a></td>
										<td>'.$value['CodeIntro'].'</td>
										<td width="25%">'.$value['CodeVar'].'</td>
										<td width="5%" >...</td>
										<td width="5%" ><img src="images/export_pdf.png" class="button_nonclick"  width="25" height="25" /></td>
										<td width="5%" ><img src="images/delete_selection.png" width="25" height="25" onclick="$.delete_selection(\''.$value['Code_lien'].'\',\'Lien\')"   /></td>
									</tr>';
								}
								echo'
								</table>
							</div>
						</fieldset>
					</div>
					<div id="vide_section">
						<a id="vide_section_button" onclick="$.vide_section(\'lien\')"></a>
					</div>
				</div>
					
			</div>';
	}else{
		$vide++;
	}
	if($vide==13){
		echo "<p id='vide_selection'></p>";
	}

echo '</div>';




?>