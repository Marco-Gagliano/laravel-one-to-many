@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center fw-bold">Pagina Principale</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>

            <tbody>

                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.posts.show', $post)}}">MOSTRA</a>
                            <a class="btn btn-warning" href="{{route('admin.posts.edit', $post)}}">MODIFICA</a>
                            <form class="d-inline"
                                action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">CANCELLA</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="paginate d-flex justify-content-center">{{$posts->links()}}</div>

    </div>
@endsection
