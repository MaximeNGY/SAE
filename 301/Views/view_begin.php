<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Content/style/reset.css">
    <link rel="stylesheet" href="Content/style/HeaderHorizontal.css">
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="index.php?controller=list&action=catalogue"><img src="Content/image/logo.png" class="logo"></a >
            <div id="droite">
                <?php if(! isset($_COOKIE['id'])) : ?>
                    <a href="index.php?controller=affichage&action=inscr" class="inscription">Inscription</a>
                    <a href="index.php?controller=affichage&action=connexion" class="connexion">Connexion</a>
                <?php endif ?>
                <?php if(isset($_COOKIE['id'])) : ?>
                    <a href="index.php?controller=auth&action=deconnexion" class="deconnexion"> Deconnexion </a>
                <?php endif ?>
                <?php if(isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Membre') : ?>
                    <a href="index.php?controller=affichage&action=hub" class="accueil"> Accueil</a>
                <?php endif ?>
                <?php if(isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Admin') : ?>
                    <a href="index.php?controller=affichage&action=hub" class="accueil"> Accueil</a>
                <?php endif ?>

                <?php if(isset($_COOKIE['id']) && $_COOKIE['Role'] == 'Client') : ?>
                    <a href="index.php?controller=affichage&action=client" class="EspaceC">Espace Client</a>
                <?php endif ?>
                <a href=""><img src="Content/image/eng.png" alt="drapeau angle"></a>
            </div>
        </nav>
    </header>

