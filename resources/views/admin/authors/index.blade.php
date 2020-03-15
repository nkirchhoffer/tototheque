@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.layouts.content', ['page' => 'authors.index'])
    </div>
    
    <div class="col-md-9">
        <table class="table table-bordered">
            <thead>
                <th>Nom complet de l'auteur</th>
                <th>Biographie</th>
                <th>Date de naissance</th>
                <th>Date de mort</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->firstname }} {{ strtoupper($author->lastname) }}</td>
                        <td>{{ substr($author->biography, 0, 25) }}{{ (strlen($author->biography) > 25) ? '...' : '' }}</td>
                        <td>{{ (new Carbon\Carbon($author->born_at))->toDateString() }}</td>
                        <td>{{ (new Carbon\Carbon($author->died_at))->toDateString() }}</td>
                        <td>
                            <a href="{{ route('admin.authors.update', ['author' => $author]) }}" class="btn btn-warning" style="color: #FFF"><i class="far fa-edit"></i></a>
                            <a href="{{ route('admin.authors.delete', ['author' => $author]) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $authors->links() }}
    </div>
</div>
@endsection