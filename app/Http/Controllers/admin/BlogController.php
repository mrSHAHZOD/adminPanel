<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::paginate(8);
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $request->validate([
           /*  'title_uz' => 'required', */
            'img' => 'mimes:png,jpg'
        ]);

        if($request->hasFile('img'))
            $requestData['img'] = $this->upload_file();

        blog::create($requestData);

        return redirect()->route('admin.blog.index')->with('success', 'Yangilik qo`shildi');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blog $blogs)
    {
        return view('admin.blog.edit', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blog $blog)
    {
        $requestData = $request->all();

        if($request->hasFile('img'))
        {
            $this->unlink_file($blog);

            $requestData['img'] = $this->upload_file();
        }

        $blog->update($requestData);

        return redirect()->route('admin.blog.index')->with('success', 'Ma`lumot tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        $this->unlink_file($blog);

        $blogs->delete();

        return redirect()->route('admin.blog.index')->with('danger', 'O`chirildi !');
    }

    public function unlink_file(blog $blog){
        if(isset($blog->img) && file_exists(public_path('/images/'.$blog->img)))
        {
            unlink(public_path('/images/'.$blog->img));
        }
    }

    public function upload_file(){
        $file = request()->file('img');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('images/', $fileName);
        return $fileName;
    }
}
