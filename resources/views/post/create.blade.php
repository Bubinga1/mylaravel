@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@extends('layouts.main')
@section('content')

<div class="container">
    <div class="main">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="fr col-md-5 p-5" style="background-color: rgb(230, 230, 230); border-radius:8px">
                <form action="{{route('post.store')}}" method="post">
                    @csrf
                    <div class="form-group pb-1">
                        <label for="exampleInputEmail1">Email address</label>
                        <input value="{{old('email')}}" type="text" name="email" class="form-control" placeholder="Enter email">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleInputPassword1">Name</label>
                        <input value="{{old('name')}}" type="text" name="name" class="form-control">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleInputPassword1">Info</label>
                        <input value="{{old('info')}}" type="text" name="info" class="form-control">
                        @error('info')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleInputPassword1">Likes</label>
                        <input value="{{old('likes')}}" type="text" name="likes" class="form-control">
                        @error('likes')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input value="{{old('password')}}" type="text" name="password" class="form-control">
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="category" name="category_id">
                            @foreach ($categories as $category)
                            <option {{old('category_id') == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pb-3">
                        <label for="exampleFormControlSelect1">Tags</label>
                        <select multiple class="form-control" id="tags" name="tags[]">
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->title}}</option>
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