google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
google.charts.setOnLoadCallback(drawChart2);

//chart of product whit more sales
function drawChart() {
  $.get( "dashboard/sales", function( data ) {
    
    var sales = [['Modelo', 'Venta']];

    var r = data.map(function(a){
      sales.push([a.brand + ' - ' +a.measure, parseInt(a.sales)]);
    });

    var data = google.visualization.arrayToDataTable(sales);

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data);
  });

}

//chart of sales per day
function drawChart2() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'Sales'],
    ['2013',  1000],
    ['2014',  1170],
    ['2015',  660 ],
    ['2016',  1030]
  ]);

  var options = {
    hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
    vAxis: {minValue: 0}
  };

  var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}

//table of stock
$(document).ready( function () {
    $('#tbl-emty-stock').DataTable({
      language: {
          url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
      },
      searching: false,
      paging:   false,
      ordering: false,
      info:     false,
      responsive: true,  
      scrollY: 150,
      scroller: true,
      ajax: {
        url: 'dashboard/stock',
        dataSrc: '',
      },
      createdRow: function(row, data, index){
        if(data['stock'] == 0){
          $(row).addClass('bg-lightRed');
        }
      },
      aoColumns: [
            { data: "measure" },
            {
                mData: "stock",
                mRender: function (data, type, row) {
                  if (data == 0) {
                    return 'Agotado';
                  }
                  return data;
                }
            }
        ]
    });
} );


//ffd6d6