<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Blog;
use App\Http\Resources\BlogResource;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Blog::limit(10)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('img')){
            $name = $request ->file('img')->getClientOriginalName();
            $path = $request->file('img')->move('images', $name);
        }
        
        $blog = Blog::create([
            'title' =>$request->title,
            'description' =>$request->description,
            'img' => $path ?? null,
        ]);

        return response(['success' => 'Blog muvofaqiyatli qoshildi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        /* return $blog; */
        return new BlogResource($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return 'deleted  Ochirildi';
    }
}
