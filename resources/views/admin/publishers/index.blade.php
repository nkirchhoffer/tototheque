@extends('admin.layouts.master')

@section('content')
    <section class="publishers">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.content', ['page' => 'publishers.index'])
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Pays</th>
                        <th>Ouverture le</th>
                        <th>Fermeture le</th>
                        <th>Utilisateur</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach($publishers as $publisher)
                            <tr>
                                <td>{{ $publisher->id }}</td>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ strtoupper($publisher->country_code) }}</td>
                                <td>{{ $publisher->opened_at }}</td>
                                <td>{{ (is_null($publisher->closed_at) ? 'Encore ouvert' : $publisher->closed_at) }}</td>
                                <td>{{ $publisher->user->name }}</td>
                                <td>
                                    <a href="{{ route('admin.publishers.update', ['publisher' => $publisher]) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('admin.publishers.delete', ['publisher' => $publisher]) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $publishers->links() }}
            </div>
        </div>
    </section>
@endsection