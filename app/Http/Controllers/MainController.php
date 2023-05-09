<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
class MainController extends Controller
{
   
	 public function index(){
        $products = Product::orderBy('id', 'desc')->limit(7)->get();
        $products_popular = Product::orderBy('id', 'asc')->where('mobile_img','!=','No image found')->limit(5)->get();
        $relateds_product = Product::orderBy('id', 'asc')->where('mobile_img','!=','No image found')->limit(5)->get();
        $recents_product = Product::limit(4)->orderByRaw('RAND()')->where('mobile_img','!=','No image found')->get();

        $brands  = Brand::where(['brand_type' => 'brand'])->limit(4)->get();
        $sliders  = Brand::where(['brand_type' => 'slider'])->limit(3)->get();
        return view('index')->with(compact('products', 'sliders', 'brands','recents_product', 'products_popular'));
    }

     public function shop()
    {
        $products = Product::orderBy('id', 'desc')->paginate(12);

        return view('shop')->with(compact('products'));
    }

     /*public function product()
    {
        $sliders  = Brand::where(['brand_type' => 'slider'])->limit(3)->get();

        $products = Product::orderBy('id', 'desc')->limit(1)->get();

        return view('product')->with(compact('products', 'sliders'));
    }*/

     public function product_detail($slug)
    {
        $recents_product = Product::limit(4)->orderByRaw('RAND()')->get();
        $recents_product = Product::limit(4)->orderByRaw('RAND()')->where('mobile_img','!=','No image found')->get();

        $product = Product::where('slug', $slug)->first();
        $relateds_product = Product::orderBy('id', 'asc')->where('mobile_img','!=','No image found')->limit(5)->get();
        
        return view('product_detail', compact('product', 'recents_product', 'relateds_product'));
    }

     public function blog()
    {
        return view('blog');
    }

     public function contact()
    {
        return view('contact');
    }
}

