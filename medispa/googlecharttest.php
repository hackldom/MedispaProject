<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Thearpist');
        data.addColumn('number', 'Appointments');
        data.addRows([
          ['Dr. Bela', 10],
          ['Richard King', 4],
          ['Juliet Cuddy', 3],
          ['Richard Carlos', 6],
          ['John Wilson', 2]
        ]);

        // Set chart options
        var options = {'title':'How many clients each therpaist had:',
                       'width':600,
                       'height':300,
				   	   'colors': ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
					   'is3D': true,
					   'backgroundColor': 'lightblue',
					   'titleTextStyle': {color:'red'}
				   };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
