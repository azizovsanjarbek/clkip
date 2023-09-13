$(function () {

  // =====================================
  // Profit
  // =====================================

  var chart = {
    series: [
      { name: "Приход:", data: [1890826,2297604,7244552,1682926,1377799,10154140,8226619,1315537,1523437,1315537,0,0] }
    ],

    chart: {
      type: "bar",
      height: 345,
      offsetX: -15,
      toolbar: { show: true },
      foreColor: "#adb0bb",
      fontFamily: 'inherit',
      sparkline: { enabled: false },
    },


    colors: ["#5D87FF", "#49BEFF"],
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: "35%",
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
      borderColor: "rgba(0,0,0,0.1)",
      strokeDashArray: 3,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },

    xaxis: {
      type: "category",
      
      categories: ["1\/09","2\/09","3\/09","4\/09","5\/09","6\/09","7\/09","8\/09","9\/09","10\/09","11\/09","12\/09"],
      labels: {
        style: { cssClass: "grey--text lighten-2--text fill-color" },
      },
    },


    yaxis: {
      show: true,
      min: 0,
      max: 10000000,
      tickAmount: 4,
      labels: {
        style: {
          cssClass:"grey--text lighten-2--text fill-color",
        },
      },
    },
    stroke: {
      show: true,
      width: 3,
      lineCap: "butt",
      colors: ["transparent"],
    },


    tooltip: { theme: "light" },

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

  var chart = new ApexCharts(document.querySelector("#chart"), chart);
  chart.render();
  // =====================================
  // Breakup
  // =====================================
  var breakup = {
    color: "#adb5bd",
    series: [2128566.4, 3228925.33],
    labels: ["3308", "3318"],
    chart: {
      width: 180,
      type: "pie",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
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
    colors: ["#5D87FF", "#13DEB9"],

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
      theme: "dark",
      fillSeriesColor: false,
    },
  };

  var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
  chart.render();


  // =====================================
  // Breakup 2
  // =====================================
  var breakupTwo = {
    color: "#adb5bd",
    series: [20, 100],
    labels: ["3318", "3308"],
    chart: {
      width: 180,
      type: "pie",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
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
    colors: ["#5D87FF", "#13DEB9", "#FA896B"],

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
      theme: "dark",
      fillSeriesColor: false,
    },
  };

  var chart = new ApexCharts(document.querySelector("#breakupTwo"), breakupTwo);
  chart.render();



  // =====================================
  // Breakup 3
  // =====================================
  var breakupThree = {
    color: "#adb5bd",
    series: [70, 40],
    labels: ["2022", "2021"],
    chart: {
      width: 180,
      type: "pie",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
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
    colors: ["#5D87FF", "#13DEB9", "#FA896B"],

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
      theme: "dark",
      fillSeriesColor: false,
    },
  };

  var chart = new ApexCharts(document.querySelector("#breakupThree"), breakupThree);
  chart.render();

    // =====================================
  // Breakup 4
  // =====================================
  var breakupFour = {
    color: "#adb5bd",
    series: [70, 40],
    labels: ["2022", "2021"],
    chart: {
      width: 180,
      type: "donut",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
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
    colors: ["#5D87FF", "#13DEB9", "#FA896B"],

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
      theme: "dark",
      fillSeriesColor: false,
    },
  };
 
  var chart = new ApexCharts(document.querySelector("#breakupFour"), breakupFour);
  chart.render();
  /*#####################################################*/
  /*#################~~line chart~~######################*/
  /*#####################################################*/
  var chartline = {
    chart: {
      height: 350,
      type: "line",
      stacked: false
    },
    dataLabels: {
      enabled: false
    },
    colors: ["#5D87FF", "#49BEFF"],
    series: [
      {
        name: "склад 3308",
        data:[10399118,9074403,50125031,2575708,2601381,18147065,8436819,13901515,6189436,8596836,0,0]
      }
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    plotOptions: {
      bar: {
        columnWidth: "20%"
      }
    },
    xaxis: {
      categories: ["1\/09","2\/09","3\/09","4\/09","5\/09","6\/09","7\/09","8\/09","9\/09","10\/09","11\/09","12\/09"]
    },
    
    tooltip: {
      shared: false,
      intersect: true,
      x: {
        show: false
      }
    },
    tooltip: { theme: "light" },
    legend: {
      horizontalAlign: "left",
      offsetX: 40
    }
    
  };
  var chart = new ApexCharts(document.querySelector("#chartline"), chartline);
  chart.render();

  /*#####################################################*/
  /*##############~~line chart end ~~####################*/
  /*#####################################################*/
  // =====================================
  // Earning
  // =====================================
  var earning = {
    chart: {
      id: "sparkline3",
      type: "area",
      height: 60,
      sparkline: {
        enabled: true,
      },
      group: "sparklines",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
    },
    series: [
      {
        name: "Earnings",
        color:"#49BEFF",
        data: [25, 66, 20, 40, 12, 58, 20],
      },
    ],
    stroke: {
      curve: "smooth",
      width: 2,
    },
    fill: {
      colors: ["#f3feff"],
      type: "solid",
      opacity: 0.05,
    },

    markers: {
      size: 0,
    },
    tooltip: {
      theme: "dark",
      fixed: {
        enabled: true,
        position: "right",
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
  new ApexCharts(document.querySelector("#earning"), earning).render();
})