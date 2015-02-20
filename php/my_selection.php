<?php
	session_start();
	if(isset($_SESSION['selection'])==false){
		$_SESSION['selection']=array();
	}
	if(isset($_SESSION['selection']['Espece'])==FALSE){
		$_SESSION['selection']['Espece']=array();
	}
	if(isset($_SESSION['selection']['Variete'])==FALSE){
		$_SESSION['selection']['Variete']=array();
	}
	if(isset($_SESSION['selection']['Accession'])==FALSE){
		$_SESSION['selection']['Accession']=array();
	}
	if(isset($_SESSION['selection']['Emplacement'])==FALSE){
		$_SESSION['selection']['Emplacement']=array();
	}
	if(isset($_SESSION['selection']['Sanitaire'])==FALSE){
		$_SESSION['selection']['Sanitaire']=array();
	}
	if(isset($_SESSION['selection']['Morphologique'])==FALSE){
		$_SESSION['selection']['Morphologique']=array();
	}
	if(isset($_SESSION['selection']['Aptitude'])==FALSE){
		$_SESSION['selection']['Aptitude']=array();
	}
	if(isset($_SESSION['selection']['Genetique'])==FALSE){
		$_SESSION['selection']['Genetique']=array();
	}
	if(isset($_SESSION['selection']['Phototheque'])==FALSE){
		$_SESSION['selection']['Phototheque']=array();
	}
	if(isset($_SESSION['selection']['Documentation'])==FALSE){
		$_SESSION['selection']['Documentation']=array();
	}
	if(isset($_SESSION['selection']['Bibliographie'])==FALSE){
		$_SESSION['selection']['Bibliographie']=array();
	}
	if(isset($_SESSION['selection']['Partenaire'])==FALSE){
		$_SESSION['selection']['Partenaire']=array();
	}
	if(isset($_SESSION['selection']['Lien'])==FALSE){
		$_SESSION['selection']['Lien']=array();
	}
	
	$dataString=$_POST['dataString'];
	$array_dataString=explode("_",$dataString);
	$section=$array_dataString[0];
	$$section=array();
	for($i=1;$i<count($array_dataString);$i++){
		array_push($$section,$array_dataString[$i]);
	}
	$statue=1;
	
	switch($section){
		case "Espece":
			for($j=0;$j<count($Espece);$j++){
				array_push($_SESSION['selection']['Espece'],$Espece[$j]);
			}
			$_SESSION['selection']['Espece']=array_unique($_SESSION['selection']['Espece']);
		break;
		case "Variete":
			for($j=0;$j<count($Variete);$j++){
				array_push($_SESSION['selection']['Variete'],$Variete[$j]);
				
			}
			$_SESSION['selection']['Variete']=array_unique($_SESSION['selection']['Variete']);
		break;
		case "Accession":
			for($j=0;$j<count($Accession);$j++){
				array_push($_SESSION['selection']['Accession'],$Accession[$j]);
			}
			$_SESSION['selection']['Accession']=array_unique($_SESSION['selection']['Accession']);
		break;
		case "Emplacement":
			for($j=0;$j<count($Emplacement);$j++){
				array_push($_SESSION['selection']['Emplacement'],$Emplacement[$j]);
			}
			$_SESSION['selection']['Emplacement']=array_unique($_SESSION['selection']['Emplacement']);
		break;
		case "Sanitaire":
			for($j=0;$j<count($Sanitaire);$j++){
				array_push($_SESSION['selection']['Sanitaire'],$Sanitaire[$j]);
			}
			$_SESSION['selection']['Sanitaire']=array_unique($_SESSION['selection']['Sanitaire']);
		break;
		case "Morphologique":
			for($j=0;$j<count($Morphologique);$j++){
				array_push($_SESSION['selection']['Morphologique'],$Morphologique[$j]);
			}
			$_SESSION['selection']['Morphologique']=array_unique($_SESSION['selection']['Morphologique']);
		break;
		case "Aptitude":
			for($j=0;$j<count($Aptitude);$j++){
				array_push($_SESSION['selection']['Aptitude'],$Aptitude[$j]);
			}
			$_SESSION['selection']['Aptitude']=array_unique($_SESSION['selection']['Aptitude']);
		break;
		case "Genetique":
			for($j=0;$j<count($Genetique);$j++){
				array_push($_SESSION['selection']['Genetique'],$Genetique[$j]);
			}
			$_SESSION['selection']['Genetique']=array_unique($_SESSION['selection']['Genetique']);
		break;
		case "Phototheque":
			for($j=0;$j<count($Phototheque);$j++){
				array_push($_SESSION['selection']['Phototheque'],$Phototheque[$j]);
			}
			$_SESSION['selection']['Phototheque']=array_unique($_SESSION['selection']['Phototheque']);
		break;
		case "Documentation":
			for($j=0;$j<count($Documentation);$j++){
				array_push($_SESSION['selection']['Documentation'],$Documentation[$j]);
			}
			$_SESSION['selection']['Documentation']=array_unique($_SESSION['selection']['Documentation']);
		break;
		case "Bibliographie":
			for($j=0;$j<count($Bibliographie);$j++){
				array_push($_SESSION['selection']['Bibliographie'],$Bibliographie[$j]);
			}
			$_SESSION['selection']['Bibliographie']=array_unique($_SESSION['selection']['Bibliographie']);
		break;
		case "Partenaire":
			for($j=0;$j<count($Partenaire);$j++){
				array_push($_SESSION['selection']['Partenaire'],$Partenaire[$j]);
			}
			$_SESSION['selection']['Partenaire']=array_unique($_SESSION['selection']['Partenaire']);
		break;
		case "Lien":
			for($j=0;$j<count($Lien);$j++){
				array_push($_SESSION['selection']['Lien'],$Lien[$j]);
			}
			$_SESSION['selection']['Lien']=array_unique($_SESSION['selection']['Lien']);
		break;
	}
	print_r($_SESSION['selection']);
	
?>