<?php
		
	session_start();
/*
Une fois qu'un utilisateur déconnecte, il destroy son session.
*/

	if($_SESSION['language_Vigne']=="FR"){
		echo '<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				<!--
				<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
				<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
				-->
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/jquery-migrate-1.2.1.min.js"></script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/chagePage_FR.js" type="text/javascript" charset=utf-8> </script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="http://bioweb.supagro.inra.fr/collection_vigne2014/jin.css" type="text/css" media="all" />
				<!--
				<link rel="stylesheet" href="css/green.css" type="text/css" media="all" />
				-->
				</head>';
	}else if($_SESSION['language_Vigne']=="EN"){
	
		echo'<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				<!--
				<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
				<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
				-->
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/jquery-migrate-1.2.1.min.js"></script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/chagePage_EN.js" type="text/javascript" charset=utf-8> </script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="http://bioweb.supagro.inra.fr/collection_vigne2014/jin.css" type="text/css" media="all" />
				<!--
				<link rel="stylesheet" href="css/green.css" type="text/css" media="all" />
				-->
			</head>';
	}else{
		
		echo '<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				<!--
				<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
				<script src="js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
				-->
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/jquery-migrate-1.2.1.min.js"></script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/chagePage_FR.js" type="text/javascript" charset=utf-8> </script>
				<script src="http://bioweb.supagro.inra.fr/collection_vigne2014/js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="http://bioweb.supagro.inra.fr/collection_vigne2014/jin.css" type="text/css" media="all" />
				<!--
				<link rel="stylesheet" href="css/green.css" type="text/css" media="all" />
				-->
			</head>';
	}	
	$_SESSION = array();
	session_destroy();
	echo'<div id="message_logout"></div>';
	echo'<meta http-equiv="Refresh" content="1;url=http://bioweb.supagro.inra.fr/collection_vigne2014/Home.php?l='.$langue.'">';
?>