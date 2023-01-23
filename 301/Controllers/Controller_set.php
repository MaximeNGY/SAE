<?php
use \Models\Model;
use Utils\Article;
require_once("./Models/Model.php");
require_once("./Utils/Article.php");

 class Controller_set extends Controller{


    public function action_add(){
// verifie les conditions d'ajout
        if(isset($_COOKIE['Role'])) {
            if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                if (
                    // ajouter une condition pour le role
                    isset($_POST['nomP']) && !preg_match("/^ *$/", $_POST['nomP']) &&
                    isset($_POST['quantite']) && preg_match("/^[0-9]+$/", $_POST['quantite']) &&
                    isset($_POST['prix']) && preg_match("/^[0-9]+\.?[0-9]*$/", $_POST['prix']) &&
                    isset($_FILES['image']) && preg_match("/^image/",$_FILES['image']['type'])

                ) {
                    // Ajout de l'image
                    $dir = "Content/image";
                    $tmp_name = $_FILES["image"]['tmp_name'];
                    $nom = basename($_FILES["image"]['name']);
                    $chemin = "$dir/$nom";
                    move_uploaded_file($tmp_name, $chemin);

                    $info = [];
                    $m = Model::getModel();
                    $cle = ['nomP', 'quantite', 'prix'];
                    foreach ($cle as $marqueur) {
                        $info[$marqueur] = $_POST[$marqueur];
                    }
                    $info['chemin'] = $chemin;
                    $m->setProduit($info);
                    echo "<script> alert('ajout reussi') </script>";
                }
                $this->render("add");
            }
            else{
                header('Location: index.php?controller=list&action=catalogue');
            }
        }

    }
    public function action_del()
    {
        if (isset($_COOKIE['Role'])) {
            if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                if(isset($_GET['idProduit']) && preg_match("/^[0-9]+$/", $_GET['idProduit'])){
                    $m = Model::getModel();
                    $m->delProduit($_GET['idProduit']);

                }
            }
        }
        header('Location: index.php?controller=list&action=catalogue');
    }
    public function action_inscription(){
        if(! isset($_COOKIE['id'])){
            $m = Model::getModel();
            if(
                isset($_POST['idU']) && preg_match("/^121[0-9]{5}$/", $_POST['idU']) &&
                isset($_POST['prenom']) && ! preg_match("/^ *$/", $_POST['prenom']) &&
                isset($_POST['nom']) && ! preg_match("/^ *$/", $_POST['nom']) &&
                isset($_POST['mdp']) && preg_match("/^.{6}.*$/", $_POST['mdp']) &&
                ! $m->inDatabase($_POST['idU'])

            ){
                $info = [];
                $cle = ['idU','prenom','nom','mdp'];
                foreach($cle as $marqueur){
                    $info[$marqueur] = $_POST[$marqueur];
                }
                $info['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // crypte le mot de passe
                var_dump($info['mdp']);
                $m->setClient($info);
                setcookie("id",$_POST['idU'],time() + 3600, "/");
                setcookie("Role",$m->getRole($_POST['idU']), time() + 3600, "/");
                header('Location: index.php?controller=list&action=catalogue');

            }
            else{
                echo "<script> alert('Echec ajout') </script>";
                $this->render("inscription");
            }
        }
        header('Location: index.php?controller=list&action=catalogue');
    }

    public function action_inscriptionMembre(){
        if(isset($_COOKIE['Role']) && $_COOKIE['Role'] == "Admin"){
            $m = Model::getModel();
            if(
                isset($_POST['idU']) && ! preg_match("/^ *$/", $_POST['idU']) &&
                isset($_POST['prenom']) && ! preg_match("/^ *$/", $_POST['prenom']) &&
                isset($_POST['nom']) && ! preg_match("/^ *$/", $_POST['nom']) &&
                isset($_POST['mdp']) && preg_match("/^.{6}.*$/", $_POST['mdp']) &&
                ! $m->inDatabase($_POST['idU'])
            ){
                $info = [];
                $cle = ['idU','prenom','nom','mdp'];
                foreach($cle as $marqueur){
                    $info[$marqueur] = $_POST[$marqueur];
                }
                $info['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // crypte le mot de passe
                $m->setMembre($info);

                echo "<script> alert('Ajout réussi') </script>";
            }
            else{
                echo "<script> alert('Echec Ajout') </script>";
            }
            $this->render("hub");
        }
        else{
            header('Location: index.php?controller=list&action=catalogue');
        }
    }

    public function action_vente()
    {
        session_start();
        $m = Model::getModel();
        if (isset($_COOKIE['Role'])) {
            if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                if (isset($_GET['Somme']) and isset($_SESSION['Articles']) and isset($_GET['idCl'])) {
                    $infoV = [];
                    $infoV['Somme'] = $_GET['Somme'];
                    // si nous avons un idClient on l'ajoute dans les infos de vente sinon on met "null"
                    $infoV['idU'] = $_GET['idCl'];
                    if ($_GET['idCl'] !== -1) {
                        $pts = $m->getPoints($_GET['idCl']);
                        if ($pts !== 75) {
                            if (($m->getPoints($_GET['idCl']) + $_GET['Somme'] * 2) < 75) {
                                $m->updatePoints($_GET['idCl'], round($_GET['Somme'] * 2));
                            } else {
                                $pointRestant = 75 - $pts;
                                $m->updatePoints($_GET['idCl'], $pointRestant);
                            }
                        }
                    }
                    $tabArticle = $_SESSION['Articles']->getPanier();
                    $total = 0;
                    foreach ($tabArticle as $artPan) {
                        $m->updateQuantite($artPan['Compteur'], $artPan['id']);
                        $total += $artPan['Compteur'];
                    }
                    $infoV['Qte'] = $total;
                    // ajout de la vente dans la base de données
                    $m->setVente($infoV);
                    header('Location: ./index.php?controller=list&action=panier&reset=Reset');
                }
            }
        }
        header('Location: ./index.php?controller=list&action=panier&reset=Reset');
    }
     public function action_modification(){
// verifie les conditions d'ajout
         if(isset($_COOKIE['Role'])) {
             if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                 if (
                     // ajouter une condition pour le role
                     isset($_POST['nomP']) && !preg_match("/^ *$/", $_POST['nomP']) &&
                     isset($_POST['quantite']) && preg_match("/^[0-9]+$/", $_POST['quantite']) &&
                     isset($_POST['prix']) && preg_match("/^[0-9]+\.?[0-9]*$/", $_POST['prix']) &&
                     isset($_GET['idProduit']) && preg_match("/^[0-9]+$/", $_GET['idProduit'])

                 ) {
                     $info = [];
                     if (isset($_FILES['image']) && preg_match("/^image/", $_FILES['image']['type'])) {
                         $dir = "Content/image";
                         $tmp_name = $_FILES["image"]['tmp_name'];
                         $nom = basename($_FILES["image"]['name']);
                         $chemin = "$dir/$nom";
                         $info['chemin'] = $chemin;
                         move_uploaded_file($tmp_name, $chemin);
                     }
                     $m = Model::getModel();
                     $cle = ['nomP', 'quantite', 'prix'];
                     foreach ($cle as $marqueur) {
                         $info[$marqueur] = $_POST[$marqueur];
                     }
                     $m->updateProduit($info, $_GET['idProduit']);
                 }
             }
         }
         header('Location: index.php?controller=list&action=catalogue');

     }
     public function action_default(){
        $this->action_add();
    }
}
?>