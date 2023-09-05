<?
$myfile = fopen("src/assets/js/dashboard.js", "w") or die("Не удается открыть файл!");


$txt = "$(function () {


  // =====================================
  // Profit
  // =====================================

  var chart = {
    series: [
      { name: \"Earnings this month:\", data: [123, 390, 300, 350, 390, 180, 355, 390] },
      { name: \"Expense this month:\", data: [200, 220, 325, 215, 250, 310, 280, 250] },
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
      categories: [\"15/08\",\"16/08\", \"17/08\", \"18/08\", \"19/08\", \"20/08\", \"21/08\", \"22/08\", \"23/08\"],
      labels: {
        style: { cssClass: \"grey--text lighten-2--text fill-color\" },
      },
    },


    yaxis: {
      show: true,
      min: 0,
      max: 400,
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
    series: [200, 100],
    labels: [\"3308\", \"3318\"],
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
    series: [20, 100],
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
    series: [70, 40],
    labels: [\"2022\", \"2021\"],
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
  var url1 = 'src/assets/js/db.json';

$.getJSON(url1, function(response1) {
  chart.updateSeries([{
    data: response1.TotalInCome
  }])
});
 
  var chart = new ApexCharts(document.querySelector(\"#breakupFour\"), breakupFour);
  chart.render();
  /*#####################################################*/
  /*#################~~line chart~~######################*/
  /*#####################################################*/
  var chartline = {
    chart: {
      height: 350,
      type: \"line\",
      stacked: false,
      toolbar: { 
        show: true,
        offsetX: 0,
        offsetY: 0,
        tools: {
          download: true,
          selection: false,
          zoom: false,
          zoomin: false,
          zoomout: false,
          pan: false,
          reset: false | '<img src=\"/static/icons/reset.png\" width=\"20\">',
          customIcons: []
        }
      },
      foreColor: \"#adb0bb\",
      fontFamily: 'inherit',
      sparkline: { enabled: false },
    },
    markers: { size: 0 },
    dataLabels: {
      enabled: false,
    },
    legend: {
      show: false,
    },
    colors: [\"#5D87FF\", \"#49BEFF\"],
    series: [
      {
        name: \"monthly\",
        data: [14, 20, 25, 15, 25, 28, 38, 46]
      },
      {
        name:\"monthly2\",
        data: [13, 19, 24, 14, 24, 27, 37, 45]
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
      categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016]
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
  var url = 'src/assets/js/db.json';

$.getJSON(url, function(response) {
  chart.updateSeries([{
    
        name: \"monthly\",
        data: response.monthlyOutCome
  }])
});

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
  new ApexCharts(document.querySelector(\"#earning\"), earning).render();
})";
fwrite($myfile, $txt);
fclose($myfile);
?>
