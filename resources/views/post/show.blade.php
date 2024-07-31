@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@extends('layouts.main')
@section('content')

<div>
    {{ $post->id}}.{{ $post->name}}
    {{ $post->password}}
</div>
<div>
    <a href="{{route('post.edit',$post->id)}}">Edit</a>
</div>
<form action="{{route('post.delete',$post->id)}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Delete" class="btn btn-danger">
</form>
<div>
    <a href="{{route('post.index')}}">Back</a>
</div>

@endsection