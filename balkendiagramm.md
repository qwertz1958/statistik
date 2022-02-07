## Balkendiagramm

<pre>
	<script>
                $(document).ready(function()
                {
                    var ctx = $('#myChart');

                    var url = "/api/records/anzahlBaeume";

                    var label = [];
                    var anzahl = [];
                    var color = [];

                    


                    // leeres Diagramm
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [],
                            datasets: [
                                {
                                    label: "Anzahl Bäume",
                                    fill: true, // Fläche füllen
                                    lineTension: 0.1,
                                    // backgroundColor: "rgba(77, 77, 255,0.6)", // Balkenfarbe
                                    backgroundColor: ['rgba(0, 0, 179, 0.4)'], // Balkenfarbe
                                    borderColor: "rgba(0, 0, 0, 1)", // Balkenrand
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
                                    data: [],
                                    spanGaps: false,
                                }
                            ]
                        },
                        options: {
                            tooltips: {
                                mode: 'index',
                                intersect: false
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:false
                                    }
                                }]
                            }
                        }
                    });

                    $.get( url, function( data ) {
                        var j = data.length;

                        for(var i = 0; i < j; i++){
                            
                            label.push(data[i].label);
                            anzahl.push(data[i].anzahl);
                        }

                        // console.dir(color);
                        myChart.data.labels = label;
                        myChart.data.datasets[0].data = anzahl; // or you can iterate for multiple datasets

                        myChart.update(); // finally update our chart 
                    });
                    
                });

            </script>
</pre>