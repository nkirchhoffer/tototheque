@extends('admin.layouts.master')

@section('content')
    <section class="categories">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.content', ['page' => 'categories.index'])
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Créée par</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ substr($category->description, 0, 50) }} {{ (strlen($category->description) > 50) ? '...' : '' }}</td>
                                <td>{{ $category->created_at->toDateString() }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.update', ['category' => $category]) }}" class="btn btn-warning" style="color: #FFF"><i class="far fa-edit"></i></a>
                                    <a href="{{ route('admin.categories.delete', ['category' => $category]) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $categories->links() }}
            </div>
        </div>
    </section>
@endsection