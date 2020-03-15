@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.layouts.content', ['page' => 'authors.edit'])
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Modifier l'auteur {{ $author->firstname }} {{ strtoupper($author->lastname) }}
            </div>
            <form action="{{ route('admin.authors.update', ['author' => $author]) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="firstname">Prénom</label>
                        <input type="text" name="firstname" value="{{ $author->firstname }}" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="lastname">Nom de famille</label>
                        <input type="text" name="lastname" value="{{ $author->lastname }}" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="biography">Courte biographie</label>
                        <textarea name="biography" id="biography" cols="30" rows="10" class="form-control" required>{{ $author->biography  }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="country_code">Pays de naissance</label>
                        <input type="text" name="country_code" value="{{ $author->country_code }}" class="form-control" required />
                        <p class="form-text text-muted">Renseigner un code de pays selon la liste de la norme <a href="https://fr.wikipedia.org/wiki/ISO_3166-1">ISO 3166-1</a> (alpha-2).</p>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Date de naissance</label>
                        <input type="date" class="form-control" value="{{ $author->born_at }}" name="birthdate" required/>
                        <p class="form-text text-muted">Respecter le format DD/MM/YYYY</p>
                    </div>
                    <div class="form-group">
                        <label for="death">Date de mort (optionnelle)</label>
                        <input type="date" class="form-control" name="death" value="{{ $author->died_at }}" />
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