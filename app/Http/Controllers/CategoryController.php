<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'administrator.category.index',
            [
                'controller'    => 'category',
                'title'         => 'kategori',
                'categorys'     => Category::all()
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrator.category.create', [
            'controller'    => 'category',
            'title'         => 'kategory'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // input
        $category_      = $request->category;
        $slug_          = Str::slug($category_, '-');
        // validation
        $validatedData = $request->validate([
            'category'      => ['required', 'max:255', 'unique:tbl_categorys']
        ]);
        // 
        Category::create([
            'category'      => $category_,
            'slug'          => $slug_
        ]);
        // 
        return redirect('/category')->with([
            'message' => 'data ditambahkan!',
            'alert' => 'primary'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view(
            'administrator.category.show',
            [
                'controller'    => 'category',
                'title'         => 'rincian kategori',
                'category'      => $category
            ],
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view(
            'administrator.category.edit',
            [
                'controller'    => 'category',
                'title'         => 'edit kategori',
                'category'      => $category
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // input
        $id             = $category->slug;
        $category_      = $request->category;
        $slug_          = Str::slug($category_, '-');
        // validation
        if ($slug_ != $category->slug) :
            $uniqueSlug = '|unique:tbl_categorys';
        else :
            $uniqueSlug = '';
        endif;
        // 
        $validatedData = $request->validate([
            'category'      => 'required|max:255' . $uniqueSlug
        ]);
        // 
        Category::where('slug', $id)
            ->update([
                'category'      => $category_,
                'slug'          => $slug_
            ]);
        // 
        return redirect('/category')->with([
            'message' => 'data diubah!',
            'alert' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $id = $category->slug;
        Category::destroy($id);
        return redirect('/category')->with([
            'message' => 'data dihapus!',
            'alert' => 'danger'
        ]);
    }
}
