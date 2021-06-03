<?php
session_start();

require_once ('model/DataBase.php');
require_once ('model/BD.php');
require_once ('controller/controlBD2.php');
require_once ('assets/php/Assets_ControlBD.php');

$BDDConn = new DataBase();
$infoPostBD = new BD("","","", array());
$controller = new controlBD2($infoPostBD, $BDDConn);
$assets = new Assets_ControlBD($controller);
?>
<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Friendly - Nouvelle BD</title>
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

		<!-- Main -->
			<section id="main">
				<div class="inner">
					<header class="major special"></header>
					<!-- Form -->
					<section>
                        <form method="post" enctype="multipart/form-data" action="assets/php/creationBD.php" name="formulaire_creation_BD"> <!-- action="assets/php/creationBD.php" -->
                            <h4>Quel sera le titre votre oeuvre ?</h4>
                            <input type="text" name="titre" />
                            <h4>Ce sera un : </h4>
                            <div class="4u 12u$(xsmall)">
                                <input type="radio" id="priority-low" name="cathegorie" value="2" />
                                <label for="priority-low">Comics</label>
                            </div>
                            <div class="4u 12u$(xsmall)">
                                <input type="radio" id="priority-normal" name="cathegorie" value="1" />
                                <label for="priority-normal">Manga</label>
                            </div>
                            <div class="4u$ 12u$(xsmall)">
                                <input type="radio" id="priority-high" name="cathegorie" value="3" />
                                <label for="priority-high">BD</label>
                            </div>
                            <h4>Quelles seront ses genres ?</h4>
                            <p id="nom_genre" style="display: none;"><?php echo(json_encode($assets->getLesGenresBD())); ?></p>
                            <?php
							foreach($assets->getLesGenresBD() as $unGenre){?>
                                <input type="checkbox" id="<?php print $unGenre['libelle'] ?>" name="<?php print $unGenre['libelle'] ?>" value="<?php print $unGenre['id'] ?>" />
                                <label for="<?php print $unGenre['libelle'] ?>"><?php print $unGenre['libelle'] ?></label>
                            <?php
                            }
                            ?>
                            <h4>Décrivez votre histoire</h4>
                            <textarea name="description" cols="70" rows="6"></textarea>
                            <h4>Mettre une couverture ?</h4>
                            <input type="file" name="couverture" />
                            <div class="12u$">
                                <ul class="actions">
                                    <li>
                                        <input type="submit" value="Créer" class="special" id="send" disabled />
                                    </li>
                                    <li>
                                        <input type="reset" value="Reset" />
                                    </li>
                                </ul>
                            </div>
                        </form>
					</section>
				</div>
			</section>
		<!-- Footer -->
			
        <?php
		include('htmlFile/footer.html');
        ?>
        <script src="assets/js/nouvelleBD.js"></script>
        <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
