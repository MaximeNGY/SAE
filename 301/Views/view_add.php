<?php require "view_begin.php" ?>
    <link rel="stylesheet" href="Content/style/ajout.css">
    <section class="add">
        <form action="index.php?controller=set&action=add" method="post" enctype="multipart/form-data">

            <label></label>
            <input type="text" name="nomP" placeholder="Nom du produit" class="txt"><br>
            <label></label>
            <input type="number" name="quantite" placeholder="Quantité" class="txt"><br>
            <label></label>
            <input type="number" step="any" name="prix" placeholder="Prix du produit" class="txt"><br>
            <label></label>
            <input type="file" name="image" value="Ajouter une image" class="addImg"><br>
            <input type="submit" value="Ajouter le Produit">

        </form>
    <section>
<?php require "view_end.php"?>