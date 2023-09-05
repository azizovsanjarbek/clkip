<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>jQuery Ajax Example</title>

    <link rel="stylesheet" href="src/assets/css/styles.min.css" />



  </head>

  <body>
     <div id="chart"></div>

    <script>
      
        var options = {
          series: [
            name: "sales:", data: [123, 390, 300, 350, 390, 180, 355, 390]
          ],
          chart: {
          height: 350,
          type: 'bar',
        },
        dataLabels: {
          enabled: false
        },
        title: {
          text: 'Ajax Example',
        },
        noData: {
          text: 'Loading...'
        },
        xaxis: {
          type: 'category',
          tickPlacement: 'on',
          labels: {
            rotate: -45,
            rotateAlways: true
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
       
      });
      
    </script>
    <script src="src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>

    
  </body>
</html>