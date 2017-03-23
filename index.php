<?php
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="text-acceuil col-xs-12 text-center"
             <p>
                 Choisissez vos produits,<br/>
                 Choisissez votre sport,<br/>
                 Nous vous dirons combien de temps vous devez pratiquer ce sport pour éliminer les calories ...
             </p>
        </div>
    </div>
    <div class="row">
        <form action="search.php" method="GET" class="col-xs-12">
            <input type="text" class="form-control" name="search" id="search" placeholder="Entrez votre recherche (Code Barre, Nom du produit, Catégorie ...)"><br/>
            <button type="submit" class="btn btn-default">Rechercher</button>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>


