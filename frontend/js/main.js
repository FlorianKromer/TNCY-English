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

if($('.carousel').length>0){
	// var form = $('#test');
	var form = $('#exercice .active form');
	$($('.alert')).alert();
	$('.alert').hide();

	form.submit(function( e ) {
		e.preventDefault();
		var value = form.find('.answer').val();
		var answer = form.find('.answer').data('good-answer');
		if ( value == answer ) {
			$('.alert').addClass('alert-primary');
			$('.alert').find('h4').text('Vrai');
			$('.alert').find('p').text('Bonne réponse, passe à la question suivante!');
		}
		else {
			$('.alert').addClass('alert-danger');
			$('.alert').find('h4').text('Faux');
			$('.alert').find('p').text('Mauvaise réponse, passe à la question suivante!');
		}
			$('.alert').show();
		    return;
	});
	$('.next-question').click(function (e) {
		e.preventDefault();
		$('.carousel').carousel('next');

	});
}