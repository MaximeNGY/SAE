<?php require_once "view_begin.php" ?>

<link rel="stylesheet" href="Content/style/panier.css">
<div class="panier-catalogue">
    <div id="Catalogue">
        <?php foreach($Articles as $cle => $val) : ?>

            <a href="./index.php?controller=list&action=panier&prix=<?= $val['prix'] ?>&quantite=<?= $val['Quantite'] ?>&nom=<?= $val['nomP']?>&id=<?= $val['idProduit']?>" class="Boite" style="background: url( <?= $val['image']?>) no-repeat center center; background-size: contain; <?= $val['Quantite'] === 0 ? 'opacity: 50%;' : 'opacity: 100%'?>">
                <div class="infoBoite">
                    <span class="nomA"><p><?= $val['nomP']?></p> <p>Quantité : <?= $val['Quantite']?></p></span>
                    <span class="prix"><?= $val['prix']?>€</span>
                </div>
            </a>

        <?php endforeach ?>
    </div>
    <div class="panier-validation">
        <?php if (count($Client) !== 0) :?>
            <h2> <?= $Client['client']['prenom']?> : <?= $Client['points']?> Points</h2>
        <?php endif ?>
        <div class="panier">
            <div class="listeArticle">

                <table>
                    <tr class="entete">
                        <th> Nom Article </th> <th> Quantite </th> <th>Prix</th>
                    </tr>
                    <?php foreach($Panier as $art) :?>
                        <tr>
                            <td><?= $art['nom']?></td>
                            <td><?= $art['Compteur']?></td>
                            <td><?= $art['prix']?>€</td>

                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="payer">
                <form method="post">
                    <input type="text" name="idCl" placeholder="Identifiant du client">
                    <input type="submit" value="Entrer" >
                </form>
                Prix à Payer : <?= $Somme ?>€
            </div>
        </div>
        <a href="./index.php?controller=set&action=vente&Somme=<?= $Somme ?>&idCl=<?=$idClient?>" class="validation">
            <span>Valider</span>
            <i class="fa-solid fa-check"></i>
        </a>
        <a href="index.php?controller=list&action=panier&reset=reset" class="Renitial">Rénitialiser le panier</a>


    </div>
</div>

<?php require_once "view_end.php" ?>
