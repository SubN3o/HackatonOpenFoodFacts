<DOCTYPE html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link rel="stylesheet"  href="stylesheet.css">
        <title>Manger, Wilder, Bouger.fr</title>
    </head>
    <body>


    <div class="container">
        <div class="row">
            <img class="logoMed" src="openfoodfacts-logo-med.png">
            <form action="produit.php" method="POST" class="search">
                <div class="form-group">
                    <label for="codebarre">Recherche par Code-Barres</label>
                    <input type="text" class="form-control" name="id" id="codebarre" placeholder="Entrez le numéro de code-barres"><br/>
                    <button type="submit" class="btn btn-default">Rechercher</button>
                </div>

            </form>
        </div>
    </div>



    </body>

