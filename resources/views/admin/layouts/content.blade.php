@if (Auth::user()->hasPermission('manage_authors'))
    <div class="list-group">
        <a href="{{ route('admin.authors.index') }}" class="list-group-item list-group-item-action {{ ($page == 'authors.index') ? 'active' : '' }}">Liste des auteurs</a>
        <a href="{{ route('admin.authors.create') }}" class="list-group-item list-group-item-action {{ ($page == 'authors.new') ? 'active' : '' }}">Ajouter un auteur</a>
        <a href="{{ route('admin.books.create') }}" class="list-group-item list-group-item-action {{ ($page == 'books.new') ? 'active' : '' }}">Ajouter un livre</a>
    </div>    
@endif