<?php
if($_SESSION['language_Vigne']=="FR"){
echo '
<div class="chemin">
	<ul>
	<li><a class="lien_chemin" href="./Home.php" id="chemin_home"></a></li><li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li><li id="chemin_contacts"></li>
	</ul>
</div>
</div>';
}else{
echo '
<div class="chemin">
	<ul>
	<li><a class="lien_chemin"  href="./Home.php" id="chemin_home"></a></li><li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li><li id="chemin_contacts"></li>
	</ul>
</div>
</div>';
}
?>
<div id="demo5" class="demo">
	<div class="events_item"> 
	  <div class="events_intro fr">
		<h3 id="title_parti1_contacts"></h3>
		<p id="contents_parti1_contacts"></p>
	  </div>
	  <img src="././images/contacts_image1.jpg" width="250" height="165">
	</div>
	<div class="events_item">
	  <div class="events_intro">
		<h3  id="title_parti2_contacts"></h3>
		<p id="contents_parti2_contacts"></p>
	  </div>
	  <img src="././images/contacts_image2.jpg" width="250" height="165">  
	</div>
	<div class="events_item">
	  <div class="events_intro fr">
		<h3 id="title_parti3_contacts"></h3>
		<p id="contents_parti3_contacts"></p>
	  </div>
	  <img src="././images/contacts_image3.jpg" width="250" height="165">  
	</div>
</div>