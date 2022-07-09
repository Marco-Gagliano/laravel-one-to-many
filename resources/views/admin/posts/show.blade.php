@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{$post->title}}</h1>
        <p>{{$post->description}}</p>

        <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Torna all'elenco</a>
    </div>

@endsection
