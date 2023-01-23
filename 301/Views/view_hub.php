<?php require "view_beginVertical.php"; ?>
<link rel="stylesheet" href="Content/style/hub.css">
<div class="droite">
    <div class="bienvenue">
        <h1 id="Bonjour">Re-Bonjour Vendeur !</h1>
        <h2>Bienvenue sur le menu</h2>
    </div>

        <a href="index.php?controller=list&action=catalogue">Catalogue</a>
        <a href="index.php?controller=list&action=panier&reset=Reset">Panier</a>
        <a href="index.php?controller=set&action=add">Ajout Article</a>
        <a href="index.php?controller=list&action=informations">Bilan et Historique</a>
        <?php if($_COOKIE['Role'] == "Admin") : ?>
            <a href="index.php?controller=affichage&action=inscrM">Ajout Membre</a>
        <?php endif ?>

</div>
</div>


<?php require "view_end.php";?>


