<?php
session_start();
require_once ('controller/controlOeuvre2.php');
require_once ('assets/php/assetsOeuvre.php');

$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Friendly - Acceuil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<?php
		include('htmlFile/identif.php');
		include("htmlFile/header.html");
		?>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
        <?php
                if ($nom != ''){
        ?>
					<h1>Bienvenue <span> <?php print $nom.' '.$prenom ?></span></h1>
                    <h4>Avez-vous une envie de publier une nouvelle oeuvre ou voulez-vous en continuer une ?</h4>
                    <h3>Que ce soit l'un ou l'autre</h3>
					<ul class="actions">
                        <li>
                            <a id="aCache" href="listeDeTesOeuvres.php" class="button alt">Cliquez ici pour consulter vos BDs</a>
                        </li>
					</ul>
        <?php
                }else{
        ?>
                    <h1>Bienvenue sur Friendly</h1>
                    <h5>Ici, vous pouvez lire les oeuvres d'amateurs de BD et même les aider financièrement</h5>
                    <h5>Vous pouvez vous aussi publier vos BDs en cliquant sur l'onglet "connexion" en haut à droite et que vous allez dans la partie "Inscription"</h5>
        <?php
                }
        ?>
				</div>
			</section>
		<!-- One 
			<section id="one">
				<div class="inner">
					<header>
						<h2>Magna Etiam Lorem</h2>
					</header>
					<p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscin sem. Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel, arcu, erisque hendrerit tellus. Integer sagittis. Vivamus a mauris eget arcu gravida tristique. Nunc iaculis mi in ante.</p>
					<ul class="actions">
						<li><a href="#" class="button alt">Learn More</a></li>
					</ul>
				</div>
			</section>-->

		<!-- Two -->
			<section id="two">
				<div class="inner">
                    <?php
            $repot2 = $assetsOeuvre->getRepot();
            $titre2 = $assetsOeuvre->getTitre();
            for($i = 0; $i < sizeof($repot2); $i++){
                $estVide = array_slice(scandir($repot2[$i]), 2);
                $couverture2 = $assetsOeuvre->getCouvertures($repot2[$i]);
                if(!empty($estVide)){
                    ?>
					<article>
						<div class="content">
							<header>
								<h5><?php print $titre2[$i]; ?></h5>
							</header>
							<div class="image fit">
                                <a href="<?php print 'presentOeuvre.php?repot='.$repot2[$i].'&titre='.$titre2[$i] ?>">
                                    <img width="150" height="250" src="<?php print $couverture2[0] ?>" alt="" />
                                </a>
							</div>
						</div>
					</article>
                    <?php
                }
            }
                    ?>
				</div>
			</section>

		<!-- Three -->
			<!-- <section id="three">
				<div class="inner">
					<article>
						<div class="content">
							<span class="icon fa-laptop"></span>
							<header>
								<h3>Tempus Feugiat</h3>
							</header>
							<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna lorem ullamcorper laoreet, lectus arcu.</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</div>
					</article>
					<article>
						<div class="content">
							<span class="icon fa-diamond"></span>
							<header>
								<h3>Aliquam Nulla</h3>
							</header>
							<p>Ut convallis, sem sit amet interdum consectetuer, odio augue aliquam leo, nec dapibus tortor nibh sed.</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</div>
					</article>
					<article>
					<div class="content">
							<span class="icon fa-laptop"></span>
							<header>
								<h3>Sed Magna</h3>
							</header>
							<p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula.</p>
							<ul class="actions">
								<li><a href="#" class="button alt">Learn More</a></li>
							</ul>
						</div>
					</article>
				</div>
			</section>-->

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
