<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
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
                'title'             => 'artikel'
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
        $file               = $request->file('file');
        $folder             = 'articles';

        // validation
        $validatedData = $request->validate([
            'title'         => ['required', 'max:255', 'unique:tbl_articles'],
            'content'       => ['required'],
            'file'          => ['file', 'image', 'mimes:jpeg,jpg,png,svg', 'max:11024'],
        ]);

        // upload
        if ($file) :
            $file = $file->store($folder);

        // $name           = $file->hashName();
        // $date           = date('dmyhis');
        // $fileName       = $date . '-' . $name;
        // $file           = $file->storeAs($folder, $fileName);
        else :
            $file           = 'default.svg';
        endif;

        // insert
        Article::create([
            'id_user'       => $idUser,
            'title'         => $title,
            'slug'          => $slug,
            'content'       => $content,
            'truncated'     => $truncated,
            'file'          => $file,
        ]);

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
        // detail
        $id                 = $article->slug;
        $oldFile            = $article->file;
        $oldSlug            = $article->slug;

        // input
        $idUser             = 1;
        $title              = $request->title;
        $slug               = Str::slug($title, '-') . '.html';
        $content            = $request->content;
        $truncated          = Str::limit(strip_tags($content), 200, '...');
        $file               = $request->file('file');
        $folder             = 'articles';

        // validation
        if ($oldSlug !== $slug) :
            $unique         = "unique:tbl_articles";
        else :
            $unique         = "";
        endif;

        $validatedData = $request->validate([
            'title'         => ['required', 'max:255', $unique],
            'content'       => ['required'],
            'file'          => ['file', 'image', 'mimes:jpeg,jpg,png,svg', 'max:11024'],
        ]);

        // upload
        if ($file) :
            $file = $file->store($folder);
        // 
        // $name           = $file->hashName();
        // $date           = date('dmyhis');
        // $fileName       = $date . '-' . $name;
        // $file           = $file->storeAs($folder, $fileName);
        else :
            $file           = 'default.svg';
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
        // 
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
        //
    }
}
