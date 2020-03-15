@extends('admin.layouts.master')

@section('content')
    <section class="add-publisher">
        <div class="row">
            <div class="col-md-3">
                @include('admin.layouts.content', ['page' => 'publishers.new'])
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Ajouter un éditeur
                    </div>
                    <form action="{{ route('admin.publishers.create') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nom de la maison d'édition</label>
                                <input type="text" class="form-control" name="name" required />
                            </div>

                            <div class="form-group">
                                <label for="country">Code de pays</label>
                                <input type="text" class="form-control" name="country" required />
                            </div>

                            <div class="form-group">
                                <label for="createdAt">Date de création</label>
                                <input type="date" class="form-control" name="createdAt" required />
                            </div>

                            <div class="form-group">
                                <label for="closedAt">Date de fermeture <em>(optionnel)</em></label>
                                <input type="date" class="form-control" name="closedAt" />
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection