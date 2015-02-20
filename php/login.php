
<?php
		
	session_start();
	include_once('./php/includes/class_DAO_Bibilotheque.php');
	include_once('./php/includes/bibliFonc.php');
		
/*
Une fois qu'un utilisateur connecte, il créer un session pour lui, qui enregistrer des 			
			codePersonne
			nomPersonne
			prenomPersonne
			CodePartenairePersonne
			ProfilPersonne
*/
	/*
	
	echo 'fsdfqfqdfsdq';
	echo '<h1>'.$_SESSION['language_Vigne'].'</h1>';
	if($_SESSION['language_Vigne']=="FR"){
		echo '<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				<!--
				<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
				<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
				-->
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="./js/jquery-migrate-1.2.1.min.js"></script>
				<script src="./js/chagePage_FR.js" type="text/javascript" charset=utf-8> </script>
				<script src="./js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="./jin.css" type="text/css" media="all" />
				<!--
				<link rel="stylesheet" href="css/green.css" type="text/css" media="all" />
				-->
				</head>';
		echo '<body>dfsfdsqfsd</body>';
	}else if($_SESSION['language_Vigne']=="EN"){
	
		echo'<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				<!--
				<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
				<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
				-->
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="./js/jquery-migrate-1.2.1.min.js"></script>
				<script src="./js/chagePage_EN.js" type="text/javascript" charset=utf-8> </script>
				<script src="./js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="./jin.css" type="text/css" media="all" />
				<!--
				<link rel="stylesheet" href="css/green.css" type="text/css" media="all" />
				-->
			</head>';
		echo '<body>dfsfdsqfsd</body>';
	}else{
		
		echo '<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				<!--
				<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
				<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
				-->
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="./js/jquery-migrate-1.2.1.min.js"></script>
				<script src="./js/chagePage_FR.js" type="text/javascript" charset=utf-8> </script>
				<script src="./js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="./jin.css" type="text/css" media="all" />
				<!--
				<link rel="stylesheet" href="css/green.css" type="text/css" media="all" />
				-->
			</head>';
		echo '<body>dfsfdsqfsd</body>';
	}
	*/
	function suppr_accents_connexion($str, $encoding='utf-8')
	{
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
	
	
	
	//header('Content-Type: text/html; charset=utf-8');
	$username=suppr_accents_connexion($_POST['user']);
	$password=sha1($_POST['password']);
	//$langue=$_POST['langue'];
	//$_SESSION['language']= $langue;
	
	$DAO=new BibliothequeDAO();
	$res = $DAO->login($username,$password);
	echo $res;
	
	echo $username;
?>