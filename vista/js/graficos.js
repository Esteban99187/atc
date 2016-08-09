$(function () {
        $('#containerbar').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Solicitudes por usuarios trimestrales'
            },
            credits:{
                        enabled: true,
                        text:''
            },
           
            xAxis: {
                categories: [
                    'Julio',
                    'Agosto',
                    'Septiembre'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
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
                name: 'Capacitacion',
                data: [49.9, 71.5, 106.4]
    
            }, {
                name: 'Inspeccion',
                data: [83.6, 78.8, 98.5]
    
            }, {
                name: 'Siniestros',
                data: [48.9, 38.8, 39.3]
    
            }]
        });
    });
    

$(function () {
      
      // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function(color) {
        return {
            radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });
    
    // Build the chart
        $('#containerrou').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Porcentajes de siniestros desde el 2013 al 2014'
            },
            credits:{
                        enabled: true,
                        href: 'http://google.com',
                        position:null,
                        style:null,
                        text:'jorge'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer'
                    ,dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Porcentaje',
                data: [
                    {
                        name: 'Vehiculares',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    },
                    ['Inmuebles',    8.5],

                ]
            }]
        });
    });

