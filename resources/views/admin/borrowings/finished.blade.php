@extends('admin.layouts.master')

@section('content')
    <section class="borrowings">
        <div class="row">
            <div class="col-md-3">
                @include('admin.borrowings.menu', ['page' => 'borrowings.finished'])
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                    <th>#</th>
                    <th>Replica concerné</th>
                    <th>Utilisateur</th>
                    <th>Début réel</th>
                    <th>Fin réelle</th>
                    <th>Statut</th>
                    </thead>
                    <tbody>
                    @foreach ($borrowings as $borrowing)
                        <tr>
                            <td>{{ $borrowing->id }}</td>
                            <td>{{ $borrowing->replica->book->title }}</td>
                            <td>{{ $borrowing->user->name }}</td>
                            @if (!is_null($borrowing->cancelled_at))
                                <td>/</td>
                                <td>/</td>
                                <td class="bg-danger">Annulé</td>
                            @else
                                <td>{{ $borrowing->started_at->toDateString() }}</td>
                                <td>{{ $borrowing->finished_at->toDateString() }}</td>
                                @if ($borrowing->late() < 0)
                                    <td class="bg-warning">Retard {{ abs($borrowing->late()) }}j</td>
                                @else
                                    <td class="bg-success">OK</td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $borrowings->links() }}
            </div>
        </div>
    </section>
@endsection