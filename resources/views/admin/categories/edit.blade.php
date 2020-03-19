@extends('admin.layouts.master')

@section('content')
    <section class="edit-category">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.content', ['page' => 'categories.create'])
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Modifier la catégorie {{ $category->name }}
                    </div>
                    <form action="{{ route('admin.categories.update', ['category' => $category]) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nom de la catégorie</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required />
                            </div>

                            <div class="form-group">
                                <label for="description">Description de la catégorie</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $category->description }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection