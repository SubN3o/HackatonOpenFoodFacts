<nav class="navbar navbar-default navbar-fixed-top hidden-xs">
    <div class="container">
        <div class="navbar-header">
            <a href="index.php">
                <img alt="Brand" src="src/img/mangerbougerwilder.png" class="navbar-brand">
            </a>

        </div>
        <form class="navbar-form navbar-right" action="search.php" method="GET">
            <a class="btn btn-warning" href="basket.php">Mon Panier</a>
            <input type="text" class="form-control search-search" placeholder="Entrez votre recherche (Code Barre, Nom de produit, Catégorie ...)" name="search">
            <input type="submit" class="btn btn-primary" value="Rechercher">
        </form>

    </div>
</nav>
<nav class="navbar navbar-default navbar-fixed-top visible-xs">
    <div class="container-fluid">
        <div class="navbar-header text-center">
            <a href="index.php"><img src="src/img/mangerbougerwilder.png" class="navbar-brand"></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapsed" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapsed">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Recherche</a></li>
                <li><a href="basket.php">Mon Panier</a></li>
            </ul>
        </div>
    </div>
</nav>