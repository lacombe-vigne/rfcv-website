<?php
		
	session_start();
/*
Une fois qu'un utilisateur déconnecte, il destroy son session.
*/

	if($_SESSION['language_Vigne']=="FR"){
		echo '<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="./js/jquery-migrate-1.2.1.min.js"></script>
				<script src="./js/chagePage_FR.js" type="text/javascript" charset=utf-8> </script>
				<script src="./js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="./jin.css" type="text/css" media="all" />
				
				</head>';
	}else if($_SESSION['language_Vigne']=="EN"){
	
		echo'<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="./js/jquery-migrate-1.2.1.min.js"></script>
				<script src="./js/chagePage_EN.js" type="text/javascript" charset=utf-8> </script>
				<script src="./js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="./jin.css" type="text/css" media="all" />
				
			</head>';
	}else{
		
		echo '<head>
				 <meta http-equiv="content-type" content="text/html; charset=utf-8">
				<title>Collection Vigne 2014</title>
				
				<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
				<script src="./js/jquery-migrate-1.2.1.min.js"></script>
				<script src="./js/chagePage_FR.js" type="text/javascript" charset=utf-8> </script>
				<script src="./js/function.js" type="text/javascript" charset=utf-8> </script>
				<link rel="stylesheet" href="./jin.css" type="text/css" media="all" />
				
			</head>';
	}
        $langue=$_SESSION['language_Vigne'];
	$_SESSION = array();
	echo'<div id="message_logout"></div>';
	echo'<meta http-equiv="Refresh" content="1;url=../Home.php?l='.$langue.'">';
        session_destroy();
?>