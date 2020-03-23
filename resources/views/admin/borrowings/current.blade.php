@extends('admin.layouts.master')

@section('content')
    <section class="borrowings">
        <div class="row">
            <div class="col-md-3">
                @include('admin.borrowings.menu', ['page' => 'borrowings.current'])
            </div>
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                    <th>#</th>
                    <th>Replica concerné</th>
                    <th>Utilisateur</th>
                    <th>Début réel</th>
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
                            <td>{{ $borrowing->started_at->toDateString() }}</td>
                            <td>{{ $borrowing->finishing_at->toDateString() }}</td>
                            @if ($borrowing->late() < 0)
                                <td class="bg-warning">Retard {{ abs($borrowing->late()) }}j</td>
                            @else
                                <td class="bg-success">OK</td>
                            @endif
                            <td>
                                <a href="{{ route('admin.borrowings.deposit', $borrowing) }}" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                <a href="{{ route('admin.borrowings.postpone', $borrowing) }}" class="btn btn-info btn-sm">Prolonger</a>
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