
/*               Formulaire 1          */

var formulaire1 = document.forms['formulaire_connexion'];
var form_conn_email = formulaire1['conne_email'];
var form_conn_mdp = formulaire1['conne_mdp'];
var bouton_conne = document.getElementById('conne');

function formValid1() {
    return form_conn_email.value !== '' &&
        form_conn_mdp.value !== '';
}

for(var i = 0; i < formulaire1.length; i++){
    formulaire1[i].addEventListener('keydown', function () {
        if (formValid1()){
            bouton_conne.disabled = false;
        }else {
            bouton_conne.disabled = true;
        }
    });
}

/*               Formulaire 2          */

var formulaire2 = document.forms['formulaire_inscription'];

var form_nom = formulaire2['nom'];
var form_prenom = formulaire2['prenom'];
var form_email = formulaire2['email'];
var form_mdp = formulaire2['mdp'];
var form_conf_mdp = formulaire2['confmdp'];
var form_pseudo = formulaire2['pseudo'];

var inscri_erreur = document.getElementById('erreur');
var bouton_inscri = document.getElementById('inscri');

function formValid2(){
    return form_nom.value !== '' && form_prenom.value !== ''
        && form_email.value !== ''
        && form_mdp.value !== ''
        && form_conf_mdp.value !== ''
        && form_pseudo.value !== '';
}

for (let i = 0; i < formulaire2.length; i++){
    formulaire2[i].addEventListener('keyup', function () {
        if (formValid2()){
            if (form_mdp.value === form_conf_mdp.value){
                bouton_inscri.disabled = false;
                inscri_erreur.innerHTML = "";
            }else {
                bouton_inscri.disabled = true;
                inscri_erreur.style.color = "red";
                inscri_erreur.innerHTML = "Mot de passe non correspondant";
            }
        }else {
            bouton_inscri.disabled = true;
        }
    });
}
