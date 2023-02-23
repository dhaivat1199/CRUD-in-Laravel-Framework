<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class myrescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewcategory = Category::all();
        return view('category.index', compact('viewcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insertcategory = new Category([

            'category_name'=>$request->get('category_name'),

        ]);

        $insertcategory->save();

        return redirect('category')->with('create', ' Your category has been created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updatecategory = Category::where('category_id', $id)->first();
        return view('category.edit', compact('updatecategory'));
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
        $updatecategory = Category::where('category_id', $id)->first();
        $updatecategory->category_name = $request->get('category_name');
        $updatecategory->save();

        return redirect('category')->with('edit', ' Your category has been updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('category_id', $id)->delete();

        return redirect('category')->with('delete', ' Your category has been deleted successfully.');

    }
}
