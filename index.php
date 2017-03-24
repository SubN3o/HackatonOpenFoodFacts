<?php
$position = 'index';
include 'header.php';
?>
<div class="container text-center accueil">
    <div class="row">
        <p>Choisissez vos produits, choisissez votre sport.<br/>Nous vous indiquerons ensuite le temps de pratique nécessaire afin de dépenser les calories avalées.</p>
        <img class="col-lg-offset-4 col-lg-4 col-xs-offset-2 col-xs-8 accueil-logo" src="src/img/mangerbougerwilder.png">
        <div class="col-lg-offset-2 col-lg-8">
            <form class="form" action="search.php" method="GET">
                <input type="text" class="form-control" name="search" id="search" placeholder="Entrez votre recherche (Code Barre, Nom de produit, Catégorie ...)">
                <input type="submit" class="btn btn-primary btn-accueil" value="Rechercher">
            </form>
        </div>
    </div>

</div>
<?php
include 'footer.php';
?>
