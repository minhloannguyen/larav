<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';
    // public $primaryKey = 'categoryId';

  //   public function getPagList()
  //   {
  //   	$data = DB::table('category')->paginate(7);
  //   	// $data = Category::all();
  //   	return $data;
  //   }

  //   public function getList()
  //   {
  //       $data = DB::table('category')->get();
  //       return $data;
  //   }

  //   public function insert($data)
  //   {
  //   	DB::table('category')->insert(
		//     ['name' => $data['name']]
		// );
  //   }

  //   public function edit($data)
  //   {
  //   	DB::table('category')->where('categoryId', '=', $data['id'])->update(
		//     ['name' => $data['name']]
		// );
  //   }

  //   public function getCategory($id)
  //   {
  //   	$result = DB::table('category')->where('categoryId', $id)->get();
  //   	return $result;
  //   }

  //   public function getIdbyName($name)
  //   {
  //       $result = DB::table('category')->select(DB::raw('categoryId'))
  //                                       ->where('name', '=', $name)->get();
  //       return $result;
  //   }

  //   public function delete($id)
  //   {
  //   	DB::table('category')->where('categoryId', '=', $id)->delete();
  //   }

    // public function $products()
    // {
    //   return $this->hasMany('App\Product');
    // }
}
