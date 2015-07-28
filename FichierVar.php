<?php
session_start();
if ($_SESSION['page'] != "Fichier.php") {
    $_SESSION['page'] = "Fichier.php";
} else {
    $_SESSION['page'] = "Fichier.php";
}
?>                        
<!-- END SESSION+langue site -->

<!-- BEGIN <head> -->

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
                    $_SESSION["CodeVar2"] = $_GET["code"];
                    $code = $_POST['CodeVar'];
                    $section = 'variete';
                    $rech = "";
                echo'
								<li><a id="langue_fr" onclick="$.fichier_langue(\'FR\',\'' . $code . '\',\'' . $section . '\',\'' . $rech . '\')"><img src="images/french.png"/></a></li>
								<li><a id="langue_en" onclick="$.fichier_langue(\'EN\',\'' . $code . '\',\'' . $section . '\',\'' . $rech . '\')"><img src="images/english.png"/></a></li>
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
                <!--<li><a href="SearchS.php" class="lien_chemin" id="chemin_searchS"></a></li>
                <li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li>
                <li><a onclick='$.back_list();' class="lien_chemin" id="chemin_resultat"></a></li>
                <li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li>
                <li id="chemin_fiche"></li>
                <li id="back_button"><a  onclick='$.back_list();' ><img src="images/back_chemin.png" id="back_chemin" width="20" height="20"/></a></li>-->
            </ul>
        </div>
        <!-- END #site-chemin -->
    </div>
    <!-- END Site Head -->
    <!-- BEGIN Site Center -->
    <div id="site-center">
        <?php
        include('php/web_fichierVar.php');
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
$_SESSION['language_Vigne'] = "FR";
    if ($_SESSION['language_Vigne'] == "FR") {
        include('php/web_style_fr.php');
    } else if ($_SESSION['language_Vigne'] == "EN") {
        include('php/web_style_en.php');
    } else {
        include('php/web_style_fr.php');
    }
    ?>
<script src="./js/FichierBis.js" type="text/javascript" charset=utf-8></script>
</body>

</html>

