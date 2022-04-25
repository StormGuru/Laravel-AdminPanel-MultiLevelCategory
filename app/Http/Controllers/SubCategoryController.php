<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category1;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ctgs = Category1::all();
        return view('admin.sub_category.create', compact('ctgs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'sub_name' => 'string',
            'category_id' => ''
        ]);
        // dd($data);
        SubCategory::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $sub_sub_ctgs = $sub_category->sub_sub_ctgs;
        // dd($category1->sub_ctgs);
        return view('admin.sub_category.show', compact('sub_category', 'sub_sub_ctgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ctgs = Category1::all();
        $sub_category = SubCategory::findOrFail($id); 
        return view('admin.sub_category.edit', compact('sub_category', 'ctgs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $data = request()->validate([
            'sub_name' => 'string',
            'category_id' => ''
        ]);
        //dd($data);
        $sub_category->update($data);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $sub_category->delete();
        return redirect()->route('categories.index');
    }
}
