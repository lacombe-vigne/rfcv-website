
<div id="ResearchA">
	<div id="conditions">
		<div id="formule">
			<div id="title_formule">
				<img src="images/search_icon.png" alt="Search" width="40" height="40">
				<h3 id="title_recherche_avancee"></h3>
			</div>
			<div id="fieldset_conditions">
				<fieldset>
					<legend id="fieldset_conditions_legend"><span></span></legend>
					<form>
						<table>
							<tr><th id="titile_section" width="20%"></th><th id="titile_Champ" width="25%"></th><th id="titile_Modele" width="10%"></th><th id="titile_Condition"></th><th id="titile_Supprimer" width="5%"></th></tr>
							<tr>
							<table id="contents_condition" width="100%">
								<tr id="tr_1">
									<td width="20%">
										<select id="section_1" style="width:150" onchange="$.searchA_changeSection(1)">
											<option value=" "> </option>
											<option value="Espece" id="section_espece_RA"></option>
											<option value="Variete" id="section_variete_RA"></option>
											<option value="Accession" id="section_accession_RA"></option>
											<option value="Emplacement" id="section_emplacement_RA"></option>
											<option value="Sanitaire" id="section_sanitaire_RA"></option>
											<option value="Morphologique" id="section_description_RA"></option>
											<option value="Aptitude" id="section_aptitude_RA"></option>
											<option value="Genetique" id="section_genetique_RA"></option>
											<option value="Phototheque" id="section_phototheque_RA"></option>
											<option value="Documentation" id="section_documentation_RA"></option>
											<option value="Bibliographie" id="section_bibliographie_RA"></option>
											<option value="Partenaire" id="section_partenaire_RA"></option>
										</select>
									</td>
									<td  width="25%">
										<select id="champ_1" style="width:150"  style="width:140" onchange="$.searchA_changeChamp(1)">
										</select>
									</td>
									<td  width="10%">
										<select style="width:100" id="model_1">
											<option value="like" id="section_model_like"></option>
											<option value="exact" id="section_model_exact"></option>
											<option value="start" id="section_model_start"></option>
											<option value="finish" id="section_model_finish"></option>
										</select>
									</td>
									<td id="codition_td_1">
										<input type="test" style="width:200" id="condition_1"/>
									</td>
									<td  width="5%" id="lien_1" >
										<a onclick="$.fieldset_conditions_legend_img()"><img src="images/ajoute_un_contidition.png" alt="Search" width="20" height="20"></a>
										<a id="sup_1" onclick="$.sup_condition(1)"><img src="images/delete_condition.png" alt="Search" width="20" height="20"></a>
									</td>
								</tr>
							</table>
							</tr>
							<table id="searchA_button_table">
							<tr>
								<td width="70%"></td>
								<td align="center"><a id="go_searchA"></a></td>
							</tr>
							</table>
						</table>
					</form>
				</fieldset>
			</div>
		</div>
		<div id="notice">
			<h3 id="recherche_avancee_titleAttention"></h3>
			<p id="recherche_avancee_Attention" ></p>
		</div>
	</div>
	<div id="resultat">
                <?php echo 'Requête exécutée(Permet de tester la recherche avancée) : '.$_SESSION['sql'] //Affiche la requête générée par la recherche avancée ?>
		<div id="title_Resultat">
			<img src="images/result_advance.png" alt="Search" width="40" height="40">
			<h3 id="titleResultat_rechreche_avancee"></h3>
		</div>
		
	</div>
</div>
