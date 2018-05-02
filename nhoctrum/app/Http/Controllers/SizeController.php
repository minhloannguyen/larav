<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use App\Size;
use Session;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $size = Size::orderBy('id', 'desc')->paginate(7);
        return view('admin.size.list')->withSize($size);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'unique'    => 'Size này đã tồn tại'
        ];
        $validator = Validator::make($request->all(), [
            'name'    => 'required|unique:sizes|max:255'
        ], $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else 
        {
            $size = new Size;
            $size->name = $request->input('name');
            $size->save();

            Session::flash('success', 'New size was successfully created !');
            return redirect()->route('size.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::find($id);
        return view('admin.size.edit')->withSize($size);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $size = Size::find($id);
        
        $messages = [
            'unique'    => 'Tên size này đã tồn tại'
        ];
        $validator = Validator::make($request->all(), [
            'name'    => 'required|unique:sizes|max:255'
        ], $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else 
        {
            // Save the data to the database
            $size = Size::find($id);

            $size->name = $request->input('name');
            $size->save();

            Session::flash('success', 'This size was successfully updated !');

            return redirect()->route('size.index', $size->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        $size->products()->detach();
        $size->delete();

        Session::flash('success', 'The size was successfully deleted.');
        return redirect()->route('size.index');
    }
}
