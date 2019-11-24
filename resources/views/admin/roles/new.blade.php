@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.permissions.menu', ['page' => 'roles'])
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Ajouter des rôles
            </div>
            <form action="{{ route('admin.perms.roles') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Nom du rôle</label>
                        <input type="text" class="form-control" name="title" required />
                    </div>

                    <div class="form-group">
                        <label for="rank">Rang du rôle</label>
                        <input type="text" class="form-control" name="rank" required />
                        <span class="form-text text-muted">Le rang du rôle désigne sa priorité en terme de hiérarchie.</span>
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