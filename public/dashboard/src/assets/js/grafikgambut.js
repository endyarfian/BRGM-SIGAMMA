// Di dalam file JavaScript Anda
window.addEventListener("load", function(){ 
    try {
        getcorkThemeObject = localStorage.getItem("theme");
        getParseObject = JSON.parse(getcorkThemeObject)
        ParsedObject = getParseObject;

$.ajax({
    url: '/gambut/data-dashboard',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
        // Sekarang data tersedia sebagai objek JavaScript
        console.log(response);

        // Mengakses semua data dari respons
        var data_luasan = response.data_luasan.data;
        var kodeprov = response.kodeprov;
        var khg = response.khg;
        var subkhg = response.subkhg;
        var hru = response.hru;
        var totalluas = response.totalluas;
        var totalluasNumber = parseFloat(totalluas);
        var formattedTotalluas = totalluasNumber.toFixed(2);
        var stackbarkategori = response.stackbarkategori;
        var stackbarseri = response.stackbarseri;

                    if (ParsedObject.settings.layout.darkMode) {
                        var Theme = 'dark';
                        Apex.tooltip = {
                            theme: Theme
                        }
                        // kawasan
                        var kawasan = {
                            chart: {
                                fontFamily: 'Lexend, sans-serif',
                                height: 350,
                                type: 'bar',
                                toolbar: {
                                    show: true,
                                }
                            },
                            colors: ['#5E9338', '#FFC94D', '#F07C15', ],
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded',
                                    borderRadius: 5,

                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            legend: {
                                position: 'bottom',
                                horizontalAlign: 'center',
                                fontSize: '14px',
                                markers: {
                                    width: 10,
                                    height: 10,
                                    offsetX: -5,
                                    offsetY: 0
                                },
                                itemMargin: {
                                    horizontal: 10,
                                    vertical: 8
                                }
                            },
                            grid: {
                                borderColor: '#191e3a',
                                strokeDashArray: 4,
                                yaxis: {
                                    lines: {
                                        show: true
                                    }
                                }
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            series: [{
                                name: 'KHG',
                                data: khg
                            }, {
                                name: 'Sub-KHG',
                                data: subkhg
                            }, {
                                name: 'HRU',
                                data: hru
                            }],
                            xaxis: {
                                categories: kodeprov,
                            },
                            subtitle: {
                                text: `${formattedTotalluas} Ha`,
                                align: 'left',
                                margin: 0,
                                offsetX: 110,
                                offsetY: 0,
                                floating: false,
                                style: {
                                    fontSize: '13px',
                                    color: '#F07C15'
                                }
                            },
                            title: {
                                text: 'Total Luasan ',
                                align: 'left',
                                margin: 0,
                                offsetX: 12,
                                offsetY: 0,
                                floating: false,
                                style: {
                                    fontSize: '13px',
                                    color: '#5E9338'
                                },
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shade: Theme,
                                    type: 'vertical',
                                    shadeIntensity: 0.3,
                                    inverseColors: false,
                                    opacityFrom: 1,
                                    opacityTo: 0.8,
                                    stops: [0, 100]
                                }
                            },
                            tooltip: {
                                marker: {
                                    show: false,
                                },
                                theme: Theme,
                                y: {
                                    formatter: function(val) {
                                        return val
                                    }
                                }
                            },
                            responsive: [{
                                breakpoint: 767,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 0,
                                            columnWidth: "50%"
                                        }
                                    }
                                }
                            }, ]
                        }
                        // end
                        var luasan = {
                            series: [{ data: data_luasan }],
                            legend: {
                                show: false
                            },
                            chart: {
                                fontFamily: 'Lexend, sans-serif',
                                height: 345,
                                type: 'treemap',
                            },
                            stroke: {
                                width: 0,
                                color: '#191e3a',
                            },
                            colors: [
                                '#5E9338',
                                '#7FA027',
                                '#A0AD15',
                                '#C1BA04',
                                '#E1630D',
                                '#F14311',
                                '#F07C15',
                            ],
                            plotOptions: {
                                treemap: {
                                    distributed: true,
                                    enableShades: true,

                                }
                            }
                        };

                        var administrasi = {
                            
                            series: stackbarseri,
                            colors: ['#5E9338', '#FFC94D', '#F07C15', ],
                            chart: {
                                fontFamily: 'Lexend, sans-serif',
                            type: 'bar',
                            height: 370,
                            stacked: true,
                          },
                          plotOptions: {
                            bar: {
                              horizontal: true,
                              dataLabels: {
                                total: {
                                  enabled: true,
                                  offsetX: 0,
                                  style: {
                                    fontSize: '13px',
                                    fontWeight: 900
                                  }
                                }
                              }
                            },
                          },
                          stroke: {
                            width: 1,
                            colors: ['#fff']
                          },

                          xaxis: {
                            categories: stackbarkategori,
                          },
                          yaxis: {
                            title: {
                              text: undefined
                            },
                          },
                        
                          fill: {
                            opacity: 1
                          },
                          legend: {
                            position: 'top',
                            horizontalAlign: 'left',
                            offsetX: 40
                          }
                          };

                    } else {

                        var Theme = 'dark';

                        Apex.tooltip = {
                            theme: Theme
                        }
                        // kawasan
                        var kawasan = {
                            chart: {
                                fontFamily: 'Lexend, sans-serif',
                                height: 350,
                                type: 'bar',
                                toolbar: {
                                    show: true,
                                }
                            },
                            colors: ['#5E9338', '#FFC94D', '#F07C15', ],
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded',
                                    borderRadius: 5,

                                },
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            legend: {
                                position: 'bottom',
                                horizontalAlign: 'center',
                                fontSize: '14px',
                                markers: {
                                    width: 10,
                                    height: 10,
                                    offsetX: -5,
                                    offsetY: 0
                                },
                                itemMargin: {
                                    horizontal: 10,
                                    vertical: 8
                                }
                            },
                            grid: {
                                borderColor: '#e0e6ed',
                                strokeDashArray: 4,
                                yaxis: {
                                    lines: {
                                        show: true
                                    }
                                }
                            },
                            stroke: {
                                show: true,
                                width: 0,
                                colors: ['transparent']
                            },
                            series: [{
                                name: 'KHG',
                                data: khg
                            }, {
                                name: 'Sub-KHG',
                                data: subkhg
                            }, {
                                name: 'HRU',
                                data: hru
                            }],
                            xaxis: {
                                categories: kodeprov,
                            },
                            subtitle: {
                                text: `${formattedTotalluas} Ha`,
                                align: 'left',
                                margin: 0,
                                offsetX: 110,
                                offsetY: 0,
                                floating: false,
                                style: {
                                    fontSize: '13px',
                                    color: '#F07C15'
                                }
                            },
                            title: {
                                text: 'Total Luasan ',
                                align: 'left',
                                margin: 0,
                                offsetX: 12,
                                offsetY: 0,
                                floating: false,
                                style: {
                                    fontSize: '13px',
                                    color: '#5E9338'
                                },
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shade: Theme,
                                    type: 'vertical',
                                    shadeIntensity: 0.3,
                                    inverseColors: false,
                                    opacityFrom: 1,
                                    opacityTo: 0.8,
                                    stops: [0, 100]
                                }
                            },
                            tooltip: {
                                marker: {
                                    show: false,
                                },
                                theme: Theme,
                                y: {
                                    formatter: function(val) {
                                        return val
                                    }
                                }
                            },
                            responsive: [{
                                breakpoint: 767,
                                options: {
                                    plotOptions: {
                                        bar: {
                                            borderRadius: 0,
                                            columnWidth: "50%"
                                        }
                                    }
                                }
                            }, ]
                        }
                        // luasan
                        var luasan = {
                            series: [{ data: data_luasan }],
                            legend: {
                                show: false
                            },
                            chart: {
                                fontFamily: 'Lexend, sans-serif',
                                height: 345,
                                type: 'treemap',

                            },
                            stroke: {
                                width: 0,
                                color: '#191e3a',
                            },
                            colors: [
                                '#5E9338',
                                '#7FA027',
                                '#A0AD15',
                                '#C1BA04',
                                '#E1630D',
                                '#F14311',
                                '#F07C15',
                            ],
                            plotOptions: {
                                treemap: {
                                    distributed: true,
                                    enableShades: true,

                                }
                            }
                        };
                        var administrasi = {
                            
                            series: stackbarseri,
                            colors: ['#5E9338', '#FFC94D', '#F07C15', ],
                            chart: {
                                fontFamily: 'Lexend, sans-serif',
                            type: 'bar',
                            height: 370,
                            stacked: true,
                          },
                          plotOptions: {
                            bar: {
                              horizontal: true,
                              dataLabels: {
                                total: {
                                  enabled: true,
                                  offsetX: 0,
                                  style: {
                                    fontSize: '13px',
                                    fontWeight: 900
                                  }
                                }
                              }
                            },
                          },
                          stroke: {
                            width: 1,
                            colors: ['#fff']
                          },
                          xaxis: {
                            categories: stackbarkategori,
                          },
                          yaxis: {
                            title: {
                              text: undefined
                            },
                          },
                          fill: {
                            opacity: 1
                          },
                          legend: {
                            position: 'top',
                            horizontalAlign: 'left',
                            offsetX: 40
                          }
                          };
                    }
                    // render
                    var render_kawasan = new ApexCharts(document.querySelector("#kawasan"),kawasan);
                    render_kawasan.render();

                    var render_luasan = new ApexCharts(document.querySelector("#luasan"), luasan);
                    render_luasan.render();

                    var render_administrasi = new ApexCharts(document.querySelector("#administrasi"), administrasi);
                    render_administrasi.render();


                    const ps = new PerfectScrollbar(document.querySelector('.mt-container'));
                    document.querySelector('.theme-toggle').addEventListener('click', function() {
                        getcorkThemeObject = localStorage.getItem("theme");
                        getParseObject = JSON.parse(getcorkThemeObject)
                        ParsedObject = getParseObject;
                        if (ParsedObject.settings.layout.darkMode) {

                            render_kawasan.updateOptions({
                                    grid: {
                                        borderColor: '#191e3a',
                                    },
                                })

                            render_luasan.updateOptions({
                                    stroke: {
                                        width: 2,
                                        color: '#191e3a',
                                    },
                                })


                        } else {
                            render_kawasan.updateOptions({
                                    grid: {
                                        borderColor: '#e0e6ed',
                                    },
                                })

                            render_luasan.updateOptions({
                                    stroke: {
                                        width: 2,
                                        color: '#F6F4EF',
                                    },
                                })
                        }
                    })
               
        }})

    } catch (e) {
        // statements
        console.log(e);
    }
})