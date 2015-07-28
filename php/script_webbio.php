<?php

session_start();

include_once('includes/class_DAO_Bibilotheque.php');
include_once('includes/bibliFonc.php');
$DAO = new BibliothequeDAO();
$fun = $_POST['function'];

switch ($fun) {
    case "verifierCodePersonne":
        $codePerson = $_POST['CodePersonne'];
        echo $resultat = $DAO->verifierCodePersonne($codePerson);
        break;
    case "ses_infos":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $codePersonne = $_POST['CodePersonne'];
        $resultat = $DAO->getSesInfo($codePersonne);
        echo json_encode($resultat);
        break;
    case "search_user":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $search = $_POST['search'];
        $resultat = $DAO->search_user($search);
        echo json_encode($resultat);
        break;
    case "resetPassword":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $codePersonne = $_POST['codePersonne'];
        $resultat = $DAO->resetPassword($codePersonne);
        echo $resultat;
        break;

    case "login":
        $username = suppr_accents_connexion($_POST['username']);
        $password = $_POST['password'];
        $res = $DAO->login($username, $password);
        echo $res;
        break;

    case "newUser":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $CodePersonne = $_POST['CodePersonne'];
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $Profile = $_POST['Profile'];
        $Partenaire = $_POST['Partenaire'];
        $PersonneMAJ = $_POST['PersonneMAJ'];
        $DateFinValide = $_POST['DateFinValide'];
        $Password = $_POST['Password'];
        $DateMAJ = date("Y-m-d");
        $DateMAJ_ele = explode("-", $DateMAJ);
        $DateMAJ_jour = $DateMAJ_ele[2];
        $DateMAJ_mois = $DateMAJ_ele[1];
        $DateMAJ_annee = $DateMAJ_ele[0];
        $function = $_POST['Function'];
        $Dom = $_POST['Dom'];
        $Tel = $_POST['Tel'];
        $Fax = $_POST['Fax'];
        $Mail = $_POST['Mail'];
        $resultat = $DAO->newUser($CodePersonne, $Nom, $Prenom, $Profile, $Partenaire, $PersonneMAJ, $DateFinValide, $Password, $DateMAJ_jour, $DateMAJ_mois, $DateMAJ_annee, $function, $Dom, $Tel, $Fax, $Mail);
        echo $resultat;
        break;

    case "modifiez_infoPerson":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $user_nom = $_POST['user_nom'];
        $user_prenom = $_POST['user_prenom'];
        $password = $_POST['password'];
        $user_tel = $_POST['user_tel'];
        $user_fax = $_POST['user_fax'];
        $user_mail = $_POST['user_mail'];
        $codePerson = $_POST['codePerson'];
        $user_fonction = $_POST['Fonction'];
        $user_DateFin = $_POST['DateFin'];
        $resultat = $DAO->modifiez_infoPerson($user_nom, $user_prenom, $password, $user_tel, $user_fax, $user_mail, $codePerson, $user_fonction, $user_DateFin);
        // $resultat="dfsdf";
        echo $resultat;
        break;
    case "login_resultat_ficher":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $username = $_GET['nom'];
        $password = $_GET['password'];
        $search_complet = $_POST['search'];
        $case_s = $_POST['case_s'];
        $model = $_POST['model'];
        $langue = $_POST['langue_value'];
        $page_espece = $_POST['page_espece'];
        $pagesize_espece = $_POST['pagesize_espece'];
        $page_variete = $_POST['page_variete'];
        $pagesize_variete = $_POST['pagesize_variete'];
        $page_accession = $_POST['page_accession'];
        $pagesize_accession = $_POST['pagesize_accession'];
        $tri_espece_classname = $_POST['tri_espece_classname'];
        $tri_espece_section = $_POST['tri_espece_section'];
        $tri_espece_colone = $_POST['tri_espece_colone'];
        $tri_variete_classname = $_POST['tri_variete_classname'];
        $tri_variete_section = $_POST['tri_variete_section'];
        $tri_variete_colone = $_POST['tri_variete_colone'];
        $tri_accession_classname = $_POST['tri_accession_classname'];
        $tri_accession_section = $_POST['tri_accession_section'];
        $tri_accession_colone = $_POST['tri_accession_colone'];
        $section = $_GET['section'];
        $code = $_GET['code'];
        $dataString = 'search=' . $search_complet . '&case_s=' . $case_s . '&model=' . $model . '&langue=' . $langue . '&page_espece=' . $page_espece . '&pagesize_espece=' . $pagesize_espece . '&page_variete=' . $page_variete . '&pagesize_variete=' . $pagesize_variete . '&page_accession=' . $page_accession . '&pagesize_accession=' . $pagesize_accession . '&tri_espece_classname=' . $tri_espece_classname . '&tri_espece_section=' . $tri_espece_section . '&tri_espece_colone=' . $tri_espece_colone . '&tri_variete_classname=' . $tri_variete_classname . '&tri_variete_section=' . $tri_variete_section . '&tri_variete_colone=' . $tri_variete_colone . '&tri_accession_classname=' . $tri_accession_classname . '&tri_accession_section=' . $tri_accession_section . '&tri_accession_colone=' . $tri_accession_colone;
        $resultat = $DAO->login_resultat_ficher($username, $password, $section, $code, $dataString);
        echo json_encode($resultat);
        break;
    case "login_resultat":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $username = $_GET['nom'];
        $password = $_GET['password'];
        $search_complet = $_POST['search'];
        $case_s = $_POST['case_s'];
        $model = $_POST['model'];
        $langue = $_POST['langue_value'];
        $page_espece = $_POST['page_espece'];
        $pagesize_espece = $_POST['pagesize_espece'];
        $page_variete = $_POST['page_variete'];
        $pagesize_variete = $_POST['pagesize_variete'];
        $page_accession = $_POST['page_accession'];
        $pagesize_accession = $_POST['pagesize_accession'];
        $tri_espece_classname = $_POST['tri_espece_classname'];
        $tri_espece_section = $_POST['tri_espece_section'];
        $tri_espece_colone = $_POST['tri_espece_colone'];
        $tri_variete_classname = $_POST['tri_variete_classname'];
        $tri_variete_section = $_POST['tri_variete_section'];
        $tri_variete_colone = $_POST['tri_variete_colone'];
        $tri_accession_classname = $_POST['tri_accession_classname'];
        $tri_accession_section = $_POST['tri_accession_section'];
        $tri_accession_colone = $_POST['tri_accession_colone'];
        $dataString = 'search=' . $search_complet . '&case_s=' . $case_s . '&model=' . $model . '&langue=' . $langue . '&page_espece=' . $page_espece . '&pagesize_espece=' . $pagesize_espece . '&page_variete=' . $page_variete . '&pagesize_variete=' . $pagesize_variete . '&page_accession=' . $page_accession . '&pagesize_accession=' . $pagesize_accession . '&tri_espece_classname=' . $tri_espece_classname . '&tri_espece_section=' . $tri_espece_section . '&tri_espece_colone=' . $tri_espece_colone . '&tri_variete_classname=' . $tri_variete_classname . '&tri_variete_section=' . $tri_variete_section . '&tri_variete_colone=' . $tri_variete_colone . '&tri_accession_classname=' . $tri_accession_classname . '&tri_accession_section=' . $tri_accession_section . '&tri_accession_colone=' . $tri_accession_colone;
        $resultat = $DAO->login_resultat($username, $password, $dataString);
        echo json_encode($resultat);
        break;
    case "login_resultat_avance":
        $username = $_GET['nom'];
        $password = $_GET['password'];
        $dataString_avance = str_replace("*", "&", $_POST['dataString_avance']);
        $resultat = $DAO->login_resultat($username, $password, $dataString_avance);
        echo json_encode($resultat);

        break;
    case "listeDeroulante":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $champ = $_POST['champ'];
        $langue = $_SESSION['language_Vigne'];
        $id_number = $_POST['id_number'];
        $resultat = $DAO->listeDeroulante($champ, $langue, $id_number);
        echo json_encode($resultat);
        break;
    case "list_user":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $resultat = $DAO->list_user();
        echo json_encode($resultat);
        break;
    case "checkLogin_Fiche":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $search_complet = $_POST['search'];
        $case_s = $_POST['case_s'];
        $model = $_POST['model'];
        $langue = $_POST['langue_value'];
        $page_espece = $_POST['page_espece'];
        $pagesize_espece = $_POST['pagesize_espece'];
        $page_variete = $_POST['page_variete'];
        $pagesize_variete = $_POST['pagesize_variete'];
        $page_accession = $_POST['page_accession'];
        $pagesize_accession = $_POST['pagesize_accession'];
        $tri_espece_classname = $_POST['tri_espece_classname'];
        $tri_espece_section = $_POST['tri_espece_section'];
        $tri_espece_colone = $_POST['tri_espece_colone'];
        $tri_variete_classname = $_POST['tri_variete_classname'];
        $tri_variete_section = $_POST['tri_variete_section'];
        $tri_variete_colone = $_POST['tri_variete_colone'];
        $tri_accession_classname = $_POST['tri_accession_classname'];
        $tri_accession_section = $_POST['tri_accession_section'];
        $tri_accession_colone = $_POST['tri_accession_colone'];
        $code = $_GET['code'];
        $section = $_GET['section'];
        $dataString = 'search=' . $search_complet . '&case_s=' . $case_s . '&model=' . $model . '&langue=' . $langue . '&page_espece=' . $page_espece . '&pagesize_espece=' . $pagesize_espece . '&page_variete=' . $page_variete . '&pagesize_variete=' . $pagesize_variete . '&page_accession=' . $page_accession . '&pagesize_accession=' . $pagesize_accession . '&tri_espece_classname=' . $tri_espece_classname . '&tri_espece_section=' . $tri_espece_section . '&tri_espece_colone=' . $tri_espece_colone . '&tri_variete_classname=' . $tri_variete_classname . '&tri_variete_section=' . $tri_variete_section . '&tri_variete_colone=' . $tri_variete_colone . '&tri_accession_classname=' . $tri_accession_classname . '&tri_accession_section=' . $tri_accession_section . '&tri_accession_colone=' . $tri_accession_colone;
        if (!isset($_SESSION['codePersonne'])) {
            $statue = 1;
        } else {
            $statue = 2;
        }
        if (isset($_SESSION['language_Vigne'])) {
            $langue = $_SESSION['language_Vigne'];
        } else {
            $langue = 'FR';
        }
        $res = array('dataString' => $dataString, 'statue' => $statue, 'langue' => $langue, 'code' => $code, 'section' => $section);
        $resultat = array('res' => $res);
        echo json_encode($resultat);
        break;
    case "checkLogin":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $search_complet = $_POST['search'];
        $case_s = $_POST['case_s'];
        $model = $_POST['model'];
        $langue = $_POST['langue_value'];
        $page_espece = $_POST['page_espece'];
        $pagesize_espece = $_POST['pagesize_espece'];
        $page_variete = $_POST['page_variete'];
        $pagesize_variete = $_POST['pagesize_variete'];
        $page_accession = $_POST['page_accession'];
        $pagesize_accession = $_POST['pagesize_accession'];
        $tri_espece_classname = $_POST['tri_espece_classname'];
        $tri_espece_section = $_POST['tri_espece_section'];
        $tri_espece_colone = $_POST['tri_espece_colone'];
        $tri_variete_classname = $_POST['tri_variete_classname'];
        $tri_variete_section = $_POST['tri_variete_section'];
        $tri_variete_colone = $_POST['tri_variete_colone'];
        $tri_accession_classname = $_POST['tri_accession_classname'];
        $tri_accession_section = $_POST['tri_accession_section'];
        $tri_accession_colone = $_POST['tri_accession_colone'];
        $dataString = 'search=' . $search_complet . '&case_s=' . $case_s . '&model=' . $model . '&langue=' . $langue . '&page_espece=' . $page_espece . '&pagesize_espece=' . $pagesize_espece . '&page_variete=' . $page_variete . '&pagesize_variete=' . $pagesize_variete . '&page_accession=' . $page_accession . '&pagesize_accession=' . $pagesize_accession . '&tri_espece_classname=' . $tri_espece_classname . '&tri_espece_section=' . $tri_espece_section . '&tri_espece_colone=' . $tri_espece_colone . '&tri_variete_classname=' . $tri_variete_classname . '&tri_variete_section=' . $tri_variete_section . '&tri_variete_colone=' . $tri_variete_colone . '&tri_accession_classname=' . $tri_accession_classname . '&tri_accession_section=' . $tri_accession_section . '&tri_accession_colone=' . $tri_accession_colone;
        if (!isset($_SESSION['codePersonne'])) {
            $statue = 1;
        } else {
            $statue = 2;
        }
        if (isset($_SESSION['language_Vigne'])) {
            $langue = $_SESSION['language_Vigne'];
        } else {
            $langue = 'FR';
        }
        $res = array('dataString' => $dataString, 'statue' => $statue, 'langue' => $langue);
        $resultat = array('res' => $res);
        echo json_encode($resultat);
        break;
    case "checkLogin_avance":
        $dataString = $_POST['dataString_stocker'];
        if (!isset($_SESSION['codePersonne'])) {
            $statue = 1;
        } else {
            $statue = 2;
        }
        if (isset($_SESSION['language_Vigne'])) {
            $langue = $_SESSION['language_Vigne'];
        } else {
            $langue = 'FR';
        }
        $res = array('dataString' => $dataString, 'statue' => $statue, 'langue' => $langue);
        $resultat = array('res' => $res);
        echo json_encode($resultat);
        break;
    case "cate9_var":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->genetique($code, $page, $pagesize, $langue, $section, $colone, $tri, 'Variete');
        echo json_encode($resultat);
        break;
    case "cate8_var":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_bibliographie = $_POST['curpage'];
        $pagesize_bibliographie = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $bibliographie = $DAO->bibliographie($code, $page_bibliographie, $pagesize_bibliographie, $langue, $section, $colone, $tri, 'Variete');
        $resultat = array('bibliographie' => $bibliographie);
        echo json_encode($resultat);
        break;
    case "cate8_acc":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->genetique($code, $page, $pagesize, $langue, $section, $colone, $tri, 'Accession');
        echo json_encode($resultat);
        break;
    case "cate7_var":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $curpage_doc = $_POST['curpage_doc'];
        $pagesize_doc = $_POST['pagesize_doc'];
        $langue = $_SESSION['language_Vigne'];
        $tri_doc_classname = $_POST['tri_doc_classname'];
        $tri_doc_section = $_POST['tri_doc_section'];
        $tri_doc_colone = $_POST['tri_doc_colone'];
        $tri_doc = array('classname' => $tri_doc_classname, 'section' => $tri_doc_section, 'colone' => $tri_doc_colone);
        $curpage_lien = $_POST['curpage_lien'];
        $pagesize_lien = $_POST['pagesize_lien'];
        $tri_lien_classname = $_POST['tri_lien_classname'];
        $tri_lien_section = $_POST['tri_lien_section'];
        $tri_lien_colone = $_POST['tri_lien_colone'];
        $tri_lien = array('classname' => $tri_lien_classname, 'section' => $tri_lien_section, 'colone' => $tri_lien_colone);
        $curpage_bibliographie = $_POST['curpage_bibliographie'];
        $pagesize_bibliographie = $_POST['pagesize_bibliographie'];
        $tri_bibliographie_classname = $_POST['tri_bibliographie_classname'];
        $tri_bibliographie_section = $_POST['tri_bibliographie_section'];
        $tri_bibliographie_colone = $_POST['tri_bibliographie_colone'];
        $tri_bibliographie = array('classname' => $tri_bibliographie_classname, 'section' => $tri_bibliographie_section, 'colone' => $tri_bibliographie_colone);
        // $resultat=$DAO->cate7_var($code,$curpage_doc,$pagesize_doc,$langue,$tri_doc_section,$tri_doc_colone,$tri_doc,$curpage_lien,$pagesize_lien,$tri_lien_section,$tri_lien_colone,$tri_lien);
        // echo json_encode($resultat);
        $phototheque = $DAO->phototheque($code, $langue, 'Variete');
        $lien_site = $DAO->lien_site($code, $langue, $curpage_lien, $pagesize_lien, $tri_lien_section, $tri_lien_colone, $tri_lien, 'Variete');
        $doc = $DAO->doc($code, $langue, $curpage_doc, $pagesize_doc, $tri_doc_section, $tri_doc_colone, $tri_doc, 'Variete');
        $bibliographie = $DAO->bibliographie($code, $curpage_bibliographie, $pagesize_bibliographie, $langue, $section, $colone, $tri_bibliographie, 'Variete');
        //$resultat=array('phototheque'=>$phototheque,'lien_site'=>$lien_site,'doc'=>$doc);
        $resultat = array('phototheque' => $phototheque, 'lien_site' => $lien_site, 'doc' => $doc, 'bibliographie' => $bibliographie);
        echo json_encode($resultat);
        break;
    case "cate7_acc":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_bibliographie = $_POST['curpage'];
        $pagesize_bibliographie = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $bibliographie = $DAO->bibliographie($code, $page_bibliographie, $pagesize_bibliographie, $langue, $section, $colone, $tri, 'Accession');
        $resultat = array('bibliographie' => $bibliographie);
        echo json_encode($resultat);
        break;
    case "cate6_var":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_sanitaire = $_POST['curpage'];
        $pagesize_sanitaire = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->sanitaire($code, $page_sanitaire, $pagesize_sanitaire, $langue, $section, $colone, $tri, 'Variete');
        echo json_encode($resultat);
        break;
    case "cate6_acc":
        $code = $_POST['code'];
        $curpage_doc = $_POST['curpage_doc'];
        $pagesize_doc = $_POST['pagesize_doc'];
        $langue = $_SESSION['language_Vigne'];
        $tri_doc_classname = $_POST['tri_doc_classname'];
        $tri_doc_section = $_POST['tri_doc_section'];
        $tri_doc_colone = $_POST['tri_doc_colone'];
        $tri_doc = array('classname' => $tri_doc_classname, 'section' => $tri_doc_section, 'colone' => $tri_doc_colone);
        $curpage_lien = $_POST['curpage_lien'];
        $pagesize_lien = $_POST['pagesize_lien'];
        $tri_lien_classname = $_POST['tri_lien_classname'];
        $tri_lien_section = $_POST['tri_lien_section'];
        $tri_lien_colone = $_POST['tri_lien_colone'];
        $tri_lien = array('classname' => $tri_lien_classname, 'section' => $tri_lien_section, 'colone' => $tri_lien_colone);
        $curpage_bibliographie = $_POST['curpage_bibliographie'];
        $pagesize_bibliographie = $_POST['pagesize_bibliographie'];
        $tri_bibliographie_classname = $_POST['tri_bibliographie_classname'];
        $tri_bibliographie_section = $_POST['tri_bibliographie_section'];
        $tri_bibliographie_colone = $_POST['tri_bibliographie_colone'];
        $tri_bibliographie = array('classname' => $tri_bibliographie_classname, 'section' => $tri_bibliographie_section, 'colone' => $tri_bibliographie_colone);
        // $resultat=$DAO->cate7_var($code,$curpage_doc,$pagesize_doc,$langue,$tri_doc_section,$tri_doc_colone,$tri_doc,$curpage_lien,$pagesize_lien,$tri_lien_section,$tri_lien_colone,$tri_lien);
        // echo json_encode($resultat);
        $phototheque = $DAO->phototheque($code, $langue, 'Accession');
        $lien_site = $DAO->lien_site($code, $langue, $curpage_lien, $pagesize_lien, $tri_lien_section, $tri_lien_colone, $tri_lien, 'Accession');
        $doc = $DAO->doc($code, $langue, $curpage_doc, $pagesize_doc, $tri_doc_section, $tri_doc_colone, $tri_doc, 'Accession');
        $bibliographie = $DAO->bibliographie($code, $curpage_bibliographie, $pagesize_bibliographie, $langue, $section, $colone, $tri_bibliographie, 'Accession');
        $resultat = array('phototheque' => $phototheque, 'lien_site' => $lien_site, 'doc' => $doc, 'bibliographie' => $bibliographie);
        echo json_encode($resultat);
        break;
    case "cate5_acc":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_sanitaire = $_POST['curpage'];
        $pagesize_sanitaire = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->sanitaire($code, $page_sanitaire, $pagesize_sanitaire, $langue, $section, $colone, $tri, 'Accession');
        echo json_encode($resultat);
        break;
    case "cate5_var":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_emplacement = $_POST['curpage'];
        $pagesize_emplacement = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->emplacement($code, $page_emplacement, $pagesize_emplacement, $langue, $section, $colone, $tri, 'Variete');
        echo json_encode($resultat);
        break;
    case "cate4_acc":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_emplacement = $_POST['curpage'];
        $pagesize_emplacement = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->emplacement($code, $page_emplacement, $pagesize_emplacement, $langue, $section, $colone, $tri, 'Accession');
        echo json_encode($resultat);
        break;
    case "cate4_var":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_accession = $_POST['curpage'];
        $pagesize_accession = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->accession($code, $page_accession, $pagesize_accession, $langue, $section, $colone, $tri, 'Variete');
        echo json_encode($resultat);
        break;
    case "cate3_esp":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_accession = $_POST['curpage'];
        $pagesize_accession = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->accession($code, $page_accession, $pagesize_accession, $langue, $section, $colone, $tri, 'Espece');
        echo json_encode($resultat);
        break;
    case "cate3_var":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->morphologique($code, $page, $pagesize, $langue, $section, $colone, $tri, "Variete");
        echo json_encode($resultat);
        break;
    case "cate3_acc":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->morphologique($code, $page, $pagesize, $langue, $section, $colone, $tri, "Accession");
        echo json_encode($resultat);
        break;
    case "cate2_esp":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page_variete = $_POST['curpage'];
        $pagesize_variete = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->variete($code, $page_variete, $pagesize_variete, $langue, $section, $colone, $tri);
        echo json_encode($resultat);
        break;
    case "cate2_var":

        $code = $_POST['code'];
        $page = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->aptitude($code, $page, $pagesize, $langue, $section, $colone, $tri, 'Variete');
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        echo json_encode($resultat);
        break;
    case "cate2_acc":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $page = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $classname = $_POST['classname'];
        $section = $_POST['section'];
        $colone = $_POST['colone'];
        $tri = array('classname' => $classname, 'section' => $section, 'colone' => $colone);
        $resultat = $DAO->aptitude($code, $page, $pagesize, $langue, $section, $colone, $tri, 'Accession');
        echo json_encode($resultat);
        break;
    case "cate1_var":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $langue = $_SESSION['language_Vigne'];
        $resultat = $DAO->detail_var($code, $langue);
        echo json_encode($resultat);
        break;
    case "cate1_acc":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $code = $_POST['code'];
        $langue = $_SESSION['language_Vigne'];
        $resultat = $DAO->detail_acc($code, $langue);
        echo json_encode($resultat);
        break;
    case "back_resultat":
        echo json_encode(array("ok" => "ok", "function" => $fun));
        // $section=$_GET['section'];
        // $code=$_GET['code'];
        // $search_complet=$_POST['search'];
        // $case_s=$_POST['case_s'];
        // $model=$_POST['model'];
        // $langue=$_POST['langue_value'];
        // $page_espece=$_POST['page_espece'];
        // $pagesize_espece=$_POST['pagesize_espece'];
        // $page_variete=$_POST['page_variete'];
        // $pagesize_variete=$_POST['pagesize_variete'];
        // $page_accession=$_POST['page_accession'];
        // $pagesize_accession=$_POST['pagesize_accession'];
        // $tri_espece_classname=$_POST['tri_espece_classname'];
        // $tri_espece_section=$_POST['tri_espece_section'];
        // $tri_espece_colone=$_POST['tri_espece_colone'];
        // $tri_variete_classname=$_POST['tri_variete_classname'];
        // $tri_variete_section=$_POST['tri_variete_section'];
        // $tri_variete_colone=$_POST['tri_variete_colone'];
        // $tri_accession_classname=$_POST['tri_accession_classname'];
        // $tri_accession_section=$_POST['tri_accession_section'];
        // $tri_accession_colone=$_POST['tri_accession_colone'];
        // $tri_espece=array("classname"=>$tri_espece_classname,"section"=>$tri_espece_section,"colone"=>$tri_espece_colone);
        // $tri_variete=array("classname"=>$tri_variete_classname,"section"=>$tri_variete_section,"colone"=>$tri_variete_colone);
        // $tri_accession=array("classname"=>$tri_accession_classname,"section"=>$tri_accession_section,"colone"=>$tri_accession_colone);
        // $page_espece_json=array("page_espece"=>$page_espece,"pagesize_espece"=>$pagesize_espece);
        // $page_variete_json=array("page_variete"=>$page_variete,"pagesize_variete"=>$pagesize_variete);
        // $page_accession_json=array("page_accession"=>$page_accession,"pagesize_accession"=>$pagesize_accession);
        // $resultat=array("search"=>$search_complet,"case_s"=>$case_s,"model"=>$model,"langue"=>$langue,"tri_espece"=>$tri_espece,"tri_variete"=>$tri_variete,"tri_accession"=>$tri_accession,"page_espece_json"=>$page_espece_json,"page_variete_json"=>$page_variete_json,"page_accession_json"=>$page_accession_json);
        // echo json_encode($resultat);
        break;
    case "searchSimple":
        $search = (suppr_accents($_POST['search']));
        $_SESSION['search'] = $search;
        $search_complet = ($_POST['search']);
        $_SESSION['searchcomplet'] = $search_complet;
        $case_s = $_POST['case_s'];
        $_SESSION['typerecherche'] = $case_s;
        $model = $_POST['model'];
        $langue = $_POST['langue'];
        //$langue=$_SESSION['language_Vigne'];
        $page_espece = $_POST['page_espece'];
        $pagesize_espece = $_POST['pagesize_espece'];
        $page_variete = $_POST['page_variete'];
        $pagesize_variete = $_POST['pagesize_variete'];
        $page_accession = $_POST['page_accession'];
        $pagesize_accession = $_POST['pagesize_accession'];
        $tri_espece_classname = $_POST['tri_espece_classname'];
        $tri_espece_section = $_POST['tri_espece_section'];
        $tri_espece_colone = $_POST['tri_espece_colone'];
        $tri_variete_classname = $_POST['tri_variete_classname'];
        $tri_variete_section = $_POST['tri_variete_section'];
        $tri_variete_colone = $_POST['tri_variete_colone'];
        $tri_accession_classname = $_POST['tri_accession_classname'];
        $tri_accession_section = $_POST['tri_accession_section'];
        $tri_accession_colone = $_POST['tri_accession_colone'];
        $resultat = $DAO->searchSimple($search, $search_complet, $case_s, $model, $langue, $page_espece, $pagesize_espece, $page_variete, $pagesize_variete, $page_accession, $pagesize_accession, $tri_espece_classname, $tri_espece_section, $tri_espece_colone, $tri_variete_classname, $tri_variete_section, $tri_variete_colone, $tri_accession_classname, $tri_accession_section, $tri_accession_colone);
        echo json_encode($resultat);

        //print_r($resultat);
        break;
    case "ficher":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $section = $_GET['section'];
        $code = $_GET['code'];

        $search_complet = $_POST['search'];
        $case_s = $_POST['case_s'];
        $model = $_POST['model'];
        $langue = $_POST['langue'];
        $page_espece = $_POST['page_espece'];
        $pagesize_espece = $_POST['pagesize_espece'];
        $page_variete = $_POST['page_variete'];
        $pagesize_variete = $_POST['pagesize_variete'];
        $page_accession = $_POST['page_accession'];
        $pagesize_accession = $_POST['pagesize_accession'];
        $tri_espece_classname = $_POST['tri_espece_classname'];
        $tri_espece_section = $_POST['tri_espece_section'];
        $tri_espece_colone = $_POST['tri_espece_colone'];
        $tri_variete_classname = $_POST['tri_variete_classname'];
        $tri_variete_section = $_POST['tri_variete_section'];
        $tri_variete_colone = $_POST['tri_variete_colone'];
        $tri_accession_classname = $_POST['tri_accession_classname'];
        $tri_accession_section = $_POST['tri_accession_section'];
        $tri_accession_colone = $_POST['tri_accession_colone'];
        //$langue=$_SESSION['language_Vigne'];
        $resultat = $DAO->ficher($section, $code, $search_complet, $case_s, $model, $langue, $page_espece, $pagesize_espece, $page_variete, $pagesize_variete, $page_accession, $pagesize_accession, $tri_espece_classname, $tri_espece_section, $tri_espece_colone, $tri_variete_classname, $tri_variete_section, $tri_variete_colone, $tri_accession_classname, $tri_accession_section, $tri_accession_colone);
        echo json_encode($resultat);
        break;
    case "fichier":
        $section = $_GET['section'];
        $code = $_GET['code'];
        $langue = "FR";
        $resultat = $DAO->fichier($section, $code, $langue);
        echo json_encode($resultat);
        break;
    case "searchAdevance":
        // echo json_encode(array("ok"=>"ok","function"=>$fun));
        $parametre = array();
        $Variete = array();
        $Accession = array();
        $Espece = array();
        $Emplacement = array();
        $Sanitaire = array();
        $Morphologique = array();
        $Bibliographie = array();
        $Phototheque = array();
        $Documentation = array();
        $Partenaire = array();
        $Aptitude = array();
        $Genetique = array();
        $i = -1;
        foreach ($_POST as $key => $value) {
            $$key = $value;
            $parametre['' . $key] = $value;
            $i++;
            $n = $i / 4;
            $name = 'section_' . $n;
            if ($$name == 'Variete') {
                $Variete[] = $n;
            }
            if ($$name == 'Accession') {
                $Accession[] = $n;
            }
            if ($$name == 'Espece') {
                $Espece[] = $n;
            }
            if ($$name == 'Emplacement') {
                $Emplacement[] = $n;
            }
            if ($$name == 'Sanitaire') {
                $Sanitaire[] = $n;
            }
            if ($$name == 'Morphologique') {
                $Morphologique[] = $n;
            }
            if ($$name == 'Aptitude') {
                $Aptitude[] = $n;
            }
            if ($$name == 'Bibliographie') {
                $Bibliographie[] = $n;
            }
            if ($$name == 'Documentation') {
                $Documentation[] = $n;
            }
            if ($$name == 'Phototheque') {
                $Phototheque[] = $n;
            }
            if ($$name == 'Genetique') {
                $Genetique[] = $n;
            }
            if ($$name == 'Partenaire') {
                $Partenaire[] = $n;
            }
        }
        $langue = $_SESSION['language_Vigne'];
        $parametre['i'] = $i;
        $parametre['Variete'] = $Variete;
        $parametre['Accession'] = $Accession;
        $parametre['Espece'] = $Espece;
        $parametre['Emplacement'] = $Emplacement;
        $parametre['Sanitaire'] = $Sanitaire;
        $parametre['Morphologique'] = $Morphologique;
        $parametre['Aptitude'] = $Aptitude;
        $parametre['Bibliographie'] = $Bibliographie;
        $parametre['Phototheque'] = $Phototheque;
        $parametre['Documentation'] = $Documentation;
        $parametre['Partenaire'] = $Partenaire;
        $parametre['Genetique'] = $Genetique;
        $parametre['langue'] = $langue;
        $resultat = $DAO->searchAdevance($parametre);
        echo json_encode($resultat);
        break;
    case "charge_champ_Morphologique":
        //$langue=$_POST['langue_value'];
        $langue = $_SESSION['language_Vigne'];
        $resultat = $DAO->charge_champ_Morphologique($langue);
        echo $resultat;
        break;
    case "charge_champ_Genetique":
        $langue = $_POST['langue_value'];
        $resultat = $DAO->charge_champ_Genetique($langue);
        echo $resultat;
        break;
    case "listeLien":
        $code = $_POST['code'];
        $langue = $_SESSION['language_Vigne'];
        $curpage_lien = $_POST['curpage'];
        $pagesize_lien = $_POST['pagesize'];
        $tri_lien_classname = $_POST['classname'];
        $tri_lien_section = $_POST['section'];
        $tri_lien_colone = $_POST['colone'];
        $sectionfiche = $_POST['sectionfiche'];
        $tri_lien = array('classname' => $tri_lien_classname, 'section' => $tri_lien_section, 'colone' => $tri_lien_colone);
        $lien_site = $DAO->lien_site($code, $langue, $curpage_lien, $pagesize_lien, $tri_lien_section, $tri_lien_colone, $tri_lien, $sectionfiche);
        $resultat = array('lien_site' => $lien_site);
        echo json_encode($resultat);
        break;
    case "listeDoc":
        $code = $_POST['code'];
        $curpage_doc = $_POST['curpage'];
        $pagesize_doc = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $tri_doc_classname = $_POST['classname'];
        $tri_doc_section = $_POST['section'];
        $tri_doc_colone = $_POST['colone'];
        $sectionfiche = $_POST['sectionfiche'];
        $tri_doc = array('classname' => $tri_doc_classname, 'section' => $tri_doc_section, 'colone' => $tri_doc_colone);
        $doc = $DAO->doc($code, $langue, $curpage_doc, $pagesize_doc, $tri_doc_section, $tri_doc_colone, $tri_doc, $sectionfiche);
        $resultat = array('doc' => $doc);
        echo json_encode($resultat);
        break;
    case "searchAdvance_requete":
        $section = $_POST['section'];
        $langue = $_POST['langue'];
        //$langue=$_SESSION['language_Vigne'];
        $sql_possible = $_POST['sql_possible'];
        $sql_total = $_POST['sql_total'];
        $pagesize = $_POST['pagesize'];
        $curpage = $_POST['curpage'];
        $tri_classname = $_POST['tri_classname'];
        $tri_section = $_POST['tri_section'];
        $tri_colone = $_POST['tri_colone'];
        $tri = array('classname' => $tri_classname, 'section' => $tri_section, 'colone' => $tri_colone);

        $resultat[$section] = $DAO->requete($sql_total, $sql_possible, $section, $langue, $curpage, $pagesize, $tri_section, $tri_colone);
        $resultat[$section]['tri'] = $tri;
        echo json_encode($resultat);
        break;
    case 'select_change_selection_espece':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Espece']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeEsp = array();
        foreach ($_SESSION['selection']['Espece'] as $value) {
            array_push($TabCodeEsp, $value);
        }
        $TabCodeEsp = "'" . implode("','", $TabCodeEsp) . "'";
        $Espece_Contents = $DAO->espece_selection($TabCodeEsp);

        /* foreach($_SESSION['selection']['Espece'] as $value){
          $content=$DAO->espece_selection($value);
          array_push($Espece_Contents,$content);
          } */
        //tableau de code => espece_selection(tab de code) => retourne un tableau de code qui est espece_contents.
        $Espece['contents'] = $Espece_Contents;
        $Espece['curpage'] = $curpage;
        $Espece['pagesize'] = $pagesize;
        $Espece['pagetotal'] = $pagetotal;
        $Espece['startpage'] = $startpage;
        //echo json_encode(array("ok"=>"ok","function"=>$fun));
        echo json_encode(array("Espece" => $Espece));
        break;
    case 'select_change_selection_listvariete':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $pagetotal = ceil(count($_SESSION['selection']['Variete']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeVar = array();
        foreach ($_SESSION['selection']['Variete'] as $value) {
            array_push($TabCodeVar, $value);
        }
        $TabCodeVar = "'" . implode("','", $TabCodeVar) . "'";
        $Variete_Contents = $DAO->variete_selection($TabCodeVar, $langue);
        $Variete['contents'] = $Variete_Contents;
        $Variete['curpage'] = $curpage;
        $Variete['pagesize'] = $pagesize;
        $Variete['pagetotal'] = $pagetotal;
        $Variete['startpage'] = $startpage;
        echo json_encode(array("Variete" => $Variete));
        break;
    case 'select_change_selection_listaccession':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $langue = $_SESSION['language_Vigne'];
        $pagetotal = ceil(count($_SESSION['selection']['Accession']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeAcc = array();
        foreach ($_SESSION['selection']['Accession'] as $value) {
            array_push($TabCodeAcc, $value);
        }
        $TabCodeAcc = "'" . implode("','", $TabCodeAcc) . "'";
        $Accession_Contents = $DAO->accession_selection($TabCodeAcc, $langue);
        $Accession['contents'] = $Accession_Contents;
        $Accession['curpage'] = $curpage;
        $Accession['pagesize'] = $pagesize;
        $Accession['pagetotal'] = $pagetotal;
        $Accession['startpage'] = $startpage;
        echo json_encode(array("Accession" => $Accession));
        break;
    case 'select_change_selection_listemplacement':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Emplacement']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeEmp = array();
        foreach ($_SESSION['selection']['Emplacement'] as $value) {
            array_push($TabCodeEmp, $value);
        }
        $TabCodeEmp = "'" . implode("','", $TabCodeEmp) . "'";
        $Emplacement_Contents = $DAO->emplacement_selection($TabCodeEmp);
        $Emplacement['contents'] = $Emplacement_Contents;
        $Emplacement['curpage'] = $curpage;
        $Emplacement['pagesize'] = $pagesize;
        $Emplacement['pagetotal'] = $pagetotal;
        $Emplacement['startpage'] = $startpage;
        echo json_encode(array("Emplacement" => $Emplacement));
        break;
    case 'select_change_selection_listsanitaire':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Sanitaire']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeSan = array();
        foreach ($_SESSION['selection']['Sanitaire'] as $value) {
            array_push($TabCodeSan, $value);
        }
        $TabCodeSan = "'" . implode("','", $TabCodeSan) . "'";
        $Sanitaire_Contents = $DAO->sanitaire_selection($TabCodeSan);
        $Sanitaire['contents'] = $Sanitaire_Contents;
        $Sanitaire['curpage'] = $curpage;
        $Sanitaire['pagesize'] = $pagesize;
        $Sanitaire['pagetotal'] = $pagetotal;
        $Sanitaire['startpage'] = $startpage;
        echo json_encode(array("Sanitaire" => $Sanitaire));
        break;
    case 'select_change_selection_listdescription':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Morphologique']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeMor = array();
        foreach ($_SESSION['selection']['Morphologique'] as $value) {
            array_push($TabCodeMor, $value);
        }
        $TabCodeMor = "'" . implode("','", $TabCodeMor) . "'";
        $Morphologique_Contents = $DAO->morphologique_selection($TabCodeMor);
        $Morphologique['contents'] = $Morphologique_Contents;
        $Morphologique['curpage'] = $curpage;
        $Morphologique['pagesize'] = $pagesize;
        $Morphologique['pagetotal'] = $pagetotal;
        $Morphologique['startpage'] = $startpage;
        echo json_encode(array("Morphologique" => $Morphologique));
        break;
    case 'select_change_selection_listaptitude':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Aptitude']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeApt = array();
        foreach ($_SESSION['selection']['Aptitude'] as $value) {
            array_push($TabCodeApt, $value);
        }
        $TabCodeApt = "'" . implode("','", $TabCodeApt) . "'";
        $Aptitude_Contents = $DAO->aptitude_selection($TabCodeApt);
        $Aptitude['contents'] = $Aptitude_Contents;
        $Aptitude['curpage'] = $curpage;
        $Aptitude['pagesize'] = $pagesize;
        $Aptitude['pagetotal'] = $pagetotal;
        $Aptitude['startpage'] = $startpage;
        echo json_encode(array("Aptitude" => $Aptitude));
        break;
    case 'select_change_selection_listgenetique':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Genetique']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeGen = array();
        foreach ($_SESSION['selection']['Genetique'] as $value) {
            array_push($TabCodeGen, $value);
        }
        $TabCodeGen = "'" . implode("','", $TabCodeGen) . "'";
        $Genetique_Contents = $DAO->genetique_selection($TabCodeGen);
        $Genetique['contents'] = $Genetique_Contents;
        $Genetique['curpage'] = $curpage;
        $Genetique['pagesize'] = $pagesize;
        $Genetique['pagetotal'] = $pagetotal;
        $Genetique['startpage'] = $startpage;
        echo json_encode(array("Genetique" => $Genetique));
        break;
    case 'select_change_selection_listdoc':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Documentation']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeDoc = array();
        foreach ($_SESSION['selection']['Documentation'] as $value) {
            array_push($TabCodeDoc, $value);
        }
        $TabCodeDoc = "'" . implode("','", $TabCodeDoc) . "'";
        $Documentation_Contents = $DAO->documentation_selection($TabCodeDoc);
        $Documentation['contents'] = $Documentation_Contents;
        $Documentation['curpage'] = $curpage;
        $Documentation['pagesize'] = $pagesize;
        $Documentation['pagetotal'] = $pagetotal;
        $Documentation['startpage'] = $startpage;
        echo json_encode(array("Documentation" => $Documentation));
        break;
    case 'select_change_selection_listbibliographie':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Bibliographie']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeBib = array();
        foreach ($_SESSION['selection']['Bibliographie'] as $value) {
            array_push($TabCodeBib, $value);
        }
        $TabCodeBib = "'" . implode("','", $TabCodeBib) . "'";
        $Bibliographie_Contents = $DAO->bibliographie_selection($TabCodeBib);
        $Bibliographie['contents'] = $Bibliographie_Contents;
        $Bibliographie['curpage'] = $curpage;
        $Bibliographie['pagesize'] = $pagesize;
        $Bibliographie['pagetotal'] = $pagetotal;
        $Bibliographie['startpage'] = $startpage;
        echo json_encode(array("Bibliographie" => $Bibliographie));
        break;
    case 'select_change_selection_listPartenaire':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Partenaire']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodePar = array();
        foreach ($_SESSION['selection']['Partenaire'] as $value) {
            array_push($TabCodePar, $value);
        }
        $TabCodePar = "'" . implode("','", $TabCodePar) . "'";
        $Partenaire_Contents = $DAO->partenaire_selection($TabCodePar);
        $Partenaire['contents'] = $Partenaire_Contents;
        $Partenaire['curpage'] = $curpage;
        $Partenaire['pagesize'] = $pagesize;
        $Partenaire['pagetotal'] = $pagetotal;
        $Partenaire['startpage'] = $startpage;
        echo json_encode(array("Partenaire" => $Partenaire));
        break;
    case 'select_change_selection_listlien':
        $curpage = $_POST['curpage'];
        $pagesize = $_POST['pagesize'];
        $pagetotal = ceil(count($_SESSION['selection']['Lien']) / $pagesize);
        $startpage = ($curpage - 1) * $pagesize;
        $TabCodeLien = array();
        foreach ($_SESSION['selection']['Lien'] as $value) {
            array_push($TabCodeLien, $value);
        }
        $TabCodeLien = "'" . implode("','", $TabCodeLien) . "'";
        $Lien_Contents = $DAO->lien_selection($TabCodeLien);
        $Lien['contents'] = $Lien_Contents;
        $Lien['curpage'] = $curpage;
        $Lien['pagesize'] = $pagesize;
        $Lien['pagetotal'] = $pagetotal;
        $Lien['startpage'] = $startpage;
        echo json_encode(array("Lien" => $Lien));
        break;
    case 'delete_selection':
        $id = $_POST['id'];
        $section = $_POST['section'];
        for ($i = 0; $i < count($_SESSION['selection'][ucfirst($section)]); $i++) {
            if ($_SESSION['selection'][ucfirst($section)][$i] == $id) {
                unset($_SESSION['selection'][ucfirst($section)][$i]);
            }
        }
        break;
    case 'vide_section':
        $section = $_POST['section'];
        unset($_SESSION['selection'][ucfirst($section)]);
        break;
    case "recuperer_code":
        /*
         * Case qui permet de construire le fil d'arianne avec les différents codes.
         */
        $section = $_POST['section'];
        $code = $_POST['code'];
        if ($section == "variete") {
            $resultat = $DAO->codeEsp($code);
            echo json_encode($resultat);
        } else if ($section == "accession") {
            $resultatVar = $DAO->codeVar($code);
            $resultatEsp = $DAO->codeEsp($resultatVar);
            $resultat = array("CodeEsp" => $resultatEsp, "CodeVar" => $resultatVar);
            echo json_encode($resultat);
        } else {
            $resultatAcc = $DAO->codeAccSec($code, $section);
            $resultatVar = $DAO->codeVarSec($code, $section);
            if ($resultatVar == "" && $resultatAcc != "") {
                $resultatVar = $DAO->codeVar($resultatAcc);
            }
            $resultatEsp = $DAO->codeEsp($resultatVar);
            $resultat = array("CodeEsp" => $resultatEsp, "CodeVar" => $resultatVar, "CodeAcc" => $resultatAcc);
            echo json_encode($resultat);
        }
        break;
}
?>