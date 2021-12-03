<?php

require_once 'framework/modele.php';
class Recette extends Modele
{

    // Renvoie la liste des recettes du blog
    public function getRecettes()
    {
        $requete = "SELECT id, titre, dateCreation, description,photo FROM recette ";
        $reponse = $this->executerRequete($requete);
        return $reponse;

    }

    // Renvoie les informations sur une recette
    public function getRecette($idRecette)
    {

        $sql = "SELECT * FROM recette WHERE id = ?";
        $reponse = $this->executerRequete($sql, array($idRecette))->fetch();

        if (!$reponse) {
            throw new Exception("Aucune
                recette ne correspond à l'identifiant '$idRecette'");
        }
        // $reponse = $this->executerRequete($sql, array($idRecette));
        return $reponse;

    }

    // Renvoie les ingrédients d'une recette
    public function getIngredients($idRecette)
    {
        $sql = "SELECT * FROM ingredient WHERE idRecette = ?";
        $reponse = $this->executerRequete($sql, array($idRecette));
        return $reponse;
        // code à implémenter
        // retourne la liste des ingrédientscode
        // utiliser pour cela executerRequete avec la requête SQL et $idRecette en
// paramètre (attention les paramètres sont sous forme de tableau)
    }
}
