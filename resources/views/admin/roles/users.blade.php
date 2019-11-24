@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.permissions.menu', ['page' => 'users'])
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Assigner des rôles à des utilisateurs
            </div>
            <form action="{{ route('admin.roles.assign') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="user">Nom de l'utilisateur</label>
                        <select name="user" id="user" class="form-control" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="role">Titre du rôle</label>
                        <select name="role" id="role" class="form-control" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Valider" />
                </div>
            </form>
        </div>
    </div>
</div>
@stop