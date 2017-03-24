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
        <h4><?= round($kcal100) . ' ' . 'Kcal/100g'; ?></h4>
        <h4><?= round($kcal) . ' ' . 'Kcal' . ' ' . 'pour le produit'; ?></h4>
        <?php
        $total += $kcal;
    }
    ?>
    <p>Votre panier contient un total de <?=round($total)?> kCal.</p>
    <?php
}
?>