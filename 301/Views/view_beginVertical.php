<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="Content/style/reset.css">
    <link rel="stylesheet" href="Content/style/HeaderVertical.css">
    <title>Document</title>
</head>
<body>
<div class="corp">
    <nav class="gauche">
        <a href="index.php?controller=list&action=catalogue"><img src="Content/image/logo.png" alt="" width="252" height="240"></a>
        <div class="liens">

            <?php if(isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Client') : ?>
                <a href='index.php?controller=list&action=catalogue'class="catalogue">Catalogue</a>
            <?php endif ?>
            <?php if(isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Membre') : ?>
                <a href="index.php?controller=affichage&action=hub" class="accueil"> Accueil</a>
            <?php endif ?>
            <?php if(isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Admin') : ?>
                <a href="index.php?controller=affichage&action=hub" class="accueil"> Accueil</a>
            <?php endif ?>
            <?php if(! isset($_COOKIE['id'])) : ?>
                <a href="index.php?controller=affichage&action=inscr" class="inscription">Inscription</a>
                <a href="index.php?controller=affichage&action=connexion" class="connexion">Connexion</a>
            <?php endif ?>
            <?php if(isset($_COOKIE['id'])) : ?>
                <a href="index.php?controller=auth&action=deconnexion" class="deconnexion"> Deconnexion </a>
            <?php endif ?>

        </div>

    </nav>