<?php
if($_SESSION['language_Vigne']=="FR"){
echo '
<div class="chemin">
	<ul>
	<li><a class="lien_chemin" href="./Home.php">Accueil</a></li><li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li><li>Documentation</li>
	</ul>
</div>
</div>';
}else{
echo '
<div class="chemin">
	<ul>
	<li><a class="lien_chemin"  href="./Home.php">Home</a> </li><li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li><li>Documentation</li>
	</ul>
</div>
</div>';
}
?>
<div id="demo5" class="demo">
	<div class="events_item"> 
	  <div class="events_intro fr">
		<h3 id="title_parti1_documentation"></h3>
		<p id="contents_parti1_documentation"></p>
	  </div>
	  <img src="http://bioweb.supagro.inra.fr/collection_vigne2014/images/documentation_image1.jpg" width="250" height="165">
	</div>
	<div class="events_item">
	  <div class="events_intro">
		<h3  id="title_parti2_documentation"></h3>
		<p id="contents_parti2_documentation"></p>
	  </div>
	  <img src="http://bioweb.supagro.inra.fr/collection_vigne2014/images/documentation_image2.jpg" width="250" height="165">  
	</div>
	<div class="events_item">
	  <div class="events_intro fr">
		<h3 id="title_parti3_documentation"></h3>
		<p id="contents_parti3_documentation"></p>
	  </div>
	  <img src="http://bioweb.supagro.inra.fr/collection_vigne2014/images/documentation_image3.jpg" width="250" height="165">  
	</div>
</div>