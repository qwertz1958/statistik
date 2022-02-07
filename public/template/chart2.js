randomScalingFactor = function() {
    return Math.round(Math.random() * 100);
}

function getData() {
  var dataSize = 10;
  var evenBackgroundColor = 'rgba(255, 99, 132, 0.2)';
  var evenBorderColor = 'rgba(255,99,132,1)';
  var oddBackgroundColor = 'rgba(75, 192, 192, 0.2)';
  var oddBorderColor = 'rgba(153, 102, 255, 1)';

  var labels = [];

  var scoreData = {
    label: 'Mid-Term Exam 1',
    data: [],
    backgroundColor: [],
    borderColor: [],
    borderWidth: 1,
    hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
    hoverBorderColor: 'rgba(200, 200, 200, 1)',
  };

  for (var i = 0; i < dataSize; i++) {
    scoreData.data.push(randomScalingFactor());
    labels.push("Score " + (i + 1));

    if (i % 2 === 0) {
      scoreData.backgroundColor.push(evenBackgroundColor);
      scoreData.borderColor.push(evenBorderColor);
    } else {
      scoreData.backgroundColor.push(oddBackgroundColor);
      scoreData.borderColor.push(oddBorderColor);
    }
  }

  return {
    labels: labels,
    datasets: [scoreData],
  };
};

$("#document").ready(function()
{
  var chartData = getData();
  
  var myBar = new Chart(document.getElementById("myChart").getContext("2d"), {
    type: 'bar',
    data: chartData,
    options: {
      title:{
        display: true,
        text: "Chart.js - Dynamically Data and Colors"
      },
      legend: {
        display: false
      }
    }
  });
});