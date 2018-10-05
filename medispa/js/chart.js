// Initialize a Line chart in the container with the ID chart1
new Chartist.Line('#chart1', {
  labels: ["Sep","Oct", "Nov", "Dec", "Jan"],
  series: [[100, 120, 180, 200, 180]]
});

// Initialize a Line chart in the container with the ID chart2
if ($("#specialchart").length ){
		new Chartist.Bar('#chart2', {
			//way to convert data from javascript to php
  		labels:JSON.parse( $("#specialchart").find(".labels").html()),
  		series:JSON.parse($("#specialchart").find(".series").html())
	});
}

var data = {
  labels: ['Back Massage', 'Mole Check', 'Back Wax', 'Thai Massage'],
  series: [20, 35, 10, 30]
};

var options = {
  labelInterpolationFnc: function(value) {
    return value[0]
  }
};

var responsiveOptions = [
  ['screen and (min-width: 640px)', {
    chartPadding: 30,
    labelOffset: 100,
    labelDirection: 'explode',
    labelInterpolationFnc: function(value) {
      return value;
    }
  }],
  ['screen and (min-width: 1024px)', {
    labelOffset: 80,
    chartPadding: 20
  }]
];

//
new Chartist.Pie('#chart3', data, options, responsiveOptions);

//busiest rooms
new Chartist.Bar('#chart4', {
  labels: ["Room 1", "Room 2", "Room 3", "Room 4", "Room 5", "Room 6", "Room 7"],
  series: [[15, 23, 18, 13, 9, 11, 8]]
});
