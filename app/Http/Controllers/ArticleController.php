<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'administrator.article.index',
            [
                'controller'        => 'article',
                'title'             => 'artikel',
                // 'articles'          => Article::all()
                'articles'          => Article::orderByDesc('created_at')->get()

            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'administrator.article.create',
            [
                'controller'        => 'article',
                'title'             => 'artikel',
                'categories'        => Category::orderBy('category')->get()
            ]
        );
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
        $idUser             = 1;
        $title              = $request->title;
        $slug               = Str::slug($title, '-') . '.html';
        $content            = $request->content;
        $truncated          = Str::limit(strip_tags($content), 200, '...');
        $category           = $request->category;
        $file               = $request->file('file');
        $folder             = 'articles';
        $default            = 'default.svg';

        // validation
        // $validatedData = $request->validate([
        //     'title'         => ['required', 'max:250', 'unique:tbl_articles'],
        //     'content'       => ['required'],
        //     'file'          => ['file', 'image', 'mimes:jpeg,jpg,png,svg', 'max:11024'],
        //     'category'    => ['required'],
        // ]);

        // upload
        if ($file) :
            $file = $file->store($folder);

        // $name           = $file->hashName();
        // $date           = date('dmyhis');
        // $fileName       = $date . '-' . $name;
        // $file           = $file->storeAs($folder, $fileName);
        else :
            $file           = $folder . '/' . $default;
        endif;

        // insert
        $data = [
            'id_user'       => $idUser,
            'title'         => $title,
            'slug'          => $slug,
            'content'       => $content,
            'truncated'     => $truncated,
            'file'          => $file,
        ];
        Article::create($data);

        // detail
        // $detail = Article::where('slug', $slug)->get();
        $detail = Article::where('slug', $slug)->first();
        $oldId = $detail->id;

        // insert
        $data2 = [];
        foreach ($category as $key) :
            $data2[] =
                [
                    'id_posting' => $oldId,
                    'id_category' => $key,
                ];
        endforeach;
        Posting::insert($data2);

        // 
        return redirect('/article')->with([
            'message'       => 'data ditambahkan!',
            'alert'         => 'primary'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view(
            'administrator.article.show',
            [
                'controller'    => 'article',
                'title'         => 'rincian artikel',
                'article'       => $article
            ],
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view(
            'administrator.article.edit',
            [
                'controller'    => 'article',
                'title'         => 'edit artikel',
                'article'       => $article
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // input
        $idUser             = 1;
        $title              = $request->title;
        $slug               = Str::slug($title, '-') . '.html';
        $content            = $request->content;
        $truncated          = Str::limit(strip_tags($content), 200, '...');
        $file               = $request->file('file');
        $folder             = 'articles';
        $default            = 'default.svg';

        // detail
        $id                 = $article->slug;
        $oldFile            = $article->file;
        $oldSlug            = $article->slug;
        $oldFile            = $article->file;

        // validation
        if ($oldSlug !== $slug) :
            $unique         = "unique:tbl_articles";
        else :
            $unique         = "";
        endif;

        $validatedData = $request->validate([
            'title'         => ['required', 'max:250', $unique],
            'content'       => ['required'],
            'file'          => ['file', 'image', 'mimes:jpeg,jpg,png,svg', 'max:11024'],
        ]);

        // upload
        if ($file) :
            if ($oldFile !== $folder . '/' . $default)
                Storage::delete($oldFile);
            $file = $file->store($folder);
        // 
        // $name           = $file->hashName();
        // $date           = date('dmyhis');
        // $fileName       = $date . '-' . $name;
        // $file           = $file->storeAs($folder, $fileName);
        else :
            $file           = $oldFile;
        endif;

        // Article::create([
        Article::where('slug', $id)
            ->update([
                'id_user'       => $idUser,
                'title'         => $title,
                'slug'          => $slug,
                'content'       => $content,
                'truncated'     => $truncated,
                'file'          => $file
            ]);

        // flashdata
        return redirect('/article')->with([
            'message'       => 'data diubah!',
            'alert'         => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // detail
        $id                 = $article->id;
        $oldFile            = $article->file;

        if ($oldFile !== 'article/default.svg') :
            Storage::delete($oldFile);
        endif;

        Article::destroy($id);

        return redirect('/article')->with([
            'message'       => 'data dihapus!',
            'alert'         => 'danger'
        ]);
    }
}
