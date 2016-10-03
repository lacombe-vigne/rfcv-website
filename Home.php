<html>
    <!-- BEGIN SESSION+langue site -->
    <?php
    //include('connection_bbd/connection_bbd.php');
    //connexionBbd();

    session_start();
    $langue = $_GET['l'];
    if (isset($langue)) {
        if ($langue == "FR") {
            $_SESSION['language_Vigne'] = "FR";
        }
        if ($langue == "EN") {
            $_SESSION['language_Vigne'] = "EN";
        }
    } else {
        if (!isset($_SESSION['language_Vigne'])) {
            $_SESSION['language_Vigne'] = "FR";
        } else {
            $_SESSION['language_Vigne'] = $_SESSION['language_Vigne'];
        }
    }

    if ($_SESSION['page'] != "Home.php") {
        $_SESSION['page'] = "Home.php";
    } else {
        $_SESSION['page'] = "Home.php";
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
                    <li id="chemin_home"></li>
                </ul>
            </div>
            <!-- END #site-chemin -->
        </div>
        <!-- END Site Head -->

        <!-- BEGIN Site Center -->
        <div class="center">
            <?php
            include('php/web_intro.php');
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
if ($_SESSION['language_Vigne'] == "FR") {
    include('php/web_style_fr.php');
} else if ($_SESSION['language_Vigne'] == "EN") {
    include('php/web_style_en.php');
} else {
    include('php/web_style_fr.php');
}
?>
</body>

</html>