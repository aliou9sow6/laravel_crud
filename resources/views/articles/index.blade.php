@extends('articles.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('articles.create') }}">Create new article</a>
            </div>
            @if ($message = Session::get('success'))
                <div>
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Description</th>
                        <th scope="col">Categorie</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <th scope="row">{{ $article->id }}</th>
                            <td>{{ $article->topic }}</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->categorie }}</td>
                            <td>
                                <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
