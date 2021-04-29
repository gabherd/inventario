google.charts.load('current', {'packages':['corechart']});
totalSales(getCookie("salesTotal"));
google.charts.setOnLoadCallback(chartMoreSales(getCookie("salesTop")));
google.charts.setOnLoadCallback(chartSalesSummary(getCookie("salesSummary")));

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

    $('body').click(function(e){
        //configuration for total sales 
        if ($(e.target).is('#btn-conf-total-sales')) {
            $('#option-total-sales').toggle();
        }else{
            $('#option-total-sales').hide();
        }
        
        //configuration for chart top sales
        if ($(e.target).is('#btn-conf-char-sales')) {
            $('#option-chart-sales').toggle();
        }else{
            $('#option-chart-sales').hide();
        }

        //configuration for total sales 
        if ($(e.target).is('#btn-conf-summary-sales')) {
            $('#option-summary-sales').toggle();
        }else{
            $('#option-summary-sales').hide();
        }
    });

    //cookies
    //get period fot configuration  of top sales
    if(getCookie("salesTop") == ""){
      document.cookie = "salesTop=week"; 
      titleTopSales();
    }else{
      titleTopSales();
    }

    //get period fot configuration total sales
    if(getCookie("salesTotal") == ""){
      document.cookie = "salesTotal=week"; 
      titleTotalSales();
    }else{
      titleTotalSales();
    }

    //get period fot configuration total sales
    if(getCookie("salesSummary") == ""){
      document.cookie = "salesSummary=week"; 
      titleSummarySales();
    }else{
      titleSummarySales();
    }
});



//----->Start charts
  //chart of product top sales
  function chartMoreSales(period){
    
    $.get( "dashboard/sales/"+period, function( data ) {
      
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
  function chartSalesSummary(period) {
    $.get( "dashboard/sales-summary/"+period, function( res ) {
      var sales = [['Dia', 'Ventas']];
      var days = [];

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

  //get total sales
  function totalSales(period){
    $.get( "dashboard/sales-products/"+period, function( res ) {
    console.log(1)
      if (res) {
        var value = JSON.parse(res);

        $('#product-sales').text(value.total);
      }
    });
  }
//----->End charts

//----->Start titles sales
  //title for top sales
  function titleTopSales(){
      if (getCookie("salesTop") == 'week') {
        $("#txt-dete-sale").text('semana');
      }else{
        $("#txt-dete-sale").text('mes');
      }
  }

  //title for total sales
  function titleTotalSales(){
      if (getCookie("salesTotal") == 'week') {
        $("#qty-description-date").text('semana');
      }else{
        $("#qty-description-date").text('mes');
      }
  }

  //title for total sales
  function titleSummarySales(){
      if (getCookie("salesSummary") == 'week') {
        $("#txt-summary-sale").text('semana');
      }else{
        $("#txt-summary-sale").text('mes');
      }
  }
//----->End titles sales

$('.period-sales-total').on('click', function(){
    var period = $(this).attr('data-period');
    $('#product-sales').text('...');

    document.cookie = "salesTotal="+period; 
    
    titleTotalSales();
    totalSales(period);
});

$('.period-sales-top').on('click', function(){
    var period = $(this).attr('data-period');
    document.cookie = "salesTop="+period; 

    titleTopSales();
    chartMoreSales(period);

    console.log($(this).parent().attr('id'));
});

$('.period-sales-summary').on('click', function(){
    var period = $(this).attr('data-period');
    document.cookie = "salesSummary="+period; 

    titleSummarySales();
    chartSalesSummary(period);
});

//get day name in spanish
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