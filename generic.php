<?php
session_start();
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
require_once ("controller/controlOeuvre2.php");
require_once ('assets/php/assetsOeuvre.php');
$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());

$reposi = isset($_GET['chemin'])?$_GET['chemin']:'';
$chap = isset($_GET['chapitre'])?$_GET['chapitre']:'';

$imgs = $assetsOeuvre->getPages($reposi, $chap);
$chapitres = $assetsOeuvre->getChapitre($reposi);

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Friendly</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
        <input type="hidden" id="route" value="<?php echo $reposi?>">
		<!-- Header -->
        <?php
        include("htmlFile/identif.php");
		include("htmlFile/header.html");
        ?>

		<!-- Main -->
			<section id="main" >
				<div class="inner">
					<header class="major special"></header>
                    <label>Sélectionner le chapitre</label>
                    <select id="selectChapitre">
                    <?php
                    foreach ($chapitres as $img){
                        $option = "<option value=$img" ;
                        if ($img == $chap){
                            $option.= " selected";
                        }
                        $option.= ">" ;
                        $option.= $img ;
                        $option.='</option>';
                        print $option;
                    }
                    ?>
                    </select>
                    <?php
					foreach($imgs as $img){
                    ?>
                    <div class="page">
                        <img src="<?php print $img ?>" width="650" height="800" />
					</div>
                    <?php
					}
                    ?>
				</div>
			</section>

		<!-- Footer -->
        <?php
		include('htmlFile/footer.html');
        ?>
        <script src="assets/js/generic.js"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
