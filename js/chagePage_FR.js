$(document).ready(function(){

//page home
	$.getJSON("./json/home.json",function(data){
	
		$.each(data,function(key, value){
			
			if(key==="title_fr"){
				
				var site_title = '<h1>'+value.main_title+' </h1><span>'+value.sous_title+' </span>';
				$('#site_title').append(site_title);
			}
			if(key==="login_fr"){
				var site_login_title =value.title;
				$('#site-login-title').append(site_login_title);
				var welcom_title='<a href="Login.php">'+value.button_login+'</a>';
				$('#welcom_title').append(welcom_title);
			}
			if(key==="menu_main_fr"){
				var menu_main = '<a style="cursor:hand" href="Home.php"><li>'+value.Accueil+'</li></a>'+
								'<input type="hidden" value="'+value.Accueil+'" id="mainMenu_Home">'+
								'<a style="cursor:default"><li class="menu_rechercher">'+value.Rechercher+''+
									'<a class="sous_menu">'+
									'</a>'+
								'</li></a>'+
								'<a  style="cursor:hand" href="MySelection.php"><li>'+value.Selection+'</li></a>';
				$('#menu_main').append(menu_main);
			}
			if(key==="search_fr"){
				var sous_menu =   '<a style="cursor:hand" href="SearchS.php?"><li>'+value.ss+'</li></a>'+
									'<a style="cursor:hand" href="SearchA.php"><li>'+value.as+'</li></a>';
				$('.sous_menu').append(sous_menu);
			}
			if(key==="accueil_part1_fr"){
				var title=value.title;
				var sous_title=value.sous_title;
				var contents=value.contents;
				var read_more=value.read_more;
				$('#title_part1').append(title);
				$('#sous_title_part1').append(sous_title);
				$('#contents_part1').append(contents);
				$('#read_more1').append(read_more);
			}
			if(key==="accueil_part2_fr"){
				var title=value.title;
				var sous_title=value.sous_title;
				var contents=value.contents;
				var read_more=value.read_more;
				$('#title_part2').append(title);
				$('#sous_title_part2').append(sous_title);
				$('#contents_part2').append(contents);
				$('#read_more2').append(read_more);
			}
			if(key==="accueil_part3_fr"){
				var title=value.title;
				var sous_title=value.sous_title;
				var contents=value.contents;
				var read_more=value.read_more;
				$('#title_part3').append(title);
				$('#sous_title_part3').append(sous_title);
				$('#contents_part3').append(contents);
				$('#read_more3').append(read_more);
			}
			if(key==="link_fr"){
				var site_link = '<div id="title_lien"></div><ul id="footer_lien_contents"></ul>';
				var table_link= '';
				var link=value.link;
				$.each(link,function(entryIndex, entry){
					table_link = table_link + '<li><a style="cursor:hand" href="'+entry['add']+'">'+entry['name']+'</a></li>';
				});
				$('.footer_lien').append(site_link);
				$('#lien_useful_contents').append(table_link);
			}
			if(key==="footer_fr"){
				var list_footer='';
				var footer=value;
				$.each(footer,function(entryIndex, entry){
					list_footer = list_footer + '<li><a style="cursor:hand" href="'+entry["add"]+'">'+entry["name"]+'</a></li>';
				});
				$('#footer_lien_contents').append(list_footer);
			}
			if(key==="login_page_fr"){
				var site_loginpage = '	<form>'+
											'<table class="site-login-form">'+
												'<tr>'+
													'<td colspan="2" class="title-login">'+value.title+'</td>'+
												'</tr>'+
												'<tr>'+
													'<td>'+value.username+'</td>'+
													'<td><input type="text" name="user" id="login_name" class="login-input"/></td>'+
												'</tr>'+
													'<td>'+value.password+'</td>'+
													'<td><input type="password" name="password" id="login_pass" class="login-input"/><input type="hidden" id="login_langue" value="FR" name="langue"></td>'+
													
												'<tr>'+
												'<tr>'+
													'<td></td>'+
													'<td  align="center"><input type="submit" onclick="$.login()" value="'+value.button+'" class="button"/></td>'+
												'</tr>'+
												'</tr>'+
											'</table>'+
										'</form>'+
										'<div class="notice_login"><h3>'+value.notice_title+'</h3><p>'+value.notice_contents+'</p></div>';
				$('#site-loginpage').append(site_loginpage);
			}
			if(key==="chemin_fr"){
				$('#chemin_home').append(value.chemin_home);
				$('#chemin_selection').append(value.chemin_selection);
				$('#chemin_searchA').append(value.chemin_searchA);
				$('#chemin_login').append(value.chemin_login);
				$('#chemin_resultat').append(value.chemin_resultat);
				$('#chemin_searchS').append(value.chemin_searchS);
				$('#chemin_fiche').append(value.chemin_fiche);
				$('#chemin_person').append(value.chemin_person);
			}
			if(key==="partenaire_page_fr"){
				$('#title_parti1_partenaire').append(value.title_parti1);
				$('#contents_parti1_partenaire').append(value.contents_parti1);
				$('#title_parti2_partenaire').append(value.title_parti2);
				$('#contents_parti2_partenaire').append(value.contents_parti2);
				$('#title_parti3_partenaire').append(value.title_parti3);
				$('#contents_parti3_partenaire').append(value.contents_parti3);
			}
			if(key==="charte_page_fr"){
				$('#title_parti1_charte').append(value.title_parti1);
				$('#contents_parti1_charte').append(value.contents_parti1);
				$('#title_parti2_charte').append(value.title_parti2);
				$('#contents_parti2_charte').append(value.contents_parti2);
				$('#title_parti3_charte').append(value.title_parti3);
				$('#contents_parti3_charte').append(value.contents_parti3);
			}
			if(key==="documentation_page_fr"){
				$('#title_parti1_documentation').append(value.title_parti1);
				$('#contents_parti1_documentation').append(value.contents_parti1);
				$('#title_parti2_documentation').append(value.title_parti2);
				$('#contents_parti2_documentation').append(value.contents_parti2);
				$('#title_parti3_documentation').append(value.title_parti3);
				$('#contents_parti3_documentation').append(value.contents_parti3);
			}
			if(key==="contacts_page_fr"){
				$('#title_parti1_contacts').append(value.title_parti1);
				$('#contents_parti1_contacts').append(value.contents_parti1);
				$('#title_parti2_contacts').append(value.title_parti2);
				$('#contents_parti2_contacts').append(value.contents_parti2);
				$('#title_parti3_contacts').append(value.title_parti3);
				$('#contents_parti3_contacts').append(value.contents_parti3);
			}
			if(key==="credit_page_fr"){
				$('#title_parti1_credits').append(value.title_parti1);
				$('#contents_parti1_credits').append(value.contents_parti1);
				$('#title_parti2_credits').append(value.title_parti2);
				$('#contents_parti2_credits').append(value.contents_parti2);
				$('#title_parti3_credits').append(value.title_parti3);
				$('#contents_parti3_credits').append(value.contents_parti3);
			}
			if(key==="rights_duties_page_fr"){
				$('#title_parti1_rights_duties').append(value.title_parti1);
				$('#contents_parti1_rights_duties').append(value.contents_parti1);
				$('#title_parti2_rights_duties').append(value.title_parti2);
				$('#contents_parti2_rights_duties').append(value.contents_parti2);
				$('#title_parti3_rights_duties').append(value.title_parti3);
				$('#contents_parti3_rights_duties').append(value.contents_parti3);
			}
                        if(key==="footer2_fr"){
                            var footer =value.footer;
                            $('#footer').append(footer);
                            var bdd =value.bdd;                            
                            $('#bdd').append(bdd);
                        }
		});
	});
//page search simple/advence
	$.getJSON("./json/search.json",function(data){
		$.each(data,function(key, value){
			if(key==="site_searchS_fr"){
				var site_search='<fieldset><legend><img src="images/search_icon.png" alt="Search" width="40" height="40"/>'+value.title+'</legend>'+
					'<form method="post" action="">'+
						'<table class="table-ss" style="width:80%;" >'+
							'<tr>'+
								'<td class="ss-radio" style="width:27%;"><input type="radio" name="model" value="tous" checked />'+value.model_tous+'</td>'+
							'</tr>'+
							'<tr>'+
                                                        '<td class="ss-radio" style="width:27%;" ><input type="radio" name="model" value="especes" />'+value.model_especes+'</td>'+
								'<td rowspan=2 style="width:14%;">'+
									'<select name="case" class="case_select">'+
										'<option value="fuzzy">'+value.case_fuzzy+'</option>'+
										'<option value="complet">'+value.case_complet+'</option>'+
										'<option value="start">'+value.case_start+'</option>'+
										'<option value="end">'+value.case_end+'</option>'+
										
									'</select>'+
								'</td>'+
								'<td rowspan=2 style="width:45%;text-align:center">'+
									'<input type="text" name="search" class="search-input" size="35"/><input type="hidden" value="FR" id="langue_simple" />'+
								'</td>'+
                                                                '<td rowspan=2 style="width:14%;">'+
									'<a style="cursor:hand"  class="button" id="button_simple_search" onclick="$.search_simple();return false;" style="cursor:hand">'+value.button+'</a>'+
								'</td>'+
							'</tr>'+
                                                        '<tr>'+			
								'<td class="ss-radio" style="width:27%;"><input type="radio" name="model" value="varietes" />'+value.model_varietes+'</td>'+
								
							'</tr>'+
							'<tr>'+
                                                                '<td class="ss-radio" style="width:27%;"><input type="radio" name="model" value="accession" />'+value.model_accession+'</td>'+
							'</tr>'+
						'</table>'+
					'</form></fieldset>'+
				'</div>';
				$('#search_formule').append(site_search);
			}
			if(key==="search_notice_fr"){
				var search_notice = '<h3>'+value.title+'</h3><p>'+value.contents+'</p>';
				$('.search-notice').append(search_notice);
			}
		});
	});
//message
	$.getJSON("./json/message.json",function(data){
		$.each(data,function(key, value){
			if(key==="emptyCompte_fr"){
				var message_emptyCompte=value;
				$('#message_emptyCompte').append(message_emptyCompte);
			}
			if(key==="login_fr"){
				var message_login=value;
				$('#message_login').append(message_login);
			}
			if(key==="problemFillin_fr"){
				var message_problemFilling=value;
				$('#message_problemFilling').append(message_problemFilling);
			}
			if(key==="logout_fr"){
				var message_logout=value;
				$('#message_logout').append(message_logout);
			}
		});
	});
	$.getJSON("./json/personpage.json",function(data){
		$.each(data,function(key, value){
			if(key==="MesInfo_fr"){
				$('#title-mes-info').append(value.title);
				$('#partenaire-mes-info').append(value.vient);
				$('#Modifiez-mes-info').append(value.button);
                                $('#tel-mes-info').append(value.tel);
				$('#fax-mes-info').append(value.fax);
				$('#mail-mes-info').append(value.mail);
			}
			if(key==="GestionUser_fr"){
				$('#title-gestion-users').append(value.title);
				$('#new_user_create').append(value.add);
				$('#list_des_utilisateur').append(value.list);
			}
			if(key==="ListUser_fr"){
				$('#title_list_user').append(value.title);
				$('#ListUser-nom').append(value.nom);
				$('#ListUser-prenom').append(value.prenom);
				$('#ListUser-partenaire').append(value.partenaire);
				$('#ListUser-fonction').append(value.fonction);
				$('#ListUser-tel').append(value.tel);
				$('#ListUser-fax').append(value.fax);
				$('#ListUser-mail').append(value.mail);
				$('#ListUser-dateFin').append(value.dateFin);
			}
			if(key==="NewUser_fr"){
				$('#NewUser-title').append(value.title);
				$('#NewUser-codepersonne').append(value.Code);
				$('#NewUser-nom').append(value.Nom);
				$('#NewUser-prenom').append(value.Prenom);
				$('#NewUser-partenaire').append(value.Partenaire);
				$('#NewUser-partenaire-B').append(value.Partenaire);
				$('#NewUser-fonction').append(value.Fonction);
                                $('#NewUser-password').append(value.Password);
                                $('#NewUser-passwordconfirm').append(value.PasswordConfirm);
				$('#NewUser-profil').append(value.Profil);
				$('#NewUser-dom').append(value.DomCompet);
				$('#NewUser-tel').append(value.Tel);
				$('#NewUser-fax').append(value.Fax);
				$('#NewUser-mail').append(value.Mail);
				$('#NewUser-dateFin').append(value.DateFin);
				$('#NewUser-button').append(value.Button);
			}
			if(key==="ResUser_fr"){
				$('#title_list_user_res').append(value.title);
				$('#ResUser-nom').append(value.nom);
				$('#ResUser-prenom').append(value.prenom);
				$('#ResUser-partenaire').append(value.partenaire);
				$('#ResUser-fonction').append(value.fonction);
				$('#ResUser-tel').append(value.tel);
				$('#ResUser-fax').append(value.fax);
				$('#ResUser-mail').append(value.mail);
				$('#ResUser-dateFin').append(value.dataFin);
			}
			if(key==="SesInfo_fr"){
				console.log(value.vient);
				$('#title-ses-info').append(value.title);	
			}
			if(key==="ModiMesInfo_fr"){
				$('#ModifiezMesInfo-title').append(value.title);
				$('#ModifiezMesInfo-nom').append(value.nom);
				$('#ModifiezMesInfo-prenom').append(value.prenom);
				$('#ModifiezMesInfo-password').append(value.NewPassword);
				$('#ModifiezMesInfo-repass').append(value.ReNewPassword);
				$('#ModifiezMesInfo-tel').append(value.tel);
				$('#ModifiezMesInfo-fax').append(value.fax);
				$('#ModifiezMesInfo-mail').append(value.mail);
				$('#ModifiezMesInfo-button').append(value.button);
			}
			if(key==="Modi_MesInfo_Tips_fr"){
				$('#user_nom_tip').append(value.nom);
				$('#user_prenom_tip').append(value.prenom);
				$('#password1_tip').append(value.password);
				$('#password2_tip').append(value.repassword);
				$('#user_tel_tip').append(value.tel);
				$('#user_fax_tip').append(value.fax);
				$('#user_mail_tip').append(value.mail);			
			}	
			if(key==="NewUser_Tips_fr"){
				$('#CodePersonne_new_tip').append(value.code);
				$('#Nom_new_tip').append(value.nom);
				$('#Prenom_new_tip').append(value.prenom);
				$('#Profile_user_new_tip').append(value.profil);
				$('#Tel_new_tip').append(value.tel);
				$('#Fax_new_tip').append(value.fax);
				$('#Mail_new_tip').append(value.mail);
				$('#DateFinValide_new_tip').append(value.dateFin);
			}
		});
	});
	//page fichier
	$.getJSON("./json/fichier.json",function(data){
		console.log(1);
		$.each(data,function(key, value){
                        if(key==="code_fr"){
                            $('#code_fiche').append(value.Code);
                        }
			if(key==="espece_fr"){
				$('#esp_FichierEsp').append(value.Title);
				$('#Botaniste_lable_esp').append(value.Botaniste);
				$('#Genre_lable_esp').append(value.Genre);
				$('#CompoGenet_lable_esp').append(value.CompoGenet);
				$('#SousGenre_lable_esp').append(value.SousGenre);
				$('#RemarqueEsp_lable_esp').append(value.RemarqueEsp);
				$('#click_cate2_FichierEsp').append(value.Cate1);
				$('#click_cate3_FichierEsp').append(value.Cate2);
			}
			if(key==="variete_fr"){
				$('#SynoMajeur_lable_var').append(value.SynoMajeur);
                                $('#var_FichierVar').append(value.Title);
				$('#Type_lable_var').append(value.Type);
				$('#Espece_lable_var').append(value.Espece);
				$('#UniteVar_lable_var').append(value.UniteVar);
				$('#Utilite_lable_var').append(value.Utilite);
				$('#OIpays_lable_var').append(value.OIpays);
				$('#CouleurPer_lable_var').append(value.CouleurPulp);
				$('#CouleurPu_lable_var').append(value.CouleurPel);
				$('#Saveur_lable_var').append(value.Saveur);
				$('#Pepins_lable_var').append(value.Pepins);
				$('#Obtenteur_lable_var').append(value.Obtenteneur);
				$('#click_cate1_FichierVar').append(value.cate1);
				$('#click_cate2_FichierVar').append(value.cate2);
				$('#click_cate3_FichierVar').append(value.cate3);
				$('#click_cate4_FichierVar').append(value.cate4);
				$('#click_cate5_FichierVar').append(value.cate5);
				$('#click_cate6_FichierVar').append(value.cate6);
				$('#click_cate7_FichierVar').append(value.cate7);
				$('#click_cate8_FichierVar').append(value.cate8);
                                $('#click_cate9_FichierVar').append(value.cate9);
				
			}
			if(key==="accession_fr"){
				$('#acc_FichierAcc').append(value.Title);
				$('#Partenaire_lable_acc').append(value.Partenaire);
				$('#CodeIntroPartenaire_lable_acc').append(value.codeIntroPartenaire);
				$('#Statut_lable_acc').append(value.Statut);
				$('#UniteIntro_lable_acc').append(value.UniteIntro);
				$('#NomVar_lable_acc').append(value.NomVar);
				$('#AnneeAgrement_lable_acc').append(value.AnneeAgrement);
				$('#PayP_lable_acc').append(value.PayP);
				$('#CommuneProvenance_lable_acc').append(value.CommuneP);
				$('#AdresProvenance_lable_acc').append(value.AdresseP);
				$('#Collecteur_lable_acc').append(value.Collecteur);
				$('#click_cate1_FichierAcc').append(value.cate1);
				$('#click_cate2_FichierAcc').append(value.cate2);
				$('#click_cate3_FichierAcc').append(value.cate3);
				$('#click_cate4_FichierAcc').append(value.cate4);
				$('#click_cate5_FichierAcc').append(value.cate5);
				$('#click_cate6_FichierAcc').append(value.cate6);
				$('#click_cate7_FichierAcc').append(value.cate7);
                                $('#click_cate8_FichierAcc').append(value.cate8);
				
				$('#tabs-1-acc').append(value.PDtitle);
				$('#RegionProvenance_tab1_acc').append(value.PDregion);
				$('#DepartProvenance_tab1_acc').append(value.PDdepart);
				$('#CommuneProvenance_tab1_acc').append(value.PDcommune);
				$('#CodPostProvenance_tab1_acc').append(value.PDcodePost);
				$('#SiteProvenance_tab1_acc').append(value.PDsite);
				$('#AdresProvenance_tab1_acc').append(value.PDadresse);
				$('#ProprietProvenance_tab1_acc').append(value.PDpropirete);
				$('#Collecteur_tab1_acc').append(value.PDcollecteure);
				$('#ParcelleProvenance_tab1_acc').append(value.PDparcelle);
				$('#RangProvenance_tab1_acc').append(value.PDrang);
				$('#SoucheProvenance_tab1_acc').append(value.PDsouche);
				$('#Latitudee_tab1_acc').append(value.PDlatitude);
				$('#Longitude_tab1_acc').append(value.PDlongitude);
				$('#Altitude_tab1_acc').append(value.PDaltitude);
				$('#Jour_tab1_acc').append(value.PDjour);
				$('#Mois_tab1_acc').append(value.PDmois);
				$('#Annee_tab1_acc').append(value.PDannee);
				$('#CodeIntroPorvenance_tab1_acc').append(value.PDcodeIntroProvenance);
				$('#CodeEntree_tab1_acc').append(value.PDcodeEntree);
				$('#ReIntroduit_tab1_acc').append(value.PDreIntroduit);
				$('#IssuTraitement_tab1_acc').append(value.PDissuTraitement);
				$('#ColoneTraite_tab1_acc').append(value.PDcoloneTraite);
				$('#RemarquesProvenance_tab1_acc').append(value.PDremarques);
				$('#tabs-2-acc').append(value.PAtitle);
				$('#PaysProvenance_tab2_acc').append(value.PApays);
				$('#RegionProvenance_tab2_acc').append(value.PAregion);
				$('#DepartProvenance_tab2_acc').append(value.PAdeparte);
				$('#CommuneProvenance_tab2_acc').append(value.PAcommune);
				$('#CodPostProvenancee_tab2_acc').append(value.PAcodePost);
				$('#SiteProvenance_tab2_acc').append(value.PAsite);
				$('#AdresProvenance_tab2_acc').append(value.PAadresse);
				$('#ProprietProvenance_tab2_acc').append(value.PApropriete);
				$('#Collecteur_tab2_acc').append(value.PAcollecteur);
				$('#ParcelleProvenance_tab2_acc').append(value.PAparcelle);
				$('#RangProvenance_tab2_acc').append(value.PArang);
				$('#SoucheProvenance_tab2_acc').append(value.PAsouche);
				$('#ProprietProvenance_tab2_acc').append(value.PAcodeIntro);
				$('#tabs-3-acc').append(value.CItilte);
				$('#CouleurPe_tab3_acc').append(value.CIcouleurPe);
				$('#CouleurPut_tab3_acc').append(value.CIcouleurPu);
				$('#Saveur_tab3_acc').append(value.CIsaveur);
				$('#Pepins_tab3_acc').append(value.CIpepins);
				$('#Sexe_tab3_acc').append(value.CIsexe);
				$('#Identification_tab3_acc').append(value.CIidentification);
				$('#IdenMorphologique_tab3_acc').append(value.CIidenMorphologique);
				$('#IdenGenetique_tab3_acc').append(value.CIidenGenetique);
				$('#IdenAutre_tab3_acc').append(value.CIidenAutre);
				$('#Bibliographie_tab3_acc').append(value.CIbibliographie);
				$('#Volume_tab3_acc').append(value.CIvolume);
				$('#Page_tab3_acc').append(value.CIpage);
				$('#RemarqueAccessionName_tab3_acc').append(value.CIremarque);
				$('#tabs-4-acc').append(value.Atitle);
				$('#Agrement_tab4_acc').append(value.Aagrement);
				$('#FamilleSanitaire_tab4_acc').append(value.AfamilleSanitaire);
				$('#AgrementCTPS_tab4_acc').append(value.AagrementCTPS);
				$('#NumTempCTPS_tab4_acc').append(value.AnumTempCTPS);
				$('#NumCloneCTPS_tab4_acc').append(value.AnumAgreCTPS);
				$('#AnneeAgrement_tab4_acc').append(value.AanneeAgrement);
				$('#AnneeNonCertifiable_tab4_acc').append(value.AanneeNonCertifiable);
				$('#LieuDepotMatInitial_tab4_acc').append(value.AlieuDepotMatInitial);
				$('#SurfMulti_tab4_acc').append(value.AsurfMulti);
				$('#DelegONIVINS_tab4_acc').append(value.AdelegONIVINS);
				$('#NomPartenaire_tab4_acc').append(value.AnomPartenaire);
				$('#NomPartenaire2_tab4_acc').append(value.AnomPartenaire2);
				$('#tabs-5-acc').append(value.Rtitle);
				$('#MaintienEnCollection_tab5_acc').append(value.RmaintienEnCollection);
				$('#RestrictionDiffusion_tab5_acc').append(value.RremarqueDiffusion);
				$('#remarquesIntro_tab5_acc').append(value.RremarqueIntro);
			}
			if(key==="aptitude_fr"){
				$('#apt_FichierApt').append(value.title);
				$('#nomVar_lable_apt').append(value.nomVar);
				$('#Experimentateur_lable_apt').append(value.Experimentateur);
				$('#nomAcc_lable_apt').append(value.nomAcc);
				$('#Partenaire_lable_apt').append(value.Partenaire);
				$('#Caracteristique_lable_apt').append(value.Caracteristique);
				$('#JourExp_lable_apt').append(value.JourExp);
				$('#Valeur_lable_apt').append(value.Valeur);
				$('#MoisExp_lable_apt').append(value.MoisExp);
				$('#Unite_lable_apt').append(value.Unite);
				$('#AnneeExp_lable_apt').append(value.AnneeExp);
				$('#Ponderation_lable_apt').append(value.Ponderation);
				$('#LieuExp_lable_apt').append(value.LieuExp);
				$('#SiteExp_lable_apt').append(value.SiteExp);
				$('#EmplacementExp_lable_apt').append(value.EmplacementExp);
			}
			if(key==="morphologique_fr"){
				$('#mor_FichierMor').append(value.title);
				$('#nomAcc_lable_mor').append(value.nomAcc);
				$('#Experimentateur_lable_mor').append(value.Experimentateur);
				$('#Descripteur_lable_mor').append(value.Descripteur);
				$('#Partenaire_lable_mor').append(value.Partenaire);
				$('#CodeDescripteur_lable_mor').append(value.CodeDescripteur);
				$('#JourExp_lable_mor').append(value.JourExp);
				$('#Caractere_lable_mor').append(value.Caractere);
				$('#MoisExp_lable_mor').append(value.MoisExp);
				$('#CodeCaractere_lable_mor').append(value.CodeCaractere);
				$('#AnneeExp_lable_mor').append(value.AnneeExp);
				$('#LieuExp_lable_mor').append(value.LieuExp);
				$('#SiteExp_lable_mor').append(value.SiteExp);
				$('#Emplamcement_lable_mor').append(value.Emplamcement);
			}
			if(key==="emplacement_fr"){
				$('#emp_FichierEmp').append(value.title);
				$('#nomAcc_lable_emp').append(value.nomAcc);
				$('#Rang_lable_emp').append(value.Rang);
				$('#CodeAcc_lable_emp').append(value.codeAcc);
				$('#TypeSouche_lable_emp').append(value.TypeSouche);
				$('#Site_lable_emp').append(value.Site);
				$('#PremiereSouche_lable_emp').append(value.PremiereSouche);
				$('#Zone_lable_emp').append(value.Zone);
				$('#DerniereSouche_lable_emp').append(value.DerniereSouche);
				$('#Parcelle_lable_emp').append(value.Parcelle);
				$('#AnneePlantation_lable_emp').append(value.AnneePlantation);
				$('#SousPartie_lable_emp').append(value.SousPartie);
				$('#AnneeElimination_lable_emp').append(value.AnneeElimination);
				$('#NbreEtatNormal_lable_emp').append(value.NbreEtatNormal);
				$('#CategMateriel_lable_emp').append(value.CategMateriel);
				$('#NbreEtatMoyen_lable_emp').append(value.NbreEtatMoyen);
				$('#Greffe_lable_emp').append(value.Greffe);
				$('#NbreEtatMoyFaible_lable_emp').append(value.NbreEtatMoyFaible);
				$('#PorteGreffe_lable_emp').append(value.PorteGreffe);
				$('#NbreEtatFaible_lable_emp').append(value.NbreEtatFaible);
				$('#NumCloneCTPS_lable_emp').append(value.NumCloneCTPS);
				$('#NbreEtatTresFaible_lable_emp').append(value.NbreEtatTresFaible);
				$('#NbreEtatMort_lable_emp').append(value.NbreEtatMort);
			}
			if(key==="sanitaire_fr"){
				$('#san_FichierSan').append(value.title);
				$('#nomAcc_lable_san').append(value.nomAcc);
				$('#CategorieTest_lable_san').append(value.CategorieTest);
				$('#CodeAcc_lable_san').append(value.codeAcc);
				$('#MatTeste_lable_san').append(value.MatTeste);
				$('#PathogeneTeste_lable_san').append(value.PathogeneTeste);
				$('#CodeEmplacem_lable_san').append(value.CodeEmplacem);
				$('#ResultatTest_lable_san').append(value.ResultatTest);
				$('#SoucheTestee_lable_san').append(value.SoucheTestee);
				$('#Laboratoire_lable_san').append(value.Laboratoire);
				$('#Partenaire_lable_san').append(value.Partenaire);
				$('#DateTest_lable_san').append(value.DateTest);
				
			}
			if(key==="genetique_fr"){
                                $('#TypeOrgane_lable_gen').append(value.TypeOrgane);
                                $('#IdProtocoleRecolte_lable_gen').append(value.IdProtocoleRecolte)
				$('#gen_FichierGen').append(value.title);
				$('#nomAcc_lable_gen').append(value.nomAcc);
				$('#IdStockADN_lable_gen').append(value.IdStockADN);
				$('#CodeAcc_lable_gen').append(value.CodeAcc);
				$('#IdProtocolePCR_lable_gen').append(value.IdProtocolePCR);
				$('#Marqueur_lable_gen').append(value.Marqueur);
				$('#DatePCR_lable_gen').append(value.DatePCR);
				$('#ValeurCodee1_lable_gen').append(value.ValeurCodee1);
				$('#DateRun_lable_gen').append(value.DateRun);
				$('#ValeurCodee2_lable_gen').append(value.ValeurCodee2);
				$('#Partenaire_lable_gen').append(value.Partenaire);
				$('#EmplacemRecolte_lable_gen').append(value.EmplacemRecolte);
				$('#SouchePrelev_lable_gen').append(value.SouchePrelev);
				$('#DateRecolte_lable_gen').append(value.DateRecolte);
			}
			if(key==="bibliographique_fr"){
				$('#bib_FichierBib').append(value.title);
				$('#nomVar_lable_bib').append(value.nomVar);
				$('#VolumeCitation_lable_bib').append(value.VolumeCitation);
				$('#nomAcc_lable_bib').append(value.nomAcc);
				$('#PagesCitation_lable_bib').append(value.PagesCitation);
				$('#TypeDoc_lable_bib').append(value.TypeDoc);
				$('#AuteurCitation_lable_bib').append(value.AuteurCitation);
				$('#Title_lable_bib').append(value.Title);
				$('#NomVigneCite_lable_bib').append(value.NomVigneCite);
				$('#Author_lable_bib').append(value.Author);
				$('#Year_lable_bib').append(value.Year);
				$('#Edition_lable_bib').append(value.Edition);
				$('#Publisher_lable_bib').append(value.Publisher);
				$('#ISBN_lable_bib').append(value.ISBN);
				$('#Language_lable_bib').append(value.Language);
				$('#NumberOfVolumes_lable_bib').append(value.NumberOfVolumes);
				$('#PagesDoc_lable_bib').append(value.PagesDoc);
				$('#CallNumber_lable_bib').append(value.CallNumber);
				$('#PlacePublished_lable_bib').append(value.PlacePublished);
			}
			if(key==="partenaire_fr"){
				$('#par_FichierPar').append(value.title);
				$('#NomPartenaire_lable_par').append(value.NomPartenaire);
				$('#ResponsablesPartenaire_lable_par').append(value.ResponsablesPartenaire);
				$('#SiglePartenaire_lable_par').append(value.SiglePartenaire);
				$('#TelephonePartenaire_lable_par').append(value.TelephonePartenaire);
				$('#SectionRegionaleENTAV_lable_par').append(value.SectionRegionaleENTAV);
				$('#Email_lable_par').append(value.Email);
				$('#RegionPartenaire_lable_par').append(value.RegionPartenaire);
				$('#AdressePartenaire_lable_par').append(value.AdressePartenaire);
				$('#DepartPartenaire_lable_par').append(value.DepartPartenaire);
				$('#CodPostPartenaire_lable_par').append(value.CodPostPartenaire);
				$('#CommunePartenaire_lable_par').append(value.CommunePartenaire);
			}
			if(key==="site_fr"){
				$('#site_FichierSite').append(value.title);
				$('#RegionSite_lable_site').append(value.RegionSite);
				$('#SecRegENTAV_lable_site').append(value.SecRegENTAV);
				$('#DepartSite_lable_site').append(value.DepartSite);
				$('#ProprietaireSite_lable_site').append(value.ProprietaireSite);
				$('#CommuneSite_lable_site').append(value.CommuneSite);
				$('#ExploitSite_lable_site').append(value.ExploitSite);
				$('#CodPostSite_lable_site').append(value.CodPostSite);
				$('#ResponsSite_lable_site').append(value.ResponsSite);
				$('#AdresseSite_lable_site').append(value.AdresseSite);
				$('#TelSite_lable_site').append(value.TelSite);
				$('#FaxSite_lable_site').append(value.FaxSite);
				$('#LatSite_lable_site').append(value.LatSite);
				$('#LongSite_lable_site').append(value.LongSite);
				$('#MailSite_lable_site').append(value.MailSite);
				$('#AltSite_lable_site').append(value.AltSite);
				$('#AnneeCreationSite_lable_site').append(value.AnneeCreationSite);
				$('#VarMajoritairesSite_lable_site').append(value.VarMajoritairesSite);
				$('#PresentationSite_lable_site').append(value.PresentationSite);
			}
		});
	});
	$.getJSON("./json/infobulle.json",function(data){
		$.each(data,function(key, value){
			if(key==="infobulle_fr"){
				$( "#langue_fr" ).attr( "title", value.langue_fr);
				$( "#langue_en" ).attr( "title", value.langue_en );
				$( "#back_button a" ).attr( "title", value.back_button );
				$( "#modifier_fiche" ).attr( "title", value.modifier_fiche );
				$( "#selection_fiche" ).attr( "title", value.selection_fiche );
				$( "#export_pdf_fiche" ).attr( "title", value.export_pdf_fiche );
				$( "#PagePerson" ).attr( "title", value.PagePerson );
				$( "#logout" ).attr( "title", value.logout );
			}
		});
	});
	// $.getJSON("http://bioweb.supagro.inra.fr/collection_vigne2014/json/myselection.json",function(data){
		// $.each(data,function(key, value){
			// if(key==="page_principale_fr"){
				// $('#title_myselection').append(value.title);
				// $('#vide_section_button').append(value.vide_section_button);
				// $('#vide_selection').append(value.more_colonne);
				// $('#Suppr_selection').append(value.Suppr_selection);
				// $('#Export_pdf').append(value.Export_pdf);
				// $('#more_colonne').append(value.more_colonne)
			// }
			// if(key==="Espece_fr"){
				// $('#click_Espece_selection').append(value.title);
				// $('#CodeEspece').append(value.CodeEspece);
				// $('#NomEspece').append(value.NomEspece);
				// $('#Botaniste').append(value.Botaniste);
				// $('#Tronc').append(value.Tronc);
			// }
			// if(key==="Variete_fr"){
				// $('#click_Variete_selection').append(value.title);
				// $('#CodeVariete').append(value.CodeVariete);
				// $('#NomVariete').append(value.NomVariete);
				// $('#SynoMajeur').append(value.SynoMajeur);
				// $('#Utilite').append(value.Utilite);
				// $('#CouleurPellicule').append(value.CouleurPellicule);
				// $('#Saveur').append(value.Saveur);
				// $('#Pepins').append(value.Pepins);
				// $('#Sexe').append(value.Sexe);
				// $('#PaysOrigine').append(value.PaysOrigine);
				// $('#CodeEsp').append(value.CodeEsp);
			// }
			// if(key==="Accession_fr"){
				// $('#click_Accession_selection').append(value.title);
				// $('#CodeIntro').append(value.CodeIntro);
				// $('#NomIntro_acc').append(value.NomIntro_acc);
				// $('#NomVariete_acc_FichierEsp').append(value.NomVariete_acc_FichierEsp);
				// $('#Partenaire_FichierEsp').append(value.Partenaire_FichierEsp);
				// $('#PaysProvenance').append(value.PaysProvenance);
				// $('#CommuneProvenance').append(value.CommuneProvenance);
				// $('#AnneeEntree').append(value.AnneeEntree);
				// $('#CodeVariete_selection_accession').append(value.CodeVariete_selection_accession);
				
			// }
		// });
	// });
	$.getJSON("./json/selection.json",function(data){
		$.each(data,function(key, value){
			if(key==="selection_fr"){
				$('#title_myselection').append(value.title);
				$('#vide_section_button').append(value.vide_section_button);
				$('#vide_selection').append(value.vide_selection);
				$('#click_Espece_selection').append(value.click_Espece_selection);
				$('#CodeEspece').append(value.CodeEspece);
				$('#NomEspece').append(value.NomEspece);
				$('#Botaniste').append(value.Botaniste);
				$('#Tronc').append(value.Tronc);
				$('#Export_pdf').append(value.Export_pdf);
				$('#Suppr_selection').append(value.Suppr_selection);
				$('#click_Variete_selection').append(value.click_Variete_selection);
				$('#CodeVariete').append(value.CodeVariete);
				$('#NomVariete').append(value.NomVariete);
				$('#SynoMajeur').append(value.SynoMajeur);
				$('#Utilite').append(value.Utilite);
				$('#CouleurPellicule').append(value.CouleurPellicule);
				$('#Saveur').append(value.Saveur);
				$('#Pepins').append(value.Pepins);
				$('#Sexe').append(value.Sexe);
				$('#PaysOrigine').append(value.PaysOrigine);
				$('#CodeEsp').append(value.CodeEsp);
				$('#more_colonne').append(value.more_colonne);
				$('#click_Accession_selection').append(value.click_Accession_selection);
				$('#CodeIntro').append(value.CodeIntro);
				$('#NomIntro_acc').append(value.NomIntro_acc);
				$('#NomVariete_acc_FichierEsp').append(value.NomVariete_acc_FichierEsp);
				$('#Partenaire_FichierEsp').append(value.Partenaire_FichierEsp);
				$('#PaysProvenance').append(value.PaysProvenance);
				$('#CommuneProvenance').append(value.CommuneProvenance);
				$('#AnneeEntree').append(value.AnneeEntree);
				$('#CodeVariete_selection_accession').append(value.CodeVariete_selection_accession);
				$('#click_Emplacement_selection').append(value.click_Emplacement_selection);
				$('#CodeEmplacem_FichierVar').append(value.CodeEmplacem_FichierVar);
				$('#CodeSite_FichierVar').append(value.CodeSite_FichierVar);
				$('#Parcelle_FichierVar').append(value.Parcelle_FichierVar);
				$('#Rang_FichierVar').append(value.Rang_FichierVar);
				$('#Anneeplantation_FichierVar').append(value.Anneeplantation_FichierVar);
				$('#NomIntro_selection_emplacement').append(value.NomIntro_selection_emplacement);
				$('#CodeIntro_selection_emplacement').append(value.CodeIntro_selection_emplacement);
				$('#CodeVar_selection_emplacement').append(value.CodeVar_selection_emplacement);
				$('#click_Sanitaire_selection').append(value.click_Sanitaire_selection);
				$('#IdTest_FichierVar').append(value.IdTest_FichierVar);
				$('#CodeIntro_sanitaire_FichierVar').append(value.CodeIntro_sanitaire_FichierVar);
				$('#Pathogene_sanitaire_FichierVar').append(value.Pathogene_sanitaire_FichierVar);
				$('#CategorieTest_FichierVar').append(value.CategorieTest_FichierVar);
				$('#ResultatTest_FichierVar').append(value.ResultatTest_FichierVar);
				$('#Laboratoire_FichierVar').append(value.Laboratoire_FichierVar);
				$('#CodeVar_selection_sanitaire').append(value.CodeVar_selection_sanitaire);
				$('#click_Morphologique_selection').append(value.click_Morphologique_selection);
				$('#CodeOIV').append(value.CodeOIV);
				$('#LibelleDescrip').append(value.LibelleDescrip);
				$('#LibelleCritere').append(value.LibelleCritere);
				$('#CaractereOIV').append(value.CaractereOIV);
				$('#CodeAcc_selection_morphologique').append(value.CodeAcc_selection_morphologique);
				$('#CodeVar_selection_morphologique').append(value.CodeVar_selection_morphologique);
				$('#click_Aptitude_selection').append(value.click_Aptitude_selection);
				$('#CodeAptitude').append(value.CodeAptitude);
				$('#AptitudeMesure').append(value.AptitudeMesure);
				$('#ValeurCaractNum').append(value.ValeurCaractNum);
				$('#UniteMesure').append(value.UniteMesure);
				$('#Ponderation').append(value.Ponderation);
				$('#Date_aptitude').append(value.Date_aptitude);
				$('#CodePartenaire').append(value.CodePartenaire);
				$('#CodeAcc_selection_aptitude').append(value.CodeAcc_selection_aptitude);
				$('#CodeVar_selection_aptitude').append(value.CodeVar_selection_aptitude);
				$('#click_Genetique_selection').append(value.click_Genetique_selection);
				$('#IdAnalyse_FichierVar').append(value.IdAnalyse_FichierVar);
				$('#Marqueur_genetique_FichierVar').append(value.Marqueur_genetique_FichierVar);
				$('#ValeurCodee1_FichierVar').append(value.ValeurCodee1_FichierVar);
				$('#ValeurCodee2_genetique_FichierVar').append(value.ValeurCodee2_genetique_FichierVar);
				$('#CodePartenaire_FichierVar').append(value.CodePartenaire_FichierVar);
				$('#DatePCR_FichierVar').append(value.DatePCR_FichierVar);
				$('#CodeAcc_selection_genetique').append(value.CodeAcc_selection_genetique);
				$('#CodeVar_selection_genetique').append(value.CodeVar_selection_genetique);
				$('#click_Documentation_selection').append(value.click_Documentation_selection);
				$('#CodeDocPdf_FichierVar').append(value.CodeDocPdf_FichierVar);
				$('#Titre_doc_FichierVar').append(value.Titre_doc_FichierVar);
				$('#Auteurs_doc_FichierVar').append(value.Auteurs_doc_FichierVar);
				$('#Date_doc_FichierVar').append(value.Date_doc_FichierVar);
				$('#TypeDoc_doc_FichierVar').append(value.TypeDoc_doc_FichierVar);
				$('#DocCLICABLE_FichierVar').append(value.DocCLICABLE_FichierVar);
				$('#CodeAcc_selection_documentation').append(value.CodeAcc_selection_documentation);
				$('#CodeVar_selection_documentation').append(value.CodeVar_selection_documentation);
				$('#click_Bibliographie_selection').append(value.click_Bibliographie_selection);
				$('#CodeCit_FichierVar').append(value.CodeCit_FichierVar);
				$('#Title_FichierVar').append(value.Title_FichierVar);
				$('#Author_FichierVar').append(value.Author_FichierVar);
				$('#Year_FichierVar').append(value.Year_FichierVar);
				$('#VolumeCitation_FichierVar').append(value.VolumeCitation_FichierVar);
				$('#PagesCitation_FichierVar').append(value.PagesCitation_FichierVar);
				$('#CodeAcc_selection_bibliographie').append(value.CodeAcc_selection_bibliographie);
				$('#CodeVar_selection_bibliographie').append(value.CodeVar_selection_bibliographie);
				$('#click_Partenaire_selection').append(value.click_Partenaire_selection);
				$('#siglePartenaire').append(value.siglePartenaire);
				$('#NomPartenaire').append(value.NomPartenaire);
				$('#sectionPartenaire').append(value.sectionPartenaire);
				$('#click_Lien_selection').append(value.click_Lien_selection);
				$('#CodeLienWeb_FichierVar').append(value.CodeLienWeb_FichierVar);
				$('#Titre_lien_FichierVar').append(value.Titre_lien_FichierVar);
				$('#NomSite_FichierVar').append(value.NomSite_FichierVar);
				$('#Pays_lien_FichierVar').append(value.Pays_lien_FichierVar);
				$('#LienCLICABLE_FichierVar').append(value.LienCLICABLE_FichierVar);
				$('#CodeAcc_selection_lien').append(value.CodeAcc_selection_lien);
				$('#CodeVar_selection_lien').append(value.CodeVar_selection_lien);
			}
		});
	});
	$.getJSON("./json/searchAd.json",function(data){
		$.each(data,function(key, value){
			if(key==="page_principale_fr"){
				$('#title_recherche_avancee').append(value.title_recherche_avancee);
				$('#fieldset_conditions_legend').append(value.fieldset_conditions_legend);
				$('#titile_section').append(value.titile_section);
				$('#titile_Champ').append(value.titile_Champ);
				$('#titile_Modele').append(value.titile_Modele);
				$('#titile_Condition').append(value.titile_Condition);
				$('#titile_Supprimer').append(value.titile_Supprimer);
				$('#go_searchA').append(value.go_searchA);
                                $('#reset_searchA').append(value.reset_searchA);
				$('#recherche_avancee_titleAttention').append(value.recherche_avancee_titleAttention);
				$('#recherche_avancee_Attention').append(value.recherche_avancee_Attention);
				$('#titleResultat_rechreche_avancee').append(value.titleResultat_rechreche_avancee);
			}
			if(key==="section_fr"){
				$('#section_espece_RA').append(value.section_espece_RA);
				$('#section_variete_RA').append(value.section_variete_RA);
				$('#section_accession_RA').append(value.section_accession_RA);
				$('#section_emplacement_RA').append(value.section_emplacement_RA);
				$('#section_sanitaire_RA').append(value.section_sanitaire_RA);
				$('#section_description_RA').append(value.section_description_RA);
				$('#section_aptitude_RA').append(value.section_aptitude_RA);
				$('#section_genetique_RA').append(value.section_genetique_RA);
				$('#section_phototheque_RA').append(value.section_phototheque_RA);
				$('#section_documentation_RA').append(value.section_documentation_RA);
				$('#section_bibliographie_RA').append(value.section_bibliographie_RA);
				$('#section_partenaire_RA').append(value.section_partenaire_RA);
			}
			if(key==="model_fr"){
				$('#section_model_like').append(value.section_model_like);
				$('#section_model_exact').append(value.section_model_exact);
				$('#section_model_start').append(value.section_model_start);
				$('#section_model_finish').append(value.section_model_finish);
			}
		});
	});
});


