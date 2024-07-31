@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@extends('layouts.main')
@section('content')


<div>
  <a href="{{route('post.create')}}" class="btn btn-primary">Add one</a>
</div>

@foreach ($post as $item)

<div>
  <a href="{{route('post.show',['post'=>$item->id])}}">{{ $item->email}}.{{ $item->name}}</a>

</div>

@endforeach
@endsection