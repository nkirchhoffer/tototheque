@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-3">
        @include('admin.permissions.menu', ['page' => 'index'])
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                Assigner une permission à un rôle
            </div>
            <form action="{{ route('admin.perms.assign') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="role">Rôle destinataire</label>
                        <select name="role" id="role" class="form-control" required>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="permission">Permission à assigner</label>
                        <select name="permission" id="permission" class="form-control" required>
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection