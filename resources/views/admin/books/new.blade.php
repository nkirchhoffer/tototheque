@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.layouts.content', ['page' => 'books.new'])
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Ajouter un livre
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Titre du livre</label>
                        <input type="text" class="form-control" name="title" id="title" required />
                    </div>

                    <div class="form-group">
                        <label for="description">Description du livre</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="author">Auteur du livre</label>
                        <input type="text" class="form-control" id="author" name="author" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="publisher">Éditeur du livre</label>
                        <input type="text" class="form-control" id="publisher" name="publisher" required />
                    </div>

                    <div class="form-group">
                        <label for="cover">Photo de couverture</label>
                        <input type="file" name="cover" id="cover" class="form-control" required />
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Publier</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection