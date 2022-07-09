@extends('layouts.app');

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-6 offset-3">

                @if ($errors->any())
                    <div class="alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2>Esegui la modifica di: <strong>{{$post->title}}</strong></h2>

                <form action="{{ route('admin.posts.update', $post) }}" method="POST">
                    {{-- @csrf deve essere inserito in tutti i form. se questo non viene inserito, il form non risulta valido--}}
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Titolo</label>
                        {{-- il name dell'input deve risultare al nome della colonna della tabella di riferimento --}}
                        <input value="{{old("title", $post->title)}}"
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Inserisci il titolo del comic">
                        @error('title')
                            <p class="text-danger fw-bold"><strong>{{$message}}</strong></p>
                        @enderror
                        <p class="text-danger fw-bold" id=error-title></p>
                    </div>

                    <div class="mb-3">
                        <label  for="description" class="form-label fw-bold">Contenuto del post</label>
                        <textarea   value="{{old("description")}}"
                                    name="description"
                                    id="description"
                                    type="text"
                                    class="form-control @error('description') is-invalid @enderror"
                                    cols="30"   rows="10"
                                    placeholder="Inserisci la descrizione del post">{{old("description", $post->description)}}</textarea>
                        @error('description')
                            <p class="text-danger fw-bold"><strong>{{$message}}</strong></p>
                        @enderror
                        <p class="text-danger fw-bold" id=error-description></p>
                    </div>
                    <button type="submit" class="btn btn-success fw-bold">Modifica</button>

                </form>
            </div>
        </div>

    </div>
@endsection
