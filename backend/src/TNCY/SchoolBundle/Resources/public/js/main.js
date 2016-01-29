(function($) {

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
	        wrapperID : "my-memory-game"
	      });
	    })();
	}


})(jQuery);