<?php

function connexion_bbd(){
	$bd_nom_serveur='mysqlmtp.supagro.inra.fr';
	$bd_login='lacombe3'; // Impossible de se connecter sinon, à cause des mises à jour 15.04 de Ubuntu
	$bd_mot_de_passe='lacombe05';
	$bd_nom_bd='collections_vigne';
	$conn = mysql_connect($bd_nom_serveur,$bd_login,$bd_mot_de_passe);
	if (!$conn){
		die("Ne pas connecte à base de données !" . mysql_error());
	}
	mysql_select_db($bd_nom_bd, $conn);
	mysql_query("set names 'UTF-8'");
}
function deconnexion_bbd(){
	$bd_nom_serveur='mysqlmtp.supagro.inra.fr';
	$bd_login='lacombe3'; // Impossible de se connecter sinon, à cause des mises à jour 15.04 de Ubuntu
	$bd_mot_de_passe='lacombe05';
	$bd_nom_bd='collections_vigne';
	$conn = mysql_connect($bd_nom_serveur,$bd_login,$bd_mot_de_passe);
	mysql_close($conn);
}
function supprNull($a){
	$b=array();
	foreach($a as $key =>$value){
		$$key=$value;
                if($value=="/'/"){
                    if($_SESSION['language_Vigne']=="FR"){
                        $$key=" –" ; // Permet de remplir les champs vide
                    }else{
                        $$key=" – ";
                    }
                }
		if($value==null || $value=="null"){
                    if($_SESSION['language_Vigne']=="FR"){
                        $$key=" –" ; // Permet de remplir les champs vide
                    }else{
                        $$key=" – ";
                    }
		}else if($value=="oui"){
                    if($_SESSION['language_Vigne']=="EN"){
                        $$key="yes";
                    }else{
                        $$key=$value;
                    }
                }else if($value=="non"){
                    if($_SESSION['language_Vigne']=="EN"){
                        $$key="no";
                    }else{
                        $$key=$value;
                    }
                }
                else{
			$$key=$value;
		}
		$b[$key]=$$key;
	}
	return $b;
}
function supprNull_mot($a){
		$res=$a;
		if($a==null){
			$res="";
		}else{
			$res=$a;
		}
		return $res;
	}
function suppr_accents ($text) {
	$alphabet = array(
		'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
		'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
		'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
		'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
		'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
		'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
		'ü'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
	);
	$text = strtr ($text, $alphabet);
	$text = str_ireplace('o','[oöõóòøôð]',$text);
	$text = str_ireplace('a','[aäáâãæåà]',$text);
	$text = str_ireplace('u','[uüúûù]',$text);
	$text = str_ireplace('i','[iïîíì]',$text);
        $text = str_ireplace('e','[eéèêë]',$text);
        $text = str_ireplace('y','[yýýÿ]',$text);
        $text = str_ireplace('f','[fƒ]',$text);
        $text = str_ireplace('n','[nñ]',$text);
        $text = str_ireplace('b','[þb]',$text);
        $text = str_ireplace('c','[cç]',$text);
	return $text;
}
function suppr_accents_connexion($str, $encoding='utf-8'){
		// transformer les caractères accentués en entités HTML
		$str = htmlentities($str, ENT_NOQUOTES, $encoding);
		 
		// remplacer les entités HTML pour avoir juste le premier caractères non accentués
		// Exemple : "&ecute;" => "e", "&Ecute;" => "E", "Ã " => "a" ...
		$str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);
		 
		// Remplacer les ligatures tel que : Œ, Æ ...
		// Exemple "Å“" => "oe"
		$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
		// Supprimer tout le reste
		$str = preg_replace('#&[^;]+;#', '', $str);
		 
		return $str;
}







?>