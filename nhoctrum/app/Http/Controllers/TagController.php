<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\MessageBag;
use App\Tag;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::orderBy('id', 'desc')->paginate(7);
        return view('admin.tag.list')->withTag($tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'unique'    => 'Tên Tag này đã tồn tại'
        ];
        $validator = Validator::make($request->all(), [
            'name'    => 'required|unique:tags|max:255'
        ], $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else 
        {
            $tag = new Tag;
            $tag->name = $request->input('name');
            $tag->save();

            Session::flash('success', 'New tag was successfully created !');
            return redirect()->route('tag.index');
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

    // *
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
     
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tag.edit')->withTag($tag);
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
        $tag = Tag::find($id);
        
        $messages = [
            'unique'    => 'Tên tag này đã tồn tại'
        ];
        $validator = Validator::make($request->all(), [
            'name'    => 'required|unique:tags|max:255'
        ], $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        } 
        else 
        {
            // Save the data to the database
            $tag = Tag::find($id);

            $tag->name = $request->input('name');
            $tag->save();

            Session::flash('success', 'This tag was successfully updated !');

            return redirect()->route('tag.index', $tag->id);
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
        $tag = Tag::find($id);
        $tag->products()->detach();
        $tag->delete();

        Session::flash('success', 'The tag was successfully deleted.');
        return redirect()->route('tag.index');
    }
}
