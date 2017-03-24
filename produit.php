<?php
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
    $kcal100 = $data['product']['nutriments']['energy']/4.184;
    //On récupère le poids du produit
    $quantity = $data['product']['quantity'];
    //On convertit les kcal pour 100 g en kcal pour tout le produit
    $kcal = $kcal100*$quantity/100;
/*    while($sports = mysqli_fetch_assoc($query)){
        //On calcule le temps nécessaire pour bruler les calories de 100g et du produit
        $time100 = round($kcal100/$sports['kcal/h']);
        $time = round($kcal/$sports['kcal/h']);
        echo 'En pratiquant '. $sports['sport'].',il vous faudra '.$time100.' heures pour bruler les calories de 100g de '.$data['product']['product_name'].'. IL vous faudr '.$time.' heures pour bruler les calories de tout le produit <br />';
    }*/

//var_dump($data);
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
?>
<h1><?= $data['product']['product_name_fr']?></h1>
<button id="addBasket" onclick="addBasket(<?=$data['product']['code']?>)">Ajouter au panier</button>
    <img src="<?=$data['product']['image_url']?>"><br/>

    <img src="nutriscore-<?= $data['product']['nutrition_grades']?>.svg"><br/>

    <p><?= round($kcal100).' '.'Kcal/100g';?></p><br/>
    <p><?= round($kcal).' '.'Kcal'.' '.'pour le produit';?></p>

    <h3>Pour plus d'information sur le produit : cliquez sur ce <a href="https://fr.openfoodfacts.org/produit/<?=$data['code']?>">lien</a></h3><br/>

<?php
include 'footer.php';
?>
