<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DashboardController extends Controller
{
    
    public function index()
    {
        $productsSale = DB::table('sale_detail')->sum('quantity');
    	$productsStock = Product::where('products.Stock', '>', 0)->count();
        $productsOut = Product::where('products.Stock', '=', 0)->count();
     
        return view('dashboard', ['productsStock'=>$productsStock, 'productsOut'=>$productsOut, 'productsSale'=>$productsSale]);
    }

    public function getStockQty(){
    	$query = "SELECT me.number AS measure, stock FROM products AS pro JOIN measure AS me ON me.id_measure = pro.id_measure ORDER BY stock";
       
		return DB::select($query);
    }

    public function getSales(){
        $query = "SELECT model.name, SUM(quantity) as sales FROM sale_detail JOIN products on sale_detail.id_products = products.id_products join model on products.id_model = model.id_model
                GROUP BY sale_detail.id_products 
                HAVING sales >= (SELECT min(TopSales) as total 
                            from (SELECT SUM(quantity) as TopSales 
                                from sale_detail 
                                GROUP BY sale_detail.id_products 
                                ORDER by TopSales 
                                desc limit 2) t) 
                        and sales <= (SELECT max(TopSales) as total 
                                     from (
                                        SELECT SUM(quantity) as TopSales 
                                        from sale_detail 
                                        GROUP BY sale_detail.id_products 
                                        ORDER by TopSales 
                                        desc limit 2) t)";

        $productsSales = DB::select($query);

        return $productsSales;
    }

    public function qtySalesProduct(){
        $query = "SELECT SUM(quantity) AS total FROM sale_detail";
        
        return DB::select($query);
    }

    public function salesPerDay(){
        $query = "SELECT DAYNAME(date_exit) AS day, SUM(quantity) AS sales 
                    FROM sale_detail
                    WHERE date_exit 
                        between '2021-04-04' AND '2021-04-10' 
                    GROUP BY date_exit";
        
        return DB::select($query);
    }
}
