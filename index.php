<?php
include 'header.php';
?>
<div class="container">
    <div class="row">
        <form action="search.php" method="GET" class="col-xs-12">
            <input type="text" class="form-control" name="search" id="search" placeholder="Entrez votre recherche (Code Barre, Nom de produit, Catégorie ...)"><br/>
            <button type="submit" class="btn btn-default">Rechercher</button>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>