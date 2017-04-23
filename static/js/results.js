
$(function() {
    console.log("Ready to show results! 7");

	var x1 = Number($('.nationwide-intention').attr('voting'));
	var x2 = Number($('.nationwide-intention').attr('notvoting'));

    var intentionData = {
		series: [x1, x2]
	};

	var y1 = Number($('.nationwide-candidate').attr('trump'));
	var y2 = Number($('.nationwide-candidate').attr('hillary'));

    var candidateData = {
		series: [y1, y2]
	};

	var sum = function(a, b) { return a + b };

	var intentionOptions = {
		labelInterpolationFnc: function(value) {
    		return Math.round(value / intentionData.series.reduce(sum) * 100) + '%';
		}
	};

	var candidateOptions = {
		labelInterpolationFnc: function(value) {
    		return Math.round(value / candidateData.series.reduce(sum) * 100) + '%';
		}
	};


	if (x1 > 0 || x2 > 0) {
		new Chartist.Pie('.nationwide-intention', intentionData, intentionOptions);
	} else {
		$('.nationwide-intention').text('No votes registered yet');
	}

	if (y1 > 0 || y2 > 0) {
		new Chartist.Pie('.nationwide-candidate', candidateData, candidateOptions);
	} else {
		$('.nationwide-candidate').text('No votes registered yet');
	}
});