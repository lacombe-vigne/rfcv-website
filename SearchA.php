<html>
    <!-- BEGIN SESSION+langue site -->
    <?php
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

    if ($_SESSION['page'] != "SearchA.php") {
        $_SESSION['page'] = "SearchA.php";
    } else {
        $_SESSION['page'] = "SearchA.php";
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
                    <li id="chemin_searchA"></li>
                </ul>
            </div>
            <!-- END #site-chemin -->
        </div>
        <!-- END Site Head -->

        <!-- BEGIN Site Center -->

        <!-- BEGIN Site Search -->
        <div id="site-center">
            <?php
            include('php/web_search_advance.php');
            ?>
        </div>
        <!-- END Site Search -->

        <!-- END Site Center -->

        <!-- BEGIN Site Footer -->
        <?php
        include('php/web_footer.php');
        ?>
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
    <script src="./js/advertisement.js" type="text/javascript" charset=utf-8></script>
    <script type="text/javascript">
        $(function () {
            if($.ads == undefined) {
                $.getJSON("./json/message.json", function (data) {
                    $.each(data, function (key, value) {
                        if ($('#mainMenu_Home').val() == "Accueil") {
                            if (key === "Adblock_fr") {
                                var message = value;
                                alert(message);
                            }
                        } else if ($('#mainMenu_Home').val() == "Home") {
                            if (key === "Adblock_en") {
                                var message = value;
                                alert(message);
                            }
                        }
                    });
                });
            }
        });
    </script>
</body>

</html>