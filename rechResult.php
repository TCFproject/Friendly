<?php
session_start();
require_once ('model/DataBase.php');
$database = new DataBase();
$idGenre = isset($_GET['genre'])?$_GET['genre']:'';

require_once ('model/BD.php');
require_once ('controller/controlBD2.php');
require_once ('assets/php/Assets_ControlBD.php');

require_once ('controller/controlOeuvre2.php');
require_once ('assets/php/assetsOeuvre.php');
$controlOeuvre = new assetsOeuvre(new controlOeuvre2());

$BD = null;
$BDtest = new BD("","",'',array(),"");
$controlBD = new controlBD2($BDtest,$database);
$Assets = new Assets_ControlBD($controlBD);

/*if (array_keys($_GET)[0] == "categorie"){
    $BD = new BD("","",$_GET['categorie'],array(),null);
    $controlBD = new controlBD2($BD, $database);
    $Assets_BD = new Assets_ControlBD($controlBD);

    var_dump($Assets_BD->getBDparCathe());
}elseif (array_keys($_GET)[0] == "genre"){
    $list_one_data = array();
    array_push($list_one_data, $_GET['genre']);
    $BD = new BD("","",0, $list_one_data,null);
}*/

$listBD = $Assets->getListsBD(intval($idGenre))
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Friendly - Résultat de recherche</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
include('htmlFile/identif.php');
include("htmlFile/header.html");
?>

<!-- Banner -->
<section id="banner">
    <div class="inner">

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
        $repot2 = $controlOeuvre->getRepot();
        $titre2 = $controlOeuvre->getTitre();
        for($i = 0; $i < sizeof($repot2); $i++){
            $estVide = array_slice(scandir($repot2[$i]), 2);
            $couverture2 = $controlOeuvre->getCouvertures($repot2[$i]);
            if(!empty($estVide) && $titre2[$i] == $listBD[$i]['titre']){
                ?>
                <article>
                    <div class="content">
                        <header>
                            <h5><?php print str_replace("_"," ", $titre2[$i]); ?></h5>
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
