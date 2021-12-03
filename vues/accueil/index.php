<p>Je vous souhaite la bienvenue sur ce blog.</p>
<?php
foreach ($recette as $recette) {
    ?>
<div id="global">
 <article>
 <header>
 <img class="imgRecette" src="img/<?=$recette["photo"]?>" width="300px"
height="242px" alt="Tartiflette" />
 <a href="index.php?controller=recette&action=recette&id=<?=$recette["id"]?>">
 <h1 class="titreRecette">
 <?=$recette["titre"]?>
 </h1>
 </a>
 <time>
 <?=$recette["dateCreation"]?>
 </time>
 </header>
 <p>
 <?=$recette["description"]?>
 </p>
 </article>
 <hr />
</div>

<?php
}

?>