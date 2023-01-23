<?php require "view_beginVertical.php" ?>
<link rel="stylesheet" href="Content/style/EspaceClient.css">
<div class="droite">
    <div class="bienvenue">
        <h1 id="Bonjour">Re-Bonjour <?= $infoClient['prenom'] ?> !</h1>
        <p>Vous avez <?= $points ?> points.</p>
    </div>
    <div class="barre">
        <div class="progression" style="width: <?= $points * 100 / 75 ?>%;">
        </div>
    </div>
    <p>Il vous reste <?= 75 - $points  ?> points pour beneficier d’une promotion.</p>
    <h2>Votre historique d'achat</h2>

    <div class="historique">
        <ul>
            <?php foreach($Achats as $val) : ?>
                <li class="lignehisto"><span><?=$val['DateV']?></span><span>Achat de <?= $val['prix']?>€</span></li>
            <?php endforeach ?>

        </ul>
    </div>
</div>

</div>

<?php require "view_end.php"?>
