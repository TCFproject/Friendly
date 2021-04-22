var chapitres = document.getElementById('lesChapitre');
var Les_Chapitres = JSON.parse(chapitres.innerHTML);

function resetToggle() {
    for (let i = 0; i<Les_Chapitres.length; i++){
        document.getElementById(Les_Chapitres[i]+"_toggle").style.display = "none";
    }
}

for (let i = 0; i<Les_Chapitres.length; i++){
    var elementToggle = document.getElementById(Les_Chapitres[i]+"_toggle");
    document.getElementById(Les_Chapitres[i]).addEventListener("click", function () {
        resetToggle();
        document.getElementById(Les_Chapitres[i]+"_toggle").style.display = "flex";
    });
}
