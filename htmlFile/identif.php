<?php $parseNom = $_SESSION['nom']; ?>
<input type="hidden" id="estConnecte" value="<?php if($parseNom != '') {print $parseNom;}else{print 'none';}?>" />
