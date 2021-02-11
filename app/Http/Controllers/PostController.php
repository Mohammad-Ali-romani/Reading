<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('back.post.index',compact('posts'));
    }
    public function show_all(){
        $posts = Post::all()->last()->paginate(10);
        return view('front.posts',compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view('back.post.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if($request->hasFile('upload_photo')){
            $file = $request->upload_photo;
            $fileName = time().$file->getClientOriginalName();
            $file->move('uploads/posts',$fileName);
        }
        Post::create([
            'title' => $request->title,
            'photo'=>"uploads/posts/".$fileName,
            'category_id'=>1,
            'content' => $request->content
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id,$id)
    {
        $post = Post::find($id);
        $cate_id = $category_id;
        return view('front.post',compact(['post','cate_id']));
    }

    public function search(Request $request){
        $posts = Post::all();
        $value = $request->value;
        return view('front.searchPost',compact(['posts','value']));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categorys = Category::all();
        return view('back.post.edit',compact('post','categorys'));
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

        // $file = $request->upload_photo;
        // $fileName = time().$file->getClientOriginalName();
        // $file->move('uploads/posts',$fileName);

        $post = Post::find($id);
        if($request->hasFile('upload_image')){
            // delete file last
            unlink($post->photo);
            // add file
            $file = $request->upload_image;
            $filename = time().$file->getClientOriginalName();
            $file->move('uploads/posts',$filename);
            $post->photo = "uploads/posts/".$filename;
        }
        $post->title=$request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        unlink($post->photo);
        $post->delete();
        return redirect()->route('post.index');
    }

}
