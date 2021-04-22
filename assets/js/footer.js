var variableRecuperee = document.getElementById('estConnecte').value;

var BanDecon = document.getElementById('deconn');
var BanCon = document.getElementById('conn');
if (variableRecuperee === "none") {
    BanCon.style.display = 'bloc';
    BanDecon.style.display = 'none';
} else {
    BanCon.style.display = 'none';
    BanDecon.style.display = 'bloc';
}
