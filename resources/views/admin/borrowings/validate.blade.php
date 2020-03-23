@extends('admin.layouts.master')

@section('content')
    <section class="validation">
        <div class="row">
            <div class="col-md-3">
                @include('admin.borrowings.menu', ['page' => 'borrowings.index'])
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        Approuver un emprunt
                    </div>
                    <form action="{{ route('admin.borrowings.validate', $borrowing) }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user">Utilisateur</label>
                                <input type="text" class="form-control" value="{{ $borrowing->user->name }}" disabled />
                            </div>

                            <div class="form-group">
                                <label for="replica">Ouvrage</label>
                                <input type="text" class="form-control" value="{{ $borrowing->replica->book->title }} édité par {{ $borrowing->replica->publisher->name }} - ISBN : {{ $borrowing->replica->isbn }}" disabled/>
                            </div>

                            <div class="form-group">
                                <label for="startingAt">Date de retrait</label>
                                <input type="date" class="form-control" name="startingAt" value="{{ now()->toDateString() }}" required/>
                                <p class="form-text text-muted">L'heure de retrait est 10h. Indiquez le lendemain si le livre n'est pas prêt à être retiré à ce moment.</p>
                            </div>

                            <div class="form-group">
                                <label for="startingAt">Date de fin</label>
                                <input type="date" class="form-control" name="finishingAt" value="{{ now()->addDays(14)->toDateString() }}" required/>
                                <p class="form-text text-muted">Le rendu est considéré en retard le jour-même après 20h.</p>
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