<?php
session_start();
?>
<html>
	<!-- BEGIN SESSION+langeu site -->
	<?php
		//include('connection_bbd/connection_bbd.php');
		//connexionBbd();

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
		
		if($_SESSION['page']!="Credits.php"){
			$_SESSION['page']="Credits.php";
		}else{
			$_SESSION['page']="Credits.php";
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
				
			<!-- END Site Head -->
			
			<!-- BEGIN Site Center -->
				<!-- BEGIN Site Login -->
				
				<?php
					
					include('php/footer/web_credits.php');
					
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