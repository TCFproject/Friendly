<?php
session_start();
require_once ('model/DataBase.php');

require_once ("controller/controlOeuvre2.php");
require_once ('assets/php/assetsOeuvre.php');

require_once ('model/BD.php');
require_once ("controller/controlBD2.php");
require_once ('assets/php/Assets_ControlBD.php');
$database = new DataBase();

$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$chemin = isset($_GET['repot'])?$_GET['repot']:'';
$titre = isset($_GET['titre'])?$_GET['titre']:'';

$BD = new BD($titre,"","", array());
$controlerBD = new controlBD2($BD, $database);
$assets_BD = new Assets_ControlBD($controlerBD);

$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());

$chapitres = $assetsOeuvre->getChapitre($chemin);
$couverture = $assetsOeuvre->getCouvertures($chemin)[0];
$infoBD = $assets_BD->getInfo();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Friendly - Présentation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>

    <!-- Header -->
    <?php
    include("htmlFile/identif.php");
    include("htmlFile/header.html");
    ?>
    <div>
        <div>
            <h3><?php print str_replace("_"," ",$titre) ?></h3>
            <img src="<?php print $couverture?>"  width="350" height="450">
        </div>
        <div>
            <?php
            foreach ($chapitres as $chapitre){
                print '<h5><a href="generic.php?chemin='.$chemin.'&chapitre='.$chapitre.'">'.substr(str_replace("_"," ",$chapitre), 11).'</a></h5>';
            }
            ?>

        </div>
        <div>
            <?php
                print $infoBD['BD']['description'];
            ?>
            <table>
                <tr>
                    <?php
                    foreach ($infoBD['genre'] as $genre){
                        print '<td>'.$genre.'</td>';
                    }
                    ?>
                </tr>
            </table>
            <?php
            print $infoBD['cathe'];
            ?>
        </div>
    </div>
    <!-- Footer -->
    <?php
    include('htmlFile/footer.html');
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
<?php
?>
