document.addEventListener('DOMContentLoaded', function () {
  var ctx = document.getElementById('Chart').getContext('2d');
  var add_button = document.getElementById('add');

  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: days,
      datasets: [{
        label: 'Hours Assigned',
        data: totalHours,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Number of Lecture Hours on each day of the Week',
          font: {
            size: 18, // Increase font size for the title
            weight: 'bold' // Make title bold
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: "# of Hours",
            font: {
              weight: 'bold',
              size: 13
            }
          }
        },
        x: {
          title: {
            display: true,
            text: "Day of Week",
            font: {
              weight: 'bold',
              size: 13
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

  add_button.addEventListener('click',() => {
    document.getElementById('requestSubjects').style.display = 'block';
  });
}
);


document.getElementById('subjects').addEventListener('click',()=>{
  window.location.href = urlroot + "/Lecturer/viewSubjects/";
})

document.getElementById('details').addEventListener('click',()=>{
  window.location.href = urlroot + "/Lecturer/viewProfile/";
})
