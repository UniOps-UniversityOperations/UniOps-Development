document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('Chart').getContext('2d');
  
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: days,
        datasets: [{
          label: 'Hours Assigned',
          data: totalHours, // Example data (replace with actual data)
          backgroundColor: 'rgba(54, 162, 235, 0.2)', // Fill color
          borderColor: 'rgba(54, 162, 235, 1)', // Line color
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            title : {
              display : true,
              text : "# of Hours",
              font : {
                weight : 'bold',
                size : 13
              }
            }
          },
          x : {
            title : {
              display : true,
              text : "Day of Week",
              font : {
                weight : 'bold',
                size : 13
              }
            }
          }
        }
      }
    });

     // Optional: Resize the chart when the window is resized
     window.addEventListener('resize', function () {
      myChart.resize();
  });

});
  