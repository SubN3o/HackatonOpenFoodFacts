<?php
$position = 'produit';
include 'navbar.php';
include 'bdd.php';
include 'header.php';
$error = 0;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    // On initialise la BDD
    $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
    // On stocke le résultat de la requête dans la variable $result et on décode le JSON
    $data = json_decode(file_get_contents($url), true);
    $query = mysqli_query($bdd, "SELECT * FROM sports");
    //On convertit les Kj pour 100g en Kj
    if(isset($data['product']['nutriments']['energy'])){
        $kcal100 = $data['product']['nutriments']['energy']/4.184;
        //On récupère le poids du produit
        $quantity = $data['product']['quantity'];
        //On convertit les kcal pour 100 g en kcal pour tout le produit
        $kcal = $kcal100*$quantity/100;
    }
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
?>
<div class="container text-center">
    <div class="row">
        <div class="media">
            <div class="col-xs-12 col-sm-5">
                <div class="media-left">
                    <a href="#">
                        <?php
                        if(!isset($data['product']['image_url'])){
                            $img = "http://placehold.it/200x200";
                        }else {
                            $img = $data['product']['image_url'];
                        }
                        ?>
                        <img src="<?=$img?>" class="hidden-xs">
                    </a>
                    <?php
                    if(isset($data['product']['nutriments']['energy'])) {
                        ?>
                        <img src="src/img/nutriscore-<?= $data['product']['nutrition_grades'] ?>.svg"><br/>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="media-body">
                    <h1><?= $data['product']['product_name_fr']?></h1>
                    <?php
                    if(isset($data['product']['nutriments']['energy'])) {
                        ?>
                        <button id="addBasket" onclick="addBasket(<?= $data['product']['code'] ?>)" class="btn btn-primary">Ajouter au panier</button>
                        <?php
                    }
                    ?>
                    <hr />
                    <?php
                    if(isset($data['product']['nutriments']['energy'])){
                        ?>
                        <h4><?= round($kcal100) . ' ' . 'Kcal/100g'; ?></h4>
                        <h4><?= round($kcal) . ' ' . 'Kcal' . ' ' . 'pour le produit'; ?></h4>
                        <div class="form-group text-center">
                            <input type="text" id="sport" placeholder="Choisissez un sport" name="sport" class="form-control sport-select"/>
                            <button class="btn btn-primary" onclick="sportSearch2('<?= $kcal100 ?>', '<?= $kcal ?>')">
                                Calculer
                            </button>
                        </div>
                        <p id="KCAL100"></p>
                        <p id="KCAL"></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <p>Pour plus d'information sur le produit : <a href="https://fr.openfoodfacts.org/produit/<?=$data['code']?>">Cliquez ici</a></p><br/>
    </div>
    <br/>
</div>
<?php
include 'footer.php';
?>
