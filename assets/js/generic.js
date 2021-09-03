var listChapitre = document.getElementById('selectChapitre');
var chemin = document.getElementById('route');

listChapitre.addEventListener('change', function () {
    window.location.href = 'http://localhost/messites/Friendly/generic.php?chemin='+chemin.value+'&chapitre='+listChapitre.value;
});
