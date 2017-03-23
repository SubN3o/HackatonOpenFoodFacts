function showNext(search, page){
    $("#showNext").remove();
    $.get("../showNext.php", {search: search, page: page},
        function(data) {
            $("#result").append(data);
        }
    );
}
$(document).ready(function() {
    $('#text').autocomplete({
        serviceUrl: '../sport.php',
        dataType: 'json'
    });
});