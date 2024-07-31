<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PostController extends Controller
{
    public function index() {
        
        $post = Post::all();

        return view('post.index', compact('post'));

       
    }

    public function create(){
       
       $categories = Category::all();
       $tags = Tag::all();

       return view('post.create', compact('categories', 'tags'));

    }

    public function store(){
        $data = request()->validate([
            'name'=>'required | string',
            'email'=>'required | string',
            'info'=>'required | string',
            'likes'=>'required | string',
            'password'=>'required | string',
            'category_id'=>'',
            'tags'=>''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);

       return redirect()->route('post.index');

    }

    public function show(Post $post) {
      
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {

        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

   

    public function update(Post $post) {

        $data = request()->validate([
            'name'=>'string',
            'email'=>'string',
            'info'=>'string',
            'likes'=>'string',
            'password'=>'string',
            'category_id'=>'string',
            'tags'=>''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);

    }

    public function delete() {

        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('delete');
    }


    public function destroy(Post $post) {

        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate() {

        $anotherPost = [
            'name' => 'weg3',
            'email' => 'gwe4',
            'info' => 'gew6',
            'likes' => 27,
            'password' => 'gew6',
        ];  

        $post = Post::firstOrCreate([
            'name' => 'weg3'
        ],[
            'name' => '444weg3',
            'email' => '555gwe4',
            'info' => '666gew6',
            'likes' => 2337,
            'password' => '3333gew6',
        ]);

        dump($post->content);
        dd('finished');


    }


    public function updateOrCreate() {

        $anotherPost = [
            'name' => 'weg3',
            'email' => 'gwe4',
            'info' => 'gew6',
            'likes' => 27,
            'password' => 'gew6',
        ];  

        $post = Post::updateOrCreate([
            'name' => 'rrrrrrr'
        ],[
            'name' => 'rrrrrrr5555',
            'email' => 'rrrrrrr5555',
            'info' => 'rrrr555',
            'likes' => 2337,
            'password' => 'rrrrrrr555',
        ]);

        dump($post->content);
        dd('finished');


    }
}
