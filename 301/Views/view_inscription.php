<?php require "view_beginVertical.php" ?>
    <link rel="stylesheet" href="Content/style/inscription.css">
    <div class="droite">
        <form action="index.php?controller=set&action=inscription" method="post">
            <div class="bienvenue">
                <h1 id="Bonjour">Bonjour et bienvenue nouvel utilisateur !</h1>
                <h2>Inscription</h2>
            </div>
            <div class="nomPrenom">
                <input type="text" name="nom" placeholder="nom">
                <input type="text" name="prenom" placeholder="prenom">
            </div>
            <input type="number" name="idU" placeholder="Numero Etudiant">
            <input type="password" name="mdp" placeholder="Mot de Passe">
            <input type="submit" value="S'inscrire" class="validation">

        </form>

    </div>
</div>
<?php require "view_end.php"?>