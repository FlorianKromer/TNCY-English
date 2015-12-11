$.material.init();

if($('#myChart').length >0 ){
	
	// Get the context of the canvas element we want to select
	var ctx = document.getElementById("myChart").getContext("2d");
	var data = {
	    labels: ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"],
	    datasets: [
	        {
	            label: "My First dataset",
	            fillColor: "rgba(0,0,0,0.0)",
	            strokeColor: "#ffd600",
	            pointColor: "#ffea00",
	            pointStrokeColor: "#ffea00",
	            pointHighlightFill: "#ffd600",
	            pointHighlightStroke: "rgba(220,220,220,1)",
	            data: [0, 10, 15, 31, 56, 65, 80]
	        }
	    ]
	};

	var myLineChart = new Chart(ctx).Line(data);
}

if($('#my-memory-game').length>0){
	(function(){
      var myMem = new Memory({
        wrapperID : "my-memory-game",
        cards : [
          {
            id : 1,
            img: "img/default/monsters-01.png"
          },
          {
            id : 2,
            img: "img/default/monsters-02.png"
          },
          {
            id : 3,
            img: "img/default/monsters-03.png"
          },
          {
            id : 4,
            img: "img/default/monsters-04.png"
          },
          {
            id : 5,
            img: "img/default/monsters-05.png"
          },
          {
            id : 6,
            img: "img/default/monsters-06.png"
          },
          {
            id : 7,
            img: "img/default/monsters-07.png"
          },
          {
            id : 8,
            img: "img/default/monsters-08.png"
          },
          {
            id : 9,
            img: "img/default/monsters-09.png"
          },
          {
            id : 10,
            img: "img/default/monsters-10.png"
          },
          {
            id : 11,
            img: "img/default/monsters-11.png"
          },
          {
            id : 12,
            img: "img/default/monsters-12.png"
          },
          {
            id : 13,
            img: "img/default/monsters-13.png"
          },
          {
            id : 14,
            img: "img/default/monsters-14.png"
          },
          {
            id : 15,
            img: "img/default/monsters-15.png"
          },
          {
            id : 16,
            img: "img/default/monsters-16.png"
          }
        ],
        onGameStart : function() { return false; },
        onGameEnd : function() { return false; }
      });
    })();
}