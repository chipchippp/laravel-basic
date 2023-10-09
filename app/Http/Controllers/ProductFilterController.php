<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFilter;
use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    public function all_products()
    {
        $all_products = ProductFilter::all();
        return view('pages.welcome',compact("all_products"));
    }

    public function search_products(Request $request)
    {
        $all_products = ProductFilter::whereBetween('price',[$request->left_value, $request->right_value])->get();
        return view('pages.search_result',compact('all_products'))->render();
    }

    public function sort_by(Request $request)
    {
        if($request->sort_by == 'lowest_price'){
            $all_products = ProductFilter::orderBy('price','asc')->get();
        }
        if($request->sort_by == 'highest_price'){
            $all_products = ProductFilter::orderBy('price','desc')->get();
        }
        return view('pages.search_result',compact('all_products'))->render();

    }
    public function categoryShop(){
        $products = Product::orderBy("created_at", "desc")->paginate(12);
        return view("pages.customer.categoryShop", compact("products"));
    }
    public function category(Category $category){
        $products = Product::where("category_id", $category-> id)
            ->orderBy("created_at", "desc")->paginate(12);
        return view("pages.customer.category", compact("products"))->render();
    }
}
