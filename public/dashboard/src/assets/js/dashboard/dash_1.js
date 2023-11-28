window.addEventListener("load", function(){
  try {

    getcorkThemeObject = localStorage.getItem("theme");
    getParseObject = JSON.parse(getcorkThemeObject)
    ParsedObject = getParseObject;

    if (ParsedObject.settings.layout.darkMode) {

      var Theme = 'dark';

      Apex.tooltip = {
          theme: Theme
      }
      

      /*
        ===================================
            Unique Visitors | Options
        ===================================
      */
      
      var d_1options1 = {
      chart: {
          height: 350,
          type: 'bar',
          toolbar: {
            show: false,
          }
      },
      colors: ['#622bd7', '#ffbb44'],
      plotOptions: {
          bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded',
              borderRadius: 10,
      
          },
      },
      dataLabels: {
          enabled: false
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
      },
      stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
      },
      series: [{
          name: 'KHG',
          data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]
      }, {
          name: 'Sub-KHG',
          data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]
      }, {
        name: 'HRU',
        data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]
    }
    ],
      xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
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
          marker : {
              show: false,
          },
          theme: Theme,
          y: {
              formatter: function (val) {
                  return val
              }
          }
      },
      responsive: [
          { 
              breakpoint: 767,
              options: {
                  plotOptions: {
                      bar: {
                          borderRadius: 0,
                          columnWidth: "50%"
                      }
                  }
              }
          },
      ]
      }
      

      

    } else {
      
      var Theme = 'dark';
      
      Apex.tooltip = {
          theme: Theme
      }
      
      
      
      /*
        ===================================
            Unique Visitors | Options
        ===================================
      */
      
      var d_1options1 = {
      chart: {
        fontFamily: 'Lexend, sans-serif',
          height: 350,
          type: 'bar',
          toolbar: {
            show: true,
          }
      },
      colors: ['#5E9338', '#FFC94D', '#F07C15',],
      plotOptions: {
          bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded',
              borderRadius: 5,
      
          },
      },
      dataLabels: {
          enabled: false
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
          width: 2,
          colors: ['transparent']
      },
      series: [{
          name: 'KHG',
          data: [58, 44, 55, 57, 56, 61, 58, 63, 60, 66, 56, 63]
      }, {
          name: 'Sub-KHG',
          data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]
      }, {
        name: 'HRU',
        data: [91, 76, 85, 101, 98, 87, 105, 91, 114, 94, 66, 70]
    }],
      xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      },
      subtitle: {
        text: '$$$$$$$ Ha',
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
          marker : {
              show: false,
          },
          theme: Theme,
          y: {
              formatter: function (val) {
                  return val 
              }
          }
      },
      responsive: [
          { 
              breakpoint: 767,
              options: {
                  plotOptions: {
                      bar: {
                          borderRadius: 0,
                          columnWidth: "50%"
                      }
                  }
              }
          },
      ]
      }

      

      
      

    }
      
      /**
          ==============================
          |    @Render Charts Script    |
          ==============================
      */


      /*
          ======================================
              Visitor Statistics | Script
          ======================================
      */

      // Total Visits
      // d_1C_1 = new ApexCharts(document.querySelector("#total-users"), spark1);
      // d_1C_1.render();

      // // Paid Visits
      // d_1C_2 = new ApexCharts(document.querySelector("#paid-visits"), spark2);
      // d_1C_2.render();

      /*
          ===================================
              Unique Visitors | Script
          ===================================
      */

      var d_1C_3 = new ApexCharts(
          document.querySelector("#uniqueVisits"),
          d_1options1
      );
      d_1C_3.render();


      /*
          ==============================
              Statistics | Script
          ==============================
      */


      // Followers

      // var d_1C_5 = new ApexCharts(document.querySelector("#hybrid_followers"), d_1options3);
      // d_1C_5.render()

      // // Referral

      // var d_1C_6 = new ApexCharts(document.querySelector("#hybrid_followers1"), d_1options4);
      // d_1C_6.render()

      // // Engagement Rate

      // var d_1C_7 = new ApexCharts(document.querySelector("#hybrid_followers3"), d_1options5);
      // d_1C_7.render()



    /*
        =============================================
            Perfect Scrollbar | Notifications
        =============================================
    */
    const ps = new PerfectScrollbar(document.querySelector('.mt-container'));



    /**
     * =================================================================================================
     * |     @Re_Render | Re render all the necessary JS when clicked to switch/toggle theme           |
     * =================================================================================================
     */

    document.querySelector('.theme-toggle').addEventListener('click', function() {

      getcorkThemeObject = localStorage.getItem("theme");
      getParseObject = JSON.parse(getcorkThemeObject)
      ParsedObject = getParseObject;

      // console.log(ParsedObject.settings.layout.darkMode)

      if (ParsedObject.settings.layout.darkMode) {

           /*
              ==============================
              |    @Re-Render Charts Script    |
              ==============================
          */
      
          /*
              ===================================
                  Unique Visitors | Script
              ===================================
          */
      
          d_1C_3.updateOptions({
          grid: {
                  borderColor: '#191e3a',
              },
          })
          

          
      } else {
          
          /*
              ==============================
              |    @Re-Render Charts Script    |
              ==============================
          */
      
          /*
              ===================================
                  Unique Visitors | Script
              ===================================
          */
      
          d_1C_3.updateOptions({
          grid: {
                  borderColor: '#e0e6ed',
              },
          })
      

      }
     
  })


  } catch(e) {
    // statements
    console.log(e);
  }

})