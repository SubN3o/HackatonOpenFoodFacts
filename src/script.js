function showNext(search, page, max){
    $.get("../showNext.php", {search: search, page: page},
        function(data) {
            $("#result").append(data);
        }
    );
    if(page<max){
        page++;
    }else{
        $("#showNext").remove();
    }
    document.getElementById("showNext").setAttribute( "onClick", "showNext('"+search+"', "+page+", "+max+")" );
}