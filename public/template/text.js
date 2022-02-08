$("#document").ready(function()
{
    // Erststart
    var url = "/api/records/kataster?filter=id,eq,10";

    $.get({url:url, dataType:"json"}).done(function(response){
        $("#list").view(response);
    });

    $("#query").html(url);
    
    // Button
    $("#add").on('click', function()
    {
        var appendix = $("#includes").val();

        if(appendix.trim()) {
            var url_neu = '';
            url_neu = url + "&include=" + appendix;
        }
        else
            url_neu = url;

        $.get({url:url_neu, dataType:"json"}).done(function(response){
            $("#list").view(response);
        });

        $("#query").html(url_neu);
    });
});