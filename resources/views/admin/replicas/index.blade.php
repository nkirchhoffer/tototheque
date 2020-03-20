@extends('admin.layouts.master')

@section('content')
    <section class="replicas">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.content', ['page' => 'replicas.index'])
            </div>
            <div class="col-md-9">
                <h1>Réplicas de {{ $book->title }}</h1>

                <a href="{{ route('admin.replicas.create', ['book' => $book]) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Créer un réplica</a>

                <table class="table table-bordered" style="margin-top: 20px;">
                    <thead>
                        <th>#</th>
                        <th>Éditeur</th>
                        <th>ISBN</th>
                        <th>Couverture</th>
                        <th>État</th>
                        <th>Publié le</th>
                        <th>Acquis le</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($replicas as $replica)
                            <tr>
                                <td>{{ $replica->id }}</td>
                                <td>{{ $replica->publisher->name }}</td>
                                <td>{{ $replica->isbn }}</td>
                                <td><a href="{{ \Illuminate\Support\Facades\Storage::disk('s3')->url($replica->cover_url) }}" target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                                <td>{{ $replica->state }}</td>
                                <td>{{ $replica->published_at->toDateString() }}</td>
                                <td>{{ $replica->bought_at->toDateString() }}</td>
                                <td>
                                    <a href="{{ route('admin.replicas.update', ['replica' => $replica]) }}" class="btn btn-warning" style="color: #fff"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('admin.replicas.delete', ['replica' => $replica]) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $replicas->links() }}
            </div>
        </div>
    </section>
@endsection