<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\post;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Str;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.post.index')
        ->with('posts',post::paginate(4))
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'title'=>'required',
                'sub_title'=>'required',
                'description'=>'required',
            ]
            );

           post::create(['title'=>$request->title,
           'sub_title'=>$request->sub_title,
           'description'=>$request->description,
           'slug'=>Str::slug($request->title),
        ]);
        Session::flash('success','create successfully');

            return redirect()->route('post.index');
            //  return $request->description;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
        return view('backend.post.edit')->
        with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,post $post)
    {
        
        $request->validate(
            [
                'title'=>'required',
                'sub_title'=>'required',
                'description'=>'required'

            ]
            );
            $post->title=$request->title;
            $post->sub_title=$request->sub_title;
            $post->description=$request->description;
            $post->save();
            Session::flash('success','Update successfully');

            return redirect()->route('post.index');
        // return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
        $post->delete();

     return redirect()->route('post.index');
        
    }
}
