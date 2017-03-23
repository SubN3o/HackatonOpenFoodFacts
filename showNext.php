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
            ?>
            <div class="col-xs-3">
                <a href="produit.php?id=<?= $data['products'][$i]['code']?>" class="thumbnail">
                    <div class="img-div">
                        <img src="<?= $img?>" alt="Image du produit" class="search-img" />
                    </div>
                    <span class="hidden" class="productKCAL100" id="productKCAL100-<?=$data['products'][$i]['code'];?>"><?= $kcal100?></span>
                    <span class="hidden" class="productKCAL" id="productKCAL-<?=$data['products'][$i]['code'];?>"><?= $kcal?></span>
                    <h1><?= $name?></h1>
                    <div class="product-sport"></div>
                </a>
            </div>
            <?php
        }
        $page++;
        if($maxPage>$page){
            ?>
            <button id="showNext" onclick="showNext('<?php echo $search;?>', <?php echo $page;?>)">Afficher les résultats suivants</button>
            <?php
        }
        ?>
    </div>
</div>