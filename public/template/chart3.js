var url = '/api/records/anzahlBaeume';

var label = [];
var anzahl = [];
var color = ['#ff1a1a','#0040ff','#00cc00','#e6ac00','#00b33c','#ff4000','#ac3973','#ac3939','#66ff33','#b35900'];

var ctx = $('#myChart');


function auswertung(data)
{
    var length = data.length;

    for(var i = 0; i < length; i++){
        label[i] = data[i].label;
        anzahl[i] = data[i].anzahl;
    }

    diagramm();
}

function diagramm()
{
    // leeres Diagramm
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: label,
            responsive: true,
            datasets: [
                {
                    label: "Anzahl Bäume",
                    lineTension: 0.1,
                    backgroundColor: "rgba(77, 77, 255,0.6)", // Balkenfarbe
                    backgroundColor: color, // Farben
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: "rgba(75,192,192,1)",
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointHoverBorderWidth: 2,
                    hoverBackgroundColor: 'rgba(200, 200, 200, 1)', // Maus über Abschnitt
                    hoverBorderColor: 'rgba(200, 200, 200, 1)', // Maus über Abschnitt
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: anzahl,
                    spanGaps: false,
                }
            ]
        },
        options: {
            tooltips: {
                mode: 'index',
                intersect: false
            }
        }
    });
}

// Start
$.get({
    url: url,
    success: function(data)
    {
        auswertung(data);
    }
});