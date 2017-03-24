function sportSearch(){
    var sport = document.getElementById('text').value;
    $.get("../query.php", {query: 'sportInfo', value: document.getElementById('text').value},
        function(data) {
            var classe = $(".productKCAL100");
            classe.each(function(index, elem){
                var value = $(elem).text();
                var kcal100 = Math.round(value/data);
                document.getElementById('productKCAL100-result-'+this.id+'').innerHTML = kcal100;
            });
            var classe2 = $(".productKCAL");
            classe2.each(function(index2, elem2){
                var value2 = $(elem2).text();
                var kcal = Math.round(value2/data);
                document.getElementById('productKCAL-result-'+this.id+'').innerHTML = kcal;
            });
        }
    );
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
});
function addBasket(id){
    var basket = sessionStorage.getItem('basket');
    if(basket!=undefined){
        sessionStorage.setItem('basket', basket+', '+id);
    }else{
        sessionStorage.setItem('basket', id);
    }
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
