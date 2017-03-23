<DOCTYPE html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <form action="produit.php" method="POST">
          <div class="form-group">
            <label for="codebarre">Recherche par Code-Barres</label><br/>
            <input type="text" class="form-control" name="id" id="codebarre" placeholder="Entrez le numéro de code-barres"><br/>
          </div>
          <button type="submit" class="btn btn-default">Rechercher</button>
        </form>
    </body>

</DOCTYPE>