<?php
include 'bdd.php';
include 'header.php';
$error = 0;
if(isset($_GET['search'])){
    $search = str_replace(' ', '+', $_GET['search']);
    if(is_int($search)&&strlen($search)==13){
        header('Location : produit.php?id='.$search);
        exit();
    }
    // On initialise la BDD
    //Récupère le nombre de résultat. On le divise par 20 (=nb de page). On incrémente le numéro de la page dans l'url pour afficher tout les produits
    $url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=1";
    // On stocke le résultat de la requête dans la variable $result et on décode le JSON
    $data = json_decode(file_get_contents($url), true);
    $count = $data['count'];
    if($count>20){
        $maxPage = round($data['count']/20)+1;
        $k = 20;
    }else{
        $maxPage = 1;
        $k = $count;
    }
    ?>
    <input type="text" id="text" placeholder="Choisissez un sport" name="text"/>
    <button class="btn btn-primary" onclick="sportSearch()">Calculer</button>
    <div class="container">
        <div class="row text-center" id="result">
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
                $kcal100 = $data['products'][$i]['nutriments']['energy']*4.18;
                $quantity = $data['products'][$i]['quantity'];
                $kcal = $kcal100*$quantity/100;
                ?>
                <div class="col-xs-3">
                    <a href="produit.php?id=<?= $data['products'][$i]['code']?>" class="thumbnail">
                        <div class="img-div">
                            <img src="<?= $img?>" alt="Image du produit" class="search-img" />
                        </div>
                        <span class="hidden productKCAL100" id="<?=$data['products'][$i]['code'];?>"><?= $kcal100?></span>
                        <span class="hidden productKCAL" id="<?=$data['products'][$i]['code'];?>"><?= $kcal?></span>
                        <h1><?= $name?></h1>
                        <div class="product-sport">
                            <p id="productKCAL100-result-<?=$data['products'][$i]['code'];?>"></p>
                            <p id="productKCAL-result-<?=$data['products'][$i]['code'];?>"></p>
                        </div>
                    </a>
                </div>
                <?php
            }
            if($maxPage>1){
                ?>
                <button id="showNext" onclick="showNext('<?php echo $search;?>', 2)">Afficher les résultats suivants</button>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
include 'footer.php';
?>
