<?php

use Utils\Article;
use \Models\Model;
require_once("./Models/Model.php");
require_once("Controller.php");
    class Controller_list extends Controller{

        public function action_catalogue(){
            $m = Model::getModel();
            $data = [
                "title" => "Catalogue",
                "catalogue" => $m->getProduits()
            ];
            $this->render('catalogue',$data);
        }
        public function action_panier(){
            require_once("./Utils/Article.php");
            session_start();
            if(isset($_COOKIE['Role'])) {
                if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                    //Si il n'y a pas une instance d'article ou qu'on ait appuyé sur le bouton reset on créer une instance d'article stocké dans une session
                    if(! isset($_SESSION['Articles']) or isset($_GET['reset'])){
                        $art = new Article();
                        $_SESSION['Articles'] = new Article();
                        $_SESSION['idCl'] = -1;
                        $_SESSION['Clients'] = [];
                    }

                    $tab = $_SESSION['Articles']->getArticles();
                    if(isset($_GET['nom'])){
                        // si un article a été selectionné on vérifie si il est possible de l'ajouter dans le panier
                        if(! $_SESSION['Articles']->addArticle($_GET['nom'],$_GET['id'])){

                            header('Location: index.php?controller=list&action=panier');
                        }
                    }
                    $infoCl = [];
                    // si l'identifiant entrée est valide on l'ajoute dans une session
                    if(isset($_POST['idCl'])){
                        $m = Model::getModel();
                        if($m->inDatabase($_POST['idCl'])){
                            $_SESSION['idCl'] = $_POST['idCl'];
                            $infoCl['client'] = $m->getInfos($_SESSION['idCl']);
                            $infoCl['points'] = $m->getPoints($_SESSION['idCl']);
                            $_SESSION['Clients'] = $infoCl;
                        }
                        else{
                            $_SESSION['idCl'] = -1;
                        }
                    }
                    // stocke dans les données les valeurs mise à jour
                    $data= [
                        "Articles" => $tab,
                        "Panier" => $_SESSION['Articles']->getPanier(),
                        "Somme" => $_SESSION['Articles']->getSomme(),
                        "idClient" => $_SESSION['idCl'],
                        "Client" => $_SESSION['Clients']
                    ];
                    $this->render("panier",$data);
                }
                else{
                    header('Location: index.php?controller=list&action=catalogue');
                }
            }
            else{
                header('Location: index.php?controller=list&action=catalogue');
            }
        }
        public function action_informations()
        {
            if (isset($_COOKIE['Role'])) {
                if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                    $m = Model::getModel();
                    $data = [
                        "informations" => $m->getInfoVentesMensuel(),
                        "Stock" => $m->getStock(),
                        "Bilan" => $m->getStockVendu()
                    ];

                    $this->render("informations", $data);
                }
            }
        }
        public function action_default(){
            $this->action_catalogue();
        }
    }



?>