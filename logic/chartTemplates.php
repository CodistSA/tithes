<?php
$pieChart="
<script type='text/javascript'>
  Highcharts.chart('pieChart', {
    chart: {
      type: 'pie',
      options3d: {
        enabled: true,
        alpha: 45,
        beta: 0
      },
      credits: false
    },
    title: {
      text: '<heading>'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        depth: 30,
        dataLabels: {
          enabled: true,
          format: '{point.name}'
        }
      }
    },
    series: [{
      type: 'pie',
      name: 'Total stars collected',
      data: [
        <source>
      ]
    }]
  });
</script>";

$columnChart="
<script type='text/javascript'>
  Highcharts.chart('<div>', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: 'live updated'
    },
    xAxis: {
        categories:
          <category>
        ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Number of Complaints'
        }
    },
    tooltip: {
        headerFormat: '<span style=\"font-size:14px\"><b><u>{point.key}</u></b></span><table>',
        pointFormat: '<tr><td style=\"color:{series.color};padding:0\">{series.name} </td>' +
            '<td style=\"padding:0\"> = <b>{point.y} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [<series>]
});
</script>";

$columnChart_bu="
<script type='text/javascript'>
  Highcharts.chart('<div>', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories:
          <category>
        ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style=\"font-size:10px\">{point.key}</span><table>',
        pointFormat: '<tr><td style=\"color:{series.color};padding:0\">{series.name}: </td>' +
            '<td style=\"padding:0\"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
</script>";


?>