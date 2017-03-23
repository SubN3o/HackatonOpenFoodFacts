<?php
include 'bdd.php';
include 'header.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);
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
                ?>
                <div class="col-xs-3">
                    <a href="#" class="thumbnail">
                        <img src="<?= $img?>" alt="Image du produit" class="search-img" />
                        <h1><?= $name?></h1>
                        <h1><?= $i?></h1>
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
