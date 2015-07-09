<!-- MENU PRINCIPAL DE SITE -->
<ul id="menu_main">
</ul>
<!-- MENU PRINCIPAL DE SITE -->
<!--indiquer le statue de la connection -->
<div class="welcom">
	<ul>
	<?php
		
		if(isset($_SESSION['codePersonne'])){
		//s'il exist la connection, il affiche des menu pour partenaire
			echo'
			<li id="welcom_contents"><a id="PagePerson" href="PagePerson.php?l='.$_SESSION['language_Vigne'].'"><span id="site-login-title"></span> '.$_SESSION['nomPersonne'].' '.$_SESSION['prenomPersonne'].'</a></li>
			
			<li><a id="logout" style="cursor:hand" href="php/logout.php"><img src="images/lougout.png" alt="deconnectes" width="20px" hight="20px"/></a></li>';
		}else{
		//s'il n'exist pas la connection, il affiche le bouton pour connecter
		//??
			if($_SESSION['page']=="Login.php"){
				echo '<li id="welcom_title" style="background: #78B640,color:#fff,border-radius: 20px; "></li>';
			}else{
			
				echo '<li id="welcom_title" ></li>';
			}
		}
	?>
	</ul>
</div>
<!--indiquer le statue de la connection -->