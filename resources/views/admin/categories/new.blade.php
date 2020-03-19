@extends('admin.layouts.master')

@section('content')
    <section class="new-category">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.content', ['page' => 'categories.create'])
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Ajouter une catégorie
                    </div>
                    <form action="{{ route('admin.categories.create') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nom de la catégorie</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label for="description">Description de la catégorie</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection