<html>
	<!-- BEGIN SESSION+langue site -->
	<?php
		//include('connection_bbd/connection_bbd.php');
		//connexionBbd();
	
		session_start();
		// $langue=$_GET['l'];
					// if(isset($langue)){
				// if($langue=="FR"){
					// $_SESSION['language_Vigne']="FR";
				// }
				// if($langue=="EN"){
					// $_SESSION['language_Vigne']="EN";
				// }
			// }else{
				// if(!isset($_SESSION['language_Vigne'])){
					// $_SESSION['language_Vigne']="FR";
				// }else{
					// $_SESSION['language_Vigne']=$_SESSION['language_Vigne'];
				// }
			// }
		if($_SESSION['page']!="Fichier.php"){
			$_SESSION['page']="Fichier.php";
		}else{
			$_SESSION['page']="Fichier.php";
		}
			
	?>
	<!-- END SESSION+langue site -->

	<!-- BEGIN <head> -->

	<?php
		$_SESSION['language_Vigne']=$_POST['langue_value'];
		// Echo $_SESSION['language_Vigne'];
		if($_SESSION['language_Vigne']=="FR"){
			include('php/web_style_fr.php');
		}else if($_SESSION['language_Vigne']=="EN"){
			include('php/web_style_en.php');
		}else{
			include('php/web_style_fr.php');
		}	
	?>


	<!-- END <head> -->

		<!-- BEGIN Page Content -->
		<div class="wrapper">
			<!-- BEGIN Site Head -->
			<div class="head">
				<!-- BEGIN Site Head -->
					<!-- BEGIN #site-logo-title -->
						<div class="logo_title">
							<a href="Home.php"><img src="images/site_logo.png" alt="Site logo" width="7%" /></a>
							<div id="site_title"></div>
						</div>
					<!-- END #site-logo_title -->
					<!-- BEGIN .langue -->
						<div class="langue">
							<ul>
<?php

							if($_GET['section']=='espece'){
								$code=$_POST['CodeEsp'];
								$section='espece';
							}
							if($_GET['section']=='variete'){
								$code=$_POST['CodeVar'];
								$section='variete';
							}
							if($_GET['section']=='accession'){
								$code=$_POST['CodeIntro'];
								$section='accession';
							}
							if($_GET['section']=='aptitude'){
								$code=$_POST['codeAptitude'];
								$section='aptitude';
							}
							if($_GET['section']=='morphologique'){
								$code=$_POST['CodeAmpelo'];
								$section='morphologique';
							}
							if($_GET['section']=='emplacement'){
								$code=$_POST['CodeEmplacemen'];
								$section='emplacement';
							}
							if($_GET['section']=='sanitaire'){
								$code=$_POST['CodeSanitaire'];
								$section='sanitaire';
							}
							if($_GET['section']=='genetique'){
								$code=$_POST['Code'];
								$section='genetique';
							}
							if($_GET['section']=='bibliographie'){
								$code=$_POST['Code'];
								$section='bibliographie';
							}
							if($_GET['section']=='partenaire'){
								$code=$_POST['CodePartenaire'];
								$section='partenaire';
							}
							if($_GET['section']=='sites'){
								$code=$_POST['CodeSite'];
								$section='sites';
							}							
							echo'
								<li><a id="langue_fr" onclick="$.fichier_langue(\'FR\',\''.$code.'\',\''.$section.'\')"><img src="images/french.png"/></a></li>
								<li><a id="langue_en" onclick="$.fichier_langue(\'EN\',\''.$code.'\',\''.$section.'\')"><img src="images/english.png"/></a></li>
								';
?>
							</ul>
						</div>
					<!-- END .langue -->
				<!-- END Site Head -->
				
			
				<!-- BEGIN #site-menu -->
				<div class="menu" id="menu">
				<?php
					include('php/web_menu.php');
					
				?>
				</div>
				<!-- END #site-menu -->
				
				<!-- BEGIN #site-chemin -->
				<div class="chemin">
					<ul>
					<li><a href="Home.php" class="lien_chemin" id="chemin_home"></a></li>
					<li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li>
					<li><a href="SearchS.php" class="lien_chemin" id="chemin_searchS"></a></li>
					<li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li>
					<li><a onclick='$.back_list();' class="lien_chemin" id="chemin_resultat"></a></li>
					<li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li>
					<li id="chemin_fiche"></li>
					<li id="back_button"><a  onclick='$.back_list();' ><img src="images/back_chemin.png" id="back_chemin" width="20" height="20"/></a></li>
					</ul>
				</div>
				<!-- END #site-chemin -->
			</div>
			<!-- END Site Head -->
			
			<!-- BEGIN Site Center -->
				<div id="site-center">
				
					<?php
						
						include('php/web_fichier.php');
					?>
				</div>
			<!-- END Site Center -->
			
			<!-- BEGIN Site Footer -->
				<div class="footer">
				<?php
					include('php/web_footer.php');
				?>
				</div>
			<!-- END Site Footer -->
			
		</div>
		<!-- END Page Content -->
	</body>
	
</html>