var descJSon = document.getElementById('descJSon');
var titre = document.getElementById('titre');
var titre_replace = titre.innerHTML.replace(" ", "_");
var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200){
        var infosBDs = JSON.parse(this.responseText);
        console.log(infosBDs);
        for(let i = 0; i<infosBDs.genre.length; i++){
            var tableD = document.createElement("th");
            tableD.innerHTML = infosBDs.genre[i];
            document.getElementById("base").appendChild(tableD);
        }
        document.getElementById("cathegorie").innerHTML = "Cathegorie : "+infosBDs.cathe;
        document.getElementById("auteur").innerHTML = "Auteur : "+infosBDs.BD.nom;
        descJSon.innerHTML = infosBDs.BD.description;
    }
};
xhttp.open("GET","http://localhost/messites/Friendly/TestJSon/ReturnJsonBD.php?titre="+titre_replace, true);
xhttp.send();
