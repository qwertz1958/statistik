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

    var box = statistik.getBoxValues();
    // console.dir(box);
     
    $("#low").html(box.low); 
    $("#quartile1").html(box.q1);
    $("#quartile2").html(box.q2);
    $("#quartile3").html(box.q3);
    $("#high").html(box.high);

    
    window.boxplotGraph = new graph(document.getElementById('graph'), 100, 10, 'Chlorophyll');

    boxplotGraph.clear();
    
    var boxLow = parseInt(box.low);
    var boxQ1 = parseInt(box.q1);
    var boxQ2 = parseInt(box.q2);
    var boxQ3 = parseInt(box.q3);
    var boxHigh = parseInt(box.high);
    var boxTtl = 'Streuwerte Chlorophyll'; 

    var boxTtl = 'Streuwerte Chlorophyll'; 
    $("#interquartilsabstand").html(boxQ3 - boxQ1);
    
    if(isNaN(boxLow) || isNaN(boxQ1) || isNaN(boxQ2) || isNaN(boxQ3) || isNaN(boxHigh)){
      alert('Eingabe Daten Boxplot Fehlerhaft');
    }
    
    boxplotGraph.add_boxplot(boxLow, boxQ1, boxQ2, boxQ3, boxHigh, boxTtl);
    
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