
$(function() {
    console.log("Ready to show results! 3");

    var intentionData = {
		series: [20, 15]
	};

    var candidateData = {
		series: [40, 105]
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

	// var responsiveOptions = [
	// 	['screen and (min-width: 640px)', {
	// 		chartPadding: 30,
	// 		labelOffset: 50,
	// 		labelDirection: 'explode',
	// 		labelInterpolationFnc: function(value) {
	// 			return value;
	// 		}
	// 	}],
	// 	['screen and (min-width: 1024px)', {
	// 		labelOffset: 40,
	// 		chartPadding: 20
	// 	}]
	// ];

	new Chartist.Pie('.nationwide-intention', intentionData, intentionOptions);
	new Chartist.Pie('.nationwide-candidate', candidateData, candidateOptions);
});