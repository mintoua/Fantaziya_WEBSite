//review and payments


var tab = ["&", '"', "'", "(", ")", "_", "=", "-", "+", ".", "1", "2", "3", "4", "5", "6", "7", "8", "9", "/", "*", "$", "^", "¨", "!", ":", ";", ",", "?"];
var tab2 = ["&", '"', "'", "(", ")", "_", "=", "-", "+", ".", "/", "*", "$", "^", "¨", "!", ":", ";", ",", "?"];

function controlSaisie(obj) {
    if (obj.id == "firstName" || obj.id == "lastName" || obj.id == "company" || obj.id == "city") {

        try {
            if (obj.value.indexOf(" ") == 0 || obj.value.length==0 )
            {
                 $(function () {
                         if(obj.name=="CardName" || obj.name=="ExpirationMonth") $('[bouton="2"]').attr('disabled', 'disabled');
                        else $('[bouton="1"]').attr('disabled', 'disabled');
                    })
                throw "il ne doit pas commencer par un espace et ne doit pas être vide";
            }
            else {
                    $(function () {

                          if(obj.name=="CardName" || obj.name=="ExpirationMonth") $('[bouton="2"]').removeAttr('disabled');
                          else $('[bouton="1"]').removeAttr('disabled');

                    })
                }
            for (var i = 0; i < tab.length; i++) {
                if (obj.value.indexOf(tab[i]) >= 0) {
                    $(function () {
                            if(obj.name=="CardName" || obj.name=="ExpirationMonth") $('[bouton="2"]').attr('disabled', 'disabled');
                        else $('[bouton="1"]').attr('disabled', 'disabled');
                    })

                    throw "pas de caracteres speciaux ou de chirffres";
                    break;
                } else {
                    $(function () {

                       if(obj.name=="CardName" || obj.name=="ExpirationMonth") $('[bouton="2"]').removeAttr('disabled');
                          else $('[bouton="1"]').removeAttr('disabled');

                    })
                }
            }

            // si l'erreur n'est pas detecte
            obj.parentElement.querySelector("p").textContent = "";
            obj.style.borderColor = "#ced4da";

        } //si l'eereru et détecté 
        catch (err) {
            obj.style.borderColor = "red";
            console.log(obj.parentElement.querySelector("p"));
            if (!obj.parentElement.querySelector("p"))
                obj.insertAdjacentHTML("afterend", "<p style='color:red;'>" + err + "</p>");
            else obj.parentElement.querySelector("p").textContent = err;

        }

    } else if (obj.type == "password") {
        try {
            if (obj.value.length < 5) {

                $(function () {
                    $('#login').attr('disabled', 'disabled');
                })
                throw "minimum cinq caracteres";
            } else {
                console.log("rectiver");
                $(function () {

                    $('#login').removeAttr('disabled');

                })
            }
            // si l'erreur n'est pas detecte
            obj.parentElement.querySelector("p").textContent = "";
            obj.style.borderColor = "#ced4da";

        } //si l'eereru et détecté 
        catch (err) {
            obj.style.borderColor = "red";
            console.log(obj.parentElement.querySelector("p"));
            if (!obj.parentElement.querySelector("p"))
                obj.insertAdjacentHTML("afterend", "<p style='color:red;'>" + err + "</p>");
            else obj.parentElement.querySelector("p").textContent = err;

        }

    } else if (obj.id == "streetAddress1" || obj.id == "streetAddress2") {

        try {
            if (obj.value.indexOf(" ") == 0) throw "il ne doit pas commencer par un espace";
            for (var i = 0; i < tab2.length; i++) {
                if (obj.value.indexOf(tab2[i]) >= 0) {
                    $(function () {
                        $('[bouton="1"]').attr('disabled', 'disabled');
                    })
                    throw "pas de caracteres speciaux";
                    break;
                } else {
                    $(function () {

                        $('[bouton="1"]').removeAttr('disabled');

                    })
                }
            }
            // si l'erreur n'est pas detecte
            obj.parentElement.querySelector("p").textContent = "";
            obj.style.borderColor = "#ced4da";

        } //si l'eereru et détecté 
        catch (err) {
            obj.style.borderColor = "red";
            console.log(obj.parentElement.querySelector("p"));
            if (!obj.parentElement.querySelector("p"))
                obj.insertAdjacentHTML("afterend", "<p style='color:red;'>" + err + "</p>");
            else obj.parentElement.querySelector("p").textContent = err;

        }
    } else if (obj.id == "zipCode") {

        try {
            for (var i = 0; i < obj.value.length; i++) {
                if (isNaN(obj.value[i])) {
                     $(function () {
                        console.log("erreur");
                        $('[bouton="1"]').attr('disabled', 'disabled');
                    })
                    throw "ce n'est pas un chiffre";
                    break;
                }
                else {
                    $(function () {

                        $('[bouton="1"]').removeAttr('disabled');

                    })
                }
                if (obj.value.length != 4) 
                {
                      $(function () {
                        $('[bouton="1"]').attr('disabled', 'disabled');
                    })
                    
                    throw "le format doit etre de la forme NNNN";
                }
                else {
                    $(function () {

                        $('[bouton="1"]').removeAttr('disabled');

                    })
                }
            }
            // si l'erreur n'est pas detecte
            obj.parentElement.querySelector("p").textContent = "";
            obj.style.borderColor = "#ced4da";

        } //si l'eereru et détecté 
        catch (err) {
            obj.style.borderColor = "red";
            console.log(obj.parentElement.querySelector("p"));
            if (!obj.parentElement.querySelector("p"))
                obj.insertAdjacentHTML("afterend", "<p style='color:red;'>" + err + "</p>");
            else obj.parentElement.querySelector("p").textContent = err;

        }
    } else if (obj.id == "phoneNumber") {

        try {
            if (isNaN(obj.value[0]) && (obj.value[0] != "+" || obj.value[0] == " ")) 
            {
                 $(function () {
                        $('[bouton="1"]').attr('disabled', 'disabled');
                    })
                throw "ce champ doit commencer soit pas + soit par un chiffre";
            }
             else {
                    $(function () {

                        $('[bouton="1"]').removeAttr('disabled');

                    })
                }
            for (var i = 1; i < obj.value.length; i++) {
                if (isNaN(obj.value[i])) {
                     $(function () {
                        $('[bouton="1"]').attr('disabled', 'disabled');
                    })
                    throw "ce n'est pas un chiffre";
                    break;
                }
                 else {
                    $(function () {

                        $('[bouton="1"]').removeAttr('disabled');

                    })
                }

            }
            // si l'erreur n'est pas detecte
            obj.parentElement.querySelector("p").textContent = "";
            obj.style.borderColor = "#ced4da";

        } //si l'eereru et détecté 
        catch (err) {
            obj.style.borderColor = "red";
            console.log(obj.parentElement.querySelector("p"));
            if (!obj.parentElement.querySelector("p"))
                obj.insertAdjacentHTML("afterend", "<p style='color:red;'>" + err + "</p>");
            else obj.parentElement.querySelector("p").textContent = err;

        }
    } else if (obj.id == "cardNumber") {

        try {

            for (var i = 1; i < obj.value.length; i++) {
                if (isNaN(obj.value[i] && obj.value[i] != "-" && obj.value.length != 19)) {
                     $(function () {
                    $('[bouton="2"]').attr('disabled', 'disabled');
                })
                    throw "soit un tiret ou un chiffre respecter la valeur";
                    break;
                }
                 else {
                    $(function () {

                        $('[bouton="2"]').removeAttr('disabled');

                    })
                }
                if (obj.value.length != 19) {
                        $(function () {
                    $('[bouton="2"]').attr('disabled', 'disabled');
                })
                    throw "respecter la longeur";
                }
                 else {
                    $(function () {

                        $('[bouton="2"]').removeAttr('disabled');

                    })
                }


            }
            // si l'erreur n'est pas detecte
            obj.parentElement.querySelector("p").textContent = "";
            obj.style.borderColor = "#ced4da";

        } //si l'eereru et détecté 
        catch (err) {
            obj.style.borderColor = "red";
            console.log(obj.parentElement.querySelector("p"));
            if (!obj.parentElement.querySelector("p"))
                obj.insertAdjacentHTML("afterend", "<p style='color:red;'>" + err + "</p>");
            else obj.parentElement.querySelector("p").textContent = err;

        }
    } else if (obj.id == "CVV") {

        try {
            for (var i = 1; i < obj.value.length; i++) {
                if (isNaN(obj.value[i])) {
                         $(function () {
                    $('[bouton="2"]').attr('disabled', 'disabled');
                })
                    throw "soit un tiret ou un chiffre";
                    break;
                }
                  else {
                    $(function () {

                        $('[bouton="2"]').removeAttr('disabled');

                    })
                }
                if (obj.value.length !=3) {
                    console.log("longuer différente de 3");
                         $(function () {
                    $('[bouton="2"]').attr('disabled', 'disabled');
                })
                    throw "respecter la longeur";

                }
                  else {
                    $(function () {

                        $('[bouton="2"]').removeAttr('disabled');

                    })
                }
                // si l'erreur n'est pas detecte
                obj.parentElement.querySelector("p").textContent = "";
                obj.style.borderColor = "#ced4da";

            } //si l'eereru et détecté 
        } catch (err) {
            obj.style.borderColor = "red";
            console.log(obj.parentElement.querySelector("p"));
            if (!obj.parentElement.querySelector("p"))
                obj.insertAdjacentHTML("afterend", "<p style='color:red;'>" + err + "</p>");
            else obj.parentElement.querySelector("p").textContent = err;

        }
    }
    
    

}
