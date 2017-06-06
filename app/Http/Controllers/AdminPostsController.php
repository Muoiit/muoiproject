<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Role;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
       $user = Auth::user();
       $post = new Post(); 
       $input =  $request->all();

       $file = $request->file('photo_id');


       if($file){

          $name = time(). $file->getClientOriginalName();         
          $file->move('images',$name);
          $photo = Photo::create(['file' => $name]);

          // $input['photo_id'] = $photo->id;

       }

         // $input['user_id'] = $user->id;

         // Post::create($request->all()); 

         $post->title   = $request->get('title');
         $post->body    = $request->get('body');
         $post->user_id = $user->id;
         $post->photo_id = $photo->id;

         $post->save(); 

         return redirect('/admin/posts');








    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}



// ghi chu quan trong : relationship
// vi du co 2 bang la users va photo
// neu quan he 1 vs 1 thi photo_id nam o user, y nghia: 1 user has one photo,
// set relationship o bang user la $this->belongsTo('App\photo')
// quan he 1 nhieu thi binh thuong 