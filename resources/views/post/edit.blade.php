@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@extends('layouts.main')
@section('content')

<div class="container">
    <div class="main">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="fr col-md-5 p-5" style="background-color: rgb(230, 230, 230); border-radius:8px">
                <form action="{{route('post.update', $post->id)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group pb-1">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email" value="{{$post->email}}">
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$post->name}}">
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleInputPassword1">Info</label>
                        <input type="text" name="info" class="form-control" value="{{$post->info}}">
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleInputPassword1">Likes</label>
                        <input type="text" name="likes" class="form-control" value="{{$post->likes}}">
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="text" name="password" class="form-control" value="{{$post->password}}">
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach ($categories as $category)

                            <option {{$category->id === $post->category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}

                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleFormControlSelect1">Tags</label>
                        <select multiple class="form-control" id="tags" name="tags[]">
                            @foreach ($tags as $tag)

                            <option @foreach ($post->tags as $postTag)
                                {{$tag->id === $postTag->id ? 'selected' : ''}}
                                @endforeach
                                value="{{$tag->id}}">{{$tag->title}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection