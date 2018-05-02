<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Product;
use App\Category;
use App\Tag;
use App\Size;
use App\Banner;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('checkLogin');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id', 'desc')->paginate(8);
        $categories = Category::All();
        $tags = Tag::All();
        $images = array();

        foreach ($categories as $cat) {
            array_push($images, Product::where('category_id', '=', $cat->id)->first()->image);
        }
        
        $banner = Banner::where('status', '=', 1)->get();
        // print($banner[0]['name']);

        return view('home.index')->withProduct($product)->withCategories($categories)->withTags($tags)->withImages($images)
                ->withBanner($banner);
    }

    public function product()
    {
        $product = Product::orderBy('id', 'desc')->paginate(12);
        $categories = Category::All();
        $tags = Tag::All();
        $sizes = Size::All();
        
        return view('home.product')->withProduct($product)->withCategories($categories)->withTags($tags)->withSizes($sizes);
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        $related = Product::where('category_id', 'like', '%'.$product->category_id.'%')->take(4)->get();

        return view('home.productDetail')->withProduct($product)->withRelated($related);
    }

    public function searchByTag($id)
    {
        $tag = Tag::find($id);
        $product = $tag->products;
        $categories = Category::All();
        $tags = Tag::All();
        $sizes = Size::All();
        return view('home.product')->withProduct($product)->withTags($tags)->withCategories($categories)->withSizes($sizes);
    }

    public function search(Request $request)
    {
        $var = $request->input('key');
        $product = Product::where('name','like', '%'.$var.'%')->orderBy('name')->get();
        //$product = DB::table('product')->where('name', 'like', $var)->get();
        $tags = Tag::All();
        $categories = Category::All();
        $sizes = Size::All();

        return view('home.product')->withProduct($product)->withTags($tags)->withCategories($categories)->withSizes($sizes);
    }

    public function advancedSearch(Request $request)
    {
        $category = $request->input('category');
        $size = $request->input('size');
        $price = $request->input('price');

        $q = Product::with('sizes');

        if($category!=''){
            $q->where('category_id','like','%'.$category.'%');
        }

        if($size!=''){
            // $product->whereHas('sizes','like','%'.$size.'%');
            $q->whereHas('sizes', function($query) use($size) {
                $query->where('size_id', 'like','%'.$size.'%');
            });
        }

        if($price!=''){
            if ($price == 1) 
            {
                $q->whereHas('sizes', function($query) 
                {
                    $query->where('price', '<', 100000);
                });
            }
            elseif ($price == 3) 
            {
                $q->whereHas('sizes', function($query) 
                {
                    $query->where('price', '>', 300000);
                });
            }
        }
        
        $product = $q->get(); 
        // print($product);
        $tags = Tag::All();
        $categories = Category::All();
        $sizes = Size::All();

        // echo $request->price;
        return view('home.product')->withProduct($product)->withTags($tags)->withCategories($categories)->withSizes($sizes)
                ->withCategory($category)
                ->withSz($size)
                ->withPrice($price);
    }
}
