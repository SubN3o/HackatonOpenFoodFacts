<DOCTYPE html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
<?php
$error = 0;
$_POST['id']=7622210444936;
if(isset($_POST['id'])){
    $id = $_POST['id'];
    // On initialise la BDD
   $url = "http://fr.openfoodfacts.org/api/v0/produit/$id.json";
    // On stocke le résultat de la requête dans la variable $result et on décode le JSON
    $data = json_decode(file_get_contents($url), true);
/*    var_dump($data);*/
/*    echo $data['product']['nutriments']['energy'];*/
}else{
    $error++;
}
if($error>0){
    echo 'Une erreur s\'est produite';
}
?>

<h1><?= $data['product']['product_name_fr']?></h1>

    <img src="<?=$data['product']['image_url']?>"><br/>

    <img src="nutriscore-<?= $data['product']['nutrition_grades']?>.svg"><br/>

    <h3>Pour plus d'information sur le produit : cliquez sur ce <a href="https://fr.openfoodfacts.org/produit/<?=$data['code']?>">lien</a></h3><br/>

    </body>
</DOCTYPE>