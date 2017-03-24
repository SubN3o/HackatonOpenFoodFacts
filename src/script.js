function showNext(search, page){
    $("#showNext").remove();
    $.get("../showNext.php", {search: search, page: page},
        function(data) {
            $("#result").append(data);
        }
    );
}
function sportSearch(){
    var sport = document.getElementById('text').value;
    $.get("../query.php", {query: 'sportInfo', value: document.getElementById('text').value},
        function(data) {
            var classe = $(".productKCAL100");
            classe.each(function(index, elem){
                var value = $(elem).text();
                var kcal100 = Math.round((value*4.18)/data);
                document.getElementById('productKCAL100-result-'+this.id+'').innerHTML = kcal100;
            });
            var classe = $(".productKCAL");
            classe.each(function(index, elem){
                var value = $(elem).text();
                var kcal = Math.round((value*)/data);
                document.getElementById('productKCAL100-result-'+this.id+'').innerHTML = kcal100;
            });
        }
    );
}
$(document).ready(function() {
    $('#text').autocomplete({
        serviceUrl: '../sport.php',
        dataType: 'json'
    });
});