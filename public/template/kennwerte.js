$( document ).ready(function()
{
    var url = "/api/records/baumkataster?";
    var filter_von = "filter=datum,ge,";
    var filter_bis = "&filter=datum,le,";
    var spalten = '&include=chlorophyll';
    var url_new = '';

  // baut URL  
  function buildURL()
  {
    var datum_von = $("#jahr_von").val() + '-' + $("#monat_von").val() + '-01';
    var datum_bis = $("#jahr_bis").val() + '-' + $("#monat_bis").val() + '-31';

    url_new = url + filter_von + datum_von + filter_bis + datum_bis + spalten + '&order=datum';

    $("#url").html(url_new);
  }

  // Datenauswertung
  function auswertung(data)
  {
    var werte = {};
    var length = data.length;
    var clean_data = [];
    var view_content = [];

    for(var i = 0; i < length; i++)
    {
      clean_data.push(data[i].chlorophyll);
    }

    var statistik = new statisticalFunction(clean_data);
    
    // Zentralwerte
    $("#count").html(clean_data.length);
    $("#max").html(statistik.findMax());
    $("#min").html(statistik.findMin());
    $("#median").html(statistik.calcMedian());
    $("#modus").html(statistik.calcMode());
    $("#mean").html(statistik.calcMeanArithmetic());

    // Streuung
    $("#spannweite").html(statistik.calcSpan());
    $("#standardabweichung").html(statistik.calculateStd());
    $("#varianz").html(statistik.calculateVariance());


    
    return;
  }

  // holt Daten 
  function getData()
  {
    $.get({
      url: url_new,
      crossDomain: true,
      success: function(data)
      {
          auswertung(data);
      }
    });
  }

  $("#rechnen").on('click', function()
  {
    buildURL();
    getData();

  });
});