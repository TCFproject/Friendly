<?php
require_once ("controller/controlOeuvre2.php");
require_once ('assets/php/assetsOeuvre.php');
$assetsOeuvre = new assetsOeuvre(new controlOeuvre2());
$repot = isset($_GET['lesPages'])?$_GET['lesPages']:'';
$chapitres = $assetsOeuvre->getChapitre($repot);
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Friendly - Tes pages</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
    <?php
		include("htmlFile/identif.php");
		include("htmlFile/header.html");
    ?>
        <p id="lesChapitre" style="display: none"><?php echo (json_encode($chapitres)); ?></p>
		<!-- Main -->
        <section id="main" >
            <div class="inner">
                <h1>Tes pages</h1><!---->
                <form method="post" action="assets/php/ajouteChapitre.php?repotPage=<?php print $repot ?>">
                    <input type="text" name="nomChapitre" placeholder="Nom du chapitre">
                    <input type="submit" class="special" id="newChapter">
                </form>
                <?php
                    foreach ($chapitres as $chapitre){
                ?>
                <nav id="<?php echo $chapitre ?>" class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
                    <span style="color: white"><?php echo str_replace("_"," ",$chapitre) ?> </span>
                </nav>
                <div id="<?php echo $chapitre ?>_toggle" style="display: none;">
                    <header class="major special">
                        <form enctype="multipart/form-data" method="post" action="assets/php/ajoutePage.php?repot=<?php print $repot ?>&page=<?php print $chapitre ?>">
                            <input type="file" name="page" />
                            <input type="submit" />
                        </form>
                        <table>
                            <tr>
                                <?php
                                foreach ($assetsOeuvre->getPages($repot,$chapitre) as $pages){
                                    var_dump($pages);
                                    print '<td><img src='.$pages.'  width="150" height="200" alt=""></td>';
                                }
                                ?>
                            </tr>
                        </table>
                    </header>
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

		<!-- Scripts -->
        <script src="assets/js/pages.js"></script>
		<script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

	</body>
</html>
