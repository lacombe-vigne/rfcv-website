<?php
if($_SESSION['language_Vigne']=="FR"){
echo '
<div class="chemin">
	<ul>
	<li><a class="lien_chemin" href="./Home.php">Accueil</a></li><li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li><li>Charte</li>
	</ul>
</div>
</div>';
}else{
echo '
<div class="chemin">
	<ul>
	<li><a class="lien_chemin"  href="./Home.php">Home</a></li><li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li><li>Charter</li>
	</ul>
</div>
</div>';
}
?>
<div id="demo5" class="demo">
	<div class="events_item"> 
	  <div class="events_intro fr">
		<h3 id="title_parti1_charte"></h3>
		<p id="contents_parti1_charte"></p>
	  </div>
	  <img src="././images/charte_image1.jpg" width="250" height="165">
	</div>
	<div class="events_item">
	  <div class="events_intro">
		<h3  id="title_parti2_charte"></h3>
		<p id="contents_parti2_charte"></p>
	  </div>
	  <img src="././images/charte_image2.jpg" width="250" height="165">  
	</div>
	<div class="events_item">
	  <div class="events_intro fr">
		<h3 id="title_parti3_charte"></h3>
		<p id="contents_parti3_charte"></p>
	  </div>
	  <img src="././images/charte_image3.jpg" width="250" height="165">  
	</div>
</div>