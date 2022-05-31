<?php

namespace App\Http\Controllers;

use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category1;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_ctgs = SubCategory::all();
        return view('admin.sub_sub_category.create', compact('sub_ctgs'));
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
            'sub_sub_name' => 'string',
            'sub_category_id' => ''
        ]);
        SubSubCategory::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_ctgs = SubCategory::all();
        $sub_sub_category = SubSubCategory::findOrFail($id); 
        return view('admin.sub_sub_category.edit', compact('sub_ctgs', 'sub_sub_category'));
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
        $sub_sub_category = SubSubCategory::findOrFail($id);
        $data = request()->validate([
            'sub_sub_name' => 'string',
            'sub_category_id' => ''
        ]);
        //dd($data);
        $sub_sub_category->update($data);
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
        $sub_sub_category = SubSubCategory::findOrFail($id);
        $sub_sub_category->delete();
        return redirect()->route('categories.index');
    }
}
