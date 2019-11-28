@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.permissions.menu', ['page' => 'roles.index'])
    </div>
    <div class="col-md-9">
        <table class="table table-bordered">
            <thead>
                <th>Nom d'utilisateur</th>
                <th>Rôles</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge badge-pill badge-dark">{{ $role->title }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.roles.withdraw', ['user' => $user->id]) }}" class="btn btn-sm btn-warning">Retirer un rôle</a>
                            <a href="#" class="btn btn-sm btn-danger">Retirer tous les rôles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop