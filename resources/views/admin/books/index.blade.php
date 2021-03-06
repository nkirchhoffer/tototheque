@extends('admin.layouts.master')

@section('content')
<section class="books">
    <div class="row">
        <div class="col-md-3">
            @include('admin.layouts.content', ['page' => 'books.index'])
        </div>
        <div class="col-md-9">
            <table class="table table-bordered">
                <thead>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Auteurs</th>
                    <th>Description</th>
                    <th>Image de couverture</th>
                    <th>Publié le</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>
                                @foreach($book->authors()->get() as $author)
                                    <span class="badge badge-info">{{ $author->getFullName() }}</span>
                                @endforeach
                            </td>
                            <td>{{ substr($book->description, 0, 50) }} {{ (strlen($book->description) > 50) ? '...' : '' }}</td>
                            <td><a href="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($book->cover_url) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-search"></i></a></td>
                            <td>{{ $book->published_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('admin.replicas.index', ['book' => $book]) }}" class="btn btn-primary"><i class="fas fa-info"></i></a>
                                <a href="{{ route('admin.books.update', ['book' => $book]) }}" class="btn btn-warning" style="color: #FFF"><i class="far fa-edit"></i></a>
                                <a href="{{ route('admin.books.delete', ['book' => $book]) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $books->links() }}
        </div>
    </div>
</section>
@endsection