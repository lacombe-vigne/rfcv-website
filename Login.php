<html>
	<!-- BEGIN SESSION+langeu site -->
	<?php
		//include('connection_bbd/connection_bbd.php');
		//connexionBbd();
		
		session_start();
		$langue=$_GET['l'];
		
			if(isset($langue)){
				if($langue=="FR"){
					$_SESSION['language_Vigne']="FR";
				}
				if($langue=="EN"){
					$_SESSION['language_Vigne']="EN";
				}
			}else{
				if(!isset($_SESSION['language_Vigne'])){
					$_SESSION['language_Vigne']="FR";
				}else{
					$_SESSION['language_Vigne']=$_SESSION['language_Vigne'];
				}
			}
		
		if($_SESSION['page']!="Login.php"){
			$_SESSION['page']="Login.php";
		}else{
			$_SESSION['page']="Login.php";
		}
	?>
	<!-- END SESSION+langeu site -->

	<!-- BEGIN <head> -->

	<!-- END <head> -->

		<!-- BEGIN Page Content -->
		<div class="wrapper">
			<!-- BEGIN Site Head -->
			<div class="head">
				<?php
					include('php/web_head.php');
				?>
			
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
					<li id="chemin_login"></li>
					</ul>
				</div>
				<!-- END #site-chemin -->
			</div>
			<!-- END Site Head -->
			
			<!-- BEGIN Site Center -->
				<!-- BEGIN Site Login -->
				
				<?php
					include('php/web_loginpage.php');
				?>
				
				<!-- END Site Login -->
			<!-- END Site Center -->
			
			<!-- BEGIN Site Footer -->
				<?php
					include('php/web_footer.php');
				?>
			<!-- END Site Footer -->
			
		</div>
		<!-- END Page Content -->
                <?php
		if($_SESSION['language_Vigne']=="FR"){
			include('php/web_style_fr.php');
		}else if($_SESSION['language_Vigne']=="EN"){
			include('php/web_style_en.php');
		}else{
			include('php/web_style_fr.php');
		}
                ?>
	</body>
	
</html>