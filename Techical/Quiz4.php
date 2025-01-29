<!-- Use any JS library to display a bar chart and a pie chart from the data retrieved from -->
<!-- 
Condition
    https://www.trcloud.co/test/api.php through an AJAX call.

-->

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dynamic Charts with API Data</title>
  <link rel="stylesheet" href="./css/style.css">

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

</head>
<body>
  <div class="chartCard">
    <div class="">
      <canvas id="barChart" style="display:block; width:750px; height:500px;"></canvas>
    </div>
    <div class="">
      <canvas id="pieChart" style="display:block; width:550px; height:500px;"></canvas>
    
    </div>
  </div>
  

  <script>
    // Fetch data from the API
    async function fetchData() {
      const url = 'https://www.trcloud.co/test/api.php';
      try {
        const response = await fetch(url);
        const data = await response.json();

        // Extract data from the API response
        const city = data.map(item => item.City); // Extract city names
        const populations = data.map(item => parseInt(item.Population)); // Extract populations as numbers

        // Update the charts with API data
        updateBarChart(city, populations);
        updatePieChart(city, populations);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }

    // Bar chart configuration
    const barChart = new Chart(document.getElementById('barChart'), {
      type: 'bar',
      data: {
        labels: [], // Placeholder for labels
        datasets: [{
          label: 'Population by City',
          data: [], // Placeholder for data
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(0, 0, 0, 0.2)',
            'rgba(100, 149, 237, 0.2)',
            'rgba(46, 139, 87, 0.2)',
            'rgba(255, 215, 0, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(0, 0, 0, 1)',
            'rgba(100, 149, 237, 1)',
            'rgba(46, 139, 87, 1)',
            'rgba(255, 215, 0, 1)',
          ],
          borderWidth: 1,
        }]  
        },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    });

    // Pie chart configuration
    const pieChart = new Chart(document.getElementById('pieChart'), {
      type: 'pie',
      plugins: [ChartDataLabels],
      data: {
        labels: [], // Placeholder for labels
        datasets: [{
          label: 'Population by City',
          data: [], // Placeholder for data
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(0, 0, 0, 0.2)',
            'rgba(100, 149, 237, 0.2)',
            'rgba(46, 139, 87, 0.2)',
            'rgba(255, 215, 0, 0.2)',
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(0, 0, 0, 1)',
            'rgba(100, 149, 237, 1)',
            'rgba(46, 139, 87, 1)',
            'rgba(255, 215, 0, 1)',
          ],
          borderWidth: 1,
        }],
      },
      options:{
        plugins:{
            datalabels:{
                color: '#000',
                font:{
                    size: 12,
                },
                formatter: (value) => {
                    if(value >= 1000000){
                        return (value/1000000).toFixed(2) + 'M';
                    }
                    else if(value >= 1000){
                        return (value/1000).toFixed(0) + 'k';
                    }
                    return value.toSting();
                }
            }
        }
      }
    });

    // Function to update Bar Chart with dynamic data
    function updateBarChart(labels, data) {
      barChart.data.labels = labels;
      barChart.data.datasets[0].data = data;
      barChart.update();
    }

    // Function to update Pie Chart with dynamic data
    function updatePieChart(labels, data) {
      pieChart.data.labels = labels;
      pieChart.data.datasets[0].data = data;
      pieChart.update();
    }

    // Fetch and populate data on page load
    fetchData();
  </script>
</body>
</html>
