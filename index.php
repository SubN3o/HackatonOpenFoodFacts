
    <?php
    $position = 'index';
    include 'header.php';
    ?>
    <div class="container">
        <div class="row">
            <div class="text-acceuil text-center"
            <p>
                Choisissez vos produits, choisissez votre sport,<br/>
                Nous vous dirons combien de temps vous devrez pratiquer ce sport pour éliminer les calories ...
            </p>

        </div>

    </div>
    <div class="container" id="accueil">
        <div class="row">
            <img class="col-lg-offset-4 col-lg-4 col-xs-offset-2 col-xs-8" src="openfoodfacts-logo-med.png">
            <div class="col-lg-offset-2 col-lg-8">
                <form class="form" action="search.php" method="GET">
                    <input type="text" class="form-control" name="search" id="search"
                           placeholder="Entrez votre recherche (Code Barre, Nom de produit, Catégorie ...)">
                    <div class="col-lg-offset-5 col-lg-2 col-xs-offset-3 col-xs-6" id="bouton"><button type="submit" class="btn btn-default">Rechercher</button></div>
                </form>
            </div>
        </div>
    </div>

</div>

    <?php
    include 'footer.php';
    ?>
