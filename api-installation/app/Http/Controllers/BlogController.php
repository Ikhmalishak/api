<?php

namespace App\Http\Controllers;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    //create
    public function store (Request $request)
    {
        $data = $request -> validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $data['user_id']=auth()->user()->id;

        $blog = BlogPost::create($data);

        return $this->return_api(true, Response::HTTP_OK,'Sucessfully Store Data!',$blog);
    }
    
    public function index()
    {
        $blogs = BlogPost::with('user')->get();

        return $this -> return_api(true,Response::HTTP_OK,'Successfully Retrieved Data',$blogs);
    }

    public function show($id)
    {
        $blog = BlogPost::find($id);

        return $this -> return_api(true,Response::HTTP_OK,'Successfully Retrieved Data',$blog);
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'string',
            'body' => 'string',
        ]);
        $blogPost= BlogPost::find($id);
        $blogPost->update($data);

        return $this -> return_api(true,Response::HTTP_OK,'Successfully Update Data',$blogPost,null);
    }

    public function destroy($id)
    {
        BlogPost::find($id)->delete();
        return $this -> return_api(true,Response::HTTP_OK,'Successfully Delete Data',null);
    }

}
