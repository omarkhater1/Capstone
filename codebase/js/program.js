

var chart = document.getElementById('chart').getContext('2d'),
	gradient = chart.createLinearGradient(0, 0, 0, 450);

var data = {
	labels: ['Today', 'Target Date'],
	datasets: [{
		label: '',
		backgroundColor: gradient,
		pointBackgroundColor: 'white',
		borderWidth: 2,
		color: '#ffffff',
		borderColor: '#9DD030',
		data: [$("#weight").val(), $("#target_weight").val()]
	}]
};
var options = {
	responsive: true,
	maintainAspectRatio: true,
	animation: {
		easing: 'easeInOutQuad',
		duration: 520
	},
};
var chartInstance = new Chart(chart, {
	type: 'line',
	data: data,
	options: options
});
