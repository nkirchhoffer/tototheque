@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.permissions.menu', ['page' => null])
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Retirer un rôle
            </div>

            <form action="{{ route('admin.roles.withdraw', ['user' => $user->id]) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="user">Nom d'utilisateur</label>
                        <select name="user" id="user" class="form-control">
                            <option value="{{ $user->id }}" enabled>{{ $user->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Rôle à retirer</label>
                        <select name="role" id="role" class="form-control" required>
                            @foreach ($user->roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-warning" value="Retirer le rôle" />
                </div>
            </form>
        </div>
    </div>
</div>
@stop