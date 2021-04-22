<?php
session_start();
require_once ("controller/controlOeuvre2.php");
require_once ('assets/php/assetsOeuvre.php');
$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$chemin = isset($_GET['repot'])?$_GET['repot']:'';
$chapitres = $assetsOeuvre->getChapitre($chemin);
$couverture = $assetsOeuvre->getCouvertures($chemin)[0];
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
            <img src="<?php print $couverture?>"  width="350" height="450">
        </div>
        <div>
            <?php
            foreach ($chapitres as $chapitre){
                print '<h5><a href="generic.php?chemin='.$chemin.'&chapitre='.$chapitre.'">'.$chapitre.'</a></h5>';
            }
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
