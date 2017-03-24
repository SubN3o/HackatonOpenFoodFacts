<?php
$position = 'search';
include 'bdd.php';
include 'header.php';
include 'navbar.php';
$error = 0;
if(isset($_GET['search'])){
    $search = $_GET['search'];
    if(strlen($search)==13&&is_numeric($search)){
        header('Location: produit.php?id='.$search);
        exit;
    }
    $search = str_replace(' ', '+', $_GET['search']);
    // On initialise la BDD
    //Récupère le nombre de résultat. On le divise par 20 (=nb de page). On incrémente le numéro de la page dans l'url pour afficher tout les produits
    $url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=1";
    // On stocke le résultat de la requête dans la variable $result et on décode le JSON
    $data = json_decode(file_get_contents($url), true);
    $count = $data['count'];
    if($count>0){
        if($count>20){
            $maxPage = round($data['count']/20)+1;
            $k = 20;
        }else{
            $maxPage = 1;
            $k = $count;
        }
        ?>
        <div class="form-group text-center">
            <input type="text" id="text" placeholder="Choisissez un sport" name="text" class="form-control sport-select"/>
            <button class="btn btn-primary" onclick="sportSearch()">Calculer</button>
        </div>

        <div class="container text-center">
            <div class="row" id="result">
                <?php
                for($i=0;$i<$k;$i++){
                    if(!isset($data['products'][$i]['product_name_fr'])){
                        $name = $data['products'][$i]['product_name'];
                    }else{
                        $name = $data['products'][$i]['product_name_fr'];
                    }
                    if(!isset($data['products'][$i]['image_url'])){
                        $img = "http://placehold.it/200x200";
                    }else{
                        $img = $data['products'][$i]['image_url'];
                    }
                    if(isset($data['products'][$i]['nutriments']['energy'])){
                        $kcal100 = $data['products'][$i]['nutriments']['energy']/4.184;
                        $quantity = $data['products'][$i]['quantity'];
                        $kcal = $kcal100*$quantity/100;
                    }else{
                        $kcal100 = 0;
                        $kcal = 0;
                    }
                    ?>
                    <div class="col-xs-12 col-sm-3">
                        <div class="thumbnail">
                            <a href="produit.php?id=<?= $data['products'][$i]['code']?>">
                                <div class="img-div">
                                    <img src="<?= $img?>" alt="Image du produit" class="search-img" />
                                </div>
                                <span class="hidden productKCAL100" id="<?=$data['products'][$i]['code'];?>"><?= $kcal100?></span>
                                <span class="hidden productKCAL" id="<?=$data['products'][$i]['code'];?>"><?= $kcal?></span>
                                <h4><?= $name?></h4>
                            </a>
                            <div class="product-sport text-center">
                                <p id="productKCAL100-result-<?=$data['products'][$i]['code'];?>"></p>
                                <p id="productKCAL-result-<?=$data['products'][$i]['code'];?>"></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                if($maxPage>1){
                    ?>
                    <br />
                    <div class="col-xs-12">
                        <button class="btn btn-default" id="showNext" onclick="showNext('<?php echo $search;?>', 2)">Afficher les résultats suivants</button>
                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }else {
        ?>
        <div class="jumbotron text-center">
            <h1>Famine !</h1>
            <p>Votre recherche n'a retourné aucun résultat</p>
        </div>
        <?php
    }
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
include 'footer.php';
?>
