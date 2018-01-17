<?php

namespace Androidizay\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Androidizay\Models\Article;
use Androidizay\Models\Category;
use Androidizay\Models\Tag;
use Androidizay\Models\Image;

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
        $articles = Article::where('user_id',$id)->get();
        return response()->json([
            'posts' => $articles,
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

        $articles = Article::create([
            'title' => request('title'),
            'slug' => request('slug'),
            'content' => request('content'),
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'posts'    => $articles,
            'message' => 'Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
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
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required',
            'content' => 'required',
        ]);
 
        $article->title = request('title');
        $article->slug = request('slug');
        $article->content = request('content');
        $article->user_id = Auth::user()->id;
        $article->save();
 
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
    public function destroy(Article $article)
    {
        $article->delete();
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
