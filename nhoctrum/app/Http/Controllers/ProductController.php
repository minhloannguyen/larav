<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\collection;
use Validator;
use App\Product;
use App\Category;
use App\Tag;
use App\Size;
use Session;
use Image;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('updated_at', 'desc')->paginate(7);
        return view('admin.product.list')->withProduct($product);
    }

    public function create()
    {
        $category = Category::All();
        $tag = Tag::All();
        $size = Size::All();
        return view('admin.product.create')->withCategory($category)->withTag($tag)->withSize($size);
    }

    public function store(Request $request)
    {
        // dd($request);
        $messages = [
            // 'numeric'    => 'Dữ liệu giá phải ở dạng số'
            // 'image'      => 'File ảnh sai định dạng'
        ];
        $validator = Validator::make($request->all(), [
            'name'    => 'max:255'
            // 'featured_image' => 'image'
        ], $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else 
        {
            $product = new Product;
            $product->category_id = $request->input('category_id');
            $product->name = $request->input('name');
            // $product->size = $request->input('size');
            // $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->image = $request->input('featured_image');

            $product->save();

            $product->tags()->sync($request->input('tags'), false);

            $prices[]='';
            $sizes = $request->input('sizes');
            $i=0;
            foreach ($request->input('prices') as $key) {
                if ($key != null) {
                    $prices[$i]=$key;
                    $i++;
                } 
            }

            for ($i=0; $i < count($sizes) ; $i++) { 
                $product->sizes()->attach($sizes[$i], ['price' => $prices[$i]]);
            }

            Session::flash('success', 'New product was successfully created !');
            return redirect()->route('product.index');
        }    
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show')->withProduct($product);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::All();
        $tag = Tag::All();
        $size = Size::All();
        return view('admin.product.edit')->withProduct($product)->withCategory($category)->withTag($tag)->withSize($size);
    }

    public function update(Request $request, $id)
    {
         $messages = [
            // 'numeric'    => 'Dữ liệu giá phải ở dạng số',
            // 'image'      => 'File ảnh sai định dạng'
        ];
        $validator = Validator::make($request->all(), [
            'name'    => 'max:255'
            // 'featured_image' => 'image'
        ], $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else 
        {
            $product = Product::find($id);

            $product->category_id = $request->input('category_id');
            $product->name = $request->input('name');
            // $product->size = $request->input('size');
            // $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->image = $request->input('featured_image');

            $product->save();
            $product->tags()->sync($request->input('tags'));

            $prices[]='';
            $data[]='';
            $sizes = $request->input('sizes');
            $i=0;
            foreach ($request->input('prices') as $key) {
                if ($key != null) {
                    $prices[$i]=$key;
                    $i++;
                } 
            }

            for ($i=0; $i < count($sizes) ; $i++) { 
                $prices[$i] = ['price' => $prices[$i]];
            }
            $data = array_combine($sizes, $prices);

            // print_r($data);
            $product->sizes()->sync($data);

            Session::flash('success', 'This product was successfully updated !');

            return redirect()->route('product.index', $product->id);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->tags()->detach();
        $product->sizes()->detach();

        $product->delete();

        Session::flash('success', 'This product was successfully deleted !');
        return redirect()->route('product.index');
    }
    // public $model;

	// public function __construct()
 //    {
	// 	$this->model = new Product;
	// }

	// public function index()
 //    {
 //    	$data['product'] = $this->model->getPagList();
 //    	return view('admin.product.list', $data);
 //    }

	// public function getInsertForm()
 //    {
 //    	$category = new Category;
 //    	$data['category'] = $category->getList();
 //    	return view('admin.product.insert', $data);
 //    }

 //    public function insert(Request $request)
 //    {
 //        $messages = [
 //            'numeric'    => 'Dữ liệu giá phải ở dạng số',
 //            'image'      => 'File ảnh sai định dạng'
 //        ];
 //        $validator = Validator::make($request->all(), [
 //            'price'    => 'numeric',
 //            'featured_image0', 'featured_image1', 'featured_image2' => 'image'
 //        ], $messages);

 //        if ($validator->fails()) 
 //        {
 //            return redirect('admin/product/insert')
 //                    ->withErrors($validator)
 //                    ->withInput();
 //        } 
 //        else 
 //        {
 //            $category = new Category;
 //            $categoryId = json_decode($category->getIdbyName($request->input('category')),True);
 //            $data['image0'] = $data['image1'] = $data['image2'] = $data['image3'] = '';
 //            $data['categoryId'] = $categoryId[0]['categoryId'];
 //            $data['size'] = $request->input('size');
 //            $data['name'] = $request->input('name');
 //            $data['price'] = $request->input('price');
 //            $data['description'] = $request->input('description');
 //            for($i=0; $i<3; $i++)
 //            {
 //                if($request->hasFile('featured_image'.$i))
 //                {
 //                    $img = $request->file('featured_image'.$i);
 //                    $filename = time(). $i . '.' . $img->getClientOriginalExtension();
 //                    //$filename = $img->getClientOriginalName();
 //                    $location = public_path('images/'. $filename);
 //                    //Image::make($img)->resize(300, null, function ($constraint){ $constraint->aspectRatio();})->save($location);
 //                    Image::make($img)->save($location);
 //                    $data['image'.$i] = $filename;
 //                }
 //            }
 //            $this->model->insert($data);
 //            return redirect('admin/product');
 //        }   
 //    }

 //    public function getEditForm($id)
 //    {
 //        $category = new Category;
 //        $data['category'] = $category->getList();
 //        $product = $this->model->getProduct($id)->all();
 //        $data['product'] = json_decode(json_encode($product), True);
 //        return view('admin.product.edit', $data);
 //    }

 //    public function edit(Request $request, $id)
 //    {
 //         $messages = [
 //            'numeric'    => 'Dữ liệu giá phải ở dạng số',
 //            'image'      => 'File ảnh sai định dạng'
 //        ];
 //        $validator = Validator::make($request->all(), [
 //            'price'    => 'numeric',
 //            'featured_image0', 'featured_image1', 'featured_image2' => 'image'
 //        ], $messages);

 //        if ($validator->fails()) 
 //        {
 //            return redirect('admin/product/insert')
 //                    ->withErrors($validator)
 //                    ->withInput();
 //        } 
 //        else 
 //        {
 //            $product = json_decode(json_encode($this->model->getProduct($id)->all()), True);
 //            //print($product[0]['image1']);
 //            $data['id'] = $id;
 //            $category = new Category;
 //            $categoryId = json_decode(json_encode($category->getIdbyName($request->input('category'))), True);
 //            $data['image0'] = $data['image1'] = $data['image2'] = $data['image3'] = '';
 //            $data['categoryId'] = $categoryId[0]['categoryId'];
 //            $data['size'] = $request->input('size');
 //            $data['name'] = $request->input('name');
 //            $data['price'] = $request->input('price');
 //            $data['description'] = $request->input('description');
 //            for($i=0; $i<3; $i++)
 //            {
 //                if($request->hasFile('featured_image'.$i))
 //                {
 //                    $img = $request->file('featured_image'.$i);
 //                    $filename = time(). $i . '.' . $img->getClientOriginalExtension();
 //                    // $filename = $img->getClientOriginalName() . $img->getClientOriginalExtension();
 //                    $location = public_path('images/'. $filename);
 //                    //Image::make($img)->resize(300, null, function ($constraint){ $constraint->aspectRatio();})->save($location);
 //                    Image::make($img)->save($location);
 //                    $oldFile = $product[0]['image'.$i];
 //                    Storage::delete($oldFile);

 //                    $data['image'.$i] = $filename;
 //                }
 //            }
 //            $this->model->edit($data);
 //            return redirect('admin/product');
 //        }   
 //    }
}
