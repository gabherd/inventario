<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\SaleDetail;

class DashboardController extends Controller
{
    
    public function index()
    {

    	$productsStock = Product::where('products.Stock', '>', 0)->count();
        $productsOut = Product::where('products.Stock', '=', 0)->count();
     
        return view('dashboard', ['productsStock'=>$productsStock, 'productsOut'=>$productsOut]);
    }

    public function getStockQty(){
    	$query = "SELECT me.number AS measure, stock FROM products AS pro JOIN measure AS me ON me.id_measure = pro.id_measure ORDER BY stock";
       
		return DB::select($query);
    }

    public function getSales($period){
        $date  = $this->getDays();

        if ($period == 'week') {
            $query = "SELECT model.name, SUM(quantity) as sales FROM sale_detail JOIN products on sale_detail.id_products = products.id_products join model on products.id_model = model.id_model
                WHERE date_exit  between '".$date['first_day']."' AND '".$date['last_day']."' 
                GROUP BY sale_detail.id_products 
                HAVING sales >= (SELECT min(TopSales) as total 
                        FROM (SELECT SUM(quantity) as TopSales 
                            FROM sale_detail 
                                WHERE date_exit  between '".$date['first_day']."' AND '".$date['last_day']."'
                                GROUP BY sale_detail.id_products 
                                ORDER by TopSales
                                desc limit 2) t) 
                    and sales <= (SELECT max(TopSales) as total 
                        FROM (
                           SELECT SUM(quantity) as TopSales 
                           FROM sale_detail 
                               WHERE date_exit  between '".$date['first_day']."' AND '".$date['last_day']."'
                               GROUP BY sale_detail.id_products 
                               ORDER by TopSales 
                               desc limit 2) t)";
        }else{
            $query = "SELECT model.name, SUM(quantity) as sales FROM sale_detail JOIN products on sale_detail.id_products = products.id_products join model on products.id_model = model.id_model
                WHERE MONTH(date_exit) = ".$date['current_month']."
                GROUP BY sale_detail.id_products 
                HAVING sales >= (SELECT min(TopSales) as total 
                            FROM (SELECT SUM(quantity) as TopSales 
                                FROM sale_detail 
                                    WHERE MONTH(date_exit) = ".$date['current_month']."
                                    GROUP BY sale_detail.id_products 
                                    ORDER by TopSales 
                                    desc limit 2) t) 
                        and sales <= (SELECT max(TopSales) as total 
                            FROM (SELECT SUM(quantity) as TopSales 
                                FROM sale_detail 
                                    WHERE MONTH(date_exit) = ".$date['current_month']."
                                    GROUP BY sale_detail.id_products 
                                    ORDER by TopSales 
                                    desc limit 2) t)";

        }

        $productsSales = DB::select($query);

        return $productsSales;
    }

    public function getTotalSales($period){
        $date  = $this->getDays();

        if ($period == 'week') {
            $query = "SELECT SUM(quantity) AS total 
                        FROM sale_detail 
                        where date_exit 
                            between '".$date['first_day']."' AND '".$date['last_day']."'";
        }else{
            $query = "SELECT SUM(quantity) AS total 
                        FROM sale_detail 
                        WHERE MONTH(date_exit) = ".$date['current_month']."";
        }
        $value = DB::select($query);

        if ($value[0]->total != null) {
            return json_encode($value[0]);
        }else{
            return json_encode($value[0]->total = 0);
        }  
        
    }

    public function salesSummary($period){
        $date  = $this->getDays();

        $sales = array(["day"=>"Monday",   "sales"=>"0"],
                       ["day"=>"Tuesday",  "sales"=>"0"],
                       ["day"=>"Wednesday","sales"=>"0"],
                       ["day"=>"Thursday", "sales"=>"0"],
                       ["day"=>"Friday",   "sales"=>"0"],
                       ["day"=>"Saturday", "sales"=>"0"],
                       ["day"=>"Sunday",   "sales"=>"0"]);
        

        if ($period == 'week') {
            $query = "SELECT DAYNAME(date_exit) AS day, SUM(quantity) AS sales 
                        FROM sale_detail
                        WHERE date_exit 
                            between '".$date['first_day']."' AND '".$date['last_day']."'
                        GROUP BY date_exit";
        }else{
            $query = "SELECT DAYNAME(date_exit) AS day, SUM(quantity) AS sales 
                        FROM sale_detail
                        WHERE MONTH(date_exit) = ".$date['current_month']."
                        GROUP BY date_exit";
        }


        $query = DB::select($query);
        
        //rellena los dias sin ventas
        foreach ($query as $keyMain => $valueMain) {
            foreach ($sales as $key => $value) {
               if ($query[$keyMain]->day == $sales[$key]['day']) {
                   $sales[$keyMain]['sales'] = $query[$keyMain]->sales;
               }
            }
        }

        return $sales;

    }

    //retorna la fecha del primer y ultimo dia de la semana
    public function getDays(){
        $current_month = date('m');
        $current_date = date("Y/m/d");
        $day_of_week = date('N', strtotime($current_date));

        $week_first_day = date('Y-m-d', strtotime($current_date . " - " . ($day_of_week - 1) . " days"));
        $week_last_day = date('Y-m-d', strtotime($current_date . " + " . (7 - $day_of_week) . " days"));

        return ['first_day'=>$week_first_day, 'last_day'=>$week_last_day, 'current_month'=>$current_month];
    }
}
