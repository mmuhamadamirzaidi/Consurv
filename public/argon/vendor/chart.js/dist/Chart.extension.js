//
// Chart extension for making the bars rounded
// Code from: https://codepen.io/jedtrow/full/ygRYgo
//

Chart.elements.Rectangle.prototype.draw = function() {

	var ctx = this._chart.ctx;
	var vm = this._view;
	var left, right, top, bottom, signX, signY, borderSkipped, radius;
	var borderWidth = vm.borderWidth;
	// Set Radius Here
	// If radius is large enough to cause drawing errors a max radius is imposed
	var cornerRadius = 6;

	if (!vm.horizontal) {
		// bar
		left = vm.x - vm.width / 2;
		right = vm.x + vm.width / 2;
		top = vm.y;
		bottom = vm.base;
		signX = 1;
		signY = bottom > top ? 1 : -1;
		borderSkipped = vm.borderSkipped || 'bottom';
	} else {
		// horizontal bar
		left = vm.base;
		right = vm.x;
		top = vm.y - vm.height / 2;
		bottom = vm.y + vm.height / 2;
		signX = right > left ? 1 : -1;
		signY = 1;
		borderSkipped = vm.borderSkipped || 'left';
	}

	// Canvas doesn't allow us to stroke inside the width so we can
	// adjust the sizes to fit if we're setting a stroke on the line
	if (borderWidth) {
		// borderWidth shold be less than bar width and bar height.
		var barSize = Math.min(Math.abs(left - right), Math.abs(top - bottom));
		borderWidth = borderWidth > barSize ? barSize : borderWidth;
		var halfStroke = borderWidth / 2;
		// Adjust borderWidth when bar top position is near vm.base(zero).
		var borderLeft = left + (borderSkipped !== 'left' ? halfStroke * signX : 0);
		var borderRight = right + (borderSkipped !== 'right' ? -halfStroke * signX : 0);
		var borderTop = top + (borderSkipped !== 'top' ? halfStroke * signY : 0);
		var borderBottom = bottom + (borderSkipped !== 'bottom' ? -halfStroke * signY : 0);
		// not become a vertical line?
		if (borderLeft !== borderRight) {
			top = borderTop;
			bottom = borderBottom;
		}
		// not become a horizontal line?
		if (borderTop !== borderBottom) {
			left = borderLeft;
			right = borderRight;
		}
	}

	ctx.beginPath();
	ctx.fillStyle = vm.backgroundColor;
	ctx.strokeStyle = vm.borderColor;
	ctx.lineWidth = borderWidth;

	// Corner points, from bottom-left to bottom-right clockwise
	// | 1 2 |
	// | 0 3 |
	var corners = [
		[left, bottom],
		[left, top],
		[right, top],
		[right, bottom]
	];

	// Find first (starting) corner with fallback to 'bottom'
	var borders = ['bottom', 'left', 'top', 'right'];
	var startCorner = borders.indexOf(borderSkipped, 0);
	if (startCorner === -1) {
		startCorner = 0;
	}

	function cornerAt(index) {
		return corners[(startCorner + index) % 4];
	}

	// Draw rectangle from 'startCorner'
	var corner = cornerAt(0);
	ctx.moveTo(corner[0], corner[1]);

	for (var i = 1; i < 4; i++) {
		corner = cornerAt(i);
		nextCornerId = i + 1;
		if (nextCornerId == 4) {
			nextCornerId = 0
		}

		nextCorner = cornerAt(nextCornerId);

		width = corners[2][0] - corners[1][0];
		height = corners[0][1] - corners[1][1];
		x = corners[1][0];
		y = corners[1][1];

		var radius = cornerRadius;

		// Fix radius being too large
		if (radius > height / 2) {
			radius = height / 2;
		}
		if (radius > width / 2) {
			radius = width / 2;
		}

		ctx.moveTo(x + radius, y);
		ctx.lineTo(x + width - radius, y);
		ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
		ctx.lineTo(x + width, y + height - radius);
		ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
		ctx.lineTo(x + radius, y + height);
		ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
		ctx.lineTo(x, y + radius);
		ctx.quadraticCurveTo(x, y, x + radius, y);

	}

	ctx.fill();
	if (borderWidth) {
		ctx.stroke();
	}

	
window.onload = function () {

	var options = {
		animationEnabled: true,
		theme: "light2",
		// title: {
		// 	text: "Monthly Sales Data"
		// },
		axisX: {
			valueFormatString: "MMM"
		},
		axisY: {
			prefix: "RM",
			labelFormatter: addSymbols
		},
		toolTip: {
			shared: true
		},
		legend: {
			cursor: "pointer",
			itemclick: toggleDataSeries
		},
		data: [
			{
				type: "column",
				name: "Actual Target",
				showInLegend: true,
				xValueFormatString: "MMMM YYYY",
				yValueFormatString: "RM#,##0",
				dataPoints: [
					{ x: new Date(2020, 0), y: 20000 },
					{ x: new Date(2020, 1), y: 25000 },
					{ x: new Date(2020, 2), y: 30000 },
					{ x: new Date(2020, 3), y: 90000, indexLabel: "High Target" },
					{ x: new Date(2020, 4), y: 40000 },
					{ x: new Date(2020, 5), y: 60000 },
					{ x: new Date(2020, 6), y: 55000 },
					{ x: new Date(2020, 7), y: 33000 },
					{ x: new Date(2020, 8), y: 45000 },
					{ x: new Date(2020, 9), y: 30000 },
					{ x: new Date(2020, 10), y: 50000 },
					{ x: new Date(2020, 11), y: 35000 }
				]
			},
			{
				type: "line",
				name: "Expected Target",
				showInLegend: true,
				yValueFormatString: "RM#,##0",
				dataPoints: [
					{ x: new Date(2020, 0), y: 32000 },
					{ x: new Date(2020, 1), y: 37000 },
					{ x: new Date(2020, 2), y: 40000 },
					{ x: new Date(2020, 3), y: 52000 },
					{ x: new Date(2020, 4), y: 45000 },
					{ x: new Date(2020, 5), y: 47000 },
					{ x: new Date(2020, 6), y: 42000 },
					{ x: new Date(2020, 7), y: 43000 },
					{ x: new Date(2020, 8), y: 41000 },
					{ x: new Date(2020, 9), y: 42000 },
					{ x: new Date(2020, 10), y: 50000 },
					{ x: new Date(2020, 11), y: 45000 }
				]
			},
			{
				type: "area",
				name: "Others",
				markerBorderColor: "white",
				markerBorderThickness: 2,
				showInLegend: true,
				yValueFormatString: "RM#,##0",
				dataPoints: [
					{ x: new Date(2020, 0), y: 4000 },
					{ x: new Date(2020, 1), y: 7000 },
					{ x: new Date(2020, 2), y: 12000 },
					{ x: new Date(2020, 3), y: 40000 },
					{ x: new Date(2020, 4), y: 20000 },
					{ x: new Date(2020, 5), y: 35000 },
					{ x: new Date(2020, 6), y: 33000 },
					{ x: new Date(2020, 7), y: 20000 },
					{ x: new Date(2020, 8), y: 25000 },
					{ x: new Date(2020, 9), y: 16000 },
					{ x: new Date(2020, 10), y: 29000 },
					{ x: new Date(2020, 11), y: 20000 }
				]
			}]
	};
	$("#chartContainer").CanvasJSChart(options);
	
	function addSymbols(e) {
		var suffixes = ["", "K", "M", "B"];
		var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);
	
		if (order > suffixes.length - 1)
			order = suffixes.length - 1;
	
		var suffix = suffixes[order];
		return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
	}
	
	function toggleDataSeries(e) {
		if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		} else {
			e.dataSeries.visible = true;
		}
		e.chart.render();
	}
	
	
	}
	
};