<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\collection;
use Illuminate\Support\MessageBag;
use Validator;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::orderBy('id', 'desc')->paginate(7);
        return view('admin.category.list')->withCategory($category);
    }

    public function create()
    {
    	return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'unique'    => 'Tên danh mục này đã tồn tại'
        ];
        $validator = Validator::make($request->all(), [
            'name'    => 'required|unique:categories|max:255'
        ], $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else 
        {
            $category = new Category;
            $category->name = $request->input('name');
            $category->save();
            return redirect()->route('category.index');
        }    
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit')->withCategory($category);
    }

    public function update(Request $request, $id)
    {
        // Validate the data
        $category = Category::find($id);
        
        $messages = [
            'unique'    => 'Tên danh mục này đã tồn tại'
        ];
        $validator = Validator::make($request->all(), [
            'name'    => 'required|unique:categories|max:255'
        ], $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else 
        {
            // Save the data to the database
            $category = Category::find($id);

            $category->name = $request->input('name');
            $category->save();

            return redirect()->route('category.index', $category->id);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.index');
    }

 //    public function edit(Request $request, $id)
 //    {
 //        $messages = [
 //            'unique'    => 'Tên danh mục này đã tồn tại'
 //        ];
 //        $validator = Validator::make($request->all(), [
 //            'name'    => 'required|unique:category'
 //        ], $messages);

 //        if ($validator->fails()) 
 //        {
 //            return redirect()->back()->withErrors($validator)->withInput();
 //        } 
 //        else 
 //        {
 //            $data['id'] = $id;
 //            $data['name'] = $request->input('name');
 //            $this->model->edit($data);
 //            return redirect('admin/category');
 //        }   
 //    }

 //    public function delete($id)
 //    {
 //    	$this->model->delete($id);
 //    	return redirect('admin/category');
 //    }
}
