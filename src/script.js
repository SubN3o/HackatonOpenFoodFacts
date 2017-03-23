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
            $(".productKCAL100").each(function(){
                var kcal100 = ($(this).value*4.18)/data;
                alert(kcal100);
                document.getElementById('productKCAL100-result-'+$(this).id+'').value = kcal100;
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