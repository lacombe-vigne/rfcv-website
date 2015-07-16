<html>
	<!-- BEGIN SESSION+langue site -->
	<?php
		
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
		
		if($_SESSION['page']!="PagePerson.php"){
			$_SESSION['page']="PagePerson.php";
		}else{
			$_SESSION['page']="PagePerson.php";
		}
	?>
	<!-- END SESSION+langue site -->

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
					<li id="chemin_person"></li>
					<li id="back_button"><a  href="Home.php" ><img src="images/back_chemin.png" id="back_chemin" width="20" height="20"/></a></li>
					</ul>
				</div>
				<!-- END #site-chemin -->
			</div>
			<!-- END Site Head -->
			
			<!-- BEGIN Site Center -->
				<div class="center">
				<?php
					include('php/web_person.php');
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