<?php require "view_begin.php" ?>
    <link rel="stylesheet" href="Content/style/ajout.css">
    <section class="add">
        <form action="index.php?controller=set&action=modification&idProduit=<?= $id ?>"  method="post" enctype="multipart/form-data">

            <label></label>
            <input type="text" name="nomP" placeholder="Nom du produit" value="<?= $nom ?>" class="txt"><br>
            <label></label>
            <input type="number" name="quantite" placeholder="Quantité" value="<?= $quantite ?>" class="txt"><br>
            <label></label>
            <input type="number" step="any" name="prix" placeholder="Prix du produit" value="<?= $prix ?>" class="txt"><br>
            <label></label>
            <input type="file" name="image" value="Ajouter une image" class="addImg"><br>
            <input type="submit" value="Modifier">
            <a href="index.php?controller=set&action=del&idProduit=<?= $id ?>" class="supression"> Suprimer L'article </a>

        </form>
        <section>
<?php require "view_end.php"?>