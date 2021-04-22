var formulaire_creation_BD = document.forms['formulaire_creation_BD'];
var sendButton = document.getElementById('send');

var JSONgenre = document.getElementById('nom_genre').innerText;
var genre = JSON.parse(JSONgenre);

var categorie = formulaire_creation_BD['cathegorie'];
function formCheck() {
   return categorie.value !== '' &&
       titre.value !== '' &&
       Couverture.value !== '';
}

var titre = formulaire_creation_BD['titre'];
var categorie1 = document.getElementById('priority-low');
var categorie2 = document.getElementById('priority-normal');
var categorie3 = document.getElementById('priority-high');
var Couverture = formulaire_creation_BD['couverture'];

function setDisable() {
   for (let i = 0; i < genre.length; i++){
      if (formulaire_creation_BD[genre[i]['libelle']].checked === true && formCheck()){
         sendButton.disabled = false;
         return;
      }else {
         sendButton.disabled = true;
      }
   }
}

for (let i = 0; i<genre.length; i++){
   formulaire_creation_BD[genre[i]['libelle']].addEventListener('click', function () {
      setDisable();
   });
}


for (let i = 0; i < genre.length; i++){
   formulaire_creation_BD[genre[i]['libelle']].addEventListener('click', function () {
      setDisable();
      console.log(this.value);
   });
}

Couverture.addEventListener('change', function () {
   setDisable();
   console.log(this.value);
});

categorie1.addEventListener('click', function () {
   setDisable();
   console.log(this.value);
});
categorie2.addEventListener('click', function () {
   setDisable();
   console.log(this.value);
});
categorie3.addEventListener('click', function () {
   setDisable();
   console.log(this.value);
});

titre.addEventListener('keyup', function () {
   setDisable();
   console.log(this.value);
});

