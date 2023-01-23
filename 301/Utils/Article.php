<?php

namespace Utils;
use \Models\Model;

require_once("./Models/Model.php");
class Article
{
    private $articles = [];
    private $panier;
    private $somme;

    public function __construct(){
        $m = Model::getModel();
        foreach ($m->getProduits() as $val){
            $this->articles[$val["idProduit"] - 1] = $val;
        }
        $this->panier = [];
        $this->somme = 0;
    }

    public function getArticles(){
        return $this->articles;
    }

    public function getPanier(){
        return $this->panier;
    }

    public function getSomme(){
        return $this->somme;
    }
    public function estVide($cle){
        return $this->articles[$cle]['Quantite'] == 0;
    }

    public function panierEstVide(){ // verification si l'on souhaite enlever un produit du panier
        return empty($this->panier);
    }

    public function addArticle($nom,$cle){
        $cle -=1;
        if(! $this->estVide($cle)){
            if(! isset($this->panier[$cle])){
                $tab = [
                    "nom" => $nom,
                    "Compteur" => 1,
                    "id" => $cle + 1,
                    "prix" => $this->articles[$cle]['prix']
                ];
                $this->panier[$cle] = $tab;
            }
            else {
                $this->panier[$cle]["Compteur"] += 1;
                $this->panier[$cle]['prix'] += $this->articles[$cle]['prix'];

            }
            $this->articles[$cle]['Quantite'] -= 1;
            $this->somme += $this->articles[$cle]['prix'];
            return true;
        }

    }


}