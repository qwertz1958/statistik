var table;

// URL für Tbelle
var tableURL = "/api/records/baumkataster"; 

$(document).ready(function()
{
    table = new Tabulator("#result", {
        ajaxURL:tableURL, //ajax URL 
        layout:"fitDataTable", // Tabelle mit Mindestbreite 
        pagination:"local",
        paginationSize:10,
        paginationSizeSelector:[10, 25, 50],
        movableColumns:true,
        columns:[
            {title:"Messung", field:"messung"},
            {title:"Baumnummer", field:"baumnummer"},
            {title:"Lat", field:"lat"},
            {title:"Lon", field:"lon"},
            {title:"Typ", field:"typ"},
            {title:"Zustand", field:"zustand", formatter:"star", formatterParams:{stars:5}, hozAlign:"center", width:120},
            {title:"Name", field:"name"},
            {title:"Information", field:"link", formatter:"link", formatterParams:{
                labelField:"link",
                target:"_blank",
            }},
            {title:"Datum", field:"datum"},
        ],
    });

   

    $(".filter-set").on('click',function()
    {
        var appendix = 'filter=';
        var filter = '';
        var i = 0;
        var append = false;

        $(".filter > select, .filter-value").each(function()
        {
            if(this.value && i < 2)
                filter += this.value + ',';
            else if(this.value && i == 2){
                filter += this.value;
                append = true;
            }

            i++;
        });
    
        if(append){
            table.clearData();
            table.setData(tableURL + '?' + appendix + filter);

            $("#query").html(tableURL + '?' + appendix + filter);

            append = false;
        }
        
        i = 0;
        filter = '';
    });

    $(".filter-clear").on('click',function()
    {
      table.clearData();
      table.setData(tableURL);

      $("#query").html(tableURL);
      $("#countRows").html(15000);

    });
});