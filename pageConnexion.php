
<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Friendly - Connexion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
        <?php
		include('htmlFile/identif.php');
		include("htmlFile/header.html");
        ?>

		<!-- Main -->
			<section id="main">
				<div class="inner">
					<header class="major special"></header>
                    <section>
                        <h3>Connexion</h3>
                        <form method="post" action="assets/php/connexion.php" name="formulaire_connexion">
                            <div class="row uniform 50%">
                                <div class="12u$">
                                    <input type="email" name="conne_email" id="conn-email" placeholder="Email" />
                                </div>
                                <div class="6u 12u$(xsmall)">
                                    <input type="password" name="conne_mdp" id="conn-mdp" placeholder="Mot de passe" />
                                </div>

                                <div class="12u$">
                                    <ul class="actions">
                                        <li>
                                            <input type="submit" value="Connexion" class="special" id="conne" disabled />
                                        </li>
                                        <li>
                                            <input type="reset" value="Reset" />
                                        </li>
                                    </ul>
                                </div>
<?php
                        if (isset($_GET['Error'])){
?>
                            <p style="color: #e23135">Erreur : Identifiant ou mot de passe incorrecte</p>
<?php
                        }
?>
                            </div>
                        </form>
                    </section>
                    <div style="border-style:solid;"></div>
                    <h2>Si vous n'avez pas de compte</h2>
					<!-- Form -->
					<section>
						<h3>Inscrivez-vous</h3>
						<form name="formulaire_inscription" action="assets/php/inscription.php" id="demo-formulaire" method="post"> <!-- action = asset/php/inscription.php -->
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input type="text" name="nom" id="demo-nom" value="" placeholder="Nom" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input type="text" name="prenom" id="demo-prenom" value="" placeholder="Prenom" />
								</div>
								<div class="12u$">
                                    <input type="email" name="email" id="demo-email" value="" placeholder="Email" />
								</div>
                                <div class="6u 12u$(xsmall)">
                                    <input type="password" name="mdp" id="demo-mdp" value="" placeholder="Mot de passe" />
                                </div>
                                <div class="6u$ 12u$(xsmall)">
                                    <input type="password" name="confmdp" id="demo-confMdp" value="" placeholder="Confirmer mot de passe" />
                                    <p id="erreur"></p><br>
                                </div>
                                <div class="6u$ 12u$(xsmall)">
                                    <input type="text" name="pseudo" id="demo-pseudo" value="" placeholder="Pseudo" />
                                </div>
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" id="inscri" value="Inscription" class="special" disabled /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</div>
								</div>
							</form>
						</section>
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
            <script src="assets/js/pageConnexion.js"></script>
	</body>
</html>
