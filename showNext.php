<?php
include 'bdd.php';
$search = str_replace(' ', '+', $_GET['search']);
$page = $_GET['page'];
// On initialise la BDD
//Récupère le nombre de résultat. On le divise par 20 (=nb de page). On incrémente le numéro de la page dans l'url pour afficher tout les produits
$url = "https://world.openfoodfacts.org/cgi/search.pl?search_terms='$search'&search_simple=1&action=process&json=1&page=$page";
// On stocke le résultat de la requête dans la variable $result et on décode le JSON
$data = json_decode(file_get_contents($url), true);
$count = $data['count'];
$maxPage = round($data['count']/20)+1;
$total = ($page-1)*20;
$reste = $count-$total;
if($reste<20){
    $k = $reste;
}else{
    $k = 20;
}
?>
<div class="container">
    <div class="row">
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
        $page++;
        if($maxPage>$page){
            ?>
            <button id="showNext" class="btn btn-default" onclick="showNext('<?php echo $search;?>', <?php echo $page;?>)">Afficher les résultats suivants</button>
            <?php
        }
        ?>
    </div>
</div>