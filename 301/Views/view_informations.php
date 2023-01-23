<?php require_once "view_beginVertical.php"?>
    <link rel="stylesheet" href="Content/style/informations.css">
    <div class="droite">
        <h1>Bilan</h1>
        <h2>Bilan Mensuel</h2>
        <ul>
            <li>Total Produits Vendu : <?= $Bilan['TotalVendu']?> produits vendu ce mois.</li>
            <li>Total Produits en Stock : <?= $Stock ?> Produits en stock. <strong>Voir le <a href="index.php?controller=list&action=catalogue">catalogue</a> pour d'informations</strong></li>
            <li>RecetteMensuel : <?= round($Bilan['RecetteMensuel'],2)?>€</li>
        </ul>
        <div class="historique">
            <ul>

                <?php foreach($informations as $val) : ?>
                    <li class="lignehisto"><span><?=$val['DateV']?></span><span>Vente de <?= $val['prix']?>€</span></li>
                <?php endforeach ?>

            </ul>
        </div>
    </div>

</div>
<?php require_once "view_end.php"?>