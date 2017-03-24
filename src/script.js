
function sportSearch(){
    var sport = document.getElementById('text').value;
    if(sport!=''){
        $.get("../query.php", {query: 'sportInfo', value: document.getElementById('text').value},
            function(data) {
                var classe = $(".productKCAL100");
                classe.each(function(index, elem){
                    var value = $(elem).text();
                    var kcal100 = Math.round(value/data*60);
                    document.getElementById('productKCAL100-result-'+this.id+'').innerHTML = "100g : "+sport+" : "+kcal100+" minutes";
                });
                var classe2 = $(".productKCAL");
                classe2.each(function(index2, elem2){
                    var value2 = $(elem2).text();
                    var kcal = Math.round(value2/data*60);
                    document.getElementById('productKCAL-result-'+this.id+'').innerHTML = "Aliment entier : "+sport+" : "+kcal+" minutes";
                });
            }
        );
    }
}
function sportSearch2(Vkcal100, Vkcal){
    var sport = document.getElementById('sport').value;
    if(sport!=''){
        $.get("../query.php", {query: 'sportInfo', value: document.getElementById('sport').value},
            function(data) {
                var kcal100 = Math.round(Vkcal100/data*60);
                document.getElementById('KCAL100').innerHTML = "100g : "+sport+" : "+kcal100+" minutes";
                var kcal = Math.round(Vkcal/data*60);
                document.getElementById('KCAL').innerHTML = "Aliment entier : "+sport+" : "+kcal+" minutes";
            }
        );
    }
}
function showNext(search, page){
    $("#showNext").remove();
    $.get("../showNext.php", {search: search, page: page},
        function(data) {
            $("#result").append(data);
        }
    );
    $('#result').load(function() {
        sportSearch();
    });
}
$(document).ready(function() {
    $('#text').autocomplete({
        serviceUrl: '../sport.php',
        dataType: 'json'
    });
    $('#sport').autocomplete({
        serviceUrl: '../sport.php',
        dataType: 'json'
    });
});
function addBasket(id){
    var basket = sessionStorage.getItem('basket');
    if(basket!=undefined){
        sessionStorage.setItem('basket', basket+', '+id);
    }else{
        sessionStorage.setItem('basket', id);
    }
    $( "#addBasket" ).before("<div class=\"alert alert-info\" role=\"alert\">Ce produit a été ajouté à votre pannier</div>");
    getBasket();
}
function getBasket(){
    var basket = sessionStorage.getItem('basket');
    $.get("../query.php", {query: 'getBasket', basket: basket},
        function(data) {
            document.getElementById('basket').innerHTML = data;
        }
    );
}
getBasket();
