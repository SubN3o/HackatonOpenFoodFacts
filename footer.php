<footer class="text-center">
    <?php
    if ($position != 'index') {
        ?>
        <div class="container-fluid" id="footer-autre">
            <div class="marge-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <a class="logo-wild" href="https://wildcodeschool.fr/"><img src="src/img/logo_small_orange.png"></a>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="style-footer">
                            Créé par Jérémie, Quentin et Nicolas P,<br/>élèves de la Wild Code School
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <a class="logo-open" href="https://fr.openfoodfacts.org/"><img
                                    src="src/img/open-food-facts.png"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div>
                            <a class="mentions" href="mention_legales.php">Mentions Legales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
    } else {
        ?>
        <div class="container-fluid" id="footer-index">
            <div class="marge-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <a class="logo-wild-mini" href="https://wildcodeschool.fr/"><img src="src/img/logo_small_nb_horizontal.png"></a>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="style-footer">
                            Créé par Jérémie, Quentin et Nicolas P,<br/>élèves de la Wild Code School
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <a class="logo-open-mini" href="https://fr.openfoodfacts.org/"><img src="src/img/open-food-facts-noir-et-blanc.png"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div>
                            <a class="mentions" href="mention_legales.php">Mentions Legales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
    }
    ?>

</footer>
<script src="src/jquery-3.1.1.min.js"></script>
<script src="src/bootstrap/js/bootstrap.min.js"></script>
<script src="src/autocomplete.js"></script>
<script src="src/script.js"></script>
</body>
</html>