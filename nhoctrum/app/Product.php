<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
	protected $table = 'products';
	// public function getPagList()
 //    {
 //    	$data = DB::table('product')->paginate(5);
 //    	return $data;
 //    }

 //    public function getList()
 //    {
 //        $data = DB::table('product')->get();
 //        return $data;
 //    }

 //    public function insert($data)
 //    {
 //    	DB::table('product')->insert([
 //    		'categoryId' => $data['categoryId'],
 //    		'size' => $data['size'],
	// 	    'name' => $data['name'],
	// 	    'price' => $data['price'],
	// 	    'image0' => $data['image0'],
 //            'image1' => $data['image1'],
 //            'image2' => $data['image2'],
 //            'image3' => $data['image3'],
	// 	    'description' => $data['description']
	// 	]);
 //    }

 //    public function getProduct($id)
 //    {
 //        $result = DB::table('product')->where('productId', $id)->get();
 //        return $result;
 //    }

 //    public function edit($data)
 //    {
 //        DB::table('product')->where('productId', '=', $data['id'])->update([
 //            'categoryId' => $data['categoryId'],
 //            'size' => $data['size'],
 //            'name' => $data['name'],
 //            'price' => $data['price'],
 //            'image0' => $data['image0'],
 //            'image1' => $data['image1'],
 //            'image2' => $data['image2'],
 //            'image3' => $data['image3'],
 //            'description' => $data['description']
 //        ]);
 //    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Size')->withPivot('price');
    }
}
