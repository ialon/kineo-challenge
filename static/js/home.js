
	$(function() {
	    console.log("Ready!");

	    var clear = function() {
	    	$("#US_MAP path").removeClass("selected");
	    	$("#US_MAP circle").removeClass("selected");
	    }

		$('button[type="reset"]').click(function() {
	    	// console.log("State reset!");
	    	clear();
		});

	    $("#select_state").change(function() {
	    	// console.log("State changed!: " + this.value);
	    	clear();
	    	$("path#" + this.value).addClass("selected");
	    	$("circle#" + this.value).addClass("selected");
	    });

	    $("#US_MAP path").click(function() {
	    	// console.log("State clicked!: " + this.id);
	    	clear();
	    	$("path#" + this.id).addClass("selected");
	    	$("#select_state").val(this.id);
	    });

	    $("#US_MAP circle").click(function() {
	    	// console.log("State clicked!: " + this.id);
	    	clear();
	    	$("circle#" + this.id).addClass("selected");
	    	$("#select_state").val(this.id);
	    });

        $("svg").svgPanZoom({
		    events: {
		        mouseWheel: true, // enables mouse wheel zooming events
		        doubleClick: true, // enables double-click to zoom-in events
		        drag: true, // enables drag and drop to move the SVG events
		        dragCursor: "move" // cursor to use while dragging the SVG
		    },
		    animationTime: 500, // time in milliseconds to use as default for animations. Set 0 to remove the animation
		    zoomFactor: 0.01, // how much to zoom-in or zoom-out
		    maxZoom: 2.5, //maximum zoom in, must be a number bigger than 1
		    panFactor: 200, // how much to move the viewBox when calling .panDirection() methods
		    initialViewBox: { // the initial viewBox, if null or undefined will try to use the viewBox set in the svg tag. Also accepts string in the format "X Y Width Height"
		        x: 0, // the top-left corner X coordinate
		        y: 0, // the top-left corner Y coordinate
		        width: 900, // the width of the viewBox
		        height: 600 // the height of the viewBox
		    },
		    // limits: { // the limits in which the image can be moved. If null or undefined will use the initialViewBox plus 15% in each direction
		    //     x: -200,
		    //     y: -200,
		    //     x2: 1200,
		    //     y2: 1200
		    // }
		});
	});