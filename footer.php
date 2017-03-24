<footer class="text-center">
    <?php
    if($position != 'index'){

        echo '
    <div class="row">
        <div class="style-footer">
            <a class="logo-wild" href="https://wildcodeschool.fr/"><img src="logo_orange_small.jpg"></a>
            Créé par Jéremie, Quentin et Nicolas P, élèves de la Wild Code School
            <a class="logo-open" href="https://fr.openfoodfacts.org/"><img src="open-food-facts.png"></a><br/>
        </div>
    </div>';
        }else{
            echo '
    <div class="row">
        <div class="style-footer">
        <a class="logo-wild-mini" href="https://wildcodeschool.fr/"><img src="logo_small_nb_horizontal.png"></a>
        Créé par Jéremie, Quentin et Nicolas P, élèves de la Wild Code School
        <a class="logo-open-mini" href="https://fr.openfoodfacts.org/"><img src="open-food-facts-noir-et-blanc.png"></a><br/>
        </div>
    </div>';
    }
        ?>

    <a class="mentions" href="mention_legales.php">mentions legales</a><br/>



</footer>
<script src="src/jquery-3.1.1.min.js"></script>
<script src="src/bootstrap/js/bootstrap.min.js"></script>
<script src="src/autocomplete.js"></script>
<script src="src/script.js"></script>
</body>
</html>
</DOCTYPE>