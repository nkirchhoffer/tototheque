@extends('admin.layouts.master')

@section('content')
    <section class="borrowings">
        <div class="row">
            <div class="col-md-3">
                 @include('admin.borrowings.menu', ['page' => 'borrowings.index'])
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Replica concerné</th>
                        <th>Utilisateur</th>
                        <th>Début théorique</th>
                        <th>Fin théorique</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($borrowings as $borrowing)
                            <tr>
                                <td>{{ $borrowing->id }}</td>
                                <td>{{ $borrowing->replica->book->title }}</td>
                                <td>{{ $borrowing->user->name }}</td>
                                <td>{{ $borrowing->starting_at->toDateString() }}</td>
                                <td>{{ $borrowing->finishing_at->toDateString() }}</td>
                                <td>
                                    @if (is_null($borrowing->validated_at))
                                        Validation
                                    @else
                                        Retrait
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.borrowings.validate', $borrowing) }}" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <a href="{{ route('admin.borrowings.cancel', $borrowing) }}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $borrowings->links() }}
            </div>
        </div>
    </section>
@endsection