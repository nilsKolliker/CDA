info=[
    {
        "date":"2018-03-10T12:00:00",
        "valeur":3
    },
    {
        "date":"2018-03-10T12:10:00",
        "valeur":2
    },
    {
        "date":"2018-03-10T12:30:00",
        "valeur":4
    },
    {
        "date":"2018-03-10T12:40:00",
        "valeur":1
    },
    {
        "date":"2018-03-10T13:00:00",
        "valeur":3
    }
];

infoBis=[
    {
        "type":"Temperature",
        "nombreProbleme":7
    },
    {
        "type":"Son",
        "nombreProbleme":3
    },
    {
        "type":"Lumiere",
        "nombreProbleme":5
    }
];

window.onload = function () {
    var points = [];
    var points2 = [];
    
    var stockChart = new CanvasJS.StockChart("graph1",{
      theme: "light2", //Change it to "light1", "dark1", "dark2" 
      title:{
        text:"test 1"
      },
      subtitles: [{
        text: "avec des données au pif"
      }],    
      charts: [{
        data: [{  
          type: "line",//l'affichage des données
          dataPoints : points//la variable ou chercher les données (un tableau d'objet. les objets en question doivent avoir en attribut un x ou label et un y)
        },
    {

    }]
      }],
      rangeSelector:{
          label:"interval",//pour renomer le range Selector
          buttons:[//por redéffinir les boutons du range Selector
              {
                label:"30min",
                range:30,
                rangeType:"minute"
              },
              {
                label:"10min",
                range:10,
                rangeType:"minute"
              },
              {
                label:"1H",
                range:1,
                rangeType:"hour"
              },
              {
                label:"tout",
                range:1,
                rangeType:"all"
              },
        ]
      },
      navigator: {
        slider: {
          minimum: new Date(2018, 03, 10,12,0,0),
          maximum: new Date(2018, 03, 10,13,0,0)
        }
      }
    });
    
      
      for(var i = 0; i < info.length; i++){//remplissage des données apres coup (indispensable vu qu'on va etre as)
        points.push({x: new Date(info[i].date), y: Number(info[i].valeur)});			
      }	
      stockChart.render();
      
      
      var chart = new CanvasJS.Chart("graph2", {
          title:{
              text: "diagramme baton du pif"              
            },
            axisY: [{
                minimum:0
            }],
            data: [              
                {
                    type: "column",
                    dataPoints: points2
                }
            ]
        });
        
        for(var i = 0; i < infoBis.length; i++){
            points2.push({label:infoBis[i].type, y: Number(infoBis[i].nombreProbleme)});			
        }	

        
	chart.render();

 