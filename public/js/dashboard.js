google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(chartMoreSales);
google.charts.setOnLoadCallback(chartSalesDay);

//chart of product whit more sales
function chartMoreSales() {
  $.get( "dashboard/sales", function( data ) {
    
    var sales = [['Modelo', 'Venta']];

    var r = data.map(function(a){
      sales.push([a.name, parseInt(a.sales)]);
    });

    var data = google.visualization.arrayToDataTable(sales);

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data);
  });

}

//chart of sales per day
function chartSalesDay() {
  $.get( "dashboard/sales-day", function( res ) {
    var sales = [['Dia', 'Ventas']];

    for(index in res){
      sales.push([dayName(res[index].day), parseInt(res[index].sales)]);
      
    }

    var data = google.visualization.arrayToDataTable(sales);

    var options = {
      hAxis: {title: 'Dias',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  });
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
});

function dayName(day){
  switch(day){
    case 'Sunday':
      return 'Domingo'
      break;
    case 'Monday':
      return 'Lunes'
      break;
    case 'Tuesday':
      return 'Martes'
      break;
    case 'Wednesday':
      return 'Miercoles'
      break;
    case 'Thursday':
      return 'Jueves'
      break;
    case 'Friday':
      return 'Viernes'
      break;
    case 'Saturday':
      return 'Sabado'
      break;
  }
}

//ffd6d6