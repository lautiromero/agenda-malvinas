<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }
    
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Convertimos el array conseguido de objetos a clave - valor
        //donde id es la clave y name el valor
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all(); 

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        //almacenamos la imagen en el storage y la ruta en la variable $url
        $url = Storage::put('posts', $request->file('image'));

        //creamos la relacion en la tabla images
        $post->image()->create([
            'url' => $url
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index')
                ->with('info', 'La noticia se creo correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        //Convertimos el array conseguido de objetos a clave - valor
        //donde id es la clave y name el valor
        $categories = Category::pluck('name', 'id');

        $tags = Tag::all(); 

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());

        if($request->file('image')){

            //almacenamos la imagen en el storage y la ruta en la variable $url
            $url = Storage::put('posts', $request->file('image'));

            if ($post->image) {
                
                Storage::delete($post->image->url);
                
                $post->image()->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.index')->with('info', 'La noticia se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        if ($post->image) {
            Storage::delete($post->image->url);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('info', 'La noticia se eliminó correctamente.');
    }

    public function upload(Request $request)
    {
        $fileName=$request->file('file')->getClientOriginalName();

        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');

        return response()->json(['location'=>"/storage/$path"]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }
}
