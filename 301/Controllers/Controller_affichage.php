<?php
use \Models\Model;
require_once("./Models/Model.php");
class Controller_affichage extends Controller
{

    public function action_add(){
        if(isset($_COOKIE['Role'])) {
            if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                $this->render("add");
            }
        }
        else{
            header('Location: index.php?controller=list&action=catalogue');
        }
    }

    public function action_connexion(){
        if(isset($_COOKIE['id'])){
            if($_COOKIE['Role'] == "Client"){
                header('Location: index.php?controller=list&action=catalogue');
            }
            elseif($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre"){
                header('Location: index.php?controller=affichage&action=hub');
            }
        }
        else{
            $this->render("connexion");
        }
    }

    public function action_inscr(){
        if(! isset($_COOKIE['id'])){
            $this->render("inscription");
        }
        else{
            if($_COOKIE['Role'] == "Client"){
                header('Location: index.php?controller=list&action=catalogue');
            }
            elseif($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre"){
                $this->render("hub");
            }
        }
    }

    public function action_client(){
        if(isset($_COOKIE['id'])){
            if($_COOKIE['Role'] == "Client"){
                $m = Model::getModel();
                $data = [
                    "infoClient" => $m->getInfos($_COOKIE['id']),
                    "points" => $m->getPoints($_COOKIE['id']),
                    "Achats" => $m->getHistoriqueAchat($_COOKIE['id'])
                ];

                $this->render("client",$data);
            }
            elseif($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre"){
                header('Location: index.php?controller=affichage&action=hub');
            }
        }
        else{
            $this->render("connexion");
        }
    }
    public function action_inscrM(){
        if(isset($_COOKIE['Role']) && $_COOKIE['Role'] == "Admin"){
            $this->render("inscriptionMembre");
        }
        else{
            if($_COOKIE['Role'] == "Client"){
                header('Location: index.php?controller=list&action=catalogue');
            }
            elseif($_COOKIE['Role'] == "Membre"){
                $this->render("hub");
            }
        }
    }
    public function action_hub(){
        if(isset($_COOKIE['Role'])) {
            if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                $this->render("hub");
            }
        }
        else{
            header('Location: index.php?controller=list&action=catalogue');
        }
    }


    public function action_modification(){
        if(isset($_COOKIE['Role'])) {
            if ($_COOKIE['Role'] == "Admin" || $_COOKIE['Role'] == "Membre") {
                $m = Model::getModel();
                if(
                    isset($_GET['nomP']) && !preg_match("/^ *$/", $_GET['nomP']) &&
                    isset($_GET['quantite']) && preg_match("/^[0-9]+$/", $_GET['quantite']) &&
                    isset($_GET['prix']) && preg_match("/^[0-9]+\.?[0-9]*$/", $_GET['prix']) &&
                    isset($_GET['idProduit']) && preg_match("/^[0-9]+$/", $_GET['idProduit'])
                ){
                    if ($m->produitInDatabase($_GET['idProduit'])){
                        $data = [
                            "nom" => $_GET['nomP'],
                            "quantite" => $_GET['quantite'],
                            "prix" => $_GET['prix'],
                            "id" => $_GET['idProduit']

                        ];
                        $this->render("modification",$data);
                    }
                }

            }
        }
        header('Location: index.php?controller=list&action=catalogue');
    }
    public function action_default()
    {
        $this->action_catalogue();
    }
}