@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.layouts.content', ['page' => 'authors.new'])
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Ajouter un auteur
            </div>
            <form action="{{ route('admin.authors.create') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="lastname">Nom de famille</label>
                        <input type="text" name="lastname" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="biography">Courte biographie</label>
                        <textarea name="biography" id="biography" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="country_code">Pays de naissance</label>
                        <input type="text" name="country_code" class="form-control" required />
                        <p class="form-text text-muted">Renseigner un code de pays selon la liste de la norme <a href="https://fr.wikipedia.org/wiki/ISO_3166-1">ISO 3166-1</a> (alpha-2).</p>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Date de naissance</label>
                        <input type="date" class="form-control" name="birthdate" required/>
                        <p class="form-text text-muted">Respecter le format DD/MM/YYYY</p>
                    </div>
                    <div class="form-group">
                        <label for="death">Date de mort (optionnelle)</label>
                        <input type="date" class="form-control" name="death"/>
                        <p class="form-text text-muted">Champ optionnel. Format DD/MM/YYYY</p>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Valider" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>
@stop