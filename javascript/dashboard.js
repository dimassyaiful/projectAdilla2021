$(document).ready(function () {
  GetDataImport();
  GetDataExport();
});

function GetDataImport() {
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "../process/dashboard.process.php",
    data: {
      type: "import",
    },
    success: function (response) {
      RenderChartImport(response);
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function GetDataExport() {
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "../process/dashboard.process.php",
    data: {
      type: "export",
    },
    success: function (response) {
      RenderChartExport(response);
    },
    error: function (err) {
      console.log(err);
    },
  });
}

function RenderChartImport(data) {
  var bulan = [];
  var total = [];

  data.map((e) => {
    bulan.push(e.bulan);
    total.push(parseInt(e.total));
  });

  Highcharts.chart("chartImport", {
    chart: {
      type: "column",
    },
    title: {
      text: "Data Import",
    },
    xAxis: {
      categories: bulan,
      crosshair: true,
    },
    yAxis: {
      min: 0,
      title: {
        text: "Total",
      },
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0,
      },
    },
    series: [
      {
        name: "Month",
        data: total,
      },
    ],
  });
}

function RenderChartExport(data) {
  var bulan = [];
  var total = [];

  data.map((e) => {
    bulan.push(e.bulan);
    total.push(parseInt(e.total));
  });

  Highcharts.chart("chartExport", {
    chart: {
      type: "column",
    },
    title: {
      text: "Data Export",
    },
    xAxis: {
      categories: bulan,
      crosshair: true,
    },
    yAxis: {
      min: 0,
      title: {
        text: "Total",
      },
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0,
      },
    },
    series: [
      {
        name: "Month",
        data: total,
      },
    ],
  });
}
