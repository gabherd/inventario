<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    public function index()
    {
    	$productsStock = DB::table('products')->where('products.stock', '>', 0)->count();
    	$productsOut = DB::table('products')->where('stock', '=', 0)->count();
     
        return view('dashboard', ['productsStock'=>$productsStock, 'productsOut'=>$productsOut]);
    }

    public function getStockQty(){
    	$stock = DB::table('products')
    		->select('measure', 'stock')
    		->whereBetween('stock', array(0, 10))
    		->orderBy('stock', 'asc')
    		->get();

		return $stock;
    }

    public function getSales(){
        $sql = "SELECT measure, sale from products 
        		WHERE sale in ( 
		        	SELECT Sale FROM (
		        		SELECT DISTINCT sale from products 
		        		ORDER BY sale DESC 
		        		limit 2)
			        AS t) 
		        ORDER BY sale";
        $productsSales = DB::select($sql);

        return $productsSales;
    }

    public function store(ProductRequest $request)
    {
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
