<DOCTYPE html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link rel="stylesheet" href="stylesheet.css">
        <title>Manger, Wilder, Bouger.fr</title>
    </head>
    <body>


    <?php
    include 'header.php';
    ?>
    <div class="container">
        <div class="row">
            <img class="logoMed" src="openfoodfacts-logo-med.png">
            <form action="search.php" method="GET" class="col-xs-12">
                <input type="text" class="form-control" name="search" id="search"
                       placeholder="Entrez votre recherche (Code Barre, Nom de produit, Catégorie ...)"><br/>
                <button type="submit" class="btn btn-default">Rechercher</button>
            </form>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
    </body>

