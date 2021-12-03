<?php
$idRecette = $recette["id"];
$titre = $recette["titre"];
$dateCreation = $recette["dateCreation"];
$photo = $recette["photo"];
$description = $recette["description"]
?>

<div id="global">
 <article>
 <header>
 <img class="imgRecette" src="img/<?=$photo?>" alt="<?=$titre?>" />
 <h1 class="titreRecette">
    <?=$titre?>
 </h1>
 <time>
 <?=$dateCreation?>
 </time>
 </header>
 <p>
 <?=$description?>
 </p>
 </article>
 <hr />
 <header>
 <h2 id="titreIngredient">
 Ingrédients
 </h2>
 <ul>
 <?php
foreach ($ingredients as $ingredient) {
    $nom = $ingredient["nom"];
    $quantite = $ingredient["quantite"];
    $unit = $ingredient["unit"]
    ?>
    <li><?=$quantite . " " . $unit . " " . $nom?></li>
    <?php
}
?>
</ul>
 </header>
 <h2 id="titreCommentaire">
 Commentaires
 </h2>
 <?php
foreach ($commentaires as $commentaire) {
    $auteur = $commentaire["auteur"];
    $contenu = $commentaire["contenu"];
    $note = $commentaire["note"];
    $date = $commentaire["dateCreation"]
    ?>
    <div class="divCommentaire">
 <p><?=$auteur . " : " . $contenu?></p>
 <p> Note : <?=$note?>/5 </p>
 <p>
 <?=$date?>
 </p>
    <?php
}
?>

 <hr>
</div>
<form method="post" action="index.php?controller=recette&action=commenter&id=<?=$idRecette?>" >
<input required type="hidden" name="idRecette" value="<?=$idRecette?>" />
 <input required  id="auteur" name="auteur" type="text" placeholder="Votre Nom"
/><br />
 <textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre
commentaire" ></textarea><br/>
 <label for="note">Note</label><br />
 <select  required name="note" id="note">
 <option value="1">1</option>
 <option value="2">2</option>
 <option value="3">3</option>
 <option value="4">4</option>
 <option value="5">5</option>
 </select>
 <br />
 <input type="submit" value="Commenter" />
</form>

</div>
