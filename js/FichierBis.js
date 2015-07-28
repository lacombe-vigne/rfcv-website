/*
 * Gère le fil d'Ariane pour les fichiers FichierVar.php et FichierAcc.php.
 * Redirige également l'utilisateur vers l'accueil s'il n'y a pas de données qui s'affiche.
 */
$(document).ready(function () {
    if ($('#FichierAcc').text() != "") {
        /*
         * FicheAcc
         */
        //console.log($('#codeIntroduction').val());
        if ($('#codeIntroduction').val() == "") {
            $.getJSON("./json/message.json", function (data) {
                $.each(data, function (key, value) {
                    if (key === "ficheVarAcc") {
                        message = value;
                        alert(message);
                        window.location = './Home.php';
                    }
                });
            });
        } else {
            var icone = '<li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li>';
            var i = 2; //Itérateur qui me permet d'ajouter les élements en fonction de leur position
            var CodeGet = recupererVariablesGet();
            var Code = CodeGet["code"];
            $('<li id="chemin_ficheEsp"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
            $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
            $('<li id="chemin_ficheVar"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
            $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
            $('<li id="chemin_ficheAcc"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
            $('#chemin_ficheAcc').css('font-weight', 'bold');
            $('#chemin_ficheAcc').append('<span id="codeAcc">' + Code + '</span>');
            var Codes = recupererCode(Code, "accession");
        }
    }
    if ($('#FichierVar').text() != "") {
        /*
         * FicheVar
         */
        //console.log($('#codeVariete').val());
        if ($('#codeVariete').val() == "") {
            $.getJSON("./json/message.json", function (data) {
                $.each(data, function (key, value) {
                    if (key === "ficheVarAcc") {
                        message = value;
                        alert(message);
                        window.location = './Home.php';
                    }
                });
            });
        } else {
            console.log($('#codeVariete').val());
            var icone = '<li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li>';
            var i = 2; //Itérateur qui me permet d'ajouter les élements en fonction de leur position
            var CodeGet = recupererVariablesGet();
            var Code = CodeGet["code"];
            $('<li id="chemin_ficheEsp"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
            $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
            $('<li id="chemin_ficheVar"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
            $('#chemin_ficheVar').css('font-weight', 'bold');
            $('#chemin_ficheVar').append('<span id="codeVar">' + Code + '</span>');
            var CodeEsp = recupererCode(Code, "variete");
        }
    }
    function recupererVariablesGet() {
        /*
         * Fonction qui va nous permettre de récuperer le code et la section de la fiche pour compléter le fil d'Ariane
         */
        var returnObject = {}; // On crée un objet que l'on retournera
        url = window.location.href;//On récupère l'url
        // On regarde à quelle position est le ?
        var indexOfQuestionMark = url.indexOf("?");
        if (indexOfQuestionMark !== -1) { // S'il y en a un
            // On enlève le ? et tout ce qui le précède
            var queryString = url.substring(indexOfQuestionMark + 1);
            // On coupe ce qui reste au niveau des &
            var keysAndValues = queryString.split("&");
            var i = keysAndValues.length, keyAndValue;
            // On boucle sur chaque élément de l'array
            while (i--) {
                keyAndValue = keysAndValues[ i ].split("=");
                returnObject[decodeURIComponent(keyAndValue[ 0 ])] = decodeURIComponent(keyAndValue[ 1 ]);
            }
        }
        return returnObject; // On retourne l'objet qui sera sous la forme de [code="...", section="..."];
    }
    function recupererCode(CodeFiche, SectionFiche) {
        /*
         * Fonction qui va nous permettre de récuperer les différents code pour compléter le fil d'Ariane
         * Cette fonction va également inclure les différents code dans le fil et ajouter les liens pour être redirigé vers les autres fiches
         * PasserFicher2 est la fonction qui va nous permettre de changer de fiche et d'ajouter les liens vers les différentes fiches.
         */
        var dataString = "section=" + SectionFiche + "&code=" + CodeFiche + "&function=recuperer_code";
        //console.log(dataString);
        $.ajax({
            type: "post",
            url: "./php/script_webbio.php",
            data: dataString,
            success: function (data, status) {
                console.log(data, status, SectionFiche);
                if (SectionFiche == "variete") {
                    //Si nous sommes sur une fiche variété, nous avons juste a recupéré le codeEsp de cette variété
                    $('#chemin_ficheEsp').append('<span id="codeEsp">' + data + '</span>');
                    $('#chemin_ficheEsp').click(function () {
                        $.passerFicher2(data, "espece", $('#recherche').val())
                    });
                    $('#chemin_ficheEsp').addClass("lien_chemin"); // Cette classe permet de montrer à l'utilisateur que c'est un lien cliquable.
                }
                else if (SectionFiche == "accession") {
                    //Si nous sommes sur une fiche acc, on doit récupérer le code var et le code esp de sa variété
                    //console.log(data,status,SectionFiche);
                    $.each(data, function (key, value) {
                        //console.log(key,value);
                        if (key === "CodeEsp") {
                            //On ajoute le code, on ajoute le lien pointant vers la fiche du codeEsp en question, on ajoute les caracs css pour montrer à l'utilisateur qu'il peut cliquer dessus
                            $('#chemin_ficheEsp').append('<span id="codeEsp">' + value + '</span>');
                            $('#chemin_ficheEsp').click(function () {
                                $.passerFicher2(value, "espece", $('#recherche').val())
                            });
                            $('#chemin_ficheEsp').addClass("lien_chemin");
                        }
                        if (key === "CodeVar") {
                            $('#chemin_ficheVar').append('<span id="codeVar">' + value + '</span>');
                            $('#chemin_ficheVar').click(function () {
                                $.passerFicher2(value, "variete", $('#recherche').val())
                            });
                            $('#chemin_ficheVar').addClass("lien_chemin");
                        }

                    });
                }
            },
            dataType: "json"
        });
        return false;
    }
});


