<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DashboardController extends Controller
{
    
    public function index()
    {
    	$productsStock = DB::table('products')->where('products.Stock', '>', 0)->count();
    	$productsOut = DB::table('products')->where('products.Stock', '=', 0)->count();
     
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
        $sql = "SELECT brand, measure, SUM(sale) AS sales from products GROUP BY Measure having sales >= (SELECT min(TopSales) as total from (SELECT SUM(sale) as TopSales from products GROUP BY Measure ORDER by TopSales desc limit 3) t) and sales <= (SELECT max(TopSales) as total from (SELECT SUM(sale) as TopSales from products GROUP BY Measure ORDER by TopSales desc limit 3) t)";
        $productsSales = DB::select($sql);

        /*
        Example query
        Products::whereIn('id', function($query){
            $query->select('paper_type_id')
            ->from(with(new ProductCategory)->getTable())
            ->whereIn('category_id', ['223', '15'])
            ->where('active', 1);
        })->get();*/

        //$sales = Product::whereIn('id', function($query){
        //    $query->select('id')
        //    ->from(with(new Product)->getTable());
        //})->get();

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
