<?php
include 'bdd.php';
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
    $basket = explode(',', $_GET['basket']);
    $total = 0;
    foreach($basket as $id){
        $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
        $data = json_decode(file_get_contents($url), true);
        //On convertit les Kj pour 100g en Kj
        $kcal100 = $data['product']['nutriments']['energy']/4.184;
        //On récupère le poids du produit
        $quantity = $data['product']['quantity'];
        //On convertit les kcal pour 100 g en kcal pour tout le produit
        $kcal = $kcal100*$quantity/100;
        ?>
            <h1><?= $data['product']['product_name_fr']?></h1>
            <img src="<?=$data['product']['image_url']?>"><br/>

            <img src="nutriscore-<?= $data['product']['nutrition_grades']?>.svg"><br/>

            <p><?= round($kcal100).' '.'Kcal/100g';?></p><br/>
            <p><?= round($kcal).' '.'Kcal'.' '.'pour le produit';?></p>

            <h3>Pour plus d'information sur le produit : cliquez sur ce <a href="https://fr.openfoodfacts.org/produit/<?=$data['code']?>">lien</a></h3><br/>
        <?php
        $total += $kcal;
    }
    ?>
    <p>Vous avez consommé un total de <?=$total?></p>
    <?php
}
?>