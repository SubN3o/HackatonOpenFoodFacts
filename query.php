<?php
include 'bdd.php';
$Tbien = array('Tu as une alimentation parfaite', 'Tu es une légende vivante chez les nuitritionistes', 'Tu manges 5 fruits et légumes ... par repas');
$bien = array('Ton alimentation est saine et équilibrée, et tu t\'accordes de petits plaisirs de temps à autres', 'Ton maraicher est ton ami', 'Mangez des pommes');
$moyen = array('Faire un régime s\'est bien, le respecter s\'est mieux', 'Tu es comme l\'aiguille de la balance, tu zigzag avant de t\'arrêter sur ton poids de croisière', 'Peu mieux faire');
$mal = array('Continue comme cela, et tu risques de tenir le rôle principal dans Super Size Me 2', 'L\'industrie de la restauration rapide ne se relèvera pas de ta disparition', 'Continue comme cela et tu deviendra un chef d\'oeuvre de l\'art moderne');
$Tmal = array('Pompes Funèbres 45 : 99.99.99.99.99, ventes en gros', 'Plus besoin de boués à la mer', 'Comme une tortue, vous risquez de vous retrouvez coincé sur le dos', 'Comme dit le dicton : Plus s\'est gros, mieux cela passe');
if($_GET['query']=='sportInfo'){
    $query = mysqli_query($bdd, "SELECT * FROM sports WHERE sport='".$_GET['value']."'");
    $data = mysqli_fetch_assoc($query);
    echo $data['kcal/h'];
}else if($_GET['query']=='addBasket'){
    if(!isset($_SESSION['basket'])){
        $_SESSION['basket'] = '';
    }
    $_SESSION['basket'][] = $_GET['id'];
}else if($_GET['query']=='getBasket'){
    if($_GET['basket']!=NULL){
        $basket = explode(',', $_GET['basket']);
        $array = array();
        foreach($basket as $id){
            $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
            $data = json_decode(file_get_contents($url), true);
            //On convertit les Kj pour 100g en Kj
            $kcal100 = $data['product']['nutriments']['energy']/4.184;
            //On récupère le poids du produit
            $quantity = $data['product']['quantity'];
            //On convertit les kcal pour 100 g en kcal pour tout le produit
            $kcal = $kcal100*$quantity/100;
            $array[] = $data['product']['nutrition_grades'];
            ?>
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img src="<?=$data['product']['image_url']?>">
                    </a>
                    <?php
                    if(isset($data['product']['nutriments']['energy'])) {
                        ?>
                        <img src="src/img/nutriscore-<?= $data['product']['nutrition_grades'] ?>.svg"><br/>
                        <?php
                    }
                    ?>
                </div>
                <div class="media-body">
                    <h1><?= $data['product']['product_name_fr']?></h1>
                    <hr />
                    <?php
                    if(isset($data['product']['nutriments']['energy'])){
                        ?>
                        <h4><?= round($kcal100) . ' ' . 'Kcal/100g'; ?></h4>
                        <h4><?= round($kcal) . ' ' . 'Kcal' . ' ' . 'pour le produit'; ?></h4>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        $score = score($array);
        if($score==1){
            $rand = rand(0,count($Tmal)-1);
            $phrase = $Tmal[$rand];
            $img = "nutriscore-e";
        }else if($score==2){
            $rand = rand(0,count($mal)-1);
            $phrase = $mal[$rand];
            $img = "nutriscore-d";
        }else if($score==3){
            $rand = rand(0,count($moyen)-1);
            $phrase = $moyen[$rand];
            $img = "nutriscore-c";
        }else if($score==4){
            $rand = rand(0,count($bien)-1);
            $phrase = $bien[$rand];
            $img = "nutriscore-b";
        }else if($score==5){
            $rand = rand(0,count($Tbien)-1);
            $phrase = $Tbien[$rand];
            $img = "nutriscore-a";
        }
        ?>
        <hr />
        <h3>Le score nutritionnel de votre panier : </h3>
        <img src="src/img/<?= $img ?>.svg"><br/>
        <p><?= $phrase ?></p>
        <button id="emptyBasket" onclick="emptyBasket()" class="btn btn-danger">Vider mon panier</button>
        <?php
    }
}
?>