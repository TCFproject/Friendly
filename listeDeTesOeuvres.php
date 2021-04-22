<?php
session_start();
require_once ("controller/controlOeuvre2.php");
require_once ('assets/php/assetsOeuvre.php');
$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());
$nom = $_SESSION['nom'];
$repotAuteur = $assetsOeuvre->getChemins($nom);
$listerOeuvres = $assetsOeuvre->getLesOeuvresAuteur($nom);
include("htmlFile/identif.php");
?>
<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Friendly - Tes oeuvres</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
        <?php
		include("htmlFile/header.html");
        ?>

		<!-- Main -->
			<section id="main" >
				<div class="inner">
                    <header class="major special">
                        <p>
                            <a href="nouvelleBD.php"> Diffuser une BD</a>
                        </p>
                        <table>
                            <tr>
                                <?php if(!empty($listerOeuvres)){
                                  for($i = 0; $i<sizeof($listerOeuvres); $i++){
                                      $lesCouvertures = $assetsOeuvre->getCouvertures($repotAuteur.'/'.$listerOeuvres[$i])[0];
                                ?>
                                <td>
                                    <a href="pages.php?lesPages=<?php print $repotAuteur.'/'.$listerOeuvres[$i] ?>">
                                        <p> <strong> <?php print str_replace("_"," ",$listerOeuvres[$i]) ?></strong></p>
                                        <img width="150" height="250" src="<?php print $lesCouvertures ?>" />
                                    </a>
                                </td>
                                <?php }
                              }else{ ?>
                                <h1>Tu n'as publié aucune oeuvre</h1>
                                <?php }?>

                            </tr>
                        </table>
                    </header>
				</div>
			</section>

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
