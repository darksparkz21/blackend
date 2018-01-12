<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Image;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = request()->user()->posts;
        $id = auth()->user()->id;
        $posts = Article::where('user_id',$id)->get();
        return response()->json([
            'posts' => $posts,
        ], 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'        => 'required|max:255',
            'content' => 'required',
        ]);

        $posts = Article::create([
            'title' => request('title'),
            'slug' => request('slug'),
            'content' => request('content'),
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'posts'    => $posts,
            'message' => 'Success'
        ], 200);
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
    public function update(Request $request, Article $articles)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required',
            'content' => 'required',
        ]);
 
        $articles->title = request('title');
        $articles->slug = request('slug');
        $articles->content = request('content');
        $articles->user_id = Auth::user()->id;
        $articles->save();
 
        return response()->json([
            'message' => 'Posts updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $articles)
    {
        $articles->delete();
    }

    public function page()
    {
        $images = Image::all();

        return view('pages.index')->with('images',$images);
    }

    public function uploadImages(Request $request)
    {

            
        //$product=Product::find($productId);
        $myImage = new Image();
        //        image upload
        $image=$request->file('file');

        if($image){
            $imageName=time(). $image->getClientOriginalName();
            $image->move('images',$imageName);
            $imagePath= "/images/$imageName";
            //$myImage->images()->create(['name'=>$imagePath]);
            $myImage->name = $imagePath;
            $myImage->save();
        }

        return "done";
        // Product::create($formInput);
    }
}
