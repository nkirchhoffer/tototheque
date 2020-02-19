@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-3">
        @include('admin.layouts.content', ['page' => 'authors.list'])
    </div>
    
    <div class="col-md-9">
        <table class="table table-bordered">
            <thead>
                <th>Nom de l'auteur</th>
                
            </thead>
        </table>
    </div>
</div>
@endsection