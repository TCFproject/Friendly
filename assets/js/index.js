var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200){
        //console.log(this.responseText);
    }
};
xhttp.open("GET","http://localhost/messites/Friendly/TestJSon/ReturnJsonOeuvres.php", true);
xhttp.send();
