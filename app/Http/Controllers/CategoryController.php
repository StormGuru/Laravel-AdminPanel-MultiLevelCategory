<?php

namespace App\Http\Controllers;
use App\Models\Category1;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category1::all();
        // $s_categories = SubCategory::where('category_id', $category->id);
        return view('admin.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create_category');
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
            'name' => 'required|string|min:3|max:30|unique:categories1'
        ]);
        // dd($data);
        Category1::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category1  $category
     * @return \Illuminate\Http\Response
     */
    // public function show(Category1 $category1)
    // {
    //     return view('admin.category.show_category', compact('category1'));
    // }
    public function show($id)
    {
        $category1 = Category1::findOrFail($id);
        $sub_ctgs = $category1->sub_ctgs;
        // dd($category1->sub_ctgs);
        return view('admin.category.show_category', compact('category1', 'sub_ctgs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category1 = Category1::findOrFail($id); 
        //dd('eeeeeeeeeee');
        return view('admin.category.edit', compact('category1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category1 $category1, $id)
    {
        $category1 = Category1::findOrFail($id);
        $data = request()->validate([
            'name' => 'string'
        ]);
        //dd($data);
        $category1->update($data);
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
        $category1 = Category1::findOrFail($id);
        $category1->delete();
        return redirect()->route('categories.index');
    }
}
