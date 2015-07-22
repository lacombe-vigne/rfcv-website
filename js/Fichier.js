/* 
 * Script JS qui permet de modifier le fil d'Ariane lorsqu'on est sur une fiche de donnée.
 * Le fil d'Ariane change en fonction de sa page précédente, il y'a 3 cas possible 
 * Recherche Simple, Recherche Avancée et Ma Selection
 */
$(document).ready(function () {
    var icone = '<li><img src="images/breadcrumb-separator.png" alt="prochain" width="6" height="10"/></li>'
    var i = 2; //Itérateur qui me permet d'ajouter les élements en fonction de leur position
    if ($('#recherche').val() == "SearchS") {
        //Si on vient de faire une recherche simple
        //console.log($('#search_value').val());
        $('<li><a href="SearchS.php" class="lien_chemin" id="chemin_searchS"></a></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li><a onclick="$.back_list();" class="lien_chemin" id="chemin_resultat"></a></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li id="back_button"><a  onclick="$.back_list();" ><img src="images/back_chemin.png" id="back_chemin" width="20" height="20"/></a></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('#chemin_resultat').append($('#search_value').val());
    }
    else if ($('#recherche').val() == "SearchA") {
        //Si on vient de faire une recherche avancée
        //console.log($('#recherche').val());
        $('<li><a href="SearchA.php" class="lien_chemin" id="chemin_searchA"></a></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li id="back_button"><a  href="SearchA.php" ><img src="images/back_chemin.png" id="back_chemin" width="20" height="20"/></a></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
    }
    else if ($('#recherche').val() == "Selection") {
        //Si on accède à la fiche via le panier
        //console.log($('#recherche').val());
        $('<li><a href="MySelection.php" class="lien_chemin" id="chemin_selection"></a></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li id="back_button"><a  href="MySelection.php" ><img src="images/back_chemin.png" id="back_chemin" width="20" height="20"/></a></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
    }
    else {
        console.log("ça déconne !!!");
    }
    var CodeSection = recupererVariablesGet();
    var Code = CodeSection["code"];
    var Section = CodeSection["section"];
    console.log(Section);
    $('<li id="chemin_ficheEsp"></li>').insertBefore(($('div[class="chemin"] ul li:nth-child(' + (i) + ')')));
    if (Section == "espece") {
        $('#chemin_ficheEsp').append('<span id="codeEsp">'+Code+'</span>');
        $('#chemin_ficheEsp').css('font-weight', 'bold'); // cette caractéristique permet de montrer à l'utisateur ou il se situe
    } else if (Section == "variete") {
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li id="chemin_ficheVar"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('#chemin_ficheVar').css('font-weight', 'bold');
        $('#chemin_ficheVar').append('<span id="codeVar">'+Code+'</span>');
        var CodeEsp = recupererCode(Code, Section);
    } else if (Section == "accession") {
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li id="chemin_ficheVar"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li id="chemin_ficheAcc"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('#chemin_ficheAcc').css('font-weight', 'bold');
        $('#chemin_ficheAcc').append('<span id="codeAcc">'+Code+'</span>');
        var Codes = recupererCode(Code, Section);
    } else { // Une autre section comme emplacement par exemple
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li id="chemin_ficheVar"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $(icone).insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        $('<li id="chemin_ficheAcc"></li>').insertAfter(($('div[class="chemin"] ul li:nth-child(' + (i++) + ')')));
        var Codes = recupererCode(Code, Section);
        /*console.log($('chemin_ficheAcc').html());
        if($('chemin_ficheAcc').html() == undefined){
            $('li img:last-child').eq(-2).remove();
        }*/
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
                    $('#chemin_ficheEsp').append('<span id="codeEsp">'+data+'</span>');
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
                            $('#chemin_ficheEsp').append('<span id="codeEsp">'+value+'</span>');
                            $('#chemin_ficheEsp').click(function () {
                                $.passerFicher2(value, "espece", $('#recherche').val())
                            });
                            $('#chemin_ficheEsp').addClass("lien_chemin");
                        }
                        if (key === "CodeVar") {
                            $('#chemin_ficheVar').append('<span id="codeVar">'+value+'</span>');
                            $('#chemin_ficheVar').click(function () {
                                $.passerFicher2(value, "variete", $('#recherche').val())
                            });
                            $('#chemin_ficheVar').addClass("lien_chemin");
                        }

                    });
                } else {
                    if (data["CodeVar"] == null && data["CodeAcc"] == null) {
                        //si le code var et le code acc sont null, càd, si nous sommes sur une fiche partenaire ou site
                        //console.log(sessionStorage.getItem("chemin"));
                        var chemin = sessionStorage.getItem("chemin");
                        //On récupère le code html du chemin précédent.
                        $('.chemin').empty();
                        $('.chemin').html(chemin);
                        $('.chemin ul li').css('float','left');
                        $('.chemin ul').css('list-style','outside none none');
                        $('#chemin_ficheAcc').css('font-weight','normal');
                        $('#chemin_ficheAcc').addClass("lien_chemin");
                        $('#chemin_ficheEsp').click(function () {
                            $.passerFicher2($('#codeEsp').text(), "espece", $('#recherche').val())
                        });
                        $('#chemin_ficheVar').click(function () {
                            $.passerFicher2($('#codeVar').text(), "variete", $('#recherche').val())
                        });
                        $('#chemin_ficheAcc').click(function () {
                            $.passerFicher2($('#codeAcc').text(), "accession", $('#recherche').val())
                        });
                        $('#back_button').css('float','right');
                        $('#back_button').css('margin','auto 2% auto auto');
                        //On lui réattribue ces caractéristiques(liens, css).
                    } else {
                        $.each(data, function (key, value) {
                            //console.log(key,value);
                            if (key == "CodeEsp") {
                                $('#chemin_ficheEsp').append('<span id="codeEsp">'+value+'</span>');
                                $('#chemin_ficheEsp').click(function () {
                                    $.passerFicher2(value, "espece", $('#recherche').val())
                                });
                                $('#chemin_ficheEsp').addClass("lien_chemin");
                            }
                            if (key == "CodeVar") {
                                $('#chemin_ficheVar').append('<span id="codeVar">'+value+'</span>');
                                $('#chemin_ficheVar').click(function () {
                                    $.passerFicher2(value, "variete", $('#recherche').val())
                                });
                                $('#chemin_ficheVar').addClass("lien_chemin");
                            }
                            if (key == "CodeAcc") {
                                if (value == null) {
                                    $('#chemin_ficheAcc').remove();
                                    //$('li :last-child').remove();
                                } else {
                                    $('#chemin_ficheAcc').append('<span id="codeAcc">'+value+'</span>');
                                    $('#chemin_ficheAcc').click(function () {
                                        $.passerFicher2(value, "accession", $('#recherche').val())
                                    });
                                    $('#chemin_ficheAcc').addClass("lien_chemin");
                                }
                            }
                        });
                    }
                }
                var chemin = $('.chemin').html(); //Cette variable permet de gérer le cas ou est sur une fiche partenaire/site.
                sessionStorage.setItem("chemin",chemin);
                //console.log(chemin);

            },
            dataType: "json"
        });
        return false;
    }
});


/*
 * Attention aux cas partenaire et site qui ne sont pas encore fonctionnels
 * 
 */
