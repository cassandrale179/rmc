function calculateChart(){

	var CIsum = 0;
	var CIcount = 0;

	var request = new XMLHttpRequest();
  request.open('GET', 'file2.php', true);
	request.onload = function(){
		var data = JSON.parse(request.responseText);
		for (var i = 0; i < data.length; i++){
			if (data[i].college == "CI"){
				CIsum = CIsum + parseFloat(data[i].sum);
				CIcount = CIcount + parseFloat(data[i].count);
			}
		}
		displayChart(0, 0, 0, CIsum/CIcount, 0, 0, 0, 0, 0);
	}
	request.send();
}

function displayChart(as, h, l, cci, edu, engr, entp, hos, west){
		Chart.defaults.global.defaultFontFamily = 'Roboto Condensed';
		Chart.defaults.global.defaultFontSize = 14;
		var ctx = $('#canvas');
		var options = {
    	maintainAspectRatio: false,
    	responsive: false,
    	scales: {
    		xAxes: [{
    			ticks:{
    				fontFamily: 'Roboto Condensed',
    			}
    		}],
    		yAxes: [{
    			ticks:{
    				fontFamily: 'Roboto Condensed',
    			}
    		}]
    	}
	};
		var data = {
    labels: ['Arts & Science', 'Health', 'Lebow', 'CCI', 'Education', 'Engineering',
    'Entrepreneur', 'Hospitality', 'Westphal'],
    datasets: [
        {
            label: 'AVERAGE FINAL GRADE ACROSS COLLEGES (DREXEL)',
            backgroundColor: 'rgba(75,192,192,0.4)',
            borderColor: 'rgba(75,192,192,1)',
            pointHoverBackgroundColor: 'rgba(75,192,192,1)',
            pointHoverBorderColor: 'rgba(220,220,220,1)',
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [as, h, l, cci, edu, engr, entp, hos, west, 0],
        }
    ]
};
		var myBarChart = new Chart(ctx, {
		    type: 'bar',
		    data: data,
		    options: options
		});
}


calculateChart();
