<?php

class Commentaire extends Modele
{
    // Renvoie la liste des commentaires associés à une recette
    public function getCommentaires($idRecette)
    {
        $requete = "SELECT * FROM commentaire WHERE idRecette = ? ";
        $reponse = $this->executerRequete($requete, array($idRecette));
        return $reponse;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($idRecette, $auteur, $contenu, $note, $dateCreation)
    {
        $requete = "INSERT INTO commentaire(idRecette, auteur, contenu, note, dateCreation) VALUES(:idRecette, :auteur, :contenu, :note, :dateCreation)";
        $this->executerRequete($requete,
            ["idRecette" => $idRecette,
                "auteur" => $auteur,
                "contenu" => $contenu,
                "note" => $note,
                "dateCreation" => $dateCreation,
            ]);
        header("refresh: 0; url = index.php?controller=recette&action=recette&id=$idRecette");
    }
}
