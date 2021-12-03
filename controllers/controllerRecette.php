<?php
require_once 'modeles/recette.php';
require_once 'modeles/commentaire.php';
require_once 'framework/controller.php';
require_once 'framework/vue.php';
class ControllerRecette extends Controller
{
    private $recette;
    private $commentaire;
    public function __construct()
    {
        $this->recette = new Recette();
        $this->commentaire = new Commentaire();
    }
    public function index()
    {
    }
    // Affiche les détails sur une recette
    public function recette()
    {
        $idRecette = $_GET["id"];
        $recette = $this->recette->getRecette($idRecette); // récupérer la recette
        $ingredients = $this->recette->getIngredients($idRecette); // récupérer la liste des ingrédients
        $commentaires = $this->commentaire->getCommentaires($idRecette); // récupérer la liste des commentaires
        $this->genererVue(array(
            "recette" => $recette,
            "ingredients" => $ingredients,
            "commentaires" => $commentaires)); // générer la vue

    }

    // Ajoute un commentaire à une recette
    public function commenter()
    {
        if ($_POST["auteur"] == "" || $_POST["idRecette"] == "") {
            throw new Exception("Il manquent une ou plusieur valeurs");
        }
        $idRecette = $this->requete->getParametre('id');
        $dateCreation = date("Y-m-d H:i:s");
        $auteur = htmlspecialchars($_POST['auteur']);
        $contenu = htmlspecialchars($_POST['contenu']);
        $note = htmlspecialchars($_POST['note']);
        $this->commentaire->ajouterCommentaire($idRecette, $auteur, $contenu, $note, $dateCreation);
    }
}
