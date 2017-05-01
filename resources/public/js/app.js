// function articles
$(document).ready(function(){
    berita(0);

    $("#load_more_berita").click(function(e){
        e.preventDefault();
        var page = $(this).data('val');
        berita(page);

    });
});

var berita = function(page){
    $("#loader").show();
    $("#load_more_berita").show();
    $.ajax({
        url: BASE_URL+"home/get_berita",
        type:'GET',
        data: {page:page}
    }).done(function(response){
        $("#berita").append(response);
        $("#loader").hide();
        $('#load_more_berita').data('val', ($('#load_more_berita').data('val')+1));
        //scroll();
        if(response == ""){
            $("#load_more_berita").hide();
        }
    });
};