<?php require "view_begin.php"; // affichage provisoire à changer plus tard?>

<link rel="stylesheet" href="Content/style/catalogue.css">
<h1>Catalogue</h1>
<p id="Para">Voici la liste des articles disponibles.</p>
<div id="Catalogue">

<?php if(isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Membre' || isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Admin') : ?>

    <?php foreach($catalogue as $val) : ?>

        <a href="index.php?controller=affichage&action=modification&nomP=<?= $val['nomP']?>&quantite=<?= $val['Quantite']?>&prix=<?= $val['prix']?>&idProduit=<?= $val['idProduit']?>" class="Boite" style="background: url( <?= $val['image']?>) no-repeat center center; background-size: contain;">
            <div class="infoBoite">
                <span class="nomA"><p><?= $val['nomP']?></p> <p>Quantité : <?= $val['Quantite']?></p></span>
                <span class="prix"><?= $val['prix']?>€</span>
            </div>
        </a>

    <?php endforeach ?>

<?php endif ?>

<?php if(isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Client' || ! isset($_COOKIE['id'])) : ?>

    <?php foreach($catalogue as $val) : ?>

        <div class="Boite" style="background: url( <?= $val['image']?>) no-repeat center center; background-size: contain;">
            <div class="infoBoite">
                <span class="nomA"><p><?= $val['nomP']?></p></span>
                <span class="prix"><?= $val['prix']?>€</span>
            </div>
        </div>

    <?php endforeach ?>

<?php endif ?>

</div>

<?php require "view_end.php"?>