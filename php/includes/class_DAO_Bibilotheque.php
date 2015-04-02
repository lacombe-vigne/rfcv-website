<?php

include_once('class_Model_Accession.php');
include_once('class_Model_Aptitude.php');
include_once('class_Model_Bibliographie.php');
include_once('class_Model_Emplacement.php');
include_once('class_Model_Espece.php');
include_once('class_Model_Genetique.php');
include_once('class_Model_Phototheque.php');
include_once('class_Model_Doc.php');
include_once('class_Model_Lien.php');
include_once('class_Model_Morphologique.php');
include_once('class_Model_Sanitaire.php');
include_once('class_Model_Variete.php');
include_once('class_Model_Utilisateur.php');
include_once('class_Model_Partenaire.php');
include_once('class_Model_Site.php');
include_once('bibliFonc.php');

class BibliothequeDAO {

    public function searchSimple($search, $search_complet, $case_s, $model, $langue, $page_espece, $pagesize_espece, $page_variete, $pagesize_variete, $page_accession, $pagesize_accession, $tri_espece_classname, $tri_espece_section, $tri_espece_colone, $tri_variete_classname, $tri_variete_section, $tri_variete_colone, $tri_accession_classname, $tri_accession_section, $tri_accession_colone) {
        // return $search."~~".$search_complet."~~".$case_s."~~".$model."~~".$langue."~~".$page_espece."~~".$pagesize_espece."~~".$page_variete."~~".$pagesize_variete."~~".$page_accession."~~".$pagesize_accession."~~".$tri_espece_classname."~~".$tri_espece_section."~~".$tri_espece_colone."~~".$tri_variete_classname."~~".$tri_variete_section."~~".$tri_variete_colone."~~".$tri_accession_classname."~~".$tri_accession_section."~~".$tri_accession_colone;
        $DAO = new BibliothequeDAO();
        if ($tri_espece_section == 1) {
            $tri_espece = "order by " . $tri_espece_colone . " asc";
        }
        if ($tri_espece_section == 2) {
            $tri_espece = "order by " . $tri_espece_colone . " desc";
        }
        if ($tri_variete_section == 1) {
            $tri_variete = "order by " . $tri_variete_colone . " asc";
        }
        if ($tri_variete_section == 2) {
            $tri_variete = "order by " . $tri_variete_colone . " desc";
        }
        if ($tri_accession_section == 1) {
            $tri_accession = "order by " . $tri_accession_colone . " asc";
        }
        if ($tri_accession_section == 2) {
            $tri_accession = "order by " . $tri_accession_colone . " desc";
        }
        if ($case_s != "" && $model != "" && $search != "") {

            switch ($case_s) {
                case "complet":
                    switch ($model) {
                        case "tous":
                            if (isset($_SESSION['codePersonne'])) {
                                //espece
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "')) " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "'))";
                                $total_espece = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "'))";
                                //variete
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "'))";

                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "'))";
                                } else {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(NomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(NomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')";

                                    $total_variete = "select * from `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(NomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "'))";
                                }
                                //accession
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    //sup_admin
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays 
                                    where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "')) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays 
                                    where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";
                                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                    //utilisateur admin_partenaire
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";
                                } else { //utilisateur D
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                    SiregalPresenceEnColl ='oui' and(
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))" . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
                                    SiregalPresenceEnColl ='oui' and(
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";
                                }
                            } else {

                                //espece
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "')) and public!='N' " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "')) and public!='N'";
                                $total_espece = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "'))";
                                //variete
                                $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) and public!='N'";

                                $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "'))";
                                //accession
                                $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                $sql_accession = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a' and SiregalPresenceEnColl = 'oui'  " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a' and SiregalPresenceEnColl = 'oui'";

                                $total_accession = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";
                            }
                            break;
                        case "especes":

                            if (isset($_SESSION['codePersonne'])) {
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "')) " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "'))";
                                $total_espece = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "'))";
                            } else {
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "')) and public!='N' " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "')) and public!='N'";
                                $total_espece = "select * from `NV-ESPECES` where (upper(Espece)=upper('" . $search_complet . "') OR upper(CodeEsp)=upper('" . $search_complet . "'))";
                            }
                            break;
                        case "varietes":

                            if (isset($_SESSION['codePersonne'])) {
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "'))";

                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "'))";
                                } else {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(NomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(NomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')";

                                    $total_variete = "select * from `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(NomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "'))";
                                }
                            } else {
                                $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "')) and public!='N'";

                                $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (upper(nomVar)=upper('" . $search_complet . "') OR upper(SynoMajeur)=upper('" . $search_complet . "') OR upper(CodeVar)=upper('" . $search_complet . "'))";
                            }

                            break;
                        case "accession":
                            if (isset($_SESSION['codePersonne'])) {
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    //sup_admin
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "')) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";
                                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                    //utilisateur admin_partenaire
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";
                                } else { //utilisateur D
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                    SiregalPresenceEnColl ='oui' and(
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))" . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
                                    SiregalPresenceEnColl ='oui' and(
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $search_complet . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";
                                }
                            } else {
                                $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                $sql_accession = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a' and SiregalPresenceEnColl = 'oui'  " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a' and SiregalPresenceEnColl = 'oui'";

                                $total_accession = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (upper(NomIntro)=upper('" . $search_complet . "') OR upper(CodeIntro)=upper('" . $search_complet . "'))";
                            }

                            break;
                    }
                    break;
                case "start":
                    switch ($model) {

                        case "tous":

                            if (isset($_SESSION['codePersonne'])) {
                                //espece
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "') " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "')";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "')";
                                //variete
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "')";

                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "')";
                                } else {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')";
                                    ///
                                    $total_variete = "select * from `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (NomVar REGEXP '^" . $search . "' or SynoMajeur REGEXP '^" . $search . "' or CodeVar REGEXP '^" . $search . "')";
                                }
                                //accession
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    //sup_admin
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "') " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";
                                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                    //utilisateur admin_partenaire
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))" . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";
                                } else {//utilisateur D
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";
                                }
                            } else {
                                //espece
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "') and public!='N' " . $tri_espece . "  limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "') and public!='N'";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "')";
                                //variete
                                $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') and public!='N'";

                                $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "')";
                                //accession
                                $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                $sql_accession = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "') and IdReseau1='a' and SiregalPresenceEnColl = 'oui' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "') and IdReseau1='a' and SiregalPresenceEnColl = 'oui'";

                                $total_accession = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";
                            }

                            break;

                        case "especes":

                            if (isset($_SESSION['codePersonne'])) {
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "') " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "')";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "')";
                            } else {
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "') and public!='N' " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "') and public!='N'";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '^" . $search . "' OR CodeEsp REGEXP '^" . $search . "')";
                            }

                            break;

                        case "varietes":
                            if (isset($_SESSION['codePersonne'])) {
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "')";

                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "')";
                                } else {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')";
                                    ///
                                    $total_variete = "select * from `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (NomVar REGEXP '^" . $search . "' or SynoMajeur REGEXP '^" . $search . "' or CodeVar REGEXP '^" . $search . "')";
                                }
                            } else {
                                $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "') and public!='N'";

                                $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '^" . $search . "' OR SynoMajeur REGEXP '^" . $search . "' OR CodeVar REGEXP '^" . $search . "')";
                            }
                            break;

                        case "accession":
                            if (isset($_SESSION['codePersonne'])) {
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    //sup_admin
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "') " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";
                                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                    //utilisateur admin_partenaire
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))" . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";
                                } else {//utilisateur D
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $search . "' or CodeIntro REGEXP '^" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";
                                }
                            } else {
                                $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                $sql_accession = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "') and IdReseau1='a' and SiregalPresenceEnColl = 'oui'  " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "') and IdReseau1='a' and SiregalPresenceEnColl = 'oui' ";

                                $total_accession = "select * from `NV-INTRODUCTIONS`
                                LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '^" . $search . "' OR CodeIntro REGEXP '^" . $search . "')";
                            }
                            break;
                    }
                    break;

                case "fuzzy":

                    switch ($model) {

                        case "tous":
                            if (isset($_SESSION['codePersonne'])) {
                                //espece
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "') " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "')";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "')";
                                //variete
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "')";

                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "')";
                                } else {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')";
                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (NomVar REGEXP '" . $search . "' or SynoMajeur REGEXP '" . $search . "' or CodeVar REGEXP '" . $search . "')";
                                }
                                //accession
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    //sup_admin
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "') " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "') ";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "') ";
                                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                    //utilisateur admin_partenaire
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))" . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "')";
                                } else { // utilisateur D
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "')";
                                }
                            } else {
                                //espece
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "') and public!='N' " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "') and public!='N'";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "')";
                                //variete
                                $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') and public!='N'";

                                $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "')";
                                //accession
                                $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "') and IdReseau1='a' and SiregalPresenceEnColl = 'oui' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "') and IdReseau1='a' and SiregalPresenceEnColl = 'oui' ";
                                $total_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "')";
                            }
                            break;

                        case "especes":
                            if (isset($_SESSION['codePersonne'])) {
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "') " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "')";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "')";
                            } else {
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "') and public!='N' " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "') and public!='N'";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "' OR CodeEsp REGEXP '" . $search . "')";
                            }
                            break;

                        case "varietes":
                            if (isset($_SESSION['codePersonne'])) {
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "')";

                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "')";
                                } else {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')";
                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (NomVar REGEXP '" . $search . "' or SynoMajeur REGEXP '" . $search . "' or CodeVar REGEXP '" . $search . "')";
                                }
                            } else {
                                $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "') and public!='N'";

                                $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "' OR SynoMajeur REGEXP '" . $search . "' OR CodeVar REGEXP '" . $search . "')";
                            }
                            break;

                        case "accession":
                            if (isset($_SESSION['codePersonne'])) {
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    //sup_admin
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "') " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "')";

                                    $total_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "')";
                                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                    //utilisateur admin_partenaire
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))" . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "')";
                                } else { // utilisateur D
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";

                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' OR CodeIntro REGEXP '" . $search . "')";
                                }
                            } else {
                                $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                $sql_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a' and SiregalPresenceEnColl = 'oui' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";

                                $sql_accession_possible = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "') and IdReseau1='a' and SiregalPresenceEnColl = 'oui'";

                                $total_accession = "select * from `NV-INTRODUCTIONS` 
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "' or CodeIntro REGEXP '" . $search . "')";
                            }
                            break;
                    }

                    break;

                case "end":

                    switch ($model) {
                        case "tous":
                            if (isset($_SESSION['codePersonne'])) {
                                //espece
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$') " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$')";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$')";
                                //variete
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$')";

                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$')";
                                } else {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')";
                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (NomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$')";
                                }
                                //accession
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    //sup_admin
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$') " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                    //utilisateur admin_partenaire SiregalPresenceEnColl = 'oui' and(
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . " ";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                                } else { // utilisateur D
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
                                    SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . " ";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                    SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                                }
                            } else {
                                //espece
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$') and public!='N' " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$') and public!='N'";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$')";
                                //variete
                                $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') and public!='N'";

                                $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$')";
                                //accession
                                $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$') and IdReseau1='a' and SiregalPresenceEnColl = 'oui' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$') and IdReseau1='a' and SiregalPresenceEnColl = 'oui'";
                                $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                            }
                            break;

                        case "especes":
                            if (isset($_SESSION['codePersonne'])) {
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$') " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$')";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$')";
                            } else {
                                $startPage_espece = ($page_espece - 1) * $pagesize_espece;
                                $sql_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$') and public!='N' " . $tri_espece . " limit " . $startPage_espece . "," . $pagesize_espece . "";
                                $sql_espece_possible = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$') and public!='N'";
                                $total_espece = "select * from `NV-ESPECES` where (Espece REGEXP '" . $search . "$' OR CodeEsp REGEXP '" . $search . "$')";
                            }
                            break;

                        case "varietes":
                            if (isset($_SESSION['codePersonne'])) {
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$')";

                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$')";
                                } else {
                                    $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                    $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
                                    $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')";
                                    $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (NomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$')";
                                }
                            } else {
                                $startPage_variete = ($page_variete - 1) * $pagesize_variete;
                                $sql_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";

                                $sql_variete_possible = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$') and public!='N'";

                                $total_variete = "select * from `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays where (nomVar REGEXP '" . $search . "$' OR SynoMajeur REGEXP '" . $search . "$' OR CodeVar REGEXP '" . $search . "$')";
                            }
                            break;

                        case "accession":
                            if (isset($_SESSION['codePersonne'])) {
                                if ($_SESSION['ProfilPersonne'] == 'A') {
                                    //sup_admin
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$') " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                    //utilisateur admin_partenaire SiregalPresenceEnColl = 'oui' and(
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . " ";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                                } else { // utilisateur D
                                    $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                    $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
                                    SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . " ";
                                    ///
                                    $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                    SiregalPresenceEnColl = 'oui' and(
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $search . "$' or CodeIntro REGEXP '" . $search . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                                    $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                                }
                            } else {
                                $startPage_accession = ($page_accession - 1) * $pagesize_accession;
                                $sql_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$') and IdReseau1='a' and SiregalPresenceEnColl = 'oui' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession . "";
                                $sql_accession_possible = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$') and IdReseau1='a' and SiregalPresenceEnColl = 'oui'";
                                $total_accession = "select * from `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where (NomIntro REGEXP '" . $search . "$' OR CodeIntro REGEXP '" . $search . "$')";
                            }
                            break;
                    }

                    break;
            }

            $tri_espece = array("classname" => $tri_espece_classname, "section" => $tri_espece_section, "colone" => $tri_espece_colone);
            $tri_variete = array("classname" => $tri_variete_classname, "section" => $tri_variete_section, "colone" => $tri_variete_colone);
            $tri_accession = array("classname" => $tri_accession_classname, "section" => $tri_accession_section, "colone" => $tri_accession_colone);
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            if ($sql_espece != "") {
                $espece = $DAO->chargeContentEspece($sql_espece, $total_espece, $page_espece, $pagesize_espece, $sql_espece_possible);
                $_SESSION['resultatEsp'] = $sql_espece_possible;
            }
            if ($sql_variete != "") {
                $variete = $DAO->chargeContentVariete($sql_variete, $total_variete, $_SESSION['language_Vigne'], $page_variete, $pagesize_variete, $sql_variete_possible);
                //$_SESSION['test'] = $variete;
                $_SESSION['resultatVar'] = $sql_variete_possible;
            }
            if ($sql_accession != "") {
                $accession = $DAO->chargeContentAccession($sql_accession, $total_accession, $_SESSION['language_Vigne'], $page_accession, $pagesize_accession, $sql_accession_possible);
                $_SESSION['resultatIntro'] = $sql_accession_possible;
            }
            deconnexion_bbd();
            $res = array("search" => $search_complet, "case_s" => $case_s, "model" => $model, "langue" => $langue, "tri_espece" => $tri_espece, "tri_variete" => $tri_variete, "tri_accession" => $tri_accession, "espece" => $espece, "variete" => $variete, "accession" => $accession);
        } else {
            $res = "";
        }
        return $res;
    }

    public function chargeContentEspece($a, $b, $c, $d, $f) {
        $espece = array();
        $espece['page'] = array();
        $espece['page']['curpage'] = $c;
        $espece['page']['pagesize'] = $d;
        $resultat_especes = mysql_query($a) or die(mysql_error());
        if (!$resultat_especes) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_especes) == 0) {
            $nombreDeResultatPossibleEspeces = 0;
            $espece['nombreDeResultatPossible'] = $nombreDeResultatPossibleEspeces;
            $espece['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_especes) > 0) {
            $contents_espece = array();
            $resultat_possible_espece = mysql_query($f) or die(mysql_error());
            $totalPage_espece = ceil(mysql_num_rows($resultat_possible_espece) / $d);
            $espece['page']['pagetotal'] = $totalPage_espece;
            $nombreDeResultatPossibleEspeces = mysql_num_rows($resultat_possible_espece);
            $espece['nombreDeResultatPossible'] = $nombreDeResultatPossibleEspeces;
            for ($i = 0; $i < (mysql_num_rows($resultat_especes)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat_especes);
                $ESP = new Espece($dico['CodeEsp'], $dico['Espece'], $dico['Botaniste'], $dico['Genre'], $dico['CompoGenet'], $dico['SousGenre'], $dico['Validite'], $dico['Tronc'], $dico['RemarqueEsp']);
                $content_espece = supprNull($ESP->getListeEspece());
                array_push($contents_espece, $content_espece);
            }
            $espece['contents'] = $contents_espece;
        }
        $resultat_especes_total = mysql_query($b) or die(mysql_error());
        if (!$resultat_especes_total) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {
            $nombreDeResultatTotalEspeces = mysql_num_rows($resultat_especes_total);
            $espece['nombreDeResultatTotal'] = $nombreDeResultatTotalEspeces;
        }
        return $espece;
    }

    public function chargeContentVariete($a, $b, $langue, $d, $e, $f) {
        $DAO = new BibliothequeDAO();
        $variete = array();
        $variete['page'] = array('curpage' => $d, 'pagesize' => $e);
        $resultat_variete = mysql_query($a) or die(mysql_error());
        if (!$resultat_variete) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows(resultat_variete) == 0) {
            $nombreDeResultatPossibleVarietes = 0;
            $variete['nombreDeResultatPossible'] = $nombreDeResultatPossibleVarietes;
            $variete['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_variete) > 0) {
            $resultat_possible_variete = mysql_query($f) or die(mysql_error());
            $totalPage_variete = ceil(mysql_num_rows($resultat_possible_variete) / $e);
            $variete['page']['pagetotal'] = $totalPage_variete;
            $nombreDeResultatPossibleVarietes = mysql_num_rows($resultat_possible_variete);
            $variete['nombreDeResultatPossible'] = $nombreDeResultatPossibleVarietes;
            $contents_variete = array();
            for ($i = 0; $i < (mysql_num_rows($resultat_variete)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat_variete);
                if ($langue == "FR") {
                    $saveur = $dico['Saveur_Texte'];
                    $pepins = $dico['Pepins_texte'];
                    $couleur = $dico['CouleurPel_Texte'];
                    $sexe = $dico['Sexe_texte'];
                    $pays = $dico['NomPaysFrancais'];
                    $utilite = $dico['Utilite_Texte'];
                } else if ($langue == "EN") {
                    $saveur = $dico['Saveur_Texte_en'];
                    $pepins = $dico['Pepins_texte_en'];
                    $couleur = $dico['CouleurPel_Texte_en'];
                    $sexe = $dico['Sexe_texte_en'];
                    $pays = $dico['NomPaysLocal'];
                    $utilite = $dico['Utilite_texte_anglais'];
                }
                $VAR = new Variete($dico['CodeVar'], $dico['NomVar'], $dico['SynoMajeur'], $dico['NumVarOnivins'], $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['UniteVar'], $dico['CodeType'], $dico['Espece'], $couleur, $dico['CouleurPulp'], $saveur, $pepins, $dico['Obtenteur'], $utilite, $dico['CodeEsp'], $sexe, $pays, $dico['RegionOrigine'], $dico['DepartOrigine'], $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['NumVarOnivins'], $dico['InscriptionEurope'], $dico['Obtenteur'], $dico['MereReelle'], $dico['AnneeObtention'], $dico['CodeVarMereReelle'], $dico['MereObt'], $dico['PereReel'], $dico['CodeCroisementINRA'], $dico['CodeVarPereReel'], $dico['PereObt'], $dico['RemarqueParenteReelle'], $dico['DepartOrigine'], $dico['RemarquesVar']);
                $content_variete = supprNull($VAR->getListeVariete());
                array_push($contents_variete, $content_variete);
            }
            $variete['contents'] = $contents_variete;
        }
        $resultat_variete_total = mysql_query($b) or die(mysql_error());
        if (!$resultat_variete_total) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {
            $nombreDeResultatTotalVarietes = mysql_num_rows($resultat_variete_total);
            $variete['nombreDeResultatTotal'] = $nombreDeResultatTotalVarietes;
        }
        return $variete;
    }

    public function chargeContentAccession($a, $b, $langue, $d, $e, $f) {
        $DAO = new BibliothequeDAO();
        $accession['page'] = array('curpage' => $d, 'pagesize' => $e);
        $resultat_accession = mysql_query($a) or die(mysql_error());
        if (!$resultat_accession) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_accession) == 0) {
            $nombreDeResultatPossibleIntros = 0;
            $accession['nombreDeResultatPossible'] = $nombreDeResultatPossibleIntros;
            $accession['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_accession) > 0) {
            $resultat_possible_accession = mysql_query($f) or die(mysql_error());
            $totalPage_accession = ceil((mysql_num_rows($resultat_possible_accession)) / $e);
            $accession['page']['pagetotal'] = $totalPage_accession;
            $nombreDeResultatPossibleIntros = mysql_num_rows($resultat_possible_accession);
            $accession['nombreDeResultatPossible'] = $nombreDeResultatPossibleIntros;
            $contents_accession = array();
            for ($i = 0; $i < (mysql_num_rows($resultat_accession)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat_accession);
                if ($langue == "FR") {
                    $pays = $dico['NomPaysFrancais'];
                } else if ($langue == "EN") {
                    $pays = $dico['NomPaysLocal'];
                }
                $DateEntre = $dico['JourMAJ'] . "/" . $dico['MoisMAJ'] . "/" . $dico['AnneeMAJ'];
                $ACC = new Accession($dico['CodeIntro'], $dico['NomIntro'], $dico['NomVar'], $dico['NomPartenaire'], $pays, $dico['CommuneProvenance'], $dico['AnneeEntree'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $dico['CouleurPelIntro'], $dico['CouleurPulpIntro'], $dico['PepinsIntro'], $dico['SaveurIntro'], $dico['SexeIntro'], $dico['Statut'], $DateEntre, $dico['Collecteur'], $dico['AdresProvenance'], $dico['SiteProvenance'], $dico['CodePartenaire'], $dico['UniteIntro'], $dico['AnneeAgrement'], $dico['Collecteur'], $dico['TypeCollecteur'], $dico['ContinentProvenance'], $dico['CommuneProvenance'], $dico['CodPostProvenance'], $dico['SiteProvenance'], $dico['AdresProvenance'], $dico['ProprietProvenance'], $dico['ParcelleProvenance'], $dico['TypeParcelleProvenance'], $dico['RangProvenance'], $dico['SoucheProvenance'], $dico['SoucheTheoriqueProvenance'], $dico['PaysProvenance'], $dico['RegionProvenance'], $dico['DepartProvenance'], $langue, $dico['evdb_15-LATITUDE'], $dico['evdb_16-LONGITUDE'], $dico['evdb_17-ELEVATION'], $dico['JourEntree'], $dico['MoisEntree'], $dico['AnneeEntree'], $dico['CodeIntroProvenance'], $dico['CodeEntree'], $dico['ReIntroduit'], $dico['IssuTraitement'], $dico['CloneTraite'], $dico['RemarquesProvenance'], $dico['CollecteurAnt'], $dico['TypeCollecteurAnt'], $dico['ContinentProvAnt'], $dico['CommuneProvAnt'], $dico['CodPostProvAnt'], $dico['SiteProvAnt'], $dico['AdresProvAnt'], $dico['ProprietProvAnt'], $dico['ParcelleProvAnt'], $dico['TypeParcelleProvAnt'], $dico['RangProvAnt'], $dico['SoucheProvAnt'], $dico['SoucheTheoriqueProvAnt'], $dico['PaysProvAnt'], $dico['RegionProvAnt'], $dico['DepartProvAnt'], $dico['CodeIntroProvenanceAnt'], $dico['evdb_ID_VITIS'], $dico['evdb_F-ConfirmAmpelo'], $dico['evdb_G-ConfirmSSR'], $dico['evdb_I-BiblioVolume'], $dico['evdb_L-ConfirmOther'], $dico['evdb_I-BiblioVolume'], $dico['evdb_K-BiblioPage'], $dico['evdb_M-RemarkAccessionName'], $dico['CouleurPelIntro'], $dico['CouleurPulpIntro'], $dico['SaveurIntro'], $dico['PepinsIntro'], $dico['SexeIntro'], $dico['NumTempCTPS'], $dico['DelegONIVINS'], $dico['Statut'], $dico['DepartAgrementClone'], $dico['AnneeAgrement'], $dico['SiteAgrementClone'], $dico['AnneeNonCertifiable'], $dico['LieuDepotMatInitial'], $dico['SurfMulti'], $dico['NomPartenaire'], $dico['NomPartenaire2'], $dico['Famille'], $dico['Agrement'], $dico['NumCloneCTPS'], $dico['SiregalPresenceEnColl'], $dico['MTAactif'], $dico['RemarquesIntro']);
                $content_accession = supprNull($ACC->getListeAccession());
                // $content_accession="";
                array_push($contents_accession, $content_accession);
            }
            $accession['contents'] = $contents_accession;
        }
        $resultat_accession_total = mysql_query($b) or die(mysql_error());
        if (!$resultat_accession_total) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {

            $nombreDeResultatTotalAccession = mysql_num_rows($resultat_accession_total);
            $accession['nombreDeResultatTotal'] = $nombreDeResultatTotalAccession;
        }
        return $accession;
    }

    public function chargeContentEmplacement($sql_limite, $sql_total, $page, $pagesize, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $emplacement['page'] = array('curpage' => $page, 'pagesize' => $pagesize);
        $resultat_emplacement = mysql_query($sql_limite) or die(mysql_error());
        if (!$resultat_emplacement) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_emplacement) == 0) {
            $nombreDeResultatPossibleEmplacem = 0;
            $emplacement['nombreDeResultatPossible'] = $nombreDeResultatPossibleEmplacem;
            $emplacement['page']['pagetotal'] = 1;
        }

        if (mysql_num_rows($resultat_emplacement) > 0) {
            $resultat_possible_emplacement = mysql_query($sql_possible) or die(mysql_error());
            $totalPage_emplacement = ceil((mysql_num_rows($resultat_possible_emplacement)) / $pagesize);
            $emplacement['page']['pagetotal'] = $totalPage_emplacement;
            $nombreDeResultatPossibleEmplacem = mysql_num_rows($resultat_possible_emplacement);
            $emplacement['nombreDeResultatPossible'] = $nombreDeResultatPossibleEmplacem;
            $Em_Contents = array();
            for ($j = 0; $j < (mysql_num_rows($resultat_emplacement)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_emplacement);
                $EM = new Emplacement($dico['CodeEmplacem'], $dico['CodeSite'], $dico['Parcelle'], $dico['Rang'], $dico['PremiereSouche'], $dico['DerniereSouche'], $dico['NomIntro'], $dico['CodeIntro'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $dico['CodeIntroPartenaire'], $dico['NumCloneCTPS-PG'], $dico['AnneePlantation'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $DAO->site($dico['CodeSite']), $dico['Zone'], $dico['SousPartie'], $dico['NbreEtatNormal'], $dico['NbreEtatMoyen'], $dico['NbreEtatMoyFaible'], $dico['NbreEtatFaible'], $dico['NbreEtatTresFaible'], $dico['NbreEtatMort'], $dico['TypeSouche'], $dico['AnneeElimination'], $dico['CategMateriel'], $dico['Greffe'], $dico['PorteGreffe']);
                $Em_Content = supprNull($EM->getListeEmplaclemnt());
                array_push($Em_Contents, $Em_Content);
            }
            $emplacement['contents'] = $Em_Contents;
        }
        $resultat_emplacement_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_emplacement_total) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {
            $nombreDeResultatTotalEmplacement = mysql_num_rows($resultat_emplacement_total);
            $emplacement['nombreDeResultatTotal'] = $nombreDeResultatTotalEmplacement;
        }
        $emplacement['langue'] = $_SESSION['language_Vigne'];
        // $res=array('emplacement'=>$emplacement);
        return $emplacement;
    }

    public function chargeContentSanitaire($sql_limite, $sql_total, $page, $pagesize, $langue, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $sanitaire['page'] = array('curpage' => $page, 'pagesize' => $pagesize);
        $resultat_sanitaire = mysql_query($sql_limite) or die(mysql_error());
        if (!$resultat_sanitaire) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_sanitaire) == 0) {
            $nombreDeResultatPossibleSanitaire = 0;
            $sanitaire['nombreDeResultatPossible'] = $nombreDeResultatPossibleSanitaire;
            $sanitaire['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_sanitaire) > 0) {
            $resultat_possible_sanitaire = mysql_query($sql_possible) or die(mysql_error());
            $totalPage_sanitaire = ceil((mysql_num_rows($resultat_possible_sanitaire)) / $pagesize);
            $sanitaire['page']['pagetotal'] = $totalPage_sanitaire;
            $nombreDeResultatPossibleSanitaire = mysql_num_rows($resultat_possible_sanitaire);
            $sanitaire['nombreDeResultatPossible'] = $nombreDeResultatPossibleSanitaire;
            $San_Contents = array();
            if ($langue == 'FR') {
                for ($j = 0; $j < (mysql_num_rows($resultat_sanitaire)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat_sanitaire);
                    if ($dico['JourTest'] == "") {
                        $jour = '00';
                    } else {
                        $jour = $dico['JourTest'];
                    }
                    if ($dico['MoisTest'] == "") {
                        $mois = '00';
                    } else {
                        $mois = $dico['MoisTest'];
                    }
                    if ($dico['AnneeTest'] == "") {
                        $annee = '0000';
                    } else {
                        $annee = $dico['AnneeTest'];
                    }
                    $dateTest = $jour . '-' . $mois . '-' . $annee;
                    $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $dico['ResultatTest'], $dico['CategorieTest'], $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $dico['NomFranComplet'], $dico['IdTest'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomFranComplet'], $dico['CodeEmplacem'], $dico['NomPartenaire'], $dico['CodePartenaire']);
                    $San_Content = supprNull($SAN->getListeSanitaire());
                    array_push($San_Contents, $San_Content);
                }
            } else {
                for ($j = 0; $j < (mysql_num_rows($resultat_sanitaire)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat_sanitaire);
                    if ($dico['JourTest'] == "") {
                        $jour = '00';
                    } else {
                        $jour = $dico['JourTest'];
                    }
                    if ($dico['MoisTest'] == "") {
                        $mois = '00';
                    } else {
                        $mois = $dico['MoisTest'];
                    }
                    if ($dico['AnneeTest'] == "") {
                        $annee = '0000';
                    } else {
                        $annee = $dico['AnneeTest'];
                    }
                    $dateTest = $jour . '-' . $mois . '-' . $annee;
                    $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $dico['ResultatTest_en'], $dico['CategMateriel_en'], $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $dico['JY_NomEngComplet'], $dico['IdTest'], $dico['NomIntro'], $dico['CodeIntro'], $dico['JY_NomEngComplet'], $dico['CodeEmplacem'], $dico['NomPartenaire'], $dico['CodePartenaire']);
                    $San_Content = supprNull($SAN->getListeSanitaire());
                    array_push($San_Contents, $San_Content);
                }
            }

            $sanitaire['contents'] = $San_Contents;
            $sanitaire['langue'] = $langue;
        }
        $resultat_sanitaire_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_sanitaire_total) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {
            $nombreDeResultatTotalSanitaire = mysql_num_rows($resultat_sanitaire_total);
            $sanitaire['nombreDeResultatTotal'] = $nombreDeResultatTotalSanitaire;
        }
        $res = $sanitaire;
        return $res;
    }

    public function chargeContentMorphologique($sql_limite, $sql_total, $page, $pagesize, $langue, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $description['page'] = array('curpage' => $page, 'pagesize' => $pagesize);
        $resultat = mysql_query($sql_limite) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $nombreDeResultatPossibleIntros = 0;
            $description['nombreDeResultatPossible'] = $nombreDeResultatPossibleIntros;
            $description['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat) > 0) {
            $resultat_possible = mysql_query($sql_possible) or die(mysql_error());
            $totalPage = ceil((mysql_num_rows($resultat_possible)) / $pagesize);
            $description['page']['pagetotal'] = $totalPage;
            $nombreDeResultatPossible = mysql_num_rows($resultat_possible);
            $description['nombreDeResultatPossible'] = $nombreDeResultatPossible;
            $contents = array();
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($_SESSION['language_Vigne'] == "FR") {
                    $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripFRA'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $dico['NodeVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['LibelleDescripFRA'], $dico['CodeOIV'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodePersonne'], $dico['NomPartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                }
                if ($_SESSION['language_Vigne'] == "EN") {
                    $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripFRA'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $dico['NodeVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['LibelleDescripFRA'], $dico['CodeOIV'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodePersonne'], $dico['NomPartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                }
                $content = supprNull($MOR->getListeMorphologique());
                array_push($contents, $content);
            }
            $description['contents'] = $contents;
        }
        $resultat_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_total) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {
            $nombreDeResultatTotalAccession = mysql_num_rows($resultat_total);
            $description['nombreDeResultatTotal'] = $nombreDeResultatTotalAccession;
        }
        $description['langue'] = $langue;
        $res = $description;
        return $res;
    }

    public function chargeContentAptitude($sql_limite, $sql_total, $page, $pagesize, $langue, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $aptitude['page'] = array('curpage' => $page, 'pagesize' => $pagesize);
        $resultat = mysql_query($sql_limite) or die(mysql_error());
        if (!$resultat) {

            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $nombreDeResultatPossibleIntros = 0;
            $aptitude['nombreDeResultatPossible'] = $nombreDeResultatPossibleIntros;
            $aptitude['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat) > 0) {
            $resultat_possible = mysql_query($sql_possible) or die(mysql_error());
            $totalPage = ceil((mysql_num_rows($resultat_possible)) / $pagesize);
            $aptitude['page']['pagetotal'] = $totalPage;
            $nombreDeResultatPossible = mysql_num_rows($resultat_possible);
            $aptitude['nombreDeResultatPossible'] = $nombreDeResultatPossible;
            $contents = array();
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $date = $dico['JourExpe'] . '/' . $dico['MoisExpe'] . '/' . $dico['AnneeExpe'];
                $APT = new Aptitude($dico['CodeAptitude'], $dico['CodeVar'], $DAO->nomCaract($dico['CodeCaract']), $dico['ValeurCaractNum'], $DAO->uniteCarct($dico['CodeCaract']), $dico['Ponderation'], $date, $dico['CodeSite'], $dico['CodePartenaire'], $dico['CodeAptitude'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $DAO->nomCaract($dico['CodeCaract']), $dico['ValeurCaractNum'], $DAO->uniteCarct($dico['CodeCaract']), $dico['Ponderation'], $dico['CodePersonneExpe'], $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                $content = supprNull($APT->getListeAptitude());
                array_push($contents, $content);
            }

            $aptitude['contents'] = $contents;
        }

        $resultat_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_total) {

            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {

            $nombreDeResultatTotalAccession = mysql_num_rows($resultat_total);
            $aptitude['nombreDeResultatTotal'] = $nombreDeResultatTotalAccession;
        }
        $aptitude['langue'] = $langue;
        $res = $aptitude;
        return $res;
    }

    public function chargeContentGenetique($sql_limit, $sql_total, $page, $pagesize, $langue, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $genetique['page'] = array('curpage' => $page, 'pagesize' => $pagesize);
        $resultat_genetique = mysql_query($sql_limit) or die(mysql_error());
        if (!$resultat_genetique) {

            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_genetique) == 0) {

            $nombreDeResultatPossibleIntros = 0;
            $genetique['nombreDeResultatPossible'] = $nombreDeResultatPossibleIntros;
            $genetique['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_genetique) > 0) {
            $contents_genetique = array();
            $resultat_possible_genetique = mysql_query($sql_possible) or die(mysql_error());
            $totalPage_genetique = ceil((mysql_num_rows($resultat_possible_genetique)) / $pagesize);
            $genetique['page']['pagetotal'] = $totalPage_genetique;
            $nombreDeResultatPossibleIntros = mysql_num_rows($resultat_possible_genetique);
            $genetique['nombreDeResultatPossible'] = $nombreDeResultatPossibleIntros;
            $contents_genetique = array();
            for ($i = 0; $i < (mysql_num_rows($resultat_genetique)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat_genetique);
                $genetique_class = new Genetique($dico['IdAnalyse'], $dico['Marqueur'], $dico['ValeurCodee1'], $dico['ValeurCodee2'], $dico['CodePartenaire'], $dico['DatePCR'], $dico['NomVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['EmplacemRecolte'], $dico['SouchePrelev'], $dico['DateRecolte'], $dico['IdProtocoleRecolte'], $dico['TypeOrgane'], $dico['IdStockADN'], $dico['IdProtocolePCR'], $dico['DatePCR'], $dico['DateRun'], $dico['CodePartenaire']);
                $content_genetique = $genetique_class->getListeGenetique();
                array_push($contents_genetique, $content_genetique);
            }
            $genetique['contents'] = $contents_genetique;
        }

        $resultat_genetique_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_genetique_total) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {
            $nombreDeResultatTotalgenetique = mysql_num_rows($resultat_genetique_total);
            $genetique['nombreDeResultatTotal'] = $nombreDeResultatTotalgenetique;
        }
        $genetique['langue'] = $langue;
        // $res=array('genetique'=>$genetique);
        return $genetique;
    }

    public function chargeContentBibliographie($sql_limite, $sql_total, $page, $pagesize, $langue, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $bibliographie['page'] = array('curpage' => $page, 'pagesize' => $pagesize);
        $resultat_bibliographie = mysql_query($sql_limite) or die(mysql_error());
        if (!$resultat_bibliographie) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_bibliographie) == 0) {
            $nombreDeResultatPossibleBibliographie = 0;
            $bibliographie['nombreDeResultatPossible'] = $nombreDeResultatPossibleBibliographie;
            $bibliographie['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_bibliographie) > 0) {
            $resultat_possible_bibliographie = mysql_query($sql_possible) or die(mysql_error());

            $totalPage_bibliographie = ceil((mysql_num_rows($resultat_possible_bibliographie)) / $pagesize);
            $bibliographie['page']['pagetotal'] = $totalPage_bibliographie;
            $nombreDeResultatPossibleBibliographie = mysql_num_rows($resultat_possible_bibliographie);
            $bibliographie['nombreDeResultatPossible'] = $nombreDeResultatPossibleBibliographie;
            $BI_Contents = array();
            for ($j = 0; $j < (mysql_num_rows($resultat_bibliographie)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_bibliographie);
                $BI = new Bibliograhpie($dico['CodeCit'], $dico['CodeVar'], $dico['Title'], $dico['Author'], $dico['Year'], $dico['PagesCitation'], $dico['VolumeCitation'], $DAO->nomAcc($dico['CodeIntro']), $DAO->nomVar($dico['CodeVar']), $dico['CodeIntro'], $dico['TypeDoc'], $dico['Edition'], $dico['Publisher'], $dico['PlacePublished'], $dico['ISBN'], $dico['Language'], $dico['NumberOfVolumes'], $dico['PagesDoc'], $dico['CallNumber'], $dico['AuteurCitation'], $dico['NomVigneCite']);
                $BI_Content = supprNull($BI->getListeBibliographie());
                array_push($BI_Contents, $BI_Content);
            }

            $bibliographie['contents'] = $BI_Contents;
            $bibliographie['langue'] = $langue;
        }

        $resultat_bibliographie_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_bibliographie_total) {

            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {

            $nombreDeResultatTotalSanitaire = mysql_num_rows($resultat_bibliographie_total);
            $bibliographie['nombreDeResultatTotal'] = $nombreDeResultatTotalSanitaire;
        }

        $res = $bibliographie;
        return $res;
    }

    public function chargeContentPhototheque($sql_limite, $langue) {
        $DAO = new BibliothequeDAO();
        $resultat_phototheque = mysql_query($sql_limite) or die(mysql_error());
        if (!$resultat_phototheque) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_phototheque) == 0) {
            $nombreDeResultatPossibleSanitaire = 0;
            $phototheque = null;
        }
        if (mysql_num_rows($resultat_phototheque) > 0) {
            $resultat_possible_phototheque = mysql_query($sql_limite) or die(mysql_error());
            ;
            $PHO_Contents = array();
            for ($j = 0; $j < (mysql_num_rows($resultat_phototheque)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_phototheque);
                $DatePhoto = $dico['JourMAJ'] . "/" . $dico['MoisMAJ'] . "/" . $dico['AnneeMAJ'];
                $FichierPhoto = "./PhotosVignes/" . $dico['FichierPhoto'];
                $PHO = new Phototheque($dico['CodePhoto'], $DAO->organePhoto($dico['OrganePhoto'], $langue), $dico['CouleurPhoto'], $DAO->typePhoto($dico['TypePhoto'], $langue), $DAO->fondPhoto($dico['FondPhoto'], $langue), $DAO->site($dico['CodeSite']), $DatePhoto, $FichierPhoto, $dico['Photographe'], $dico['CodePartenaire'], $DAO->Partenaire($dico['CodePartenaire']));
                $PHO_Content = supprNull($PHO->getListePhototheque());
                array_push($PHO_Contents, $PHO_Content);
            }
            $phototheque['contents'] = $PHO_Contents;
        }
        $res = $phototheque;
        return $res;
    }

    public function chargeContentLienSite($sql_limit, $sql_total, $curpage_lien, $pagesize_lien, $langue, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $lien_site['page'] = array('curpage' => $curpage_lien, 'pagesize' => $pagesize_lien);
        $resultat_lien_site = mysql_query($sql_limit) or die(mysql_error());
        if (!$resultat_lien_site) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_lien_site) == 0) {
            $nombreDeResultatPossibleBibliographie = 0;
            $lien_site['nombreDeResultatPossible'] = $nombreDeResultatPossibleBibliographie;
            $lien_site['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_lien_site) > 0) {
            $resultat_possible_lien_site = mysql_query($sql_possible) or die(mysql_error());
            $totalPage_lien_site = ceil((mysql_num_rows($resultat_possible_lien_site)) / $pagesize_lien);
            $lien_site['page']['pagetotal'] = $totalPage_lien_site;

            $nombreDeResultatPossibleBibliographie = mysql_num_rows($resultat_possible_lien_site);
            $lien_site['nombreDeResultatPossible'] = $nombreDeResultatPossibleBibliographie;
            $LIEN_Contents = array();
            for ($j = 0; $j < (mysql_num_rows($resultat_lien_site)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_lien_site);
                $LIEN = new Lien($dico['CodeLienWeb'], $dico['Titre'], $dico['NomSite'], $dico['NomSite'], $dico['URL'], $dico['CodeVar'], $dico['CodeIntro']);
                $LIEN_Content = supprNull($LIEN->getListeLien());
                array_push($LIEN_Contents, $LIEN_Content);
            }

            $lien_site['contents'] = $LIEN_Contents;
            $lien_site['langue'] = $langue;
        }

        $resultat_lien_site_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_lien_site_total) {

            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {

            $nombreDeResultatTotalSanitaire = mysql_num_rows($resultat_lien_site_total);
            $lien_site['nombreDeResultatTotal'] = $nombreDeResultatTotalSanitaire;
        }

        $res = $lien_site;
        return $res;
    }

    public function chargeContentDocumentation($sql_limite, $sql_total, $page, $pagesize, $langue, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $documentation['page'] = array('curpage' => $page, 'pagesize' => $pagesize);
        $resultat_documentation = mysql_query($sql_limite) or die(mysql_error());
        if (!$resultat_documentation) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_documentation) == 0) {
            $nombreDeResultatPossibleSanitaire = 0;
            $documentation['nombreDeResultatPossible'] = $nombreDeResultatPossibleSanitaire;
            $documentation['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_documentation) > 0) {
            $resultat_possible_documentation = mysql_query($sql_possible) or die(mysql_error());
            $totalPage_documentation = ceil((mysql_num_rows($resultat_possible_documentation)) / $pagesize);
            $documentation['page']['pagetotal'] = $totalPage_documentation;
            $nombreDeResultatPossibleSanitaire = mysql_num_rows($resultat_possible_documentation);
            $documentation['nombreDeResultatPossible'] = $nombreDeResultatPossibleSanitaire;
            $DOC_Contents = array();
            for ($j = 0; $j < (mysql_num_rows($resultat_documentation)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_documentation);
                $DOC = new Doc($dico['CodeDocPdf'], $dico['Titre'], $dico['Auteurs'], $dico['Editeur'], $dico['Date'], $dico['Langue'], $dico['NbPages'], $dico['CodeRangement'], $dico['Volume'], $dico['Pages'], $dico['TypeDoc'], $dico['FichierDocPdf'], $dico['CodeVar'], $DAO->nomVar($dico['CodeVar']), $dico['CodeIntro'], $DAO->nomAcc($dico['CodeIntro']));
                $DOC_Content = supprNull($DOC->getListeDoc());
                array_push($DOC_Contents, $DOC_Content);
            }

            $documentation['contents'] = $DOC_Contents;
            $documentation['langue'] = $langue;
        }

        $resultat_documentation_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_documentation_total) {

            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {

            $nombreDeResultatTotalSanitaire = mysql_num_rows($resultat_documentation_total);
            $documentation['nombreDeResultatTotal'] = $nombreDeResultatTotalSanitaire;
        }

        $res = $documentation;
        return $res;
    }

    public function chargeContentPartenaire($sql_limite, $sql_total, $page, $pagesize, $langue, $sql_possible) {
        $DAO = new BibliothequeDAO();
        $partenaire['page'] = array('curpage' => $page, 'pagesize' => $pagesize);
        $resultat_partenaire = mysql_query($sql_limite) or die(mysql_error());
        if (!$resultat_partenaire) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_partenaire) == 0) {
            $nombreDeResultatPossibleSanitaire = 0;
            $partenaire['nombreDeResultatPossible'] = $nombreDeResultatPossibleSanitaire;
            $partenaire['page']['pagetotal'] = 1;
        }
        if (mysql_num_rows($resultat_partenaire) > 0) {
            $resultat_possible_partenaire = mysql_query($sql_possible) or die(mysql_error());

            $totalPage_documentation = ceil((mysql_num_rows($resultat_possible_partenaire)) / $pagesize);
            $partenaire['page']['pagetotal'] = $totalPage_documentation;
            $nombreDeResultatPossibleSanitaire = mysql_num_rows($resultat_possible_partenaire);
            $partenaire['nombreDeResultatPossible'] = $nombreDeResultatPossibleSanitaire;
            $PAR_Contents = array();
            for ($j = 0; $j < (mysql_num_rows($resultat_partenaire)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_partenaire);
                $PAR = new Partenaire($dico['CodePartenaire'], $dico['NomPartenaire'], $dico['SiglePartenaire'], $dico['SectionRegionaleENTAV'], $dico['RegionPartenaire'], $dico['DepartPartenaire'], $dico['ResponsablesPartenaire'], $dico['TelephonePartenaire'], $dico['Email'], $dico['AdressePartenaire'], $dico['CodPostPartenaire'], $dico['CommunePartenaire']);
                $PAR_Content = supprNull($PAR->getListePartenaire());
                array_push($PAR_Contents, $PAR_Content);
            }

            $partenaire['contents'] = $PAR_Contents;
            $partenaire['langue'] = $langue;
        }

        $resultat_partenaire_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_partenaire_total) {

            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {

            $nombreDeResultatTotalSanitaire = mysql_num_rows($resultat_partenaire_total);
            $partenaire['nombreDeResultatTotal'] = $nombreDeResultatTotalSanitaire;
        }
        return $partenaire;
    }

    public function organePhoto($a, $b) {
        $sql = "select * from `ListeDeroulante_JY_OrganePhoto`  where OrganePhoto='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $organePhoto = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b === "FR") {
                    $organePhoto = $dico['OrganePhoto_text'];
                }
                if ($b === "EN") {
                    $organePhoto = $dico['OrganePhoto_text_en'];
                }
            }
        }
        return $organePhoto;
    }

    public function typePhoto($a, $b) {
        $sql = "select * from `ListeDeroulante_typePhoto`  where TypePhoto='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $typePhoto = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b === "FR") {
                    $typePhoto = $dico['TypePhoto_texte'];
                }
                if ($b === "EN") {
                    $typePhoto = $dico['TypePhoto_texte_en'];
                }
            }
        }
        return $typePhoto;
    }

    public function fondPhoto($a, $b) {
        $sql = "select * from `ListeDeroulante_fondPhoto`  where FondPhoto='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $fondPhoto = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b === "FR") {
                    $fondPhoto = $dico['FondPhoto_texte'];
                }
                if ($b === "EN") {
                    $fondPhoto = $dico['FondPhoto_texte_en'];
                }
            }
        }
        return $fondPhoto;
    }

    public function type($a, $b) {
        $sql = "select * from `NV-TYPE`  where CodeType='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $Type = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b === "FR") {
                    $Type = $dico['Type'];
                }
                if ($b === "EN") {
                    $Type = $dico['type_en'];
                }
            }
        }
        return $Type;
    }

    public function espece($a) {
        $sql = "select * from `NV-ESPECES` where CodeEsp='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $espece = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $espece = $dico['Espece'];
            }
        }
        return $espece;
    }

    public function couleurPel($a, $b) {
        $sql = "select * from ListeDeroulante_couleurPel where CouleurPel='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $couleurPel = "";
        }
        if (mysql_num_rows($resultat) > 0) {

            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $couleurPel = $dico['CouleurPel_Texte'];
                }
                if ($b == "EN") {
                    $couleurPel = $dico['CouleurPel_Texte_en'];
                }
            }
        }
        return $couleurPel;
    }

    public function couleurPulp($a, $b) {
        $sql = "select * from ListeDeroulante_couleurPulpe where CouleurPulp='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $couleurPulp = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b === "FR") {
                    $couleurPulp = $dico['CouleurPulp_texte'];
                }
                if ($b === "EN") {
                    $couleurPulp = $dico['CouleurPulp_texte_en'];
                }
            }
        }
        return $couleurPulp;
    }

    public function saveur($a, $b) {
        $sql = "select * from ListeDeroulante_saveur where Saveur='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $saveur = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $saveur = $dico['Saveur_Texte'];
                }
                if ($b == "EN") {
                    $saveur = $dico['Saveur_Texte_en'];
                }
            }
        }
        return $saveur;
    }

    public function pepins($a, $b) {
        $sql = "select * from ListeDeroulante_pepins where Pepins='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $pepins = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $pepins = $dico['Pepins_texte'];
                }
                if ($b == "EN") {
                    $pepins = $dico['Pepins_texte_en'];
                }
            }
        }
        return $pepins;
    }

    public function paysorigine($a, $b) {
        $sql = "select * from ListeDeroulante_pays where CodePays='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $paysorigine = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $paysorigine = $dico['NomPaysFrancais'];
                }
                if ($b == "EN") {
                    $paysorigine = $dico['NomPaysLocal'];
                }
            }
        }
        return $paysorigine;
    }

    public function sexe($a, $b) {
        $sql = "select * from ListeDeroulante_sexe where Sexe='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $sexe = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b === "FR") {
                    $sexe = $dico['Sexe_texte'];
                }
                if ($b === "EN") {
                    $sexe = $dico['Sexe_texte_en'];
                }
            }
        }
        return $sexe;
    }

    public function regionorigine($a, $b) {
        $sql = "select * from ListeDeroulante_regions where CodeRegion='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $regionorigine = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $regionorigine = $dico['NomRegionFrancais'];
                }
                if ($b == "EN") {
                    $regionorigine = $dico['NomRegionLocal'];
                }
            }
        }
        return $regionorigine;
    }

    public function departorigine($a, $b) {
        $sql = "select * from ListeDeroulante_departements where CodeDepart='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $departorigine = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $departorigine = $dico['NomDepartFrancais'];
                }
                if ($b == "EN") {
                    $departorigine = $dico['NomDepartLocal'];
                }
            }
        }
        return $departorigine;
    }

    public function sampstat($a, $b) {
        $sql = "select * from ListeDeroulante_20_SampStat where CodeSampStat='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $sampstat = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $sampstat = $dico['NomSampStat'];
                }
                if ($b == "EN") {
                    $sampstat = $dico['NameSampleStat'];
                }
            }
        }
        return $sampstat;
    }

    public function nomVar($a) {
        $sql = "select * from `NV-VARIETES` where codeVar='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $nomVar = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $nomVar = $dico['NomVar'];
            }
        }
        return $nomVar;
    }

    public function codeVar($a) {
        $sql = "select CodeVar from `NV-INTRODUCTIONS` where CodeIntro='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $codeVar = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $codeVar = $dico['CodeVar'];
            }
        }
        return $codeVar;
    }

    public function Partenaire($a) {
        $sql = "select * from Partenaires where CodePartenaire='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $Partenaire = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $Partenaire = $dico['NomPartenaire'];
            }
        }
        return $Partenaire;
    }

    public function ListePartenaire() {
        $sql = "select * from Partenaires where 1";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $Partenaire = array();
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $Partenaire[$i] = array();
                $Partenaire[$i]['code'] = $dico['CodePartenaire'];
                $Partenaire[$i]['name'] = $dico['NomPartenaire'];
            }
        }
        return $Partenaire;
    }

    public function statut($a, $b) {
        $sql = "select * from ListeDeroulante_statutIntro where Statut='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $statut = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b === "FR") {
                    $statut = $dico['Statut_texte'];
                }
                if ($b === "EN") {
                    $statut = $dico['Statut_texte_en'];
                }
            }
        }
        return $statut;
    }

    public function login($username, $password) {
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $alert = "";
        if ($username != "" && $password != "") {
            $sql = "select * from Personnels where upper(CodePersonne)=upper('" . $username . "') and MotDePasse='" . $password . "'";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (mysql_num_rows($resultat) < 0) {
                $alert = "erreur";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                $alert = 4;
                // $alert='<div id="message_emptyCompte"></div>';
                // $alert=$alert.'<meta http-equiv="Refresh" content="1;url=./Home.php">';
            }
            if (mysql_num_rows($resultat) == 1) {
                $dico = mysql_fetch_assoc($resultat);
                $t = time();
                $jour = date("d", $t);
                $mois = date("m", $t);
                $annee = date("Y", $t);
                if (($dico['AnneeFinValid'] > $annee || $dico['AnneeFinValid'] == null) || (($dico['AnneeFinValid'] == $annee) && (($dico['MoisFinValid'] > $mois || $dico['MoisFinValid'] == null) || (($dico['MoisFinValid'] == $mois) && ($dico['JourFinValid'] >= $jour || $dico['JourFinValid'] == null))))) {
                    $_SESSION['codePersonne'] = $dico['CodePersonne'];
                    $_SESSION['nomPersonne'] = $dico['Nom'];
                    $_SESSION['prenomPersonne'] = $dico['Prenom'];
                    $_SESSION['CodePartenairePersonne'] = $dico['CodePartenaire'];
                    $_SESSION['ProfilPersonne'] = $dico['JY_Profil_Utilisateur'];
                    // $alert='<div id="message_login"></div>';
                    // $alert=$alert.'<meta http-equiv="Refresh" content="1;url=./Home.php">';
                    $alert = 1;
                } else {
                    // $alert='<div id="message_emptyCompte">Ce compte n\'exist plus!!!!!</div>';
                    // $alert=$alert.'<meta http-equiv="Refresh" content="1;url=./Home.php">';
                    $alert = 2;
                }
            }
        } else {
            // $alert="<div id='message_problemFilling'></div>";
            // $alert=$alert.'<meta http-equiv="Refresh" content="1;url=./Home.php">';
            $alert = 3;
        }
        deconnexion_bbd();
        // $res['alert']=$alert;
        return $alert;
    }

    public function getSesInfo($codePersonne) {
        $DAO = new BibliothequeDAO();
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $sql = "select * from Personnels where CodePersonne='" . $codePersonne . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        $ses_info = array();
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 1) {
            $dico = mysql_fetch_assoc($resultat);
            for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                $partenaire = $DAO->partenaire($dico['CodePartenaire']);
                if ($dico['AnneeFinValid'] != null) {
                    $mois = "";
                    if (strlen($dico['MoisFinValid']) == 2) {
                        $mois = $dico['MoisFinValid'];
                    }
                    if (strlen($dico['MoisFinValid']) == 1) {
                        $mois = "0" . $dico['MoisFinValid'];
                    }
                    $jour = "";
                    if (strlen($dico['JourFinValid']) == 2) {
                        $jour = $dico['JourFinValid'];
                    }
                    if (strlen($dico['JourFinValid']) == 1) {
                        $jour = "0" . $dico['JourFinValid'];
                    }
                    $DateFin = $dico['AnneeFinValid'] . '-' . $mois . '-' . $jour;
                } else {
                    $DateFin = "";
                }
                $info = new Utilisateur($dico['CodePersonne'], $dico['Nom'], $dico['Prenom'], $dico['CodePartenaire'], $dico['JY_Profil_Utilisateur'], $dico['TelBureau'], $dico['FaxBureau'], $dico['MailBureau'], $dico['MotDePasse'], $partenaire, $dico['PersonneMAJ'], $DateFin, $dico['Fonction']);
                $ses_info = supprNull($info->getSesInfos());
            }
        }
        deconnexion_bbd();
        return $ses_info;
    }

    public function modifiez_infoPerson($user_nom, $user_prenom, $password, $user_tel, $user_fax, $user_mail, $codePerson, $user_fonction, $user_DateFin) {
        $DAO = new BibliothequeDAO();
        $alert = "dddd";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $sql = "select * from Personnels where CodePersonne='" . $codePerson . "'";
        $resultat_mod = mysql_query($sql) or die(mysql_error());
        if (!$resultat_mod) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_mod) == 0) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_mod) == 1) {
            for ($i = 0; $i < (mysql_num_rows($resultat_mod)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat_mod);
                if ($user_nom != "") {
                    $DAO->update($dico['Nom'], $user_nom, 'Nom', $codePerson);
                }
                if ($user_prenom != "") {
                    $DAO->update($dico['Prenom'], $user_prenom, 'Prenom', $codePerson);
                }
                if ($password != "") {
                    $DAO->update($dico['MotDePasse'], sha1($password), 'MotDePasse', $codePerson);
                }
                if ($user_fonction != "") {
                    $DAO->update($dico['Fonction'], $user_fonction, 'Fonction', $codePerson);
                }
                if ($user_DateFin != "") {
                    $DateFinValide_ele = explode("-", $user_DateFin);
                    $DateFinValide_jour = $DateFinValide_ele[2];
                    $DateFinValide_mois = $DateFinValide_ele[1];
                    $DateFinValide_annee = $DateFinValide_ele[0];
                    $DAO->update($dico['JourFinValid'], $DateFinValide_jour, 'JourFinValid', $codePerson);
                    $DAO->update($dico['MoisFinValid'], $DateFinValide_mois, 'MoisFinValid', $codePerson);
                    $DAO->update($dico['AnneeFinValid'], $DateFinValide_annee, 'AnneeFinValid', $codePerson);
                }
                $DAO->update($dico['TelBureau'], $user_tel, 'TelBureau', $codePerson);
                $DAO->update($dico['FaxBureau'], $user_fax, 'FaxBureau', $codePerson);
                $DAO->update($dico['MailBureau'], $user_mail, 'MailBureau', $codePerson);
            }
            if ($_SESSION['language_Vigne'] == "EN") {
                $alert = "You have registered your new information!";
            } else {
                $alert = "Vous avez bien enregistré votre nouveaux informations!";
            }
        }
        deconnexion_bbd();
        return $alert;
    }

    public function update($a, $b, $c, $d) {
        if ($a != $b) {
            $sql_update = "update Personnels set " . $c . "='" . $b . "' where CodePersonne='" . $d . "'";
            mysql_query($sql_update) or die(mysql_error());
        }
    }

    public function newUser($CodePersonne, $Nom, $Prenom, $Profile, $Partenaire, $PersonneMAJ, $DateFinValide, $password, $DateMAJ_jour, $DateMAJ_mois, $DateMAJ_annee, $function, $Dom, $Tel, $Fax, $Mail) {
        if ($_SESSION['ProfilPersonne'] == 'A' || $_SESSION['ProfilPersonne'] == 'B') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $alert = "";
            $sql = "INSERT INTO Personnels (CodePersonne,Nom,Prenom,JourMAJ,MoisMAJ,AnneeMAJ,PersonneMAJ,CodePartenaire,MotDePasse,JY_Profil_Utilisateur)
						   VALUES('" . $CodePersonne . "','" . $Nom . "','" . $Prenom . "','" . $DateMAJ_jour . "','" . $DateMAJ_mois . "','" . $DateMAJ_annee . "','" . $PersonneMAJ . "','" . $Partenaire . "','" . $password . "','" . $Profile . "')";

            mysql_query($sql) or die(mysql_error());
            if ($function != "") {
                $sql_function = "update Personnels set Fonction='" . $_POST['Function'] . "' where CodePersonne='" . $CodePersonne . "'";
                mysql_query($sql_function) or die(mysql_error());
            }
            if ($Dom != "") {
                $sql_Dom = "update Personnels set DomCompet='" . $_POST['Dom'] . "' where CodePersonne='" . $CodePersonne . "'";
                mysql_query($sql_Dom) or die(mysql_error());
            }
            if ($Tel != "") {
                $sql_Tel = "update Personnels set TelBureau='" . $_POST['Tel'] . "' where CodePersonne='" . $CodePersonne . "'";
                mysql_query($sql_Tel) or die(mysql_error());
            }
            if ($Fax != "") {
                $sql_Fax = "update Personnels set FaxBureau='" . $_POST['Fax'] . "' where CodePersonne='" . $CodePersonne . "'";
                mysql_query($sql_Fax) or die(mysql_error());
            }
            if ($Mail != "") {
                $sql_Mail = "update Personnels set MailBureau='" . $_POST['Mail'] . "' where CodePersonne='" . $CodePersonne . "'";
                mysql_query($sql_Mail) or die(mysql_error());
            }
            if ($DateFinValide != "") {
                $DateFinValide_ele = explode("-", $DateFinValide);
                $DateFinValide_jour = $DateFinValide_ele[2];
                $DateFinValide_mois = $DateFinValide_ele[1];
                $DateFinValide_annee = $DateFinValide_ele[0];
                $sql_Date = "update Personnels set JourFinValid='" . $DateFinValide_jour . "',MoisFinValid='" . $DateFinValide_mois . "',AnneeFinValid='" . $DateFinValide_annee . "' where CodePersonne='" . $CodePersonne . "'";
                mysql_query($sql_Date) or die(mysql_error());
            }
            if ($_SESSION['language_Vigne'] == "EN") {
                $alert = "You have registered your new information!";
            } else {
                $alert = "Vous avez bien enregistré votre nouveaux informations!";
            }
            deconnexion_bbd();
            return $alert;
        }
    }

    public function verifierCodePersonne($codePerson) {
        $case = "2";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        if ($codePerson == "") {
            $case = "2";
        } else {
            $sql = "select * from Personnels where CodePersonne='" . $codePerson . "'";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                $case = "1";
            }
            if (mysql_num_rows($resultat) > 0) {
                deconnexion_bbd();
                $case = "2";
            }
        }
        return $case;
    }

    public function list_user() {
        $DAO = new BibliothequeDAO();
        if ($_SESSION['ProfilPersonne'] == "A") {
            $sql_list_user = "SELECT * FROM Personnels WHERE 1";
        }
        if ($_SESSION['ProfilPersonne'] == "B") {
            $sql_list_user = "SELECT * FROM Personnels WHERE CodePartenaire='" . $dico['CodePartenaire'] . "'";
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat_list = mysql_query($sql_list_user) or die(mysql_error());
        if (!$resultat_list) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_list) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_list) > 0) {
            $contents_list_users = array();
            $DateFin = array();
            for ($j = 0; $j < (mysql_num_rows($resultat_list)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_list);
                if ($dico['AnneeFinValid'] != null) {
                    $mois = "";
                    if (strlen($dico['MoisFinValid']) == 2) {
                        $mois = $dico['MoisFinValid'];
                    }
                    if (strlen($dico['MoisFinValid']) == 1) {
                        $mois = "0" . $dico['MoisFinValid'];
                    }
                    $jour = "";
                    if (strlen($dico['JourFinValid']) == 2) {
                        $jour = $dico['JourFinValid'];
                    }
                    if (strlen($dico['JourFinValid']) == 1) {
                        $jour = "0" . $dico['JourFinValid'];
                    }
                    $DateFin = $dico['AnneeFinValid'] . '-' . $mois . '-' . $jour;
                } else {
                    $DateFin = "";
                }
                $partenaire = $DAO->partenaire($dico['CodePartenaire']);
                $info = new Utilisateur($dico['CodePartenaire'], $dico['Nom'], $dico['Prenom'], $dico['CodePartenaire'], $dico['JY_Profil_Utilisateur'], $dico['TelBureau'], $dico['FaxBureau'], $dico['MailBureau'], $dico['MotDePasse'], $partenaire, $dico['PersonneMAJ'], $DateFin, $dico['Fonction']);
                $lien = '<a onclick="$.ses_carte(\'' . $dico['CodePersonne'] . '\');return false;"><input type="hidden" name="codeUser" value="' . $dico['CodePersonne'] . '"/><img class="detail_ses_infos"  src="images/info_person.png" alt="INFORMATIONS" width="17" height="17"/></a>';
                $contents_list_user = $info->getSesInfos();
                $contents_list_user['lien'] = $lien;
                $contents_list_user = supprNull($contents_list_user);
                array_push($contents_list_users, $contents_list_user);
            }
            deconnexion_bbd();
        }

        return $contents_list_users;
    }

    public function ficher($section, $code, $search_complet, $case_s, $model, $langue, $page_espece, $pagesize_espece, $page_variete, $pagesize_variete, $page_accession, $pagesize_accession, $tri_espece_classname, $tri_espece_section, $tri_espece_colone, $tri_variete_classname, $tri_variete_section, $tri_variete_colone, $tri_accession_classname, $tri_accession_section, $tri_accession_colone) {
        $DAO = new BibliothequeDAO();

        if ($section != "" && $code != "") {
            $tri_espece = array("classname" => $tri_espece_classname, "section" => $tri_espece_section, "colone" => $tri_espece_colone);
            $tri_variete = array("classname" => $tri_variete_classname, "section" => $tri_variete_section, "colone" => $tri_variete_colone);
            $tri_accession = array("classname" => $tri_accession_classname, "section" => $tri_accession_section, "colone" => $tri_accession_colone);
            $page_espece_json = array("page_espece" => $page_espece, "pagesize_espece" => $pagesize_espece);
            $page_variete_json = array("page_variete" => $page_variete, "pagesize_variete" => $pagesize_variete);
            $page_accession_json = array("page_accession" => $page_accession, "pagesize_accession" => $pagesize_accession);
            $resultat = array("search" => $search_complet, "case_s" => $case_s, "model" => $model, "langue" => $langue, "tri_espece" => $tri_espece, "tri_variete" => $tri_variete, "tri_accession" => $tri_accession, "page_espece_json" => $page_espece_json, "page_variete_json" => $page_variete_json, "page_accession_json" => $page_accession_json);
            switch ($section) {

                case("espece"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql_espece = "Select * from `NV-ESPECES` where CodeEsp='" . $code . "'";
                    $resultat_espece = mysql_query($sql_espece) or die(mysql_error());

                    if (!$resultat_espece) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_espece) == 0) {
                        $contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_espece) > 0) {

                        for ($i = 0; $i < (mysql_num_rows($resultat_espece)); $i = $i + 1) {
                            $dico_espece = mysql_fetch_assoc($resultat_espece);
                            $ESP = new Espece($dico_espece['CodeEsp'], $dico_espece['Espece'], $dico_espece['Botaniste'], $dico_espece['Genre'], $dico_espece['CompoGenet'], $dico_espece['SousGenre'], $dico_espece['Validite'], $dico_espece['Tronc'], $dico_espece['RemarqueEsp']);
                            $content_espece = supprNull($ESP->getFicherEspece());
                        }
                    }
                    deconnexion_bbd();
                    $resultat['contents_esp'] = $content_espece;

                    break;
                case("variete"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    if (isset($_SESSION['codePersonne'])) {
                        if ($_SESSION['ProfilPersonne'] == 'A') {
                            $sql_variete = "Select * from `NV-VARIETES`  where CodeVar='" . $code . "'";
                        } else {
                            $sql_variete = "Select * from `NV-VARIETES`  where (CodeVar='" . $code . "' and codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or(CodeVar='" . $code . "' and  public!='N')";
                        }
                    } else {
                        $sql_variete = "Select * from `NV-VARIETES`  where CodeVar='" . $code . "' and public!='N'";
                    }
                    $resultat_variete = mysql_query($sql_variete) or die(mysql_error());
                    if (!$resultat_variete) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_variete) == 0) {
                        $contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_variete) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_variete)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_variete);
                            $VAR = new Variete($dico['CodeVar'], $dico['NomVar'], $dico['SynoMajeur'], $dico['NumVarOnivins'], $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['UniteVar'], $DAO->type($dico['CodeType'], $langue), $DAO->espece($dico['CodeEsp']), $DAO->couleurPel($dico['CouleurPel'], $langue), $DAO->couleurPulp($dico['CouleurPulp'], $langue), $DAO->saveur($dico['Saveur'], $langue), $DAO->pepins($dico['Pepins'], $langue), $dico['Obtenteur'], $DAO->utilite($dico['Utilite'], $langue), $dico['CodeEsp'], $DAO->sexe($dico['Sexe'], $langue), $DAO->paysorigine($dico['PaysOrigine'], $langue), $DAO->regionorigine($dico['RegionOrigine'], $langue), $DAO->departorigine($dico['DepartOrigine'], $langue), $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['NumVarOnivins'], $dico['InscriptionEurope'], $dico['Obtenteur'], $dico['MereReelle'], $dico['AnneeObtention'], $dico['CodeVarMereReelle'], $dico['MereObt'], $dico['PereReel'], $dico['CodeCroisementINRA'], $dico['CodeVarPereReel'], $dico['PereObt'], $dico['RemarqueParenteReelle'], $DAO->departorigine($dico['DepartOrigine'], $langue), $dico['RemarquesVar']);
                            $content_variete = supprNull($VAR->getFicherVariete());
                        }
                        deconnexion_bbd();
                    }
                    $resultat['contents_var'] = $content_variete;

                    break;

                case("accession"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    if (isset($_SESSION['codePersonne'])) {
                        if ($_SESSION['ProfilPersonne'] == 'A') {
                            $sql_accession = "Select * from `NV-INTRODUCTIONS` where CodeIntro='" . $code . "'";
                        } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                            $sql_accession = "Select * from `NV-INTRODUCTIONS` where (CodeIntro='" . $code . "' and IdReseau1='a')
																			or (CodeIntro='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'
																			or (CodeIntro='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                        } else { // utilisateur D SiregalPresenceEnColl = 'oui' and(
                            $sql_accession = "Select * from `NV-INTRODUCTIONS` where
                                    SiregalPresenceEnColl = 'oui' and( (CodeIntro='" . $code . "' and IdReseau1='a')
																			or (CodeIntro='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'
																			or (CodeIntro='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                        }
                    } else {
                        $sql_accession = "Select * from `NV-INTRODUCTIONS` where CodeIntro='" . $code . "' and IdReseau1='a' and SiregalPresenceEnColl = 'oui'";
                    }
                    $resultat_accession = mysql_query($sql_accession) or die(mysql_error());
                    if (!$resultat_accession) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_accession) == 0) {
                        deconnexion_bbd();
                        $contents = null;
                    }
                    if (mysql_num_rows($resultat_accession) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_accession)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_accession);
                            //$_SESSION['NomIntro']=$dico['NomIntro'];
                            $ACC = new Accession($dico['CodeIntro'], $dico['NomIntro'], $DAO->nomVar($dico['CodeVar']), $DAO->Partenaire($dico['CodePartenaire']), $DAO->paysorigine($dico['PaysProvenance'], $langue), $dico['CommuneProvenance'], $dico['AnneeEntree'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $DAO->statut($dico['Statut'], $langue), $DateEntre, $dico['Collecteur'], $dico['AdresProvenance'], $dico['SiteProvenance'], $dico['CodePartenaire'], $dico['UniteIntro'], $dico['AnneeAgrement'], $dico['Collecteur'], $dico['TypeCollecteur'], $dico['ContinentProvenance'], $dico['CommuneProvenance'], $dico['CodPostProvenance'], $dico['SiteProvenance'], $dico['AdresProvenance'], $dico['ProprietProvenance'], $dico['ParcelleProvenance'], $dico['TypeParcelleProvenance'], $dico['RangProvenance'], $dico['SoucheProvenance'], $dico['SoucheTheoriqueProvenance'], $DAO->paysorigine($dico['PaysProvenance'], $langue), $DAO->regionorigine($dico['RegionProvenance'], $langue), $DAO->departorigine($dico['DepartProvenance'], $langue), $dico['evdb_15-LATITUDE'], $dico['evdb_16-LONGITUDE'], $dico['evdb_17-ELEVATION'], $dico['JourEntree'], $dico['MoisEntree'], $dico['AnneeEntree'], $dico['CodeIntroProvenance'], $dico['CodeEntree'], $dico['ReIntroduit'], $dico['IssuTraitement'], $dico['CloneTraite'], $dico['RemarquesProvenance'], $dico['CollecteurAnt'], $dico['TypeCollecteurAnt'], $dico['ContinentProvAnt'], $dico['CommuneProvAnt'], $dico['CodPostProvAnt'], $dico['SiteProvAnt'], $dico['AdresProvAnt'], $dico['ProprietProvAnt'], $dico['ParcelleProvAnt'], $dico['TypeParcelleProvAnt'], $dico['RangProvAnt'], $dico['SoucheProvAnt'], $dico['SoucheTheoriqueProvAnt'], $DAO->paysorigine($dico['PaysProvAnt'], $langue), $DAO->regionorigine($dico['RegionProvAnt'], $langue), $DAO->departorigine($dico['DepartProvAnt'], $langue), $dico['CodeIntroProvenancevAnt'], $dico['evdb_ID_VITIS'], $dico['evdb_F-ConfirmAmpelo'], $dico['evdb_G-ConfirmSSR'], $dico['evdb_I-BiblioVolume'], $dico['evdb_L-ConfirmOther'], $dico['evdb_I-BiblioVolume'], $dico['evdb_K-BiblioPage'], $dico['evdb_M-RemarkAccessionName'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $dico['NumTempCTPS'], $dico['DelegONIVINS'], $DAO->statut($dico['Statut'], $langue), $dico['DepartAgrementClone'], $dico['AnneeAgrement'], $dico['SiteAgrementClone'], $dico['AnneeNonCertifiable'], $dico['LieuDepotMatInitial'], $dico['SurfMulti'], $dico['NomPartenaire'], $dico['NomPartenaire2'], $dico['Famille'], $dico['Agrement'], $dico['NumCloneCTPS'], $dico['SiregalPresenceEnColl'], $dico['MTAactif'], $dico['RemarquesIntro']);
                            $content_accession = supprNull($ACC->getFicherAccession());
                        }
                        deconnexion_bbd();
                    }
                    $_SESSION['2'] = $resultat['contents_acc'];
                    $resultat['contents_acc'] = $content_accession;

                    break;

                case("aptitude"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql = "Select * from `Aptitudes` where CodeAptitude='" . $code . "'";
                    $resultat_apt = mysql_query($sql) or die(mysql_error());
                    if (!$resultat_apt) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_apt) == 0) {
                        $contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_apt) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_apt)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_apt);
                            $date = $dico['JourExpe'] . '/' . $dico['MoisExpe'] . '/' . $dico['AnneeExpe'];
                            $APT = new Aptitude($dico['CodeAptitude'], $dico['CodeVar'], $DAO->nomCaract($dico['CodeCaract']), $dico['ValeurCaractNum'], $DAO->uniteCarct($dico['CodeCaract']), $dico['Ponderation'], $date, $dico['CodeSite'], $dico['CodePartenaire'], $dico['CodeAptitude'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $DAO->nomCaract($dico['CodeCaract']), $dico['ValeurCaractNum'], $DAO->uniteCarct($dico['CodeCaract']), $dico['Ponderation'], $dico['CodePersonneExpe'], $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                            $content = supprNull($APT->getFicherAptitude());
                        }
                        deconnexion_bbd();
                    }
                    $resultat['contents_apt'] = $content;
                    break;

                case("morphologique"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql = "select * from `Descripteurs_ampelographiques` d,  `Ampelographie` a,  `Caracteres_ampelographiques` c WHERE a.CodeAmpelo='" . $code . "' and a.CaractereOIV = c.CaractereOIV AND d.CodeOIV = c.CodeOIV group by c.CodeOIV";
                    $resultat_mor = mysql_query($sql) or die(mysql_error());
                    if (!$resultat_mor) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_mor) == 0) {
                        $contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_mor) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_mor)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_mor);
                            if ($_SESSION['language_Vigne'] == "FR") {
                                $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripFRA'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $dico['LibelleDescripFRA'], $dico['CodeOIV'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $DAO->Personne($dico['CodePersonne']), $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                            }
                            if ($_SESSION['language_Vigne'] == "EN") {
                                $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripFRA'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $dico['LibelleDescripFRA'], $dico['CodeOIV'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $DAO->Personne($dico['CodePersonne']), $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                            }
                            $content = supprNull($MOR->getFicherMorphologique());
                        }
                        deconnexion_bbd();
                    }
                    $resultat['contents_mor'] = $content;
                    break;

                case("emplacement"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql = "SELECT *
                            FROM `NV-EMPLACEMENTS` e
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `Sites` s on s.CodeSite=t.CodeSite
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                            INNER JOIN `NV-VARIETES` v on v.CodeVar=i.CodeVar
                            WHERE e.CodeEmplacem='" . $code . "'";
                    $resultat_emp = mysql_query($sql) or die(mysql_error());
                    if (!$resultat_emp) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_emp) == 0) {
                        $Em_Contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_emp) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_emp)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_emp);
                            $EM = new Emplacement($dico['CodeEmplacem'], $dico['CodeSite'], $dico['Parcelle'], $dico['Rang'], $dico['PremiereSouche'], $dico['DerniereSouche'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomVar'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $dico['NumCloneCTPS-PG'], $dico['AnneePlantation'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomSite'], $dico['Zone'], $dico['SousPartie'], $dico['NbreEtatNormal'], $dico['NbreEtatMoyen'], $dico['NbreEtatMoyFaible'], $dico['NbreEtatFaible'], $dico['NbreEtatTresFaible'], $dico['NbreEtatMort'], $dico['TypeSouche'], $dico['AnneeElimination'], $dico['CategMateriel'], $dico['Greffe'], $dico['PorteGreffe']);
                            $Em_Content = supprNull($EM->getFicherEmplacement());
                        }
                        deconnexion_bbd();
                    }
                    $resultat['contents_emp'] = $Em_Content;
                    break;

                case("sanitaire"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql = "select * from `Tests_sanitaires` WHERE IdTest =  '" . $code . "'";
                    $resultat_san = mysql_query($sql) or die(mysql_error());
                    if (!$resultat_san) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_san) == 0) {
                        $San_Contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_san) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_san)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_san);
                            if ($dico['JourTest'] == "") {
                                $jour = '00';
                            } else {
                                $jour = $dico['JourTest'];
                            }
                            if ($dico['MoisTest'] == "") {
                                $mois = '00';
                            } else {
                                $mois = $dico['MoisTest'];
                            }
                            if ($dico['AnneeTest'] == "") {
                                $annee = '0000';
                            } else {
                                $annee = $dico['AnneeTest'];
                            }
                            $dateTest = $jour . '-' . $mois . '-' . $annee;
                            $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $DAO->ResultatTest($dico['ResultatTest'], $langue), $DAO->CategorieTest($dico['CategorieTest'], $langue), $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $DAO->nomTest($dico['NomTest'], $langue), $dico['IdTest'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $DAO->PathogeneTeste($dico['NomTest']), $dico['CodeEmplacem'], $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire']);
                            $San_Content = supprNull($SAN->getFicherSanitaire());
                        }
                        deconnexion_bbd();
                    }
                    $resultat['contents_san'] = $San_Content;
                    break;

                case("genetique"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql = "select * from `BM-donnees_resume` WHERE IdAnalyse =  '" . $code . "'";
                    $resultat_gen = mysql_query($sql) or die(mysql_error());
                    if (!$resultat_gen) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_gen) == 0) {
                        $contents_genetique = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_gen) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_gen)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_gen);
                            $genetique_class = new Genetique($dico['IdAnalyse'], $dico['Marqueur'], $dico['ValeurCodee1'], $dico['ValeurCodee2'], $dico['CodePartenaire'], $dico['DatePCR'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $dico['EmplacemRecolte'], $dico['SouchePrelev'], $dico['DateRecolte'], $dico['IdProtocoleRecolte'], $dico['TypeOrgane'], $dico['IdStockADN'], $dico['IdProtocolePCR'], $dico['DatePCR'], $dico['DateRun'], $dico['CodePartenaire']);
                            $content_genetique = supprNull($genetique_class->getFicherGenetique());
                        }
                        deconnexion_bbd();
                    }
                    $resultat['contents_gen'] = $content_genetique;
                    break;

                case("bibliographie"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeCit='" . $code . "' and c.CodeDoc=d.CodeDoc";
                    $resultat_bib = mysql_query($sql) or die(mysql_error());
                    if (!$resultat_bib) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_bib) == 0) {
                        $BI_Contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_bib) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_bib)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_bib);
                            $BI = new Bibliograhpie($dico['CodeCit'], $dico['CodeVar'], $dico['Title'], $dico['Author'], $dico['Year'], $dico['PagesCitation'], $dico['VolumeCitation'], $DAO->nomAcc($dico['CodeIntro']), $DAO->nomVar($dico['CodeVar']), $dico['CodeIntro'], $dico['TypeDoc'], $dico['Edition'], $dico['Publisher'], $dico['PlacePublished'], $dico['ISBN'], $dico['Language'], $dico['NumberOfVolumes'], $dico['PagesDoc'], $dico['CallNumber'], $dico['AuteurCitation'], $dico['NomVigneCite']);
                            $BI_Content = supprNull($BI->getFicherBibliographie());
                        }
                        deconnexion_bbd();
                    }
                    $resultat['contents_bib'] = $BI_Content;
                    break;

                case("partenaire"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql = "select * from `Partenaires` where CodePartenaire='" . $code . "'";
                    $resultat_par = mysql_query($sql) or die(mysql_error());
                    if (!$resultat_par) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_par) == 0) {
                        $contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_par) > 0) {
                        for ($j = 0; $j < (mysql_num_rows($resultat_par)); $j = $j + 1) {
                            $dico = mysql_fetch_assoc($resultat_par);
                            $PAR = new Partenaire($dico['CodePartenaire'], $dico['NomPartenaire'], $dico['SiglePartenaire'], $dico['SectionRegionaleENTAV'], $dico['RegionPartenaire'], $dico['DepartPartenaire'], $dico['ResponsablesPartenaire'], $dico['TelephonePartenaire'], $dico['Email'], $dico['AdressePartenaire'], $dico['CodPostPartenaire'], $dico['CommunePartenaire']);
                            $PAR_Content = supprNull($PAR->getFicherPartenaire());
                        }
                    }
                    $resultat['contents_par'] = $PAR_Content;
                    break;

                case("site"):
                    connexion_bbd();
                    mysql_query('SET NAMES UTF8');
                    $sql = "select * from `Sites` where CodeSite='" . $code . "'";
                    $resultat_site = mysql_query($sql) or die(mysql_error());
                    if (!$resultat_site) {
                        deconnexion_bbd();
                        echo "<script>alert('erreur de base de donnes')</script>";
                        exit;
                    }
                    if (mysql_num_rows($resultat_site) == 0) {
                        $contents = null;
                        deconnexion_bbd();
                    }
                    if (mysql_num_rows($resultat_site) > 0) {
                        for ($i = 0; $i < (mysql_num_rows($resultat_site)); $i = $i + 1) {
                            $dico = mysql_fetch_assoc($resultat_site);
                            $SITE = new Site($dico['CodeSite'], $dico['NomSite'], $dico['RegionSite'], $dico['DepartSite'], $dico['CommuneSite'], $dico['CodPostSite'], $dico['AdresseSite'], $dico['LatSite'], $dico['LongSite'], $dico['AltSite'], $dico['SecRegENTAV'], $dico['ProprietaireSite'], $dico['ExploitSite'], $dico['ResponsSite'], $dico['TelSite'], $dico['FaxSite'], $dico['MailSite'], $dico['AnneeCreationSite'], $dico['VarMajoritairesSite'], $dico['PresentationSite']);
                            $contents = supprNull($SITE->getFicherSite());
                        }
                        deconnexion_bbd();
                    }
                    $resultat['contents_site'] = $contents;
                    break;
            }
            return $resultat;
        }
    }

    public function variete($code, $page_variete, $pagesize_variete, $langue, $section, $colone, $tri) {
        $DAO = new BibliothequeDAO();

        if ($section == 1) {
            $tri_variete = "order by " . $colone . " asc";
        }
        if ($section == 2) {
            $tri_variete = "order by " . $colone . " desc";
        }
        $sql_total = "select * from `NV-VARIETES` where CodeEsp='" . $code . "'";

        $startPage_variete = ($page_variete - 1) * $pagesize_variete;
        if (isset($_SESSION['codePersonne'])) {
            if ($_SESSION['ProfilPersonne'] == 'A') {
                $sql_limit = "select * from `NV-VARIETES` where CodeEsp='" . $code . "' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
                $sql_possible = "select * from `NV-VARIETES` where CodeEsp='" . $code . "'";
            } else {
                $sql_limit = "select * from `NV-VARIETES` where (CodeEsp='" . $code . "' and codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or (CodeEsp='" . $code . "' and public!='N') " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
                $sql_possible = "select * from `NV-VARIETES` where (CodeEsp='" . $code . "' and codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or (CodeEsp='" . $code . "' and public!='N')";
            }
        } else {
            $sql_limit = "select * from `NV-VARIETES` where CodeEsp='" . $code . "' and public!='N' " . $tri_variete . " limit " . $startPage_variete . "," . $pagesize_variete . "";
            $sql_possible = "select * from `NV-VARIETES` where CodeEsp='" . $code . "' and public!='N'";
        }

        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql_limit) or die(mysql_error());
        $variete['page'] = array('curpage' => $page_variete, 'pagesize' => $pagesize_variete);
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $nombreDeResultatPossibleVarietes = 0;
            $variete['nombreDeResultatPossible'] = $nombreDeResultatPossibleVarietes;
            $variete['page']['pagetotal'] = 1;
            deconnexion_bbd();
        }
        if (mysql_num_rows($resultat) > 0) {
            $resultat_possible_variete = mysql_query($sql_possible) or die(mysql_error());
            $totalPage_variete = ceil(mysql_num_rows($resultat_possible_variete) / $pagesize_variete);
            $variete['page']['pagetotal'] = $totalPage_variete;
            $variete['page']['pagetotal'] = $totalPage_variete;
            $nombreDeResultatPossibleVarietes = mysql_num_rows($resultat_possible_variete);
            $variete['nombreDeResultatPossible'] = $nombreDeResultatPossibleVarietes;
            $contents_variete = array();
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $VAR = new Variete($dico['CodeVar'], $dico['NomVar'], $dico['SynoMajeur'], $dico['NumVarOnivins'], $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['UniteVar'], $DAO->type($dico['CodeType'], $langue), $DAO->espece($dico['CodeEsp']), $DAO->couleurPel($dico['CouleurPel'], $langue), $DAO->couleurPulp($dico['CouleurPulp'], $langue), $DAO->saveur($dico['Saveur'], $langue), $DAO->pepins($dico['Pepins'], $langue), $dico['Obtenteur'], $DAO->utilite($dico['Utilite'], $langue), $dico['CodeEsp'], $DAO->sexe($dico['Sexe'], $langue), $DAO->paysorigine($dico['PaysOrigine'], $langue), $DAO->regionorigine($dico['RegionOrigine'], $langue), $DAO->departorigine($dico['DepartOrigine'], $langue), $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['NumVarOnivins'], $dico['InscriptionEurope'], $dico['Obtenteur'], $dico['MereReelle'], $dico['AnneeObtention'], $dico['CodeVarMereReelle'], $dico['MereObt'], $dico['PereReel'], $dico['CodeCroisementINRA'], $dico['CodeVarPereReel'], $dico['PereObt'], $dico['RemarqueParenteReelle'], $DAO->departorigine($dico['DepartOrigine'], $langue), $dico['RemarquesVar']);
                $content_variete = supprNull($VAR->getListeVariete());
                array_push($contents_variete, $content_variete);
            }
            $variete['contents'] = $contents_variete;
            deconnexion_bbd();
        }

        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat_variete_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_variete_total) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {
            $nombreDeResultatTotalVarietes = mysql_num_rows($resultat_variete_total);
            $variete['nombreDeResultatTotal'] = $nombreDeResultatTotalVarietes;
            deconnexion_bbd();
        }
        $variete['tri'] = $tri;
        $variete['langue'] = $langue;
        $res = array('variete' => $variete);
        return $res;
    }

    public function accession($code, $page_accession, $pagesize_accession, $langue, $section, $colone, $tri, $section_fiche) {
        /*


         */



        $DAO = new BibliothequeDAO();
        if ($section == 1) {
            $tri_accession = "order by " . $colone . " asc";
        }
        if ($section == 2) {
            $tri_accession = "order by " . $colone . " desc";
        }

        $startPage_accession = ($page_accession - 1) * $pagesize_accession;
        if ($section_fiche == 'Variete') {
            $sql_total = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "'";

            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $sql_limit = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession;
                    $sql_possible = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "'";
                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                    $sql_limit = "select * FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and IdReseau1='a')  or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession;
                    $sql_possible = "select * FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and IdReseau1='a')  or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                } else { // Utilisateur D
                    $sql_limit = "select * FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and IdReseau1='a')  or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession;
                    $sql_possible = "select * FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and IdReseau1='a')  or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                }
            } else {
                $sql_limit = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "' AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession;
                $sql_possible = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "' AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'";
            }
        }
        if ($section_fiche == 'Espece') {
            $sql_total = "select *  FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' " . $tri_accession . "";
            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $sql_limit = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession;
                    $sql_possible = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' " . $tri_accession . "";
                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                    $sql_limit = "select * FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays WHERE 
										(CodeEsp = '" . $code . "' and IdReseau1='a')  or 
										(CodeEsp = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(CodeEsp = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession;

                    $sql_possible = "select * FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays WHERE 
										(CodeEsp = '" . $code . "' and IdReseau1='a')  or 
										(CodeEsp = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(CodeEsp = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))" . $tri_accession;
                } else { // Utilisateur D
                    $sql_limit = "select * FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays WHERE
                                        SiregalPresenceEnColl = 'oui' AND(
										(CodeEsp = '" . $code . "' and IdReseau1='a')  or 
										(CodeEsp = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(CodeEsp = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))) " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession;

                    $sql_possible = "select * FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays WHERE
                                        SiregalPresenceEnColl = 'oui' AND(
										(CodeEsp = '" . $code . "' and IdReseau1='a')  or 
										(CodeEsp = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(CodeEsp = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))" . $tri_accession;
                }
            } else {
                $sql_limit = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui' " . $tri_accession . " limit " . $startPage_accession . "," . $pagesize_accession;
                $sql_possible = "select * FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'";
            }
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $accession['page'] = array('curpage' => $page_accession, 'pagesize' => $pagesize_accession);
        $resultat_accession = mysql_query($sql_limit) or die(mysql_error());
        if (!$resultat_accession) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_accession) == 0) {
            $nombreDeResultatPossibleIntros = 0;
            $accession['nombreDeResultatPossible'] = $nombreDeResultatPossibleIntros;
            $accession['page']['pagetotal'] = 1;
            deconnexion_bbd();
        }
        if (mysql_num_rows($resultat_accession) > 0) {
            $resultat_possible_accession = mysql_query($sql_possible) or die(mysql_error());
            $totalPage_accession = ceil((mysql_num_rows($resultat_possible_accession)) / $pagesize_accession);
            $accession['page']['pagetotal'] = $totalPage_accession;
            $nombreDeResultatPossibleIntros = mysql_num_rows($resultat_possible_accession);
            $accession['nombreDeResultatPossible'] = $nombreDeResultatPossibleIntros;
            $contents_accession = array();
            for ($i = 0; $i < (mysql_num_rows($resultat_accession)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat_accession);
                $DateEntre = $dico['JourMAJ'] . "/" . $dico['MoisMAJ'] . "/" . $dico['AnneeMAJ'];
                $ACC = new Accession($dico['CodeIntro'], $dico['NomIntro'], $DAO->nomVar($dico['CodeVar']), $DAO->Partenaire($dico['CodePartenaire']), $DAO->paysorigine($dico['PaysProvenance'], $langue), $dico['CommuneProvenance'], $dico['AnneeEntree'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $DAO->statut($dico['Statut'], $langue), $DateEntre, $dico['Collecteur'], $dico['AdresProvenance'], $dico['SiteProvenance'], $dico['CodePartenaire'], $dico['UniteIntro'], $dico['AnneeAgrement'], $dico['Collecteur'], $dico['TypeCollecteur'], $dico['ContinentProvenance'], $dico['CommuneProvenance'], $dico['CodPostProvenance'], $dico['SiteProvenance'], $dico['AdresProvenance'], $dico['ProprietProvenance'], $dico['ParcelleProvenance'], $dico['TypeParcelleProvenance'], $dico['RangProvenance'], $dico['SoucheProvenance'], $dico['SoucheTheoriqueProvenance'], $DAO->paysorigine($dico['PaysProvenance'], $langue), $DAO->regionorigine($dico['RegionProvenance'], $langue), $DAO->departorigine($dico['DepartProvenance'], $langue), $dico['evdb_15-LATITUDE'], $dico['evdb_16-LONGITUDE'], $dico['evdb_17-ELEVATION'], $dico['JourEntree'], $dico['MoisEntree'], $dico['AnneeEntree'], $dico['CodeIntroProvenance'], $dico['CodeEntree'], $dico['ReIntroduit'], $dico['IssuTraitement'], $dico['CloneTraite'], $dico['RemarquesProvenance'], $dico['CollecteurAnt'], $dico['TypeCollecteurAnt'], $dico['ContinentProvAnt'], $dico['CommuneProvAnt'], $dico['CodPostPrvoAnt'], $dico['SiteProvAnt'], $dico['AdresProvAnt'], $dico['ProprietProvAnt'], $dico['ParcelleProvAnt'], $dico['TypeParcelleProvAnt'], $dico['RangProvAnt'], $dico['SoucheProvAnt'], $dico['SoucheTheoriqueProvAnt'], $DAO->paysorigine($dico['PaysProvAnt'], $langue), $DAO->regionorigine($dico['RegionProvAnt'], $langue), $DAO->departorigine($dico['DepartProvAnt'], $langue), $dico['CodeIntroProvenanceAnt'], $dico['evdb_ID_VITIS'], $dico['evdb_F-ConfirmAmpelo'], $dico['evdb_G-ConfirmSSR'], $dico['evdb_I-BiblioVolume'], $dico['evdb_L-ConfirmOther'], $dico['evdb_I-BiblioVolume'], $dico['evdb_K-BiblioPage'], $dico['evdb_M-RemarkAccessionName'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $dico['NumTempCTPS'], $dico['DelegONIVINS'], $DAO->statut($dico['Statut'], $langue), $dico['DepartAgrementClone'], $dico['AnneeAgrement'], $dico['SiteAgrementClone'], $dico['AnneeNonCertifiable'], $dico['LieuDepotMatInitial'], $dico['SurfMulti'], $dico['NomPartenaire'], $dico['NomPartenaire2'], $dico['Famille'], $dico['Agrement'], $dico['NumCloneCTPS'], $dico['SiregalPresenceEnColl'], $dico['MTAactif'], $dico['RemarquesIntro']);

                $content_accession = supprNull($ACC->getListeAccession());
                array_push($contents_accession, $content_accession);
            }
            $accession['contents'] = $contents_accession;
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat_accession_total = mysql_query($sql_total) or die(mysql_error());
        if (!$resultat_accession_total) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        } else {
            deconnexion_bbd();
            $nombreDeResultatTotalAccession = mysql_num_rows($resultat_accession_total);
            $accession['nombreDeResultatTotal'] = $nombreDeResultatTotalAccession;
        }
        $accession['langue'] = $langue;
        $accession['tri'] = $tri;
        $res = array('accession' => $accession);
        return $res;
    }

    public function detail_var($code, $langue) {
        $DAO = new BibliothequeDAO();
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $sql = "select * from `NV-VARIETES` where CodeVar='" . $code . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $VAR = new Variete($dico['CodeVar'], $dico['NomVar'], $dico['SynoMajeur'], $dico['NumVarOnivins'], $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['UniteVar'], $DAO->type($dico['CodeType'], $langue), $DAO->espece($dico['CodeEsp']), $DAO->couleurPel($dico['CouleurPel'], $langue), $DAO->couleurPulp($dico['CouleurPulp'], $langue), $DAO->saveur($dico['Saveur'], $langue), $DAO->pepins($dico['Pepins'], $langue), $dico['Obtenteur'], $DAO->utilite($dico['Utilite'], $langue), $dico['CodeEsp'], $DAO->sexe($dico['Sexe'], $langue), $DAO->paysorigine($dico['PaysOrigine'], $langue), $DAO->regionorigine($dico['RegionOrigine'], $langue), $DAO->departorigine($dico['DepartOrigine'], $langue), $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['NumVarOnivins'], $dico['InscriptionEurope'], $dico['Obtenteur'], $dico['MereReelle'], $dico['AnneeObtention'], $dico['CodeVarMereReelle'], $dico['MereObt'], $dico['PereReel'], $dico['CodeCroisementINRA'], $dico['CodeVarPereReel'], $dico['PereObt'], $dico['RemarqueParenteReelle'], $DAO->sampstat($dico['evdb_20-SAMPSTAT'], $langue), $dico['RemarquesVar']);
                $detail = $VAR->getFicherVarieteTab();
            }
            deconnexion_bbd();
        }
        $res = $detail;
        return $res;
    }

    public function aptitude($code, $page, $pagesize, $langue, $section, $colone, $tri, $section_fiche) {
        $DAO = new BibliothequeDAO();
        if ($section == 1) {
            $tri_aptitude = "order by " . $colone . " asc";
        }
        if ($section == 2) {
            $tri_aptitude = "order by " . $colone . " desc";
        }

        if ($section_fiche == "Variete") {
            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "select * from `Aptitudes` where CodeVar='" . $code . "' " . $tri_aptitude . " limit " . $startPage . "," . $pagesize;
                    $sql_possible = "select * from `Aptitudes` where CodeVar='" . $code . "'";
                    $total = "select * from `Aptitudes` where CodeVar='" . $code . "'";
                } else {
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "select * from `Aptitudes` where 
						(CodeVar='" . $code . "' and IdReseau1='a')  or 
						(CodeVar='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(CodeVar='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_aptitude . " limit " . $startPage . "," . $pagesize . "";
                    $sql_possible = "select * from `Aptitudes` where 
						(CodeVar='" . $code . "' and IdReseau1='a')  or 
						(CodeVar='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(CodeVar='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                    $total = "select* from `Aptitudes` where CodeVar='" . $code . "'";
                }
            } else {
                $startPage = ($page - 1) * $pagesize;
                $sql = "select * from `Aptitudes`  where CodeVar='" . $code . "' and IdReseau1='a' " . $tri_aptitude . " limit " . $startPage . "," . $pagesize . "";
                $sql_possible = "select * from `Aptitudes`  where CodeVar='" . $code . "' and IdReseau1='a'";
                $total = "select * from `Aptitudes`  where CodeVar='" . $code . "'";
            }
        }
        if ($section_fiche == "Accession") {
            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "select * from `Aptitudes` where CodeIntro='" . $code . "' " . $tri_aptitude . " limit " . $startPage . "," . $pagesize . "";
                    $sql_possible = "select * from `Aptitudes` where CodeIntro='" . $code . "'";
                    $total = "select * from `Aptitudes` where CodeIntro='" . $code . "'";
                } else {
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "select * from `Aptitudes` where 
						(CodeIntro='" . $code . "' and IdReseau1='a')  or 
						(CodeIntro='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(CodeIntro='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_aptitude . " limit " . $startPage . "," . $pagesize . "";
                    $sql_possible = "select * from `Aptitudes` where 
						(CodeIntro='" . $code . "' and IdReseau1='a')  or 
						(CodeIntro='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(CodeIntro='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                    $total = "select* from `Aptitudes` where CodeIntro='" . $code . "'";
                }
            } else {
                $startPage = ($page - 1) * $pagesize;
                $sql = "select * from `Aptitudes`  where CodeIntro='" . $code . "' and IdReseau1='a' " . $tri_aptitude . " limit " . $startPage . "," . $pagesize . "";
                $sql_possible = "select * from `Aptitudes`  where CodeIntro='" . $code . "' and IdReseau1='a'";
                $total = "select * from `Aptitudes`  where CodeIntro='" . $code . "'";
            }
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $aptitude = $DAO->chargeContentAptitude($sql, $total, $page, $pagesize, $langue, $sql_possible);
        deconnexion_bbd();
        $aptitude['tri'] = $tri;
        $res = array('aptitude' => $aptitude);
        return $res;
    }

    public function nomCaract($a) {
        $sql = "select * from Caracteristiques where CodeCaract='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $nomCaract = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $nomCaract = $dico['NomCaract'];
            }
        }
        return $nomCaract;
    }

    public function uniteCarct($a) {
        $sql = "select * from Caracteristiques where CodeCaract='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $UniteCaract = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $UniteCaract = $dico['UniteCaract'];
            }
        }
        return $UniteCaract;
    }

    public function site($a) {
        $sql = "select * from Sites where CodeSite='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $site = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $site = $dico['NomSite'];
            }
        }
        return $site;
    }

    public function nomAcc($a) {
        $sql = "select * from `NV-INTRODUCTIONS` where CodeIntro='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $NomIntro = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $NomIntro = $dico['NomIntro'];
            }
        }
        return $NomIntro;
    }

    public function emplacement($code, $page_emplacement, $pagesize_emplacement, $langue, $section, $colone, $tri, $section_fiche) {
        $DAO = new BibliothequeDAO();
        if ($colone == 'NomIntro' || $colone == 'CodeIntro' || $colone == 'CodeVar' || $colone == 'NumCloneCTPS' || $colone == 'CodeIntroPartenaire') {
            if ($section == 1) {
                $tri_emplacement = "order by i." . $colone . " asc";
            }
            if ($section == 2) {
                $tri_emplacement = "order by i." . $colone . " desc";
            }
        } else if ($colone == 'AnneePlantation') {
            if ($section == 1) {
                $tri_emplacement = "order by e." . $colone . " asc";
            }
            if ($section == 2) {
                $tri_emplacement = "order by e." . $colone . " desc";
            }
        } else {
            if ($section == 1) {
                $tri_emplacement = "order by t." . $colone . " asc";
            }
            if ($section == 2) {
                $tri_emplacement = "order by t." . $colone . " desc";
            }
        }

        $startPage_emplacement = ($page_emplacement - 1) * $pagesize_emplacement;
        if ($code != "") {
            if ($section_fiche == "Variete") {
                $sql_total = "SELECT *
                            FROM `NV-EMPLACEMENTS` e
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                            WHERE CodeVar = '" . $code . "' AND e.`Elimination`='non'";
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql_limit = "SELECT *
                                FROM `NV-EMPLACEMENTS` e
                                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                WHERE CodeVar = '" . $code . "' AND `Elimination`='non' " . $tri_emplacement . " limit " . $startPage_emplacement . "," . $pagesize_emplacement;
                        $sql_possible = "SELECT *
                                FROM `NV-EMPLACEMENTS` e
                                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                WHERE CodeVar = '" . $code . "' AND `Elimination`='non' " . $tri_emplacement;
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql_limit = "SELECT *
                                FROM `NV-EMPLACEMENTS` e
                                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                WHERE CodeVar = '" . $code . "' AND `Elimination`='non' AND(codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR AffichEmplacInternet='O') " . $tri_emplacement . " limit " . $startPage_emplacement . "," . $pagesize_emplacement;
                        $sql_possible = "SELECT *
                                FROM `NV-EMPLACEMENTS` e
                                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                WHERE CodeVar = '" . $code . "' AND `Elimination`='non' AND(codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR AffichEmplacInternet='O') " . $tri_emplacement;
                    } else { // Utilisateur D
                        $sql_limit = "SELECT *
                                    FROM `NV-EMPLACEMENTS` e 
                                    INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                    INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                    WHERE CodeVar = '" . $code . "' AND e.`Elimination`='non' AND e.AffichEmplacInternet='O' " . $tri_emplacement . " limit " . $startPage_emplacement . "," . $pagesize_emplacement;
                        $sql_possible = "SELECT *
                                    FROM `NV-EMPLACEMENTS` e 
                                    INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                    INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                    WHERE CodeVar = '" . $code . "' AND e.`Elimination`='non' AND e.AffichEmplacInternet='O' " . $tri_emplacement;
                    }
                } else {
                    $sql_limit = "SELECT *
                                FROM `NV-EMPLACEMENTS` e 
                                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                WHERE CodeVar = '" . $code . "' AND `Elimination`='non' AND e.AffichEmplacInternet='O' " . $tri_emplacement . " limit " . $startPage_emplacement . "," . $pagesize_emplacement;
                    $sql_possible = "SELECT *
                                FROM `NV-EMPLACEMENTS` e 
                                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                WHERE CodeVar = '" . $code . "' AND `Elimination`='non' AND e.AffichEmplacInternet='O' " . $tri_emplacement;
                }
            }
            if ($section_fiche == "Accession") {
                $sql_total = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non'";
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql_limit = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non'" . $tri_emplacement . " limit " . $startPage_emplacement . "," . $pagesize_emplacement;
                        $sql_possible = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non'";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql_limit = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND(codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR AffichEmplacInternet='O')" . $tri_emplacement . " limit " . $startPage_emplacement . "," . $pagesize_emplacement;
                        $sql_possible = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND(codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR AffichEmplacInternet='O')";
                    } else {
                        $sql_limit = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND AffichEmplacInternet='O'" . $tri_emplacement . " limit " . $startPage_emplacement . "," . $pagesize_emplacement;
                        $sql_possible = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND AffichEmplacInternet='O'";
                    }
                } else {
                    $sql_limit = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND AffichEmplacInternet='O'" . $tri_emplacement . " limit " . $startPage_emplacement . "," . $pagesize_emplacement;
                    $sql_possible = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND AffichEmplacInternet='O'";
                }
            }
        }

        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $emplacement = $DAO->chargeContentEmplacement($sql_limit, $sql_total, $page_emplacement, $pagesize_emplacement, $sql_possible);
        deconnexion_bbd();
        $emplacement['tri'] = $tri;
        $res = array("emplacement" => $emplacement);
        return $res;
    }

    public function listCodeIntro($code) {
        $sql = "";
        if (isset($_SESSION['codePersonne'])) {
            if ($_SESSION['ProfilPersonne'] == 'A') {
                $sql = "select CodeIntro from `NV-INTRODUCTIONS` where CodeVar='" . $code . "'";
            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                $sql = "select CodeIntro from `NV-INTRODUCTIONS` where 
									CodeVar='" . $code . "' and IdReseau1='a')  or 
									CodeVar='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
									CodeVar='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																					(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																					(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																					(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
            } else {
                $sql = "select CodeIntro from `NV-INTRODUCTIONS` where
                    SiregalPresenceEnColl = 'oui' AND(
									CodeVar='" . $code . "' and IdReseau1='a')  or 
									CodeVar='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
									CodeVar='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																					(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																					(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																					(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
            }
        } else {
            $sql = "select CodeIntro from `NV-INTRODUCTIONS` where CodeVar='" . $code . "' and IdReseau1='a' and SiregalPresenceEnColl = 'oui'";
        }
        return $sql;
    }

    public function sanitaire($code, $page_sanitaire, $pagesize_sanitaire, $langue, $section, $colone, $tri, $section_fiche) {
        $DAO = new BibliothequeDAO();
        if ($section == 1) {
            $tri_sanitaire = "order by " . $colone . " asc";
        }
        if ($section == 2) {
            $tri_sanitaire = "order by " . $colone . " desc";
        }


        $startPage_sanitaire = ($page_sanitaire - 1) * $pagesize_sanitaire;
        if ($code != "") {
            if ($section_fiche == "Variete") {
                $sql_total = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where CodeVar='" . $code . "'";
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql_limit = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where CodeVar='" . $code . "' " . $tri_sanitaire . " limit " . $startPage_sanitaire . "," . $pagesize_sanitaire;
                        $sql_possible = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where CodeVar='" . $code . "' " . $tri_sanitaire;
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql_limit = "SELECT *
                                    FROM `Tests_sanitaires` s
                                    LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                                    WHERE (CodeVar='" . $code . "' AND s.IdReseau1='a') or (CodeVar='" . $code . "' and s.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')
                                                                                        or (CodeVar='" . $code . "' and 
                                                                                                                ((s.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
                                                                                                                (s.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_sanitaire . " limit " . $startPage_sanitaire . "," . $pagesize_sanitaire;
                        $sql_possible = "SELECT *
                                    FROM `Tests_sanitaires` s
                                    LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                                    WHERE (CodeVar='" . $code . "' AND s.IdReseau1='a') or (CodeVar='" . $code . "' and s.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')
                                                                                        or (CodeVar='" . $code . "' and 
                                                                                                                ((s.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
                                                                                                                (s.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_sanitaire;
                    } else {
                        $sql_limit = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where CodeVar='" . $code . "' AND s.IdReseau1='a' " . $tri_sanitaire . " limit " . $startPage_sanitaire . "," . $pagesize_sanitaire;
                        $sql_possible = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where CodeVar='" . $code . "' AND s.IdReseau1='a' " . $tri_sanitaire;
                    }
                } else {
                    $sql_limit = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        WHERE CodeVar='" . $code . "' AND s.IdReseau1='a' " . $tri_sanitaire . " limit " . $startPage_sanitaire . "," . $pagesize_sanitaire;
                    $sql_possible = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        WHERE CodeVar='" . $code . "' AND s.IdReseau1='a' " . $tri_sanitaire;
                }
            }
            if ($section_fiche == "Accession") {
                $sql_total = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where s.CodeIntro='" . $code . "'";
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql_limit = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where s.CodeIntro='" . $code . "' " . $tri_sanitaire . " limit " . $startPage_sanitaire . "," . $pagesize_sanitaire;
                        $sql_possible = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where s.CodeIntro='" . $code . "' " . $tri_sanitaire;
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql_limit = "SELECT *
                                    FROM `Tests_sanitaires` s
                                    LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                                    WHERE (s.CodeIntro='" . $code . "' AND s.IdReseau1='a') or (s.CodeIntro='" . $code . "' and s.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')
                                                                                        or (s.CodeIntro='" . $code . "' and 
                                                                                                                ((s.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
                                                                                                                (s.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_sanitaire . " limit " . $startPage_sanitaire . "," . $pagesize_sanitaire;
                        $sql_possible = "SELECT *
                                    FROM `Tests_sanitaires` s
                                    LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                                    WHERE (s.CodeIntro='" . $code . "' AND s.IdReseau1='a') or (s.CodeIntro='" . $code . "' and s.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')
                                                                                        or (s.CodeIntro='" . $code . "' and 
                                                                                                                ((s.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
                                                                                                                (s.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_sanitaire;
                    } else {
                        $sql_limit = "SELECT *
                            FROM `Tests_sanitaires` s
                            LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                            where s.CodeIntro='" . $code . "' and s.IdReseau1='a' " . $tri_sanitaire . " limit " . $startPage_sanitaire . "," . $pagesize_sanitaire;
                        $sql_possible = "SELECT *
                            FROM `Tests_sanitaires` s
                            LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                            where s.CodeIntro='" . $code . "' and s.IdReseau1='a'" . $tri_sanitaire;
                    }
                } else {
                    $sql_limit = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where s.CodeIntro='" . $code . "' and s.IdReseau1='a' " . $tri_sanitaire . " limit " . $startPage_sanitaire . "," . $pagesize_sanitaire;
                    $sql_possible = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where s.CodeIntro='" . $code . "' and s.IdReseau1='a'" . $tri_sanitaire;
                }
            }
        }

        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $sanitaire = $DAO->chargeContentSanitaire($sql_limit, $sql_total, $page_sanitaire, $pagesize_sanitaire, $langue, $sql_possible);
        deconnexion_bbd();
        $res = array('sanitaire' => $sanitaire);
        $res['sanitaire']['tri'] = $tri;
        return $res;
    }

    public function ResultatTest($a, $b) {
        $sql = "select * from `ListeDeroulante_resultatsTest`  where ResultatTest='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $ResultatTest = "";
        }
        if (mysql_num_rows($resultat) > 0) {

            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $ResultatTest = $dico['ResultatTest'];
                }
                if ($b == "EN") {
                    $ResultatTest = $dico['ResultatTest_en'];
                }
            }
        }
        return $ResultatTest;
    }

    public function CategorieTest($a, $b) {
        $sql = "select * from `ListeDeroulante_categoriesTest`   where CategorieTest='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $CategorieTest = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $CategorieTest = $dico['CategorieTest'];
                }
                if ($b == "EN") {
                    $CategorieTest = $dico['CategorieTest_en'];
                }
            }
        }
        return $CategorieTest;
    }

    public function nomTest($a, $b) {
        $sql = "select * from `Type_pathogene`   where NomTest='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $nomTest = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($b == "FR") {
                    $nomTest = $dico['NomFranComplet'];
                }
                if ($b == "EN") {
                    $nomTest = $dico['JY_NomEngComplet'];
                }
            }
        }
        return $nomTest;
    }

    public function PathogeneTeste($a) {
        $sql = "select * from Type_pathogene where NomTest='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $PathogeneTeste = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($_SESSION['language_Vigne'] == "FR") {
                    $PathogeneTeste = $dico['NomFranComplet'];
                }
                if ($_SESSION['language_Vigne'] == "EN") {
                    $PathogeneTeste = $dico['JY_NomEngComplet'];
                }
            }
        }
        return $PathogeneTeste;
    }

    public function morphologique($code, $page, $pagesize, $langue, $section, $colone, $tri, $section_fiche) {
        $DAO = new BibliothequeDAO();
        if ($colone != 'LibelleCritereFRA' && $colone != 'LibelleCritereENG' && $colone != 'CaractereOIV') {
            if ($section == 1) {
                $tri_description = "order by d." . $colone . " asc";
            }
            if ($section == 2) {
                $tri_description = "order by d." . $colone . " desc";
            }
        } else {
            if ($section == 1) {
                $tri_description = "order by c." . $colone . " asc";
            }
            if ($section == 2) {
                $tri_description = "order by c." . $colone . " desc";
            }
        }
        if ($section_fiche == "Variete") {
            $total = "SELECT *
                      FROM `Ampelographie` a 
                      LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                      LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                      LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                      LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                      LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                      LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                      LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                      LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                      WHERE a.CodeVar =  '" . $code . "' AND a.CaractereOIV IS NOT NULL 
                      GROUP BY d.CodeOIV";
            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV " . $tri_description . " limit " . $startPage . "," . $pagesize . "";
                    $sql_possible = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                } else { // Profil B, C ou D
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND (a.Public='O' OR a.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV " . $tri_description . " limit " . $startPage . "," . $pagesize . "";
                    $sql_possible = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND (a.Public='O' OR a.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                }
            } else {
                $startPage = ($page - 1) * $pagesize;
                $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND a.Public='O' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV " . $tri_description . " limit " . $startPage . "," . $pagesize . "";
                $sql_possible = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND a.Public='O' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
            }
        }
        if ($section_fiche == "Accession") {
            $total = "SELECT *
                      FROM `Ampelographie` a 
                      LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                      LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                      LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                      LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                      LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                      LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                      LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                      LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                      WHERE a.CodeIntro =  '" . $code . "' AND a.CaractereOIV IS NOT NULL 
                      GROUP BY d.CodeOIV";
            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV " . $tri_description . " limit " . $startPage . "," . $pagesize . "";
                    $sql_possible = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                } else { // Profil B, C ou D
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND (a.Public='O' OR a.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV " . $tri_description . " limit " . $startPage . "," . $pagesize . "";
                    $sql_possible = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND (a.Public='O' OR a.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                }
            } else {
                $startPage = ($page - 1) * $pagesize;
                $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND a.Public='O' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV " . $tri_description . " limit " . $startPage . "," . $pagesize . "";
                $sql_possible = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND a.Public='O' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
            }
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $description = $DAO->chargeContentMorphologique($sql, $total, $page, $pagesize, $langue, $sql_possible);
        deconnexion_bbd();
        $description['tri'] = $tri;
        $res = array('description' => $description);
        return $res;
    }

    public function Personne($a) {
        $sql = "select * from Personnels where CodePersonne='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $Personne = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $Personne = $dico['Nom'];
            }
        }
        return $Personne;
    }

    public function bibliographie($code, $page_bibliographie, $pagesize_bibliographie, $langue, $section, $colone, $tri, $ficher_section) {

        $DAO = new BibliothequeDAO();
        if ($colone == 'Title' || $colone == 'Author' || $colone == 'Year') {
            if ($section == 1) {
                $tri_bibliographie = "order by d." . $colone . " asc";
            }
            if ($section == 2) {
                $tri_bibliographie = "order by d." . $colone . " desc";
            }
        } else {
            if ($section == 1) {
                $tri_bibliographie = "order by c." . $colone . " asc";
            }
            if ($section == 2) {
                $tri_bibliographie = "order by c." . $colone . " desc";
            }
        }

        if ($ficher_section == "Accession") {
            $sql_total = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc";
            $startPage_bibliographie = ($page_bibliographie - 1) * $pagesize_bibliographie;
            if (isset($code)) {
                if (isset($_SESSION['codePersonne'])) {
                    $sql_limit = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc " . $tri_bibliographie . " limit " . $startPage_bibliographie . "," . $pagesize_bibliographie;
                    $sql_possible = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc " . $tri_sanitaire;
                } else {
                    $sql_limit = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc and c.JY_Public='O' and d.Public='O' " . $tri_bibliographie . " limit " . $startPage_bibliographie . "," . $pagesize_bibliographie;
                    $sql_possible = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc and c.JY_Public='O' and d.Public='O' " . $tri_sanitaire;
                }
            }
        }

        if ($ficher_section == "Variete") {
            $sql_total = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc";
            $startPage_bibliographie = ($page_bibliographie - 1) * $pagesize_bibliographie;
            if (isset($code)) {
                if (isset($_SESSION['codePersonne'])) {
                    $sql_limit = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc " . $tri_bibliographie . " limit " . $startPage_bibliographie . "," . $pagesize_bibliographie;
                    $sql_possible = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc " . $tri_sanitaire;
                } else {
                    $sql_limit = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc and c.JY_Public='O' and d.Public='O' " . $tri_bibliographie . " limit " . $startPage_bibliographie . "," . $pagesize_bibliographie;
                    $sql_possible = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc and c.JY_Public='O' and d.Public='O' " . $tri_sanitaire;
                }
            }
        }

        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $bibliographie = $DAO->chargeContentBibliographie($sql_limit, $sql_total, $page_bibliographie, $pagesize_bibliographie, $langue, $sql_possible);
        $bibliographie['tri'] = $tri;
        $res = array('bibliographie' => $bibliographie);
        return $res;
    }

    public function genetique($code, $page, $pagesize, $langue, $section, $colone, $tri, $section_fiche) {
        $DAO = new BibliothequeDAO();
        if ($section == 1) {
            $tri_description = "order by " . $colone . " asc";
        }
        if ($section == 2) {
            $tri_description = "order by " . $colone . " desc";
        }
        $startPage = ($page - 1) * $pagesize;
        if ($section_fiche == "Variete") {
            $sql_total = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "'";
            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $sql_limit = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "' " . $tri_description . " limit " . $startPage . "," . $pagesize;
                    $sql_possible = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "'";
                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                    $sql_limit = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE (g.CodeVar='" . $code . "' and g.IdReseau1='a') or (g.CodeVar='" . $code . "' and g.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or(g.CodeVar='" . $code . "'
																			and ((g.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																			(g.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_description . " limit " . $startPage . "," . $pagesize;
                    $sql_possible = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE (g.CodeVar='" . $code . "' and g.IdReseau1='a') or (g.CodeVar='" . $code . "' and g.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or(g.CodeVar='" . $code . "'
																			and ((g.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																			(g.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                } else {
                    $sql_limit = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "' and g.IdReseau1='a' " . $tri_description . " limit " . $startPage . "," . $pagesize;
                    $sql_possible = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "' and g.IdReseau1='a'";
                }
            } else {
                $sql_limit = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "' and g.IdReseau1='a' " . $tri_description . " limit " . $startPage . "," . $pagesize;
                $sql_possible = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "' and g.IdReseau1='a'";
            }
        }
        if ($section_fiche == "Accession") {
            $sql_total = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "'";
            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $sql_limit = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "' " . $tri_description . " limit " . $startPage . "," . $pagesize;
                    $sql_possible = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "'";
                } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                    $sql_limit = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE (g.CodeIntro='" . $code . "' and g.IdReseau1='a') or (g.CodeIntro='" . $code . "' and g.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or(g.CodeIntro='" . $code . "'
																			and ((g.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																			(g.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_description . " limit " . $startPage . "," . $pagesize;
                    $sql_possible = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE (g.CodeIntro='" . $code . "' and g.IdReseau1='a') or (g.CodeIntro='" . $code . "' and g.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or(g.CodeIntro='" . $code . "'
																			and ((g.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																			(g.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                } else {
                    $sql_limit = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "' and g.IdReseau1='a' " . $tri_description . " limit " . $startPage . "," . $pagesize;
                    $sql_possible = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "' and g.IdReseau1='a'";
                }
            } else {
                $sql_limit = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "' and g.IdReseau1='a' " . $tri_description . " limit " . $startPage . "," . $pagesize;
                $sql_possible = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "' and g.IdReseau1='a'";
            }
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $genetique = $DAO->chargeContentGenetique($sql_limit, $sql_total, $page, $pagesize, $langue, $sql_possible);
        deconnexion_bbd();
        $genetique['tri'] = $tri;
        $res = array('genetique' => $genetique);
        return $res;
    }

    public function phototheque($code, $langue, $section_fiche) {
        $DAO = new BibliothequeDAO();
        if ($section_fiche == "Accession") {
            if (isset($_SESSION['codePersonne'])) {
                $sql = "select * from Phototheque where CodeIntro='" . $code . "' ";
            } else {
                $sql = "select * from Phototheque where CodeIntro='" . $code . "' and Public!='N' ";
            }
        }
        if ($section_fiche == "Variete") {
            if (isset($_SESSION['codePersonne'])) {
                $sql = "select * from Phototheque where CodeVar='" . $code . "' ";
            } else {
                $sql = "select * from Phototheque where CodeVar='" . $code . "' and Public!='N' ";
            }
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $phototheque = $DAO->chargeContentPhototheque($sql, $langue);
        deconnexion_bbd();
        return $phototheque;
    }

    public function lien_site($code, $langue, $curpage_lien, $pagesize_lien, $tri_lien_section, $tri_lien_colone, $tri_lien, $section_fiche) {
        $DAO = new BibliothequeDAO();

        if ($tri_lien_section == 1) {
            $tri_lien_site = "order by " . $tri_lien_colone . " asc";
        }
        if ($tri_lien_section == 2) {
            $tri_lien_site = "order by " . $tri_lien_colone . " desc";
        }
        $startPage = ($curpage_lien - 1) * $pagesize_lien;

        if ($section_fiche == "Accession") {
            $sql_total = "select * from Liens_web_JY where CodeIntro='" . $code . "' ";
            if (isset($_SESSION['codePersonne'])) {
                $sql_limit = "select * from Liens_web_JY where CodeIntro='" . $code . "' " . $tri_lien_site . " limit " . $startPage . "," . $pagesize_lien;
                $sql_possible = "select * from Liens_web_JY where CodeIntro='" . $code . "' ";
            } else {
                $sql_limit = "select * from Liens_web_JY where CodeIntro='" . $code . "' and Public!='N' " . $tri_lien_site . " limit " . $startPage . "," . $pagesize_lien;
                $sql_possible = "select * from Liens_web_JY where CodeIntro='" . $code . "' and Public!='N'";
            }
        }

        if ($section_fiche == "Variete") {
            $sql_total = "select * from Liens_web_JY where CodeVar='" . $code . "' ";
            if (isset($_SESSION['codePersonne'])) {
                $sql_limit = "select * from Liens_web_JY where CodeVar='" . $code . "' " . $tri_lien_site . " limit " . $startPage . "," . $pagesize_lien;
                $sql_possible = "select * from Liens_web_JY where CodeVar='" . $code . "' ";
            } else {
                $sql_limit = "select * from Liens_web_JY where CodeVar='" . $code . "' and Public!='N' " . $tri_lien_site . " limit " . $startPage . "," . $pagesize_lien;
                $sql_possible = "select * from Liens_web_JY where CodeVar='" . $code . "' and Public!='N' ";
            }
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $lien_site = $DAO->chargeContentLienSite($sql_limit, $sql_total, $curpage_lien, $pagesize_lien, $langue, $sql_possible);
        deconnexion_bbd();
        $lien_site['tri'] = $tri_lien;
        return $lien_site;
    }

    public function doc($code, $langue, $curpage_doc, $pagesize_doc, $tri_doc_section, $tri_doc_colone, $tri, $section_fiche) {
        $DAO = new BibliothequeDAO();
        if ($tri_doc_section == 1) {
            $tri_doc = "order by " . $tri_doc_colone . " asc";
        }
        if ($tri_doc_section == 2) {
            $tri_doc = "order by " . $tri_doc_colone . " desc";
        }
        $startPage = ($curpage_doc - 1) * $pagesize_doc;
        if ($section_fiche == "Accession") {
            $sql_total = "select * from Documents_pdf_JY where CodeIntro='" . $code . "' ";
            if (isset($_SESSION['codePersonne'])) {
                $sql_limit = "select * from Documents_pdf_JY where CodeIntro='" . $code . "' " . $tri_doc . " limit " . $startPage . "," . $pagesize_doc;
                $sql_possible = "select * from Documents_pdf_JY where CodeIntro='" . $code . "' ";
            } else {
                $sql_limit = "select * from Documents_pdf_JY where CodeIntro='" . $code . "' and Public!='N' " . $tri_doc . " limit " . $startPage . "," . $pagesize_doc;
                $sql_possible = "select * from Documents_pdf_JY where CodeIntro='" . $code . "' and Public!='N'";
            }
        }

        if ($section_fiche == "Variete") {
            $sql_total = "select * from Documents_pdf_JY where CodeVar='" . $code . "' ";
            if (isset($_SESSION['codePersonne'])) {
                $sql_limit = "select * from Documents_pdf_JY where CodeVar='" . $code . "' " . $tri_doc . " limit " . $startPage . "," . $pagesize_doc;
                $sql_possible = "select * from Documents_pdf_JY where CodeVar='" . $code . "' ";
            } else {
                $sql_limit = "select * from Documents_pdf_JY where CodeVar='" . $code . "' and Public!='N' " . $tri_doc . " limit " . $startPage . "," . $pagesize_doc;
                $sql_possible = "select * from Documents_pdf_JY where CodeVar='" . $code . "' and Public!='N' ";
            }
        }
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $doc = $DAO->chargeContentDocumentation($sql_limit, $sql_total, $curpage_doc, $pagesize_doc, $langue, $sql_possible);
        deconnexion_bbd();
        $doc['tri'] = $tri;
        return $doc;
    }

    public function detail_acc($code, $langue) {
        $DAO = new BibliothequeDAO();
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $sql = "Select * from `NV-INTRODUCTIONS` where CodeIntro='" . $code . "'";

        $resultat_accession = mysql_query($sql) or die(mysql_error());
        if (!$resultat_accession) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_accession) == 0) {
            deconnexion_bbd();
            exit;
        }
        if (mysql_num_rows($resultat_accession) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat_accession)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat_accession);
                $ACC = new Accession($dico['CodeIntro'], $dico['NomIntro'], $DAO->nomVar($dico['CodeVar']), $DAO->Partenaire($dico['CodePartenaire']), $DAO->paysorigine($dico['PaysProvenance'], $langue), $dico['CommuneProvenance'], $dico['AnneeEntree'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $DAO->statut($dico['Statut'], $langue), $DateEntre, $dico['Collecteur'], $dico['AdresProvenance'], $dico['SiteProvenance'], $dico['CodePartenaire'], $dico['UniteIntro'], $dico['AnneeAgrement'], $dico['Collecteur'], $dico['TypeCollecteur'], $dico['ContinentProvenance'], $dico['CommuneProvenance'], $dico['CodPostProvenance'], $dico['SiteProvenance'], $dico['AdresProvenance'], $dico['ProprietProvenance'], $dico['ParcelleProvenance'], $dico['TypeParcelleProvenance'], $dico['RangProvenance'], $dico['SoucheProvenance'], $dico['SoucheTheoriqueProvenance'], $DAO->paysorigine($dico['PaysProvenance'], $langue), $DAO->regionorigine($dico['RegionProvenance'], $langue), $DAO->departorigine($dico['DepartProvenance'], $langue), $dico['evdb_15-LATITUDE'], $dico['evdb_16-LONGITUDE'], $dico['evdb_17-ELEVATION'], $dico['JourEntree'], $dico['MoisEntree'], $dico['AnneeEntree'], $dico['CodeIntroProvenance'], $dico['CodeEntree'], $dico['ReIntroduit'], $dico['IssuTraitement'], $dico['CloneTraite'], $dico['RemarquesProvenance'], $dico['CollecteurAnt'], $dico['TypeCollecteurAnt'], $dico['ContinentProvAnt'], $dico['CommuneProvAnt'], $dico['CodPostProvAnt'], $dico['SiteProvAnt'], $dico['AdresProvAnt'], $dico['ProprietProvAnt'], $dico['ParcelleProvAnt'], $dico['TypeParcelleProvAnt'], $dico['RangProvAnt'], $dico['SoucheProvAnt'], $dico['SoucheTheoriqueProvAnt'], $DAO->paysorigine($dico['PaysProvAnt'], $langue), $DAO->regionorigine($dico['RegionProvAnt'], $langue), $DAO->departorigine($dico['DepartProvAnt'], $langue), $dico['CodeIntroProvenancevAnt'], $dico['evdb_ID_VITIS'], $dico['evdb_F-ConfirmAmpelo'], $dico['evdb_G-ConfirmSSR'], $dico['evdb_I-BiblioVolume'], $dico['evdb_L-ConfirmOther'], $dico['evdb_I-BiblioVolume'], $dico['evdb_K-BiblioPage'], $dico['evdb_M-RemarkAccessionName'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $dico['NumTempCTPS'], $dico['DelegONIVINS'], $DAO->statut($dico['Statut'], $langue), $dico['DepartAgrementClone'], $dico['AnneeAgrement'], $dico['SiteAgrementClone'], $dico['AnneeNonCertifiable'], $dico['LieuDepotMatInitial'], $dico['SurfMulti'], $dico['NomPartenaire'], $dico['NomPartenaire2'], $dico['Famille'], $dico['Agrement'], $dico['NumCloneCTPS'], $dico['SiregalPresenceEnColl'], $dico['MTAactif'], $dico['RemarquesIntro']);
                $detail = $ACC->getFicherAccessionTab();
            }
            deconnexion_bbd();
        }

        $res = $detail;
        return $res;
    }

    public function search_user($search) {
        $DAO = new BibliothequeDAO();
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $users = array();
        if ($_SESSION['ProfilPersonne'] == 'A') {
            $sql = "select * from Personnels where upper(CodePersonne) like upper('%" . $search . "%') UNION select * from Personnels where upper(Nom) like upper('%" . $search . "%') UNION select * from Personnels where upper(Prenom) like upper('%" . $search . "%')";
        }
        if ($_SESSION['ProfilPersonne'] == 'B') {
            $sql = "select * from Personnels where upper(CodePersonne) like upper('%" . $search . "%') and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' UNION select * from Personnels where upper(Nom) like upper('%" . $search . "%') and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'  UNION select * from Personnels where upper(Prenom) like upper('%" . $search . "%') and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' ";
        }

        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
            deconnexion_bbd();
        }
        if (mysql_num_rows($resultat) == 0) {
            echo "<script>alert('Il n'exist pas ce utilisateur ! ')</script>";
            exit;
            deconnexion_bbd();
        }
        if (mysql_num_rows($resultat) > 0) {
            $contents_list_users = array();
            $DateFin = array();
            for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($dico['AnneeFinValid'] != null) {
                    $mois = "";
                    if (strlen($dico['MoisFinValid']) == 2) {
                        $mois = $dico['MoisFinValid'];
                    }
                    if (strlen($dico['MoisFinValid']) == 1) {
                        $mois = "0" . $dico['MoisFinValid'];
                    }
                    $jour = "";
                    if (strlen($dico['JourFinValid']) == 2) {
                        $jour = $dico['JourFinValid'];
                    }
                    if (strlen($dico['JourFinValid']) == 1) {
                        $jour = "0" . $dico['JourFinValid'];
                    }
                    $DateFin = $dico['AnneeFinValid'] . '-' . $mois . '-' . $jour;
                } else {
                    $DateFin = "";
                }
                $partenaire = $DAO->partenaire($dico['CodePartenaire']);
                $info = new Utilisateur($dico['CodePartenaire'], $dico['Nom'], $dico['Prenom'], $dico['CodePartenaire'], $dico['JY_Profil_Utilisateur'], $dico['Tel'], $dico['FaxBureau'], $dico['MailBureau'], $dico['MotDePasse'], $partenaire, $dico['PersonneMAJ'], $DateFin, $dico['Fonction']);
                $lien = '<a onclick="$.ses_carte(\'' . $dico['CodePersonne'] . '\');return false;"><input type="hidden" name="codeUser" value="' . $dico['CodePersonne'] . '"/><img class="detail_ses_infos"  src="images/info_person.png" alt="INFORMATIONS" width="17" height="17"/></a>';
                $contents_list_user = $info->getSesInfos();
                $contents_list_user['lien'] = $lien;
                $contents_list_user = supprNull($contents_list_user);
                array_push($contents_list_users, $contents_list_user);
            }
            deconnexion_bbd();
        }

        return $contents_list_users;
    }

    public function resetPassword($codePersonne) {
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $alert = "";
        $sql = "select * from Personnels where CodePersonne='" . $codePersonne . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 1) {
            $password = sha1(123456);
            $sql_update = "update Personnels set MotDePasse='" . $password . "' where CodePersonne='" . $codePersonne . "'";
            mysql_query($sql_update) or die(mysql_error());
        }
        if ($_SESSION['language_Vigne'] == "EN") {
            $alert = "You have registered his/her new password!";
        } else {
            $alert = "Vous avez bien enregistré sa nouvelle mot de passe!";
        }
        deconnexion_bbd();
        return $alert;
    }

    public function login_resultat_ficher($username, $password, $section, $code, $dataString) {
        if ($username != "" && $password != "") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from Personnels where upper(CodePersonne)=upper('" . $username . "') and MotDePasse='" . $password . "'";
            $resultat_log = mysql_query($sql) or die(mysql_error());
            if (!$resultat_log) {
                
            }
            if (mysql_num_rows($resultat_log) == 0) {
                $statue = 1;
            }
            if (mysql_num_rows($resultat_log) == 1) {
                $dico = mysql_fetch_assoc($resultat_log);
                $t = time();
                $jour = date("d", $t);
                $mois = date("m", $t);
                $annee = date("Y", $t);
                if (($dico['AnneeFinValid'] > $annee || $dico['AnneeFinValid'] == null) || (($dico['AnneeFinValid'] == $annee) && (($dico['MoisFinValid'] > $mois || $dico['MoisFinValid'] == null) || (($dico['MoisFinValid'] == $mois) && ($dico['JourFinValid'] >= $jour || $dico['JourFinValid'] == null))))) {
                    $_SESSION['codePersonne'] = $dico['CodePersonne'];
                    $_SESSION['nomPersonne'] = $dico['Nom'];
                    $_SESSION['prenomPersonne'] = $dico['Prenom'];
                    $_SESSION['CodePartenairePersonne'] = $dico['CodePartenaire'];
                    $_SESSION['ProfilPersonne'] = $dico['JY_Profil_Utilisateur'];
                    $statue = 2;
                } else {
                    $statue = 1;
                }
            }
        } else {
            $statue = 1;
        }
        $res = array('dataString' => $dataString, 'statue' => $statue, 'code' => $code, 'section' => $section);
        $resultat = array('res' => $res);
        deconnexion_bbd();
        return $resultat;
    }

    public function login_resultat($username, $password, $dataString) {
        if ($username != "" && $password != "") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from Personnels where upper(CodePersonne)=upper('" . $username . "') and MotDePasse='" . $password . "'";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                
            }
            if (mysql_num_rows($resultat) == 0) {
                $statue = 1;
            }
            if (mysql_num_rows($resultat) == 1) {
                $dico = mysql_fetch_assoc($resultat);
                $t = time();
                $jour = date("d", $t);
                $mois = date("m", $t);
                $annee = date("Y", $t);
                if (($dico['AnneeFinValid'] > $annee || $dico['AnneeFinValid'] == null) || (($dico['AnneeFinValid'] == $annee) && (($dico['MoisFinValid'] > $mois || $dico['MoisFinValid'] == null) || (($dico['MoisFinValid'] == $mois) && ($dico['JourFinValid'] >= $jour || $dico['JourFinValid'] == null))))) {
                    $_SESSION['codePersonne'] = $dico['CodePersonne'];
                    $_SESSION['nomPersonne'] = $dico['Nom'];
                    $_SESSION['prenomPersonne'] = $dico['Prenom'];
                    $_SESSION['CodePartenairePersonne'] = $dico['CodePartenaire'];
                    $_SESSION['ProfilPersonne'] = $dico['JY_Profil_Utilisateur'];
                    $statue = 2;
                } else {
                    $statue = 1;
                }
            }
        } else {
            $statue = 1;
        }
        $res = array('dataString' => $dataString, 'statue' => $statue);
        $resultat = array('res' => $res);
        deconnexion_bbd();
        return $resultat;
    }

    public function listeDeroulante($champ, $langue, $id_number) {
        if ($champ == "CodeType") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `NV-TYPE` group by CodeType";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CodeType'];
                        $resultat['FR'][$j]['fr'] = $dico['Type'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CodeType'];
                        $resultat['EN'][$j]['en'] = $dico['type_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "UniteVar") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select UniteVar from `NV-VARIETES` group by UniteVar";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['UniteVar'];
                        $resultat['FR'][$j]['fr'] = $dico['UniteVar'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['UniteVar'];
                        $resultat['EN'][$j]['en'] = $dico['UniteVar'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'Utilite') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_utilite";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Utilite'];
                        $resultat['FR'][$j]['fr'] = $dico['Utilite_Texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Utilite'];
                        $resultat['EN'][$j]['en'] = $dico['Utilite_texte_anglais'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "CouleurPulp") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `ListeDeroulante_couleurPulpe` ";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CouleurPulp'];
                        $resultat['FR'][$j]['fr'] = $dico['CouleurPulp_texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CouleurPulp'];
                        $resultat['EN'][$j]['en'] = $dico['CouleurPulp_texte_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "CodeSite") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Sites` ";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CodeSite'];
                        $resultat['FR'][$j]['fr'] = $dico['NomSite'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CodeSite'];
                        $resultat['EN'][$j]['en'] = $dico['NomSite'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "Ponderation") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select Ponderation from `Aptitudes` group by Ponderation";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Ponderation'];
                        $resultat['FR'][$j]['fr'] = $dico['Ponderation'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Ponderation'];
                        $resultat['EN'][$j]['en'] = $dico['Ponderation'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "CodePartenaire") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Partenaires` ";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CodePartenaire'];
                        $resultat['FR'][$j]['fr'] = $dico['NomPartenaire'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CodePartenaire'];
                        $resultat['EN'][$j]['en'] = $dico['NomPartenaire'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "NomTest") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Type_pathogene` ";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['NomTest'];
                        $resultat['FR'][$j]['fr'] = $dico['NomFranComplet'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['NomTest'];
                        $resultat['EN'][$j]['en'] = $dico['JY_NomEngComplet'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "CategorieTest") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select CategorieTest from `Tests_sanitaires` group by CategorieTest";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CategorieTest'];
                        $resultat['FR'][$j]['fr'] = $dico['CategorieTest'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CategorieTest'];
                        $resultat['EN'][$j]['en'] = $dico['CategorieTest'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "ResultatTest") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select ResultatTest from `Tests_sanitaires` group by ResultatTest";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['ResultatTest'];
                        $resultat['FR'][$j]['fr'] = $dico['ResultatTest'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['ResultatTest'];
                        $resultat['EN'][$j]['en'] = $dico['ResultatTest'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "Aptitude") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Caracteristiques` group by CodeCaract";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CodeCaract'];
                        $resultat['FR'][$j]['fr'] = $dico['NomCaract'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CodeCaract'];
                        $resultat['EN'][$j]['en'] = $dico['JY_NomCaract_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "CodeCaract") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Caracteristiques` group by UniteCaract";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CodeCaract'];
                        $resultat['FR'][$j]['fr'] = $dico['UniteCaract'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CodeCaract'];
                        $resultat['EN'][$j]['en'] = $dico['UniteCaract'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == "Laboratoire") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select Laboratoire from `Tests_sanitaires` group by Laboratoire";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Laboratoire'];
                        $resultat['FR'][$j]['fr'] = $dico['Laboratoire'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Laboratoire'];
                        $resultat['EN'][$j]['en'] = $dico['Laboratoire'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'CouleurPel') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_couleurPel";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CouleurPel'];
                        $resultat['FR'][$j]['fr'] = $dico['CouleurPel_Texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CouleurPel'];
                        $resultat['EN'][$j]['en'] = $dico['CouleurPel_Texte_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'Saveur') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_saveur";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Saveur'];
                        $resultat['FR'][$j]['fr'] = $dico['Saveur_Texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Saveur'];
                        $resultat['EN'][$j]['en'] = $dico['Saveur_Texte_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'Pepins') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_pepins";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Pepins'];
                        $resultat['FR'][$j]['fr'] = $dico['Pepins_texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Pepins'];
                        $resultat['EN'][$j]['en'] = $dico['Pepins_texte_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'Sexe') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_sexe";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Sexe'];
                        $resultat['FR'][$j]['fr'] = $dico['Sexe_texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Sexe'];
                        $resultat['EN'][$j]['en'] = $dico['Sexe_texte_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'PaysOrigine' || $champ == 'PayProvenance') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_pays";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CodePays'];
                        $resultat['FR'][$j]['fr'] = $dico['NomPaysFrancais'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CodePays'];
                        $resultat['EN'][$j]['en'] = $dico['NomPaysLocal'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'RegionOrigine' || $champ == "RegionProvenance") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_regions";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CodeRegion'];
                        $resultat['FR'][$j]['fr'] = $dico['NomRegionFrancais'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CodeRegion'];
                        $resultat['EN'][$j]['en'] = $dico['NomRegionLocal'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'DepartOrigine' || $champ == "DepartProvenance") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_departements";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CodeDepart'];
                        $resultat['FR'][$j]['fr'] = $dico['NomDepartFrancais'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CodeDepart'];
                        $resultat['EN'][$j]['en'] = $dico['NomDepartLocal'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'InscriptionFrance') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select InscriptionFrance from `NV-VARIETES` group by InscriptionFrance";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['InscriptionFrance'];
                        $resultat['FR'][$j]['fr'] = $dico['InscriptionFrance'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['InscriptionFrance'];
                        $resultat['EN'][$j]['en'] = $dico['InscriptionFrance'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'InscriptionEurope') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select InscriptionEurope from `NV-VARIETES` group by InscriptionEurope";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['InscriptionEurope'];
                        $resultat['FR'][$j]['fr'] = $dico['InscriptionEurope'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['InscriptionEurope'];
                        $resultat['EN'][$j]['en'] = $dico['InscriptionEurope'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'PremiereSouche') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select PremiereSouche from Emplacements_theoriques where 1";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['PremiereSouche'];
                        $resultat['FR'][$j]['fr'] = $dico['PremiereSouche'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['PremiereSouche'];
                        $resultat['EN'][$j]['en'] = $dico['PremiereSouche'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'Statut') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from ListeDeroulante_statutIntro";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Statut'];
                        $resultat['FR'][$j]['fr'] = $dico['Statut_texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Statut'];
                        $resultat['EN'][$j]['en'] = $dico['Statut_texte_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'UniteIntro') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select UniteIntro from `NV-INTRODUCTIONS` group by UniteIntro";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['UniteIntro'];
                        $resultat['FR'][$j]['fr'] = $dico['UniteIntro'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['UniteIntro'];
                        $resultat['EN'][$j]['en'] = $dico['UniteIntro'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'Agrement') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select Agrement from `NV-INTRODUCTIONS` group by Agrement";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Agrement'];
                        $resultat['FR'][$j]['fr'] = $dico['Agrement'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Agrement'];
                        $resultat['EN'][$j]['en'] = $dico['Agrement'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'Parcelle') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select Parcelle from `Emplacements_theoriques` group by Parcelle";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Parcelle'];
                        $resultat['FR'][$j]['fr'] = $dico['Parcelle'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Parcelle'];
                        $resultat['EN'][$j]['en'] = $dico['Parcelle'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'Rang') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select Rang from `Emplacements_theoriques` group by Rang";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['Rang'];
                        $resultat['FR'][$j]['fr'] = $dico['Rang'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['Rang'];
                        $resultat['EN'][$j]['en'] = $dico['Rang'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'TypeSouche') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select TypeSouche from `Emplacements_theoriques` group by TypeSouche";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['TypeSouche'];
                        $resultat['FR'][$j]['fr'] = $dico['TypeSouche'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['TypeSouche'];
                        $resultat['EN'][$j]['en'] = $dico['TypeSouche'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'OrganePhoto') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `ListeDeroulante_JY_OrganePhoto` where 1";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['OrganePhoto'];
                        $resultat['FR'][$j]['fr'] = $dico['OrganePhoto_text'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['OrganePhoto'];
                        $resultat['EN'][$j]['en'] = $dico['OrganePhoto_text_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'CouleurPhoto') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `ListeDeroulante_couleurPhoto` where 1";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CouleurPhoto'];
                        $resultat['FR'][$j]['fr'] = $dico['CouleurPhoto_texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CouleurPhoto'];
                        $resultat['EN'][$j]['en'] = $dico['CouleurPhoto_texte_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'TypePhoto') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `ListeDeroulante_typePhoto` where 1";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['TypePhoto'];
                        $resultat['FR'][$j]['fr'] = $dico['TypePhoto_texte'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['TypePhoto'];
                        $resultat['EN'][$j]['en'] = $dico['TypePhoto_texte_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'TypeDoc') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `ListeDeroulante_JY_typeDoc` where 1";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['typeDoc'];
                        $resultat['FR'][$j]['fr'] = $dico['typeDoc_fr'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['typeDoc'];
                        $resultat['EN'][$j]['en'] = $dico['typeDoc_en'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'SiglePartenaire') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select SiglePartenaire from `Partenaires` group by SiglePartenaire";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['SiglePartenaire'];
                        $resultat['FR'][$j]['fr'] = $dico['SiglePartenaire'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['SiglePartenaire'];
                        $resultat['EN'][$j]['en'] = $dico['SiglePartenaire'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'SectionRegionaleENTAV') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select SectionRegionaleENTAV from `Partenaires` group by SectionRegionaleENTAV";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['SectionRegionaleENTAV'];
                        $resultat['FR'][$j]['fr'] = $dico['SectionRegionaleENTAV'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['SectionRegionaleENTAV'];
                        $resultat['EN'][$j]['en'] = $dico['SectionRegionaleENTAV'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'RegionPartenaire') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select RegionPartenaire from `Partenaires` group by RegionPartenaire";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['RegionPartenaire'];
                        $resultat['FR'][$j]['fr'] = $dico['RegionPartenaire'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['RegionPartenaire'];
                        $resultat['EN'][$j]['en'] = $dico['RegionPartenaire'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ == 'DepartPartenaire') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select DepartPartenaire from `Partenaires` group by DepartPartenaire";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['DepartPartenaire'];
                        $resultat['FR'][$j]['fr'] = $dico['DepartPartenaire'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['DepartPartenaire'];
                        $resultat['EN'][$j]['en'] = $dico['DepartPartenaire'];
                    }
                }
                deconnexion_bbd();
            }
        }
        $array_champ = explode("_", $champ);
        $champ_title = $array_champ[0];
        $champ_valeur = $array_champ[1];
        if ($champ_title == 'CodeOIV') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select CaractereOIV,LibelleCritereFRA,LibelleCritereENG from `Caracteres_ampelographiques` where CodeOIV='" . $champ_valeur . "'";

            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CaractereOIV'];
                        $resultat['FR'][$j]['fr'] = $dico['CaractereOIV'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CaractereOIV'];
                        $resultat['EN'][$j]['en'] = $dico['CaractereOIV'];
                    }
                }
                deconnexion_bbd();
            }
        }
        if ($champ_title == 'Descripteurs') {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select CaractereOIV,LibelleCritereFRA,LibelleCritereENG from `Caracteres_ampelographiques` where CodeOIV='" . $champ_valeur . "'";

            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    if ($langue == "FR") {
                        $resultat['FR'][$j]['code'] = $dico['CaractereOIV'];
                        $resultat['FR'][$j]['fr'] = $dico['LibelleCritereFRA'];
                    }
                    if ($langue == "EN") {
                        $resultat['EN'][$j]['code'] = $dico['CaractereOIV'];
                        $resultat['EN'][$j]['en'] = $dico['LibelleCritereENG'];
                    }
                }
                deconnexion_bbd();
            }
        }
        $resultat['id_number'] = $id_number;
        return $resultat;
    }

// Fonction modifiée

    public function charge_champ_Morphologique($langue) {
        $res = '<option value=" "> </option>
				<option value="indifferent">---indifférent---</option>';

        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        if ($langue == "FR") {
            $sql_descripteur = "select * from `Descripteurs_ampelographiques` where Public_Affichage!='N' group by LibelleDescripFRA";
        }
        if ($langue == "EN") {
            $sql_descripteur = "select * from `Descripteurs_ampelographiques` where Public_Affichage!='N'  group by LibelleDescripENG";
        }

        $resultat_descripteur = mysql_query($sql_descripteur) or die(mysql_error());
        if (!$resultat_descripteur) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_descripteur) == 0) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }

        if (mysql_num_rows($resultat_descripteur) > 0) {
            $option_descripteur = '<option value="*" disabled="disabled" ><b>-Descripteur-</b></option>';
            for ($j = 0; $j < (mysql_num_rows($resultat_descripteur)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_descripteur);
                if ($langue == "FR") {
                    $code = "Descripteurs_" . $dico['CodeOIV'];
                    $fr = $dico['LibelleDescripFRA'];
                    $option_descripteur = $option_descripteur . '<option value="' . $code . '" >' . $fr . '</option>';
                }
                if ($langue == "EN") {
                    $code = "Descripteurs_" . $dico['CodeOIV'];
                    $fr = $dico['LibelleDescripENG'];
                    $option_descripteur = $option_descripteur . '<option value="' . $code . '" >' . $fr . '</option>';
                }
            }
        }
        $sql_codeDescripteur = "select * from `Descripteurs_ampelographiques` where Public_Affichage!='N'  group by CodeOIV";
        $resultat_codeDescripteur = mysql_query($sql_codeDescripteur) or die(mysql_error());
        if (!$resultat_codeDescripteur) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_codeDescripteur) == 0) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat_codeDescripteur) > 0) {
            $option_codeDescripteur = '<option value="*" disabled="disabled" ><b>-CodeDescripteur-</b></option>';
            for ($j = 0; $j < (mysql_num_rows($resultat_codeDescripteur)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat_codeDescripteur);
                $code = "CodeOIV_" . $dico['CodeOIV'];
                $fr = $dico['CodeOIV'];
                $option_codeDescripteur = $option_codeDescripteur . '<option value="' . $code . '" >' . $fr . '</option>';
            }
        }
        $res = $res . $option_descripteur . $option_codeDescripteur;
        return $res;
    }

    public function charge_champ_Genetique($langue) {
        $res = '<option value=" "> </option>
				<option value="indifferent">---indifférent---</option>';
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $sql = "select Marqueur from `BM-Marqueurs_moleculaires` where Public_Affichage!='N' group by Marqueur ";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $option = '<option value="*" disabled="disabled" ><b>-Marqueur-</b></option>';
            for ($j = 0; $j < (mysql_num_rows($resultat)); $j = $j + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $code = $dico['Marqueur'];
                $fr = $dico['Marqueur'];
                $option = $option . '<option value="' . $code . '" >' . $fr . '</option>';
            }
            deconnexion_bbd();
        }
        return $res . $option;
    }

    public function searchAdevance($parametre) {
        $DAO = new BibliothequeDAO();
        foreach ($parametre as $key => $value) {
            $$key = $value;
            // $resultat["".$key]=$value;
        }

        if (count($Accession) != 0) {
            $sql_possible = "";
            $sql_total = "";
            if (count($Accession) == 1) {
                $sql_possible = " from " . $DAO->table('Accession');
                $sql_total = " from " . $DAO->table('Accession');
                if (count($Emplacement) != 0) {
                    $table = $table . " , " . $DAO->table('Emplacement');
                }
                if (count($Espece) != 0) {
                    $table = $table . " , " . $DAO->table('Espece');
                }
                if (count($Variete) != 0) {
                    $table = $table . " , " . $DAO->table('Variete');
                }
                if (count($Sanitaire) != 0) {
                    $table = $table . " , " . $DAO->table('Sanitaire');
                }
                if (count($Morphologique) != 0) {
                    $table = $table . " , " . $DAO->table('Morphologique');
                }
                if (count($Aptitude) != 0) {
                    $table = $table . " , " . $DAO->table('Aptitude');
                }
                if (count($Genetique) != 0) {
                    $table = $table . " , " . $DAO->table('Genetique');
                }
                if (count($Phototheque) != 0) {
                    $table = $table . " , " . $DAO->table('Phototheque');
                }
                if (count($Documentation) != 0) {
                    $table = $table . " , " . $DAO->table('Documentation');
                }
                if (count($Bibliographie) != 0) {
                    $table = $table . " , " . $DAO->table('Bibliographie');
                }
                if (count($Partenaire) != 0) {
                    $table = $table . " , " . $DAO->table('Partenaire');
                }
                $condition_total = "";
                for ($n = 1; $n <= $i / 4; $n++) {
                    $name = 'section_' . $n;
                    //if dans les conditions, il y a ce section uniquement
                    $array = $$name;
                    if ($$name != 'Accession' && count($$array) == 1) {
                        $model_name = 'model_' . $n;
                        $champ_name = 'champ_' . $n;
                        $condition_name = 'condition_' . $n;
                        if ($$champ_name != "indifferent") {
                            $condition = $condition . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->securite($$name) . " and " . $DAO->lien_accession($$name);
                            $condition_total = $condition_total . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->lien_accession($$name);
                        } else {
                            $condition = $condition . " and " . $DAO->securite($$name) . " and " . $DAO->lien_accession($$name);
                            $condition_total = $condition_total . " and " . $DAO->lien_accession($$name);
                        }
                    } else if ($$name != 'Accession' && count($$array) > 1) {//il y a plusieur conditions sur une seule section
                        if ($n == ${$array}[0]) {//si c'est le premier ligne de condition 
                            for ($j = 0; $j < count($$array) - 1; $j++) {
                                $section_name = 'section_' . ${$array}[$j];
                                $model_name = 'model_' . ${$array}[$j];
                                $champ_name = 'champ_' . ${$array}[$j];
                                $condition_name = 'condition_' . ${$array}[$j];
                                if ($$champ_name != "indifferent") {
                                    $condition = $condition . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                    $condition_total = $condition_total . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                } else {
                                    $condition = $condition . " and ";
                                    $condition_total = $condition_total . " and ";
                                }
                            }
                            $section_nameLast = 'section_' . ${$array}[count($$array) - 1];
                            $model_nameLast = 'model_' . ${$array}[count($$array) - 1];
                            $champ_nameLast = 'champ_' . ${$array}[count($$array) - 1];
                            $condition_nameLastc = 'condition_' . ${$array}[count($$array) - 1];
                            if ($$champ_accession != "indifferent") {
                                $condition = $condition . " and " . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->securite($$section_nameLast) . " and " . $DAO->lien_accession($$section_nameLast);
                                $condition_total = $condition_total . " and " . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->lien_accession($$section_nameLast);
                            } else {
                                $condition = $condition . " and " . $DAO->securite($$section_nameLast) . " and " . $DAO->lien_accession($$section_nameLast);
                                $condition_total = $condition_total . " and " . $DAO->lien_accession($$section_nameLast);
                            }
                        } else {
                            $condition = $condition . "";
                            $condition_total = $condition_total . "";
                        }
                    } else if (count($Emplacement) == 0 && count($Espece) == 0 && count($Variete) == 0 && count($Sanitaire) == 0 && count($Morphologique) == 0 && count($Aptitude) == 0 && count($Genetique) == 0 && count($Phototheque) == 0 && count($Documentation) == 0 && count($Bibliograhpie) == 0 && count($Partenaire) == 0) {
                        $seul_accession = true;
                        $model_name = 'model_' . $n;
                        $champ_name = 'champ_' . $n;
                        $condition_name = 'condition_' . $n;
                        if ($$champ_name != "indifferent") {
                            $condition = $condition . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->securite($$name);
                            $condition_total = $condition_total . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name);
                        } else {
                            $condition = $condition . " and " . $DAO->securite($$name);
                            $condition_total = $condition_total . " ";
                        }
                    }
                }
                if ($seul_accession != true) {
                    $section_accession = 'section_' . $Accession[0];
                    $model_accession = 'model_' . $Accession[0];
                    $champ_accession = 'champ_' . $Accession[0];
                    $condition_accession = 'condition_' . $Accession[0];
                    if ($$champ_accession != "indifferent") {
                        $condition = $condition . " and " . $DAO->condition($$section_accession, $$model_accession, $$champ_accession, $$condition_accession) . " ";
                        $condition_total = $condition_total . " and " . $DAO->condition($$section_accession, $$model_accession, $$champ_accession, $$condition_accession) . " ";
                    } else {
                        $condition = $condition . " ";
                        $condition_total = $condition_total . "";
                    }
                }
                $section_accession = 'section_' . $Accession[0];
                $model_accession = 'model_' . $Accession[0];
                $champ_accession = 'champ_' . $Accession[0];
                $condition_accession = 'condition_' . $Accession[0];
                $sql_possible = $sql_possible . $table . " where " . $DAO->securite('Accession') . $condition;
                $sql_total = $sql_total . $table . " where  acc.CodeIntro=acc.CodeIntro " . $condition_total;
            } else {
                $sql_possible = " from " . $DAO->table('Accession');
                $sql_total = " from " . $DAO->table('Accession');
                if (count($Emplacement) != 0) {
                    $table = $table . " , " . $DAO->table('Emplacement');
                }
                if (count($Espece) != 0) {
                    $table = $table . " , " . $DAO->table('Espece');
                }
                if (count($Variete) != 0) {
                    $table = $table . " , " . $DAO->table('Variete');
                }
                if (count($Sanitaire) != 0) {
                    $table = $table . " , " . $DAO->table('Sanitaire');
                }
                if (count($Morphologique) != 0) {
                    $table = $table . " , " . $DAO->table('Morphologique');
                }
                if (count($Aptitude) != 0) {
                    $table = $table . " , " . $DAO->table('Aptitude');
                }
                if (count($Genetique) != 0) {
                    $table = $table . " , " . $DAO->table('Genetique');
                }
                if (count($Phototheque) != 0) {
                    $table = $table . " , " . $DAO->table('Phototheque');
                }
                if (count($Documentation) != 0) {
                    $table = $table . " , " . $DAO->table('Documentation');
                }
                if (count($Bibliographie) != 0) {
                    $table = $table . " , " . $DAO->table('Bibliographie');
                }
                if (count($Partenaire) != 0) {
                    $table = $table . " , " . $DAO->table('Partenaire');
                }
                for ($n = 1; $n <= $i / 4; $n++) {
                    $name = 'section_' . $n;
                    //if dans les conditions, il y a ce section uniquement
                    $array = $$name;
                    if (count($$array) != 0) {
                        if (count($Emplacement) == 0 && count($Espece) == 0 && count($Variete) == 0 && count($Sanitaire) == 0 && count($Morphologique) == 0 && count($Aptitude) == 0 && count($Genetique) == 0 && count($Phototheque) == 0 && count($Documentation) == 0 && count($Bibliograhpie) == 0 && count($Partenaire) == 0) {
                            $seul_accession = true;
                            if ($n == ${$array}[0]) {//si c'est le premier ligne de condition 
                                for ($j = 0; $j < count($$array) - 1; $j++) {
                                    $section_name = 'section_' . ${$array}[$j];
                                    $model_name = 'model_' . ${$array}[$j];
                                    $champ_name = 'champ_' . ${$array}[$j];
                                    $condition_name = 'condition_' . ${$array}[$j];
                                    if ($$champ_name != "indifferent") {
                                        $condition = $condition . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                        $condition_total = $condition_total . "  and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                    } else {
                                        $condition = $condition . "  and ";
                                        $condition_total = $condition_total . " ";
                                    }
                                }
                                $section_nameLast = 'section_' . ${$array}[count($$array) - 1];
                                $model_nameLast = 'model_' . ${$array}[count($$array) - 1];
                                $champ_nameLast = 'champ_' . ${$array}[count($$array) - 1];
                                $condition_nameLastc = 'condition_' . ${$array}[count($$array) - 1];
                                if ($$champ_accession != "indifferent") {
                                    $condition = $condition . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->securite($$section_nameLast);
                                    $condition_total = $condition_total . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc);
                                } else {
                                    $condition = $condition . $DAO->securite($$section_nameLast);
                                    $condition_total = $condition_total;
                                }
                            } else {
                                $condition = $condition . "";
                                $condition_total = $condition_total . "";
                            }
                        } else {
                            if ($$name != 'Accession' && count($$array) == 1) {
                                $model_name = 'model_' . $n;
                                $champ_name = 'champ_' . $n;
                                $condition_name = 'condition_' . $n;
                                if ($$champ_name != "indifferent") {
                                    $condition = $condition . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->securite($$name) . " and " . $DAO->lien_accession($$name);
                                    $condition_total = $condition_total . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->lien_accession($$name);
                                } else {
                                    $condition = $condition . " and " . $DAO->securite($$name) . " and " . $DAO->lien_accession($$name);
                                    $condition_total = $condition_total . " and " . $DAO->lien_accession($$name);
                                }
                            } else if ($$name != 'Accession' && count($$array) > 1) {//il y a plusieur conditions sur une seule section
                                if ($n == ${$array}[0]) {//si c'est le premier ligne de condition 
                                    for ($j = 0; $j < count($$array) - 1; $j++) {
                                        $section_name = 'section_' . ${$array}[$j];
                                        $model_name = 'model_' . ${$array}[$j];
                                        $champ_name = 'champ_' . ${$array}[$j];
                                        $condition_name = 'condition_' . ${$array}[$j];
                                        if ($$champ_name != "indifferent") {
                                            $condition = $condition . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                            $condition_total = $condition_total . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                        } else {
                                            $condition = $condition . " and ";
                                            $condition_total = $condition_total . " ";
                                        }
                                    }
                                    $section_nameLast = 'section_' . ${$array}[count($$array) - 1];
                                    $model_nameLast = 'model_' . ${$array}[count($$array) - 1];
                                    $champ_nameLast = 'champ_' . ${$array}[count($$array) - 1];
                                    $condition_nameLastc = 'condition_' . ${$array}[count($$array) - 1];
                                    if ($$champ_accession != "indifferent") {
                                        $condition = $condition . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->securite($$section_nameLast) . " and " . $DAO->lien_accession($$section_nameLast);
                                        $condition_total = $condition_total . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->lien_accession($$section_nameLast);
                                    } else {
                                        $condition = $condition . $DAO->securite($$section_nameLast) . " and " . $DAO->lien_accession($$section_nameLast);
                                        $condition_total = $condition_total . $DAO->lien_accession($$section_nameLast);
                                    }
                                } else {
                                    $condition = $condition . "";
                                    $condition_total = $condition_total . "";
                                }
                            }
                        }
                    }
                }
                if ($seul_accession != true) {
                    $condition = $condition . " and ";
                    $condition_total = $condition_total . " and ";
                    for ($a = 0; $a < count($Accession) - 1; $a++) {
                        $section_accession = 'section_' . $Accession[$a];
                        $model_accession = 'model_' . $Accession[$a];
                        $champ_accession = 'champ_' . $Accession[$a];
                        $condition_accession = 'condition_' . $Accession[$a];
                        if ($$champ_accession != "indifferent") {
                            $condition = $condition . $DAO->condition($$section_accession, $$model_accession, $$champ_accession, $$condition_accession);
                            $condition_total = $condition_total . $DAO->condition($$section_accession, $$model_accession, $$champ_accession, $$condition_accession);
                        } else {
                            $condition = $condition . " ";
                            $condition_total = $condition_total . " ";
                        }
                    }
                    $section_acc = 'section_' . $Accession[count($Accession) - 1];
                    $model_acc = 'model_' . $Accession[count($Accession) - 1];
                    $champ_acc = 'champ_' . $Accession[count($Accession) - 1];
                    $condition_acc = 'condition_' . $Accession[count($Accession) - 1];
                    if ($$champ_acc != "indifferent") {
                        $condition = $condition . " and " . $DAO->condition($$section_acc, $$model_acc, $$champ_acc, $$condition_acc);
                        $condition_total = $condition_total . " and " . $DAO->condition($$section_acc, $$model_acc, $$champ_acc, $$condition_acc);
                    } else {
                        $condition = $condition;
                        $condition_total = $condition_total . "";
                    }
                }
                $section_acc = 'section_' . $Accession[count($Accession) - 1];
                $model_acc = 'model_' . $Accession[count($Accession) - 1];
                $champ_acc = 'champ_' . $Accession[count($Accession) - 1];
                $condition_acc = 'condition_' . $Accession[count($Accession) - 1];
                $sql_possible = $sql_possible . $table . " where " . $DAO->securite('Accession') . $condition;
                $sql_total = $sql_total . $table . " where acc.CodeIntro=acc.CodeIntro" . $condition_total;
            }
        } else if (count($Variete) != 0 && count($Accession) == 0) {
            $sql_possible = "";
            $sql_total = "";
            if (count($Variete) == 1) {
                $sql_possible = " from " . $DAO->table('Variete');
                $sql_total = " from " . $DAO->table('Variete');
                if (count($Emplacement) != 0) {
                    $table = $table . " , " . $DAO->table('Emplacement');
                }
                if (count($Espece) != 0) {
                    $table = $table . " , " . $DAO->table('Espece');
                }
                if (count($Accession) != 0) {
                    $table = $table . " , " . $DAO->table('Accession');
                }
                if (count($Sanitaire) != 0) {
                    $table = $table . " , " . $DAO->table('Sanitaire');
                }
                if (count($Morphologique) != 0) {
                    $table = $table . " , " . $DAO->table('Morphologique');
                }
                if (count($Aptitude) != 0) {
                    $table = $table . " , " . $DAO->table('Aptitude');
                }
                if (count($Genetique) != 0) {
                    $table = $table . " , " . $DAO->table('Genetique');
                }
                if (count($Phototheque) != 0) {
                    $table = $table . " , " . $DAO->table('Phototheque');
                }
                if (count($Documentation) != 0) {
                    $table = $table . " , " . $DAO->table('Documentation');
                }
                if (count($Bibliographie) != 0) {
                    $table = $table . " , " . $DAO->table('Bibliographie');
                }
                if (count($Partenaire) != 0) {
                    $table = $table . " , " . $DAO->table('Partenaire');
                }
                for ($n = 1; $n <= $i / 4; $n++) {
                    $name = 'section_' . $n;
                    //if dans les conditions, il y a ce section uniquement
                    $array = $$name;
                    if ($$name != 'Variete' && count($$array) == 1) {
                        $model_name = 'model_' . $n;
                        $champ_name = 'champ_' . $n;
                        $condition_name = 'condition_' . $n;
                        if ($$champ_name != "indifferent") {
                            $condition = $condition . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->securite($$name) . " and " . $DAO->lien_variete($$name);
                            $condition_total = $condition_total . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->lien_variete($$name);
                        } else {
                            $condition = $condition . " and " . $DAO->securite($$name) . " and " . $DAO->lien_variete($$name);
                            $condition_total = $condition_total . " and " . $DAO->lien_variete($$name);
                        }
                    } else if ($$name != 'Variete' && count($$array) > 1) {//il y a plusieur conditions sur une seule section
                        if ($n == ${$array}[0]) {//si c'est le premier ligne de condition 
                            for ($j = 0; $j < count($$array) - 1; $j++) {
                                $section_name = 'section_' . ${$array}[$j];
                                $model_name = 'model_' . ${$array}[$j];
                                $champ_name = 'champ_' . ${$array}[$j];
                                $condition_name = 'condition_' . ${$array}[$j];
                                if ($$champ_name != "indifferent") {
                                    $condition = $condition . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                    $condition_total = $condition_total . " , " . $DAO->table($$name) . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                } else {
                                    $condition = $condition . " and ";
                                    $condition_total = $condition_total . " and ";
                                }
                            }
                            $section_nameLast = 'section_' . ${$array}[count($$array) - 1];
                            $model_nameLast = 'model_' . ${$array}[count($$array) - 1];
                            $champ_nameLast = 'champ_' . ${$array}[count($$array) - 1];
                            $condition_nameLastc = 'condition_' . ${$array}[count($$array) - 1];
                            if ($$champ_accession != "indifferent") {
                                $condition = $condition . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->securite($$section_nameLast) . " and " . $DAO->lien_variete($$section_nameLast);
                                $condition_total = $condition_total . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->lien_variete($$section_nameLast);
                            } else {
                                $condition = $condition . $DAO->securite($$section_nameLast) . " and " . $DAO->lien_variete($$section_nameLast);
                                $condition_total = $condition_total . $DAO->lien_variete($$section_nameLast);
                            }
                        } else {
                            $condition = $condition . "";
                            $condition_total = $condition_total . "";
                        }
                    } else if (count($Emplacement) == 0 && count($Espece) == 0 && count($Accession) == 0 && count($Sanitaire) == 0 && count($Morphologique) == 0 && count($Aptitude) == 0 && count($Genetique) == 0 && count($Phototheque) == 0 && count($Documentation) == 0 && count($Bibliograhpie) == 0 && count($Partenaire) == 0) {
                        $seul_variete = true;
                        $model_name = 'model_' . $n;
                        $champ_name = 'champ_' . $n;
                        $condition_name = 'condition_' . $n;
                        if ($$champ_name != "indifferent") {
                            $condition = $condition . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name);
                            $condition_total = $condition_total . "  and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name);
                        } else {
                            $condition = $condition;
                            $condition_total = $condition_total;
                        }
                    }
                }
                if ($seul_variete != true) {
                    $section_accession = 'section_' . $Variete[0];
                    $model_accession = 'model_' . $Variete[0];
                    $champ_accession = 'champ_' . $Variete[0];
                    $condition_accession = 'condition_' . $Variete[0];
                    if ($$champ_accession != "indifferent") {
                        $condition = $condition . " and " . $DAO->condition($$section_accession, $$model_accession, $$champ_accession, $$condition_accession) . " ";
                        $condition_total = $condition_total . " and " . $DAO->condition($$section_accession, $$model_accession, $$champ_accession, $$condition_accession) . " ";
                    } else {
                        $condition = $condition . " ";
                        $condition_total = $condition_total . "";
                    }
                }
                $sql_possible = $sql_possible . $table . " where " . $DAO->securite('Variete') . $condition;
                $sql_total = $sql_total . $table . " where  var.CodeVar=var.CodeVar " . $condition_total;
            } else {
                $sql_possible = " from " . $DAO->table('Variete');
                $sql_total = " from " . $DAO->table('Variete');
                if (count($Emplacement) != 0) {
                    $table = $table . " , " . $DAO->table('Emplacement');
                }
                if (count($Espece) != 0) {
                    $table = $table . " , " . $DAO->table('Espece');
                }
                if (count($Accession) != 0) {
                    $table = $table . " , " . $DAO->table('Accession');
                }
                if (count($Sanitaire) != 0) {
                    $table = $table . " , " . $DAO->table('Sanitaire');
                }
                if (count($Morphologique) != 0) {
                    $table = $table . " , " . $DAO->table('Morphologique');
                }
                if (count($Aptitude) != 0) {
                    $table = $table . " , " . $DAO->table('Aptitude');
                }
                if (count($Genetique) != 0) {
                    $table = $table . " , " . $DAO->table('Genetique');
                }
                if (count($Phototheque) != 0) {
                    $table = $table . " , " . $DAO->table('Phototheque');
                }
                if (count($Documentation) != 0) {
                    $table = $table . " , " . $DAO->table('Documentation');
                }
                if (count($Bibliographie) != 0) {
                    $table = $table . " , " . $DAO->table('Bibliographie');
                    // $table=$talbe."!!!!!!!!!!!!!!!!!!!!!!";
                }
                if (count($Partenaire) != 0) {
                    $table = $table . " , " . $DAO->table('Partenaire');
                }
                for ($n = 1; $n <= $i / 4; $n++) {
                    $name = 'section_' . $n;
                    //if dans les conditions, il y a ce section uniquement
                    $array = $$name;
                    if (count($Emplacement) == 0 && count($Espece) == 0 && count($Accession) == 0 && count($Sanitaire) == 0 && count($Morphologique) == 0 && count($Aptitude) == 0 && count($Genetique) == 0 && count($Phototheque) == 0 && count($Documentation) == 0 && count($Bibliograhpie) == 0 && count($Partenaire) == 0) {
                        $seul_variete == true;
                        if ($n == ${$array}[0]) {//si c'est le premier ligne de condition 
                            for ($j = 0; $j < count($$array) - 1; $j++) {
                                $section_name = 'section_' . ${$array}[$j];
                                $model_name = 'model_' . ${$array}[$j];
                                $champ_name = 'champ_' . ${$array}[$j];
                                $condition_name = 'condition_' . ${$array}[$j];
                                if ($$champ_name != "indifferent") {
                                    $condition = $condition . "  and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                    $condition_total = $condition_total . "  and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                } else {
                                    $condition = $condition . "  and ";
                                    $condition_total = $condition_total . "  and ";
                                }
                            }
                            $section_nameLast = 'section_' . ${$array}[count($$array) - 1];
                            $model_nameLast = 'model_' . ${$array}[count($$array) - 1];
                            $champ_nameLast = 'champ_' . ${$array}[count($$array) - 1];
                            $condition_nameLastc = 'condition_' . ${$array}[count($$array) - 1];
                            if ($$champ_accession != "indifferent") {
                                $condition = $condition . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc);
                                $condition_total = $condition_total . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc);
                            } else {
                                $condition = $condition;
                                $condition_total = $condition_total;
                            }
                        } else {
                            $condition = $condition . "";
                            $condition_total = $condition_total . "";
                        }
                    } else {
                        if ($$name != 'Variete' && count($$array) == 1) {
                            $model_name = 'model_' . $n;
                            $champ_name = 'champ_' . $n;
                            $condition_name = 'condition_' . $n;
                            if ($$champ_name != "indifferent") {
                                $condition = $condition . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->securite($$name) . " and " . $DAO->lien_variete($$name);
                                $condition_total = $condition_total . " and " . $DAO->condition($$name, $$model_name, $$champ_name, $$condition_name) . " and " . $DAO->lien_variete($$name);
                            } else {
                                $condition = $condition . " and " . $DAO->securite($$name) . " and " . $DAO->lien_variete($$name);
                                $condition_total = $condition_total . " and " . $DAO->lien_variete($$name);
                            }
                        } else if ($$name != 'Variete' && count($$array) > 1) {//il y a plusieur conditions sur une seule section
                            if ($n == ${$array}[0]) {//si c'est le premier ligne de condition 
                                for ($j = 0; $j < count($$array) - 1; $j++) {
                                    $section_name = 'section_' . ${$array}[$j];
                                    $model_name = 'model_' . ${$array}[$j];
                                    $champ_name = 'champ_' . ${$array}[$j];
                                    $condition_name = 'condition_' . ${$array}[$j];
                                    if ($$champ_name != "indifferent") {
                                        $condition = $condition . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                        $condition_total = $condition_total . " and " . $DAO->condition($$section_name, $$model_name, $$champ_name, $$condition_name) . " and  ";
                                    } else {
                                        $condition = $condition . " and ";
                                        $condition_total = $condition_total . " and ";
                                    }
                                }
                                $section_nameLast = 'section_' . ${$array}[count($$array) - 1];
                                $model_nameLast = 'model_' . ${$array}[count($$array) - 1];
                                $champ_nameLast = 'champ_' . ${$array}[count($$array) - 1];
                                $condition_nameLastc = 'condition_' . ${$array}[count($$array) - 1];
                                if ($$champ_accession != "indifferent") {
                                    $condition = $condition . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->securite($$section_nameLast) . " and " . $DAO->lien_variete($$section_nameLast);
                                    $condition_total = $condition_total . $DAO->condition($$section_nameLast, $$model_nameLast, $$champ_nameLast, $$condition_nameLastc) . " and " . $DAO->lien_variete($$section_nameLast);
                                } else {
                                    $condition = $condition . $DAO->securite($$section_nameLast) . " and " . $DAO->lien_variete($$section_nameLast);
                                    $condition_total = $condition_total . $DAO->lien_variete($$section_nameLast);
                                }
                            } else {
                                $condition = $condition . "";
                                $condition_total = $condition_total . "";
                            }
                        }
                    }
                }
                if ($seul_variete != true) {
                    $condition = $condition . " and ";
                    $condition_total = $condition_total . " and ";
                    for ($a = 0; $a < count($Variete) - 1; $a++) {
                        $section_accession = 'section_' . $Variete[$a];
                        $model_accession = 'model_' . $Variete[$a];
                        $champ_accession = 'champ_' . $Variete[$a];
                        $condition_accession = 'condition_' . $Variete[$a];
                        if ($$champ_accession != "indifferent") {
                            $condition = $condition . $DAO->condition($$section_accession, $$model_accession, $$champ_accession, $$condition_accession) . "  and ";
                            $condition_total = $condition_total . $DAO->condition($$section_accession, $$model_accession, $$champ_accession, $$condition_accession) . "  and ";
                        } else {
                            $condition = $condition . " ";
                            $condition_total = $condition_total . " ";
                        }
                    }
                    $section_var = 'section_' . $Variete[count($Variete) - 1];
                    $model_var = 'model_' . $Variete[count($Variete) - 1];
                    $champ_var = 'champ_' . $Variete[count($Variete) - 1];
                    $condition_var = 'condition_' . $Variete[count($Variete) - 1];
                    if ($$champ_accession != "indifferent") {
                        $condition = $condition . $DAO->condition($$section_var, $$model_var, $$champ_var, $$condition_var);
                        $condition_total = $condition_total . $DAO->condition($$section_var, $$model_var, $$champ_var, $$condition_var);
                    } else {
                        $condition = $condition;
                        $condition_total = $condition_total . "";
                    }
                }
                $sql_possible = $sql_possible . $table . " where " . $DAO->securite('Variete') . $condition;
                $sql_total = $sql_total . $table . " where  var.CodeVar=var.CodeVar " . $condition_total;
            }
        }

        $resultat = array();
        // for($x=1;$x<=$i/4;$x++){
        // $name='section_'.$x;
        // $resultat[$$name]=$DAO->requete($sql_total,$sql_possible,$$name,$langue);
        // }

        $resultat['sql_possible'] = $sql_possible;
        $resultat['sql_total'] = $sql_total;

        if (count($Emplacement) != 0) {
            $resultat['Emplacement'] = "Emplacement";
        }
        if (count($Espece) != 0) {
            $resultat['Espece'] = "Espece";
        }
        if (count($Variete) != 0) {
            $resultat['Variete'] = "Variete";
        }
        if (count($Accession) != 0) {
            $resultat['Accession'] = "Accession";
        }
        if (count($Sanitaire) != 0) {
            $resultat['Sanitaire'] = "Sanitaire";
        }
        if (count($Morphologique) != 0) {
            $resultat['Morphologique'] = "Morphologique";
        }
        if (count($Aptitude) != 0) {
            $resultat['Aptitude'] = "Aptitude";
        }
        if (count($Genetique) != 0) {
            $resultat['Genetique'] = "Genetique";
        }
        if (count($Phototheque) != 0) {
            $resultat['Phototheque'] = "Phototheque";
        }
        if (count($Documentation) != 0) {
            $resultat['Documentation'] = "Documentation";
        }
        if (count($Bibliographie) != 0) {
            $resultat['Bibliographie'] = "Bibliographie";
        }
        if (count($Partenaire) != 0) {
            $resultat['Partenaire'] = "Partenaire";
        }
        return $resultat;
    }

    public function table($section) {
        switch ($section) {
            case "Espece":
                $table = " `NV-ESPECES` esp ";
                break;
            case "Variete":
                $table = " `NV-VARIETES` var ";
                break;
            case "Accession":
                $table = " `NV-INTRODUCTIONS` acc ";
                break;
            case "Emplacement":
                $table = " `NV-EMPLACEMENTS` emp, `Emplacements_theoriques` t,`NV-INTRODUCTIONS` i ";
                break;
            case "Sanitaire":
                $table = " `Tests_sanitaires`  san ";
                break;
            case "Morphologique":
                $table = " `Descripteurs_ampelographiques` d,  `Ampelographie` mor,  `Caracteres_ampelographiques` c ";
                break;
            case "Aptitude":
                $table = " `Aptitudes` apt ";
                break;
            case "Bibliographie":
                $table = " `Bibliographie_citations` bib,`Bibliographie_documents` d ";
                break;
            case "Phototheque":
                $table = " `Phototheque` pho ";
                break;
            case "Documentation":
                $table = " `Documents_pdf_JY` doc ";
                break;
            case "Partenaire":
                $table = " `Partenaires` par ";
                break;
            case "Genetique":
                $table = " `BM-donnees_resume` gen ";
                break;
        }
        return $table;
    }

    public function condition($section, $model, $champ, $condition) {
        switch ($section) {
            case "Espece":
                switch ($model) {
                    case "like":
                        $con = "esp." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "esp." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "esp." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "esp." . $champ . " REGEXP '" . $condition . "$'";
                        break;
                }
                break;
            case "Variete":
                switch ($model) {
                    case "like":
                        $con = "var." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "var." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "var." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "var." . $champ . " REGEXP '" . $condition . "$'";
                        break;
                }
                break;
            case "Accession":
                switch ($model) {
                    case "like":
                        $con = "acc." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "acc." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "acc." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "acc." . $champ . " REGEXP '" . $condition . "$'";
                        break;
                }
                break;
            case "Emplacement":
                $champ_nouveau = "";
                switch ($champ) {
                    case "CodeEmplacem":
                        $champ_nouveau = " t." . $champ;
                        break;
                    case "CodeSite":
                        $champ_nouveau = " t." . $champ;
                        break;
                    case "Parcelle":
                        $champ_nouveau = " t." . $champ;
                        break;
                    case "Rang":
                        $champ_nouveau = " t." . $champ;
                        break;
                    case "AnneePlantation":
                        $champ_nouveau = " e." . $champ;
                        break;
                    case "NomIntro":
                        $champ_nouveau = " i." . $champ;
                        break;
                    case "CodeIntro":
                        $champ_nouveau = " e." . $champ;
                        break;
                    case "PremiereSouche":
                        $champ_nouveau = " t." . $champ;
                        break;
                    case "TypeSouche":
                        $champ_nouveau = " t." . $champ;
                        break;
                }
                switch ($model) {
                    case "like":
                        $con = $champ_nouveau . " REGEXP '" . $condition . "' ";
                        break;
                    case "start":
                        $con = $champ_nouveau . " REGEXP '^" . $condition . "' ";
                        break;
                    case "exact":
                        $con = $champ_nouveau . "='" . $condition . "' ";
                        break;
                    case "finish":
                        $con = $champ_nouveau . " REGEXP '" . $condition . "$' ";
                        break;
                }
                break;
            case "Sanitaire":
                switch ($model) {
                    case "like":
                        $con = "san." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "san." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "san." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "san." . $champ . " REGEXP '" . $condition . "$'";
                        break;
                }
                break;
            case "Morphologique":
                $array_champ = explode("_", $champ);
                $champ_nouveau = $array_champ[0];
                // $con="~~~~~".$array_champ[0]."~~~~~~";
                switch ($champ_nouveau) {
                    case "Descripteurs":
                        $con = " c.CodeOIV='" . $array_champ[1] . "' and c.CaractereOIV='" . $condition . "'";
                        break;
                    case "CaractereOIV":
                        $con = " c.CaractereOIV='" . $array_champ[1] . "' and c.CodeOIV='" . $condition . "'";
                        break;
                    case "CodeOIV":
                        $con = " c.CodeOIV='" . $array_champ[1] . "' and c.CaractereOIV='" . $condition . "'";
                        break;
                }
                break;
            case "Aptitude":
                switch ($model) {
                    case "like":
                        $con = "apt." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "apt." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "apt." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "apt." . $champ . " REGEXP '" . $condition . "$'";
                        break;
                }
                break;
            case "Bibliographie":
                switch ($model) {
                    case "like":
                        $con = "d." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "d." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "d." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "d." . $champ . " REGEXP '" . $condition . "$' ";
                        break;
                }
                break;
            case "Phototheque":
                switch ($model) {
                    case "like":
                        $con = "pho." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "pho." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "pho." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "pho." . $champ . " REGEXP '" . $condition . "$'";
                        break;
                }
                break;
            case "Documentation":
                switch ($model) {
                    case "like":
                        $con = "doc." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "doc." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "doc." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "doc." . $champ . " REGEXP '" . $condition . "$'";
                        break;
                }
                break;
            case "Partenaire":
                switch ($model) {
                    case "like":
                        $con = "par." . $champ . " REGEXP '" . $condition . "'";
                        break;
                    case "start":
                        $con = "par." . $champ . " REGEXP '^" . $condition . "'";
                        break;
                    case "exact":
                        $con = "par." . $champ . "='" . $condition . "'";
                        break;
                    case "finish":
                        $con = "par." . $champ . " REGEXP '" . $condition . "$'";
                        break;
                }
                break;
            case "Genetique":
                $marqueur = $champ;
                $array_condition = explode("_", $condition);
                $ValeurCodee1 = $array_condition[0];
                $ValeurCodee2 = $array_condition[1];
                if ($ValeurCodee1 != '' && $ValeurCodee2 != '') {
                    $con = " gen.Marqueur='" . $marqueur . "' and gen.ValeurCodee1='" . $ValeurCodee1 . "' and gen.ValeurCodee2='" . $ValeurCodee2 . "' ";
                } else if ($ValeurCodee1 == '' && $ValeurCodee2 != '') {
                    $con = " gen.Marqueur='" . $marqueur . "' and gen.ValeurCodee2='" . $ValeurCodee2 . "' ";
                } else if ($ValeurCodee1 != '' && $ValeurCodee2 == '') {
                    $con = " gen.Marqueur='" . $marqueur . "' and gen.ValeurCodee1='" . $ValeurCodee1 . "' ";
                } else {
                    $con = " gen.Marqueur='" . $marqueur . "' ";
                }
                break;
        }
        return $con;
    }

    public function securite($section) {
        switch ($section) {
            case "Espece":
                if (isset($_SESSION['codePersonne'])) {
                    $sec = " esp.CodeEsp=esp.CodeEsp ";
                } else {
                    $sec = " esp.public!='N' ";
                }
                break;
            case "Variete":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sec = " var.CodeVar=var.CodeVar ";
                    } else {
                        $sec = "(var.CodeVar=var.CodeVar and  var.codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or (var.CodeVar=var.CodeVar and var.public!='N') ";
                    }
                } else {
                    $sec = " var.public!='N' ";
                }
                break;
            case "Accession":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sec = " acc.CodeIntro=acc.CodeIntro ";
                    } else {
                        $sec = " (acc.IdReseau1='a' or acc.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' or ((acc.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or(acc.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or (acc.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or(acc.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) ";
                    }
                } else {
                    $sec = " acc.IdReseau1='a' ";
                }
                break;
            case "Emplacement":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A' || $_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sec = "  emp.IdEmplacem=emp.IdEmplacem  ";
                    } else {
                        $sec = " emp.AffichEmplacInternet='O' ";
                    }
                } else {
                    $sec = " emp.AffichEmplacInternet='O' ";
                }
                break;
            case "Sanitaire":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sec = " san.IdTest=san.IdTest ";
                    } else {
                        $sec = " (san.IdReseau1='a' or san.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' or ((san.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or(san.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or (san.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or(san.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) ";
                    }
                } else {
                    $sec = " san.IdReseau1='a' ";
                }
                break;
            case "Morphologique":
                if (isset($_SESSION['codePersonne'])) {
                    $sec = " mor.CodeAmpelo=mor.CodeAmpelo ";
                } else {
                    $sec = " mor.public!='N' ";
                }
                break;
            case "Aptitude":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sec = " apt.CodeAptitude=apt.CodeAptitude";
                    } else {
                        $sec = " (apt.IdReseau1='a' or apt.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' or ((apt.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or(apt.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or (apt.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or(apt.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) ";
                    }
                } else {
                    $sec = " apt.IdReseau1='a' ";
                }
                break;
            case "Bibliographie":
                if (isset($_SESSION['codePersonne'])) {
                    $sec = " bib.CodeCit=bib.CodeCit ";
                } else {
                    $sec = " bib.JY_Public!='N' and d.Public!='N' ";
                }
                break;
            case "Phototheque":
                if (isset($_SESSION['codePersonne'])) {
                    $sec = " pho.CodePhoto=pho.CodePhoto ";
                } else {
                    $sec = " pho.Public!='N' ";
                }
                break;
            case "Documentation":
                if (isset($_SESSION['codePersonne'])) {
                    $sec = " doc.CodeDocPdf=doc.CodeDocPdf ";
                } else {
                    $sec = " doc.Public!='N' ";
                }
                break;
            case "Genetique":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sec = " gen.IdAnalyse=gen.IdAnalyse ";
                    } else {
                        $sec = " (gen.IdReseau1='a' or gen.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' or ((gen.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or(gen.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or (gen.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or(gen.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) ";
                    }
                } else {
                    $sec = " gen.IdReseau1='a' ";
                }
                break;
            case "Partenaire":
                $sec = " par.CodePartenaire=par.CodePartenaire ";
                break;
        }
        return $sec;
    }

    public function lien_accession($table) {
        switch ($table) {
            case "Espece":
                $lien_accession = "acc.codeVar in (select v.codeVar from `NV-VARIETES` v ,`NV-ESPECES` e where v.CodeEsp=e.CodeEsp)";
                break;
            case "Variete":
                $lien_accession = "acc.CodeVar=var.CodeVar";
                break;
            case "Emplacement":
                $lien_accession = " acc.CodeIntro=emp.CodeIntro and i.CodeIntro=emp.CodeIntro and i.CodeIntro=acc.CodeIntro  and emp.CodeEmplacem=t.CodeEmplacem and i.CodeIntro=emp.CodeIntro ";
                break;
            case "Sanitaire":
                $lien_accession = "acc.CodeIntro=san.CodeIntro";
                break;
            case "Morphologique":
                $lien_accession = "acc.CodeIntro=mor.CodeIntro  and mor.CaractereOIV=c.CaractereOIV and c.CodeOIV=d.CodeOIV ";
                break;
            case "Aptitude":
                $lien_accession = "acc.CodeIntro=apt.CodeIntro";
                break;
            case "Bibliographie":
                $lien_accession = "acc.CodeIntro=bib.CodeIntro  and bib.CodeDoc=d.CodeDoc ";
                break;
            case "Phototheque":
                $lien_accession = "acc.CodeIntro=pho.CodeIntro";
                break;
            case "Documentation":
                $lien_accession = "acc.CodeIntro=doc.CodeIntro";
                break;
            case "Genetique":
                $lien_accession = "acc.CodeIntro=gen.CodeIntro";
                break;
            case "Partenaire":
                $lien_accession = "acc.CodePartenaire=par.CodePartenaire";
                break;
        }
        return $lien_accession;
    }

    public function lien_variete($table) {
        switch ($table) {
            case "Espece":
                $lien_variete = "var.CodeEsp=esp.CodeEsp";
                break;
            case "Accession":
                $lien_variete = "acc.CodeVar=var.CodeVar";
                break;
            case "Emplacement":
                $lien_variete = "var.CodeVar in(select i.CodeVar from `NV-INTRODUCTIONS`  i,`NV-EMPLACEMENTS` em where i.CodeIntro=em.CodeIntro )  and i.CodeIntro=emp.CodeIntro and i.CodeIntro=acc.CodeIntro  and emp.CodeEmplacem=t.CodeEmplacem and i.CodeIntro=emp.CodeIntro ";
                break;
            case "Sanitaire":
                $lien_variete = "var.CodeVar in (select i.CodeVar from `NV-INTRODUCTIONS` i, `Tests_sanitaires` s where i.CodeIntro=s.CodeIntro)";
                break;
            case "Morphologique":
                $lien_variete = "var.CodeVar in (select i.CodeVar from `NV-INTRODUCTIONS` i, `Ampelographie` a where i.CodeIntro=a.CodeIntro)   and mor.CaractereOIV=c.CaractereOIV ";
                break;
            case "Aptitude":
                $lien_variete = "var.CodeVar=apt.CodeVar";
                break;
            case "Bibliographie":
                $lien_variete = "var.CodeVar=bib.CodeVar   and bib.CodeDoc=d.CodeDoc ";
                break;
            case "Phototheque":
                $lien_variete = "var.CodeVar=pho.CodeVar";
                break;
            case "Documentation":
                $lien_variete = "var.CodeVar=doc.CodeVar";
                break;
            case "Genetique":
                $lien_variete = "var.CodeVar=gen.CodeVar";
                break;
            case "Partenaire":
                $lien_variete = "var.CodeVar in (select i.CodeVar from `NV-INTRODUCTIONS` i, `Partenaires` p where i.CodePartenaire=p.CodePartenaire)";
                break;
        }
        return $lien_variete;
    }

    public function requete($sql_total_pre, $sql_possible_pre, $section, $langue, $curpage, $pagesize, $tri_section, $tri_colone) {
        $sql_total = str_replace("\\", "", $sql_total_pre);
        $sql_possible = str_replace("\\", "", $sql_possible_pre);
        $DAO = new BibliothequeDAO();
        switch ($section) {
            case "Espece":

                $sql_limite = "select esp.* " . $sql_possible . " " . $DAO->group('Espece', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select esp.* " . $sql_total . " " . $DAO->group('Espece', $tri_section, $tri_colone);
                $sql_possible = "select esp.*" . $sql_possible . " " . $DAO->group('Espece', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentEspece($sql_limite, $sql_total, $curpage, $pagesize, $sql_possible);
                deconnexion_bbd();
                break;
            case "Variete":
                $sql_limite = "select var.*" . $sql_possible . " " . $DAO->group('Variete', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select var.*" . $sql_total . " " . $DAO->group('Variete', $tri_section, $tri_colone);
                $sql_possible = "select var.*" . $sql_possible . " " . $DAO->group('Variete', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentVariete($sql_limite, $sql_total, $_SESSION['language_Vigne'], $curpage, $pagesize, $sql_possible);
                deconnexion_bbd();
                break;
            case "Accession":
                $sql_limite = "select acc.* " . $sql_possible . " " . $DAO->group('Accession', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select acc.* " . $sql_total . " " . $DAO->group('Accession', $tri_section, $tri_colone);
                $sql_possible = "select acc.* " . $sql_possible . " " . $DAO->group('Accession', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentAccession($sql_limite, $sql_total, $_SESSION['language_Vigne'], $curpage, $pagesize, $sql_possible);
                deconnexion_bbd();
                break;
            case "Emplacement":
                $sql_limite = "select emp.*,t.*,i.* " . $sql_possible . " " . $DAO->group('Emplacement', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select emp.*,t.*,i.*" . $sql_total . " " . $DAO->group('Emplacement', $tri_section, $tri_colone);
                $sql_possible = "select emp.*,t.*,i.*" . $sql_possible . " " . $DAO->group('Emplacement', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentEmplacement($sql_limite, $sql_total, $curpage, $pagesize, $sql_possible);
                deconnexion_bbd();
                break;
            case "Sanitaire":

                $sql_limite = "select san.* " . $sql_possible . " " . $DAO->group('Sanitaire', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select san.* " . $sql_total . " " . $DAO->group('Sanitaire', $tri_section, $tri_colone);
                $sql_possible = "select san.* " . $sql_possible . " " . $DAO->group('Sanitaire', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentSanitaire($sql_limite, $sql_total, $curpage, $pagesize, $_SESSION['language_Vigne'], $sql_possible);
                deconnexion_bbd();
                break;
            case "Morphologique":

                $sql_limite = "select d.*,mor.*,c.* " . $sql_possible . " " . $DAO->group('Morphologique', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select d.*,mor.*,c.* " . $sql_total . " " . $DAO->group('Morphologique', $tri_section, $tri_colone);
                $sql_possible = "select d.*,mor.*,c.* " . $sql_possible . " " . $DAO->group('Morphologique', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentMorphologique($sql_limite, $sql_total, $curpage, $pagesize, $_SESSION['language_Vigne'], $sql_possible);
                deconnexion_bbd();
                break;
            case "Aptitude":

                $sql_limite = "select apt.* " . $sql_possible . " " . $DAO->group('Aptitude', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select apt.* " . $sql_total . " " . $DAO->group('Aptitude', $tri_section, $tri_colone);
                $sql_possible = "select apt.* " . $sql_possible . " " . $DAO->group('Aptitude', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentAptitude($sql_limite, $sql_total, $curpage, $pagesize, $_SESSION['language_Vigne'], $sql_possible);
                deconnexion_bbd();

                break;
            case "Genetique":
                $sql_limite = "select gen.* " . $sql_possible . " " . $DAO->group('Genetique', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select gen.* " . $sql_total . " " . $DAO->group('Genetique', $tri_section, $tri_colone);
                $sql_possible = "select gen.* " . $sql_possible . " " . $DAO->group('Genetique', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentGenetique($sql_limite, $sql_total, $curpage, $pagesize, $_SESSION['language_Vigne'], $sql_possible);
                deconnexion_bbd();
                break;
            case "Phototheque":
                $sql_limite = "select pho.* " . $sql_possible . " " . $DAO->group('Phototheque', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select pho.* " . $sql_total . " " . $DAO->group('Phototheque', $tri_section, $tri_colone);
                $sql_possible = "select pho.* " . $sql_possible . " " . $DAO->group('Phototheque', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentPhototheque($sql_possible, $_SESSION['language_Vigne']);
                deconnexion_bbd();
                break;
            case "Documentation":
                $sql_limite = "select doc.* " . $sql_possible . " " . $DAO->group('Documentation', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select doc.* " . $sql_total . " " . $DAO->group('Documentation', $tri_section, $tri_colone);
                $sql_possible = "select doc.* " . $sql_possible . " " . $DAO->group('Documentation', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentDocumentation($sql_limite, $sql_total, $curpage, $pagesize, $_SESSION['language_Vigne'], $sql_possible);
                deconnexion_bbd();
                break;
            case "Bibliographie":

                $sql_limite = "select bib.*,d.* " . $sql_possible . " " . $DAO->group('Bibliographie', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select bib.*,d.*" . $sql_total . " " . $DAO->group('Bibliographie', $tri_section, $tri_colone);
                $sql_possible = "select bib.*,d.*" . $sql_possible . " " . $DAO->group('Bibliographie', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentBibliographie($sql_limite, $sql_total, $curpage, $pagesize, $_SESSION['language_Vigne'], $sql_possible);
                deconnexion_bbd();
                break;
            case "Partenaire":
                $sql_limite = "select par.* " . $sql_possible . " " . $DAO->group('Partenaire', $tri_section, $tri_colone) . $DAO->limit($curpage, $pagesize);
                $sql_total = "select par.* " . $sql_total . " " . $DAO->group('Partenaire', $tri_section, $tri_colone);
                $sql_possible = "select par.* " . $sql_possible . " " . $DAO->group('Partenaire', $tri_section, $tri_colone);
                connexion_bbd();
                mysql_query('SET NAMES UTF8');
                $res = $DAO->chargeContentPartenaire($sql_limite, $sql_total, $curpage, $pagesize, $_SESSION['language_Vigne'], $sql_possible);
                deconnexion_bbd();
                break;
        }
        // return array($sql_limite=>$sql_total,"poss"=>$sql_possible);
        return $res;
    }

    public function group($section, $tri_section, $tri_colone) {
        switch ($section) {
            case "Espece":
                if ($tri_section == 1) {
                    $tri = "group by esp.CodeEsp," . $tri_colone . " order by " . $tri_colone . " asc";
                }
                if ($tri_section == 2) {
                    $tri = "group by esp.CodeEsp," . $tri_colone . " order by " . $tri_colone . " desc";
                }
                break;
            case "Variete":
                if ($tri_section == 1) {
                    $tri = "group by var.CodeVar," . $tri_colone . " order by " . $tri_colone . " asc";
                }
                if ($tri_section == 2) {
                    $tri = "group by var.CodeVar," . $tri_colone . " order by " . $tri_colone . " desc";
                }
                break;
            case "Accession":
                if ($tri_section == 1) {
                    $tri = "group by acc.CodeIntro," . $tri_colone . " order by " . $tri_colone . " asc";
                }
                if ($tri_section == 2) {
                    $tri = "group by acc.CodeIntro," . $tri_colone . " order by " . $tri_colone . " desc";
                }
                break;
            case "Emplacement":
                if ($tri_colone == 'NomIntro' || $tri_colone == 'CodeIntro' || $tri_colone == 'CodeVar' || $tri_colone == 'NumCloneCTPS' || $tri_colone == 'CodeIntroPartenaire') {
                    if ($tri_section == 1) {
                        $tri = "group by emp.CodeEmplacem,i." . $tri_colone . " order by i." . $tri_colone . " asc";
                    }
                    if ($tri_section == 2) {
                        $tri = "group by emp.CodeEmplacem,i." . $tri_colone . " order by i." . $tri_colone . " desc";
                    }
                } else if ($tri_colone == 'AnneePlantation') {
                    if ($tri_section == 1) {
                        $tri = "group by emp.CodeEmplacem,e." . $tri_colone . " order by e." . $tri_colone . " asc";
                    }
                    if ($tri_section == 2) {
                        $tri = "group by emp.CodeEmplacem,e." . $tri_colone . " order by e." . $tri_colone . " desc";
                    }
                } else {
                    if ($tri_section == 1) {
                        $tri = "group by emp.CodeEmplacem,t." . $tri_colone . " order by t." . $tri_colone . " asc";
                    }
                    if ($tri_section == 2) {
                        $tri = "group by emp.CodeEmplacem,t." . $tri_colone . " order by t." . $tri_colone . " desc";
                    }
                }
                break;
            case "Sanitaire":
                if ($tri_section == 1) {
                    $tri = "group by san.IdTest," . $tri_colone . " order by " . $tri_colone . " asc";
                }
                if ($tri_section == 2) {
                    $tri = "group by san.IdTest," . $tri_colone . " order by " . $tri_colone . " desc";
                }
                break;
            case "Morphologique":
                if ($tri_colone == 'LibelleCritereFRA' || $tri_colone == 'LibelleCritereENG' || $tri_colone == 'CaractereOIV') {
                    if ($tri_section == 1) {
                        $tri = "group by c.CaractereOIV,c." . $tri_colone . " order by c." . $tri_colone . " asc";
                    }
                    if ($tri_section == 2) {
                        $tri = "group by c.CaractereOIV,c." . $tri_colone . " order by c." . $tri_colone . " desc";
                    }
                } else {
                    if ($tri_section == 1) {
                        $tri = "group by c.CaractereOIV,d." . $tri_colone . " order by d." . $tri_colone . " asc";
                    }
                    if ($tri_section == 2) {
                        $tri = "group by c.CaractereOIV,d." . $tri_colone . " order by d." . $tri_colone . " desc";
                    }
                }
                break;
            case "Aptitude":
                if ($tri_section == 1) {
                    $tri = "group by apt.CodeAptitude," . $tri_colone . " order by " . $tri_colone . " asc";
                }
                if ($tri_section == 2) {
                    $tri = "group by apt.CodeAptitude," . $tri_colone . " order by " . $tri_colone . " desc";
                }
                break;
            case "Bibliographie":
                if ($tri_colone == 'Title' || $tri_colone == 'Author' || $tri_colone == 'Year') {
                    if ($tri_section == 1) {
                        $tri = "group by bib.CodeCit,d." . $tri_colone . " order by d." . $tri_colone . " asc";
                    }
                    if ($tri_section == 2) {
                        $tri = "group by bib.CodeCit,d." . $tri_colone . " order by d." . $tri_colone . " desc";
                    }
                } else {
                    if ($tri_section == 1) {
                        $tri = "group by bib.CodeCit,bib." . $tri_colone . " order by bib." . $tri_colone . " asc";
                    }
                    if ($tri_section == 2) {
                        $tri = "group by bib.CodeCit,bib." . $tri_colone . " order by bib." . $tri_colone . " desc";
                    }
                }
                break;
            case "Phototheque":
                $tri = " group by pho.CodePhoto";
                break;
            case "Documentation":
                if ($tri_section == 1) {
                    $tri = "group by  doc.CodeDocPdf," . $tri_colone . " order by " . $tri_colone . " asc";
                }
                if ($tri_section == 2) {
                    $tri = "group by doc.CodeDocPdf," . $tri_colone . " order by " . $tri_colone . " desc";
                }
                break;
            case "Partenaire":
                if ($tri_section == 1) {
                    $tri = "group by par.CodePartenaire," . $tri_colone . " order by " . $tri_colone . " asc";
                }
                if ($tri_section == 2) {
                    $tri = "group by par.CodePartenaire," . $tri_colone . " order by " . $tri_colone . " desc";
                }
                break;
            case "Genetique":
                if ($tri_section == 1) {
                    $tri = "group by gen.IdAnalyse," . $tri_colone . " order by " . $tri_colone . " asc";
                }
                if ($tri_section == 2) {
                    $tri = "group by gen.IdAnalyse," . $tri_colone . " order by " . $tri_colone . " desc";
                }
                break;
        }
        return $tri;
    }

    public function limit($curpage, $pagesize) {
        $startPage = ($curpage - 1) * $pagesize;
        return $limit = " limit " . $startPage . "," . $pagesize;
    }

    public function espece_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from `NV-ESPECES` where CodeEsp='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $ESP = new Espece($dico['CodeEsp'], $dico['Espece'], $dico['Botaniste'], $dico['Genre'], $dico['CompoGenet'], $dico['SousGenre'], $dico['Validite'], $dico['Tronc'], $dico['RemarqueEsp']);
            $content_espece = supprNull($ESP->getListeEspece());
        }
        return $content_espece;
    }

    public function variete_selection($code, $langue) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from `NV-VARIETES` where CodeVar='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $VAR = new Variete($dico['CodeVar'], $dico['NomVar'], $dico['SynoMajeur'], $dico['NumVarOnivins'], $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['UniteVar'], $DAO->type($dico['CodeType'], $langue), $DAO->espece($dico['CodeEsp']), $DAO->couleurPel($dico['CouleurPel'], $langue), $DAO->couleurPulp($dico['CouleurPulp'], $langue), $DAO->saveur($dico['Saveur'], $langue), $DAO->pepins($dico['Pepins'], $langue), $dico['Obtenteur'], $DAO->utilite($dico['Utilite'], $langue), $dico['CodeEsp'], $DAO->sexe($dico['Sexe'], $langue), $DAO->paysorigine($dico['PaysOrigine'], $langue), $DAO->regionorigine($dico['RegionOrigine'], $langue), $DAO->departorigine($dico['DepartOrigine'], $langue), $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['NumVarOnivins'], $dico['InscriptionEurope'], $dico['Obtenteur'], $dico['MereReelle'], $dico['AnneeObtention'], $dico['CodeVarMereReelle'], $dico['MereObt'], $dico['PereReel'], $dico['CodeCroisementINRA'], $dico['CodeVarPereReel'], $dico['PereObt'], $dico['RemarqueParenteReelle'], $DAO->departorigine($dico['DepartOrigine'], $langue), $dico['RemarquesVar']);
            $content_variete = supprNull($VAR->getSelectionVariete());
        }
        return $content_variete;
    }

    public function accession_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from `NV-INTRODUCTIONS` where CodeIntro='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $DateEntre = $dico['JourMAJ'] . "/" . $dico['MoisMAJ'] . "/" . $dico['AnneeMAJ'];
            $langue = $_SESSION['language_Vigne'];
            $ACC = new Accession($dico['CodeIntro'], $dico['NomIntro'], $DAO->nomVar($dico['CodeVar']), $DAO->Partenaire($dico['CodePartenaire']), $DAO->paysorigine($dico['PaysProvenance'], $langue), $dico['CommuneProvenance'], $dico['AnneeEntree'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $DAO->statut($dico['Statut'], $langue), $DateEntre, $dico['Collecteur'], $dico['AdresProvenance'], $dico['SiteProvenance'], $dico['CodePartenaire'], $dico['UniteIntro'], $dico['AnneeAgrement'], $dico['Collecteur'], $dico['TypeCollecteur'], $dico['ContinentProvenance'], $dico['CommuneProvenance'], $dico['CodPostProvenance'], $dico['SiteProvenance'], $dico['AdresProvenance'], $dico['ProprietProvenance'], $dico['ParcelleProvenance'], $dico['TypeParcelleProvenance'], $dico['RangProvenance'], $dico['SoucheProvenance'], $dico['SoucheTheoriqueProvenance'], $DAO->paysorigine($dico['PaysProvenance'], $langue), $DAO->regionorigine($dico['RegionProvenance'], $langue), $DAO->departorigine($dico['DepartProvenance'], $langue), $dico['evdb_15-LATITUDE'], $dico['evdb_16-LONGITUDE'], $dico['evdb_17-ELEVATION'], $dico['JourEntree'], $dico['MoisEntree'], $dico['AnneeEntree'], $dico['CodeIntroProvenance'], $dico['CodeEntree'], $dico['ReIntroduit'], $dico['IssuTraitement'], $dico['CloneTraite'], $dico['RemarquesProvenance'], $dico['CollecteurAnt'], $dico['TypeCollecteurAnt'], $dico['ContinentProvAnt'], $dico['CommuneProvAnt'], $dico['CodPostProvAnt'], $dico['SiteProvAnt'], $dico['AdresProvAnt'], $dico['ProprietProvAnt'], $dico['ParcelleProvAnt'], $dico['TypeParcelleProvAnt'], $dico['RangProvAnt'], $dico['SoucheProvAnt'], $dico['SoucheTheoriqueProvAnt'], $DAO->paysorigine($dico['PaysProvAnt'], $langue), $DAO->regionorigine($dico['RegionProvAnt'], $langue), $DAO->departorigine($dico['DepartProvAnt'], $langue), $dico['CodeIntroProvenanceAnt'], $dico['evdb_ID_VITIS'], $dico['evdb_F-ConfirmAmpelo'], $dico['evdb_G-ConfirmSSR'], $dico['evdb_I-BiblioVolume'], $dico['evdb_L-ConfirmOther'], $dico['evdb_I-BiblioVolume'], $dico['evdb_K-BiblioPage'], $dico['evdb_M-RemarkAccessionName'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $dico['NumTempCTPS'], $dico['DelegONIVINS'], $DAO->statut($dico['Statut'], $langue), $dico['DepartAgrementClone'], $dico['AnneeAgrement'], $dico['SiteAgrementClone'], $dico['AnneeNonCertifiable'], $dico['LieuDepotMatInitial'], $dico['SurfMulti'], $dico['NomPartenaire'], $dico['NomPartenaire2'], $dico['Famille'], $dico['Agrement'], $dico['NumCloneCTPS'], $dico['SiregalPresenceEnColl'], $dico['MTAactif'], $dico['RemarquesIntro']);
            $content_accession = supprNull($ACC->getSelectionAccession());
        }
        return $content_accession;
    }

    public function emplacement_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "SELECT *
                FROM `NV-EMPLACEMENTS` e
                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                INNER JOIN `Sites` s on s.CodeSite=t.CodeSite
                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                INNER JOIN `NV-VARIETES` v on v.CodeVar=i.CodeVar
                WHERE e.CodeEmplacem='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $EM = new Emplacement($dico['CodeEmplacem'], $dico['CodeSite'], $dico['Parcelle'], $dico['Rang'], $dico['PremiereSouche'], $dico['DerniereSouche'], $dico['NomIntro'], $dico['CodeIntro'], $dico['nomVar'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $dico['NumCloneCTPS-PG'], $dico['AnneePlantation'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomSite'], $dico['Zone'], $dico['SousPartie'], $dico['NbreEtatNormal'], $dico['NbreEtatMoyen'], $dico['NbreEtatMoyFaible'], $dico['NbreEtatFaible'], $dico['NbreEtatTresFaible'], $dico['NbreEtatMort'], $dico['TypeSouche'], $dico['AnneeElimination'], $dico['CategMateriel'], $dico['Greffe'], $dico['PorteGreffe']);
            $Em_Content = supprNull($EM->getListeEmplaclemnt());
        }
        return $Em_Content;
    }

    public function sanitaire_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from `Tests_sanitaires` s
                LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire   
                where s.IdTest='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $langue = $_SESSION['language_Vigne'];
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            if ($langue == 'FR') {
                $dico = mysql_fetch_assoc($resultat);
                $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $dico['ResultatTest'], $dico['CategorieTest'], $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $dico['NomFranComplet'], $dico['IdTest'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomFranComplet'], $dico['CodeEmplacem'], $dico['NomPartenaire'], $dico['CodePartenaire']);
                $San_Content = supprNull($SAN->getListeSanitaire());
                $San_Content['CodeVar'] = $dico['CodeVar'];
                $San_Content['NomVar'] = $DAO->nomVar($San_Content['CodeVar']);
            } else {
                $dico = mysql_fetch_assoc($resultat);
                $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $dico['ResultatTest_en'], $dico['CategMateriel_en'], $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $dico['JY_NomEngComplet'], $dico['IdTest'], $dico['NomIntro'], $dico['CodeIntro'], $dico['JY_NomEngComplet'], $dico['CodeEmplacem'], $dico['NomPartenaire'], $dico['CodePartenaire']);
                $San_Content = supprNull($SAN->getListeSanitaire());
                $San_Content['CodeVar'] = $dico['CodeVar'];
                $San_Content['NomVar'] = $DAO->nomVar($San_Content['CodeVar']);
            }
        }
        return $San_Content;
    }

    public function morphologique_selection($code) {
        $DAO = new BibliothequeDAO();
        $langue = $_SESSION['language_Vigne'];
        $sql = "SELECT *
                      FROM `Ampelographie` a 
                      LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                      LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                      LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                      LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                      LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                      LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                      LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                      LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur 
                      WHERE CodeAmpelo='" . $code . "' AND a.CaractereOIV IS NOT NULL ";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('Error system')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('Error system')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            if ($langue == "FR") {
                $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripFRA'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $dico['NodeVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['LibelleDescripFRA'], $dico['CodeOIV'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodePersonne'], $dico['NomPartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
            } else { // Anglais/EN
                $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripENG'], $dico['LibelleCritereENG'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $dico['NodeVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['LibelleDescripENG'], $dico['CodeOIV'], $dico['LibelleCritereENG'], $dico['CaractereOIV'], $dico['CodePersonne'], $dico['NomPartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
            }
            $content = supprNull($MOR->getSelectionMorphologique());
        }
        return $content;
    }

    public function aptitude_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from `Aptitudes` where CodeAptitude='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $date = $dico['JourExpe'] . '/' . $dico['MoisExpe'] . '/' . $dico['AnneeExpe'];
            $APT = new Aptitude($dico['CodeAptitude'], $dico['CodeVar'], $DAO->nomCaract($dico['CodeCaract']), $dico['ValeurCaractNum'], $DAO->uniteCarct($dico['CodeCaract']), $dico['Ponderation'], $date, $dico['CodeSite'], $dico['CodePartenaire'], $dico['CodeAptitude'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $DAO->nomCaract($dico['CodeCaract']), $dico['ValeurCaractNum'], $DAO->uniteCarct($dico['CodeCaract']), $dico['Ponderation'], $dico['CodePersonneExpe'], $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
            $content = supprNull($APT->getSelectionAptitude());
        }
        return $content;
    }

    public function genetique_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "SELECT *
                FROM `BM-donnees_resume` g
                LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                WHERE g.IdAnalyse='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $genetique_class = new Genetique($dico['IdAnalyse'], $dico['Marqueur'], $dico['ValeurCodee1'], $dico['ValeurCodee2'], $dico['CodePartenaire'], $dico['DatePCR'], $dico['NomVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['EmplacemRecolte'], $dico['SouchePrelev'], $dico['DateRecolte'], $dico['IdProtocoleRecolte'], $dico['TypeOrgane'], $dico['IdStockADN'], $dico['IdProtocolePCR'], $dico['DatePCR'], $dico['DateRun'], $dico['CodePartenaire']);
            $content_genetique = $genetique_class->getSelectionGenetique();
        }
        return $content_genetique;
    }

    public function documentation_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from Documents_pdf_JY where CodeDocPdf='" . $code . "' ";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $DOC = new Doc($dico['CodeDocPdf'], $dico['Titre'], $dico['Auteurs'], $dico['Editeur'], $dico['Date'], $dico['Langue'], $dico['NbPages'], $dico['CodeRangement'], $dico['Volume'], $dico['Pages'], $dico['TypeDoc'], $dico['FichierDocPdf'], $dico['CodeVar'], $DAO->nomVar($dico['CodeVar']), $dico['CodeIntro'], $DAO->nomAcc($dico['CodeIntro']));
            $DOC_Content = supprNull($DOC->getSelectionDoc());
        }
        return $DOC_Content;
    }

    public function bibliographie_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeCit='" . $code . "' and c.CodeDoc=d.CodeDoc";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $BI = new Bibliograhpie($dico['CodeCit'], $dico['CodeVar'], $dico['Title'], $dico['Author'], $dico['Year'], $dico['PagesCitation'], $dico['VolumeCitation'], $DAO->nomAcc($dico['CodeIntro']), $DAO->nomVar($dico['CodeVar']), $dico['CodeIntro'], $dico['TypeDoc'], $dico['Edition'], $dico['Publisher'], $dico['PlacePublished'], $dico['ISBN'], $dico['Language'], $dico['NumberOfVolumes'], $dico['PagesDoc'], $dico['CallNumber'], $dico['AuteurCitation'], $dico['NomVigneCite']);
            $BI_Content = supprNull($BI->getSelectionBibliographie());
        }
        return $BI_Content;
    }

    public function partenaire_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from `Partenaires` where CodePartenaire='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $PAR = new Partenaire($dico['CodePartenaire'], $dico['NomPartenaire'], $dico['SiglePartenaire'], $dico['SectionRegionaleENTAV'], $dico['RegionPartenaire'], $dico['DepartPartenaire'], $dico['ResponsablesPartenaire'], $dico['TelephonePartenaire'], $dico['Email'], $dico['AdressePartenaire'], $dico['CodPostPartenaire'], $dico['CommunePartenaire']);
            $PAR_Content = supprNull($PAR->getListePartenaire());
        }
        return $PAR_Content;
    }

    public function lien_selection($code) {
        $DAO = new BibliothequeDAO();
        $sql = "select * from `Liens_web_JY` where CodeLienWeb='" . $code . "'";
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            deconnexion_bbd();
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) > 0) {
            $dico = mysql_fetch_assoc($resultat);
            $LIEN = new Lien($dico['CodeLienWeb'], $dico['Titre'], $dico['NomSite'], $dico['NomSite'], $dico['URL'], $dico['CodeVar'], $dico['CodeIntro']);
            $LIEN_Content = supprNull($LIEN->getSelectionLien());
            $LIEN_Content['NomVar'] = $DAO->nomVar($dico['CodeVar']);
            $LIEN_Content['NomAcc'] = $DAO->nomAcc($dico['CodeIntro']);
        }
        return $LIEN_Content;
    }

    public function utilite($a, $langue) {
        $sql = "SELECT * FROM ListeDeroulante_utilite WHERE Utilite ='" . $a . "'";
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            echo "<script>alert('erreur de base de donnes')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $utilite = "";
        }
        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                if ($langue == "FR") {
                    $utilite = $dico['Utilite_Texte'];
                }
                if ($langue == "EN") {
                    $utilite = $dico['Utilite_texte_anglais'];
                }
            }
        }
        return $utilite;
    }

    public function exportpdf($code, $langue, $section) {// Permet d'exporter les données en PDF
        $DAO = new BibliothequeDAO();
        if ($section == "variete") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `NV-VARIETES` where CodeVar='" . $code . "'";
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    $VAR = new Variete($dico['CodeVar'], $dico['NomVar'], $dico['SynoMajeur'], $dico['NumVarOnivins'], $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['UniteVar'], $DAO->type($dico['CodeType'], $langue), $DAO->espece($dico['CodeEsp']), $DAO->couleurPel($dico['CouleurPel'], $langue), $DAO->couleurPulp($dico['CouleurPulp'], $langue), $DAO->saveur($dico['Saveur'], $langue), $DAO->pepins($dico['Pepins'], $langue), $dico['Obtenteur'], $DAO->utilite($dico['Utilite'], $langue), $dico['CodeEsp'], $DAO->sexe($dico['Sexe'], $langue), $DAO->paysorigine($dico['PaysOrigine'], $langue), $DAO->regionorigine($dico['RegionOrigine'], $langue), $DAO->departorigine($dico['DepartOrigine'], $langue), $dico['InscriptionFrance'], $dico['AnneeInscriptionFrance'], $dico['NumVarOnivins'], $dico['InscriptionEurope'], $dico['Obtenteur'], $dico['MereReelle'], $dico['AnneeObtention'], $dico['CodeVarMereReelle'], $dico['MereObt'], $dico['PereReel'], $dico['CodeCroisementINRA'], $dico['CodeVarPereReel'], $dico['PereObt'], $dico['RemarqueParenteReelle'], $DAO->sampstat($dico['evdb_20-SAMPSTAT'], $langue), $dico['RemarquesVar']);
                    $detail = $VAR->getFichePDFVariete();
                    $detail = supprNull($detail);
                }
                deconnexion_bbd();
            }
            $res = $detail;
            return $res;
        } else if ($section == "accession") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `NV-INTRODUCTIONS` where CodeIntro='" . $code . "'";
            $resultat_accession = mysql_query($sql) or die(mysql_error());
            if (!$resultat_accession) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_accession) == 0) {
                deconnexion_bbd();
                exit;
            }
            if (mysql_num_rows($resultat_accession) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_accession)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat_accession);
                    $ACC = new Accession($dico['CodeIntro'], $dico['NomIntro'], $DAO->nomVar($dico['CodeVar']), $DAO->Partenaire($dico['CodePartenaire']), $DAO->paysorigine($dico['PaysProvenance'], $langue), $dico['CommuneProvenance'], $dico['AnneeEntree'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $DAO->statut($dico['Statut'], $langue), $DateEntre, $dico['Collecteur'], $dico['AdresProvenance'], $dico['SiteProvenance'], $dico['CodePartenaire'], $dico['UniteIntro'], $dico['AnneeAgrement'], $dico['Collecteur'], $dico['TypeCollecteur'], $dico['ContinentProvenance'], $dico['CommuneProvenance'], $dico['CodPostProvenance'], $dico['SiteProvenance'], $dico['AdresProvenance'], $dico['ProprietProvenance'], $dico['ParcelleProvenance'], $dico['TypeParcelleProvenance'], $dico['RangProvenance'], $dico['SoucheProvenance'], $dico['SoucheTheoriqueProvenance'], $DAO->paysorigine($dico['PaysProvenance'], $langue), $DAO->regionorigine($dico['RegionProvenance'], $langue), $DAO->departorigine($dico['DepartProvenance'], $langue), $dico['evdb_15-LATITUDE'], $dico['evdb_16-LONGITUDE'], $dico['evdb_17-ELEVATION'], $dico['JourEntree'], $dico['MoisEntree'], $dico['AnneeEntree'], $dico['CodeIntroProvenance'], $dico['CodeEntree'], $dico['ReIntroduit'], $dico['IssuTraitement'], $dico['CloneTraite'], $dico['RemarquesProvenance'], $dico['CollecteurAnt'], $dico['TypeCollecteurAnt'], $dico['ContinentProvAnt'], $dico['CommuneProvAnt'], $dico['CodPostProvAnt'], $dico['SiteProvAnt'], $dico['AdresProvAnt'], $dico['ProprietProvAnt'], $dico['ParcelleProvAnt'], $dico['TypeParcelleProvAnt'], $dico['RangProvAnt'], $dico['SoucheProvAnt'], $dico['SoucheTheoriqueProvAnt'], $DAO->paysorigine($dico['PaysProvAnt'], $langue), $DAO->regionorigine($dico['RegionProvAnt'], $langue), $DAO->departorigine($dico['DepartProvAnt'], $langue), $dico['CodeIntroProvenanceAnt'], $dico['evdb_ID_VITIS'], $dico['evdb_F-ConfirmAmpelo'], $dico['evdb_G-ConfirmSSR'], $dico['evdb_I-BiblioVolume'], $dico['evdb_L-ConfirmOther'], $dico['evdb_I-BiblioVolume'], $dico['evdb_K-BiblioPage'], $dico['evdb_M-RemarkAccessionName'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $dico['NumTempCTPS'], $dico['DelegONIVINS'], $DAO->statut($dico['Statut'], $langue), $dico['DepartAgrementClone'], $dico['AnneeAgrement'], $dico['SiteAgrementClone'], $dico['AnneeNonCertifiable'], $dico['LieuDepotMatInitial'], $dico['SurfMulti'], $dico['NomPartenaire'], $dico['NomPartenaire2'], $dico['Famille'], $dico['Agrement'], $dico['NumCloneCTPS'], $dico['SiregalPresenceEnColl'], $dico['MTAactif'], $dico['RemarquesIntro']);
                    $detail = $ACC->getFichePDFAccession();
                    $detail = supprNull($detail);
                }
                deconnexion_bbd();
            }
            $res = $detail;
            return $res;
        } else if ($section == "espece") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql_espece = "select * from `NV-ESPECES` where CodeEsp='" . $code . "'";
            $resultat_espece = mysql_query($sql_espece) or die(mysql_error());
            if (!$resultat_espece) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_espece) == 0) {
                $contents = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_espece) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_espece)); $i = $i + 1) {
                    $dico_espece = mysql_fetch_assoc($resultat_espece);
                    $ESP = new Espece($dico_espece['CodeEsp'], $dico_espece['Espece'], $dico_espece['Botaniste'], $dico_espece['Genre'], $dico_espece['CompoGenet'], $dico_espece['SousGenre'], $dico_espece['Validite'], $dico_espece['Tronc'], $dico_espece['RemarqueEsp']);
                    $detail = $ESP->getFicherEspece();
                    $detail = supprNull($detail);
                }
                deconnexion_bbd();
            }
            $res = $detail;
            return $res;
        } else if ($section == "partenaire") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Partenaires` where CodePartenaire='" . $code . "'";
            $resultat_par = mysql_query($sql) or die(mysql_error());
            if (!$resultat_par) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_par) == 0) {
                $contents = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_par) > 0) {
                for ($j = 0; $j < (mysql_num_rows($resultat_par)); $j = $j + 1) {
                    $dico = mysql_fetch_assoc($resultat_par);
                    $PAR = new Partenaire($dico['CodePartenaire'], $dico['NomPartenaire'], $dico['SiglePartenaire'], $dico['SectionRegionaleENTAV'], $dico['RegionPartenaire'], $dico['DepartPartenaire'], $dico['ResponsablesPartenaire'], $dico['TelephonePartenaire'], $dico['Email'], $dico['AdressePartenaire'], $dico['CodPostPartenaire'], $dico['CommunePartenaire']);
                    $detail = $PAR->getFicherPartenaire();
                    $detail = supprNull($detail);
                }
                deconnexion_bbd();
            }
            $res = $detail;
            return $res;
        } else if ($section == "aptitude") {
            $DAO = new BibliothequeDAO();
            $sql = "select * from `Aptitudes` where CodeAptitude='" . $code . "'";
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) > 0) {
                $dico = mysql_fetch_assoc($resultat);
                $date = $dico['JourExpe'] . '/' . $dico['MoisExpe'] . '/' . $dico['AnneeExpe'];
                $APT = new Aptitude($dico['CodeAptitude'], $dico['CodeVar'], $DAO->nomCaract($dico['CodeCaract']), $dico['ValeurCaractNum'], $DAO->uniteCarct($dico['CodeCaract']), $dico['Ponderation'], $date, $dico['CodeSite'], $dico['CodePartenaire'], $dico['CodeAptitude'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $DAO->nomCaract($dico['CodeCaract']), $dico['ValeurCaractNum'], $DAO->uniteCarct($dico['CodeCaract']), $dico['Ponderation'], $dico['CodePersonneExpe'], $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                $detail = $APT->getFicherAptitude();
                $detail = supprNull($detail);
                deconnexion_bbd();
            }
            return $detail;
        } else if ($section == "morphologique") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Descripteurs_ampelographiques` d,  `Ampelographie` a,  `Caracteres_ampelographiques` c WHERE a.CodeAmpelo='" . $code . "' and a.CaractereOIV = c.CaractereOIV AND d.CodeOIV = c.CodeOIV group by c.CodeOIV";
            $resultat_mor = mysql_query($sql) or die(mysql_error());
            if (!$resultat_mor) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_mor) == 0) {
                $detail = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_mor) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_mor)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat_mor);
                    if ($langue == "FR") {
                        $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripFRA'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $dico['LibelleDescripFRA'], $dico['CodeOIV'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $DAO->Personne($dico['CodePersonne']), $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                    }
                    if ($langue == "EN") {
                        $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripENG'], $dico['LibelleCritereENG'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $dico['LibelleDescripENG'], $dico['CodeOIV'], $dico['LibelleCritereENG'], $dico['CaractereOIV'], $DAO->Personne($dico['CodePersonne']), $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                    }
                }
                $detail = $MOR->getFicherMorphologique();
                $detail = supprNull($detail);
                deconnexion_bbd();
            }
            return $detail;
        } else if ($section == "site") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Sites` where CodeSite='" . $code . "'";
            $resultat_site = mysql_query($sql) or die(mysql_error());
            if (!$resultat_site) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_site) == 0) {
                $contents = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_site) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_site)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat_site);
                    $SITE = new Site($dico['CodeSite'], $dico['NomSite'], $dico['RegionSite'], $dico['DepartSite'], $dico['CommuneSite'], $dico['CodPostSite'], $dico['AdresseSite'], $dico['LatSite'], $dico['LongSite'], $dico['AltSite'], $dico['SecRegENTAV'], $dico['ProprietaireSite'], $dico['ExploitSite'], $dico['ResponsSite'], $dico['TelSite'], $dico['FaxSite'], $dico['MailSite'], $dico['AnneeCreationSite'], $dico['VarMajoritairesSite'], $dico['PresentationSite']);
                }
                $detail = $SITE->getFicherSite();
                $detail = supprNull($detail);
                deconnexion_bbd();
            }
            return $detail;
        } else if ($section == "sanitaire") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Tests_sanitaires` WHERE IdTest =  '" . $code . "'";
            $resultat_san = mysql_query($sql) or die(mysql_error());
            if (!$resultat_san) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_san) == 0) {
                $detail = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_san) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_san)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat_san);
                    if ($dico['JourTest'] == "") {
                        $jour = '00';
                    } else {
                        $jour = $dico['JourTest'];
                    }
                    if ($dico['MoisTest'] == "") {
                        $mois = '00';
                    } else {
                        $mois = $dico['MoisTest'];
                    }
                    if ($dico['AnneeTest'] == "") {
                        $annee = '0000';
                    } else {
                        $annee = $dico['AnneeTest'];
                    }
                    $dateTest = $jour . '-' . $mois . '-' . $annee;
                    $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $DAO->ResultatTest($dico['ResultatTest'], $langue), $DAO->CategorieTest($dico['CategorieTest'], $langue), $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $DAO->nomTest($dico['NomTest'], $langue), $dico['IdTest'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $DAO->PathogeneTeste($dico['NomTest']), $dico['CodeEmplacem'], $DAO->Partenaire($dico['CodePartenaire']), $dico['CodePartenaire']);
                }
                $detail = $SAN->getFicherSanitaire();
                $detail = supprNull($detail);
                deconnexion_bbd();
            }

            return $detail;
        } else if ($section == "emplacement") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "SELECT *
                FROM `NV-EMPLACEMENTS` e
                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                INNER JOIN `Sites` s on s.CodeSite=t.CodeSite
                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                INNER JOIN `NV-VARIETES` v on v.CodeVar=i.CodeVar
                WHERE e.CodeEmplacem='" . $code . "'";
            $resultat_emp = mysql_query($sql) or die(mysql_error());
            if (!$resultat_emp) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_emp) == 0) {
                $detail = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_emp) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_emp)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat_emp);
                    $EM = new Emplacement($dico['CodeEmplacem'], $dico['CodeSite'], $dico['Parcelle'], $dico['Rang'], $dico['PremiereSouche'], $dico['DerniereSouche'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomVar'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $dico['NumCloneCTPS-PG'], $dico['AnneePlantation'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomSite'], $dico['Zone'], $dico['SousPartie'], $dico['NbreEtatNormal'], $dico['NbreEtatMoyen'], $dico['NbreEtatMoyFaible'], $dico['NbreEtatFaible'], $dico['NbreEtatTresFaible'], $dico['NbreEtatMort'], $dico['TypeSouche'], $dico['AnneeElimination'], $dico['CategMateriel'], $dico['Greffe'], $dico['PorteGreffe']);
                }
                $detail = $EM->getFicherEmplacement();
                $detail = supprNull($detail);
                deconnexion_bbd();
            }
            return $detail;
        } else if ($section == "genetique") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `BM-donnees_resume` WHERE IdAnalyse =  '" . $code . "'";
            $resultat_gen = mysql_query($sql) or die(mysql_error());
            if (!$resultat_gen) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_gen) == 0) {
                $contents_genetique = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_gen) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_gen)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat_gen);
                    $genetique_class = new Genetique($dico['IdAnalyse'], $dico['Marqueur'], $dico['ValeurCodee1'], $dico['ValeurCodee2'], $dico['CodePartenaire'], $dico['DatePCR'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $dico['EmplacemRecolte'], $dico['SouchePrelev'], $dico['DateRecolte'], $dico['IdProtocoleRecolte'], $dico['TypeOrgane'], $dico['IdStockADN'], $dico['IdProtocolePCR'], $dico['DatePCR'], $dico['DateRun'], $dico['CodePartenaire']);
                }
                $detail = $genetique_class->getFicherGenetique();
                $detail = supprNull($detail);
                deconnexion_bbd();
            }
            return $detail;
        } else if ($section == "bibliographie") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            $sql = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeCit='" . $code . "' and c.CodeDoc=d.CodeDoc";
            $resultat_bib = mysql_query($sql) or die(mysql_error());
            if (!$resultat_bib) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_bib) == 0) {
                $detail = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_bib) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_bib)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat_bib);
                    $BI = new Bibliograhpie($dico['CodeCit'], $dico['CodeVar'], $dico['Title'], $dico['Author'], $dico['Year'], $dico['PagesCitation'], $dico['VolumeCitation'], $DAO->nomAcc($dico['CodeIntro']), $DAO->nomVar($dico['CodeVar']), $dico['CodeIntro'], $dico['TypeDoc'], $dico['Edition'], $dico['Publisher'], $dico['PlacePublished'], $dico['ISBN'], $dico['Language'], $dico['NumberOfVolumes'], $dico['PagesDoc'], $dico['CallNumber'], $dico['AuteurCitation'], $dico['NomVigneCite']);
                }
                $detail = $BI->getFicherBibliographie();
                $detail = supprNull($detail);
                deconnexion_bbd();
            }
            return $detail;
        }
    }

    public function exportxls_search($langue, $section) {
        if ($section == "variete") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            if ($langue == "FR") {
                switch ($_SESSION['typerecherche']) {
                    case "fuzzy" : // Type de recherche = contient
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                       FROM `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                       WHERE (NomVar REGEXP '" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION["search"] . "')
                                       ORDER BY CodeVar;";
                            } else {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                        FROM `NV-VARIETES`
                                        LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                        LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                        LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                        LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                        LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays 
                                        WHERE (nomVar REGEXP '" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION['search'] . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                        ORDER BY CodeVar;";
                            }
                        } else {
                            $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomVar REGEXP '" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION["search"] . "') AND public!='N'
                                    ORDER BY CodeVar;";
                        }
                        break;
                    case "start" : // Type de recherche = commence par
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                       FROM `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                       WHERE (NomVar REGEXP '^" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '^" . $_SESSION['search'] . "' OR CodeVar REGEXP '^" . $_SESSION["search"] . "')
                                       ORDER BY CodeVar;";
                            } else {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                        FROM `NV-VARIETES`
                                        LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                        LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                        LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                        LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                        LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays 
                                        WHERE (nomVar REGEXP '^" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '^" . $_SESSION['search'] . "' OR CodeVar REGEXP '^" . $_SESSION['search'] . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                        ORDER BY CodeVar;";
                            }
                        } else {
                            $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomVar REGEXP '^" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '^" . $_SESSION['search'] . "' OR CodeVar REGEXP '^" . $_SESSION["search"] . "') AND public!='N'
                                    ORDER BY CodeVar;";
                        }
                        break;
                    case "complet" : // Type de recherche = est
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                       FROM `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                       WHERE (upper(NomVar)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(SynoMajeur)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeVar)=upper('" . $_SESSION["searchcomplet"] . "'))
                                       ORDER BY CodeVar;";
                            } else {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais
                                        FROM `NV-VARIETES`
                                        LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                        LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                        LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                        LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                        LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays 
                                        WHERE (upper(NomVar)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(SynoMajeur)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeVar)=upper('" . $_SESSION['searchcomplet'] . "')) AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                        ORDER BY CodeVar;";
                            }
                        } else {
                            $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (upper(NomVar)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(SynoMajeur)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeVar)=upper('" . $_SESSION["searchcomplet"] . "')) AND public!='N'
                                    ORDER BY CodeVar;";
                        }
                        break;
                    case "end" : // Type de recherche = fini par
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                       FROM `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                       WHERE (NomVar REGEXP '" . $_SESSION['search'] . "$' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION["search"] . "')
                                       ORDER BY CodeVar;";
                            } else {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomVar REGEXP '" . $_SESSION['search'] . "$' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "$' OR CodeVar REGEXP '" . $_SESSION["search"] . "$') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                    ORDER BY CodeVar;";
                            }
                        } else {
                            $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomVar REGEXP '" . $_SESSION['search'] . "$' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION["search"] . "') AND public!='N'
                                    ORDER BY CodeVar;";
                        }
                        break;
                }
            } else if ($langue == "EN") {
                //
                switch ($_SESSION['typerecherche']) {
                    case "fuzzy" : // Type de recherche = contient
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                       FROM `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                       WHERE (NomVar REGEXP '" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION["search"] . "')
                                       ORDER BY CodeVar;";
                            } else {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal 
                                        FROM `NV-VARIETES`
                                        LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                        LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                        LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                        LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                        LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays 
                                        WHERE (nomVar REGEXP '" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION['search'] . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                        ORDER BY CodeVar;";
                            }
                        } else {
                            $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomVar REGEXP '" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION["search"] . "') AND public!='N'
                                    ORDER BY CodeVar;";
                        }
                        break;
                    case "start" : // Type de recherche = commence par
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal 
                                       FROM `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                       WHERE (NomVar REGEXP '^" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '^" . $_SESSION['search'] . "' OR CodeVar REGEXP '^" . $_SESSION["search"] . "')
                                       ORDER BY CodeVar;";
                            } else {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                        FROM `NV-VARIETES`
                                        LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                        LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                        LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                        LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                        LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays 
                                        WHERE (nomVar REGEXP '^" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '^" . $_SESSION['search'] . "' OR CodeVar REGEXP '^" . $_SESSION['search'] . "') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                        ORDER BY CodeVar;";
                            }
                        } else {
                            $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomVar REGEXP '^" . $_SESSION['search'] . "' OR SynoMajeur REGEXP '^" . $_SESSION['search'] . "' OR CodeVar REGEXP '^" . $_SESSION["search"] . "') AND public!='N'
                                    ORDER BY CodeVar;";
                        }
                        break;
                    case "complet" : // Type de recherche = est
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                       FROM `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                       WHERE (upper(NomVar)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(SynoMajeur)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeVar)=upper('" . $_SESSION["searchcomplet"] . "'))
                                       ORDER BY CodeVar;";
                            } else {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                        FROM `NV-VARIETES`
                                        LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                        LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                        LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                        LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                        LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays 
                                        WHERE (upper(NomVar)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(SynoMajeur)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeVar)=upper('" . $_SESSION['searchcomplet'] . "')) AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                        ORDER BY CodeVar;";
                            }
                        } else {
                            $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (upper(NomVar)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(SynoMajeur)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeVar)=upper('" . $_SESSION["searchcomplet"] . "')) AND public!='N'
                                    ORDER BY CodeVar;";
                        }
                        break;
                    case "end" : // Type de recherche = fini par
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                       FROM `NV-VARIETES`
                                       LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                       LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                       LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                       LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                       LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                       LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                       WHERE (NomVar REGEXP '" . $_SESSION['search'] . "$' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION["search"] . "')
                                       ORDER BY CodeVar;";
                            } else {
                                $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomVar REGEXP '" . $_SESSION['search'] . "$' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "$' OR CodeVar REGEXP '" . $_SESSION["search"] . "$') AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                    ORDER BY CodeVar;";
                            }
                        } else {
                            $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomVar REGEXP '" . $_SESSION['search'] . "$' OR SynoMajeur REGEXP '" . $_SESSION['search'] . "' OR CodeVar REGEXP '" . $_SESSION["search"] . "') AND public!='N'
                                    ORDER BY CodeVar;";
                        }
                        break;
                }
            }

            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bdd();
                echo "<script>alert('erreur de bdd')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                $result = null;
                deconnexion_bdd();
            }
            $result = array();

            if (mysql_num_rows($resultat) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    $dico = supprNull($dico);
                    array_push($result, $dico);
                }
                deconnexion_bbd();
            }
            $res = $result;
            return $res;
        } else if ($section == "accession") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            if ($langue == "FR") {
                switch ($_SESSION['typerecherche']) {
                    case "fuzzy" : // Type de recherche = contient
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                        WHERE (NomIntro REGEXP '" . $_SESSION['search'] . "' OR CodeIntro REGEXP '" . $_SESSION['search'] . "')
                                        ORDER BY CodeIntro;";
                            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree 
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                            } else { //Utilisateur D
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree 
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                            }
                        } else {
                            $sql = "SELECT *
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomIntro REGEXP '" . $_SESSION['search'] . "' OR CodeIntro REGEXP '" . $_SESSION['search'] . "') AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                        }
                        break;
                    case "start" : // Type de recherche = commence par
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                        WHERE (NomIntro REGEXP '^" . $_SESSION['search'] . "' OR CodeIntro REGEXP '^" . $_SESSION['search'] . "')
                                        ORDER BY CodeIntro;";
                            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                            } else { // utilisateur D 
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                            }
                        } else {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomIntro REGEXP '^" . $_SESSION['search'] . "' OR CodeIntro REGEXP '^" . $_SESSION['search'] . "') AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                        }
                        break;
                    case "complet" : // Type de recherche = est
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                        WHERE (upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeIntro)=upper('" . $_SESSION['searchcomplet'] . "'))
                                        ORDER BY CodeIntro;";
                            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree 
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                            } else {//Utilisateur D 
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree 
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                            }
                        } else {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE (upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeIntro)=upper('" . $_SESSION['searchcomplet'] . "')) AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                        }
                        break;
                    case "end" : // Type de recherche = fini par
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                        WHERE (NomIntro REGEXP '" . $_SESSION['search'] . "$' OR CodeIntro REGEXP '" . $_SESSION['search'] . "$')
                                        ORDER BY CodeIntro;";
                            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                            } else { // Utilitsateur D SiregalPresenceEnColl = 'oui' AND(
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
                                        SiregalPresenceEnColl = 'oui' AND(
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                            }
                        } else {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomIntro REGEXP '" . $_SESSION['search'] . "$' OR CodeIntro REGEXP '" . $_SESSION['search'] . "$') AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                        }
                        break;
                }
            } else if ($langue = "EN") {
                switch ($_SESSION['typerecherche']) {
                    case "fuzzy" : // Type de recherche = contient 
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                        WHERE (NomIntro REGEXP '" . $_SESSION['search'] . "' OR CodeIntro REGEXP '" . $_SESSION['search'] . "')
                                        ORDER BY CodeIntro;";
                            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                            } else { //Utilisateur D
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "' or CodeIntro REGEXP '" . $_SESSION['search'] . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                            }
                        } else {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomIntro REGEXP '" . $_SESSION['search'] . "' OR CodeIntro REGEXP '" . $_SESSION['search'] . "') AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                        }
                        break;
                    case "start" : // Type de recherche = commence par
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                        WHERE (NomIntro REGEXP '^" . $_SESSION['search'] . "' OR CodeIntro REGEXP '^" . $_SESSION['search'] . "')
                                        ORDER BY CodeIntro;";
                            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                            } else { // utilisateur D 
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and IdReseau1='a')  or 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '^" . $_SESSION['search'] . "' or CodeIntro REGEXP '^" . $_SESSION['search'] . "') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                            }
                        } else {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomIntro REGEXP '^" . $_SESSION['search'] . "' OR CodeIntro REGEXP '^" . $_SESSION['search'] . "') AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                        }
                        break;
                    case "complet" : // Type de recherche = est
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                        WHERE (upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeIntro)=upper('" . $_SESSION['searchcomplet'] . "'))
                                        ORDER BY CodeIntro;";
                            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                            } else {//Utilisateur D 
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and IdReseau1='a')  or 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') or upper(CodeIntro)=upper('" . $search_complet . "')) and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                            }
                        } else {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE (upper(NomIntro)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeIntro)=upper('" . $_SESSION['searchcomplet'] . "')) AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                        }
                        break;
                    case "end" : // Type de recherche = fini par
                        if (isset($_SESSION['codePersonne'])) {
                            if ($_SESSION['ProfilPersonne'] == 'A') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS`
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                        WHERE (NomIntro REGEXP '" . $_SESSION['search'] . "$' OR CodeIntro REGEXP '" . $_SESSION['search'] . "$')
                                        ORDER BY CodeIntro;";
                            } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                            } else { // Utilitsateur D SiregalPresenceEnColl = 'oui' AND(
                                $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
                                        SiregalPresenceEnColl = 'oui' AND(
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and IdReseau1='a')  or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										((NomIntro REGEXP '" . $_SESSION['search'] . "$' or CodeIntro REGEXP '" . $_SESSION['search'] . "$') and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))";
                            }
                        } else {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE (NomIntro REGEXP '" . $_SESSION['search'] . "$' OR CodeIntro REGEXP '" . $_SESSION['search'] . "$') AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                        }
                        break;
                }
            }

            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bdd();
                echo "<script>alert('erreur de bdd')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                $result = null;
                deconnexion_bdd();
            }
            $result = array();

            if (mysql_num_rows($resultat) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat)); $i++) {
                    $dico = mysql_fetch_assoc($resultat);
                    $dico['CodeIntro'] = "'" . $dico['CodeIntro'];
                    $dico = supprNull($dico);
                    array_push($result, $dico);
                }
                deconnexion_bbd();
            }

            $res = $result;
            return $res;
        } else if ($section == "espece") {
            connexion_bbd();
            mysql_query('SET NAMES UTF8');
            switch ($_SESSION['typerecherche']) {
                case "fuzzy" : // Type de recherche = contient
                    if (isset($_SESSION['codePersonne'])) {
                        $sql = "SELECT CodeEsp, Espece, Botaniste, Tronc
                        FROM `NV-ESPECES`
                        WHERE (Espece REGEXP '" . $_SESSION['search'] . "' OR CodeEsp REGEXP '" . $_SESSION['search'] . "')
                        ORDER BY CodeEsp;";
                    } else {
                        $sql = "SELECT CodeEsp, Espece, Botaniste, Tronc
                        FROM `NV-ESPECES`
                        WHERE (Espece REGEXP '" . $_SESSION['search'] . "' OR CodeEsp REGEXP '" . $_SESSION['search'] . "') AND public!='N'
                        ORDER BY CodeEsp;";
                    }
                    break;
                case "start" : // Type de recherche = commence par
                    if (isset($_SESSION['codePersonne'])) {
                        $sql = "SELECT CodeEsp, Espece, Botaniste, Tronc
                        FROM `NV-ESPECES`
                        WHERE (Espece REGEXP '^" . $_SESSION['search'] . "' OR CodeEsp REGEXP '^" . $_SESSION['search'] . "')
                        ORDER BY CodeEsp;";
                    } else {
                        $sql = "SELECT CodeEsp, Espece, Botaniste, Tronc
                        FROM `NV-ESPECES`
                        WHERE (Espece REGEXP '^" . $_SESSION['search'] . "' OR CodeEsp REGEXP '^" . $_SESSION['search'] . "') AND public!='N'
                        ORDER BY CodeEsp;";
                    }
                    break;
                case "complet" : // Type de recherche = est
                    if (isset($_SESSION['codePersonne'])) {
                        $sql = "SELECT CodeEsp, Espece, Botaniste, Tronc
                        FROM `NV-ESPECES`
                        WHERE (upper(Espece)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeEsp)=upper('" . $_SESSION['searchcomplet'] . "'))
                        ORDER BY CodeEsp;";
                    } else {
                        $sql = "SELECT CodeEsp, Espece, Botaniste, Tronc
                        FROM `NV-ESPECES`
                        WHERE (upper(Espece)=upper('" . $_SESSION['searchcomplet'] . "') OR upper(CodeEsp)=upper('" . $_SESSION['searchcomplet'] . "')) AND public!='N'
                        ORDER BY CodeEsp;";
                    }
                    break;
                case "end" : // Type de recherche = fini par
                    if (isset($_SESSION['codePersonne'])) {
                        $sql = "SELECT CodeEsp, Espece, Botaniste, Tronc
                        FROM `NV-ESPECES`
                        WHERE (Espece REGEXP '" . $_SESSION['search'] . "$' OR CodeEsp REGEXP '" . $_SESSION['search'] . "$')
                        ORDER BY CodeEsp;";
                    } else {
                        $sql = "SELECT CodeEsp, Espece, Botaniste, Tronc
                        FROM `NV-ESPECES`
                        WHERE (Espece REGEXP '" . $_SESSION['search'] . "$' OR CodeEsp REGEXP '" . $_SESSION['search'] . "$') AND public!='N'
                        ORDER BY CodeEsp;";
                    }
                    break;
            }
            $resultat = mysql_query($sql) or die(mysql_error());
            if (!$resultat) {
                deconnexion_bdd();
                echo "<script>alert('erreur de bdd')</script>";
                exit;
            }
            if (mysql_num_rows($resultat) == 0) {
                $result = null;
                deconnexion_bdd();
            }
            $result = array();

            if (mysql_num_rows($resultat) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat);
                    $dico = supprNull($dico);
                    array_push($result, $dico);
                }
                deconnexion_bbd();
            }
            $res = $result;
            return $res;
        }
    }

    public function exportxls_espece($langue, $section, $code) {
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        if ($section == "variete") {
            if ($langue == "FR") {
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_texte, Sexe_texte, NomPaysFrancais
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "'
                                    ORDER BY CodeVar;";
                    } else {
                        $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_Texte, Sexe_texte, NomPaysFrancais 
                                        FROM `NV-VARIETES`
                                        LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                        LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                        LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                        LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                        LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays 
                                        WHERE CodeEsp = '" . $code . "' AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                        ORDER BY CodeVar;";
                    }
                } else {
                    $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte, CouleurPel_Texte, Saveur_Texte,Pepins_texte, Sexe_texte, NomPaysFrancais
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' AND public!='N'
                                    ORDER BY CodeVar;";
                }
            } else if ($langue == "EN") {
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "'
                                    ORDER BY CodeVar;";
                    } else {
                        $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                        FROM `NV-VARIETES`
                                        LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                        LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                        LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                        LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                        LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays 
                                        WHERE CodeEsp = '" . $code . "' AND (codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR public!='N')
                                        ORDER BY CodeVar;";
                    }
                } else {
                    $sql = "SELECT CodeVar, NomVar, SynoMajeur, Utilite_Texte_anglais, CouleurPel_Texte_en, Saveur_Texte_en,Pepins_texte_en, Sexe_texte_en, NomPaysLocal
                                    FROM `NV-VARIETES`
                                    LEFT JOIN `ListeDeroulante_utilite` ON `NV-VARIETES`.Utilite = `ListeDeroulante_utilite`.Utilite
                                    LEFT JOIN `ListeDeroulante_couleurPel` ON `NV-VARIETES`.CouleurPel = `ListeDeroulante_couleurPel`.CouleurPel
                                    LEFT JOIN `ListeDeroulante_saveur` ON `NV-VARIETES`.Saveur = `ListeDeroulante_saveur`.Saveur
                                    LEFT JOIN `ListeDeroulante_pepins` ON `NV-VARIETES`.Pepins = `ListeDeroulante_pepins`.Pepins
                                    LEFT JOIN `ListeDeroulante_sexe` ON `NV-VARIETES`.Sexe = `ListeDeroulante_sexe`.Sexe
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-VARIETES`.`PaysOrigine` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' AND public!='N'
                                    ORDER BY CodeVar;";
                }
            }
        } else if ($section == "accession") {
            if ($langue == "FR") {
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "'
                                    ORDER BY CodeIntro;";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {

                        $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree 
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays WHERE 
										(CodeEsp = '" . $code . "' and IdReseau1='a')  or 
										(CodeEsp = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(CodeEsp = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))
                                        ORDER BY CodeIntro;";
                    } else { // Utilisateur D
                        $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree 
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays WHERE
                                        SiregalPresenceEnColl = 'oui' AND(
										(CodeEsp = '" . $code . "' and IdReseau1='a')  or 
										(CodeEsp = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(CodeEsp = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))
                                        ORDER BY CodeIntro;";
                    }
                } else {
                    $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                }
            } else if ($langue == "EN") { // Site en anglais
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "'
                                    ORDER BY CodeIntro;";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										(CodeEsp = '" . $code . "' and IdReseau1='a')  or 
										(CodeEsp = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(CodeEsp = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))
                                        ORDER BY CodeIntro;";
                    } else { //utilisateur D 
                        "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										(CodeEsp = '" . $code . "' and IdReseau1='a')  or 
										(CodeEsp = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(CodeEsp = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))
                                        ORDER BY CodeIntro;";
                    }
                } else {
                    $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE CodeEsp = '" . $code . "' AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                }
            }
        }
        $resultat = mysql_query($sql) or die(mysql_error());
        if (!$resultat) {
            deconnexion_bdd();
            echo "<script>alert('erreur de bdd')</script>";
            exit;
        }
        if (mysql_num_rows($resultat) == 0) {
            $result = null;
            deconnexion_bdd();
        }
        $result = array();

        if (mysql_num_rows($resultat) > 0) {
            for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                $dico = mysql_fetch_assoc($resultat);
                $dico = supprNull($dico);
                array_push($result, $dico);
                $result[$i]['CodeIntro'] = "'" . $dico['CodeIntro'];
            }
            deconnexion_bbd();
        }
        $res = $result;
        return $res;
    }

    public function exportxls_variete($langue, $section, $code) {
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $DAO = new BibliothequeDAO();
        switch ($section) {
            case "accession":
                if ($langue == "FR") {
                    if (isset($_SESSION['codePersonne'])) {
                        if ($_SESSION['ProfilPersonne'] == 'A') {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "'
                                    ORDER BY CodeIntro;";
                        } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and IdReseau1='a')  or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))
                                        ORDER BY CodeIntro;";
                        } else { // Utilisateur D 
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where
                                        SiregalPresenceEnColl = 'oui' AND(
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and IdReseau1='a')  or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))
                                        ORDER BY CodeIntro;";
                        }
                    } else {
                        $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysFrancais, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "' AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                    }
                } else if ($langue == "EN") {
                    if (isset($_SESSION['codePersonne'])) {
                        if ($_SESSION['ProfilPersonne'] == 'A') {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "'
                                    ORDER BY CodeIntro;";
                        } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and IdReseau1='a')  or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))
                                        ORDER BY CodeIntro;";
                        } else { // utilisateur D 
                            $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                        FROM `NV-INTRODUCTIONS` 
                                        LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                        LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                        LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays where 
                                        SiregalPresenceEnColl = 'oui' AND(
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and IdReseau1='a')  or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
										(`NV-INTRODUCTIONS`.CodeVar = '" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau2 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																						(idreseau3 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																						(idreseau4 in(select idreseau from Participation_aux_reseaux where `NV-INTRODUCTIONS`.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))))
                                        ORDER BY CodeIntro;";
                        }
                    } else {
                        $sql = "SELECT CodeIntro, NomIntro, NomVar, `Partenaires`.NomPartenaire, NomPaysLocal, CommuneProvenance, AnneeEntree
                                    FROM `NV-INTRODUCTIONS`
                                    LEFT JOIN `NV-VARIETES` ON `NV-INTRODUCTIONS`.CodeVar = `NV-VARIETES`.CodeVar
                                    LEFT JOIN `Partenaires` ON `NV-INTRODUCTIONS`.CodePartenaire = `Partenaires`.CodePartenaire
                                    LEFT JOIN `ListeDeroulante_pays` ON `NV-INTRODUCTIONS`.`PaysProvenance` = `ListeDeroulante_pays`.CodePays
                                    WHERE `NV-INTRODUCTIONS`.CodeVar = '" . $code . "' AND IdReseau1='a' AND SiregalPresenceEnColl = 'oui'
                                    ORDER BY CodeIntro;";
                    }
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                if (!$resultat) {
                    deconnexion_bdd();
                    echo "<script>alert('erreur de bdd')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    $result = null;
                    deconnexion_bdd();
                }
                $result = array();

                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i++) {
                        $dico = mysql_fetch_assoc($resultat);
                        $dico['CodeIntro'] = "'" . $dico['CodeIntro'];
                        $ACC = new Accession($dico['CodeIntro'], $dico['NomIntro'], $dico['NomVar'], $dico['NomPartenaire'], $dico['NomPaysLocal'], $dico['CommuneProvenance'], $dico['AnneeEntree'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $dico['CouleurPelIntro'], $dico['CouleurPulpIntro'], $dico['PepinsIntro'], $dico['SaveurIntro'], $dico['SexeIntro'], $dico['Statut'], $DateEntre, $dico['Collecteur'], $dico['AdresProvenance'], $dico['SiteProvenance'], $dico['CodePartenaire'], $dico['UniteIntro'], $dico['AnneeAgrement'], $dico['Collecteur'], $dico['TypeCollecteur'], $dico['ContinentProvenance'], $dico['CommuneProvenance'], $dico['CodPostProvenance'], $dico['SiteProvenance'], $dico['AdresProvenance'], $dico['ProprietProvenance'], $dico['ParcelleProvenance'], $dico['TypeParcelleProvenance'], $dico['RangProvenance'], $dico['SoucheProvenance'], $dico['SoucheTheoriqueProvenance'], $dico['PaysProvenance'], $dico['RegionProvenance'], $dico['DepartProvenance'], $langue, $dico['evdb_15-LATITUDE'], $dico['evdb_16-LONGITUDE'], $dico['evdb_17-ELEVATION'], $dico['JourEntree'], $dico['MoisEntree'], $dico['AnneeEntree'], $dico['CodeIntroProvenance'], $dico['CodeEntree'], $dico['ReIntroduit'], $dico['IssuTraitement'], $dico['CloneTraite'], $dico['RemarquesProvenance'], $dico['CollecteurAnt'], $dico['TypeCollecteurAnt'], $dico['ContinentProvAnt'], $dico['CommuneProvAnt'], $dico['CodPostProvAnt'], $dico['SiteProvAnt'], $dico['AdresProvAnt'], $dico['ProprietProvAnt'], $dico['ParcelleProvAnt'], $dico['TypeParcelleProvAnt'], $dico['RangProvAnt'], $dico['SoucheProvAnt'], $dico['SoucheTheoriqueProvAnt'], $dico['PaysProvAnt'], $dico['RegionProvAnt'], $dico['DepartProvAnt'], $dico['CodeIntroProvenanceAnt'], $dico['evdb_ID_VITIS'], $dico['evdb_F-ConfirmAmpelo'], $dico['evdb_G-ConfirmSSR'], $dico['evdb_I-BiblioVolume'], $dico['evdb_L-ConfirmOther'], $dico['evdb_I-BiblioVolume'], $dico['evdb_K-BiblioPage'], $dico['evdb_M-RemarkAccessionName'], $dico['CouleurPelIntro'], $dico['CouleurPulpIntro'], $dico['SaveurIntro'], $dico['PepinsIntro'], $dico['SexeIntro'], $dico['NumTempCTPS'], $dico['DelegONIVINS'], $dico['Statut'], $dico['DepartAgrementClone'], $dico['AnneeAgrement'], $dico['SiteAgrementClone'], $dico['AnneeNonCertifiable'], $dico['LieuDepotMatInitial'], $dico['SurfMulti'], $dico['NomPartenaire'], $dico['NomPartenaire2'], $dico['Famille'], $dico['Agrement'], $dico['NumCloneCTPS'], $dico['SiregalPresenceEnColl'], $dico['MTAactif'], $dico['RemarquesIntro']);
                        $content_accession = supprNull($ACC->getListeAccession());
                        array_push($result, $content_accession);
                    }
                    deconnexion_bbd();
                    $res = $result;
                    return $res;
                }
                break;
            case "aptitude":
                if ($langue == "FR") {
                    if (isset($_SESSION['codePersonne'])) {
                        if ($_SESSION['ProfilPersonne'] == 'A') {
                            $sql = "SELECT *
                                    FROM `Aptitudes`
                                    LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract
                                    WHERE `Aptitudes`.CodeVar = '" . $code . "'
                                    ORDER BY CodeAptitude;";
                        } else {
                            $sql = "SELECT *
                                    FROM `Aptitudes`
                                    LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract
                                    WHERE 
						(`Aptitudes`.CodeVar='" . $code . "' and `Aptitudes`.IdReseau1='a')  or 
						(`Aptitudes`.CodeVar='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(`Aptitudes`.CodeVar='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))
                                    ORDER BY CodeAptitude;";
                        }
                    } else {
                        $sql = "SELECT *
                                FROM `Aptitudes`
                                LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract                              
                                WHERE `Aptitudes`.CodeVar='" . $code . "' and `Aptitudes`.IdReseau1='a'
                                ORDER BY CodeAptitude;";
                    }
                } else if ($langue == "EN") {
                    if (isset($_SESSION['codePersonne'])) {
                        if ($_SESSION['ProfilPersonne'] == 'A') {
                            
                        } else {
                            
                        }
                    } else {
                        
                    }
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                if (!$resultat) {
                    deconnexion_bdd();
                    echo "<script>alert('erreur de bdd')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    $result = null;
                    deconnexion_bdd();
                }
                $result = array();

                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i++) {
                        $dico = mysql_fetch_assoc($resultat);
                        $date = $dico['JourExpe'] . '/' . $dico['MoisExpe'] . '/' . $dico['AnneeExpe'];
                        $APT = new Aptitude($dico['CodeAptitude'], $dico['CodeVar'], $dico['NomCaract'], $dico['ValeurCaractNum'], ($dico['uniteCaract']), $dico['Ponderation'], $date, $dico['CodeSite'], $dico['CodePartenaire'], $dico['CodeAptitude'], $dico['NomVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomCaract'], $dico['ValeurCaractNum'], $dico['uniteCaract'], $dico['Ponderation'], $dico['CodePersonneExpe'], $dico['CodePartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $dico['CodeSite'], $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                        $content = supprNull($APT->getListeAptitude());
                        array_push($result, $content);
                    }
                    deconnexion_bbd();
                    $res = $result;
                    return $res;
                }
                break;
            case "emplacement":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT *
                                FROM `NV-EMPLACEMENTS` e
                                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                WHERE CodeVar = '" . $code . "' AND `Elimination`='non' ";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql = "SELECT *
                                FROM `NV-EMPLACEMENTS` e
                                INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                                INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                                WHERE CodeVar = '" . $code . "' AND `Elimination`='non' AND(codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR AffichEmplacInternet='O') ";
                    } else { // Utilisateur D
                        $sql = "SELECT *
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                            WHERE CodeVar = '" . $code . "' AND e.`Elimination`='non' AND e.AffichEmplacInternet='O'";
                    }
                } else {
                    $sql = "SELECT *
                        FROM `NV-EMPLACEMENTS` e 
                        INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                        INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro
                        WHERE CodeVar = '" . $code . "' AND `Elimination`='non' AND e.AffichEmplacInternet='O'";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array();
                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                        $dico = mysql_fetch_assoc($resultat);
                        $dico['CodeIntro'] = "'" . $dico['CodeIntro'];
                        $dico['CodeIntroPartenaire'] = "'" . $dico['CodeIntroPartenaire'];
                        $EM = new Emplacement($dico['CodeEmplacem'], $dico['CodeSite'], $dico['Parcelle'], $dico['Rang'], $dico['PremiereSouche'], $dico['DerniereSouche'], $dico['NomIntro'], $dico['CodeIntro'], $dico['CodeVar'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $dico['NumCloneCTPS-PG'], $dico['AnneePlantation'], $dico['NomIntro'], $dico['CodeIntro'], $dico['CodeSite'], $dico['Zone'], $dico['SousPartie'], $dico['NbreEtatNormal'], $dico['NbreEtatMoyen'], $dico['NbreEtatMoyFaible'], $dico['NbreEtatFaible'], $dico['NbreEtatTresFaible'], $dico['NbreEtatMort'], $dico['TypeSouche'], $dico['AnneeElimination'], $dico['CategMateriel'], $dico['Greffe'], $dico['PorteGreffe']);
                        $detail = $EM->getListeEmplaclemnt();
                        $detail = supprNull($detail);
                        array_push($result, $detail);
                    }
                    deconnexion_bbd();
                }
                return $result;
                break;
            case "sanitaire":

                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {

                        $sql = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                        LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                        LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                        LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                        LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                        LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where CodeVar='" . $code . "' ";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql = "SELECT *
                                    FROM `Tests_sanitaires` s
                                    LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire        
                                    WHERE (CodeVar='" . $code . "' AND s.IdReseau1='a') or (CodeVar='" . $code . "' and s.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')
                                                                                        or (CodeVar='" . $code . "' and 
                                                                                                                ((s.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
                                                                                                                (s.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) ";
                    } else {
                        $sql = "SELECT *
                            FROM `Tests_sanitaires` s
                            LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire        
                            where CodeVar='" . $code . "' and s.IdReseau1='a'";
                    }
                } else {
                    $sql = "SELECT *
                            FROM `Tests_sanitaires` s
                            LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                            where CodeVar='" . $code . "' and s.IdReseau1='a'";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array();
                $dateTest = '0000-00-00';

                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) {
                    if ($langue == 'FR') {
                        $j = 0;
                        while ($j < (mysql_num_rows($resultat))) {
                            $dico = mysql_fetch_assoc($resultat);
                            $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $dico['ResultatTest'], $dico['CategorieTest'], $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $dico['NomFranComplet'], $dico['IdTest'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomFranComplet'], $dico['CodeEmplacem'], $dico['NomPartenaire'], $dico['CodePartenaire']);
                            $detail = supprNull($SAN->getListeSanitaire());
                            array_push($result, $detail);
                            $j++;
                        }
                        deconnexion_bbd();
                    } else {
                        $j = 0;
                        while ($j < (mysql_num_rows($resultat))) {
                            $dico = mysql_fetch_assoc($resultat);
                            $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $dico['ResultatTest_en'], $dico['CategMateriel_en'], $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $dico['JY_NomEngComplet'], $dico['IdTest'], $dico['NomIntro'], $dico['CodeIntro'], $dico['JY_NomEngComplet'], $dico['CodeEmplacem'], $dico['NomPartenaire'], $dico['CodePartenaire']);
                            $detail = supprNull($SAN->getListeSanitaire());
                            array_push($result, $detail);
                            $j++;
                        }

                        deconnexion_bbd();
                    }
                }
                return $result;
                break;
            case "morphologique":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                    } else { // Profil B, C ou D
                        $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND (a.Public='O' OR a.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                    }
                } else {
                    $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeVar =  '" . $code . "' AND a.Public='O' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array();
                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                        $dico = mysql_fetch_assoc($resultat);
                        if ($langue == "FR") {
                            $dico['CodeOIV'] = "'" . $dico['CodeOIV']; // Permet de conserver les codes
                            $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripFRA'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $dico['NodeVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['LibelleDescripFRA'], $dico['CodeOIV'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodePersonne'], $dico['NomPartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                        } else { // Anglais/EN
                            $dico['CodeOIV'] = "'" . $dico['CodeOIV']; // Permet de conserver les codes
                            $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripENG'], $dico['LibelleCritereENG'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $dico['NodeVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['LibelleDescripENG'], $dico['CodeOIV'], $dico['LibelleCritereENG'], $dico['CaractereOIV'], $dico['CodePersonne'], $dico['NomPartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                        }
                        $detail = supprNull($MOR->getListeMorphologique()); // contenu de l'objet
                        array_push($result, $detail); // On ajoute ligne par ligne à notre tableau
                    }
                    deconnexion_bbd();
                }
                return $result;
                break;
            case "genetique":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "'";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE (g.CodeVar='" . $code . "' and g.IdReseau1='a') or (g.CodeVar='" . $code . "' and g.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or(g.CodeVar='" . $code . "'
																			and ((g.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																			(g.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                    } else {
                        $sql = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "' and g.IdReseau1='a'";
                    }
                } else {
                    $sql = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeVar='" . $code . "' and g.IdReseau1='a'";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array();
                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                        $dico = mysql_fetch_assoc($resultat);
                        $GEN = new Genetique($dico['IdAnalyse'], $dico['Marqueur'], $dico['ValeurCodee1'], $dico['ValeurCodee2'], $dico['CodePartenaire'], $dico['DatePCR'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $dico['EmplacemRecolte'], $dico['SouchePrelev'], $dico['DateRecolte'], $dico['IdProtocoleRecolte'], $dico['TypeOrgane'], $dico['IdStockADN'], $dico['IdProtocolePCR'], $dico['DatePCR'], $dico['DateRun'], $dico['CodePartenaire']);
                        $detail = supprNull($GEN->getListeGenetique());
                        array_push($result, $detail);
                    }
                    deconnexion_bbd();
                }
                return $result;
                break;
            case "":
                break;
            case "":
                break;
            case "":
                break;
            case "bibliographie":
                if (isset($_SESSION['codePersonne'])) {
                    //Si on est connecté
                    $sql = "SELECT *
                                    FROM (`Bibliographie_citations`,`Bibliographie_documents`)
                                    LEFT JOIN `NV-VARIETES` ON `Bibliographie_citations`.CodeVar = `NV-VARIETES`.CodeVar
                                    WHERE `Bibliographie_citations`.CodeDoc=`Bibliographie_documents`.CodeDoc AND `Bibliographie_citations`.CodeVar='" . $code . "'";
                } else { // Public
                    $sql = "SELECT *
                            FROM (`Bibliographie_citations`,`Bibliographie_documents`)
                            LEFT JOIN `NV-VARIETES` ON `Bibliographie_citations`.CodeVar = `NV-VARIETES`.CodeVar
                            WHERE `Bibliographie_citations`.CodeDoc=`Bibliographie_documents`.CodeDoc AND `Bibliographie_citations`.CodeVar='" . $code . "' AND `Bibliographie_citations`.JY_Public='O' AND `Bibliographie_documents`.Public='O' ";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array(); // On initialise le tableau qui contiendra les données
                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) { //Si il n'y a pas de résultat
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) { // s'il y'a au moins 1 résultat
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                        $dico = mysql_fetch_assoc($resultat);
                        // création de l'objet bibliographie
                        $BI = new Bibliograhpie($dico['CodeCit'], $dico['CodeVar'], $dico['Title'], $dico['Author'], $dico['Year'], $dico['PagesCitation'], $dico['VolumeCitation'], $dico['CodeIntro'], $dico['NomVar'], $dico['CodeIntro'], $dico['TypeDoc'], $dico['Edition'], $dico['Publisher'], $dico['PlacePublished'], $dico['ISBN'], $dico['Language'], $dico['NumberOfVolumes'], $dico['PagesDoc'], $dico['CallNumber'], $dico['AuteurCitation'], $dico['NomVigneCite']);
                        $detail = $BI->getListeBibliographie();
                        $detail = supprNull($detail); // On replace les vide par des tirets
                        array_push($result, $detail); // On ajoute la ligne à la fin de notre tableau
                    }
                    deconnexion_bbd();
                }
                return $result;
                break;
        }
    }

    public function exportxls_accession($langue, $section, $code) {
        connexion_bbd();
        mysql_query('SET NAMES UTF8');
        $DAO = new BibliothequeDAO();
        switch ($section) {
            case "aptitude":
                if ($langue == "FR") {
                    if (isset($_SESSION['codePersonne'])) {
                        if ($_SESSION['ProfilPersonne'] == 'A') {
                            $sql = "SELECT *
                                    FROM `Aptitudes`
                                    LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract
                                    WHERE `Aptitudes`.CodeIntro = '" . $code . "'
                                    ORDER BY CodeAptitude;";
                        } else {
                            $sql = "SELECT *
                                    FROM `Aptitudes`
                                    LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract
                                    WHERE 
						(`Aptitudes`.CodeIntro='" . $code . "' and `Aptitudes`.IdReseau1='a')  or 
						(`Aptitudes`.CodeIntro='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(`Aptitudes`.CodeIntro='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))
                                    ORDER BY CodeAptitude;";
                        }
                    } else {
                        $sql = "SELECT *
                                FROM `Aptitudes`
                                LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract                              
                                WHERE `Aptitudes`.CodeIntro='" . $code . "' and `Aptitudes`.IdReseau1='a'
                                ORDER BY CodeAptitude;";
                    }
                } else if ($langue == "EN") {
                    if (isset($_SESSION['codePersonne'])) {
                        if ($_SESSION['ProfilPersonne'] == 'A') {
                            $sql = "SELECT *
                                    FROM `Aptitudes`
                                    LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract
                                    WHERE `Aptitudes`.CodeIntro = '" . $code . "'
                                    ORDER BY CodeAptitude;";
                        } else {
                            $sql = "SELECT *
                                    FROM `Aptitudes`
                                    LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract
                                    WHERE 
						(`Aptitudes`.CodeIntro='" . $code . "' and `Aptitudes`.IdReseau1='a')  or 
						(`Aptitudes`.CodeIntro='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(`Aptitudes`.CodeIntro='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))
                                    ORDER BY CodeAptitude;";
                        }
                    } else {
                        $sql = "SELECT *
                                FROM `Aptitudes`
                                LEFT JOIN `Caracteristiques` ON `Aptitudes`.CodeCaract = `Caracteristiques`.CodeCaract                              
                                WHERE `Aptitudes`.CodeIntro='" . $code . "' and `Aptitudes`.IdReseau1='a'
                                ORDER BY CodeAptitude;";
                    }
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                if (!$resultat) {
                    deconnexion_bdd();
                    echo "<script>alert('erreur de bdd')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    $result = null;
                    deconnexion_bdd();
                    return $result;
                }
                $result = array();

                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i++) {
                        $dico = mysql_fetch_assoc($resultat);
                        $date = $dico['JourExpe'] . '/' . $dico['MoisExpe'] . '/' . $dico['AnneeExpe'];
                        $APT = new Aptitude($dico['CodeAptitude'], $dico['CodeVar'], $dico['NomCaract'], $dico['ValeurCaractNum'], $dico['uniteCaract'], $dico['Ponderation'], $date, $dico['CodeSite'], $dico['CodePartenaire'], $dico['CodeAptitude'], $dico['NomVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomCaract'], $dico['ValeurCaractNum'], $dico['uniteCaract'], $dico['Ponderation'], $dico['CodePersonneExpe'], $dico['CodePartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $dico['CodeSite'], $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                        $content = supprNull($APT->getListeAptitude());
                        array_push($result, $content);
                    }
                    deconnexion_bbd();
                    $res = $result;
                    return $res;
                }
                break;
            case "emplacement":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non'";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND(codePartenaire='" . $_SESSION['CodePartenairePersonne'] . "' OR AffichEmplacInternet='O')";
                    } else {
                        $sql = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND AffichEmplacInternet='O'";
                    }
                } else {
                    $sql = "SELECT * 
                            FROM `NV-EMPLACEMENTS` e 
                            INNER JOIN `Emplacements_theoriques` t on  e.CodeEmplacem=t.CodeEmplacem
                            INNER JOIN `NV-INTRODUCTIONS` i on i.CodeIntro=e.CodeIntro and e.CodeIntro='" . $code . "'
                            WHERE Elimination='non' AND AffichEmplacInternet='O'";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array();
                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                        $dico = mysql_fetch_assoc($resultat);
                        $dico['CodeIntro'] = "'" . $dico['CodeIntro'];
                        $dico['CodeIntroPartenaire'] = "'" . $dico['CodeIntroPartenaire'];
                        $EM = new Emplacement($dico['CodeEmplacem'], $dico['CodeSite'], $dico['Parcelle'], $dico['Rang'], $dico['PremiereSouche'], $dico['DerniereSouche'], $dico['NomIntro'], $dico['CodeIntro'], $dico['CodeVar'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $dico['NumCloneCTPS-PG'], $dico['AnneePlantation'], $dico['NomIntro'], $dico['CodeIntro'], $dico['CodeSite'], $dico['Zone'], $dico['SousPartie'], $dico['NbreEtatNormal'], $dico['NbreEtatMoyen'], $dico['NbreEtatMoyFaible'], $dico['NbreEtatFaible'], $dico['NbreEtatTresFaible'], $dico['NbreEtatMort'], $dico['TypeSouche'], $dico['AnneeElimination'], $dico['CategMateriel'], $dico['Greffe'], $dico['PorteGreffe']);
                        $detail = $EM->getListeEmplaclemnt();
                        $detail = supprNull($detail);
                        array_push($result, $detail);
                    }
                    deconnexion_bbd();
                }
                return $result;
                break;
            case "sanitaire":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT *
                        FROM `Tests_sanitaires` s
                        LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                        LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                        LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                        LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                        LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                        LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                        where s.CodeIntro='" . $code . "' ";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql = "SELECT *
                                    FROM `Tests_sanitaires` s
                                    LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                                    WHERE (s.CodeIntro='" . $code . "' AND s.IdReseau1='a') or (s.CodeIntro='" . $code . "' and s.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')
                                                                                        or (s.CodeIntro='" . $code . "' and 
                                                                                                                ((s.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
                                                                                                                (s.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
                                                                                                                (s.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) ";
                    } else {
                        $sql = "SELECT *
                            FROM `Tests_sanitaires` s
                            LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                            where s.CodeIntro='" . $code . "' and s.IdReseau1='a'";
                    }
                } else {
                    $sql = "SELECT *
                            FROM `Tests_sanitaires` s
                            LEFT JOIN `Type_pathogene` ph ON s.NomTest = ph.NomTest
                            LEFT JOIN `ListeDeroulante_categoriesTest` ct ON s.CategorieTest=ct.CategorieTest
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON s.MatTeste=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_resultatsTest` rt ON s.ResultatTest=rt.ResultatTest
                            LEFT JOIN `NV-INTRODUCTIONS` i ON s.CodeIntro=i.CodeIntro
                            LEFT JOIN `Partenaires` p ON s.CodePartenaire=p.CodePartenaire    
                            where s.CodeIntro='" . $code . "' and s.IdReseau1='a'";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array();
                $dateTest = '0000-00-00';

                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) {
                    if ($langue == 'FR') {
                        $j = 0;
                        while ($j < (mysql_num_rows($resultat))) {
                            $dico = mysql_fetch_assoc($resultat);
                            $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $dico['ResultatTest'], $dico['CategorieTest'], $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $dico['NomFranComplet'], $dico['IdTest'], $dico['NomIntro'], $dico['CodeIntro'], $dico['NomFranComplet'], $dico['CodeEmplacem'], $dico['NomPartenaire'], $dico['CodePartenaire']);
                            $detail = supprNull($SAN->getListeSanitaire());
                            array_push($result, $detail);
                            $j++;
                        }
                        deconnexion_bbd();
                    } else {
                        $j = 0;
                        while ($j < (mysql_num_rows($resultat))) {
                            $dico = mysql_fetch_assoc($resultat);
                            $SAN = new Sanitaire($dico['IdTest'], $dico['CodeIntro'], $dico['ResultatTest_en'], $dico['CategMateriel_en'], $dico['MatTest'], $dico['Laboratoire'], $dateTest, $dico['LieuTest'], $dico['SoucheTestee'], $dico['JY_NomEngComplet'], $dico['IdTest'], $dico['NomIntro'], $dico['CodeIntro'], $dico['JY_NomEngComplet'], $dico['CodeEmplacem'], $dico['NomPartenaire'], $dico['CodePartenaire']);
                            $detail = supprNull($SAN->getListeSanitaire());
                            array_push($result, $detail);
                            $j++;
                        }

                        deconnexion_bbd();
                    }
                }
                return $result;
                break;
            case "morphologique":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                    } else { // Profil B, C ou D
                        $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND (a.Public='O' OR a.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                    }
                } else {
                    $sql = "SELECT *
                            FROM `Ampelographie` a 
                            LEFT JOIN `NV-VARIETES` v ON a.CodeVar = v.CodeVar
                            LEFT JOIN `NV-INTRODUCTIONS` i ON a.CodeIntro = i.CodeIntro
                            LEFT JOIN `Partenaires` p ON a.CodePartenaire = p.CodePartenaire
                            LEFT JOIN `Caracteres_ampelographiques` c ON a.CaractereOIV = c.CaractereOIV 
                            LEFT JOIN `Descripteurs_ampelographiques` d ON c.CodeOIV=d.CodeOIV
                            LEFT JOIN `ListeDeroulante_descripteurs_categorie` dc ON d.CategorieDescripteur=dc.CategorieDescripteur
                            LEFT JOIN `ListeDeroulante_descripteurs_organes` do ON d.OrganeDecrit=do.OrganeDecrit
                            LEFT JOIN `ListeDeroulante_descripteurs_type` dt ON d.TypeDescripteur=dt.TypeDescripteur
                            WHERE a.CodeIntro =  '" . $code . "' AND a.Public='O' AND a.CaractereOIV IS NOT NULL 
                            GROUP BY d.CodeOIV ";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array();
                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                        $dico = mysql_fetch_assoc($resultat);
                        if ($langue == "FR") {
                            $dico['CodeOIV'] = "'" . $dico['CodeOIV']; // Permet de conserver les codes
                            $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripFRA'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $dico['NodeVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['LibelleDescripFRA'], $dico['CodeOIV'], $dico['LibelleCritereFRA'], $dico['CaractereOIV'], $dico['CodePersonne'], $dico['NomPartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                        } else { // Anglais/EN
                            $dico['CodeOIV'] = "'" . $dico['CodeOIV']; // Permet de conserver les codes
                            $MOR = new Morphologique($dico['CodeAmpelo'], $dico['CodeOIV'], $dico['LibelleDescripENG'], $dico['LibelleCritereENG'], $dico['CaractereOIV'], $dico['CodeAmpelo'], $dico['NodeVar'], $dico['CodeVar'], $dico['NomIntro'], $dico['CodeIntro'], $dico['LibelleDescripENG'], $dico['CodeOIV'], $dico['LibelleCritereENG'], $dico['CaractereOIV'], $dico['CodePersonne'], $dico['NomPartenaire'], $dico['CodePartenaire'], $dico['JourExpe'], $dico['MoisExpe'], $dico['AnneeExpe'], $dico['LieuExpe'], $DAO->site($dico['CodeSite']), $dico['CodeSite'], $dico['CodeEmplacemExpe']);
                        }
                        $detail = supprNull($MOR->getListeMorphologique()); // contenu de l'objet
                        array_push($result, $detail); // On ajoute ligne par ligne à notre tableau
                    }
                    deconnexion_bbd();
                }
                return $result;
                break;
            case "genetique":
                if (isset($_SESSION['codePersonne'])) {
                    if ($_SESSION['ProfilPersonne'] == 'A') {
                        $sql = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "'";
                    } else if ($_SESSION['ProfilPersonne'] == 'B' || $_SESSION['ProfilPersonne'] == 'C') {
                        $sql = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE (g.CodeIntro='" . $code . "' and g.IdReseau1='a') or (g.CodeIntro='" . $code . "' and g.CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or(g.CodeIntro='" . $code . "'
																			and ((g.idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																			(g.idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																			(g.idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                    } else {
                        $sql = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "' and g.IdReseau1='a'";
                    }
                } else {
                    $sql = "SELECT *
                        FROM `BM-donnees_resume` g
                        LEFT JOIN `NV-VARIETES` v ON g.CodeVar = v.CodeVar
                        LEFT JOIN `NV-INTRODUCTIONS` i ON g.CodeIntro = i.CodeIntro
                        LEFT JOIN `Partenaires` p ON g.CodePartenaire = p.CodePartenaire
                        WHERE g.CodeIntro='" . $code . "' and g.IdReseau1='a'";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array();
                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) {
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) {
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                        $dico = mysql_fetch_assoc($resultat);
                        $GEN = new Genetique($dico['IdAnalyse'], $dico['Marqueur'], $dico['ValeurCodee1'], $dico['ValeurCodee2'], $dico['CodePartenaire'], $dico['DatePCR'], $DAO->nomVar($dico['CodeVar']), $dico['CodeVar'], $DAO->nomAcc($dico['CodeIntro']), $dico['CodeIntro'], $dico['EmplacemRecolte'], $dico['SouchePrelev'], $dico['DateRecolte'], $dico['IdProtocoleRecolte'], $dico['TypeOrgane'], $dico['IdStockADN'], $dico['IdProtocolePCR'], $dico['DatePCR'], $dico['DateRun'], $dico['CodePartenaire']);
                        $detail = supprNull($GEN->getListeGenetique());
                        array_push($result, $detail);
                    }
                    deconnexion_bbd();
                }
                return $result;
                break;
            case "":
                break;
            case "":
                break;
            case "":
                break;
            case "bibliographie":
                if (isset($_SESSION['codePersonne'])) {
                    //Si on est connecté
                    $sql = "SELECT *
                                    FROM (`Bibliographie_citations`,`Bibliographie_documents`) 
                                    LEFT JOIN `NV-INTRODUCTIONS` ON `Bibliographie_citations`.CodeIntro=`NV-INTRODUCTIONS`.CodeIntro  
                                    WHERE `Bibliographie_citations`.CodeDoc=d.CodeDoc AND `Bibliographie_citations`.CodeIntro='" . $code . "'";
                } else { // Public
                    $sql = "SELECT *
                                    FROM (`Bibliographie_citations`,`Bibliographie_documents`) 
                                    LEFT JOIN `NV-INTRODUCTIONS` ON `Bibliographie_citations`.CodeIntro=`NV-INTRODUCTIONS`.CodeIntro  
                                    WHERE `Bibliographie_citations`.CodeDoc=`Bibliographie_documents`.CodeDoc AND `Bibliographie_citations`.CodeIntro='" . $code . "' AND `Bibliographie_citations`.JY_Public='O' AND `Bibliographie_documents`.Public='O' ";
                }
                $resultat = mysql_query($sql) or die(mysql_error());
                $result = array(); // On initialise le tableau qui contiendra les données
                if (!$resultat) {
                    deconnexion_bbd();
                    echo "<script>alert('erreur de base de donnes')</script>";
                    exit;
                }
                if (mysql_num_rows($resultat) == 0) { //Si il n'y a pas de résultat
                    deconnexion_bbd();
                    return $result;
                }
                if (mysql_num_rows($resultat) > 0) { // s'il y'a au moins 1 résultat
                    for ($i = 0; $i < (mysql_num_rows($resultat)); $i = $i + 1) {
                        $dico = mysql_fetch_assoc($resultat);
                        // création de l'objet bibliographie
                        $BI = new Bibliograhpie($dico['CodeCit'], $dico['CodeVar'], $dico['Title'], $dico['Author'], $dico['Year'], $dico['PagesCitation'], $dico['VolumeCitation'], $dico['NomIntro'], $dico['CodeVar'], $dico['CodeIntro'], $dico['TypeDoc'], $dico['Edition'], $dico['Publisher'], $dico['PlacePublished'], $dico['ISBN'], $dico['Language'], $dico['NumberOfVolumes'], $dico['PagesDoc'], $dico['CallNumber'], $dico['AuteurCitation'], $dico['NomVigneCite']);
                        $detail = $BI->getListeBibliographie();
                        $detail = supprNull($detail); // On replace les vide par des tirets
                        array_push($result, $detail); // On ajoute la ligne à la fin de notre tableau
                    }
                    deconnexion_bbd();
                }
                return $result;
                break;
        }
    }

}

/*
 *
 * if ($ficher_section == "Accession") {
            $sql_total = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc";
            $startPage_bibliographie = ($page_bibliographie - 1) * $pagesize_bibliographie;
            if (isset($code)) {
                if (isset($_SESSION['codePersonne'])) {
                    $sql_limit = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc " . $tri_bibliographie . " limit " . $startPage_bibliographie . "," . $pagesize_bibliographie;
                    $sql_possible = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc " . $tri_sanitaire;
                } else {
                    $sql_limit = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc and c.JY_Public='O' and d.Public='O' " . $tri_bibliographie . " limit " . $startPage_bibliographie . "," . $pagesize_bibliographie;
                    $sql_possible = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeIntro='" . $code . "' and c.CodeDoc=d.CodeDoc and c.JY_Public='O' and d.Public='O' " . $tri_sanitaire;
                }
            }
        }

        if ($ficher_section == "Variete") {
            $sql_total = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc";
            $startPage_bibliographie = ($page_bibliographie - 1) * $pagesize_bibliographie;
            if (isset($code)) {
                if (isset($_SESSION['codePersonne'])) {
                    $sql_limit = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc " . $tri_bibliographie . " limit " . $startPage_bibliographie . "," . $pagesize_bibliographie;
                    $sql_possible = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc " . $tri_sanitaire;
                } else {
                    $sql_limit = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc and c.JY_Public='O' and d.Public='O' " . $tri_bibliographie . " limit " . $startPage_bibliographie . "," . $pagesize_bibliographie;
                    $sql_possible = "select * from `Bibliographie_citations` c,`Bibliographie_documents` d where c.CodeVar='" . $code . "' and c.CodeDoc=d.CodeDoc and c.JY_Public='O' and d.Public='O' " . $tri_sanitaire;
                }
            }
        }

        connexion_bbd();
        mysql_query('SET NAMES UTF8');
 * $resultat_bib = mysql_query($sql) or die(mysql_error());
            if (!$resultat_bib) {
                deconnexion_bbd();
                echo "<script>alert('erreur de base de donnes')</script>";
                exit;
            }
            if (mysql_num_rows($resultat_bib) == 0) {
                $detail = null;
                deconnexion_bbd();
            }
            if (mysql_num_rows($resultat_bib) > 0) {
                for ($i = 0; $i < (mysql_num_rows($resultat_bib)); $i = $i + 1) {
                    $dico = mysql_fetch_assoc($resultat_bib);
                    $BI = new Bibliograhpie($dico['CodeCit'], $dico['CodeVar'], $dico['Title'], $dico['Author'], $dico['Year'], $dico['PagesCitation'], $dico['VolumeCitation'], $DAO->nomAcc($dico['CodeIntro']), $DAO->nomVar($dico['CodeVar']), $dico['CodeIntro'], $dico['TypeDoc'], $dico['Edition'], $dico['Publisher'], $dico['PlacePublished'], $dico['ISBN'], $dico['Language'], $dico['NumberOfVolumes'], $dico['PagesDoc'], $dico['CallNumber'], $dico['AuteurCitation'], $dico['NomVigneCite']);
                }
                $detail = $BI->getFicherBibliographie();
                $detail = supprNull($detail);
                deconnexion_bbd();
            }
            return $detail;
        } 
 */

/*
 * $ACC = new Accession($dico['CodeIntro'], $dico['NomIntro'], $DAO->nomVar($dico['CodeVar']), $DAO->Partenaire($dico['CodePartenaire']), $DAO->paysorigine($dico['PaysProvenance'], $langue), $dico['CommuneProvenance'], $dico['AnneeEntree'], $dico['CodeVar'], $dico['CodeIntroPartenaire'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $DAO->statut($dico['Statut'], $langue), $DateEntre, $dico['Collecteur'], $dico['AdresProvenance'], $dico['SiteProvenance'], $dico['CodePartenaire'], $dico['UniteIntro'], $dico['AnneeAgrement'], $dico['Collecteur'], $dico['TypeCollecteur'], $dico['ContinentProvenance'], $dico['CommuneProvenance'], $dico['CodPostProvenance'], $dico['SiteProvenance'], $dico['AdresProvenance'], $dico['ProprietProvenance'], $dico['ParcelleProvenance'], $dico['TypeParcelleProvenance'], $dico['RangProvenance'], $dico['SoucheProvenance'], $dico['SoucheTheoriqueProvenance'], $DAO->paysorigine($dico['PaysProvenance'], $langue), $DAO->regionorigine($dico['RegionProvenance'], $langue), $DAO->departorigine($dico['DepartProvenance'], $langue), $dico['evdb_15-LATITUDE'], $dico['evdb_16-LONGITUDE'], $dico['evdb_17-ELEVATION'], $dico['JourEntree'], $dico['MoisEntree'], $dico['AnneeEntree'], $dico['CodeIntroProvenance'], $dico['CodeEntree'], $dico['ReIntroduit'], $dico['IssuTraitement'], $dico['CloneTraite'], $dico['RemarquesProvenance'], $dico['CollecteurAnt'], $dico['TypeCollecteurAnt'], $dico['ContinentProvAnt'], $dico['CommuneProvAnt'], $dico['CodPostProvAnt'], $dico['SiteProvAnt'], $dico['AdresProvAnt'], $dico['ProprietProvAnt'], $dico['ParcelleProvAnt'], $dico['TypeParcelleProvAnt'], $dico['RangProvAnt'], $dico['SoucheProvAnt'], $dico['SoucheTheoriqueProvAnt'], $DAO->paysorigine($dico['PaysProvAnt'], $langue), $DAO->regionorigine($dico['RegionProvAnt'], $langue), $DAO->departorigine($dico['DepartProvAnt'], $langue), $dico['CodeIntroProvenanceAnt'], $dico['evdb_ID_VITIS'], $dico['evdb_F-ConfirmAmpelo'], $dico['evdb_G-ConfirmSSR'], $dico['evdb_I-BiblioVolume'], $dico['evdb_L-ConfirmOther'], $dico['evdb_I-BiblioVolume'], $dico['evdb_K-BiblioPage'], $dico['evdb_M-RemarkAccessionName'], $DAO->couleurPel($dico['CouleurPelIntro'], $langue), $DAO->couleurPulp($dico['CouleurPulpIntro'], $langue), $DAO->saveur($dico['SaveurIntro'], $langue), $DAO->pepins($dico['PepinsIntro'], $langue), $DAO->sexe($dico['SexeIntro'], $langue), $dico['NumTempCTPS'], $dico['DelegONIVINS'], $DAO->statut($dico['Statut'], $langue), $dico['DepartAgrementClone'], $dico['AnneeAgrement'], $dico['SiteAgrementClone'], $dico['AnneeNonCertifiable'], $dico['LieuDepotMatInitial'], $dico['SurfMulti'], $dico['NomPartenaire'], $dico['NomPartenaire2'], $dico['Famille'], $dico['Agrement'], $dico['NumCloneCTPS'], $dico['SiregalPresenceEnColl'], $dico['MTAactif'], $dico['RemarquesIntro']);
 */

/*if ($section_fiche == "Variete") {
            if (isset($_SESSION['codePersonne'])) {
                if ($_SESSION['ProfilPersonne'] == 'A') {
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "select * from `Aptitudes` where CodeVar='" . $code . "' " . $tri_aptitude . " limit " . $startPage . "," . $pagesize;
                    $sql_possible = "select * from `Aptitudes` where CodeVar='" . $code . "'";
                    $total = "select * from `Aptitudes` where CodeVar='" . $code . "'";
                } else {
                    $startPage = ($page - 1) * $pagesize;
                    $sql = "select * from `Aptitudes` where 
						(CodeVar='" . $code . "' and IdReseau1='a')  or 
						(CodeVar='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(CodeVar='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')))) " . $tri_aptitude . " limit " . $startPage . "," . $pagesize . "";
                    $sql_possible = "select * from `Aptitudes` where 
						(CodeVar='" . $code . "' and IdReseau1='a')  or 
						(CodeVar='" . $code . "' and CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "') or 
						(CodeVar='" . $code . "' and ((idreseau1 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau2 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or 
																		(idreseau3 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "')) or
																		(idreseau4 in(select idreseau from Participation_aux_reseaux where CodePartenaire='" . $_SESSION['CodePartenairePersonne'] . "'))))";
                    $total = "select* from `Aptitudes` where CodeVar='" . $code . "'";
                }
            } else {
                $startPage = ($page - 1) * $pagesize;
                $sql = "select * from `Aptitudes`  where CodeVar='" . $code . "' and IdReseau1='a' " . $tri_aptitude . " limit " . $startPage . "," . $pagesize . "";
                $sql_possible = "select * from `Aptitudes`  where CodeVar='" . $code . "' and IdReseau1='a'";
                $total = "select * from `Aptitudes`  where CodeVar='" . $code . "'";
            }
        }*/
