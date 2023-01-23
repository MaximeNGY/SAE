
<?php require "view_begin.php" ?>
<link rel="stylesheet" href="Content/style/connexion.css">
    <h1>BDE IUT<br> VILLETANEUSE</h1>
    <div class="form">
        <div class="BoiteLogin">
            <form action="index.php?controller=auth&action=authentification" method="post">
                <h2>Connexion</h2>
                <label for="">Identifiant</label>
                <input type="number" id="username" name="id" placeholder="Numéro Etudiant"></br>
                <label for="">Mot de Passe</label>
                <input type="password" id="password" name="mdp" placeholder="Mot de Passe" "></br>
                <input type="submit" value="Se Connecter">
                <p>Vous n'avez pas de compte ? / <a href="index.php?controller=affichage&action=inscr">S'inscrire</a> </p>
            </form>
        </div>
    </div>
<?php require "view_end.php"?>

