<?php

namespace App\Http\Controllers;

use App\Models\Websites;
use App\Http\Requests\StoreWebsitesRequest;
use App\Http\Requests\UpdateWebsitesRequest;
use App\Models\Article;

class WebsitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'website.index',
            [
                'controller'    => 'websites',
                'title'         => 'website',
                'articles'      => Article::all()
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWebsitesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWebsitesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Websites  $websites
     * @return \Illuminate\Http\Response
     */
    public function show(Websites $websites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Websites  $websites
     * @return \Illuminate\Http\Response
     */
    public function edit(Websites $websites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebsitesRequest  $request
     * @param  \App\Models\Websites  $websites
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWebsitesRequest $request, Websites $websites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Websites  $websites
     * @return \Illuminate\Http\Response
     */
    public function destroy(Websites $websites)
    {
        //
    }
}
