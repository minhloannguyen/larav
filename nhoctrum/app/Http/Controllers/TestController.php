<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function method($var1, $var2)
    {
    	echo $var1 + $var2;
    }

    public function getView($var1, $var2)
    {
    	$d['data'] = [$var1, $var2];
    	return view('admin.category.list', $d);
    }
}
