<?php
include_once 'func_library.php';
$myfile = fopen("src/assets/js/dashboard.js", "w") or die("Не удается открыть файл!");
$txt = "$(function () {

  // =====================================
  // Profit
  // =====================================

  var chart = {
    series: [
      { name: \"Приход:\", data: ".$newdata." }
    ],

    chart: {
      type: \"bar\",
      height: 345,
      offsetX: -15,
      toolbar: { show: true },
      foreColor: \"#adb0bb\",
      fontFamily: 'inherit',
      sparkline: { enabled: false },
    },


    colors: [\"#5D87FF\", \"#49BEFF\"],
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: \"35%\",
        borderRadius: [6],
        borderRadiusApplication: 'end',
        borderRadiusWhenStacked: 'all'
      },
    },
    markers: { size: 0 },

    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    grid: {
      borderColor: \"rgba(0,0,0,0.1)\",
      strokeDashArray: 3,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },

    xaxis: {
      type: \"category\",
      
      categories: ".$new_date_array.",
      labels: {
        style: { cssClass: \"grey--text lighten-2--text fill-color\" },
      },
    },


    yaxis: {
      show: true,
      min: 0,
      max: 10000000,
      tickAmount: 4,
      labels: {
        style: {
          cssClass:\"grey--text lighten-2--text fill-color\",
        },
      },
    },
    stroke: {
      show: true,
      width: 3,
      lineCap: \"butt\",
      colors: [\"transparent\"],
    },


    tooltip: { theme: \"light\" },

    responsive: [
      {
        breakpoint: 600,
        options: {
          plotOptions: {
            bar: {
              borderRadius: 3,
            }
          },
        }
      }
    ]


  };

  var chart = new ApexCharts(document.querySelector(\"#chart\"), chart);
  chart.render();
  // =====================================
  // Breakup
  // =====================================
  var breakup = {
    color: \"#adb5bd\",
    series: [$all_sum_value_ostatok_3318, $all_sum_value_ostatok_3308],
    labels: [\"3318\", \"3308\"],
    chart: {
      width: 180,
      type: \"pie\",
      fontFamily: \"Plus Jakarta Sans', sans-serif\",
      foreColor: \"#adb0bb\",
    },
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },

    dataLabels: {
      enabled: false,
    },

    legend: {
      show: false,
    },
    colors: [\"#5D87FF\", \"#13DEB9\"],

    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
    tooltip: {
      theme: \"dark\",
      fillSeriesColor: false,
    },
  };

  var chart = new ApexCharts(document.querySelector(\"#breakup\"), breakup);
  chart.render();


  // =====================================
  // Breakup 2
  // =====================================
  var breakupTwo = {
    color: \"#adb5bd\",
    series: [$all_sum_value_rashod_3318, $all_sum_value_rashod_3308],
    labels: [\"3318\", \"3308\"],
    chart: {
      width: 180,
      type: \"pie\",
      fontFamily: \"Plus Jakarta Sans', sans-serif\",
      foreColor: \"#adb0bb\",
    },
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },

    dataLabels: {
      enabled: false,
    },

    legend: {
      show: false,
    },
    colors: [\"#5D87FF\", \"#13DEB9\", \"#FA896B\"],

    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
    tooltip: {
      theme: \"dark\",
      fillSeriesColor: false,
    },
  };

  var chart = new ApexCharts(document.querySelector(\"#breakupTwo\"), breakupTwo);
  chart.render();

  // =====================================
  // Breakup 3
  // =====================================
  var breakupThree = {
    color: \"#adb5bd\",
    series: [$all_sum_value_prihod_3318, $all_sum_value_prihod_3308],
    labels: [\"3318\", \"3308\"],
    chart: {
      width: 180,
      type: \"pie\",
      fontFamily: \"Plus Jakarta Sans', sans-serif\",
      foreColor: \"#adb0bb\",
    },
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },

    dataLabels: {
      enabled: false,
    },

    legend: {
      show: false,
    },
    colors: [\"#5D87FF\", \"#13DEB9\", \"#FA896B\"],

    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
    tooltip: {
      theme: \"dark\",
      fillSeriesColor: false,
    },
  };

  var chart = new ApexCharts(document.querySelector(\"#breakupThree\"), breakupThree);
  chart.render();

    // =====================================
  // Breakup 4
  // =====================================
  var breakupFour = {
    color: \"#adb5bd\",
    series: [70, 40],
    labels: [\"2022\", \"2021\"],
    chart: {
      width: 180,
      type: \"donut\",
      fontFamily: \"Plus Jakarta Sans', sans-serif\",
      foreColor: \"#adb0bb\",
    },
    plotOptions: {
      pie: {
        startAngle: 0,
        endAngle: 360,
        donut: {
          size: '75%',
        },
      },
    },
    stroke: {
      show: false,
    },

    dataLabels: {
      enabled: false,
    },

    legend: {
      show: false,
    },
    colors: [\"#5D87FF\", \"#13DEB9\", \"#FA896B\"],

    responsive: [
      {
        breakpoint: 991,
        options: {
          chart: {
            width: 150,
          },
        },
      },
    ],
    tooltip: {
      theme: \"dark\",
      fillSeriesColor: false,
    },
  };
 
  var chart = new ApexCharts(document.querySelector(\"#breakupFour\"), breakupFour);
  chart.render();
  /*#####################################################*/
  /*#################~~line chart~~######################*/
  /*#####################################################*/
  var chartline = {
    chart: {
      height: 350,
      type: \"line\",
      stacked: false
    },
    dataLabels: {
      enabled: false
    },
    colors: [\"#5D87FF\", \"#49BEFF\"],
    series: [
      {
        name: \"склад 3308\",
        data:".$prihod_date_array."
      }
    ],
    stroke: {
      curve: \"smooth\",
      width: 2,
    },
    plotOptions: {
      bar: {
        columnWidth: \"20%\"
      }
    },
    xaxis: {
      categories: $new_date_array
    },
    
    tooltip: {
      shared: false,
      intersect: true,
      x: {
        show: false
      }
    },
    tooltip: { theme: \"light\" },
    legend: {
      horizontalAlign: \"left\",
      offsetX: 40
    }
    
  };
  var chart = new ApexCharts(document.querySelector(\"#chartline\"), chartline);
  chart.render();

  /*#####################################################*/
  /*##############~~line chart end ~~####################*/
  /*#####################################################*/
  // =====================================
  // Earning
  // =====================================
  var earning = {
    chart: {
      id: \"sparkline3\",
      type: \"area\",
      height: 60,
      sparkline: {
        enabled: true,
      },
      group: \"sparklines\",
      fontFamily: \"Plus Jakarta Sans', sans-serif\",
      foreColor: \"#adb0bb\",
    },
    series: [
      {
        name: \"Earnings\",
        color:\"#49BEFF\",
        data: [25, 66, 20, 40, 12, 58, 20],
      },
    ],
    stroke: {
      curve: \"smooth\",
      width: 2,
    },
    fill: {
      colors: [\"#f3feff\"],
      type: \"solid\",
      opacity: 0.05,
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: \"dark\",
      fixed: {
        enabled: true,
        position: \"right\",
      },
      x: {
        show: false,
      },
    },
  };
  var url = 'src/assets/js/db.json';

  $.getJSON(url, function(response) {
    earning.updateSeries([{
      data: response.earning
    }])
  });
  new ApexCharts(document.querySelector(\"#earning\"), earning).render();
})";
fwrite($myfile, $txt);
fclose($myfile);
?>
